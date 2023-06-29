@php 
    $name ??='' ; 

@endphp


<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroupFileAddon01">Image</span>
  </div>
  <div class="custom-file">
    <input type="file" name="{{$name}}" class="custom-file-input" id="{{$name}}" aria-describedby="">
    <label class="custom-file-label" for="{{$name}}">Choisir </label>
  </div>
</div>
