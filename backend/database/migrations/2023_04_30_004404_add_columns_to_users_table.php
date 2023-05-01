<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('first_name')->after('id');
            $table->string('last_name')->after('first_name');
            $table->string('phone_number')->nullable()->after('last_name');
            $table->string('picture')->nullable()->after('phone_number');
            $table->timestamp('last_online', $precision = 0)->nullable()->after('remember_token');
            $table->string('verification_code')->nullable()->after('last_online');
            $table->string('new_email')->nullable()->after('verification_code');
            $table->integer('status')->nullable()->after('new_email');
            $table->integer('first')->nullable()->after('status');
            $table->timestamp('last_accept_date', $precision = 0)->nullable()->after('first');
            $table->integer('company_contact')->nullable()->after('last_accept_date');
            $table->decimal('credits', $precision = 8, $scale = 2)->nullable()->after('company_contact');
            $table->integer('first_trip')->nullable()->after('credits');
            $table->integer('incomplete_profile')->nullable()->after('first_trip');
            $table->integer('phone_verify')->nullable()->after('incomplete_profile');
            $table->string('token_auto_login')->nullable()->after('verification_code');
            $table->string('user_vertical')->nullable()->after('token_auto_login');
            $table->integer('language_id')->nullable()->after('user_vertical');
            $table->integer('no_registered')->nullable()->after('language_id');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
