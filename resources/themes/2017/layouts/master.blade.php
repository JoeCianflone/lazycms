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
    </head>
    <body>
        <div id="app">
            <div class="page">
                <main class="page__main">
                    <header class="header">
                        <h1 class="header__logo text-is-right">
                            <a href="{{url('/')}}" title="Joe Cianflone"><img src="{{ url('assets/images/logo.svg')}}" alt="Joe.Cianflone"></a>
                        </h1>
                    </header>
                    <div class="page__content">
                        @yield('content')
                    </div>
                </main>
                <sidebar>
                    <ul class="navigation__list">
                        <li class="navigation__item"><a href="{{url('/')}}">Stream</a>
                            <ul class="navigation__secondary-list">
                                <li class="navigation__secondary-list-item"><a href="{{url('stream/post')}}">#posts</a></li>
                                <li class="navigation__secondary-list-item"><a href="{{url('stream/tweet')}}">#tweets</a></li>
                                <li class="navigation__secondary-list-item"><a href="#">#videos</a></li>
                                <li class="navigation__secondary-list-item"><a href="#">#github</a></li>
                                <li class="navigation__secondary-list-item"><a href="#">#livecoding</a></li>
                            </ul>
                        </li>
                        <li class="navigation__item"><a href="{{url('/about')}}">About</a>
                            <ul class="navigation__secondary-list">
                                <li class="navigation__secondary-list-item"><a href="#"></a>#styleguide</li>
                                <li class="navigation__secondary-list-item"><a href="#"></a>#disclaimer</li>
                            </ul>
                        </li>
                        <li class="navigation__item"><a href="{{url('/projects')}}">Projects &amp; Contributions</a>
                            <ul class="navigation__secondary-list">
                                <li class="navigation__secondary-list-item"><a href="#"></a>#heisenberg</li>
                                <li class="navigation__secondary-list-item"><a href="#"></a>#laravel-elixir-compass</li>
                            </ul>
                        </li>
                    </ul>
                </sidebar>
            </div>
        </div>
    </body>
        <script src="{{ mix('assets/js/app.js') }}"></script>
</html>
