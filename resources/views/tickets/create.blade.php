@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h2>Nueva solicitud</h2>
                {!! Form::open(['route' => 'tickets.store', 'method' => 'POST']) !!}
                    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                        {!! Form::label('title', 'Título') !!}
                        {!! Form::textarea('title', null, [
                            'rows'          => 2,
                            'class'         => 'form-control',
                            'placeholder'   => 'Describe brevemente de qué quieres que se trate el tutorial'
                        ]) !!}
                        @if ($errors->has('title'))
                            <span class="help-block">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                        @endif
                    </div>
                    <p>
                        <button type="submit" class="btn btn-primary">
                            Enviar Solicitud
                        </button>
                    </p>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection