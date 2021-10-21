@extends('layouts.app')
@section('title', 'Home')
@section('content')
    <section class="bg-purple mt-5">
        <div id="tooltip"></div>
        <div class="d-flex justify-content-center">
            <div id="vmap" style="width: 600px; height: 400px;"></div>
        </div>
        <div class="states_list">
            @foreach($states->chunk(5) as $chunk)
            <ul class="states_list">
                @foreach($chunk as $state)
                    <li><a href="{{ route('decatur', $state->code) }}">{{ $state->name }}</a></li>
                @endforeach
            </ul>
            @endforeach
        </div>
    </section>
@endsection
@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqvmap/1.5.1/jqvmap.min.css" integrity="sha512-RPxGl20NcAUAq1+Tfj8VjurpvkZaep2DeCgOfQ6afXSEgcvrLE6XxDG2aacvwjdyheM/bkwaLVc7kk82+mafkQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush
@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqvmap/1.5.1/jquery.vmap.min.js" integrity="sha512-Zk7h8Wpn6b9LpplWXq1qXpnzJl8gHPfZFf8+aR4aO/4bcOD5+/Si4iNu9qE38/t/j1qFKJ08KWX34d2xmG0jrA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqvmap/1.5.1/maps/jquery.vmap.usa.js" integrity="sha512-Cmn5O078aY6sQmucOhrnSdViKCPMmbr719psNalYjWmmvzgcA/37DP9MHznD4BMfFm7ssSvVF2rfZbFenkonUg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        Loan.initHomePage('#vmap', {
            onRegionClick: function(event, code){
                event.preventDefault();
                window.location.href = '{{ route('decatur', '?') }}'.replace('?', code);
            }
        });
    </script>
@endpush