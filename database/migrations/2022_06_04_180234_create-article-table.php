<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('articles' , function(Blueprint $table){
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->integer('category_id');
            $table->text('body');
            $table->timestamp('created_at');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('articles');
    }
};
