<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1573909369ElevesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('eleves')) {
            Schema::create('eleves', function (Blueprint $table) {
                $table->increments('id');
                $table->string('matricule')->nullable();
                $table->string('imp_path')->nullable();
                $table->string('prenom_fr')->nullable();
                $table->string('prenom_ar')->nullable();
                $table->string('nom_fr')->nullable();
                $table->string('nom_ar')->nullable();
                $table->integer('sexe')->nullable();
                $table->string('cin')->nullable();
                $table->string('cne')->nullable();
                $table->string('idmassar')->nullable();
                $table->string('tel')->nullable();
                $table->string('adresse')->nullable();
                $table->date('datenaissance')->nullable();
                $table->date('datepremiereentree')->nullable();
                $table->string('email')->nullable();
                $table->string('nationalite')->nullable();
                $table->string('groupesangin')->nullable();
                $table->tinyInteger('is_handicaped')->nullable()->default('0');
                $table->string('pediatrenom')->nullable();
                $table->string('telpediatre')->nullable();
                $table->text('allergies')->nullable();
                $table->text('particularites')->nullable();
                $table->text('traitement')->nullable();
                $table->integer('nbreanneedouble')->nullable();
                $table->string('allergiealimentaire')->nullable();
                $table->string('intolerancealimentaire')->nullable();
                $table->string('comportementalimentaire')->nullable();
                
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
        Schema::dropIfExists('eleves');
    }
}
