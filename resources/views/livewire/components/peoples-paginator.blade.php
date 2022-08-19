<x-card title="Pessoas">
    <x-slot:action>
        <livewire:components.add-people />
    </x-slot:action>

    <form action="{{ url()->current() }}"
        class="mb-5">
        <x-input name="busca"
            value="{{ request()->has('busca') ? request()->query('busca') : '' }}"
            placeholder="Pesquisa">
            <x-slot:append>
                <div class="absolute inset-y-0 right-0 flex items-center p-0.5">
                    <x-button
                        type="submit"
                        class="h-full rounded-r-md"
                        icon="search"
                        primary
                        flat
                        squared
                    />
                </div>
            </x-slot:append>
        </x-input>
    </form>

    <div>
        @if (count($peoples) > 0)
            <div>
                @foreach ($peoples as $people)
                    <livewire:components.table-tr-people :people="$people" />
                @endforeach
            </div>
        @else
            <p class="p-5 text-xs text-center">Nenhuma pessoa cadastrada</p>
        @endif
    </div>

    <x-slot:footer>
        {{ $peoples->links() }}
    </x-slot:footer>
</x-card>
