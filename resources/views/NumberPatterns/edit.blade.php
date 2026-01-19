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
                                    <h2>Edit Number Pattern</h2>
                                    <a href="{{ route('number_patterns.index') }}" class="btn btn-secondary">Back</a>
                                </div>
                            </div>

                            @if ($message = Session::get('success'))
                                <div class="alert alert-success mt-3">
                                    <p class="mb-0">{{ $message }}</p>
                                </div>
                            @endif

                            <form method="POST" action="{{ route('number_patterns.update', $pattern->id) }}">
                                @csrf
                                @method('PUT')

                                {{-- Start Prefix --}}
                                <div class="row mb-3">
                                    <label class="col-md-4 col-form-label text-md-end">Start Prefix</label>
                                    <div class="col-md-6">
                                        <input type="text" name="start_prefix" class="form-control"
                                               value="{{ old('start_prefix', $pattern->start_prefix) }}" required>
                                    </div>
                                </div>

                                {{-- End Prefix --}}
                                <div class="row mb-3">
                                    <label class="col-md-4 col-form-label text-md-end">End Prefix</label>
                                    <div class="col-md-6">
                                        <input type="text" name="end_prefix" class="form-control"
                                               value="{{ old('end_prefix', $pattern->end_prefix) }}" required>
                                    </div>
                                </div>

                                {{-- Start Number --}}
                                <div class="row mb-3">
                                    <label class="col-md-4 col-form-label text-md-end">Start Number</label>
                                    <div class="col-md-6">
                                        <input type="number" name="start_no" class="form-control"
                                               value="{{ old('start_no', $pattern->start_no) }}" required>
                                    </div>
                                </div>

                                {{-- End Number --}}
                                <div class="row mb-3">
                                    <label class="col-md-4 col-form-label text-md-end">End Number</label>
                                    <div class="col-md-6">
                                        <input type="number" name="end_no" class="form-control"
                                               value="{{ old('end_no', $pattern->end_no) }}" required>
                                    </div>
                                </div>

                                {{-- Is Government Checkbox --}}
                                <div class="row mb-3">
                                    <label class="col-md-4 col-form-label text-md-end">Is Government</label>
                                    <div class="col-md-6">
                                        <input type="checkbox" id="is_government" name="is_government" value="1"
                                            {{ old('is_government', $pattern->is_government) ? 'checked' : '' }}>
                                    </div>
                                </div>

                                {{-- District --}}
                                <div class="row mb-3 district-row">
                                    <label class="col-md-4 col-form-label text-md-end">District</label>
                                    <div class="col-md-6">
                                        <select class="form-control" id="district" name="district_id">
                                            <option value="">--Select District--</option>
                                            @foreach($district as $val)
                                                <option value="{{ $val->id }}"
                                                    {{ old('district', $pattern->district_id) == $val->id ? 'selected' : '' }}>
                                                    {{ $val->eto_location }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                {{-- Type Of Body --}}
                                <div class="row mb-3 body-row">
                                    <label class="col-md-4 col-form-label text-md-end">Type Of Body</label>
                                    <div class="col-md-6">
                                        <select class="form-control" id="type_of_body" name="type">
                                            <option value="">--Select Body Type--</option>
                                            @foreach($tob as $val)
                                                <option value="{{ $val->tob_code }}"
                                                    {{ old('type', $pattern->type) == $val->tob_code ? 'selected' : '' }}>
                                                    {{ $val->type_of_body }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                {{-- Status --}}
                                <div class="row mb-3">
                                    <label class="col-md-4 col-form-label text-md-end">Status</label>
                                    <div class="col-md-6">
                                        <select name="is_active" class="form-control">
                                            <option value="1" {{ $pattern->is_active ? 'selected' : '' }}>Active</option>
                                            <option value="0" {{ !$pattern->is_active ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                    </div>
                                </div>

                                {{-- Submit --}}
                                <div class="row mb-0 mt-4">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">Update</button>
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

            // Enable/Disable Type of Body
            function toggleBodySelect() {
                if($('#district').val()) {
                    $('#type_of_body').prop('disabled', false);
                } else {
                    $('#type_of_body').prop('disabled', true);
                }
            }

            toggleBodySelect();

            // AJAX to fetch Type of Body
            $('#district').change(function() {
                var districtId = $(this).val();
                if(districtId) {
                    $.ajax({
                        url: "{{ route('getTypeOfBody') }}",
                        type: "GET",
                        data: { district_id: districtId },
                        success: function(data) {
                            $('#type_of_body').empty().append('<option value="">--Select Body Type--</option>');
                            $.each(data, function(key, value) {
                                var selected = value.tob_code == "{{ old('type', $pattern->type) }}" ? 'selected' : '';
                                $('#type_of_body').append('<option value="'+value.tob_code+'" '+selected+'>'+value.type_of_body+'</option>');
                            });
                            $('#type_of_body').prop('disabled', false);
                        }
                    });
                } else {
                    $('#type_of_body').empty().append('<option value="">--Select Body Type--</option>').prop('disabled', true);
                }
            });

            // Handle Is Government Checkbox
            function toggleGovernment() {
                if($('#is_government').is(':checked')) {
                    $('.district-row, .body-row').hide();
                    $('#district').prop('required', false);
                    $('#type_of_body').prop('required', false);
                } else {
                    $('.district-row, .body-row').show();
                    $('#district').prop('required', true);
                    $('#type_of_body').prop('required', true);
                }
            }

            toggleGovernment();

            $('#is_government').change(function() {
                toggleGovernment();
            });

        });
    </script>

@endsection
