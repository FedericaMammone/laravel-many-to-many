@extends('layouts.app')

@section('content')
    <div>
        <h1>Nome progetto: {{ $projects->title }}</h1>

        <span>Data pubblicazione: {{ $projects->publish_date }}</span>

        <p>Descrizione: {{ $projects->description }}</p>

        <span>Accessibilità: {{ $projects->accessibility }}</span>

        <br>

        <span class="bg-warning">
            Tipo progetto: {{ $projects->type->type_name }}
        </span>

        <div class="bg-warning">Technologies:
            @foreach ($projects->technologies as $technology)
                <span>{{ $technology->name }}
            @endforeach
        </div>

    </div>
@endsection
