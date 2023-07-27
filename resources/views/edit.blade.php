@extends('layouts.app')

@section('content')
    <div class="container text-center">
        <h1>Edit Project</h1>

        <form method="POST" action="{{ route('project.update', $project->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            @if ($project->main_picture)
                <img src="{{ asset('storage/' . $project->main_picture) }}" width="200px">
                <br>
            @endif

            <label for="main_picture">Main picture</label>
            <br>
            <input type="file" name="main_picture" id="main_picture">
            <br>

            <label for="title">Title</label>
            <br>
            <input type="text" name="title" id="title" value="{{ $project->title }}">
            <br>

            <label for="publish_date">Publish Date</label>
            <br>
            <input type="date" name="publish_date" id="publish_date" value="{{ $project->publish_date }}">
            <br>

            <label for="description">DESCRIPTION</label>
            <br>
            <input type="text" name="description" id="description" value="{{ $project->description }}">
            <br>

            <label for="accessibility">Accessibility</label>
            <br>
            <input type="text" name="accessibility" id="accessibility" value="{{ $project->accessibility }}">
            <br>

            <label for="type_id">Type</label>
            <br>
            <select name="type_id" id="type_id">
                @foreach ($types as $type)
                    <option value="{{ $type->id }}" {{ $project->type_id == $type->id ? 'selected' : '' }}>
                        {{ $type->type_name }}
                    </option>
                @endforeach
            </select>
            <br>

            <span>
                <h3>Technology:</h3>
                <ul>
                    @foreach ($technologies as $technology)
                        <li>
                            <input type="checkbox" name="technologies[]" value="{{ $technology->id }}"
                                {{ in_array($technology->id, $project->technologies->pluck('id')->toArray()) ? 'checked' : '' }}>
                            {{ $technology->name }}
                        </li>
                    @endforeach
                </ul>
            </span>

            <input class="my-3" type="submit" value="UPDATE">
        </form>
    </div>
