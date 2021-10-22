@extends('layouts.app')
@section('title', 'Cities')
@section('content')
    <section class="bg-purple mt-5">
        <div id="map"></div>
        <div class="states_list">
            @foreach($cities->chunk(5) as $chunk)
                <ul class="states_list">
                    @foreach($chunk as $city)
                        <li><a href="{{ route('companies', [$city->state_code, $city->name]) }}">{{ $city->name }}</a></li>
                    @endforeach
                </ul>
            @endforeach
        </div>
    </section>
@endsection
@push('js')
    <script async src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google.maps_api_key') }}&libraries=&v=weekly"></script>
    <script>
        Loan.initGoogleMap('#map', @json($cities->googleMaps('name', 'name')->all()), @json($cities->first()->state_name));
    </script>
@endpush