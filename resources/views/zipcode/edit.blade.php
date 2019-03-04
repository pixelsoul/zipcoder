@extends('layouts.app')

@section('content')
<div class="container" id="app">

<form action="{{ route('zipcode.update', $zipcode->id) }}" method="POST" name="zipcode">
    @method('PUT')
    @csrf

    <div class="row zipcode-data-header">
        <div class="col-md-12 vertical-center">
            <span>
                <label for="zip">Zipcode</label>
                <input type="text" class="form-control" name="zip" id="zip" placeholder="zipcode" value="{{ $zipcode->zip }}">
                <label for="city">City</label>
                <input type="text" class="form-control" name="city" id="city" placeholder="city" value="{{ $zipcode->city }}">
                <label for="state_name">State Name</label>
                <input type="text" class="form-control" name="state_name" id="state_name" placeholder="state name" value="{{ $zipcode->state_name }}">
                <label for="state_id">State ID</label>
                <input type="text" class="form-control" name="state_id" id="state_id" placeholder="state ID" value="{{ $zipcode->state_id }}">
            </span>
        </div>
    </div>

    <div class="row zipcode-data-list">

        <div class="col-md-4">

            <div class="card">
                <div class="card-header">
                    <label for="county_name">County</label>
                </div>
                <div class="card-body">
                    <input type="text" class="form-control" name="county_name" id="county_name" placeholder="county" value="{{ $zipcode->county_name }}">
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <label for="timezone">Timezone</label>
                </div>
                <div class="card-body">
                    <input type="text" class="form-control" name="timezone" id="timezone" placeholder="timezone" value="{{ $zipcode->timezone }}">
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <label for="population">Population</label>
                </div>
                <div class="card-body">
                    <input type="text" class="form-control" name="population" id="population" placeholder="population" value="{{ $zipcode->population }}">
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <label for="county_fips">County Fips</label>
                </div>
                <div class="card-body">
                    <input type="text" class="form-control" name="county_fips" id="county_fips" placeholder="county fips" value="{{ $zipcode->county_fips }}">
                </div>
            </div>

        </div>
        <div class="col-md-4">

            <div class="card">
                <div class="card-header">
                    <label for="latitude">Latitude</label>
                </div>
                <div class="card-body">
                    <input type="text" class="form-control" name="latitude" id="latitude" placeholder="latitude" value="{{ $zipcode->latitude }}">
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <label for="longitude">Longitude</label>
                </div>
                <div class="card-body">
                    <input type="text" class="form-control" name="longitude" id="longitude" placeholder="longitude" value="{{ $zipcode->longitude }}">
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <label for="density">Density</label>
                </div>
                <div class="card-body">
                    <input type="text" class="form-control" name="density" id="density" placeholder="density" value="{{ $zipcode->density }}">
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <label for="military">Military</label>
                </div>
                <div class="card-body">
                    <input type="text" class="form-control" name="military" id="military" placeholder="military" value="{{ $zipcode->military }}">
                </div>
            </div>

        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <label for="zcta">ZCTA</label>
                </div>
                <div class="card-body">
                    <input type="text" class="form-control" name="zcta" id="zcta" placeholder="zcta" value="{{ $zipcode->zcta }}">
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <label for="parent_zcta">Parent ZCTA</label>
                </div>
                <div class="card-body">
                    <input type="text" class="form-control" name="parent_zcta" id="parent_zcta" placeholder="parent zcta" value="{{ $zipcode->parent_zcta }}">
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <label for="all_county_weights">All County Weights</label>
                </div>
                <div class="card-body">
                    <input type="text" class="form-control" name="all_county_weights" id="all_county_weights" placeholder="all county weights" value="{{ $zipcode->all_county_weights }}">
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <label for="imprecise">Imprecise</label>
                </div>
                <div class="card-body">
                    <input type="text" class="form-control" name="imprecise" id="imprecise" placeholder="imprecise" value="{{ $zipcode->imprecise }}">
                </div>
            </div>

        </div>
    </div>

    <div class="row form-buttons">
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">SAVE</button>
        </div>
    </div>
</form>
</div>
@endsection