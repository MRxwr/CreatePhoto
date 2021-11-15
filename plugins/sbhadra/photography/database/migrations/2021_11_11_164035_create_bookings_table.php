<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('package_id', 11);
            $table->string('transaction_id', 250)->nullable();
            $table->date('booking_date')->nullable();
            $table->string('booking_time', 150)->nullable();
            $table->tinyInteger('is_filming')->default(0);
            $table->string('rating', 25)->nullable();
            $table->decimal('booking_price',10,2)->nullable();
            $table->string('customer_name', 100)->nullable();
            $table->string('mobile_number', 100)->nullable();
            $table->string('baby_name', 100)->nullable();
            $table->string('baby_age', 100)->nullable();
            $table->string('instructions')->nullable();
            $table->tinyInteger('sms')->default(0);
            $table->tinyInteger('refunded')->default(0);
            $table->string('status', 50)->default('yes');
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
        Schema::dropIfExists('bookings');
    }
}