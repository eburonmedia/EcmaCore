<!doctype html>
<html lang="nl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

        <title>
            ContentApp > @yield('module_title')
        </title>

        <meta name="description" content="Eburon.Media Content Management Application">
        <meta name="author" content="Eburon.Media">
        <meta name="robots" content="noindex, nofollow">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('ecma/img/favicon.ico') }}">

        <link rel="stylesheet" id="css-icons" href="{{ asset('ecma/css/icons.css') }}">
        <link rel="stylesheet" id="css-plugins" href="{{ asset('ecma/css/plugins.css') }}">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
        <link rel="stylesheet" id="css-main" href="{{ asset('ecma/css/ecma.css') }}">
        @if(config('ecma-core.theme') != null)
        <link rel="stylesheet" id="css-theme" href="{{ asset('ecma/css/themes/'. config('ecma-core.theme') .'.css') }}">
        @endif
        <link rel="stylesheet" id="css-styles" href="{{ asset('ecma/css/styles.css') }}">
        @yield('head_styles')
        <script>window.Laravel = {!! json_encode(['csrfToken' => csrf_token(),]) !!};</script>
        @yield('head_scripts')
    </head>
    <body>
        <div id="page-loader" class="show"></div>
        <div id="page-container" class="{{ config('ecma-core.layout') }}">
            @if(Auth::user()->is_developer)
                @include('ecma-core::partials.rightside')
            @endif

            @include('ecma-core::partials.leftside')

            @include('ecma-core::partials.topnav')

            <main id="main-container">
                @yield('pageheader')

                <div class="content">
                    @include('ecma-core::partials.notifications')
                    @yield('content')
                </div>

            </main>

            @include('ecma-core::partials.footer')
        </div>

        <script>window['csrf'] = '{{ csrf_token() }}';</script>
        <script>window['ecma_route'] = '{{ config('ecma-core.route_name') }}';</script>
        <script src="/ecma/js/ecma.app.js"></script>
        <script src="/ecma/js/plugins.js"></script>
        <script src="/ecma/js/ecma-core.js"></script>
        @yield('modals')

        @yield('scripts')
    </body>
</html>
