<?php

namespace Database\Seeders;

use App\Models\RouteData;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class RouteDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RouteData::truncate();
  
        $json = File::get("database/data/route_data.json");
        $countries = json_decode($json);
  
        foreach ($countries as $key => $value) {
            RouteData::create([
                "id" => $value->id,
                "route_id" => $value->route_id,
                "calendar_id" => $value->calendar_id,
                "vinculation_route" => $value->vinculation_route,
                "route_circular" => $value->route_circular,
                "date_init" => $value->date_init,
                "date_finish" => $value->date_finish,
                "mon" => $value->mon,
                "tue" => $value->tue,
                "wed" => $value->wed,
                "thu" => $value->thu,
                "fri" => $value->fri,
                "sat" => $value->sat,
                "sun" => $value->sun,
                "route_id" => $value->route_id,
            ]);
        }
    }
}
