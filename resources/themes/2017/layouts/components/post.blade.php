<div data-id="{{ $item->id}}" class="post">
    <h1 class="post__headline"><a class="post__link" href="/posts/{{$item->slug}}">{{ $item->content['headline'] }}</a></h1>
    <ul class="stream-block__list">
        <li class="stream-block__item--type"><span class="fa fa-newspaper-o"></span></li>
        <li class="stream-block__item">Posted by: {{$item->meta_content['author']}}</li>
        <li class="stream-block__item">{{$item->item_created_at->diffForHumans()}}</li>
    </ul>
    {!! $item->content['summary'] !!}
</div>