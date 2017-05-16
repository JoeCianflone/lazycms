<ul class="navigation__list">
    <li class="navigation__item"><a class="stream" href="{{url('/')}}">Stream</a>
        <ul class="navigation__secondary-list">
            <li class="navigation__secondary-list-item"><a class="stream-post" href="{{url('stream/post')}}">posts</a></li>
            <li class="navigation__secondary-list-item"><a class="stream-tweet" href="{{url('stream/tweet')}}">tweets</a></li>
            {{-- <li class="navigation__secondary-list-item"><a href="#">videos</a></li> --}}
            <li class="navigation__secondary-list-item"><a class="stream-github" href="{{url('stream/github')}}">github</a></li>
            {{-- <li class="navigation__secondary-list-item"><a href="#">livecoding</a></li> --}}
        </ul>
    </li>
    <li class="navigation__item"><a class="about" href="{{url('/about')}}">About</a>
        <ul class="navigation__secondary-list">
            <li class="navigation__secondary-list-item"><a class="styleguide" href="#">styleguide</a></li>
            <li class="navigation__secondary-list-item"><a class="disclaimer" href="#">disclaimer</a></li>
        </ul>
    </li>
    <li class="navigation__item"><a href="{{url('/projects')}}">Projects &amp; Contributions</a>
        <ul class="navigation__secondary-list">
            <li class="navigation__secondary-list-item"><a href="#">heisenberg</a></li>
            <li class="navigation__secondary-list-item"><a href="#">laravel-elixir-compass</a></li>
        </ul>
    </li>
</ul>