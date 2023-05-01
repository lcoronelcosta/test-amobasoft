<?php

namespace Database\Seeders;

use App\Models\CalendarDaysDisabled;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class CalendarDaysDisabledSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CalendarDaysDisabled::truncate();
  
        $json = File::get("database/data/calendar_days_disabled.json");
        $countries = json_decode($json);
  
        foreach ($countries as $key => $value) {
            CalendarDaysDisabled::create([
                "id" => $value->id,
                "calendar_id" => $value->calendar_id,
                "day" => $value->day,
                "enabled" => $value->enabled
            ]);
        }
    }
}
