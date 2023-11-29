@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.match.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.matches.index') }}">
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
                            <a class="btn btn-default" href="{{ route('frontend.matches.index') }}">
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