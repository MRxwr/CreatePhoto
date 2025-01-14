@extends('juzaweb::layouts.backend')

@section('content')

    <div class="row mb-3">
        <div class="col-md-12">
            <div class="btn-group float-right">
                <a href="{{ route('admin.packages.create') }}" class="btn btn-success"><i class="fa fa-plus-circle"></i> @lang('sbsl::app.add_new')</a>
            </div>
        </div>
    </div>

    {{ $dataTable->render() }}
 <script>
        $(document).ready(function(){
           
            $('body').on('keyup', 'input[name="odrs"]', function(){
                var inputValue =  $(this).val();
                var inputIndex = $(this).attr('data-index');
               
                // AJAX request
                $.ajax({
                    type: 'GET',
                    url: '{{route("admin.package_order.update")}}', 
                    data: { Index: inputIndex,value:inputValue },
                    success: function(response) {
                        console.log('Server response:', response);
                    },
                    error: function(error) {
                        console.error('Error:', error);
                    }
                });
            });
        });
    </script>
@endsection