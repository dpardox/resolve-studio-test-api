<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePasswordResetsTable extends Migration {
    public function up() {
        Schema::create('password_resets', function (Blueprint $table) {
            $table->increments('id')->first();
            $table->string('email')->index();
            $table->string('token');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('password_resets');
    }
}
