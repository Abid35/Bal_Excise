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
                                <div class="headingDiv wdth100">
                                    <h2>Create Vanity Plate</h2>
                                </div>
                            </div>

                            <form method="POST" action="{{ route('vanity.store') }}">
                                @csrf
                                <div class="row mb-3">
                                    <label class="col-md-4 col-form-label text-md-end">Owner Identifier</label>
                                    <div class="col-md-6">
                                        <input type="number" name="owner_identifier" placeholder="e.g. cnic. ntn" class="form-control" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-md-4 col-form-label text-md-end">District</label>
                                    <div class="col-md-6">
                                        <select name="district_id" class="form-control" required>
                                            <option value="">--Select District--</option>
                                            @foreach($district as $d)
                                                <option value="{{ $d->id }}">{{ $d->eto_location }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <label class="col-md-4 col-form-label text-md-end">Vehicle Number</label>
                                    <div class="col-md-6">
                                        <input type="text" name="vehicle_number" class="form-control" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-md-4 col-form-label text-md-end">Custom Plate Number</label>
                                    <div class="col-md-6">
                                        <input type="text" name="plate_number" class="form-control" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-md-4 col-form-label text-md-end">Design Type</label>
                                    <div class="col-md-6">
                                        <input type="text" name="design_type" class="form-control" placeholder="e.g. Premium, Metallic, Fancy">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-md-4 col-form-label text-md-end">Additional Requirements</label>
                                    <div class="col-md-6">
                                        <textarea name="additional_requirements" class="form-control" rows="3"></textarea>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-md-4 col-form-label text-md-end">Cost (PKR)</label>
                                    <div class="col-md-6">
                                        <input type="number" name="cost" class="form-control" placeholder="e.g. 15000">
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Submit') }}
                                        </button>
                                        <a href="{{ route('vanity.index') }}" class="btn btn-secondary">Cancel</a>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
