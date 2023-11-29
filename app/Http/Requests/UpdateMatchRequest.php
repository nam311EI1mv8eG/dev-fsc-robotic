<?php

namespace App\Http\Requests;

use App\Models\Match;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateMatchRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('match_edit');
    }

    public function rules()
    {
        return [
            'season_id' => [
                'required',
                'integer',
            ],
            'field' => [
                'string',
                'nullable',
            ],
            'time' => [
                'date_format:' . config('panel.time_format'),
                'nullable',
            ],
            'red_score' => [
                'numeric',
            ],
            'blue_score' => [
                'numeric',
            ],
            'n_o' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
