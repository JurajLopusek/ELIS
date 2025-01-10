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
            // Pridanie cudzieho kľúča 'products_id'
            if (!Schema::hasColumn('devices', 'products_id')) {
                $table->unsignedBigInteger('products_id')->after('serial_number');
                $table->foreign('products_id')->references('id')->on('products')->onDelete('cascade');
            }
            $table->dropColumn('device_name');
            $table->dropColumn('device_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('devices', function (Blueprint $table) {
            // Zrušenie cudzieho kľúča
            $table->dropForeign(['products_id']);
            $table->dropColumn('products_id');
        });
    }
};
