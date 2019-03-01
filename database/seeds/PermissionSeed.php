<?php

use Illuminate\Database\Seeder;

class PermissionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'title' => 'meeting_access',],
            ['id' => 2, 'title' => 'meeting_create',],
            ['id' => 3, 'title' => 'meeting_edit',],
            ['id' => 4, 'title' => 'meeting_view',],
            ['id' => 5, 'title' => 'meeting_delete',],
            ['id' => 6, 'title' => 'status_access',],
            ['id' => 7, 'title' => 'status_create',],
            ['id' => 8, 'title' => 'status_edit',],
            ['id' => 9, 'title' => 'status_view',],
            ['id' => 10, 'title' => 'status_delete',],
            ['id' => 11, 'title' => 'message_access',],
            ['id' => 12, 'title' => 'message_create',],
            ['id' => 13, 'title' => 'message_edit',],
            ['id' => 14, 'title' => 'message_view',],
            ['id' => 15, 'title' => 'message_delete',],
            ['id' => 16, 'title' => 'invoice_access',],
            ['id' => 17, 'title' => 'invoice_create',],
            ['id' => 18, 'title' => 'invoice_edit',],
            ['id' => 19, 'title' => 'invoice_view',],
            ['id' => 20, 'title' => 'invoice_delete',],
            ['id' => 21, 'title' => 'project_access',],
            ['id' => 22, 'title' => 'project_create',],
            ['id' => 23, 'title' => 'project_edit',],
            ['id' => 24, 'title' => 'project_view',],
            ['id' => 25, 'title' => 'project_delete',],
            ['id' => 26, 'title' => 'budget_access',],
            ['id' => 27, 'title' => 'budget_create',],
            ['id' => 28, 'title' => 'budget_edit',],
            ['id' => 29, 'title' => 'budget_view',],
            ['id' => 30, 'title' => 'budget_delete',],
            ['id' => 31, 'title' => 'invoice_management_access',],
            ['id' => 32, 'title' => 'expense_type_access',],
            ['id' => 33, 'title' => 'expense_type_create',],
            ['id' => 34, 'title' => 'expense_type_edit',],
            ['id' => 35, 'title' => 'expense_type_view',],
            ['id' => 36, 'title' => 'expense_type_delete',],
            ['id' => 37, 'title' => 'contingency_access',],
            ['id' => 38, 'title' => 'contingency_create',],
            ['id' => 39, 'title' => 'contingency_edit',],
            ['id' => 40, 'title' => 'contingency_view',],
            ['id' => 41, 'title' => 'contingency_delete',],
            ['id' => 42, 'title' => 'category_access',],
            ['id' => 43, 'title' => 'category_create',],
            ['id' => 44, 'title' => 'category_edit',],
            ['id' => 45, 'title' => 'category_view',],
            ['id' => 46, 'title' => 'category_delete',],
            ['id' => 47, 'title' => 'provider_access',],
            ['id' => 48, 'title' => 'provider_create',],
            ['id' => 49, 'title' => 'provider_edit',],
            ['id' => 50, 'title' => 'provider_view',],
            ['id' => 51, 'title' => 'provider_delete',],
            ['id' => 52, 'title' => 'service_type_access',],
            ['id' => 53, 'title' => 'service_type_create',],
            ['id' => 54, 'title' => 'service_type_edit',],
            ['id' => 55, 'title' => 'service_type_view',],
            ['id' => 56, 'title' => 'service_type_delete',],
            ['id' => 57, 'title' => 'year_access',],
            ['id' => 58, 'title' => 'year_create',],
            ['id' => 59, 'title' => 'year_edit',],
            ['id' => 60, 'title' => 'year_view',],
            ['id' => 61, 'title' => 'year_delete',],
            ['id' => 62, 'title' => 'user_management_access',],
            ['id' => 63, 'title' => 'permission_access',],
            ['id' => 64, 'title' => 'permission_create',],
            ['id' => 65, 'title' => 'permission_edit',],
            ['id' => 66, 'title' => 'permission_view',],
            ['id' => 67, 'title' => 'permission_delete',],
            ['id' => 68, 'title' => 'role_access',],
            ['id' => 69, 'title' => 'role_create',],
            ['id' => 70, 'title' => 'role_edit',],
            ['id' => 71, 'title' => 'role_view',],
            ['id' => 72, 'title' => 'role_delete',],
            ['id' => 73, 'title' => 'user_access',],
            ['id' => 74, 'title' => 'user_create',],
            ['id' => 75, 'title' => 'user_edit',],
            ['id' => 76, 'title' => 'user_view',],
            ['id' => 77, 'title' => 'user_delete',],
            ['id' => 78, 'title' => 'user_action_access',],
            ['id' => 79, 'title' => 'user_action_create',],
            ['id' => 80, 'title' => 'user_action_edit',],
            ['id' => 81, 'title' => 'user_action_view',],
            ['id' => 82, 'title' => 'user_action_delete',],

        ];

        foreach ($items as $item) {
            \App\Permission::create($item);
        }
    }
}
