@php 

 $type ??= null ; 
 $class ??= null ; 
 $name ??= '' ; 
$value ??= '' ; 
$label ??= ucfirst($name) ; 

@endphp

<div @class(["form-group" , $class])>
    <label for=" {{ $name}} "> {{ $label}} </label>
    @if($type=== 'textarea')
    <textarea  type="text" class="form-control @error($name)
        is-invalid @enderror" id="{{$name}}" name="{{$name}}" rows="3" > {{old($name , $value)}} </textarea>
    @else 
        <input  type="{{$type}}" class="form-control @error($name)
        is-invalid @enderror" id="{{$name}}" name="{{$name}}" value="{{ old($name , $value)}}">

    @endif
    
    @error($name)

        <div class="invalid-feedback">
            {{ $message }}
        </div>
        
    @enderror
</div>