<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroySeasonRequest;
use App\Http\Requests\StoreSeasonRequest;
use App\Http\Requests\UpdateSeasonRequest;
use App\Models\Season;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SeasonController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('season_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $seasons = Season::all();

        return view('frontend.seasons.index', compact('seasons'));
    }

    public function create()
    {
        abort_if(Gate::denies('season_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.seasons.create');
    }

    public function store(StoreSeasonRequest $request)
    {
        $season = Season::create($request->all());

        return redirect()->route('frontend.seasons.index');
    }

    public function edit(Season $season)
    {
        abort_if(Gate::denies('season_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.seasons.edit', compact('season'));
    }

    public function update(UpdateSeasonRequest $request, Season $season)
    {
        $season->update($request->all());

        return redirect()->route('frontend.seasons.index');
    }

    public function show(Season $season)
    {
        abort_if(Gate::denies('season_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $season->load('seasonMatches', 'seasonTeams');

        return view('frontend.seasons.show', compact('season'));
    }

    public function destroy(Season $season)
    {
        abort_if(Gate::denies('season_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $season->delete();

        return back();
    }

    public function massDestroy(MassDestroySeasonRequest $request)
    {
        $seasons = Season::find(request('ids'));

        foreach ($seasons as $season) {
            $season->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
