<?php

namespace App\Http\Requests;

use App\Models\Season;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSeasonRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('season_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
        ];
    }
}
