<ul class="nav navbar-nav">
    <li role="presentation" class="active">
        <a href="{{ route('tickets.latest') }}">Recientes</a>
    </li>
    <li role="presentation">
        <a href="{{ route('tickets.popular') }}">Populares</a>
    </li>
    <li role="presentation">
        <a href="{{ route('tickets.open') }}">Abiertas</a>
    </li>
    <li role="presentation">
        <a href="{{ route('tickets.closed') }}">Finalizadas</a>
    </li>
</ul>