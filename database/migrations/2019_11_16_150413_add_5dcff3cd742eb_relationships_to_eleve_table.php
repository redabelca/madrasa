<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5dcff3cd742ebRelationshipsToEleveTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('eleves', function(Blueprint $table) {
            if (!Schema::hasColumn('eleves', 'famille_id')) {
                $table->integer('famille_id')->unsigned()->nullable();
                $table->foreign('famille_id', '42610_5dcff37b77758')->references('id')->on('familles')->onDelete('cascade');
                }
                if (!Schema::hasColumn('eleves', 'tuteur_id')) {
                $table->integer('tuteur_id')->unsigned()->nullable();
                $table->foreign('tuteur_id', '42610_5dcff37b8359e')->references('id')->on('tuteurs')->onDelete('cascade');
                }
                if (!Schema::hasColumn('eleves', 'quartier_id')) {
                $table->integer('quartier_id')->unsigned()->nullable();
                $table->foreign('quartier_id', '42610_5dcff3cca500c')->references('id')->on('quartiers')->onDelete('cascade');
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
        Schema::table('eleves', function(Blueprint $table) {
            
        });
    }
}
