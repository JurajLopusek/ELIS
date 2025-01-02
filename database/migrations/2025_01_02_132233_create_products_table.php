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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('serial_number')->unique();
            $table->string('name');
            $table->string('product_type');
            $table->string('calibration_time');
            $table->string('service_interval_time');
            $table->string('service_interval_m2');
            $table->string('service_interval_km');
            $table->string('application_subscription');
            $table->integer('warning');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
