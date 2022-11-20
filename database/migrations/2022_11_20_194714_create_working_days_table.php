<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkingDaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('working_days', function (Blueprint $table) {
            $table->id();
            $table->time("sat_open")->default("00:00");
            $table->time("sat_close")->default("00:00");
            $table->time("sun_open")->default("00:00");
            $table->time("sun_close")->default("00:00");
            $table->time("mon_open")->default("00:00");
            $table->time("mon_close")->default("00:00");
            $table->time("tue_open")->default("00:00");
            $table->time("tue_close")->default("00:00");
            $table->time("wed_open")->default("00:00");
            $table->time("wed_close")->default("00:00");
            $table->time("thu_open")->default("00:00");
            $table->time("thu_close")->default("00:00");
            $table->time("fri_open")->default("00:00");
            $table->time("fri_close")->default("00:00");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('working_days');
    }
}
