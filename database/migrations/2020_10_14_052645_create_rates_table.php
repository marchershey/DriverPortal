<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rates', function (Blueprint $table) {
            $table->id();
            $table->integer('months');
            $table->double('mileage', 5, 3);
            $table->double('roll_off', 6, 4);
            $table->double('pack_out', 6, 4);
            $table->double('hourly', 5, 2);
            $table->double('stop_pay', 4, 2);
            $table->double('drop_hook', 4, 2);
            $table->double('pallet', 4, 2);
            $table->double('stale', 4, 2);
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
        Schema::dropIfExists('rates');
    }
}
