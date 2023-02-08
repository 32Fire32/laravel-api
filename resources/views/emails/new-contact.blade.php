<x-mail::message>
    <h1>Aggiunto nuovo contatto</h1>
    <span>Nome:{{ $contact['name'] }}</span>
    <span>Email:{{ $contact['email'] }}</span>
    <span>Messaggio:{{ $contact['content'] }}</span>
</x-mail::message>
