<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <x-meta-tag/>
</head>

<body>
<div id="app">
    <div class="main-wrapper">
        <div class="navbar-bg"></div>
        <x-navigation.navigation/>
        <livewire:layout.sidebar/>

        <!-- Main Content -->
        <div class="main-content">
            {{ $slot }}
        </div>

        <x-footer.main-footer/>
    </div>
</div>

@livewireScripts
@stack('scripts')

</body>

</html>
