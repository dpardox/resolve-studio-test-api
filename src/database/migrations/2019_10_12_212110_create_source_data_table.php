<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSourceDataTable extends Migration {
    public function up() {
        Schema::create('source_data', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('source_id')->unsigned();
            $table->string('adContent')->nullable();
            $table->string('campaign')->nullable();
            $table->integer('conversion')->nullable();
            $table->dateTime('date')->nullable();
            $table->string('medium')->nullable();
            $table->integer('session')->nullable();
            $table->string('source')->nullable();
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('source_data');
    }
}
