<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSuperherosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Create table for storing roles
        Schema::create('superheros', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('fullName');
            $table->integer('strength');
            $table->integer('speed');
            $table->integer('durability');
            $table->integer('power');
            $table->integer('combat');
            $table->string('race');
            $table->string('heightM');
            $table->string('heightCm');
            $table->string('weightLb');
            $table->string('weightKg');
            $table->string('eyeColor');
            $table->string('hairColor');
            $table->string('publisher');
            $table->date('created_at');
            $table->date('updated_at');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('superheros');
    }
}
