<div class="h-screen flex items-center p-3">
    <form wire:submit.prevent="login"
        class="w-full max-w-lg mx-auto">
        <x-card>
            <x-slot:header>
                <div class="px-5 py-3">
                    <h1 class="text-center font-bold text-lg">Login</h1>
                </div>
            </x-slot:header>

            <div class="mb-5">
                <x-input wire:model="email"
                    type="email"
                    name="email"
                    label="Email"
                    placeholder="Seu email"
                    icon="at-symbol" />
            </div>

            <div class="mb-5">
                <x-input wire:model="password"
                    type="password"
                    label="Senha"
                    placeholder="Sua senha"
                    icon="key" />
            </div>

            <div>
                <x-checkbox id="remember-me"
                    left-label="Lembrar de mim"
                    wire:model="rememberMe" />
            </div>

            <x-slot:footer>
                <x-button type="submit"
                    full
                    purple
                    class="mb-3">Entrar</x-button>

                <div class="text-right">
                    <a href="{{ route('register') }}" class="text-blue-800 hover:underline">
                        Criar conta <x-icon name="arrow-narrow-right" class="w-5 h-5 inline" />
                    </a>
                </div>
            </x-slot:footer>
        </x-card>
    </form>

    @if(session()->has('account_created'))
        <script>
            Wireui.hook('notifications:load', () => {
                $wireui.notify({
                    title: 'Conta criada!',
                    description: '{{ session('account_created') }}',
                    icon: 'success'
                })
            })
        </script>
    @endif
</div>
