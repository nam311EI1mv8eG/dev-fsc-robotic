<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchTeamsTable extends Migration
{
    public function up()
    {
        Schema::create('match_teams', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('alliance');
            $table->boolean('is_availaibe')->default(0)->nullable();
            $table->boolean('is_banned')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
