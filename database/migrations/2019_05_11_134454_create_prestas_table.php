<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrestasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigIncrements('nigend');
            $table->integer('id_type_repas')->unsigned();
            $table->integer('id_type_prestas')->unsigned();
            $table->string('nom_presta',100);
            $table->decimal('latitude', 10, 8);
            $table->decimal('longitude', 11, 8);
            $table->string('num_portable', 10);
            $table->string('num_fixe', 10);
            $table->string('mail', 100);
            $table->decimal('prix', 8,2);
            $table->smallInteger('capacite');
            $table->tinyInteger('livraison');
            $table->char('lieu_de_conso',1);
            $table->text('dispo');
            $table->text('adresse');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prestas');
    }
}
