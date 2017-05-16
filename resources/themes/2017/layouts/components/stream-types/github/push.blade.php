<p>
    Pushed to <a href="{{ str_replace('https://api.github.com/repos/', 'https://github.com/', str_replace('commits', 'commit', $item->content['payload']['commits'][0]['url'])) }}" target="_blank">{{ $item->content['repo']['name'] }}</a>
    {{str_limit($item->content['payload']['commits'][0]['message'], 120)}}
</p>