@extends('layouts.dash')

@section('content')
    <style>
        .main {
            width: 85%;
            margin: auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        @media (max-width: 992px) {
            .main {
                width: 100%;
                padding: 10px;
            }
        }

        .strong {
            font-weight: bold;
            color: black;
            margin-bottom: 20px;
        }

        .form-group {
            position: relative;
            margin-bottom: 20px;
        }

        .form-group .form-control-feedback {
            position: absolute;
            top: 50%;
            left: 10px;
            transform: translateY(-50%);
            color: #aaa;
        }

        .form-group input {
            padding-left: 2.5rem;
        }

        .card {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .card-title {
            font-size: 1.25rem;
            margin-bottom: 10px;
        }

        .card-text {
            margin-bottom: 5px;
        }
    </style>

    <div id="maindiv" class="container main">
        <div class="row">
            <div class="col-md-4">
                <h2 class="strong">Vehicle History</h2>
            </div>

            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group has-search">
                            <span class="form-control-feedback"></span>
                            <input type="text" class="form-control" id="vehicleNoInput" placeholder="Enter Vehicle No.">
                        </div>
                    </div>
{{--                    <div class="col-md-3">--}}
{{--                        <select class="form-control" id="typeSelect">--}}
{{--                            <option value="current">Current</option>--}}
{{--                            <option value="old">Old</option>--}}
{{--                        </select>--}}
{{--                    </div>--}}
                    <div class="col-md-3">
                        <select class="form-control" id="locationSelect">
                            <option value="current">Select ETO Location</option>
                            @forelse($eto_location as $location)
                                <option value="{{ $location->id }}">{{ $location->eto_location }}</option>
                                @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <button class="btn btn-primary" id="searchButton">Search</button>
                    </div>
                </div>
            </div>
        </div>

        {{-- Vehicle Details --}}
        <div class="row" id="vehicleDetails" style="display: none;">
            <div class="col-12">
                <h4 class="strong">Vehicle Details</h4>
                <div id="vehicleDetailsCard" class="card">
                    <div class="row">
                        <div class="col-md-6">
                            <p class="card-text"><strong>Vehicle No:</strong> <span id="vehicleNo"></span></p>
                            <p class="card-text"><strong>Owner Name:</strong> <span id="ownerName"></span></p>
                            <p class="card-text"><strong>Address:</strong> <span id="address"></span></p>
                            <p class="card-text"><strong>Type of Body:</strong> <span id="bodyType"></span></p>
                            <p class="card-text"><strong>Class of Vehicle:</strong> <span id="class"></span></p>
                            <p class="card-text"><strong>Maker:</strong> <span id="maker"></span></p>
                        </div>
                        <div class="col-md-6">
                            <p class="card-text"><strong>Year of Manufacture:</strong> <span id="yearOfManufacture"></span></p>
                            <p class="card-text"><strong>Chassis No:</strong> <span id="chassisNo"></span></p>
                            <p class="card-text"><strong>Engine No:</strong> <span id="engineNo"></span></p>
                            <p class="card-text"><strong>Seat Cap:</strong> <span id="seatCap"></span></p>
                            <p class="card-text"><strong>Engine Cap:</strong> <span id="engineCap"></span></p>
                            <p class="card-text"><strong>Date of Register:</strong> <span id="dateOfRegister"></span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Vehicle Transfer History --}}
        <div class="row" id="transferHistoryCol" style="display: none;">
            <div class="col-12">
                <h4 class="strong">Alteration</h4>
                <div id="transferHistory"></div>
                <!-- Transfer history cards will be appended here by JavaScript -->
            </div>
        </div>

        {{-- Vehicle Owner History --}}
        <div class="row" id="ownerHistoryCol" style="display: none;">
            <div class="col-12">
                <h4 class="strong">Owners</h4>
                <div id="ownerHistory"></div>
                <!-- Owner history cards will be appended here by JavaScript -->
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script>
        $(document).ready(function () {
            $('#searchButton').click(function () {
                const vehicleNo = $('#vehicleNoInput').val();
                // const type = $('#typeSelect').val();
                const location = $('#locationSelect').val();

                if (location != "" && vehicleNo != "") {
                    fetchVehicleHistory(vehicleNo, location);
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Validation Error',
                        text: 'All fields are required.',
                    });
                }
            });

            $('#vehicleNoInput').keypress(function (event) {
                if (event.which === 13) {
                    event.preventDefault();
                    const vehicleNo = $(this).val();
                    const type = $('#typeSelect').val();
                    const location = $('#locationSelect').val();

                    if (location != "" && vehicleNo != "") {
                        fetchVehicleHistory(vehicleNo, location);
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Validation Error',
                            text: 'All fields are required.',
                        });
                    }
                }
            });
        });

        function fetchVehicleHistory(vehicleNo, location) {
            $('#ownerHistoryCol').hide();
            $('#transferHistoryCol').hide();
            $('#vehicleDetails').hide();

            $.ajax({
                url: '/history/store',
                method: 'GET',
                data: {
                    vehicle_no: vehicleNo,
                    // type: type,
                    location: location,
                },
                success: function (response) {
                    if (response.status) {
                        // displayVehicleDetails(response.vehicleDetails);
                        displayVehicleDetails(response.vehicleInfo);
                        displayTransferHistory(response.transfers);
                        displayOwnerHistory(response.owners, response.vehicleInfo);
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Vehicle Not Found',
                            text: 'The vehicle with registration number ' + vehicleNo + ' was not found.',
                        });
                    }
                },
                error: function (error) {
                    console.log('Error fetching vehicle history:', error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Error fetching vehicle history. Please try again later.',
                    });
                }
            });
        }

        function displayVehicleDetails(details) {
            $('#vehicleDetails').show();
            $('#vehicleNo').text(details.vehicleNo);
            $('#ownerName').text(details.ownerName);
            $('#address').text(details.address);
            $('#bodyType').text(details.bodyType);
            $('#class').text(details.class);
            $('#maker').text(details.maker);
            $('#yearOfManufacture').text(details.yearOfManufacture);
            $('#chassisNo').text(details.chassisNo);
            $('#engineNo').text(details.engineNo);
            $('#seatCap').text(details.seatCap);
            $('#engineCap').text(details.engineCap);
            $('#dateOfRegister').text(details.dateOfRegister);
        }

        function displayTransferHistory(transfers) {
            $('#transferHistoryCol').show()
            const transferHistoryDiv = $('#transferHistory');
            transferHistoryDiv.empty();
            transfers.forEach((transfer, index) => {
                const card = `
                    <div class="card">
                        <h5 class="card-title">Transfer ${index + 1}</h5>
                        <p class="card-text"><strong>Location:</strong> ${transfer.eto_location_id}</p>
                        <p class="card-text"><strong>Reg No:</strong> ${transfer.old_reg_no}</p>
                        <p class="card-text"><strong>Date:</strong> ${transfer.dates}</p>
                    </div>
                `;
                transferHistoryDiv.append(card);
            });
            transferHistoryDiv.show();
        }

        function displayOwnerHistory(owners, firstOwner) {

            const ownerHistoryCol = $('#ownerHistoryCol');
            const ownerHistoryDiv = $('#ownerHistory');

            // Hide section if no owners exist
            if (!owners || owners.length === 0) {
                ownerHistoryCol.hide();
                return;
            }

            ownerHistoryCol.show();
            ownerHistoryDiv.empty();

            const card = `
            <div class="card p-3 mb-2 shadow-sm">
                <h5 class="card-title">Owner 1</h5>
                <p class="card-text"><strong>Transfer by:</strong> ${firstOwner.user_id || 'N/A'}</p>
                <p class="card-text"><strong>Name:</strong> ${firstOwner.name_ || 'N/A'}</p>
                <p class="card-text"><strong>Fname:</strong> ${firstOwner.father_or_husband_name || 'N/A'}</p>
                <p class="card-text"><strong>Address:</strong> ${firstOwner.address_ || 'N/A'}</p>
                <p class="card-text"><strong>Transfer Date:</strong> ${firstOwner.registration_date || 'N/A'}</p>
            </div>
        `;
            ownerHistoryDiv.append(card);

            owners.forEach((owner, index) => {
                const card = `
            <div class="card p-3 mb-2 shadow-sm">
                <h5 class="card-title">Owner ${index + 2}</h5>
                <p class="card-text"><strong>Transfer by:</strong> ${owner.user_id || 'N/A'}</p>
                <p class="card-text"><strong>Name:</strong> ${owner.name || 'N/A'}</p>
                <p class="card-text"><strong>Fname:</strong> ${owner.f_name || 'N/A'}</p>
                <p class="card-text"><strong>Address:</strong> ${owner.p_address || 'N/A'}</p>
                <p class="card-text"><strong>Transfer Date:</strong> ${owner.transfer_date || 'N/A'}</p>
            </div>
        `;
                ownerHistoryDiv.append(card);
            });
        }

    </script>
@endsection
