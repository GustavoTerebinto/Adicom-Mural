<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CratePautasTable extends Migration
{
/**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pautas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', 250);
            //$table->string('status')->index()->nullable();
            $table->text('description')->nullable();
            $table->text('contacts')->nullable();           
            $table->timestamps();
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('wpp_number')->nullable();

            $table->foreignId('user_id');
            $table->foreignId('location_id');
            $table->foreignId('relation_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pautas');
    }
}
