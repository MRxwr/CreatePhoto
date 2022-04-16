<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdatePackageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('packages', function (Blueprint $table) {
            $table->integer('is_pieces')->default(0);
            $table->integer('rate_per_pieces')->default(10);
            $table->longText('theme_category_ids', 300)->nullable();
            $table->integer('is_theme_category')->default(0);

        });
        Schema::table('bookings', function (Blueprint $table) {
            $table->integer('number_of_pieces')->default(0);
            $table->integer('rate_per_pieces')->default(0);
            $table->string('pictures_type', 250)->nullable();  
        });
       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('packages');
    }
}
