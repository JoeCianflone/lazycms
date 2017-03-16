<div data-id="{{ $item->id}}" class="post">
    <h1>{{ $item->content['headline'] }}</h1>
    <ul class="meta-info-list">
        <li class="meta-info-list__item--type"><span class="fa fa-newspaper-o"></span></li>
        <li class="meta-info-list__item">Posted by: {{$item->meta_content['author']}}</li>
        <li class="meta-info-list__item">{{$item->item_created_at->diffForHumans()}}</li>
    </ul>
    {{$item->content['summary'] }}
</div>