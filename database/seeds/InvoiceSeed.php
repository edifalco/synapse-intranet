<?php

use Illuminate\Database\Seeder;

class InvoiceSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'user_id' => null, 'project_id' => null, 'expense_type_id' => null, 'meeting_id' => null, 'contingency_id' => null, 'date' => '', 'due_date' => '31-03-2019', 'provider_id' => null, 'invoice_subtotal' => null, 'invoice_taxes' => null, 'invoice_total' => null, 'budget_subtotal' => null, 'budget_taxes' => null, 'budget_total' => null, 'service' => null, 'selection_criteria' => null, 'service_type_id' => null, 'pm_id' => null, 'pm_approval_date' => '', 'finance_id' => null, 'finance_approval_date' => '',],
            ['id' => 2, 'user_id' => null, 'project_id' => null, 'expense_type_id' => null, 'meeting_id' => null, 'contingency_id' => null, 'date' => '', 'due_date' => '02-03-2019', 'provider_id' => null, 'invoice_subtotal' => 100, 'invoice_taxes' => null, 'invoice_total' => null, 'budget_subtotal' => null, 'budget_taxes' => null, 'budget_total' => null, 'service' => null, 'selection_criteria' => null, 'service_type_id' => null, 'pm_id' => null, 'pm_approval_date' => '', 'finance_id' => null, 'finance_approval_date' => '',],

        ];

        foreach ($items as $item) {
            \App\Invoice::create($item);
        }
    }
}
