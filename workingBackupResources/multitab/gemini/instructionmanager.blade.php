<div class="space-y-4">
    <h3 class="font-semibold">Preparation Steps</h3>

    <ul class="list-decimal pl-5 space-y-2">
        @foreach($instructions as $step)
            <li class="group border-b pb-2">
                <div class="flex justify-between items-start">
                    <span>{{ $step->content }}</span>
                    <button wire:click="removeStep({{ $step->id }})" class="text-red-400 hover:text-red-600">
                        Delete
                    </button>
                </div>
            </li>
        @endforeach
    </ul>

    <div class="mt-4">
        <textarea wire:model="newStep" placeholder="Describe the next step..." class="w-full border p-2 rounded"></textarea>
        @error('newStep') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        <button wire:click="addStep" class="mt-2 bg-blue-600 text-white px-4 py-2 rounded">Add Step</button>
    </div>
</div>