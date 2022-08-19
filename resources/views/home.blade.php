<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro</title>
    @vite('resources/css/app.css')
    @livewireStyles
    @wireUiScripts
    <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body class="bg-neutral-100">
    <header class="bg-white border-b px-3 shadow-md">
        <div class="max-w-5xl mx-auto py-3 flex items-center justify-between">
            <h1 class="text-lg font-bold">Cadastro</h1>

            <div class="flex gap-3 items-center">
                <p>Olá, <span class="font-bold">{{ auth()->user()->name }}</span></p>

                <x-button.circle purple icon="logout" href="{{ route('logout') }}"></x-button.circle>
            </div>
        </div>
    </header>

    <div class="max-w-5xl mx-auto px-3 py-5">
        <livewire:components.peoples-paginator />
    </div>

    <x-notifications />

    @livewireScripts
</body>
</html>
