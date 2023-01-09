<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jardin extends Model {
    use HasFactory;

    protected $fillable = ["name", "description", "coordinates"];

    protected $casts = [
        "coordinates" => "array",
    ];

    public $timestamps = false;

    protected static function booted() {
        static::deleting(function ($jardin) {
            Potager::where(["jardin_id" => $jardin->id])->delete();
        });
    }

    public function potagers() {
        return $this->hasMany(Potager::class);
    }

    public function sizes() {
        return collect($this->potagers->reduce(function ($acc, $potager) {
            if (empty($acc[$potager->size])) {
                $acc[$potager->size] =  0;
            }
            $acc[$potager->size]++;
            return $acc;
        }, []))->sortKeys();
    }
}
