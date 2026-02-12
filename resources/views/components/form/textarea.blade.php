@props([
  'label',
  'name',
  'required' => false,
  'placeholder' => '',
  'rows' => 4,
])

<div class="form-row">
  <label class="form-label" for="{{ $name }}">
    {{ $label }} @if($required)<span class="form-req">*</span>@endif
  </label>

  <textarea
    id="{{ $name }}"
    name="{{ $name }}"
    rows="{{ $rows }}"
    placeholder="{{ $placeholder }}"
    {{ $attributes->merge(['class' => 'form-textarea']) }}
  ></textarea>

  @error($name)
    <div class="form-error">{{ $message }}</div>
  @enderror
</div>
