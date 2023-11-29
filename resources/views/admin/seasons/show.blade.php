@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.season.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.seasons.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.season.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $season->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.season.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $season->name }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.seasons.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.relatedData') }}
                </div>
                <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
                    <li role="presentation">
                        <a href="#season_matches" aria-controls="season_matches" role="tab" data-toggle="tab">
                            {{ trans('cruds.match.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#season_teams" aria-controls="season_teams" role="tab" data-toggle="tab">
                            {{ trans('cruds.team.title') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" role="tabpanel" id="season_matches">
                        @includeIf('admin.seasons.relationships.seasonMatches', ['matches' => $season->seasonMatches])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="season_teams">
                        @includeIf('admin.seasons.relationships.seasonTeams', ['teams' => $season->seasonTeams])
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection