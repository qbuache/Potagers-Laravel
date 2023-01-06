<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserPermissionRequest extends FormRequest {

    public function authorize() {
        return TRUE;
    }

    public function rules() {
        $unique = Rule::unique("users");
        if (!empty($this->user)) {
            $unique->ignore($this->user);
        }

        return [
            "roles" => "required|array",
            "roles.*" => "required|string",
        ];
    }
}
