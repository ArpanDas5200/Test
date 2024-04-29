@extends('layout.master')
@section('title', 'All Users')

@section('content')
    <div id="content" class="app-content">
        <div class="row">
            <div class="col-12 mb-3">
                <a href="{{ route('add-user-view') }}" class="btn btn-outline-purple me-2" >Add Users</a>
            </div>

            <div class="col-12">
                <table class="table table-hover table-bordered table-responsive" id="userTable">
                    <thead class="table-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">State</th>
                        <th scope="col">City</th>
                        <th scope="col">Images</th>
                        <th scope="col">hobbies</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>


    {{--  Modals  --}}
    <div class="modal fade" id="deleteModal" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Are you sure to delete this user?</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                    <button type="button" class="btn btn-primary deleteIt">Yes</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('custom-js')
    <script src="{{ asset('assets/plugins/validate.js') }}"></script>
    <script type="text/javascript">
        var table;
        $(document).ready(function(){

            table = $('#userTable').DataTable({
                processing: true,
                responsive: true,
                serverSide: true,
                info: true,
                // dom: "Bfrtip",
                lengthMenu: [ 10, 20, 30, 40, 50 ],
                columns: [
                    {data: "DT_RowIndex"},
                    {data: "name"},
                    {data: "state"},
                    {data: "city"},
                    {data: "images"},
                    {data: "hobbies"},
                    {data: "action"},
                ],
                ajax: {
                    url: '{{ route('get-users') }}',
                    type: 'POST',
                    dataType: "JSON",
                    data:{
                        '_token': '{{ csrf_token() }}',
                    }
                },
            });
        });

        $(document).on('click', '.delete', function(e){
            var id = $(this).data('id');
            $('#deleteModal').attr('data-id', id);
            $('#deleteModal').show();
        });

        $(document).on('click', '.deleteIt', function(e){
            var id = $('#deleteModal').data('id');
            $.ajax({
                url: '{{ route('delete') }}',
                type: "POST",
                dataType: "JSON",
                data: {
                    '_token' : "{{ csrf_token() }}",
                    'id' : id
                },
                success: function (data) {
                    if (data.status == '200') {
                        toastr.success(data.response);
                        table.ajax.reload();
                    } else {
                        toastr.error(data.response)
                    }
                },
                complete: function(){
                    $('#deleteModal').modal('hide');
                }

            });
        })



    </script>
@endpush
