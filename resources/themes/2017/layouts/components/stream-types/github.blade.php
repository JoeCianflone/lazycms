@component('layouts.components.stream-element', ['item' => $item])

    @slot('avatar')
        <img class="stream-block__avatar" src="{{ $item->content['user']['avatar'] }}" alt="{{ $item->content['user']['username'] }}">
    @endslot

    @slot('typeIcon')
        <span class="stream-block__icon fa fa-github"></span>
    @endslot

    @slot('summary')
        <a href="https://github.com/{{ $item->content['user']['username']}}" target="_blank">
            &#64;{{ $item->content['user']['username'] }}
        </a>
    @endslot

    @slot('date')
        {!! Twitter::ago($item['item_created_at']) !!}
    @endslot

    @slot('mediaBlock')
    @endslot

    @slot('content')
        @includeif('layouts.components.stream-types.github.'.$item->sub_type, $item)
    @endslot

@endcomponent