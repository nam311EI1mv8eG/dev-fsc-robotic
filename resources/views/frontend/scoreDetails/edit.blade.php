@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.scoreDetail.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.score-details.update", [$scoreDetail->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="match_id">{{ trans('cruds.scoreDetail.fields.match') }}</label>
                            <select class="form-control select2" name="match_id" id="match_id" required>
                                @foreach($matches as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('match_id') ? old('match_id') : $scoreDetail->match->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('match'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('match') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.scoreDetail.fields.match_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="e_1">{{ trans('cruds.scoreDetail.fields.e_1') }}</label>
                            <input class="form-control" type="number" name="e_1" id="e_1" value="{{ old('e_1', $scoreDetail->e_1) }}" step="1">
                            @if($errors->has('e_1'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('e_1') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.scoreDetail.fields.e_1_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="e_2">{{ trans('cruds.scoreDetail.fields.e_2') }}</label>
                            <input class="form-control" type="number" name="e_2" id="e_2" value="{{ old('e_2', $scoreDetail->e_2) }}" step="1">
                            @if($errors->has('e_2'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('e_2') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.scoreDetail.fields.e_2_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="e_3">{{ trans('cruds.scoreDetail.fields.e_3') }}</label>
                            <input class="form-control" type="number" name="e_3" id="e_3" value="{{ old('e_3', $scoreDetail->e_3) }}" step="1">
                            @if($errors->has('e_3'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('e_3') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.scoreDetail.fields.e_3_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="e_4">{{ trans('cruds.scoreDetail.fields.e_4') }}</label>
                            <input class="form-control" type="number" name="e_4" id="e_4" value="{{ old('e_4', $scoreDetail->e_4) }}" step="1">
                            @if($errors->has('e_4'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('e_4') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.scoreDetail.fields.e_4_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="e_5">{{ trans('cruds.scoreDetail.fields.e_5') }}</label>
                            <input class="form-control" type="number" name="e_5" id="e_5" value="{{ old('e_5', $scoreDetail->e_5) }}" step="1">
                            @if($errors->has('e_5'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('e_5') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.scoreDetail.fields.e_5_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="e_6">{{ trans('cruds.scoreDetail.fields.e_6') }}</label>
                            <input class="form-control" type="number" name="e_6" id="e_6" value="{{ old('e_6', $scoreDetail->e_6) }}" step="1">
                            @if($errors->has('e_6'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('e_6') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.scoreDetail.fields.e_6_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="e_7">{{ trans('cruds.scoreDetail.fields.e_7') }}</label>
                            <input class="form-control" type="number" name="e_7" id="e_7" value="{{ old('e_7', $scoreDetail->e_7) }}" step="1">
                            @if($errors->has('e_7'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('e_7') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.scoreDetail.fields.e_7_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="e_8">{{ trans('cruds.scoreDetail.fields.e_8') }}</label>
                            <input class="form-control" type="number" name="e_8" id="e_8" value="{{ old('e_8', $scoreDetail->e_8) }}" step="1">
                            @if($errors->has('e_8'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('e_8') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.scoreDetail.fields.e_8_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="e_9">{{ trans('cruds.scoreDetail.fields.e_9') }}</label>
                            <input class="form-control" type="number" name="e_9" id="e_9" value="{{ old('e_9', $scoreDetail->e_9) }}" step="1">
                            @if($errors->has('e_9'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('e_9') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.scoreDetail.fields.e_9_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="e_10">{{ trans('cruds.scoreDetail.fields.e_10') }}</label>
                            <input class="form-control" type="number" name="e_10" id="e_10" value="{{ old('e_10', $scoreDetail->e_10) }}" step="1">
                            @if($errors->has('e_10'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('e_10') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.scoreDetail.fields.e_10_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="alliance">{{ trans('cruds.scoreDetail.fields.alliance') }}</label>
                            <input class="form-control" type="number" name="alliance" id="alliance" value="{{ old('alliance', $scoreDetail->alliance) }}" step="1">
                            @if($errors->has('alliance'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('alliance') }}
                                </div>
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