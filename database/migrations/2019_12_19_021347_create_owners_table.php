<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOwnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('owners', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('surname');
            $table->string('firstname');
            $table->string('midlename');
            $table->mediumText('address');
            $table->string('contact_no1');
            $table->string('contact_no2');
            $table->string('model');
            $table->string('color');
            $table->string('type');
            $table->string('plate_number');
            $table->string('applicant_category');            
            $table->string('sticker_id');
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
        Schema::dropIfExists('owners');
    }
}
