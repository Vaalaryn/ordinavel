<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComForumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('com_forum', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigIncrements('id_forum');
            $table->bigIncrements('nigend');
            $table->text('contenu');
            $table->timestamps();

            //clés étrangères
            $table->foreign('id_forum')
                ->references('id')->on('forums');
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
        Schema::dropIfExists('com_forum');
    }
}
