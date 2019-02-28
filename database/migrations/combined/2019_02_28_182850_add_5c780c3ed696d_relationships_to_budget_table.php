<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5c780c3ed696dRelationshipsToBudgetTable extends Migration
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
                $table->foreign('project_id', '271245_5c768468e1a32')->references('id')->on('projects')->onDelete('cascade');
                }
                if (!Schema::hasColumn('budgets', 'category_id')) {
                $table->integer('category_id')->unsigned()->nullable();
                $table->foreign('category_id', '271245_5c7684690666c')->references('id')->on('categories')->onDelete('cascade');
                }
                if (!Schema::hasColumn('budgets', 'year_id')) {
                $table->integer('year_id')->unsigned()->nullable();
                $table->foreign('year_id', '271245_5c7684691e0ff')->references('id')->on('years')->onDelete('cascade');
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
                $table->dropForeign('271245_5c768468e1a32');
                $table->dropIndex('271245_5c768468e1a32');
                $table->dropColumn('project_id');
            }
            if(Schema::hasColumn('budgets', 'category_id')) {
                $table->dropForeign('271245_5c7684690666c');
                $table->dropIndex('271245_5c7684690666c');
                $table->dropColumn('category_id');
            }
            if(Schema::hasColumn('budgets', 'year_id')) {
                $table->dropForeign('271245_5c7684691e0ff');
                $table->dropIndex('271245_5c7684691e0ff');
                $table->dropColumn('year_id');
            }
            
        });
    }
}
