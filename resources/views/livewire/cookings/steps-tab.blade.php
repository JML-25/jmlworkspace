<div class="panel">
@if($successMessage)
  <div
    x-data="{ show: true }"
    x-init="setTimeout(() => show = false, 2500)"
    x-show="show"
    class="alert alert-success"
  >
    {{ $successMessage }}
  </div>
@endif


  <div class="section-title">Steps</div>

  @if(!$cooking)
    <div>Create the Cooking first.</div>
  @else
    <div class="form-grid">
      <div>
        <div class="section-title">{{ $editingId ? 'Edit step' : 'Add step' }}</div>

        <div class="form-grid-1">
          <x-form.input label="Title" name="title" wire:model.blur="title" />

          <div class="form-grid">
            <x-form.input label="Sequence" name="sequence" type="number" wire:model.blur="sequence" />

            @if(count($selectTaskType) > 0)
              <x-form.select label="Task type" name="tasktype" :options="$selectTaskType" wire:model="tasktype" />
            @else
              <x-form.input label="Task type" name="tasktype" wire:model.blur="tasktype" />
            @endif
          </div>

          {{-- text => textarea --}}
          <x-form.textarea label="Instruction" name="instruction" rows="5" wire:model.blur="instruction" />

          <x-form.input label="Expected time" name="expectedtime" type="number" wire:model.blur="expectedtime" />

          <x-form.textarea label="Additional information" name="additionalinformation" rows="4" wire:model.blur="additionalinformation" />
        </div>

        <div class="hr"></div>

        <div style="display:flex; gap: 10px;">
          <x-form.button variant="primary" wire:click="save">Save step</x-form.button>
          <x-form.button variant="secondary" wire:click="startCreate">Clear</x-form.button>
        </div>
      </div>

      <div>
        <div class="section-title">Current steps</div>
        <table style="width:100%; border-collapse: collapse;">
          <thead>
            <tr style="text-align:left; border-bottom: 1px solid #eee;">
              <th style="padding:8px;">Seq</th>
              <th style="padding:8px;">Title</th>
              <th style="padding:8px;">Type</th>
              <th style="padding:8px;">Time</th>
              <th style="padding:8px;">Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach($rows as $r)
              <tr style="border-bottom: 1px solid #f3f3f3;">
                <td style="padding:8px;">{{ $r['sequence'] }}</td>
                <td style="padding:8px;">{{ $r['title'] }}</td>
                <td style="padding:8px;">{{ $r['tasktype'] }}</td>
                <td style="padding:8px;">{{ $r['expectedtime'] }}</td>
                <td style="padding:8px; display:flex; gap:8px;">
                  <x-form.button variant="secondary" wire:click="startEdit({{ $r['id'] }})">Edit</x-form.button>
                  <x-form.button variant="danger" wire:click="delete({{ $r['id'] }})">Delete</x-form.button>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  @endif
</div>
