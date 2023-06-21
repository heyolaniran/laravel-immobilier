@php 
$name ??= '' ; 
$value ??= '' ; 
@endphp

<div class="form-group form-check">
    <input type="hidden" name="{{$name}}" value="0">
    <input @checked(old($name, $value ?? false)) type="checkbox" class="form-check-input @error($name) is-invalid @enderror" id="{{$name}}" name="{{$name}}" role="switch" value="1">
    <label class="form-check-label" for="">Vendu ?</label>
</div>

@error($name)

        <div class="invalid-feedback">
            {{ $message }}
        </div>
        
    @enderror