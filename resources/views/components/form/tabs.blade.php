@props(['tabs' => [], 'active' => ''])

<div class="tabs">
  @foreach($tabs as $key => $label)
    <button
      type="button"
      class="tab {{ $active === $key ? 'tab-active' : '' }}"
      wire:click="switchTab('{{ $key }}')"
    >
      {{ $label }}
    </button>
  @endforeach
</div>
