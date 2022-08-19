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
    {{ $slot }}

    <x-notifications />

    @livewireScripts
</body>
</html>
