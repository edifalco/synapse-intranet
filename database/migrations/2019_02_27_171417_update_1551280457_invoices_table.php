<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1551280457InvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('invoices', function (Blueprint $table) {
            if(Schema::hasColumn('invoices', 'user_id')) {
                $table->dropForeign('271249_5c76846973c9e');
                $table->dropIndex('271249_5c76846973c9e');
                $table->dropColumn('user_id');
            }
            if(Schema::hasColumn('invoices', 'project_id')) {
                $table->dropForeign('271249_5c76846994e62');
                $table->dropIndex('271249_5c76846994e62');
                $table->dropColumn('project_id');
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
        Schema::table('invoices', function (Blueprint $table) {
                        
        });

    }
}
