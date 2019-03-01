<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5c78075cb7b9bRelationshipsToMeetingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('meetings', function(Blueprint $table) {
            if (!Schema::hasColumn('meetings', 'project_id')) {
                $table->integer('project_id')->unsigned()->nullable();
                $table->foreign('project_id', '272083_5c7807025a309')->references('id')->on('projects')->onDelete('cascade');
                }
                if (!Schema::hasColumn('meetings', 'status_id')) {
                $table->integer('status_id')->unsigned()->nullable();
                $table->foreign('status_id', '272083_5c7807026d31f')->references('id')->on('statuses')->onDelete('cascade');
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
        Schema::table('meetings', function(Blueprint $table) {
            if(Schema::hasColumn('meetings', 'project_id')) {
                $table->dropForeign('272083_5c7807025a309');
                $table->dropIndex('272083_5c7807025a309');
                $table->dropColumn('project_id');
            }
            if(Schema::hasColumn('meetings', 'status_id')) {
                $table->dropForeign('272083_5c7807026d31f');
                $table->dropIndex('272083_5c7807026d31f');
                $table->dropColumn('status_id');
            }
            
        });
    }
}
