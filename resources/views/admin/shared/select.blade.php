@php 


$name ??= '' ; 
$multiple ??= false; 
$label ??= ucfirst($name) ; 
$class ??= '' ; 


@endphp

<div @(class["form-group" , $class])>
  <label for="{{$name}}"> {{ $name }} </label>
  <select class="form-control" name="{{$name}}[]" id="{{$name}}" multiple>
    @foreach($options as $key => $v)
    <option @selected($value->contains($key)) value="{{$key}}"> {{$v}} </option>
    @endforeach
  </select>
</div>
