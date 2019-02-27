<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1551278330InvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('invoices', function (Blueprint $table) {
            if(Schema::hasColumn('invoices', 'selection_criteria')) {
                $table->dropColumn('selection_criteria');
            }
            
        });
Schema::table('invoices', function (Blueprint $table) {
            
if (!Schema::hasColumn('invoices', 'selection_criteria')) {
                $table->text('selection_criteria')->nullable();
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
            $table->dropColumn('selection_criteria');
            
        });
Schema::table('invoices', function (Blueprint $table) {
                        $table->string('selection_criteria');
                
        });

    }
}
