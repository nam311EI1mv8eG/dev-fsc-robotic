@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.matchTeam.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.match-teams.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="match_id">{{ trans('cruds.matchTeam.fields.match') }}</label>
                            <select class="form-control select2" name="match_id" id="match_id" required>
                                @foreach($matches as $id => $entry)
                                    <option value="{{ $id }}" {{ old('match_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('match'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('match') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.matchTeam.fields.match_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="team_id">{{ trans('cruds.matchTeam.fields.team') }}</label>
                            <select class="form-control select2" name="team_id" id="team_id" required>
                                @foreach($teams as $id => $entry)
                                    <option value="{{ $id }}" {{ old('team_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('team'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('team') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.matchTeam.fields.team_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="alliance">{{ trans('cruds.matchTeam.fields.alliance') }}</label>
                            <input class="form-control" type="number" name="alliance" id="alliance" value="{{ old('alliance', '1') }}" step="1" required>
                            @if($errors->has('alliance'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('alliance') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.matchTeam.fields.alliance_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="hidden" name="is_availaibe" value="0">
                                <input type="checkbox" name="is_availaibe" id="is_availaibe" value="1" {{ old('is_availaibe', 0) == 1 || old('is_availaibe') === null ? 'checked' : '' }}>
                                <label for="is_availaibe">{{ trans('cruds.matchTeam.fields.is_availaibe') }}</label>
                            </div>
                            @if($errors->has('is_availaibe'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('is_availaibe') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.matchTeam.fields.is_availaibe_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="hidden" name="is_banned" value="0">
                                <input type="checkbox" name="is_banned" id="is_banned" value="1" {{ old('is_banned', 0) == 1 ? 'checked' : '' }}>
                                <label for="is_banned">{{ trans('cruds.matchTeam.fields.is_banned') }}</label>
                            </div>
                            @if($errors->has('is_banned'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('is_banned') }}
                                </div>
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