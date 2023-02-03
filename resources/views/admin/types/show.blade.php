@extends('layouts.admin.admin')

@section('content')
    <div class="container text-center">
        <h1>{{ $type->name }}</h1>
        <h4>Portfolios associati:</h4>
        @if ($type->projects->isNotEmpty())
            <ul class="list-unstyled">
                @foreach ($type->projects as $project)
                    <li><a href="{{ route('admin.projects.show', $project) }}">{{ $project->name_project }}</a></li>
                @endforeach
            </ul>
        @else
            <h3>Nessuna tipologia associata</h3>
        @endif
        <a href="{{ route('admin.types.index') }}"class="btn btn-primary">Torna alla lista delle tipologie</a>
    @endsection
