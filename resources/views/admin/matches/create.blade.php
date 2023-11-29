@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.match.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.matches.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('season') ? 'has-error' : '' }}">
                            <label class="required" for="season_id">{{ trans('cruds.match.fields.season') }}</label>
                            <select class="form-control select2" name="season_id" id="season_id" required>
                                @foreach($seasons as $id => $entry)
                                    <option value="{{ $id }}" {{ old('season_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('season'))
                                <span class="help-block" role="alert">{{ $errors->first('season') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.match.fields.season_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('field') ? 'has-error' : '' }}">
                            <label for="field">{{ trans('cruds.match.fields.field') }}</label>
                            <input class="form-control" type="text" name="field" id="field" value="{{ old('field', '') }}">
                            @if($errors->has('field'))
                                <span class="help-block" role="alert">{{ $errors->first('field') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.match.fields.field_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('time') ? 'has-error' : '' }}">
                            <label for="time">{{ trans('cruds.match.fields.time') }}</label>
                            <input class="form-control timepicker" type="text" name="time" id="time" value="{{ old('time') }}">
                            @if($errors->has('time'))
                                <span class="help-block" role="alert">{{ $errors->first('time') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.match.fields.time_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('red_score') ? 'has-error' : '' }}">
                            <label for="red_score">{{ trans('cruds.match.fields.red_score') }}</label>
                            <input class="form-control" type="number" name="red_score" id="red_score" value="{{ old('red_score', '0') }}" step="0.1">
                            @if($errors->has('red_score'))
                                <span class="help-block" role="alert">{{ $errors->first('red_score') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.match.fields.red_score_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('blue_score') ? 'has-error' : '' }}">
                            <label for="blue_score">{{ trans('cruds.match.fields.blue_score') }}</label>
                            <input class="form-control" type="number" name="blue_score" id="blue_score" value="{{ old('blue_score', '0') }}" step="0.1">
                            @if($errors->has('blue_score'))
                                <span class="help-block" role="alert">{{ $errors->first('blue_score') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.match.fields.blue_score_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('is_finished') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="is_finished" value="0">
                                <input type="checkbox" name="is_finished" id="is_finished" value="1" {{ old('is_finished', 0) == 1 ? 'checked' : '' }}>
                                <label for="is_finished" style="font-weight: 400">{{ trans('cruds.match.fields.is_finished') }}</label>
                            </div>
                            @if($errors->has('is_finished'))
                                <span class="help-block" role="alert">{{ $errors->first('is_finished') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.match.fields.is_finished_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('n_o') ? 'has-error' : '' }}">
                            <label for="n_o">{{ trans('cruds.match.fields.n_o') }}</label>
                            <input class="form-control" type="number" name="n_o" id="n_o" value="{{ old('n_o', '1') }}" step="1">
                            @if($errors->has('n_o'))
                                <span class="help-block" role="alert">{{ $errors->first('n_o') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.match.fields.n_o_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection