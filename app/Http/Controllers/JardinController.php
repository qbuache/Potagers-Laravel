<?php

namespace App\Http\Controllers;

use App\Http\Requests\JardinRequest;
use App\Models\Jardin;
use App\Models\Potager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class JardinController extends Controller {

    public function index() {
        //Potager::get()->each(fn ($potager) => $potager->delete());
        //Jardin::truncate();
        return view("jardins.index", [
            "jardins" => Jardin::orderBy("name")->get(),
            "totalSize" => Potager::sum("size")
        ]);
    }

    public function show(Jardin $jardin) {
        return view("jardins.show", [
            "jardin" => $jardin->load(["potagers"])
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
        return Redirect::route("jardins.show", $jardin)->with("success", "created");
    }

    public function edit(Jardin $jardin) {
        return view("jardins.manage", [
            "jardin" => $jardin,
            "jardins" => Jardin::orderBy("name")->get()
        ]);
    }

    public function update(JardinRequest $request, Jardin $jardin) {
        $posted = $request->validated();
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
        ]);
    }

    public function store_define_potagers(Request $request, Jardin $jardin) {
        $posted = $request->all();
        foreach ($posted["names"] as $index => $value) {
            Potager::create([
                "jardin_id" => $jardin->id,
                "name" => $value,
                "size" => $posted["sizes"][$index],
                "coordinates" => json_decode($posted["coordinates"][$index]),
            ]);
        }
        return Redirect::route("jardins.show", $jardin)->with("success", "updated");
    }
}
