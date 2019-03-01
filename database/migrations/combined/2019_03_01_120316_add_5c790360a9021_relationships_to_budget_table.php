<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5c790360a9021RelationshipsToBudgetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('budgets', function(Blueprint $table) {
            if (!Schema::hasColumn('budgets', 'project_id')) {
                $table->integer('project_id')->unsigned()->nullable();
                $table->foreign('project_id', '271667_5c76c94e5d666')->references('id')->on('projects')->onDelete('cascade');
                }
                if (!Schema::hasColumn('budgets', 'category_id')) {
                $table->integer('category_id')->unsigned()->nullable();
                $table->foreign('category_id', '271667_5c76c94e73c68')->references('id')->on('categories')->onDelete('cascade');
                }
                if (!Schema::hasColumn('budgets', 'year_id')) {
                $table->integer('year_id')->unsigned()->nullable();
                $table->foreign('year_id', '271667_5c76c94e8b280')->references('id')->on('years')->onDelete('cascade');
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
        Schema::table('budgets', function(Blueprint $table) {
            if(Schema::hasColumn('budgets', 'project_id')) {
                $table->dropForeign('271667_5c76c94e5d666');
                $table->dropIndex('271667_5c76c94e5d666');
                $table->dropColumn('project_id');
            }
            if(Schema::hasColumn('budgets', 'category_id')) {
                $table->dropForeign('271667_5c76c94e73c68');
                $table->dropIndex('271667_5c76c94e73c68');
                $table->dropColumn('category_id');
            }
            if(Schema::hasColumn('budgets', 'year_id')) {
                $table->dropForeign('271667_5c76c94e8b280');
                $table->dropIndex('271667_5c76c94e8b280');
                $table->dropColumn('year_id');
            }
            
        });
    }
}
