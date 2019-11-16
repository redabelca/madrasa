<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1573928547InscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('inscriptions', function (Blueprint $table) {
            if(Schema::hasColumn('inscriptions', 'eleve_id')) {
                $table->dropForeign('42612_5dcff59c5d58c');
                $table->dropIndex('42612_5dcff59c5d58c');
                $table->dropColumn('eleve_id');
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
        Schema::table('inscriptions', function (Blueprint $table) {
                        
        });

    }
}
