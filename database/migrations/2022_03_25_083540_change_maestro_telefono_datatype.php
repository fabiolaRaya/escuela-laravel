<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ChangeMaestroTelefonoDatatype extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('maestros', function (Blueprint $table) {
            DB::statement("ALTER TABLE maestros MODIFY telefono VARCHAR(10)");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('maestros', function (Blueprint $table) {
            DB::statement("ALTER TABLE maestros MODIFY telefono NUMBER");
        });
    }
}
