<div class="mb-3">
    <label for="{{$name}}" class="form-label">
        @php
            echo Str::ucfirst($name)
        @endphp
    </label>
    <input type="{{$type}}" class="form-control rounded-0 @if($errors->has($name)) is-invalid @endif"
    id="phone" name="{{$name}}" value="{{$value ?? old($name)}}" {{$r ?? ""}}>
    @error($name)
    <div id="{{$name}}Help" class="form-text text-danger">{{$errors->first($name)}}</div>
    @enderror
</div>
