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
        if (!empty($this->jardin)) {
            $unique->ignore($this->jardin);
        }

        return [
            "name" => ["required", "max:50", $unique],
            "description" => "nullable",
            "coordinates" => "required|json|max:30",
        ];
    }
}
