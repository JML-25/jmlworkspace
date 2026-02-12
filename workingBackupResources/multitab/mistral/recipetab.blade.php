<!-- resources/views/livewire/recipe-tab.blade.php -->
<div>
    <form wire:submit="save">
        <div class="mb-4">
            <label class="block">Name</label>
            <input type="text" wire:model="name" class="w-full p-2 border">
        </div>
        <div class="mb-4">
            <label class="block">Description</label>
            <textarea wire:model="description" class="w-full p-2 border"></textarea>
        </div>
        <button type="submit" class="px-4 py-2 bg-green-500 text-white">Save</button>
    </form>
</div>
