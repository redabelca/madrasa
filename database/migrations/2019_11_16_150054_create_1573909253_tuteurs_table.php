<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1573909253TuteursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('tuteurs')) {
            Schema::create('tuteurs', function (Blueprint $table) {
                $table->increments('id');
                $table->string('prenom_fr')->nullable();
                $table->string('prenom_ar')->nullable();
                $table->string('nom_fr')->nullable();
                $table->string('nom_ar')->nullable();
                $table->string('adresse')->nullable();
                $table->string('cin')->nullable();
                $table->string('email')->nullable();
                $table->string('tel')->nullable();
                $table->string('ville')->nullable();
                $table->string('profession')->nullable();
                
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
        Schema::dropIfExists('tuteurs');
    }
}
