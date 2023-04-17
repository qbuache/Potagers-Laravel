<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Jardin extends Model {
    use HasFactory;

    protected $fillable = ["name", "slug", "coordinates"];

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

    public function setNameAttribute($value) {
        $this->attributes["name"] = $value;
        $this->attributes["slug"] = Str::slug($value);
    }

    public function sizes() {
        return $this->potagers->groupBy("size")->sortKeys()->map(fn ($size, $index) => ["size" => $index, "count" => $size->count()]);
    }

    public function getImagePath($format = "all") {
        $dir = "public/potagers";
        $file = "{$this->slug}.jpeg";
        switch ($format) {
            case "all":
                return "{$dir}/{$file}";
            case "dir":
                return $dir;
            case "file":
                return $file;
        }
    }

    public function occupation() {
        $countPotagers = $this->potagers->count();
        return $countPotagers > 0
            ?
            floor($this->potagers->filter(fn ($potager) => $potager->is_attributed)->count() / $this->potagers->count() * 100)
            : 0;
    }
}
