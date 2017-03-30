<div data-id="{{ $pinned->id}}" class="pin">
    <h1 class="pin__headline">{{ $pinned->content['headline'] }}</h1>
    <ul class="meta-info-list">
        <li class="meta-info-list__item--type"><span class="fa fa-thumb-tack"></span></li>
        <li class="meta-info-list__item">Posted by: {{$pinned->meta_content['author']}}</li>
        <li class="meta-info-list__item">{{$pinned->item_created_at->diffForHumans()}}</li>
    </ul>
    <div class="pin__summary">
        {{$pinned->content['summary'] }}

    </div>
</div>