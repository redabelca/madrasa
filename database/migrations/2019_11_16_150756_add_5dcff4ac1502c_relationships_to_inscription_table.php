<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5dcff4ac1502cRelationshipsToInscriptionTable extends Migration
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
