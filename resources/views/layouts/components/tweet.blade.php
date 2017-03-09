@inject('Twitter', 'Twitter')

<div class="tweet" data-id="{{$item->id}}">
    @if(! is_null($item->content['media']))
        <div class="tweet-image">
                <img src="{{ $item->content['media'][0]['media_url'] }}"
                     width="{{ $item->content['media'][0]['sizes']['thumb']['w'] }}"
                     height="{{ $item->content['media'][0]['sizes']['thumb']['h'] }}"
                     alt="">
        </div>
    @endif

    @if(is_null($item->content['media']))
    <div class="tweet-content ">
    @else
    <div class="tweet-content tweet-content--with-media">
    @endif
        <ul class="meta-info-list">
            <li class="meta-info-list__item--type tweet__type">
                <img class="tweet__avatar" src="{{ $item->content['user']['avatar'] }}" alt="{{ $item->content['user']['realName'] }}">
                @if($item['sub_type'] === 'retweet')
                    <span class="tweet__icon fa fa-retweet"></span>
                @else
                    <span class="tweet__icon fa fa-twitter"></span>
                @endif
            </li>
            <li class="meta-info-list__item">
                @if($item['sub_type'] === 'retweet')
                    Retweeted
                @endif
                <a href="{{ Twitter::linkUser($item->content['user']['screenName']) }}" target="_blank">
                    &#64;{{ $item->content['user']['screenName'] }}
                </a>
            </li>
            <li class="meta-info-list__item">
                {!! Twitter::ago($item['item_created_at']) !!}
            </li>
        </ul>

        <blockquote class="tweet-content__text">
            {!! Twitter::linkify($item->content['text']) !!}
        </blockquote>
    </div>
</div>

