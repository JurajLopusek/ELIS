<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProductIdToDevicesInUseTable extends Migration
{
    public function up(): void
    {
        Schema::table('devices_in_use', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id')->nullable(); // Pridanie stĺpca product_id
        });
    }

    public function down(): void
    {
        Schema::table('devices_in_use', function (Blueprint $table) {
            $table->dropColumn('product_id'); // Zmazanie stĺpca v prípade rollbacku migrácie
        });
    }
}
