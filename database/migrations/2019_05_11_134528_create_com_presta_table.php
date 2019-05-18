<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComPrestaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('com_presta', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigIncrements('id_presta');
            $table->bigIncrements('nigend');
            $table->text('contenu');
            $table->timestamps();

            //clés étrangères
            $table->foreign('id_presta')
                ->references('id')->on('presta');
            $table->foreign('nigend')
                ->references('nigend')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('com_presta');
    }
}
