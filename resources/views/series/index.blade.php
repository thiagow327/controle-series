<x-layout title="Séries">
    <a href="{{ route('series.create') }}" class="btn btn-dark mb-2">Adicionar</a>

    <ul class="list-group">
        @foreach ($series as $serie)
            <li class="list-group-item"> {{ htmlentities($serie->nome) }} </li>
            <!-- usamos 'htmlentities' para escapes evitando Cross-site scripting (XSS) -->
        @endforeach
    </ul>
</x-layout>
