@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('match_team_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.match-teams.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.matchTeam.title_singular') }}
                        </a>
                        <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                            {{ trans('global.app_csvImport') }}
                        </button>
                        @include('csvImport.modal', ['model' => 'MatchTeam', 'route' => 'admin.match-teams.parseCsvImport'])
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.matchTeam.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-MatchTeam">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.matchTeam.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.matchTeam.fields.match') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.match.fields.field') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.match.fields.time') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.match.fields.red_score') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.match.fields.blue_score') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.match.fields.is_finished') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.matchTeam.fields.team') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.matchTeam.fields.alliance') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.matchTeam.fields.is_availaibe') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.matchTeam.fields.is_banned') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($matchTeams as $key => $matchTeam)
                                    <tr data-entry-id="{{ $matchTeam->id }}">
                                        <td>
                                            {{ $matchTeam->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $matchTeam->match->n_o ?? '' }}
                                        </td>
                                        <td>
                                            {{ $matchTeam->match->field ?? '' }}
                                        </td>
                                        <td>
                                            {{ $matchTeam->match->time ?? '' }}
                                        </td>
                                        <td>
                                            {{ $matchTeam->match->red_score ?? '' }}
                                        </td>
                                        <td>
                                            {{ $matchTeam->match->blue_score ?? '' }}
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $matchTeam->match->is_finished ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $matchTeam->match->is_finished ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            {{ $matchTeam->team->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $matchTeam->alliance ?? '' }}
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $matchTeam->is_availaibe ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $matchTeam->is_availaibe ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $matchTeam->is_banned ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $matchTeam->is_banned ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            @can('match_team_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.match-teams.show', $matchTeam->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('match_team_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.match-teams.edit', $matchTeam->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('match_team_delete')
                                                <form action="{{ route('frontend.match-teams.destroy', $matchTeam->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                                </form>
                                            @endcan

                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('match_team_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.match-teams.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-MatchTeam:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection