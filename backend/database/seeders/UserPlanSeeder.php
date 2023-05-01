<?php

namespace Database\Seeders;

use App\Models\UserPlan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class UserPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserPlan::truncate();
  
        $json = File::get("database/data/user_plans.json");
        $countries = json_decode($json);
  
        foreach ($countries as $key => $value) {
            UserPlan::create([
                "id" => $value->id,
                "user_id" => $value->user_id,
                "currency_id" => $value->currency_id,
                "next_user_plan_id" => $value->next_user_plan_id,
                "start_timestamp" => $value->start_timestamp,
                "end_timestamp" => $value->end_timestamp,
                "renewal_timestamp" => $value->renewal_timestamp,
                "renewal_price" => $value->renewal_price,
                "requires_invoice" => $value->requires_invoice,
                "status" => $value->status,
                "financiation" => $value->financiation,
                "status_financiation" => $value->status_financiation,

                "language" => $value->language,
                "nif" => $value->nif,
                "business_name" => $value->business_name,
                "pending_payment" => $value->pending_payment,
                "date_max_payment" => $value->date_max_payment,
                "proxim_start_timestamp" => $value->proxim_start_timestamp,
                "proxim_end_timestamp" => $value->proxim_end_timestamp,
                "proxim_renewal_timestamp" => $value->proxim_renewal_timestamp,
                "proxim_renewal_price" => $value->proxim_renewal_price,
                "credits_return" => $value->credits_return,
                "company_id" => $value->company_id,
                "cancel_employee" => $value->cancel_employee,
                "force_renovation" => $value->force_renovation,
                "date_canceled" => $value->date_canceled,
                "amount_confirm_canceled" => $value->amount_confirm_canceled,
                "credit_confirm_canceled" => $value->credit_confirm_canceled,
                "cost_center_id" => $value->cost_center_id,
                "created_at" => $value->created,
                "updated_at" => $value->modified
            ]);
        }
    }
}
