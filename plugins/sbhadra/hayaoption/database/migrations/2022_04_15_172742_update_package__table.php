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
            $table->decimal('rate_per_pieces',10,2)->default(10);
            $table->longText('theme_category_ids', 300)->nullable();
            $table->integer('is_theme_category')->default(0);
            $table->decimal('price_printed_electonic',10,2)->default(0.00);
            $table->decimal('price_electonic',10,2)->default(0.00);

        });
        Schema::table('bookings', function (Blueprint $table) {
            $table->integer('number_of_pieces')->default(0);
            $table->integer('rate_per_pieces')->default(0);
            $table->string('pictures_type', 250)->nullable();  
            $table->decimal('pictures_type_price',10,2)->default(0.00);
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
