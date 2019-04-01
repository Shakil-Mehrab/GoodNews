{{$sender->name}} has shared a News, <a href="{{route('new.single',$listing->id)}}">{{$listing->heading}}</a>.<br><br>
@if($body)
---<br>
{!! nl2br(e($body)) !!}<br>
---<br><br>
@endif
