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
        Schema::table('devices', function (Blueprint $table) {
            $table->string('registration')->nullable()->change();
            $table->string('qc_data')->nullable()->change();
            $table->string('text')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('devices', function (Blueprint $table) {
            $table->string('registration')->nullable(false)->change();
            $table->string('qc_data')->nullable(false)->change();
            $table->string('text')->nullable(false)->change();

        });
    }
};
