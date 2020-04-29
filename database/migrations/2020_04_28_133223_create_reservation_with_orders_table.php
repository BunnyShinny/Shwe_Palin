<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationWithOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservation_with__orders', function (Blueprint $table) {
            $table->increments('id');
            $table->text('cart');
            $table->string('name');
            $table->string('phone');
            $table->integer('no_of_people');
            $table->string('date');
            $table->unsignedBigInteger ('branch_id');
            $table->boolean('confirm')->default(0);
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
        Schema::dropIfExists('reservation_with__orders');
    }
}