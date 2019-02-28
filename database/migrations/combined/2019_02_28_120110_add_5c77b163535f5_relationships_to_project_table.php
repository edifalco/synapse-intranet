<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5c77b163535f5RelationshipsToProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function(Blueprint $table) {
            if (!Schema::hasColumn('projects', 'status_id')) {
                $table->integer('status_id')->unsigned()->nullable();
                $table->foreign('status_id', '271253_5c76a9d6557c0')->references('id')->on('statuses')->onDelete('cascade');
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
        Schema::table('projects', function(Blueprint $table) {
            if(Schema::hasColumn('projects', 'status_id')) {
                $table->dropForeign('271253_5c76a9d6557c0');
                $table->dropIndex('271253_5c76a9d6557c0');
                $table->dropColumn('status_id');
            }
            
        });
    }
}
