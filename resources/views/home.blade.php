@extends('layouts.app')
@section('content')
    <div class="jumbotron p-5 mb-4 bg-light rounded-3">

        <h1 class="text-center">Progetti:
            <a class="btn btn-primary" href="{{ route('project.create') }}">
                +
            </a>
        </h1>
        <ul class="text-center list-unstyled">
            @foreach ($projects as $project)
                @auth
                    <li>
                        <a class="" href="{{ route('project.show', $project->id) }}">{{ $project->title }}</a>


                    </li>

                @endauth

                @guest
                    {{ $project->title }}
                @endguest
            @endforeach
        </ul>
    </div>
@endsection
