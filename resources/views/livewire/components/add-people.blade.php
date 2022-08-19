<div>
    <x-button.circle
        wire:click="$set('modal', true)"
        purple
        icon="plus"></x-button.circle>

    <x-modal.card blur
        title="Cadastrar nova pessoa"
        wire:model.defer="modal">
        <x-slot:action>
            <x-button.circle wire:click="$set('modal', false)"
                icon="x"></x-button.circle>
        </x-slot:action>

        <div class="mb-5">
            <x-input wire:model="name"
                label="Nome"
                placeholder="Seu nome" />
        </div>

        <div class="mb-5">
            <x-input wire:model="email"
                label="Email"
                placeholder="Seu email" />
        </div>

        <div>
            <h4 class="text-sm font-bold mb-2">Endereço</h4>

            <div class="mb-3">
                <x-input wire:model="zip_code"
                    label="CEP"
                    placeholder="Seu cep">
                    <x-slot:append>
                        <div class="absolute inset-y-0 right-0 flex items-center p-0.5">
                            <x-button
                                class="h-full rounded-r-md"
                                icon="search"
                                primary
                                flat
                                squared
                                wire:click="searchCEP"
                            />
                        </div>
                    </x-slot:append>
                </x-input>

                <span wire:loading
                    wire:target="searchCEP"
                    class="text-xs italic">Carregando...</span>
            </div>

            <div class="grid grid-cols-2 gap-3 mb-3">
                <div>
                    <x-input wire:model="city"
                        label="Cidade"
                        placeholder="Sua cidade" />
                </div>

                <div>
                    <x-native-select wire:model="state"
                        label="Estado"
                        option-label="nome"
                        option-value="sigla"
                        :options="$listUF" />
                </div>
            </div>

            <div class="grid grid-cols-2 gap-3">
                <div>
                    <x-input wire:model="street"
                        label="Rua"
                        placeholder="Sua rua" />
                </div>

                <div>
                    <x-input wire:model="neighborhood"
                        label="Bairro"
                        placeholder="Seu bairro" />
                </div>
            </div>
        </div>

        <x-slot:footer>
            <div class="text-right">
                <x-button wire:click="registerPeople"
                    purple>Salvar</x-button>
            </div>
        </x-slot:footer>
    </x-modal.card>
</div>
