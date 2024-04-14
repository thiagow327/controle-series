<x-layout title="Séries">
    <a href="/series/criar">Adicionar</a>

    <ul>
        @foreach ($series as $serie)
            <li> {{ htmlentities($serie) }} </li>
            <!-- usamos 'htmlentities' para escapes evitando Cross-site scripting (XSS) -->
        @endforeach
    </ul>
</x-layout>
