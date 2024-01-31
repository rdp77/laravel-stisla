<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <x-meta-tag/>
</head>

<body>
<div id="app">
    <section class="section">
        <div class="container mt-5">
            <div class="page-error">
                <div class="page-inner">
                    <h1>@yield('title')</h1>
                    <div class="page-description">
                        @yield('error')
                    </div>
                    <div class="mt-3">
                        <a href="{{ route('home') }}">{{ __('Back to Home') }}</a>
                    </div>
                </div>
            </div>
            <x-footer.simple-footer class="mt-5"/>
        </div>
    </section>
</div>

</body>

</html>
