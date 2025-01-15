<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameElisDevices extends Migration
{
    public function up()
    {
        Schema::rename('elisDevices', 'devices'); // Nahraďte 'new_table_name' novým názvom tabuľky
    }

    public function down()
    {
        Schema::rename('devices', 'elisDevices'); // Obnovte pôvodný názov tabuľky, ak sa migrácia vráti
    }
}
