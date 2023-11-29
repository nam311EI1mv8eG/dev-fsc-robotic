@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.matchTeam.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.match-teams.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.matchTeam.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $matchTeam->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.matchTeam.fields.match') }}
                                    </th>
                                    <td>
                                        {{ $matchTeam->match->n_o ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.matchTeam.fields.team') }}
                                    </th>
                                    <td>
                                        {{ $matchTeam->team->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.matchTeam.fields.alliance') }}
                                    </th>
                                    <td>
                                        {{ $matchTeam->alliance }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.matchTeam.fields.is_availaibe') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $matchTeam->is_availaibe ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.matchTeam.fields.is_banned') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $matchTeam->is_banned ? 'checked' : '' }}>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.match-teams.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection