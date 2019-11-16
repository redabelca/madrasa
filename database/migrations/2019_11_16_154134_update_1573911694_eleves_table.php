<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1573911694ElevesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('eleves', function (Blueprint $table) {
            if(Schema::hasColumn('eleves', 'imp_path')) {
                $table->dropColumn('imp_path');
            }
            
        });
Schema::table('eleves', function (Blueprint $table) {
            
if (!Schema::hasColumn('eleves', 'img_path')) {
                $table->string('img_path')->nullable();
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
        Schema::table('eleves', function (Blueprint $table) {
            $table->dropColumn('img_path');
            
        });
Schema::table('eleves', function (Blueprint $table) {
                        $table->string('imp_path')->nullable();
                
        });

    }
}
