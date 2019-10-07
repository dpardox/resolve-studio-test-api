<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCreatePasswordResetsTable extends Migration {
    public function up() {
        Schema::table('password_resets', function (Blueprint $table) {
            $table->increments('id')->first();
            $table->timestamp('updated_at')->nullable();
        });
    }

    public function down() {
        Schema::table('password_resets', function (Blueprint $table) {
            $table->dropColumn('id');
            $table->dropColumn('updated_at');
        });
    }
}
