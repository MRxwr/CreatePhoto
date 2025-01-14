@extends('juzaweb::layouts.backend')

@section('content')

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <!-- Buttons CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.1/css/buttons.dataTables.min.css">

    <div class="row mb-3">
        <div class="col-md-12">
            <div class="card-header">
                <h5 class="float-left col-md-4">Filter</h5>
                 <form class="float-right col-md-8 ">
                    <div class="row">
                        
                      <div class="col-md-5">
                          <div class="form-group"><label class="col-form-label" for="title">From</label>
                            <input type="date" class="form-control " data-date-format="DD MM YYYY" name="from" id="from" value="{{$from}}">
                         </div>
                      </div>
                      
                      <div class="col-md-5">
                        <div class="form-group"><label class="col-form-label" for="title">To  </label>
                            <input type="date" class="form-control " data-date-format="DD MM YYYY" name="to" id="to" value="{{$to}}">
                        </div>
                      </div>
                      
                      <div class="col-md-2">
                      <label class="col-form-label" for="title">-</label>
                      <input class="btn btn-primary" type="submit" name="submit" id="submit" value="Submit">
                      </div>
                     
                    </div>
                 </form>
            </div>
        </div>
    </div>
       @php
        $leanth = count($questions);
        $targets=[];   
        @endphp

    <div class="table-responsive"><div class="bootstrap-table">
      <table id="example" class="display nowrap" style="width:100%">
        <thead>
            <tr>
                <th>SL</th>
                <th>Customer Name</th>
                <th>Customer Mobile</th>
                <th>Coupon Code</th>
                  @foreach($questions as $k=>$questions)
                    @php 
                    $ctn = count($targets);
                     $targets[] = ($ctn+4);
                     $targets[] = ($ctn+5);
                    @endphp
                    <th>Question {{$k+1}}</th>
                    <th>Answer {{$k+1}} </th>
                  @endforeach

                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @if($models)
              @foreach($models as $key=>$model)
              
              @php
                $survey_result = json_decode($model->survey_result);
               // dd($survey_result);
              @endphp
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$model->customer_name}}</td>
                <td>{{$model->customer_mobile}}</td>
                <td>{{$model->survey_coupon}}</td>
                 @foreach($survey_result as $result)
                   <td>{{@$result->question}}</td>
                   <td>{{@$result->answer}}</td>
                 @endforeach
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
            buttons: [
                {
                    extend: 'csv',
                    text: 'CSV',
                    charset: 'UTF-8',
                    bom: true, // For Arabic support in CSV
                    title: 'survey_reports', // Set the custom file name for CSV export
                    exportOptions: {
                            columns: ':visible, :hidden'  // Export all columns, both visible and hidden
                        },
                },
                {
                    extend: 'excelHtml5',
                    text: 'Excel',
                    title: 'survey_reports', // Set the custom file name for CSV export
                    exportOptions: {
                            columns: ':visible, :hidden'  // Export all columns, both visible and hidden
                        },
                },
                {
                    extend: 'pdfHtml5',
                    text: 'PDF',
                    title: 'survey_reports', // Set the custom file name for CSV export
                    exportOptions: {
                            columns: ':visible, :hidden'  // Export all columns, both visible and hidden
                        },
                    customize: function(doc) {
                        doc.defaultStyle = {
                            font: 'Amiri' // Embed Arabic font for PDF export
                        };
                    }
                }
            ],
            columnDefs: [
                {
                    targets: <?php echo json_encode($targets); ?>, // Index of the column you want to hide in the table (example)
                    visible: false // Hides this column in the table view
                }
            ],
            lengthMenu: [ [10, 25, 50, -1], [10, 25, 50, "All"] ], // Number of rows options
            pageLength: 25 // Default number of rows per page
        });
    });
</script>
@endsection