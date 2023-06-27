<x-mail::message>
# Nouvelle demande de contact 

Une nouvelle demande de contact a été initié à propos du bien <a href="{{route('property.show' , ['slug' => $property->getSlug() , 'property' => $property])}}">
    {{ $property->titre }}
</a>

Les données et contact de l'envoyeur sont les suivants : 

- Prenom : {{ $data['prenom'] }}

-Nom : {{ $data['nom'] }}

-Telephone : {{$data['telephone']}}

-Email : {{ $data['email'] }}

l'objet du message  : 

{{ $data['message'] }}

The body of your message.

<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
