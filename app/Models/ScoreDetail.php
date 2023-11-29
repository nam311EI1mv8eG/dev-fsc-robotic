<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ScoreDetail extends Model  {

use SoftDeletes, Auditable, HasFactory;

public $table = 'score_details';

protected $dates = [
'created_at',
    'updated_at',
    'deleted_at',
];

protected $fillable = [
'match_id',
    'e_1',
    'e_2',
    'e_3',
    'e_4',
    'e_5',
    'e_6',
    'e_7',
    'e_8',
    'e_9',
    'e_10',
    'alliance',
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

}