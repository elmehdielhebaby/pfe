<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            // $table->bigInteger('client_id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->bigInteger('etablissement_id')->unsigned();
            $table->string('phone');
            $table->text('adresse')->nullable(true);
            $table->text('cin')->nullable(true);
            $table->bigInteger('age');
            $table->string('genre');
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('etablissement_id')->references("id")->on("etablissements")->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
