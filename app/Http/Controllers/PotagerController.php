<?php

namespace App\Http\Controllers;

use App\Http\Requests\PotagerRequest;
use App\Http\Requests\UserPotagerRequest;
use App\Models\Jardin;
use App\Models\Potager;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Redirect;

class PotagerController extends Controller {

    public function index() {
        $potagers = Potager::orderBy("name")->with(["jardinier", "jardin"])->get();
        return view("potagers.index", [
            "potagers" => $potagers,
            "sizes" => $potagers->groupBy("size")->sortKeys()->map(fn ($size) => $size->count()),
        ]);
    }

    public function show(Potager $potager) {
        return view("potagers.show", [
            "potager" => $potager->load(["jardin", "jardinier", "attributed_by"])
        ]);
    }

    public function create() {
        //
    }

    public function edit(Potager $potager) {
        return view("potagers.manage", [
            "potager" => $potager->load(["jardin"]),
            "states" => Potager::states()->map(fn ($state) => [$state, __("messages.label.state_{$state}")]),
        ]);
    }

    public function jardinier(Potager $potager) {
        return view("potagers.jardinier", [
            "potager" => $potager->load(["jardin"]),
            "users" => User::orderBy("name")->get()->prepend(["id" => NULL, "name" => "-- Potager libre --"]),
        ]);
    }

    public function store(PotagerRequest $request) {
        //
    }

    public function update(PotagerRequest $request, Potager $potager) {
        $posted = $request->validated();
        $posted["coordinates"] = json_decode($posted["coordinates"]);
        $potager->update($posted);
        return Redirect::route("potagers.show", $potager)->with("success", "updated");
    }

    public function update_jardinier(UserPotagerRequest $request, Potager $potager) {
        $posted = $request->validated();

        $posted["attributed_by_id"] = auth()->user()->id;
        $posted["attributed_at"] = Carbon::now()->format("Y-m-d H:i:s");
        $potager->update($posted);

        return Redirect::route("potagers.show", $potager)->with("success", "updated");
    }

    public function destroy(Potager $potager) {
        $potager->load(["jardin"]);
        $potager->delete();
        return Redirect::route("jardins.show", $potager->jardin)->with("success", "deleted");
    }
}
