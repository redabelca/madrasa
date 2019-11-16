<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5dcff59d6b200RelationshipsToInscriptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('inscriptions', function(Blueprint $table) {
            if (!Schema::hasColumn('inscriptions', 'classe_id')) {
                $table->integer('classe_id')->unsigned()->nullable();
                $table->foreign('classe_id', '42612_5dcff4ab18c5f')->references('id')->on('classes')->onDelete('cascade');
                }
                if (!Schema::hasColumn('inscriptions', 'circuit_id')) {
                $table->integer('circuit_id')->unsigned()->nullable();
                $table->foreign('circuit_id', '42612_5dcff59c3fe59')->references('id')->on('circuits')->onDelete('cascade');
                }
                if (!Schema::hasColumn('inscriptions', 'niveau_id')) {
                $table->integer('niveau_id')->unsigned()->nullable();
                $table->foreign('niveau_id', '42612_5dcff59c50989')->references('id')->on('niveaux')->onDelete('cascade');
                }
                if (!Schema::hasColumn('inscriptions', 'eleve_id')) {
                $table->integer('eleve_id')->unsigned()->nullable();
                $table->foreign('eleve_id', '42612_5dcff59c5d58c')->references('id')->on('eleves')->onDelete('cascade');
                }
                if (!Schema::hasColumn('inscriptions', 'anneescolaire_id')) {
                $table->integer('anneescolaire_id')->unsigned()->nullable();
                $table->foreign('anneescolaire_id', '42612_5dcff59c661eb')->references('id')->on('anneescolaires')->onDelete('cascade');
                }
                if (!Schema::hasColumn('inscriptions', 'preinscription_id')) {
                $table->integer('preinscription_id')->unsigned()->nullable();
                $table->foreign('preinscription_id', '42612_5dcff59c6f381')->references('id')->on('preinscriptions')->onDelete('cascade');
                }
                
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('inscriptions', function(Blueprint $table) {
            
        });
    }
}
