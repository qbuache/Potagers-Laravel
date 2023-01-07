<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserPotagerRequest extends FormRequest {

    public function authorize() {
        return TRUE;
    }

    public function rules() {
        return [
            "user_id" => "nullable|integer",
        ];
    }
}
