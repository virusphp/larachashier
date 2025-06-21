@props(['name', 'label', 'placeholder' => '', 'type' => 'text', 'class' => ''])
{{-- Input Component --}}
{{--
<x-input name="nama_golongan_obat" label="Nama golongan Barang" placeholder="Nama golongan barang" /> --}}

{{--
<x-input name="status_aktif" label="Status" type="select" :options="$options" /> --}}

{{--
<x-input name="status_aktif" label="Status" type="checkbox" /> --}}

{{--
<x-input name="status_aktif" label="Status" type="radio" :options="$options" /> --}}

{{--
<x-input name="status_aktif" label="Status" type="textarea" /> --}}

{{--
<x-input name="status_aktif" label="Status" type="file" /> --}}
<div class="row mb-1">
    <div class="col-lg-3">
        <label for="{{$name}}" class="form-label">{{ $label }}</label>
    </div>
    <div class="col-lg-9">
        <input name="{{$name}}" type="{{$type}}" class="form-control {{$class}} @error($name) is-invalid @enderror"
            placeholder="{{$placeholder}}" {{ $attributes }}>
        @error($name)
        <div class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </div>
        @enderror
    </div>
</div>