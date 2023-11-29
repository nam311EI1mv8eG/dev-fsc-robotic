<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Models\MatchTeam;
use App\Models\Match;
use App\Models\Team;
use App\Http\Requests\StoreMatchTeamRequest;
use App\Http\Requests\UpdateMatchTeamRequest;
use App\Http\Requests\MassDestroyMatchTeamRequest;

class MatchTeamController extends Controller  {

use CsvImportTrait;



function index()
{
    abort_if(Gate::denies('match_team_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');



$matchTeams = MatchTeam::with(['match', 'team'])->get();



    return view('frontend.matchTeams.index', compact('matchTeams'));
}
function create()
{
    abort_if(Gate::denies('match_team_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');



$matches = Match::pluck('n_o', 'id')->prepend(trans('global.pleaseSelect'), '');


$teams = Team::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');



    return view('frontend.matchTeams.create', compact('matches', 'teams'));
}
function store(StoreMatchTeamRequest $request)
{
    



$matchTeam = MatchTeam::create($request->all());


return redirect()->route('frontend.match-teams.index');
    
}
function edit(MatchTeam $matchTeam)
{
    abort_if(Gate::denies('match_team_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');



$matches = Match::pluck('n_o', 'id')->prepend(trans('global.pleaseSelect'), '');


$teams = Team::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');


$matchTeam->load('match', 'team');

    return view('frontend.matchTeams.edit', compact('matchTeam', 'matches', 'teams'));
}
function update(UpdateMatchTeamRequest $request, MatchTeam $matchTeam)
{
    



$matchTeam->update($request->all());


return redirect()->route('frontend.match-teams.index');
    
}
function show(MatchTeam $matchTeam)
{
    abort_if(Gate::denies('match_team_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');




$matchTeam->load('match', 'team');

    return view('frontend.matchTeams.show', compact('matchTeam'));
}
function destroy(MatchTeam $matchTeam)
{
    abort_if(Gate::denies('match_team_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');




$matchTeam->delete();
return back();
    
}
function massDestroy(MassDestroyMatchTeamRequest $request)
{
    



$matchTeams = MatchTeam::find(request('ids'));

foreach ($matchTeams as $matchTeam) {
$matchTeam->delete();
}

return response(null, Response::HTTP_NO_CONTENT);
    
}

}