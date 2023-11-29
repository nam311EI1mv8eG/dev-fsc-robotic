<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MatchTeam extends Model  {

use SoftDeletes, Auditable, HasFactory;

public $table = 'match_teams';

protected $dates = [
'created_at',
    'updated_at',
    'deleted_at',
];

protected $fillable = [
'match_id',
    'team_id',
    'alliance',
    'is_availaibe',
    'is_banned',
    'created_at',
    'updated_at',
    'deleted_at',
];

protected function serializeDate(DateTimeInterface $date)
{
    



return $date->format('Y-m-d H:i:s');
    
}
public function match()
{
    



return $this->belongsTo(Match::class, 'match_id');
    
}
public function team()
{
    



return $this->belongsTo(Team::class, 'team_id');
    
}

}