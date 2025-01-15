<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDeviceIdToDevicesInUse extends Migration
{
    /**
     * Spusti migráciu.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('devices_in_use', function (Blueprint $table) {
            // Ak ešte neexistuje stĺpec device_id, pridaj ho
            $table->unsignedBigInteger('device_id');

            // Pridanie cudzí kľúč, ktorý referencuje stĺpec id v tabuľke devices
            $table->foreign('device_id')->references('id')->on('devices')->onDelete('cascade');
        });
    }

    /**
     * Zrušiť migráciu.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('devices_in_use', function (Blueprint $table) {
            // Odstránenie cudzí kľúč
            $table->dropForeign(['device_id']);
            // Odstránenie stĺpca device_id
            $table->dropColumn('device_id');
        });
    }
}

