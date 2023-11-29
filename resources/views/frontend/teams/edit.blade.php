@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.team.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.teams.update", [$team->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="season_id">{{ trans('cruds.team.fields.season') }}</label>
                            <select class="form-control select2" name="season_id" id="season_id" required>
                                @foreach($seasons as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('season_id') ? old('season_id') : $team->season->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('season'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('season') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.team.fields.season_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="name">{{ trans('cruds.team.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $team->name) }}" required>
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.team.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="score">{{ trans('cruds.team.fields.score') }}</label>
                            <input class="form-control" type="number" name="score" id="score" value="{{ old('score', $team->score) }}" step="0.1">
                            @if($errors->has('score'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('score') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.team.fields.score_helper') }}</span>
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