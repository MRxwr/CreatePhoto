@extends('juzaweb::layouts.backend')

@section('content')
<style>
    #search-status{
        display:none;
    }
</style>
    <div class="row mb-3">
        <div class="col-md-12">
            <div class="btn-group float-right">
                <a href="{{ route('bookings.create') }}" class="btn btn-success"><i class="fa fa-plus-circle"></i> @lang('sbsl::app.add_new')</a>
            </div>
        </div>
    </div>

    {{ $dataTable->render() }}

@endsection