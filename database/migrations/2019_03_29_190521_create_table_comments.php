<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableComments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('post_id')->foreign('post_id')->references('id')->on('posts'); ;
            $table->string('comment_name');
             $table->string('comment_statut')->default('display:none');
            $table->longtext('comment_email');
            $table->longtext('comment_content');
            $table->timestamp('comment_date')->default(DB::raw('CURRENT_TIMESTAMP'));
           $table->timestamps();
           //$table->foreign('post_id')->references('id')->on('posts'); 
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_comments');
    }
}
