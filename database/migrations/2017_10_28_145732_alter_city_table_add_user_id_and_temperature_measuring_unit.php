<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterCityTableAddUserIdAndTemperatureMeasuringUnit extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('cities', function($table) {
        $table->integer('user_id');
        $table->string('measuring_unit');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('citites', function($table) {
        $table->dropColumn('paid');
        $table->string('measuring_unit');
      });
    }
}
