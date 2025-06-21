@props(['name', 'placeholder' => '', 'classSelect' => '', 'options' => [], 'attributes' => []])
<div>
    <select class="form-select {{ $classSelect }}" data-choices name="{{$name}}" id="{{$name}}" {{ $attributes }}>
        >
        <option value="">{{$placeholder}}</option>
        @foreach($options as $key => $value)
        <option value="{{$key}}">{{$value}}</option>
        @endforeach
    </select>
</div>