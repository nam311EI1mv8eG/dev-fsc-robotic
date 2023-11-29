<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreScoreDetailRequest;
use App\Http\Requests\UpdateScoreDetailRequest;
use App\Http\Resources\Admin\ScoreDetailResource;
use App\Models\ScoreDetail;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ScoreDetailApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('score_detail_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ScoreDetailResource(ScoreDetail::with(['match'])->get());
    }

    public function store(StoreScoreDetailRequest $request)
    {
        $scoreDetail = ScoreDetail::create($request->all());

        return (new ScoreDetailResource($scoreDetail))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ScoreDetail $scoreDetail)
    {
        abort_if(Gate::denies('score_detail_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ScoreDetailResource($scoreDetail->load(['match']));
    }

    public function update(UpdateScoreDetailRequest $request, ScoreDetail $scoreDetail)
    {
        $scoreDetail->update($request->all());

        return (new ScoreDetailResource($scoreDetail))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ScoreDetail $scoreDetail)
    {
        abort_if(Gate::denies('score_detail_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $scoreDetail->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
