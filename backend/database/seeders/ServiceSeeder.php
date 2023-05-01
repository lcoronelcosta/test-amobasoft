<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Service::truncate();
  
        $json = File::get("database/data/services.json");
        $countries = json_decode($json);
  
        foreach ($countries as $key => $value) {
            Service::create([
                "id" => $value->id,
                "external_id" => $value->external_id,
                "external_budget_id" => $value->external_budget_id,
                "external_route_id" => $value->external_route_id,
                "track_id" => $value->track_id,
                "name" => $value->name,
                "notes" => $value->notes,
                "timestamp" => $value->timestamp,
                "arrival_address" => $value->arrival_address,
                "arrival_timestamp" => $value->arrival_timestamp,
                "departure_address" => $value->departure_address,
                "departure_timestamp" => $value->departure_timestamp,
                "capacity" => $value->capacity,
                "confirmed_pax_count" => $value->confirmed_pax_count,
                "reported_departure_timestamp" => $value->reported_departure_timestamp,
                "reported_departure_kms" => $value->reported_departure_kms,
                "reported_arrival_timestamp" => $value->reported_arrival_timestamp,
                "reported_arrival_kms" => $value->reported_arrival_kms,
                "reported_vehicle_plate_number" => $value->reported_vehicle_plate_number,
                "status" => $value->status,
                "status_info" => $value->status_info,
                "reprocess_status" => $value->reprocess_status,
                "return" => $value->return,
                "synchronized_downstream" => $value->departure_timestamp,
                "synchronized_upstream" => $value->synchronized_upstream,
                "province_id" => $value->province_id,
                "sale_tickets_drivers" => $value->sale_tickets_drivers,
                "notes_drivers" => $value->notes_drivers,
                "itinerary_drivers" => $value->itinerary_drivers,
                "cost_if_externalized" => $value->cost_if_externalized,
                "created_at" => $value->created,
                "updated_at" => $value->modified,
            ]);
        }
    }
}
