@php
use App\News;
use App\Category;
use App\Comment;
use App\Reply;
use App\User;

$total_news=News::all()->count('id');
$total_category=Category::all()->count('id');
$total_comment=Comment::all()->count('id');
$total_user=User::all()->count('id');

@endphp



<ul class="list-group">
    <a href="{{route('dashboard')}}"><li class="list-group-item list-group-item-success active"><span style="font-size:20px"><i class="fas fa-tachometer-alt"></i> Dashboard</span></li></a>
    <a href="{{route('news.index')}}"> <li class="list-group-item list-group-item-success"><span class="badge">{{$total_news}}</span><i class="fas fa-newspaper"></i> News</li></a>
    <a href="{{route('categories.index')}}"><li class="list-group-item list-group-item-warning"><span class="badge">{{$total_category}}</span><i class="fas fa-list-alt"></i> Categories</li></a>
    <a href="{{route('users')}}"> <li class="list-group-item list-group-item-danger"><span class="badge">{{$total_user}}</span><i class="fas fa-users"></i> Users</li></a>
    <a href="{{route('comment.index')}}"><li class="list-group-item list-group-item-warning"><span class="badge">{{$total_comment}}</span><i class="fas fa-comments"></i> Comments</li></a>
</ul>