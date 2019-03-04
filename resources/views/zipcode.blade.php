@extends('layouts.app')

@section('content')
<div class="container" id="app">

    <div class="row zipcode-data-header">
        <div class="col-md-8 vertical-center">
            <span>
                <h3>{{ $zipcode->zip }}</h3>
                <p>{{ $zipcode->city }}, {{ $zipcode->state_name }}</p>
            </span>
        </div>
        <div class="col-md-4 vertical-center">
            <div class="edit-button">
                <a class="btn btn-primary" href="{{ route('zipcode.edit', $zipcode->zip) }}" role="button">Edit</a>
            </div>
        </div>
    </div>

    <google-map name="zipcode" latitude="{{ $zipcode->latitude }}" longitude="{{ $zipcode->longitude }}"></google-map>

    <div class="row zipcode-data-list">

        <div class="col-md-4">

            <div class="card">
                <div class="card-header">
                    County
                </div>
                <div class="card-body">
                    {{ $zipcode->county_name }}
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    Timezone
                </div>
                <div class="card-body">
                    {{ $zipcode->timezone }}
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    Population
                </div>
                <div class="card-body">
                    {{ $zipcode->population }}
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    County Fips
                </div>
                <div class="card-body">
                    {{ $zipcode->county_fips }}
                </div>
            </div>

        </div>
        <div class="col-md-4">

            <div class="card">
                <div class="card-header">
                    Latitude
                </div>
                <div class="card-body">
                    {{ $zipcode->latitude }}
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    Longitude
                </div>
                <div class="card-body">
                    {{ $zipcode->longitude }}
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    Density
                </div>
                <div class="card-body">
                    {{ $zipcode->density }}
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    Military
                </div>
                <div class="card-body">
                    {{ $zipcode->military }}
                </div>
            </div>

        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    ZCTA
                </div>
                <div class="card-body">
                    {{ $zipcode->zcta }}
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    Parent ZCTA 
                </div>
                <div class="card-body">
                    {{ $zipcode->parent_zcta or "TEST" }}
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    All County Weights
                </div>
                <div class="card-body">
                    {{ $zipcode->all_county_weights }}
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    Imprecise
                </div>
                <div class="card-body">
                    {{ $zipcode->imprecise }}
                </div>
            </div>

        </div>
    </div>

</div>

@endsection