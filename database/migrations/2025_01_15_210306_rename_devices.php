<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameDevices extends Migration
{
    public function up(): void
    {
        Schema::rename('devices', 'elisDevices'); // Nahraďte 'new_table_name' novým názvom tabuľky
    }

    public function down(): void
    {
        Schema::rename('elisDevices', 'devices'); // Obnovte pôvodný názov tabuľky, ak sa migrácia vráti
    }
}
