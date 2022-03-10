<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRendezVousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rendez_vouses', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('etablissement_id')->unsigned();
            $table->bigInteger('client_id')->unsigned();
            $table->date('date');
            $table->time('time');
            $table->boolean('active')->default(1);
            $table->timestamps();

            $table->foreign('etablissement_id')->references("id")->on("etablissements")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rendez_vouses');
    }
}
