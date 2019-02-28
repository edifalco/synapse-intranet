<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5c77b163e2b10RelationshipsToMeetingTable extends Migration
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
                $table->foreign('project_id', '271250_5c76846bb423b')->references('id')->on('projects')->onDelete('cascade');
                }
                if (!Schema::hasColumn('meetings', 'status_id')) {
                $table->integer('status_id')->unsigned()->nullable();
                $table->foreign('status_id', '271250_5c77b15fa7bd0')->references('id')->on('statuses')->onDelete('cascade');
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
                $table->dropForeign('271250_5c76846bb423b');
                $table->dropIndex('271250_5c76846bb423b');
                $table->dropColumn('project_id');
            }
            if(Schema::hasColumn('meetings', 'status_id')) {
                $table->dropForeign('271250_5c77b15fa7bd0');
                $table->dropIndex('271250_5c77b15fa7bd0');
                $table->dropColumn('status_id');
            }
            
        });
    }
}
