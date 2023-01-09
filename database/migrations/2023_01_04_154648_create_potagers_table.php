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
            $table->increments('id');
            $table->unsignedInteger('jardin_id');
            $table->unsignedBigInteger('user_id')->index('user_id')->nullable();
            $table->unsignedBigInteger('attributed_by_id')->index('attributed_by_id')->nullable();
            $table->string('name', 50);
            $table->string('coordinates', 30);
            $table->integer('size');
            $table->string('status', 20)->default('ok');
            $table->dateTime('attributed_at')->nullable();
            $table->dateTime('created_at')->useCurrent();
            $table->dateTime('updated_at')->nullable()->useCurrentOnUpdate();
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
