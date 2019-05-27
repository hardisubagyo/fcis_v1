<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWaypointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('waypoint', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('x',15,8);
            $table->double('y',15,8);
            $table->double('alt',15,8);
            $table->double('speed',15,8);
            $table->double('delay',15,8);
            $table->string('name');
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
        Schema::dropIfExists('waypoints');
    }
}
