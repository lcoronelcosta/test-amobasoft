<?php

namespace Database\Seeders;

use App\Models\Route;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class RouteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Route::truncate();
  
        $json = File::get("database/data/routes.json");
        $routes = json_decode($json);
  
        foreach ($routes as $key => $value) {
            Route::create([
                "id" => $value->id,
                "external_id" => $value->external_id,
                "invitation_code" => $value->invitation_code,
                "title" => $value->title,
                "start_timestamp" => $value->start_timestamp,
                "end_timestamp" => $value->end_timestamp
            ]);
        }
    }
}
