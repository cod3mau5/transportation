<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNullablesToReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reservations', function (Blueprint $table) {
            $table->date('arrival_date')->nullable()->change();
            $table->string('arrival_airline')->nullable()->change();
            $table->string('arrival_flight')->nullable()->change();
            $table->string('arrival_time')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reservations', function (Blueprint $table) {
            $table->date('arrival_date')->change();
            $table->string('arrival_airline')->change();
            $table->string('arrival_flight')->change();
            $table->string('arrival_time')->change();
        });
    }
}
