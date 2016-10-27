@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h2 class="title-show">
                    {{ $ticket->title }}
                    @include('tickets.partials.status', compact('ticket'))
                </h2>
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
                <p class="date-t">
                    <span class="glyphicon glyphicon-time"></span> {{ $ticket->created_at->format('d/m/Y h:ia') }}
                    - {{ $ticket->author->name }}
                </p>
                <h4 class="label label-info news">
                    {{ $ticket->voters->count() }} votos
                </h4>

                <p class="vote-users">
                    @foreach($ticket->voters as $user)
                        <span class="label label-info">{{ $user->name }}</span>
                    @endforeach
                </p>

                @if( ! auth()->user()->hasVoted($ticket))
                {!! Form::open(['route' => ['votes.submit', $ticket->id], 'method' => 'POST']) !!}
                    <button type="submit" class="btn btn-primary">
                        <span class="glyphicon glyphicon-thumbs-up"></span> Votar
                    </button>
                {!! Form::close() !!}
                @else
                {!! Form::open(['route' => ['votes.destroy', $ticket->id], 'method' => 'DELETE']) !!}
                    <button type="submit" style="background-color: #d9534f;border-color: #d43f3a;" class="btn btn-danger">
                        <span class="glyphicon glyphicon-thumbs-down"></span> Quitar voto
                    </button>
                {!! Form::close() !!}
                @endif
                <h3>Nuevo Comentario</h3>

                {!! Form::open(['route' => ['comments.submit', $ticket->id], 'method' => 'POST']) !!}
                    <div class="form-group{{ $errors->has('comment') ? ' has-error' : '' }}">
                        <label for="comment">Comentarios:</label>
                        <textarea rows="4" class="form-control" name="comment" cols="50" id="comment">{{ old('comment') }}</textarea>
                        @if ($errors->has('comment'))
                            <span class="help-block">
                                <strong>{{ $errors->first('comment') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('link') ? ' has-error' : '' }}">
                        <label for="link">Enlace:</label>
                        <input class="form-control" name="link" type="text" id="link" value="{{ old('link') }}">
                        @if ($errors->has('link'))
                            <span class="help-block">
                                <strong>{{ $errors->first('link') }}</strong>
                            </span>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar comentario</button>
                {!! Form::close() !!}

                <h3>Comentarios ({{ $ticket->comments->count() }})</h3>

                @foreach($ticket->comments as $comment)
                    <div class="well well-sm">
                        <p><strong>{{ $comment->user->name }}</strong></p>
                        <p>{{ $comment->comment }}</p>
                        @if($comment->link)
                            <p>
                                <a href="{{ $comment->link }}" target="_blank" rel="nofollow">
                                    {{ $comment->link }}
                                </a>
                            </p>
                        @endif
                        <p class="date-t">
                            <span class="glyphicon glyphicon-time"></span>
                            {{ $comment->created_at->format('d/m/Y h:ia') }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
