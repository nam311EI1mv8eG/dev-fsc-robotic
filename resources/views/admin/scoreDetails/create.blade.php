@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.scoreDetail.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.score-details.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('match') ? 'has-error' : '' }}">
                            <label class="required" for="match_id">{{ trans('cruds.scoreDetail.fields.match') }}</label>
                            <select class="form-control select2" name="match_id" id="match_id" required>
                                @foreach($matches as $id => $entry)
                                    <option value="{{ $id }}" {{ old('match_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('match'))
                                <span class="help-block" role="alert">{{ $errors->first('match') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.scoreDetail.fields.match_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('e_1') ? 'has-error' : '' }}">
                            <label for="e_1">{{ trans('cruds.scoreDetail.fields.e_1') }}</label>
                            <input class="form-control" type="number" name="e_1" id="e_1" value="{{ old('e_1', '0') }}" step="1">
                            @if($errors->has('e_1'))
                                <span class="help-block" role="alert">{{ $errors->first('e_1') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.scoreDetail.fields.e_1_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('e_2') ? 'has-error' : '' }}">
                            <label for="e_2">{{ trans('cruds.scoreDetail.fields.e_2') }}</label>
                            <input class="form-control" type="number" name="e_2" id="e_2" value="{{ old('e_2', '0') }}" step="1">
                            @if($errors->has('e_2'))
                                <span class="help-block" role="alert">{{ $errors->first('e_2') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.scoreDetail.fields.e_2_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('e_3') ? 'has-error' : '' }}">
                            <label for="e_3">{{ trans('cruds.scoreDetail.fields.e_3') }}</label>
                            <input class="form-control" type="number" name="e_3" id="e_3" value="{{ old('e_3', '0') }}" step="1">
                            @if($errors->has('e_3'))
                                <span class="help-block" role="alert">{{ $errors->first('e_3') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.scoreDetail.fields.e_3_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('e_4') ? 'has-error' : '' }}">
                            <label for="e_4">{{ trans('cruds.scoreDetail.fields.e_4') }}</label>
                            <input class="form-control" type="number" name="e_4" id="e_4" value="{{ old('e_4', '0') }}" step="1">
                            @if($errors->has('e_4'))
                                <span class="help-block" role="alert">{{ $errors->first('e_4') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.scoreDetail.fields.e_4_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('e_5') ? 'has-error' : '' }}">
                            <label for="e_5">{{ trans('cruds.scoreDetail.fields.e_5') }}</label>
                            <input class="form-control" type="number" name="e_5" id="e_5" value="{{ old('e_5', '0') }}" step="1">
                            @if($errors->has('e_5'))
                                <span class="help-block" role="alert">{{ $errors->first('e_5') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.scoreDetail.fields.e_5_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('e_6') ? 'has-error' : '' }}">
                            <label for="e_6">{{ trans('cruds.scoreDetail.fields.e_6') }}</label>
                            <input class="form-control" type="number" name="e_6" id="e_6" value="{{ old('e_6', '') }}" step="1">
                            @if($errors->has('e_6'))
                                <span class="help-block" role="alert">{{ $errors->first('e_6') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.scoreDetail.fields.e_6_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('e_7') ? 'has-error' : '' }}">
                            <label for="e_7">{{ trans('cruds.scoreDetail.fields.e_7') }}</label>
                            <input class="form-control" type="number" name="e_7" id="e_7" value="{{ old('e_7', '0') }}" step="1">
                            @if($errors->has('e_7'))
                                <span class="help-block" role="alert">{{ $errors->first('e_7') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.scoreDetail.fields.e_7_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('e_8') ? 'has-error' : '' }}">
                            <label for="e_8">{{ trans('cruds.scoreDetail.fields.e_8') }}</label>
                            <input class="form-control" type="number" name="e_8" id="e_8" value="{{ old('e_8', '0') }}" step="1">
                            @if($errors->has('e_8'))
                                <span class="help-block" role="alert">{{ $errors->first('e_8') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.scoreDetail.fields.e_8_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('e_9') ? 'has-error' : '' }}">
                            <label for="e_9">{{ trans('cruds.scoreDetail.fields.e_9') }}</label>
                            <input class="form-control" type="number" name="e_9" id="e_9" value="{{ old('e_9', '') }}" step="1">
                            @if($errors->has('e_9'))
                                <span class="help-block" role="alert">{{ $errors->first('e_9') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.scoreDetail.fields.e_9_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('e_10') ? 'has-error' : '' }}">
                            <label for="e_10">{{ trans('cruds.scoreDetail.fields.e_10') }}</label>
                            <input class="form-control" type="number" name="e_10" id="e_10" value="{{ old('e_10', '0') }}" step="1">
                            @if($errors->has('e_10'))
                                <span class="help-block" role="alert">{{ $errors->first('e_10') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.scoreDetail.fields.e_10_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('alliance') ? 'has-error' : '' }}">
                            <label for="alliance">{{ trans('cruds.scoreDetail.fields.alliance') }}</label>
                            <input class="form-control" type="number" name="alliance" id="alliance" value="{{ old('alliance', '1') }}" step="1">
                            @if($errors->has('alliance'))
                                <span class="help-block" role="alert">{{ $errors->first('alliance') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.scoreDetail.fields.alliance_helper') }}</span>
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