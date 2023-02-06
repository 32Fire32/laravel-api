@extends('layouts.admin.admin')

@section('content')
    <div class="container">
        <div class="text-center">
            <h1>{{ $project->name_project }}</h1>
            @if ($project->project_logo_img)
                <div>
                    <img class="w-25" src="{{ asset("storage/$project->project_logo_img") }}"
                        alt="{{ $project->name_project }}">
                </div>
            @endif
            <p class="summary">{!! $project->summary !!}</p>
        </div>

        <div class="project-body d-flex align-items-center justify-content-center">
            @if ($project->doc_project)
                <div class="m-3 file">
                    <a href="{{ asset("storage/$project->doc_project") }}" download>
                        <i class="fa-solid fa-file-arrow-down"></i> Download File
                    </a>
                </div>
            @endif

            @if ($project->type)
                <div class="type m-2 d-flex align-items-center">
                    <h6>Tipo di progetto: <a
                            href="{{ route('admin.types.show', $project->type) }}">{{ $project->type->name }}</a></h6>
                </div>
            @else
                <div>
                    <h6>Nessun tipo di progetto</h6>
                </div>
            @endif

            @if ($project->technologies->isNotEmpty())
                <div class="m-2 d-flex align-items-center technology">
                    <h6>Tecnologie utilizzate:</h6>
                    @foreach ($project->technologies as $technology)
                        <span class="badge bg-secondary ms-2">{{ $technology->name }}</span>
                    @endforeach
                </div>
            @endif
        </div>

        <div class="project-comments m-2 text-center">
            @if ($project->comments->isNotEmpty())
                <h5>Commenti:</h5>
                @foreach ($project->comments as $comment)
                    <div class="comment">
                        @if ($comment->name)
                            <h6 class="m-2">{{ $comment->name }}:</h6>
                        @else
                            <h6 class="m-2">Anonimo:</h6>
                        @endif
                        <span class="m-2">{{ $comment->content }}</span>
                        <form action="{{ route('admin.comments.destroy', $comment) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm m-2">Cancella il commento</button>
                        </form>
                    </div>
                @endforeach
            @else
                <h3>Non ci sono commenti</h3>
            @endif
        </div>


        <a href="{{ route('admin.projects.index') }}"class="btn btn-primary">Torna alla lista dei progetti</a>
    @endsection
