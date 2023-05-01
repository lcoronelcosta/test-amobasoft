<?php

namespace Database\Seeders;

use App\Models\Calendar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class CalendarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Calendar::truncate();
  
        $json = File::get("database/data/calendar.json");
        $countries = json_decode($json);
  
        foreach ($countries as $key => $value) {
            Calendar::create([
                "id" => $value->id,
                "calendar_id" => null,
                "name" => $value->name
            ]);
        }
    }
}
