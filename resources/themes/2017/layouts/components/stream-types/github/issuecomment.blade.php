<p>Commented on an issue at <a href="{{$item->content['payload']['comment']['html_url']}}">#{{$item->content['payload']['issue']['number']}}</a></p>
<p>{{str_limit($item->content['payload']['comment']['body'], 120)}}</p>
