@props([
  'label',
  'name',
  'options' => [],
  'required' => false,
  'placeholder' => 'Select...',
])

<div class="form-row">
  <label class="form-label" for="{{ $name }}">
    {{ $label }} @if($required)<span class="form-req">*</span>@endif
  </label>

  <select id="{{ $name }}" name="{{ $name }}" {{ $attributes->merge(['class' => 'form-select']) }}>
    <option value="">{{ $placeholder }}</option>
    @foreach($options as $internal => $external)
      <option value="{{ $internal }}">{{ $external }}</option>
    @endforeach
  </select>

  @error($name)
    <div class="form-error">{{ $message }}</div>
  @enderror
</div>
