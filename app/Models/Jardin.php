<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jardin extends Model {
    use HasFactory;

    protected $fillable = ["name", "coordinates"];

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
        return $this->potagers->groupBy("size")->sortKeys()->map(fn ($size, $index) => ["size" => $index, "count" => $size->count()]);
    }

    public function occupation() {
        return floor($this->potagers->filter(fn ($potager) => $potager->is_attributed)->count() / $this->potagers->count() * 100);
    }
}
