@inject('Twitter', 'Twitter')

<div class="tweet" data-id="{{$item['id']}}">
    <div class="tweet-image"></div>
    <div class="tweet-content">
        <ul class="meta-info-list">
            <li class="meta-info-list__item--type">
                <span class="fa fa-twitter"></span>
            </li>
            <li class="meta-info-list__item">
                &#64;{{ $item['content']['user']['screenName'] }}
            </li>
            <li class="meta-info-list__item">
                {!! Twitter::ago($item['item_created_at']) !!}
            </li>
        </ul>

        <blockquote class="tweet-content__text">
            {!! Twitter::linkify($item['content']['text']) !!}
        </blockquote>
    </div>
</div>

