@inject('Twitter', 'Twitter')

@component('layouts.components.stream-element', ['item' => $item])

    @slot('avatar')
        <img class="stream-block__avatar" src="{{ $item->content['user']['avatar'] }}" alt="{{ $item->content['user']['realName'] }}">
    @endslot

    @slot('typeIcon')
        <span class="stream-block__icon fa fa-twitter"></span>
    @endslot

    @slot('summary')
        <a href="{{ Twitter::linkUser($item->content['user']['screenName']) }}" target="_blank">
            @if ($item->sub_type === 'retweet')
                &#64;{{ $item->content['user']['screenName'] }} was retweeted
            @else
                &#64;{{ $item->content['user']['screenName'] }} tweeted
            @endif
        </a>
    @endslot

    @slot('date')
        {!! Twitter::ago($item['item_created_at']) !!}
    @endslot

    @slot('mediaBlock')
        @if(! is_null($item->content['media']))
            <img class="stream-block__media" src="{{ $item->content['media'][0]['media_url'] }}" width="{{ $item->content['media'][0]['sizes']['thumb']['w'] }}" height="{{ $item->content['media'][0]['sizes']['thumb']['h'] }}" alt="">
        @endif
    @endslot

    @slot('content')
        {!! Twitter::linkify($item->content['text']) !!}
    @endslot

@endcomponent