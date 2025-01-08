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
        Schema::table('devices_in_use', function (Blueprint $table) {
            $table->string('device_type')->nullable();
            $table->string('registration')->nullable();
            $table->string('qc_data')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('devices_in_use', function (Blueprint $table) {
            $table->dropColumn(['device_type', 'registration','qc_data']);

        });
    }
};
