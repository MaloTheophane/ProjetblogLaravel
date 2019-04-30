<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact', function (Blueprint $table) {
            $table->increments('id');
            $table->string('contact_name');
            $table->string('contact_email');
            $table->string('contact_message');
            $table->timestamp('contact_date')->default(DB::raw('CURRENT_TIMESTAMP'));
           // $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contact');
    }
}
