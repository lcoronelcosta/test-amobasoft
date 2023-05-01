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
        Schema::create('user_plans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->integer('currency_id')->nullable();
            $table->integer('next_user_plan_id')->nullable();
            $table->timestamp('start_timestamp', $precision = 0)->nullable();
            $table->timestamp('end_timestamp', $precision = 0)->nullable();
			$table->timestamp('renewal_timestamp', $precision = 0)->nullable();
			$table->decimal('renewal_price', $precision = 8, $scale = 2)->nullable();
            $table->integer('requires_invoice')->nullable();
			$table->integer('status')->nullable();
			$table->integer('financiation')->nullable();
			$table->integer('status_financiation')->nullable();
			$table->string('language')->nullable();
			$table->string('nif')->nullable();
			$table->string('business_name')->nullable();
			$table->decimal('pending_payment', $precision = 8, $scale = 2)->nullable();
			$table->timestamp('date_max_payment', $precision = 0)->nullable();
			$table->timestamp('proxim_start_timestamp', $precision = 0)->nullable();
			$table->timestamp('proxim_end_timestamp', $precision = 0)->nullable();
			$table->timestamp('proxim_renewal_timestamp', $precision = 0)->nullable();
			$table->decimal('proxim_renewal_price', $precision = 8, $scale = 2)->nullable();
			$table->decimal('credits_return', $precision = 8, $scale = 2)->nullable();
			$table->integer('company_id')->nullable(); //Podria ser una foreing key de tabla comapanies
			$table->integer('cancel_employee')->nullable();
			$table->integer('force_renovation')->nullable();
			$table->date('date_canceled', $precision = 0)->nullable();
			$table->decimal('amount_confirm_canceled', $precision = 8, $scale = 2)->nullable();
			$table->decimal('credit_confirm_canceled', $precision = 8, $scale = 2)->nullable();
			$table->integer('cost_center_id')->nullable(); //Podria ser una foreing key de tabla cost_centers
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_plans');
    }
};
