@extends('layouts.app')
@section('title', 'Decatur')
@section('content')
    <div class="mt-5" id="map"></div>
    <div class="table-responsive mt-5">
        <table class="table table-borderless">
            <tbody>
            @foreach($loanSources->chunk(4) as $chunk)
                <tr>
                    @foreach($chunk as $loan)
                        <td>
                            <address>
                                <strong>{{ $loan->name }}</strong>
                                <br>
                                {{ $loan->address }}, {{ $loan->zipcode }}
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
        Loan.initDecaturPage('map', @json($loanSources->pluck('address')->all()), '{{ $loanSources->first()->state_name }}');
    </script>
@endpush