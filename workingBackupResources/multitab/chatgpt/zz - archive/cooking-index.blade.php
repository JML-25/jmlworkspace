<div class="p-6 space-y-4">
    <div class="flex gap-2 items-center">
        <input class="border rounded px-3 py-2 w-full"
               placeholder="Search cookings..."
               type="text"
               wire:model.live="search" />
        <a class="border rounded px-3 py-2" href="{{ route('cookings.create') }}">New</a>
    </div>

    <div class="border rounded">
        @foreach($cookings as $c)
            <div class="flex items-center justify-between px-4 py-3 border-b last:border-b-0">
                <div>
                    <div class="font-semibold">{{ $c->name }}</div>
                    <div class="text-sm text-gray-500">Updated: {{ $c->updated_at }}</div>
                </div>

                <div class="flex gap-2">
                    <a class="border rounded px-3 py-1"
                       href="{{ route('cookings.edit', ['cookingId' => $c->id]) }}">
                        Edit
                    </a>

                    <button class="border rounded px-3 py-1"
                            type="button"
                            wire:click="selectCooking({{ $c->id }})">
                        Select (event)
                    </button>
                </div>
            </div>
        @endforeach
    </div>
</div>
