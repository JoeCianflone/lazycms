<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @yield('meta')
        <title>@yield('page_title', 'The Lazy CMS')</title>
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,500" rel="stylesheet">
        <link rel="stylesheet" href="{{ mix('assets/css/app.css')}}">
        <script defer src="{{ mix('assets/js/app.js') }}"></script>
    </head>
    <body class="@yield('signature')">
        <div id="app">
            <div class="page">
                <main class="page__main">
                    <header class="header">
                        <h1 class="header__logo text-is-right">
                            <a href="{{url('/')}}" title="Joe Cianflone"><img src="{{ url('assets/images/logo.svg')}}" alt="Joe.Cianflone"></a>
                        </h1>
                        @yield('tagged-as')
                    </header>
                    <div class="page__content">
                        @yield('content')
                    </div>
                </main>
                <sidebar>
                    @include('layouts.components.sidebar')
                </sidebar>
            </div>
        </div>
    </body>

</html>
