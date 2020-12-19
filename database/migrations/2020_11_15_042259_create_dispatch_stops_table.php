<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDispatchStopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dispatch_stops', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dispatch_id');
            $table->unsignedBigInteger('warehouse_id');
            $table->decimal('amount', 15, 5)->default(0.00000);
            $table->text('comment')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dispatch_stops');
    }
}
