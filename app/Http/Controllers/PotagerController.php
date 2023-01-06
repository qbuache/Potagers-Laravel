<?php

namespace App\Http\Controllers;

use App\Http\Requests\PotagerRequest;
use App\Models\Jardin;
use App\Models\Potager;
use Illuminate\Support\Facades\Redirect;

class PotagerController extends Controller {

    public function index() {
        return view("potagers.index", [
            "potagers" => Potager::orderBy("name")->with(["jardin"])->get()
        ]);
    }

    public function show(Potager $potager) {
        return view("potagers.show", [
            "potager" => $potager->load(["jardin"])
        ]);
    }

    public function create() {
        //
    }

    public function store(PotagerRequest $request) {
        //
    }

    public function edit(Potager $potager) {
        return view("potagers.manage", [
            "potager" => $potager->load(["jardin"]),
            "jardins" => Jardin::orderBy("name")->get(),
        ]);
    }

    public function update(PotagerRequest $request, Potager $potager) {
        $posted = $request->validated();
        $posted["coordinates"] = json_decode($posted["coordinates"]);
        $potager->update($posted);
        return Redirect::route("potagers.show", $potager)->with("success", "updated");
    }

    public function destroy(Potager $potager) {
        $potager->load(["jardin"]);
        $potager->delete();
        return Redirect::route("jardins.show", $potager->jardin)->with("success", "deleted");
    }
}
