<?php

namespace App\Http\Requests;

use App\Models\MatchTeam;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyMatchTeamRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('match_team_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:match_teams,id',
        ];
    }
}
