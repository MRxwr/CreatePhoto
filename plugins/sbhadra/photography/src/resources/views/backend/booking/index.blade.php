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
    <!-- Modal -->
    <div id="change_theme_modal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Add Theme</h4>
        </div>
        
        <div class="modal-body">
           <form action="{{route('admin.change.theme')}}" method="post" class="form-ajax" novalidate="novalidate">
                    <input id="booking_id" type="hidden" name="id" value="">
                    {{csrf_field()}}
                    @do_action('admin.cstudio.themes')
                    <button type="submit" class="btn btn-primary">Save Theme</button>
           </form>
        </div>
       
       
        </div>

    </div>
    </div>
    <script>
      $("body").on("click", ".change_theme", function(e) {
         var booking_id = this.id;
         $('#booking_id').val(booking_id)
      });
    </script>
@endsection