@extends('juzaweb::layouts.backend')

@section('title', trans('mymo::app.movies'))

@section('content')

<div class="cui__utils__content">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h5 class="mb-0 card-title font-weight-bold">@lang('mymo::app.live_tv')</h5>
                </div>

                <div class="col-md-6">
                    <div class="float-right">

                        <div class="btn-group">
                            <button type="button" class="btn btn-primary status-button" data-status="1"><i class="fa fa-check"></i> @lang('mymo::app.enabled')</button>

                            <button type="button" class="btn btn-warning status-button" data-status="0"><i class="fa fa-times"></i> @lang('mymo::app.disabled')</button>
                        </div>

                        <div class="btn-group">
                            <a href="{{ route('admin.live-tv.create') }}" class="btn btn-success"><i class="fa fa-plus-circle"></i> @lang('mymo::app.add_new')</a>
                            <button type="button" class="btn btn-danger" id="delete-item"><i class="fa fa-trash"></i> @lang('mymo::app.delete')</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-body">

            <div class="row mb-3">
                <div class="col-md-12">
                    <form action="" method="get" class="form-inline" id="form-search">

                        <div class="form-group mb-2 mr-1">
                            <label for="search" class="sr-only">@lang('mymo::app.search')</label>
                            <input name="search" type="text" id="search" class="form-control" placeholder="@lang('mymo::app.search')" autocomplete="off">
                        </div>

                        <div class="form-group mb-2 mr-1">
                            <label for="category" class="sr-only">@lang('mymo::app.category')</label>
                            <select name="category" id="category" class="form-control load-live-tv-category" data-placeholder="--- @lang('mymo::app.category') ---"></select>
                        </div>

                        <div class="form-group mb-2 mr-1">
                            <label for="status" class="sr-only">@lang('mymo::app.status')</label>
                            <select name="status" id="status" class="form-control">
                                <option value="">--- @lang('mymo::app.status') ---</option>
                                <option value="1">@lang('mymo::app.enabled')</option>
                                <option value="0">@lang('mymo::app.disabled')</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary mb-2"><i class="fa fa-search"></i> @lang('mymo::app.search')</button>
                    </form>
                </div>

            </div>

            <div class="table-responsive mb-5">
                <table class="table mymo-table">
                    <thead>
                        <tr>
                            <th data-width="3%" data-field="state" data-checkbox="true"></th>
                            <th data-width="10%" data-field="thumbnail" data-formatter="thumbnail_formatter">@lang('mymo::app.thumbnail')</th>
                            <th data-field="name" data-formatter="name_formatter">@lang('mymo::app.name')</th>
                            <th data-width="15%" data-field="status" data-align="center" data-formatter="status_formatter">@lang('mymo::app.status')</th>
                            <th data-width="15%" data-field="options" data-align="center" data-formatter="options_formatter">@lang('mymo::app.options')</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function thumbnail_formatter(value, row, index) {
        return '<img src="'+ row.thumb_url +'" class="w-100">';
    }

    function name_formatter(value, row, index) {
        return '<a href="'+ row.edit_url +'">'+ value +'</a>';
    }

    function status_formatter(value, row, index) {
        if (value == 1) {
            return '<span class="text-success">'+ mymo.lang.enabled +'</span>';
        }
        return '<span class="text-danger">'+ mymo.lang.disabled +'</span>';
    }

    function options_formatter(value, row, index) {
        let result = '<div class="dropdown d-inline-block mb-2 mr-2">\n' +
            '          <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">\n' +
            '            '+ mymo.lang.options +'\n' +
            '          </button>\n' +
            '          <div class="dropdown-menu" role="menu" style="">\n' +
            '            <a href="'+ row.stream_url +'" class="dropdown-item">'+ mymo.lang.stream +'</a>\n' +
            '            <a href="'+ row.preview_url +'" target="_blank" class="dropdown-item">'+ mymo.lang.preview +'</a>\n' +
            '          </div>\n' +
            '        </div>';
        return result;
    }

    var table = new JuzawebTable({
        url: '{{ route('admin.live-tv.getdata') }}',
        remove_url: '{{ route('admin.live-tv.remove') }}',
        status_url: '{{ route('admin.live-tv.publish') }}',
    });
</script>

@endsection