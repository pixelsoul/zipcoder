<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZipcodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zipcodes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('zip');
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('city')->nullable();
            $table->string('state_id')->nullable();
            $table->string('state_name')->nullable();
            $table->string('zcta')->nullable();
            $table->string('parent_zcta')->nullable();
            $table->string('population')->nullable();
            $table->string('density')->nullable();
            $table->string('county_fips')->nullable();
            $table->string('county_name')->nullable();
            $table->string('all_county_weights')->nullable();
            $table->string('imprecise')->nullable();
            $table->string('military')->nullable();
            $table->string('timezone')->nullable();
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
        Schema::dropIfExists('zipcodes');
    }
}
