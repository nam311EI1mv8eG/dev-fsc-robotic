<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTeamsTable extends Migration
{
    public function up()
    {
        Schema::table('teams', function (Blueprint $table) {
            $table->unsignedBigInteger('season_id')->nullable();
            $table->foreign('season_id', 'season_fk_9252531')->references('id')->on('seasons');
        });
    }
}
