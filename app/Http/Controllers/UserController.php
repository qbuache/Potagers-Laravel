<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserPermissionRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Permissions\Permissions;
use Illuminate\Support\Facades\Redirect;
use Spatie\Permission\Models\Role;

class UserController extends Controller {

    public function index() {
        return view("users.index", [
            "users" => User::orderBy("name")->get(),
        ]);
    }

    public function show(User $user) {
        return view("users.show", [
            "user" => $user->load(["potagers.jardin", "roles"]),
        ]);
    }

    public function create() {
        return view("users.manage");
    }

    public function edit(User $user) {
        return view("users.manage", [
            "user" => $user,
        ]);
    }

    public function permissions(User $user) {
        return view("users.permissions", [
            "user" => $user->load(["roles"]),
            "roles" => Role::all(),
        ]);
    }

    // POST

    public function store(UserRequest $request) {
        $posted = $request->validated();
        $user = User::create($posted);
        return Redirect::route("users.show", $user)->with("success", "created");
    }

    // PATCH

    public function update(UserRequest $request, User $user) {
        $posted = $request->validated();
        $user->update($posted);
        return Redirect::route("users.show", $user)->with("success", "updated");
    }

    public function update_permissions(UserPermissionRequest $request, User $user) {
        $posted = $request->validated();
        $user->load(["roles"]);

        $newRoles = collect($posted["roles"])->diff($user->roles->map(fn ($role) => "$role->name"));
        $removedRoles = $user->roles->map(fn ($role) => "$role->name")->diff(collect($posted["roles"]));

        foreach ($newRoles as $newRole) {
            $user->assignRole($newRole);
        }

        if ($removedRoles->count() > 0) {
            if ($removedRoles->contains(Permissions::ADMIN)) {
                $adminsCount = User::whereHas("roles", fn ($role) => $role->where("name", Permissions::ADMIN))->count();
                if ($adminsCount == 1) {
                    return Redirect::back()->withErrors([__("messages.error.sole_administrator")])->withInput();
                }
            }

            foreach ($removedRoles as $removedRole) {
                $user->removeRole($removedRole);
            }
        }

        return Redirect::route("users.show", $user)->with("success", "updated");
    }

    // DELETE

    public function destroy(User $user) {
        $user->delete();
        return Redirect::route("users.index")->with("success", "deleted");
    }
}
