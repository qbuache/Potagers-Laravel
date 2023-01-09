<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PotagerRequest extends FormRequest {

    public function authorize() {
        return TRUE;
    }

    public function rules() {
        $unique = Rule::unique("potagers");
        if (!empty($this->potager)) {
            $unique->ignore($this->potager);
        }

        return [
            "name" => ["required", "max:50", $unique],
            "coordinates" => "required|json|max:30",
            "state" => "required|string",
            "size" => "required|integer",
        ];
    }
}
