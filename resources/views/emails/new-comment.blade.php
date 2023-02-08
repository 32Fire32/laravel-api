<x-mail::message>
    <h1>C'è un nuovo commento sul post {{ $comment->project->name_project }}</h1>
    <h4>da: {{ $comment->name }}</h4>
    <p>{{ $comment->content }}</p>
</x-mail::message>
