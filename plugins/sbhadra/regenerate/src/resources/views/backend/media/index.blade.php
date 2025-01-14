@extends('juzaweb::layouts.backend')

@section('content')

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <!-- Buttons CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.1/css/buttons.dataTables.min.css">
    <div class="row mb-3">
        <div class="col-md-12">
            <div class="card-header">
                <h5 class="float-left col-md-4">Filter</h5>
                 <form class="float-right col-md-6  form-ajax" action="{{route('admin.media.generate')}}" method="post">
                     @csrf
                        <div class="row">
                            <div class="col-md-3">
                              <div class="form-group">
                                 <select name="ext" class="form-control ">
                                    <option value="">None</option>
                                    <option value="jpg">JPG</option>
                                    <option value="jpeg">JPEG</option>
                                    <option value="webp">WEBP</option>
                                    <!--<option value="imageMur">10</option>-->
                                </select>
                             </div>
                          </div>
                             <div class="col-md-3">
                              <div class="form-group">
                                 <select name="api_type" class="form-control ">
                                    <option value="createapi">CreateApi</option>
                                    <!--<option value="imageMur">10</option>-->
                                </select>
                             </div>
                          </div>
                          <div class="col-md-4">
                              <div class="form-group">
                                 <select name="number_of_img" class="form-control ">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                             </div>
                          </div>
                      <div class="col-md-2">
                      
                         <input class="btn btn-primary" type="submit" name="submit" id="submit" value="Regenerate">
                      </div>
                     
                    </div>
                 </form>
            </div>
        </div>
    </div>
       

    <div class="table-responsive"><div class="bootstrap-table">
      <table id="example" class="display nowrap" style="width:100%">
        <thead>
            <tr>
                <th>SL</th>
                <th>imgId</th>
                <th>Path</th>
                <th>Thumbs</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @if($models)
              @foreach($models as $key=>$model)
            <tr height="30">
                <td>{{$key+1}} {!!($model->imgId?'<span style="width;28px; height:28px; color:green;"><i class="fa fa-check" aria-hidden="true"></i></span>':'')!!}</td>
                <td>{{$model->imgId}}</td>
                <td>{{$model->path}}</td>
                <td>{{$model->type}}</td>
                <td>{{$model->created_at}}</td>
            </tr>
             @endforeach
            @endif
            
           
        </tbody>
        
    </table>

        
    </div>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<!-- DataTables Buttons JS -->
<script src="https://cdn.datatables.net/buttons/2.3.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.1/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.1/js/buttons.print.min.js"></script>
<script>
var arabicFonts = {
        Amiri: {
            normal: 'Amiri-Regular.ttf',
            bold: 'Amiri-Bold.ttf',
            italics: 'Amiri-Italic.ttf',
            bolditalics: 'Amiri-BoldItalic.ttf'
        }
    };

    pdfMake.fonts = arabicFonts;
    $(document).ready(function() {
        $('#example').DataTable({
            dom: 'Bfrtip',
            lengthMenu: [ [10, 25, 50, -1], [10, 25, 50, "All"] ], // Number of rows options
            pageLength: 25 // Default number of rows per page
        });
    });
</script>
@endsection