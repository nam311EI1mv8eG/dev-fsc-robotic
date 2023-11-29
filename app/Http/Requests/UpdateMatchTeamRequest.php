<?php

namespace App\Http\Requests;

use App\Models\MatchTeam;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateMatchTeamRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('match_team_edit');
    }

    public function rules()
    {
        return [
            'match_id' => [
                'required',
                'integer',
            ],
            'team_id' => [
                'required',
                'integer',
            ],
            'alliance' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
