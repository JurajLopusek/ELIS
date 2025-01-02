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
        Schema::create('partners', function (Blueprint $table) {
            $table->id();
            $table->string('partner_name');
            $table->string('country');
            $table->string('distributor');
            $table->string('gps');
            $table->string('servis_distributor');
            $table->integer('ico');
            $table->integer('dic');
            $table->string('address');
            $table->string('contact_person1')->nullable();
            $table->string('contact_person2')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partners');
    }
};
