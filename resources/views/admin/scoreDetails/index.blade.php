@extends('layouts.admin')
@section('content')
<div class="content">
    @can('score_detail_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.score-details.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.scoreDetail.title_singular') }}
                </a>
                <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                    {{ trans('global.app_csvImport') }}
                </button>
                @include('csvImport.modal', ['model' => 'ScoreDetail', 'route' => 'admin.score-details.parseCsvImport'])
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.scoreDetail.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-ScoreDetail">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.scoreDetail.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.scoreDetail.fields.match') }}
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
                                        {{ trans('cruds.scoreDetail.fields.e_1') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.scoreDetail.fields.e_2') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.scoreDetail.fields.e_3') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.scoreDetail.fields.e_4') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.scoreDetail.fields.e_5') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.scoreDetail.fields.e_6') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.scoreDetail.fields.e_7') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.scoreDetail.fields.e_8') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.scoreDetail.fields.e_9') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.scoreDetail.fields.e_10') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.scoreDetail.fields.alliance') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($scoreDetails as $key => $scoreDetail)
                                    <tr data-entry-id="{{ $scoreDetail->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $scoreDetail->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $scoreDetail->match->n_o ?? '' }}
                                        </td>
                                        <td>
                                            {{ $scoreDetail->match->time ?? '' }}
                                        </td>
                                        <td>
                                            {{ $scoreDetail->match->red_score ?? '' }}
                                        </td>
                                        <td>
                                            {{ $scoreDetail->match->blue_score ?? '' }}
                                        </td>
                                        <td>
                                            {{ $scoreDetail->e_1 ?? '' }}
                                        </td>
                                        <td>
                                            {{ $scoreDetail->e_2 ?? '' }}
                                        </td>
                                        <td>
                                            {{ $scoreDetail->e_3 ?? '' }}
                                        </td>
                                        <td>
                                            {{ $scoreDetail->e_4 ?? '' }}
                                        </td>
                                        <td>
                                            {{ $scoreDetail->e_5 ?? '' }}
                                        </td>
                                        <td>
                                            {{ $scoreDetail->e_6 ?? '' }}
                                        </td>
                                        <td>
                                            {{ $scoreDetail->e_7 ?? '' }}
                                        </td>
                                        <td>
                                            {{ $scoreDetail->e_8 ?? '' }}
                                        </td>
                                        <td>
                                            {{ $scoreDetail->e_9 ?? '' }}
                                        </td>
                                        <td>
                                            {{ $scoreDetail->e_10 ?? '' }}
                                        </td>
                                        <td>
                                            {{ $scoreDetail->alliance ?? '' }}
                                        </td>
                                        <td>
                                            @can('score_detail_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.score-details.show', $scoreDetail->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('score_detail_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.score-details.edit', $scoreDetail->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('score_detail_delete')
                                                <form action="{{ route('admin.score-details.destroy', $scoreDetail->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('score_detail_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.score-details.massDestroy') }}",
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
  let table = $('.datatable-ScoreDetail:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection