<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5c77b161e4333RelationshipsToInvoiceTable extends Migration
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
                if (!Schema::hasColumn('invoices', 'pm_id')) {
                $table->integer('pm_id')->unsigned()->nullable();
                $table->foreign('pm_id', '271249_5c76846aadefa')->references('id')->on('users')->onDelete('cascade');
                }
                if (!Schema::hasColumn('invoices', 'finance_id')) {
                $table->integer('finance_id')->unsigned()->nullable();
                $table->foreign('finance_id', '271249_5c7689584f8a8')->references('id')->on('users')->onDelete('cascade');
                }
                if (!Schema::hasColumn('invoices', 'created_by_id')) {
                $table->integer('created_by_id')->unsigned()->nullable();
                $table->foreign('created_by_id', '271249_5c76b5977faad')->references('id')->on('users')->onDelete('cascade');
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
            if(Schema::hasColumn('invoices', 'expense_type_id')) {
                $table->dropForeign('271249_5c768469ab2d4');
                $table->dropIndex('271249_5c768469ab2d4');
                $table->dropColumn('expense_type_id');
            }
            if(Schema::hasColumn('invoices', 'meeting_id')) {
                $table->dropForeign('271249_5c768469c4003');
                $table->dropIndex('271249_5c768469c4003');
                $table->dropColumn('meeting_id');
            }
            if(Schema::hasColumn('invoices', 'contingency_id')) {
                $table->dropForeign('271249_5c768469dbb41');
                $table->dropIndex('271249_5c768469dbb41');
                $table->dropColumn('contingency_id');
            }
            if(Schema::hasColumn('invoices', 'provider_id')) {
                $table->dropForeign('271249_5c768469f2b7b');
                $table->dropIndex('271249_5c768469f2b7b');
                $table->dropColumn('provider_id');
            }
            if(Schema::hasColumn('invoices', 'service_type_id')) {
                $table->dropForeign('271249_5c76846a1d7a2');
                $table->dropIndex('271249_5c76846a1d7a2');
                $table->dropColumn('service_type_id');
            }
            if(Schema::hasColumn('invoices', 'pm_id')) {
                $table->dropForeign('271249_5c76846aadefa');
                $table->dropIndex('271249_5c76846aadefa');
                $table->dropColumn('pm_id');
            }
            if(Schema::hasColumn('invoices', 'finance_id')) {
                $table->dropForeign('271249_5c7689584f8a8');
                $table->dropIndex('271249_5c7689584f8a8');
                $table->dropColumn('finance_id');
            }
            if(Schema::hasColumn('invoices', 'created_by_id')) {
                $table->dropForeign('271249_5c76b5977faad');
                $table->dropIndex('271249_5c76b5977faad');
                $table->dropColumn('created_by_id');
            }
            
        });
    }
}
