@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.scoreDetail.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.score-details.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.scoreDetail.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $scoreDetail->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.scoreDetail.fields.match') }}
                                    </th>
                                    <td>
                                        {{ $scoreDetail->match->n_o ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.scoreDetail.fields.e_1') }}
                                    </th>
                                    <td>
                                        {{ $scoreDetail->e_1 }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.scoreDetail.fields.e_2') }}
                                    </th>
                                    <td>
                                        {{ $scoreDetail->e_2 }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.scoreDetail.fields.e_3') }}
                                    </th>
                                    <td>
                                        {{ $scoreDetail->e_3 }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.scoreDetail.fields.e_4') }}
                                    </th>
                                    <td>
                                        {{ $scoreDetail->e_4 }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.scoreDetail.fields.e_5') }}
                                    </th>
                                    <td>
                                        {{ $scoreDetail->e_5 }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.scoreDetail.fields.e_6') }}
                                    </th>
                                    <td>
                                        {{ $scoreDetail->e_6 }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.scoreDetail.fields.e_7') }}
                                    </th>
                                    <td>
                                        {{ $scoreDetail->e_7 }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.scoreDetail.fields.e_8') }}
                                    </th>
                                    <td>
                                        {{ $scoreDetail->e_8 }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.scoreDetail.fields.e_9') }}
                                    </th>
                                    <td>
                                        {{ $scoreDetail->e_9 }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.scoreDetail.fields.e_10') }}
                                    </th>
                                    <td>
                                        {{ $scoreDetail->e_10 }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.scoreDetail.fields.alliance') }}
                                    </th>
                                    <td>
                                        {{ $scoreDetail->alliance }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.score-details.index') }}">
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