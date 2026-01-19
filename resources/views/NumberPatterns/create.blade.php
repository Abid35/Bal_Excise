@extends('layouts.dash')

@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">

                    <div class="panel panel-default mb-50 addnewpanl">
                        <div class="panel-body">

                            <div class="topTabsSection">
                                <div class="headingDiv wdth100 d-flex justify-content-between align-items-center">
                                    <h2>Add Number Pattern</h2>
                                    <a href="{{ route('number_patterns.index') }}" class="btn btn-secondary">Back</a>
                                </div>
                            </div>

                            @if ($message = Session::get('success'))
                                <div class="alert alert-success mt-3">
                                    <p class="mb-0">{{ $message }}</p>
                                </div>
                            @endif

                            <form method="POST" action="{{ route('number_patterns.store') }}">
                                @csrf

                                <div class="row mb-3">
                                    <label class="col-md-4 col-form-label text-md-end">Start Prefix</label>
                                    <div class="col-md-6">
                                        <input type="text" name="start_prefix" class="form-control" placeholder="e.g. ABC" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-md-4 col-form-label text-md-end">End Prefix</label>
                                    <div class="col-md-6">
                                        <input type="text" name="end_prefix" class="form-control" placeholder="e.g. AHE" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-md-4 col-form-label text-md-end">Start Number</label>
                                    <div class="col-md-6">
                                        <input type="number" name="start_no" class="form-control" placeholder="e.g. 200" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-md-4 col-form-label text-md-end">End Number</label>
                                    <div class="col-md-6">
                                        <input type="number" name="end_no" class="form-control" placeholder="e.g. 500" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-md-4 col-form-label text-md-end">Is Government</label>
                                    <div class="col-md-6">
                                        <input type="checkbox" id="is_government" name="is_government" value="1">
                                    </div>
                                </div>

                                <div class="row mb-3 district-row">
                                    <label class="col-md-4 col-form-label text-md-end">District</label>
                                    <div class="col-md-6">
                                        <select class="form-control" id="district" name="district_id">
                                            <option value="">--Select District--</option>
                                            @foreach($district as $val)
                                                <option value="{{ $val->id }}">{{ $val->eto_location }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3 body-row">
                                    <label class="col-md-4 col-form-label text-md-end">Type Of Body</label>
                                    <div class="col-md-6">
                                        <select class="form-control" id="type_of_body" name="type" disabled>
                                            <option value="">--Select Body Type--</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <label class="col-md-4 col-form-label text-md-end">Status</label>
                                    <div class="col-md-6">
                                        <select name="is_active" class="form-control">
                                            <option value="1" selected>Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-0 mt-4">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <a href="{{ route('number_patterns.index') }}" class="btn btn-secondary">Cancel</a>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {

            // Disable Type of Body initially
            $('#type_of_body').prop('disabled', true);

            // Handle District select change
            $('#district').change(function() {
                var districtId = $(this).val();
                if(districtId) {
                    $.ajax({
                        url: "{{ route('getTypeOfBody') }}", // create this route
                        type: "GET",
                        data: { district_id: districtId },
                        success: function(data) {
                            $('#type_of_body').empty().append('<option value="">--Select Body Type--</option>');
                            $.each(data, function(key, value) {
                                $('#type_of_body').append('<option value="'+value.tob_code+'">'+value.type_of_body+'</option>');
                            });
                            $('#type_of_body').prop('disabled', false);
                        }
                    });
                } else {
                    $('#type_of_body').empty().append('<option value="">--Select Body Type--</option>').prop('disabled', true);
                }
            });

            // Handle Is Government checkbox
            $('#is_government').change(function() {
                if($(this).is(':checked')) {
                    $('.district-row, .body-row').hide();
                    $('#district').prop('required', false);
                    $('#type_of_body').prop('required', false);
                } else {
                    $('.district-row, .body-row').show();
                    $('#district').prop('required', true);
                    $('#type_of_body').prop('required', true);
                }
            });

        });
    </script>

@endsection
