<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5dcff1ee1bd50RelationshipsToCircuitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('circuits', function(Blueprint $table) {
            if (!Schema::hasColumn('circuits', 'vehicule_id')) {
                $table->integer('vehicule_id')->unsigned()->nullable();
                $table->foreign('vehicule_id', '42605_5dcff1d768c4c')->references('id')->on('vehicules')->onDelete('cascade');
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
        Schema::table('circuits', function(Blueprint $table) {
            
        });
    }
}
