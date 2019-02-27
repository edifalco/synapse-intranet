<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1551279390ProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            if(Schema::hasColumn('projects', 'photo_id')) {
                $table->dropForeign('271253_5c76846bda2e1');
                $table->dropIndex('271253_5c76846bda2e1');
                $table->dropColumn('photo_id');
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
        Schema::table('projects', function (Blueprint $table) {
                        
        });

    }
}
