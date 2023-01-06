<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePotagersTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('potagers', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('jardin_id');
            //$table->foreign('jardin_id')->references('id')->on('jardins');
            $table->string('name', 5)->unique();
            $table->integer('size');
            $table->string('coordinates', 15);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('potagers');
    }
}
