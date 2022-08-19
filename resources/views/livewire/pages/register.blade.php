<form wire:submit.prevent="register"
    class="h-screen flex items-center p-3">
    <x-card cardClasses="max-w-lg mx-auto">
        <x-slot:header>
            <div class="px-5 py-3">
                <h1 class="text-center font-bold text-lg">Criar nova conta</h1>
            </div>
        </x-slot:header>

        <div class="mb-5">
            <x-input label="Nome"
                placeholder="Seu nome"
                icon="user"
                wire:model="name"/>
        </div>

        <div class="mb-5">
            <x-input label="Email"
                placeholder="Seu email"
                icon="at-symbol"
                wire:model="email"
                type="email" />
        </div>

        <div>
            <x-input label="Senha"
                placeholder="Sua senha"
                icon="key"
                wire:model="password"
                type="password" />
        </div>

        <x-slot:footer>
            <x-button type="submit"
                full
                purple
                class="mb-3">Criar minha conta</x-button>

            <div>
                <a href="{{ route('login') }}" class="text-blue-800 hover:underline">
                    <x-icon name="arrow-narrow-left" class="w-5 h-5 inline" /> Login
                </a>
            </div>
        </x-slot:footer>
    </x-card>
</form>
