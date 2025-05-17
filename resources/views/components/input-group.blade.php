@props(['name', 'label', 'placeholder' => '', 'type' => 'text', 'class' => '', 'classButton' =>
'btn-primary', 'classInputGroup' => '', 'namaButton' => 'Cari'])

<div class="row mb-2">
    <div class="col-lg-3">
        <label for="{{$name}}" class="form-label">{{ $label }}</label>
    </div>
    <div class="col-lg-9">
        <div class="input-group {{ $classInputGroup }}">
            <input name="{{$name}}" type="{{$type}}" class="form-control {{$class}} @error($name) is-invalid @enderror"
                placeholder="{{$placeholder}}" {{ $attributes }}>
            <button class="btn {{$classButton}}" type="button">{{$namaButton}}</button>
        </div>
        @error($name)
        <div class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </div>
        @enderror
    </div>
</div>