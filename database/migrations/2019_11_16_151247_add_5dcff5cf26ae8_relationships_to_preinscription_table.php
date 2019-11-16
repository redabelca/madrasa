<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5dcff5cf26ae8RelationshipsToPreinscriptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('preinscriptions', function(Blueprint $table) {
            if (!Schema::hasColumn('preinscriptions', 'anneescolaire_id')) {
                $table->integer('anneescolaire_id')->unsigned()->nullable();
                $table->foreign('anneescolaire_id', '42611_5dcff44ec4717')->references('id')->on('anneescolaires')->onDelete('cascade');
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
        Schema::table('preinscriptions', function(Blueprint $table) {
            
        });
    }
}
