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
        Schema::create('personnes', function (Blueprint $table) {
            $table->id();
            $table->string('idnat');
            $table->string('photo');
            $table->string('nom');
            $table->string('postnom');
            $table->string('prenom');
            $table->timestamp('date_naissance')->nullable();
            $table->string('sexe');
            $table->string('etat_civil');
            $table->string('adresse');
            $table->string('email')->nullable();
            $table->string('telephone')->nullable();
            $table->string('nbre_personne_famille')->nullable();
            $table->unsignedBigInteger('province_id');
            $table->unsignedBigInteger('territoire_id');
            $table->unsignedBigInteger('secteur_id');
            $table->unsignedBigInteger('chefferie_id');
            $table->string('niveau_etude')->nullable();
            $table->string('profession')->nullable();
            $table->string('profession_institution')->nullable();
            $table->string('nationalite')->default('congolaise');
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
        Schema::dropIfExists('personnes');
    }
};
