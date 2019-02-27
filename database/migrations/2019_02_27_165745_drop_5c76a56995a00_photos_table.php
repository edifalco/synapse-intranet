<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Drop5c76a56995a00PhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('photos');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if(! Schema::hasTable('photos')) {
            Schema::create('photos', function (Blueprint $table) {
                $table->increments('id');
                $table->string('file');
                
                $table->timestamps();
                
            });
        }
    }
}
