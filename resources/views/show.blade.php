@extends('layouts.app')

@section('content')
    <div>
        <h1>Nome progetto: {{ $project->title }}</h1>

        <span>Data pubblicazione: {{ $project->publish_date }}</span>

        <p>Descrizione: {{ $project->description }}</p>

        <span>Accessibilità: {{ $project->accessibility }}</span>

        <br>

        <span class="bg-warning">
            Tipo progetto: {{ $project->type->type_name }}
        </span>

        <div class="bg-warning">Technology:
            @foreach ($project->technologies as $technology)
                <span>{{ $technology->name }}
            @endforeach
        </div>

        <a class="btn btn-primary" href="{{ route('project.edit', $project->id) }}">
            EDIT
        </a>
    </div>
@endsection
