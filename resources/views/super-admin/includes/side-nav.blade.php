@php
use App\Model\News;
use App\Model\Category;
use App\Model\Comment;
use App\Model\Reply;
use App\User;

$total_news=News::all()->count('id');
$total_category=Category::all()->count('id');
$total_comment=Comment::all()->count('id');
$total_user=User::all()->count('id');

@endphp
<ul class="list-group">
    <a href="{{route('admin.dashboard')}}"><li class="list-group-item list-group-item-success active"><span style="font-size:20px"><i class="fas fa-tachometer-alt"></i> Admmin Dashboard</span></li></a>
    <a href="{{route('admin-news.index')}}"> <li class="list-group-item list-group-item-success"><span class="badge">{{$total_news}}</span><i class="fas fa-newspaper"></i> Admin News</li></a>
    <a href="{{route('admin-categories.index')}}"><li class="list-group-item list-group-item-warning"><span class="badge">{{$total_category}}</span><i class="fas fa-list-alt"></i> Admin Categories</li></a>
    <a href="{{route('admin-users')}}"> <li class="list-group-item list-group-item-danger"><span class="badge">{{$total_user}}</span><i class="fas fa-users"></i> Admin Users</li></a>
    <a href="{{route('admin-comment.index')}}"><li class="list-group-item list-group-item-warning"><span class="badge">{{$total_comment}}</span><i class="fas fa-comments"></i> Admin Comments</li></a>
</ul>