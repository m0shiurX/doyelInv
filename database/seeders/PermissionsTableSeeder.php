<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'basic_c_r_m_access',
            ],
            [
                'id'    => 18,
                'title' => 'crm_status_create',
            ],
            [
                'id'    => 19,
                'title' => 'crm_status_edit',
            ],
            [
                'id'    => 20,
                'title' => 'crm_status_show',
            ],
            [
                'id'    => 21,
                'title' => 'crm_status_delete',
            ],
            [
                'id'    => 22,
                'title' => 'crm_status_access',
            ],
            [
                'id'    => 23,
                'title' => 'crm_customer_create',
            ],
            [
                'id'    => 24,
                'title' => 'crm_customer_edit',
            ],
            [
                'id'    => 25,
                'title' => 'crm_customer_show',
            ],
            [
                'id'    => 26,
                'title' => 'crm_customer_delete',
            ],
            [
                'id'    => 27,
                'title' => 'crm_customer_access',
            ],
            [
                'id'    => 28,
                'title' => 'crm_note_create',
            ],
            [
                'id'    => 29,
                'title' => 'crm_note_edit',
            ],
            [
                'id'    => 30,
                'title' => 'crm_note_show',
            ],
            [
                'id'    => 31,
                'title' => 'crm_note_delete',
            ],
            [
                'id'    => 32,
                'title' => 'crm_note_access',
            ],
            [
                'id'    => 33,
                'title' => 'crm_document_create',
            ],
            [
                'id'    => 34,
                'title' => 'crm_document_edit',
            ],
            [
                'id'    => 35,
                'title' => 'crm_document_show',
            ],
            [
                'id'    => 36,
                'title' => 'crm_document_delete',
            ],
            [
                'id'    => 37,
                'title' => 'crm_document_access',
            ],
            [
                'id'    => 38,
                'title' => 'invoice_access',
            ],
            [
                'id'    => 39,
                'title' => 'sell_create',
            ],
            [
                'id'    => 40,
                'title' => 'sell_edit',
            ],
            [
                'id'    => 41,
                'title' => 'sell_show',
            ],
            [
                'id'    => 42,
                'title' => 'sell_delete',
            ],
            [
                'id'    => 43,
                'title' => 'sell_access',
            ],
            [
                'id'    => 44,
                'title' => 'payment_create',
            ],
            [
                'id'    => 45,
                'title' => 'payment_edit',
            ],
            [
                'id'    => 46,
                'title' => 'payment_delete',
            ],
            [
                'id'    => 47,
                'title' => 'payment_access',
            ],
            [
                'id'    => 48,
                'title' => 'stock_access',
            ],
            [
                'id'    => 49,
                'title' => 'production_create',
            ],
            [
                'id'    => 50,
                'title' => 'production_edit',
            ],
            [
                'id'    => 51,
                'title' => 'production_show',
            ],
            [
                'id'    => 52,
                'title' => 'production_delete',
            ],
            [
                'id'    => 53,
                'title' => 'production_access',
            ],
            [
                'id'    => 54,
                'title' => 'customer_due_access',
            ],
            [
                'id'    => 55,
                'title' => 'stock_wastage_create',
            ],
            [
                'id'    => 56,
                'title' => 'stock_wastage_access',
            ],
            [
                'id'    => 57,
                'title' => 'stock_history_access',
            ],
            [
                'id'    => 58,
                'title' => 'factory_access',
            ],
            [
                'id'    => 59,
                'title' => 'customer_access',
            ],
            [
                'id'    => 60,
                'title' => 'add_to_stock_create',
            ],
            [
                'id'    => 61,
                'title' => 'add_to_stock_edit',
            ],
            [
                'id'    => 62,
                'title' => 'add_to_stock_show',
            ],
            [
                'id'    => 63,
                'title' => 'add_to_stock_delete',
            ],
            [
                'id'    => 64,
                'title' => 'add_to_stock_access',
            ],
            [
                'id'    => 65,
                'title' => 'add_customer_create',
            ],
            [
                'id'    => 66,
                'title' => 'add_customer_edit',
            ],
            [
                'id'    => 67,
                'title' => 'add_customer_show',
            ],
            [
                'id'    => 68,
                'title' => 'add_customer_delete',
            ],
            [
                'id'    => 69,
                'title' => 'add_customer_access',
            ],
            [
                'id'    => 70,
                'title' => 'new_sale_create',
            ],
            [
                'id'    => 71,
                'title' => 'new_sale_edit',
            ],
            [
                'id'    => 72,
                'title' => 'new_sale_show',
            ],
            [
                'id'    => 73,
                'title' => 'new_sale_delete',
            ],
            [
                'id'    => 74,
                'title' => 'new_sale_access',
            ],
            [
                'id'    => 75,
                'title' => 'profile_password_edit',
            ],
            [
                'id'    => 76,
                'title' => 'customers_opening_balance_access',
            ],
            [
                'id'    => 77,
                'title' => 'customers_opening_balance_create',
            ],
        ];

        Permission::insert($permissions);
    }
}
