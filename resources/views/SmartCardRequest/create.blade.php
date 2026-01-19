@extends('layouts.dash')

@section('template_title', 'Create Smart Card Request')

@section('content')
    <div class="row">
        <div class="col-sm-9 col-sm-offset-2">

            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <div id="ajax-success-message" style="display:none;" class="alert alert-success"></div>

            {{-- Alerts --}}
            <div id="alertBox"></div>

            {{-- Search Vehicle --}}
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <strong><span class="glyphicon glyphicon-search"></span> Search Vehicle</strong>
                </div>
                <div class="panel-body">
                    <form id="verifyForm" class="form-horizontal">
                        @csrf
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Vehicle Number</label>
                            <div class="col-sm-9">
                                <input type="text" id="reg_no" name="reg_no" class="form-control" placeholder="e.g. TRUCK311" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">District</label>
                            <div class="col-sm-9">
                                <select id="district_id" name="district_id" class="form-control" required>
                                    <option value="">Select District</option>
                                    @foreach($districts as $d)
                                        <option value="{{ $d->id }}">{{ $d->eto_location }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group text-right">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-primary">
                                    <span class="glyphicon glyphicon-search"></span> Search
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            {{-- Vehicle Snapshot --}}
            <div id="vehicleSection" class="panel panel-success" style="display:none;">
                <div class="panel-heading">
                    <strong><span class="glyphicon glyphicon-road"></span> Vehicle Snapshot</strong>
                </div>
                <div class="panel-body">
                    <form id="smartCardForm" method="POST" action="{{ route('smart-cards.store') }}">
                        @csrf
                        <input type="hidden" name="vehicle_id" id="vehicle_id">
                        <input type="hidden" name="reg_no" id="form_reg_no">
                        <input type="hidden" name="district_id" id="form_district_id">

                        <div class="row" id="vehicleDetails"></div>

                        <div class="form-group">
                            <label>Remarks</label>
                            <textarea name="remarks" id="remarks" class="form-control" rows="2" placeholder="Enter remarks if any"></textarea>
                        </div>

                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-success">
                                <span class="glyphicon glyphicon-send"></span> Submit Request
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

    {{-- Scripts --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });

        $('#verifyForm').on('submit', function(e) {
            e.preventDefault();
            $.post('{{ route("smart-cards.verify") }}', $(this).serialize(), function(response) {
                if (response.status === 'success') {
                    $('#ajax-success-message').text(response.message).show();

                    // Optionally hide after some seconds
                    setTimeout(function() {
                        $('#ajax-success-message').fadeOut();
                    }, 3000);

                    $('#alertBox').empty();

                    $('#vehicle_id').val(response.vehicle.id);
                    $('#form_reg_no').val(response.vehicle.registration_number);
                    $('#form_district_id').val(response.vehicle.district_id);

                    // Add vehicle_data hidden field
                    $('#smartCardForm').append(
                        `<input type="hidden" name="vehicle_data" value='${JSON.stringify(response.vehicle)}'>`
                    );

                    var html = '';
                    $.each(response.vehicle, function(key, value) {
                        if (['id', 'district_id'].indexOf(key) === -1) {
                            html += `
                        <div class="col-sm-6">
                            <div class="well well-sm">
                                <small class="text-muted">${key.replace(/_/g, ' ').toUpperCase()}</small>
                                <div><strong>${value || '-'}</strong></div>
                            </div>
                        </div>
                    `;
                        }
                    });

                    $('#vehicleDetails').html(html);
                    $('#vehicleSection').fadeIn();
                } else {
                    $('#vehicleSection').hide();
                    $('#alertBox').html('<div class="alert alert-danger">'+(response.message || 'Vehicle not found.')+'</div>');
                }
            }).fail(function(xhr) {
                $('#vehicleSection').hide();
                $('#alertBox').html('<div class="alert alert-danger">'+(xhr.responseJSON?.message || 'An error occurred.')+'</div>');
            });
        });

    </script>
@endsection
