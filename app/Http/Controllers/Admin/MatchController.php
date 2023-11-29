<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Models\Match;
use App\Models\Season;
use App\Http\Requests\StoreMatchRequest;
use App\Http\Requests\UpdateMatchRequest;
use App\Http\Requests\MassDestroyMatchRequest;

class MatchController extends Controller  {

use CsvImportTrait;



function index()
{
    abort_if(Gate::denies('match_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');



$matches = Match::with(['season'])->get();



    return view('admin.matches.index', compact('matches'));
}
function create()
{
    abort_if(Gate::denies('match_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');



$seasons = Season::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');



    return view('admin.matches.create', compact('seasons'));
}
function store(StoreMatchRequest $request)
{
    



$match = Match::create($request->all());


return redirect()->route('admin.matches.index');
    
}
function edit(Match $match)
{
    abort_if(Gate::denies('match_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');



$seasons = Season::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');


$match->load('season');

    return view('admin.matches.edit', compact('match', 'seasons'));
}
function update(UpdateMatchRequest $request, Match $match)
{
    



$match->update($request->all());


return redirect()->route('admin.matches.index');
    
}
function show(Match $match)
{
    abort_if(Gate::denies('match_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');




$match->load('season', 'matchScoreDetails', 'matchMatchTeams');

    return view('admin.matches.show', compact('match'));
}
function destroy(Match $match)
{
    abort_if(Gate::denies('match_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');




$match->delete();
return back();
    
}
function massDestroy(MassDestroyMatchRequest $request)
{
    



$matches = Match::find(request('ids'));

foreach ($matches as $match) {
$match->delete();
}

return response(null, Response::HTTP_NO_CONTENT);
    
}

}