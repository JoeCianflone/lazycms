<div class="stream-block" data-id="{{$item->id}}">
    <ul class="stream-block__list">
        <li class="stream-block__item">
            {{ $avatar }}
        </li>
        <li class="stream-block__item">
            {{ $typeIcon }}
        </li>
        <li class="stream-block__item">
            {{ $summary }}
        </li>
        <li class="stream-block__item"> {{ $date }} </li>
    </ul>
    <div class="stream-block__content">
        {{ $mediaBlock }}
        <div class="{{! isset($item->content['media']) ? "stream-block__content--with-media" : "stream-block__content" }}" >
            <blockquote class="stream-block__quote">
                {{ $content }}
            </blockquote>
        </div>
    </div>
</div>
