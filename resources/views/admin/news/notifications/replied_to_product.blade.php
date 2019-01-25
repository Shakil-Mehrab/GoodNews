@if(!empty($notification->data['news']['heading']))
    <a href="{{route('comment.show',$notification->data['news']['id'])}}">
        {{$notification->data['user']['name']}} commented on <strong> {{$notification->data['news']['heading']}}</strong> 
        </a> 
    @endif  
   