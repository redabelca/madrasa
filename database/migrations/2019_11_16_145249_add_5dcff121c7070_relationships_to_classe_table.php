<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5dcff121c7070RelationshipsToClasseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('classes', function(Blueprint $table) {
            if (!Schema::hasColumn('classes', 'niveau_id')) {
                $table->integer('niveau_id')->unsigned()->nullable();
                $table->foreign('niveau_id', '42602_5dcff120d19ed')->references('id')->on('niveaux')->onDelete('cascade');
                }
                if (!Schema::hasColumn('classes', 'branche_id')) {
                $table->integer('branche_id')->unsigned()->nullable();
                $table->foreign('branche_id', '42602_5dcff120d7f0f')->references('id')->on('branches')->onDelete('cascade');
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
        Schema::table('classes', function(Blueprint $table) {
            
        });
    }
}
