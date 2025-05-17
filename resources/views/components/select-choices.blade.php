@props(['name', 'label', 'placeholder' => '', 'classSelect' => '', 'options' => [], 'attributes' => [], 'classButton' =>
'btn-primary', 'classInputGroup' => '', 'namaButton' => 'Cari'])

{{-- Select Choices Component --}}
{{--
<x-select-choices name="kelompok_obat" label="Kelompok Obat (Aset)" placeholder="Pilih Salah satu" :options="[]" /> --}}

<div class="row mb-2">
	<div class="col-lg-3">
		<label for={{$name}} class="form-label">{{$label}}</label>
	</div>
	<div class="col-lg-9">
		<select class="form-select {{ $classSelect }}" data-choices name="{{$name}}" id="{{$name}}" {{ $attributes }}>
			>
			<option value="">{{$placeholder}}</option>
			@foreach($options as $key => $value)
			<option value="{{$key}}">{{$value}}</option>
			@endforeach
		</select>
		@error($name)
		<span>
			<div class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</div>
		</span>
		@enderror
	</div>
</div>