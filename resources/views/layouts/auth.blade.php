<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <x-meta-tag/>
</head>

<body>
<div id="app">
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="{{ Request::is('register') ? 'col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2' : 'col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4' }}">
                    <div class="login-brand">
                        <img src="{{ Vite::image('stisla-fill.svg') }}" alt="logo" width="100"
                             class="shadow-light rounded-circle">
                    </div>

                    <x-card.card>
                        <div class="card-header"><h4>@yield('pageTitle', 'Page Title')</h4></div>
                        {{ $slot }}
                    </x-card.card>

                    @if(Request::is('login'))
                        <div class="mt-5 text-muted text-center">
                            {{ __('Don\'t have an account?') }} <a href="{{ route('register') }}" wire:navigate>
                                {{ __('Create One') }}
                            </a>
                        </div>
                    @elseif(Request::is('register'))
                        <div class="mt-5 text-muted text-center">
                            {{ __('Already registered?') }} <a href="{{ route('login') }}" wire:navigate>
                                {{ __('Log In') }}
                            </a>
                        </div>
                    @endif
                   <x-footer.simple-footer/>
                </div>
            </div>
        </div>
    </section>
</div>

@livewireScripts

</body>

</html>
