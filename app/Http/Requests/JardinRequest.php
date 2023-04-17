<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class JardinRequest extends FormRequest {

    public function authorize() {
        return TRUE;
    }

    public function rules() {
        $unique = Rule::unique("jardins");
        $requireImage = "required";
        if (!empty($this->jardin)) {
            $unique->ignore($this->jardin);
            $requireImage = "nullable";
        }

        return [
            "name" => ["required", "max:50", $unique],
            "coordinates" => "required|json|max:30",
            "file" => "{$requireImage}|mimes:jpg,jpeg",
        ];
    }
}
