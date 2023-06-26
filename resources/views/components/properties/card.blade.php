
        <div class="card" style="width: 18rem;">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
                <a  href="{{ route('property.show', ['slug' => $property->getSlug(), 'property' => $property]) }}"  class="card-title">{{ $property->titre }}</a>
                <p class="card-text">{{ $property->description }}</p>
                <div class="text-primary font-weight-bold text-lg"> {{ number_format($property->price,  thousands_separator: " ") }} XOF</div>
               <div class="mt-4">
                <a href="{{ route('property.show', ['slug' => $property->getSlug(), 'property' => $property]) }}" class="btn btn-primary px-4">Details </a>
               </div>
            </div>
        </div>