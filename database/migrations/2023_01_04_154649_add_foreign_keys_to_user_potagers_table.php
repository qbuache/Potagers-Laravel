<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToUserPotagersTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('user_potagers', function (Blueprint $table) {
            $table->foreign(['user_id'], 'user_potagers_ibfk_1')->references(['id'])->on('users');
            $table->foreign(['potager_id'], 'user_potagers_ibfk_2')->references(['id'])->on('potagers');
            $table->foreign(['assigned_by_id'], 'user_potagers_ibfk_3')->references(['id'])->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('user_potagers', function (Blueprint $table) {
            $table->dropForeign('user_potagers_ibfk_1');
            $table->dropForeign('user_potagers_ibfk_2');
            $table->dropForeign('user_potagers_ibfk_3');
        });
    }
}
