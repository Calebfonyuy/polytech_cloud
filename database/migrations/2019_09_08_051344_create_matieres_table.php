<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatieresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matieres', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('departement');
            $table->unsignedInteger('classe');
            $table->string('nom',50);
            $table->longText('description');
            $table->integer('credits');
            $table->integer('semester');
            $table->integer('status')->default(1);
            $table->timestamps();
            $table->foreign('departement')->references('id')->on('departements');
            $table->foreign('classe')->references('id')->on('classes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matieres');
    }
}
