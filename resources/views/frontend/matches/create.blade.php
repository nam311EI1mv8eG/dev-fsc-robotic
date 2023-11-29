@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.match.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.matches.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="season_id">{{ trans('cruds.match.fields.season') }}</label>
                            <select class="form-control select2" name="season_id" id="season_id" required>
                                @foreach($seasons as $id => $entry)
                                    <option value="{{ $id }}" {{ old('season_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('season'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('season') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.match.fields.season_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="field">{{ trans('cruds.match.fields.field') }}</label>
                            <input class="form-control" type="text" name="field" id="field" value="{{ old('field', '') }}">
                            @if($errors->has('field'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('field') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.match.fields.field_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="time">{{ trans('cruds.match.fields.time') }}</label>
                            <input class="form-control timepicker" type="text" name="time" id="time" value="{{ old('time') }}">
                            @if($errors->has('time'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('time') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.match.fields.time_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="red_score">{{ trans('cruds.match.fields.red_score') }}</label>
                            <input class="form-control" type="number" name="red_score" id="red_score" value="{{ old('red_score', '0') }}" step="0.1">
                            @if($errors->has('red_score'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('red_score') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.match.fields.red_score_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="blue_score">{{ trans('cruds.match.fields.blue_score') }}</label>
                            <input class="form-control" type="number" name="blue_score" id="blue_score" value="{{ old('blue_score', '0') }}" step="0.1">
                            @if($errors->has('blue_score'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('blue_score') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.match.fields.blue_score_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="hidden" name="is_finished" value="0">
                                <input type="checkbox" name="is_finished" id="is_finished" value="1" {{ old('is_finished', 0) == 1 ? 'checked' : '' }}>
                                <label for="is_finished">{{ trans('cruds.match.fields.is_finished') }}</label>
                            </div>
                            @if($errors->has('is_finished'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('is_finished') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.match.fields.is_finished_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="n_o">{{ trans('cruds.match.fields.n_o') }}</label>
                            <input class="form-control" type="number" name="n_o" id="n_o" value="{{ old('n_o', '1') }}" step="1">
                            @if($errors->has('n_o'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('n_o') }}
                                </div>
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