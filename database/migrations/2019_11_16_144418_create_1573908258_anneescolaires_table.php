<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1573908258AnneescolairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('anneescolaires')) {
            Schema::create('anneescolaires', function (Blueprint $table) {
                $table->increments('id');
                $table->date('datedebut')->nullable();
                $table->datetime('datefin')->nullable();
                $table->string('label')->nullable();
                $table->tinyInteger('anneeactive')->nullable()->default('0');
                
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
        Schema::dropIfExists('anneescolaires');
    }
}
