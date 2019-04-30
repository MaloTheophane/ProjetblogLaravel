<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
             $table->increments('id')->unsigned();
             $table->unsignedInteger('post_author');
             $table->timestamp('post_date')->default(DB::raw('CURRENT_TIMESTAMP'));
             $table->longtext('post_content');
              $table->longtext('post_title',10);
             $table->String('post_status',20)->default('publish');
             $table->string('post_name');
             $table->string('post_type');
             $table->string('post_image')->default('https://placehold.it/850x350');
          
             $table->string('post_category')->nullable();
             $table->timestamps();

             $table->foreign('post_author')->references('id')->on('users'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
