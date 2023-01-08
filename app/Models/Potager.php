<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Potager extends Model {
    use HasFactory;

    protected $fillable = ["jardin_id", "user_id", "name", "size", "coordinates", "attributed_by_id", "attributed_at"];

    public $timestamps = false;

    protected $casts = [
        "coordinates" => "array",
        "attributed_at" => "datetime:d.m.Y",
    ];

    public function jardin() {
        return $this->belongsTo(Jardin::class);
    }

    public function jardinier() {
        return $this->belongsTo(User::class, "user_id");
    }

    public function attributed_by() {
        return $this->belongsTo(User::class, "attributed_by_id");
    }
}
