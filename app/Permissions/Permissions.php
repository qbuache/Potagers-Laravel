<?php

namespace App\Permissions;

class Permissions {
    public const ADMIN               = "admin";
    public const RESPONSABLE_POTAGER = "responsable_potager";
    public const SUPER_JARDINIER     = "super_jardinier";
    public const JARDINIER           = "jardinier";

    public const READ_JARDINS    = "read.jardins";
    public const CREATE_JARDINS  = "create.jardins";
    public const EDIT_JARDINS    = "edit.jardins";
    public const DELETE_JARDINS  = "delete.jardins";
    public const READ_POTAGERS   = "read.potagers";
    public const CREATE_POTAGERS = "create.potagers";
    public const EDIT_POTAGERS   = "edit.potagers";
    public const DELETE_POTAGERS = "delete.potagers";
    public const READ_USERS      = "read.users";
    public const CREATE_USERS    = "create.users";
    public const EDIT_USERS      = "edit.users";
    public const DELETE_USERS    = "delete.users";
    public const GIVE_PERMISSIONS = "give.permissions";

    public static function getRoles() {
        return [
            static::ADMIN,
            static::RESPONSABLE_POTAGER,
            static::SUPER_JARDINIER,
            static::JARDINIER,
        ];
    }

    public static function getPermissions() {
        return [
            static::READ_JARDINS,
            static::CREATE_JARDINS,
            static::EDIT_JARDINS,
            static::DELETE_JARDINS,
            static::READ_POTAGERS,
            static::CREATE_POTAGERS,
            static::EDIT_POTAGERS,
            static::DELETE_POTAGERS,
            static::READ_USERS,
            static::CREATE_USERS,
            static::EDIT_USERS,
            static::DELETE_USERS,
            static::GIVE_PERMISSIONS,
        ];
    }
}
