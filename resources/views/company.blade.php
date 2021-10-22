@extends('layouts.app')
@section('title', 'Companies')
@section('content')
    <div class="mt-5" id="map"></div>
    <div class="table-responsive mt-5">
        <table class="table table-borderless">
            <tbody>
            @foreach($companies->chunk(4) as $chunk)
                <tr>
                    @foreach($chunk as $loan)
                        <td>
                            <address>
                                <strong>{{ $loan->company }}</strong>
                                <br>
                                {{ $loan->addressFormatted }}
                                <br>
                                <abbr title="Phone">P: {{ $loan->phone }}</abbr>
                            </address>
                        </td>
                    @endforeach
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
@push('js')
    <script async src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google.maps_api_key') }}&libraries=&v=weekly"></script>
    <script>
        Loan.initGoogleMap('#map', @json($companies->googleMaps('addressFormatted', 'company')->all()), '{{ $companies->first()->city }}', 13);
    </script>
@endpush