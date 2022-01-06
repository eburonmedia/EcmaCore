<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

        <title>{{ config('ecma-core.app_name') }} - Login</title>

        <meta name="description" content="Easy Content Management Application Pro">
        <meta name="author" content="Maikel Zwart | HouseOfCodes">
        <meta name="robots" content="noindex, nofollow">

        <link rel="shortcut icon" type="image/x-icon" href="/img/favicon.ico">
        <link rel="icon" type="image/png" sizes="192x192" href="/img/favicon-192x192.png">
        <link rel="apple-touch-icon" sizes="180x180" href="/img/favicon-180x180.png">

        <link rel="stylesheet" id="css-icons" href="{{ asset('ecma/css/icons.css') }}">
        <link rel="stylesheet" id="css-plugins" href="{{ asset('ecma/css/plugins.css') }}">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
        <link rel="stylesheet" id="css-main" href="{{ asset('ecma/css/ecma.css') }}">
        @if(config('ecma-core.theme') != null)
        <link rel="stylesheet" id="css-theme" href="{{ asset('ecma/css/themes/'. config('ecma-core.theme') .'.css') }}">
        @endif
        <link rel="stylesheet" id="css-styles" href="{{ asset('ecma/css/styles.css') }}">
    </head>
    <body>
        <div id="page-container">

            <main id="main-container">

                <div class="bg-image" style="background-image: url('/ecma/img/login-bg@2x.jpg');">
                    <div class="row no-gutters bg-primary-op">

                        <div class="hero-static col-md-6 d-flex align-items-center bg-white">
                            <div class="p-3 w-100">

                                <div class="mb-3 text-center">
                                    <a class="link-fx font-w700 font-size-h1" href="{{ route('ecma.login') }}">
                                        <span class="text-primary">{{ config('ecma-core.app_name') }}</span>
                                    </a>
                                    <p class="text-uppercase font-w700 font-size-sm text-muted">Inloggen</p>
                                </div>

                                <div class="row no-gutters justify-content-center">
                                    <div class="col-sm-8 col-xl-6">
                                        @include('ecma-core::partials.notifications')
                                        <form action="{{ route('ecma.do_login') }}" method="post" data-parsley-validate>
                                            {{ csrf_field() }}
                                            <div class="py-3">
                                                <div class="form-group">
                                                    <input type="email" class="form-control form-control-lg form-control-alt" name="email" placeholder="E-mail" data-parsley-required="true" data-parsley-trigger="change">
                                                </div>
                                                <div class="form-group">
                                                    <input type="password" class="form-control form-control-lg form-control-alt" name="password" placeholder="Wachtwoord" data-parsley-required="true" data-parsley-trigger="change">
                                                </div>
                                                <div class="form-group">
                                                    <div class="custom-control custom-checkbox mb-1">
                                                        <input type="checkbox" class="custom-control-input" name="remember" id="remember">
                                                        <label class="custom-control-label" for="remember">Ingelogd blijven</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-block btn-hero-lg btn-hero-primary">
                                                    <i class="fal fa-fw fa-sign-in-alt mr-1"></i> Inloggen
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="hero-static col-md-6 d-none d-md-flex align-items-md-center justify-content-md-center text-md-center">
                            <div class="p-3">
                                <p class="display-4 font-w700 text-white mb-3">
                                    Build to Work
                                </p>
                                <p class="font-size-lg font-w600 text-white-75 mb-0">
                                    By <a href="https://houseofcodes.nl" target="_blank" style="color:#000; text-transform:uppercase;">HouseOfCodes</a> &copy; {{ date('Y') }}
                                </p>
                            </div>
                        </div>

                    </div>
                </div>


            </main>

        </div>
        <script src="/ecma/js/ecma.app.js"></script>
        <script src="/ecma/js/plugins.js"></script>

    </body>
</html>
