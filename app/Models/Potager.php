<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Potager extends Model {
    use HasFactory;

    protected $fillable = ["jardin_id", "name", "size", "coordinates"];

    public $timestamps = false;

    protected $casts = [
        "coordinates" => "array",
    ];

    protected static function booted() {
        static::deleting(function ($potager) {
            UserPotager::where(["potager_id" => $potager->id])->delete();
        });
    }

    public function jardin() {
        return $this->belongsTo(Jardin::class);
    }
}
