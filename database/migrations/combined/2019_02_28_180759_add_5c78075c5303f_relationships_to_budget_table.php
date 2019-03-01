<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5c78075c5303fRelationshipsToBudgetTable extends Migration
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
                $table->foreign('project_id', '272082_5c7807216c647')->references('id')->on('projects')->onDelete('cascade');
                }
                if (!Schema::hasColumn('budgets', 'category_id')) {
                $table->integer('category_id')->unsigned()->nullable();
                $table->foreign('category_id', '272082_5c7807217df5a')->references('id')->on('categories')->onDelete('cascade');
                }
                if (!Schema::hasColumn('budgets', 'year_id')) {
                $table->integer('year_id')->unsigned()->nullable();
                $table->foreign('year_id', '272082_5c780721925c2')->references('id')->on('years')->onDelete('cascade');
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
                $table->dropForeign('272082_5c7807216c647');
                $table->dropIndex('272082_5c7807216c647');
                $table->dropColumn('project_id');
            }
            if(Schema::hasColumn('budgets', 'category_id')) {
                $table->dropForeign('272082_5c7807217df5a');
                $table->dropIndex('272082_5c7807217df5a');
                $table->dropColumn('category_id');
            }
            if(Schema::hasColumn('budgets', 'year_id')) {
                $table->dropForeign('272082_5c780721925c2');
                $table->dropIndex('272082_5c780721925c2');
                $table->dropColumn('year_id');
            }
            
        });
    }
}
