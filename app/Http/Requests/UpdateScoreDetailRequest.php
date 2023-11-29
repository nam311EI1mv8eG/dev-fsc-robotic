<?php

namespace App\Http\Requests;

use App\Models\ScoreDetail;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateScoreDetailRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('score_detail_edit');
    }

    public function rules()
    {
        return [
            'match_id' => [
                'required',
                'integer',
            ],
            'e_1' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'e_2' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'e_3' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'e_4' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'e_5' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'e_6' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'e_7' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'e_8' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'e_9' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'e_10' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'alliance' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
