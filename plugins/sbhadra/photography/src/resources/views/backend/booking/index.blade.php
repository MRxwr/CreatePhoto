@extends('juzaweb::layouts.backend')

@section('content')
<style>
    #search-status{
        display:none;
    }
    .vodiapicker{
  display: none; 
}

#a{
  padding-left: 0px;
}

#a img, .btn-select img{
  width: 12px;
  
}

#a li{
  list-style: none;
  padding-top: 5px;
  padding-bottom: 5px;
}

#a li:hover{
 background-color: #F4F3F3;
}

#a li img{
  margin: 5px;
}

#a li span, .btn-select li span{
  margin-left: 30px;
}

/* item list */

.b{
  display: none;
  width: 100%;
  max-width: 350px;
  box-shadow: 0 6px 12px rgba(0,0,0,.175);
  border: 1px solid rgba(0,0,0,.15);
  border-radius: 5px;
  
}

.open{
  display: show !important;
}

.btn-select{
  margin-top: 10px;
  width: 100%;
  max-width: 350px;
  height: 34px;
  border-radius: 5px;
  background-color: #fff;
  border: 1px solid #ccc;
 
}
.btn-select li{
  list-style: none;
  float: left;
  padding-bottom: 0px;
}

.btn-select:hover li{
  margin-left: 0px;
}

.btn-select:hover{
  background-color: #F4F3F3;
  border: 1px solid transparent;
  box-shadow: inset 0 0px 0px 1px #ccc;
  
  
}

.btn-select:focus{
   outline:none;
}

.lang-select{
  margin-left: 50px;
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
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Add Theme</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
           <form action="{{route('admin.change.theme')}}" method="post" class="form-ajax" novalidate="novalidate">
                    <input id="booking_id" type="hidden" name="id" value="">
                    {{csrf_field()}}
                    @do_action('admin.success.themes')
                    <br>
                    <div class="flot-right"> 
                        <button type="submit" class="btn btn-primary">Save Theme</button>
                    </div>
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