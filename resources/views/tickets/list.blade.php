@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="row">
                    <h1>
                        {{ $title = trans(Route::currentRouteName().'_title') }}
                        <a href="#" class="btn btn-primary">
                            Nueva solicitud
                        </a>
                    </h1>
                    <p class="label label-info news">
                        {{ trans_choice(Route::currentRouteName().'_total', $tickets->total()) }}
                    </p>

                    @foreach($tickets as $ticket)
                        @include('tickets.partials.item', compact('ticket'))
                    @endforeach

                </div>
                {!! $tickets->render() !!}
                <hr>
                <p><a href="http://duilio.me" target="_blank">duilio.me</a></p>
            </div>
        </div>
    </div>
@endsection
