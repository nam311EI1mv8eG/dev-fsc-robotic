<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScoreDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('score_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('e_1')->nullable();
            $table->integer('e_2')->nullable();
            $table->integer('e_3')->nullable();
            $table->integer('e_4')->nullable();
            $table->integer('e_5')->nullable();
            $table->integer('e_6')->nullable();
            $table->integer('e_7')->nullable();
            $table->integer('e_8')->nullable();
            $table->integer('e_9')->nullable();
            $table->integer('e_10')->nullable();
            $table->integer('alliance')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
