<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1573909581PreinscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('preinscriptions')) {
            Schema::create('preinscriptions', function (Blueprint $table) {
                $table->increments('id');
                $table->string('nomprofesseurtest')->nullable();
                $table->double('notetest', 15, 2)->nullable();
                $table->string('resultattest')->nullable();
                $table->tinyInteger('is_acceptedintest')->nullable()->default('0');
                $table->integer('fraistest')->nullable();
                $table->tinyInteger('fraispayed')->nullable()->default('0');
                $table->tinyInteger('transport')->nullable()->default('0');
                $table->datetime('datetest')->nullable();
                $table->datetime('datelimiteinscription')->nullable();
                $table->text('observations')->nullable();
                
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
        Schema::dropIfExists('preinscriptions');
    }
}
