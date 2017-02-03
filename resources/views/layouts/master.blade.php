<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Lazy CMS</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,500" rel="stylesheet">
        <link rel="stylesheet" href="{{ mix('assets/css/app.css')}}">
    </head>
    <body>
        <div class="page">
            <main class="page__main">
                <div class="page__container">
                    <header class="header">
                        <h1 class="header__logo"><a href="#"><img src="assets/images/logo.svg" alt=""></a></h1>
                    </header>

                </div>
            </main>
            <aside class="page__secondary text-is-right">
                <a href="#" class="navigation__button">
                    <span class="navigation__button--bars fa fa-bars"></span>
                    <span class="navigation__button--indicator fa fa-caret-left"></span>
                </a>
            </aside>
        </div>
        @yield('content')
        <scrpts src="{{ mix('assets/js/app.js') }}"></scrpts>
    </body>
</html>
