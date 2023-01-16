<?php

namespace App\Models;

use App\Permissions\Permissions;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable {
    use HasApiTokens, HasFactory, HasRoles, Notifiable;

    protected $fillable = [
        "name",
        "email",
        "password",
    ];

    protected $hidden = [
        "password",
        "remember_token",
    ];


    protected $casts = [
        "email_verified_at" => "datetime",
    ];

    protected static function booted() {
        static::created(function ($user) {
            if ($user->id === 1) {
                $user->assignRole(Permissions::ADMIN);
            } else {
                $user->assignRole(Permissions::JARDINIER);
            }
        });
        static::deleting(fn ($user) => Potager::where(["user_id" => $user->id])->update([
            "user_id" => NULL,
            "attributed_by_id" => NULL,
            "attributed_at" => NULL,
        ]));
    }

    public function setEmailAttribute($value) {
        $this->attributes["email"] = strtolower($value);
    }

    public function potagers() {
        return $this->hasMany(Potager::class);
    }
}
