<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5c76847646c43RelationshipsToProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function(Blueprint $table) {
            if (!Schema::hasColumn('projects', 'photo_id')) {
                $table->integer('photo_id')->unsigned()->nullable();
                $table->foreign('photo_id', '271253_5c76846bda2e1')->references('id')->on('photos')->onDelete('cascade');
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
            
        });
    }
}
