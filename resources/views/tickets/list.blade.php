@extends('layout')

@section('content')
    <div class="row">
        <h1>
            Solicitudes Populares
            <a href="#" class="btn btn-primary">
                Nueva solicitud
            </a>
        </h1>
        <p class="label label-info news">
            Hay {{ $tickets->total() }} Solicitudes Populares
        </p>

        @foreach($tickets as $ticket)
            @include('tickets.partials.item', compact('ticket'))
        @endforeach

    </div>
    {!! $tickets->render() !!}
    <hr>
    <p><a href="http://duilio.me" target="_blank">duilio.me</a></p>
@endsection
