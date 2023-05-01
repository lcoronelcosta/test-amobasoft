<?php

namespace Database\Seeders;

use App\Models\Reservation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Reservation::truncate();
  
        $json = File::get("database/data/reservations.json");
        $countries = json_decode($json);
  
        foreach ($countries as $key => $value) {
            Reservation::create([
                "id" => $value->id,
                "user_plan_id" => $value->user_plan_id,
                "route_id" => $value->route_id,
                "track_id" => $value->track_id,
                "reservation_start" => $value->reservation_start,
                "reservation_end" => $value->reservation_end,
                "route_stop_origin_id" => $value->route_stop_origin_id,
                "route_stop_destination_id" => $value->route_stop_destination_id,
                "created_at" => $value->created_at,
                "updated_at" => $value->updated_at,
                "deleted_at" => $value->deleted_at,
            ]);

        }
    }
}
