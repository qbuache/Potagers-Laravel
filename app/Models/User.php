<?php

namespace App\Models;

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
        static::deleting(function ($user) {
            UserPotager::where(["user_id" => $user->id])->delete();
        });
    }

    public function setEmailAttribute($value) {
        $this->attributes["email"] = strtolower($value);
    }

    public function potagers() {
        return $this->belongsToMany(Potager::class, "user_potagers")->withPivot(["assigned_by_id", "created_at"]);
    }
}
