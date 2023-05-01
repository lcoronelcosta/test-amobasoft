<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::truncate();
  
        $json = File::get("database/data/users.json");
        $routes = json_decode($json);
  
        foreach ($routes as $key => $value) {
            User::create([
                "id" => $value->id,
                "name" => $value->first_name.' '.$value->last_name,
                "first_name" => $value->first_name,
                "last_name" => $value->last_name,
                "phone_number" => $value->phone_number,
                "picture" => $value->picture,
                "email" => $value->email,
                "password" => Hash::make('password'),
                "remember_token" => $value->remember_token,
                "last_online" => $value->last_online,
                "verification_code" => $value->verification_code,
                "new_email" => $value->new_email,
                "status" => $value->status,
                "first" => $value->first,
                "last_accept_date" => $value->last_accept_date,
                "company_contact" => $value->company_contact,
                "credits" => $value->credits,
                "first_trip" => $value->first_trip,
                "incomplete_profile" => $value->incomplete_profile,
                "phone_verify" => $value->phone_verify,
                "token_auto_login" => $value->token_auto_login,
                "user_vertical" => $value->user_vertical,
                "language_id" => $value->language_id,
                "no_registered" => $value->no_registered,
                "created_at" => $value->created,
                "updated_at" => $value->modified
            ]);
        }
    }
}
