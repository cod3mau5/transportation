<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignsToRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rates', function (Blueprint $table) {
            $table->integer('zone_id')->unsigned()->nullable()->change();
            $table->foreign('zone_id')->references('id')->on('zones')->onDelete('cascade');
            $table->integer('unit_id')->unsigned()->nullable()->change();
            $table->foreign('unit_id')->references('id')->on('units')->onDelete('cascade');

            $table->double('privateoneway', 10, 2)->after('roundtrip');
            $table->double('privateroundtrip', 10, 2)->after('privateoneway');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::enableForeignKeyConstraints();
        Schema::table('rates', function (Blueprint $table) {
            $table->dropForeign(['zone_id']);
            $table->dropForeign(['unit_id']);
            $table->dropColumn(['privateoneway','privateroundtrip']);
        });
        Schema::disableForeignKeyConstraints();
    }
}
