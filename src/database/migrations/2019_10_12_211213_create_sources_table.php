<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSourcesTable extends Migration {

    public function up() {
        Schema::create('sources', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('company_id')->unsigned();
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('sources');
    }

}
