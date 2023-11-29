@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.matchTeam.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.match-teams.update", [$matchTeam->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('match') ? 'has-error' : '' }}">
                            <label class="required" for="match_id">{{ trans('cruds.matchTeam.fields.match') }}</label>
                            <select class="form-control select2" name="match_id" id="match_id" required>
                                @foreach($matches as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('match_id') ? old('match_id') : $matchTeam->match->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('match'))
                                <span class="help-block" role="alert">{{ $errors->first('match') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.matchTeam.fields.match_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('team') ? 'has-error' : '' }}">
                            <label class="required" for="team_id">{{ trans('cruds.matchTeam.fields.team') }}</label>
                            <select class="form-control select2" name="team_id" id="team_id" required>
                                @foreach($teams as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('team_id') ? old('team_id') : $matchTeam->team->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('team'))
                                <span class="help-block" role="alert">{{ $errors->first('team') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.matchTeam.fields.team_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('alliance') ? 'has-error' : '' }}">
                            <label class="required" for="alliance">{{ trans('cruds.matchTeam.fields.alliance') }}</label>
                            <input class="form-control" type="number" name="alliance" id="alliance" value="{{ old('alliance', $matchTeam->alliance) }}" step="1" required>
                            @if($errors->has('alliance'))
                                <span class="help-block" role="alert">{{ $errors->first('alliance') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.matchTeam.fields.alliance_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('is_availaibe') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="is_availaibe" value="0">
                                <input type="checkbox" name="is_availaibe" id="is_availaibe" value="1" {{ $matchTeam->is_availaibe || old('is_availaibe', 0) === 1 ? 'checked' : '' }}>
                                <label for="is_availaibe" style="font-weight: 400">{{ trans('cruds.matchTeam.fields.is_availaibe') }}</label>
                            </div>
                            @if($errors->has('is_availaibe'))
                                <span class="help-block" role="alert">{{ $errors->first('is_availaibe') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.matchTeam.fields.is_availaibe_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('is_banned') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="is_banned" value="0">
                                <input type="checkbox" name="is_banned" id="is_banned" value="1" {{ $matchTeam->is_banned || old('is_banned', 0) === 1 ? 'checked' : '' }}>
                                <label for="is_banned" style="font-weight: 400">{{ trans('cruds.matchTeam.fields.is_banned') }}</label>
                            </div>
                            @if($errors->has('is_banned'))
                                <span class="help-block" role="alert">{{ $errors->first('is_banned') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.matchTeam.fields.is_banned_helper') }}</span>
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