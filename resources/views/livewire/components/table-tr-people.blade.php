<div class="border-b last:border-0">
    <div class="py-2 flex items-center justify-between">
        <div>
            <h3 class="font-bold">{{ $people->name }}</h3>

            <p class="text-sm">{{ $people->email }}</p>
        </div>

        <div class="flex items-center">
            <x-button purple class="mr-2" wire:click="$set('modal', true)">Ver mais</x-button>

            <x-button.circle red icon="trash"
                wire:click="delete"></x-button.circle>
        </div>
    </div>

    <x-modal.card
        blur
        max-width="lg"
        title="{{ $people->name }}"
        wire:model.defer="modal">
        <ul>
            <li class="flex justify-between mb-2">
                <strong>Nome:</strong>
                <span>{{ $people->name }}</span>
            </li>

            <li class="flex justify-between mb-2">
                <strong>Email:</strong>
                <span>{{ $people->email }}</span>
            </li>

            <li class="flex justify-between mb-2">
                <strong>CEP:</strong>
                <span>{{ $people->zip_code }}</span>
            </li>

            <li class="flex justify-between mb-2">
                <strong>Cidade:</strong>
                <span>{{ $people->city }}</span>
            </li>

            <li class="flex justify-between mb-2">
                <strong>Estado:</strong>
                <span>{{ $people->state }}</span>
            </li>

            <li class="flex justify-between mb-2">
                <strong>Estado:</strong>
                <span>{{ $people->street }}</span>
            </li>

            <li class="flex justify-between mb-2">
                <strong>Estado:</strong>
                <span>{{ $people->neighborhood }}</span>
            </li>
        </ul>
    </x-modal.card>
</div>
