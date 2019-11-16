<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5dcff3080ebdfRelationshipsToTuteurTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tuteurs', function(Blueprint $table) {
            if (!Schema::hasColumn('tuteurs', 'lienparente_id')) {
                $table->integer('lienparente_id')->unsigned()->nullable();
                $table->foreign('lienparente_id', '42609_5dcff306e5331')->references('id')->on('lienparentes')->onDelete('cascade');
                }
                if (!Schema::hasColumn('tuteurs', 'famille_id')) {
                $table->integer('famille_id')->unsigned()->nullable();
                $table->foreign('famille_id', '42609_5dcff306ede25')->references('id')->on('familles')->onDelete('cascade');
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
        Schema::table('tuteurs', function(Blueprint $table) {
            
        });
    }
}
