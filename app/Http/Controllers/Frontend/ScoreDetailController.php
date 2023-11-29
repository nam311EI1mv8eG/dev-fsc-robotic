<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Models\ScoreDetail;
use App\Models\Match;
use App\Http\Requests\StoreScoreDetailRequest;
use App\Http\Requests\UpdateScoreDetailRequest;
use App\Http\Requests\MassDestroyScoreDetailRequest;

class ScoreDetailController extends Controller  {

use CsvImportTrait;



function index()
{
    abort_if(Gate::denies('score_detail_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');



$scoreDetails = ScoreDetail::with(['match'])->get();



    return view('frontend.scoreDetails.index', compact('scoreDetails'));
}
function create()
{
    abort_if(Gate::denies('score_detail_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');



$matches = Match::pluck('n_o', 'id')->prepend(trans('global.pleaseSelect'), '');



    return view('frontend.scoreDetails.create', compact('matches'));
}
function store(StoreScoreDetailRequest $request)
{
    



$scoreDetail = ScoreDetail::create($request->all());


return redirect()->route('frontend.score-details.index');
    
}
function edit(ScoreDetail $scoreDetail)
{
    abort_if(Gate::denies('score_detail_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');



$matches = Match::pluck('n_o', 'id')->prepend(trans('global.pleaseSelect'), '');


$scoreDetail->load('match');

    return view('frontend.scoreDetails.edit', compact('matches', 'scoreDetail'));
}
function update(UpdateScoreDetailRequest $request, ScoreDetail $scoreDetail)
{
    



$scoreDetail->update($request->all());


return redirect()->route('frontend.score-details.index');
    
}
function show(ScoreDetail $scoreDetail)
{
    abort_if(Gate::denies('score_detail_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');




$scoreDetail->load('match');

    return view('frontend.scoreDetails.show', compact('scoreDetail'));
}
function destroy(ScoreDetail $scoreDetail)
{
    abort_if(Gate::denies('score_detail_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');




$scoreDetail->delete();
return back();
    
}
function massDestroy(MassDestroyScoreDetailRequest $request)
{
    



$scoreDetails = ScoreDetail::find(request('ids'));

foreach ($scoreDetails as $scoreDetail) {
$scoreDetail->delete();
}

return response(null, Response::HTTP_NO_CONTENT);
    
}

}