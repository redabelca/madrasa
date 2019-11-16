<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1573908886VehiculesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('vehicules')) {
            Schema::create('vehicules', function (Blueprint $table) {
                $table->increments('id');
                $table->string('code')->nullable();
                $table->string('marque')->nullable();
                $table->string('matricule')->nullable();
                $table->datetime('datemiseencirculation')->nullable();
                $table->datetime('dateacquisition')->nullable();
                $table->datetime('echeanceassurance')->nullable();
                $table->integer('nombredeplace')->nullable();
                $table->datetime('echeancevisitetechnique')->nullable();
                $table->datetime('echeanceautorisation')->nullable();
                $table->integer('consommationmin')->nullable();
                $table->integer('consommationmax')->nullable();
                $table->integer('vidange')->nullable();
                $table->string('observations')->nullable();
                
                $table->timestamps();
                $table->softDeletes();

                $table->index(['deleted_at']);
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicules');
    }
}
