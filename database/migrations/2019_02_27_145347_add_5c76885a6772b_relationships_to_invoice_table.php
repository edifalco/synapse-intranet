<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5c76885a6772bRelationshipsToInvoiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('invoices', function(Blueprint $table) {
            if (!Schema::hasColumn('invoices', 'user_id')) {
                $table->integer('user_id')->unsigned()->nullable();
                $table->foreign('user_id', '271249_5c76846973c9e')->references('id')->on('users')->onDelete('cascade');
                }
                if (!Schema::hasColumn('invoices', 'project_id')) {
                $table->integer('project_id')->unsigned()->nullable();
                $table->foreign('project_id', '271249_5c76846994e62')->references('id')->on('projects')->onDelete('cascade');
                }
                if (!Schema::hasColumn('invoices', 'expense_type_id')) {
                $table->integer('expense_type_id')->unsigned()->nullable();
                $table->foreign('expense_type_id', '271249_5c768469ab2d4')->references('id')->on('expense_types')->onDelete('cascade');
                }
                if (!Schema::hasColumn('invoices', 'meeting_id')) {
                $table->integer('meeting_id')->unsigned()->nullable();
                $table->foreign('meeting_id', '271249_5c768469c4003')->references('id')->on('meetings')->onDelete('cascade');
                }
                if (!Schema::hasColumn('invoices', 'contingency_id')) {
                $table->integer('contingency_id')->unsigned()->nullable();
                $table->foreign('contingency_id', '271249_5c768469dbb41')->references('id')->on('contingencies')->onDelete('cascade');
                }
                if (!Schema::hasColumn('invoices', 'provider_id')) {
                $table->integer('provider_id')->unsigned()->nullable();
                $table->foreign('provider_id', '271249_5c768469f2b7b')->references('id')->on('providers')->onDelete('cascade');
                }
                if (!Schema::hasColumn('invoices', 'service_type_id')) {
                $table->integer('service_type_id')->unsigned()->nullable();
                $table->foreign('service_type_id', '271249_5c76846a1d7a2')->references('id')->on('service_types')->onDelete('cascade');
                }
                if (!Schema::hasColumn('invoices', 'photo_id')) {
                $table->integer('photo_id')->unsigned()->nullable();
                $table->foreign('photo_id', '271249_5c76846a3a6b7')->references('id')->on('photos')->onDelete('cascade');
                }
                if (!Schema::hasColumn('invoices', 'budget1_id')) {
                $table->integer('budget1_id')->unsigned()->nullable();
                $table->foreign('budget1_id', '271249_5c76846a50a2d')->references('id')->on('photos')->onDelete('cascade');
                }
                if (!Schema::hasColumn('invoices', 'budget2_id')) {
                $table->integer('budget2_id')->unsigned()->nullable();
                $table->foreign('budget2_id', '271249_5c76846a6d51e')->references('id')->on('photos')->onDelete('cascade');
                }
                if (!Schema::hasColumn('invoices', 'budget3_id')) {
                $table->integer('budget3_id')->unsigned()->nullable();
                $table->foreign('budget3_id', '271249_5c76846a838d3')->references('id')->on('photos')->onDelete('cascade');
                }
                if (!Schema::hasColumn('invoices', 'contract_id')) {
                $table->integer('contract_id')->unsigned()->nullable();
                $table->foreign('contract_id', '271249_5c76846a98ecc')->references('id')->on('photos')->onDelete('cascade');
                }
                if (!Schema::hasColumn('invoices', 'pm_id')) {
                $table->integer('pm_id')->unsigned()->nullable();
                $table->foreign('pm_id', '271249_5c76846aadefa')->references('id')->on('users')->onDelete('cascade');
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
        Schema::table('invoices', function(Blueprint $table) {
            
        });
    }
}
