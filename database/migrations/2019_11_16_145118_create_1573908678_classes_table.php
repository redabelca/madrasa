<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1573908678ClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('classes')) {
            Schema::create('classes', function (Blueprint $table) {
                $table->increments('id');
                $table->string('code')->nullable();
                $table->string('label_fr')->nullable();
                $table->string('idmassar')->nullable();
                $table->integer('capacite')->nullable();
                
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
        Schema::dropIfExists('classes');
    }
}
