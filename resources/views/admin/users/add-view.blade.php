@extends('layout.master')
@section('title', 'Add User')

@section('content')
    <div id="content" class="app-content">
        <form id="addUser" class="row" enctype="multipart/form-data">
            @csrf
            <div class="form-group col-6 mb-3">
                <label class="form-label" for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="">
            </div>

            <div class="form-group col-6 mb-3">
                <label class="form-label" for="name">State</label>
                <select class="form-select" id="statesChange" name="state">
                    @foreach($data as $states)
                        <option value="{{ $states['id'] }}">{{ $states['name'] }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group col-6 mb-3">
                <label class="form-label" for="name">City</label>
                <select class="form-select" id="city" name="city"> </select>
            </div>

            <div class="form-group col-6 mb-3">
                <label class="form-label" for="model_no">Images</label>
                <input type="file" class="form-control" id="image" name="image[]" multiple>
            </div>

            <div class="form-group col-6 mb-3">
                <label class="form-label" for="">Hobbies</label>
                <div class="form-check ">
                    <input class="form-check-input" type="checkbox" name="hobbies[]" value="cricket" id="cricket">
                    <label class="form-check-label" for="cricket">Cricket</label>
                </div>
                <div class="form-check ">
                    <input class="form-check-input" type="checkbox" name="hobbies[]" value="games" id="games">
                    <label class="form-check-label" for="games">Games</label>
                </div>
            </div>

            <div class="form-group col-12 mb-3 text-center">
                <button type="submit" class="btn btn-outline-primary">Save changes</button>
            </div>
        </form>
    </div>
@endsection

@push('custom-js')
    <script src="{{ asset('assets/plugins/validate.js') }}"></script>
    <script type="text/javascript">

        $(document).on('change', '#statesChange', function(e){
            var id = $(this).val();
            $.ajax({
                url: '{{ route('city-list') }}',
                type: "POST",
                dataType: "JSON",
                data: {
                    '_token' : "{{ csrf_token() }}",
                    'id' : id
                },
                success: function (data) {
                    var $select = $('#city');
                    $select.empty();

                    $.each(data, function(index, city) {
                        var $option = $('<option></option>').text(city.name).attr('value', city.id);
                        $select.append($option);
                    });
                },
            });
        });

        $("#addUser").validate({
            rules: {
                name: {required: true},
                image: { required: true },
                state: {required: true},
                city: {required: true},
            },
            messages: {
                name: {required: "Please enter your Name"},
                image: {
                    required: "Please upload an Image",
                    // extension: "Please upload file in these format only(jpg or png)"
                },
                state: {required: "Please select your State"},
                city: {required: "Please select your City"},
            },
            errorClass: "text-danger",
            submitHandler: function (form, e) {
                e.preventDefault();
                let data = new FormData(form);
                $.ajax({
                    url: '{{ route('add-user') }}',
                    type: "POST",
                    dataType: "JSON",
                    data: data,
                    cache: false,
                    async: false,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        if (data.status == '200') {
                            toastr.success(data.response, {timeout: 2000});
                            setTimeout(function () {
                                window.location.href = "{{ route('dashboard') }}";
                            }, 2000);
                        } else {
                            toastr.error(data.response)
                        }
                    },
                });
            }
        })

    </script>
@endpush
