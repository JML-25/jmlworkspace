@props([
  'label',
  'name',
  'type' => 'text',
  'required' => false,
  'placeholder' => '',
])

<div class="form-row">
  <label class="form-label" for="{{ $name }}">
    {{ $label }} @if($required)<span class="form-req">*</span>@endif
  </label>

  <input
    id="{{ $name }}"
    name="{{ $name }}"
    type="{{ $type }}"
    placeholder="{{ $placeholder }}"
    {{ $attributes->merge(['class' => 'form-input']) }}
  />

  @error($name)
    <div class="form-error">{{ $message }}</div>
  @enderror
</div>
