<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer', function (Blueprint $table) {
            $table->increments('c_id');
            $table->string('name');
            $table->string('contact');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('area_code');
            $table->string('address');
            $table->string('quantity');
            $table->string('notes')->nullable();
            $table->string('homeimage');
            $table->string('accountstatus');
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
        Schema::dropIfExists('customer');
    }
}
