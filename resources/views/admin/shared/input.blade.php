@php 
 $label ??= null ; 
 $type ??= null ; 
 $class ??= null ; 
 $name ??= '' ; 

@endphp


<div @class(["form-control" , $class])>
    <label for=" {{ $name}} "></label>
    <input type="{{$type}}" class="form-input" id="{{$name}}" name=" {{$name}} ">
</div>