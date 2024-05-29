<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etude_titres', function (Blueprint $table) {
            $table->id();
            $table->string('titre_libelle');
            $table->timestamp('titre_date_obtention')->nullable();
            $table->unsignedBigInteger('personne_id');
            $table->string('status')->default('actif');
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
        Schema::dropIfExists('etude_titres');
    }
};
