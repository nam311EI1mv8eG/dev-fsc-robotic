@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.match.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.matches.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.match.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $match->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.match.fields.season') }}
                                    </th>
                                    <td>
                                        {{ $match->season->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.match.fields.field') }}
                                    </th>
                                    <td>
                                        {{ $match->field }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.match.fields.time') }}
                                    </th>
                                    <td>
                                        {{ $match->time }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.match.fields.red_score') }}
                                    </th>
                                    <td>
                                        {{ $match->red_score }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.match.fields.blue_score') }}
                                    </th>
                                    <td>
                                        {{ $match->blue_score }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.match.fields.is_finished') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $match->is_finished ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.match.fields.n_o') }}
                                    </th>
                                    <td>
                                        {{ $match->n_o }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.matches.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                                <a class="btn btn-lg btn-primary" href="{{ route('admin.matches.calculateScore', $match->id) }}">
                                                    Vào trận đấu
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
                        <a href="#match_score_details" aria-controls="match_score_details" role="tab" data-toggle="tab">
                            {{ trans('cruds.scoreDetail.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#match_match_teams" aria-controls="match_match_teams" role="tab" data-toggle="tab">
                            {{ trans('cruds.matchTeam.title') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" role="tabpanel" id="match_score_details">
                        @includeIf('admin.matches.relationships.matchScoreDetails', ['scoreDetails' => $match->matchScoreDetails])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="match_match_teams">
                        @includeIf('admin.matches.relationships.matchMatchTeams', ['matchTeams' => $match->matchMatchTeams])
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection