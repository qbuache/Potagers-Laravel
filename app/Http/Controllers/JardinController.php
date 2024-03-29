<?php

namespace App\Http\Controllers;

use App\Http\Requests\JardinRequest;
use App\Models\Jardin;
use App\Models\Potager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class JardinController extends Controller {

    public function index() {
        $jardins = Jardin::orderBy("name")->with([
            "potagers" => fn ($query) => $query->select(["jardin_id", "user_id", "size"])
        ])->get();

        return view("jardins.index", [
            "jardins" => $jardins,
            "countPotagers" => $jardins->map(fn ($jardin) => $jardin->potagers->count())->sum(),
            "totalSize" => $jardins->map(fn ($jardin) => $jardin->potagers->sum("size"))->sum(),
            "potagersSizes" => $jardins->reduce(fn ($acc, $jardin) => $acc->push(...$jardin->sizes()), collect())
                ->groupBy("size")->map(fn ($size, $index) => ["size" => $index, "count" => $size->sum("count")]),
            "potagersOccupation" => floor($jardins->map(fn ($jardin) => $jardin->occupation())->avg()),
        ]);
    }

    public function show(Jardin $jardin) {
        return view("jardins.show", [
            "jardin" => $jardin->load(["potagers.jardinier:id"]),
        ]);
    }

    public function create() {
        return view("jardins.manage", [
            "jardins" => Jardin::orderBy("name")->get()
        ]);
    }

    public function store(JardinRequest $request) {
        $posted = $request->validated();
        $posted["coordinates"] = json_decode($posted["coordinates"]);
        $jardin = Jardin::create($posted);

        if ($request->hasfile("file")) {
            Storage::putFileAs($jardin->getImagePath("dir"), $request->file("file"), $jardin->getImagePath("file"));
        }
        return Redirect::route("jardins.show", $jardin)->with("success", "created");
    }

    public function edit(Jardin $jardin) {
        $jardin->coordinates = $jardin->getRawOriginal("coordinates");
        return view("jardins.manage", [
            "jardin" => $jardin,
            "jardins" => Jardin::orderBy("name")->get()
        ]);
    }

    public function update(JardinRequest $request, Jardin $jardin) {
        $posted = $request->validated();
        $posted["coordinates"] = json_decode($posted["coordinates"]);
        $jardin->update($posted);
        return Redirect::route("jardins.show", $jardin)->with("success", "updated");
    }

    public function destroy(Jardin $jardin) {
        $jardin->delete();
        return Redirect::route("jardins.index")->with("success", "deleted");
    }

    public function define_potagers(Jardin $jardin) {
        $jardin->load(["potagers"]);
        $nextPotager = $jardin->potagers->max("name");

        return view("jardins.define-potagers", [
            "jardin" => $jardin,
            "nextPotager" => isset($nextPotager) ? $nextPotager + 1 : $jardin->id * 100,
            "states" => Potager::states()->map(fn ($state) => [$state, __("messages.label.state_{$state}")]),
        ]);
    }

    public function store_define_potagers(Request $request, Jardin $jardin) {
        $posted = $request->all();
        foreach ($posted["names"] as $index => $value) {
            Potager::create([
                "jardin_id" => $jardin->id,
                "name" => $value,
                "size" => $posted["sizes"][$index],
                "state" => $posted["states"][$index],
                "coordinates" => json_decode($posted["coordinates"][$index]),
            ]);
        }
        return Redirect::route("jardins.show", $jardin)->with("success", "updated");
    }
}
