<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1551279242InvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('invoices', function (Blueprint $table) {
            if(Schema::hasColumn('invoices', 'photo_id')) {
                $table->dropForeign('271249_5c76846a3a6b7');
                $table->dropIndex('271249_5c76846a3a6b7');
                $table->dropColumn('photo_id');
            }
            if(Schema::hasColumn('invoices', 'budget1_id')) {
                $table->dropForeign('271249_5c76846a50a2d');
                $table->dropIndex('271249_5c76846a50a2d');
                $table->dropColumn('budget1_id');
            }
            if(Schema::hasColumn('invoices', 'budget2_id')) {
                $table->dropForeign('271249_5c76846a6d51e');
                $table->dropIndex('271249_5c76846a6d51e');
                $table->dropColumn('budget2_id');
            }
            if(Schema::hasColumn('invoices', 'budget3_id')) {
                $table->dropForeign('271249_5c76846a838d3');
                $table->dropIndex('271249_5c76846a838d3');
                $table->dropColumn('budget3_id');
            }
            if(Schema::hasColumn('invoices', 'contract_id')) {
                $table->dropForeign('271249_5c76846a98ecc');
                $table->dropIndex('271249_5c76846a98ecc');
                $table->dropColumn('contract_id');
            }
            if(Schema::hasColumn('invoices', 'file')) {
                $table->dropColumn('file');
            }
            if(Schema::hasColumn('invoices', 'invoice_file')) {
                $table->dropColumn('invoice_file');
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
                        $table->string('file')->nullable();
                
        });

    }
}
