<div class="mb-3">
    <label for="{{$name}}" class="form-label">
        @php
            echo Str::ucfirst($cn ?? $name)
        @endphp
    </label>
    <textarea type="text" class="form-control rounded-0 @if($errors->has($name))
        is-invalid @endif"
    id="{{$name}}" name="{{$name}}"
     {{$r ?? ""}}
     >
     {{$value ?? old($name)}}
    </textarea>
    @error($name)
    <div id="{{$name}}Help" class="form-text text-danger">{{$errors->first($name)}}</div>
    @enderror
</div>
