<div data-id="{{ $pinned->id}}" class="pin">
    <h1 class="pin__headline"><a class="pin__link" href="/posts/{{$pinned->slug}}">{{ $pinned->content['headline'] }}</a></h1>
    <ul class="meta-info-list">
        <li class="meta-info-list__item--type"><span class="fa fa-thumb-tack"></span></li>
        <li class="meta-info-list__item">Posted by: {{$pinned->meta_content['author']}}</li>
        <li class="meta-info-list__item">{{$pinned->item_created_at->diffForHumans()}}</li>
    </ul>
    <div class="pin__summary">
        {{$pinned->content['summary'] }}
        <p><a class="pin__link--readmore" href="/posts/{{$pinned->slug}}">Read More</a></p>
    </div>
</div>