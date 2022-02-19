<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtablissementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etablissements', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->string('name');
            $table->string('phone');
            $table->string('categorie')->randomElement(['Retailers', 'Sports', 'Médical', 'Education', 'Officiel']);
            $table->text('adresse');
            $table->integer('service');
            $table->char('url',8)->unique();
            $table->longText('description');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references("id")->on("users")->onDelete("cascade");

        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('etablissements');
    }
}
