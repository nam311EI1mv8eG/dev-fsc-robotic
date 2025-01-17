@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.team.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.teams.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('season') ? 'has-error' : '' }}">
                            <label class="required" for="season_id">{{ trans('cruds.team.fields.season') }}</label>
                            <select class="form-control select2" name="season_id" id="season_id" required>
                                @foreach($seasons as $id => $entry)
                                    <option value="{{ $id }}" {{ old('season_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('season'))
                                <span class="help-block" role="alert">{{ $errors->first('season') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.team.fields.season_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label class="required" for="name">{{ trans('cruds.team.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                            @if($errors->has('name'))
                                <span class="help-block" role="alert">{{ $errors->first('name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.team.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('score') ? 'has-error' : '' }}">
                            <label for="score">{{ trans('cruds.team.fields.score') }}</label>
                            <input class="form-control" type="number" name="score" id="score" value="{{ old('score', '0') }}" step="0.1">
                            @if($errors->has('score'))
                                <span class="help-block" role="alert">{{ $errors->first('score') }}</span>
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