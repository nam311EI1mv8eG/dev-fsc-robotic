@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.match.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.matches.update", [$match->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('season') ? 'has-error' : '' }}">
                            <label class="required" for="season_id">{{ trans('cruds.match.fields.season') }}</label>
                            <select class="form-control select2" name="season_id" id="season_id" required>
                                @foreach($seasons as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('season_id') ? old('season_id') : $match->season->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('season'))
                                <span class="help-block" role="alert">{{ $errors->first('season') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.match.fields.season_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('field') ? 'has-error' : '' }}">
                            <label for="field">{{ trans('cruds.match.fields.field') }}</label>
                            <input class="form-control" type="text" name="field" id="field" value="{{ old('field', $match->field) }}">
                            @if($errors->has('field'))
                                <span class="help-block" role="alert">{{ $errors->first('field') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.match.fields.field_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('time') ? 'has-error' : '' }}">
                            <label for="time">{{ trans('cruds.match.fields.time') }}</label>
                            <input class="form-control timepicker" type="text" name="time" id="time" value="{{ old('time', $match->time) }}">
                            @if($errors->has('time'))
                                <span class="help-block" role="alert">{{ $errors->first('time') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.match.fields.time_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('red_score') ? 'has-error' : '' }}">
                            <label for="red_score">{{ trans('cruds.match.fields.red_score') }}</label>
                            <input class="form-control" type="number" name="red_score" id="red_score" value="{{ old('red_score', $match->red_score) }}" step="0.1">
                            @if($errors->has('red_score'))
                                <span class="help-block" role="alert">{{ $errors->first('red_score') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.match.fields.red_score_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('blue_score') ? 'has-error' : '' }}">
                            <label for="blue_score">{{ trans('cruds.match.fields.blue_score') }}</label>
                            <input class="form-control" type="number" name="blue_score" id="blue_score" value="{{ old('blue_score', $match->blue_score) }}" step="0.1">
                            @if($errors->has('blue_score'))
                                <span class="help-block" role="alert">{{ $errors->first('blue_score') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.match.fields.blue_score_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('is_finished') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="is_finished" value="0">
                                <input type="checkbox" name="is_finished" id="is_finished" value="1" {{ $match->is_finished || old('is_finished', 0) === 1 ? 'checked' : '' }}>
                                <label for="is_finished" style="font-weight: 400">{{ trans('cruds.match.fields.is_finished') }}</label>
                            </div>
                            @if($errors->has('is_finished'))
                                <span class="help-block" role="alert">{{ $errors->first('is_finished') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.match.fields.is_finished_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('n_o') ? 'has-error' : '' }}">
                            <label for="n_o">{{ trans('cruds.match.fields.n_o') }}</label>
                            <input class="form-control" type="number" name="n_o" id="n_o" value="{{ old('n_o', $match->n_o) }}" step="1">
                            @if($errors->has('n_o'))
                                <span class="help-block" role="alert">{{ $errors->first('n_o') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.match.fields.n_o_helper') }}</span>
                        </div>
                        
                        <div class="form-group {{ $errors->has('team') ? 'has-error' : '' }}">
                            <h3>Liên Minh Đỏ</h3>
                            <label class="required" for="team_id">Đội đỏ 1</label>
                            <select class="form-control select2" name="team_1_1_id" id="team_1_1_id" required>
                                @foreach($teams as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('team_1_1_id') ? old('team_1_1_id') : $team_1_1_id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('season'))
                                <span class="help-block" role="alert">{{ $errors->first('team') }}</span>
                            @endif
                             <label class="required" for="team_id">Đội đỏ 2</label>
                            <select class="form-control select2" name="team_1_2_id" id="team_1_1_id" required>
                                @foreach($teams as $id => $entry)
                                    <option value="{{ $id }}"  {{ (old('team_1_2_id') ? old('team_1_2_id') : $team_1_2_id ?? '') == $id ? 'selected' : '' }} >{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('season'))
                                <span class="help-block" role="alert">{{ $errors->first('team') }}</span>
                            @endif
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group {{ $errors->has('team') ? 'has-error' : '' }}">
                            <h3>Liên Minh Xanh</h3>
                            <label class="required" for="team_id">Đội xanh 1</label>
                            <select class="form-control select2" name="team_2_1_id" id="team_2_1_id" required>
                                @foreach($teams as $id => $entry)
                                    <option value="{{ $id }}"  {{ (old('team_2_1_id') ? old('team_2_1_id') : $team_2_1_id ?? '') == $id ? 'selected' : '' }} >{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('season'))
                                <span class="help-block" role="alert">{{ $errors->first('team') }}</span>
                            @endif
                             <label class="required" for="team_id">Đội xanh 2</label>
                            <select class="form-control select2" name="team_2_2_id" id="team_2_2_id" required>
                                @foreach($teams as $id => $entry)
                                    <option value="{{ $id }}"  {{ (old('team_2_2_id') ? old('team_2_2_id') : $team_2_2_id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                           
                                @if(session()->has('message'))
                                    <div class="alert alert-success">
                                    {{ session()->get('message') }}
                                    </div>
                              @endif


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