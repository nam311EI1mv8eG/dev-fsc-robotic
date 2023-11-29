<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchesTable extends Migration
{
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('field')->nullable();
            $table->time('time')->nullable();
            $table->float('red_score', 15, 1)->nullable();
            $table->float('blue_score', 15, 1)->nullable();
            $table->boolean('is_finished')->default(0)->nullable();
            $table->integer('n_o')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
