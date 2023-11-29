<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToMatchTeamsTable extends Migration
{
    public function up()
    {
        Schema::table('match_teams', function (Blueprint $table) {
            $table->unsignedBigInteger('match_id')->nullable();
            $table->foreign('match_id', 'match_fk_9252539')->references('id')->on('matches');
            $table->unsignedBigInteger('team_id')->nullable();
            $table->foreign('team_id', 'team_fk_9252540')->references('id')->on('teams');
        });
    }
}
