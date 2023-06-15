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
        Schema::table('reservations', function (Blueprint $table) {
            $table->string('arrival_stop_time')->after('pickup_time')->nullable();
            $table->string('arrival_stop_place')->after('arrival_stop_time')->nullable();
            $table->string('departure_stop_time')->after('arrival_stop_place')->nullable();
            $table->string('departure_stop_place')->after('departure_stop_time')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reservations', function (Blueprint $table) {
            $table->dropColumn([
                'arrival_stop_time',
                'arrival_stop_place',
                'departure_stop_time',
                'departure_stop_place'
            ]);
        });
    }
};
