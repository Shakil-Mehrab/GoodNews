@php
use App\Model\News;
use App\Model\Comment;
use App\Model\User_news_views;

$comments=Comment::orderBy('id','desc')->limit(5)->get();        
$recent_news=News::orderBy('id','desc')->limit(5)->get();
$pop_news=User_news_views::orderBy('count','desc')->limit(5)->get();
$holidays=News::orderBY('id','desc')->where('category_id',18)->limit(4)->get();
$bussinesses=News::orderBY('id','desc')->where('category_id',19)->limit(4)->get();
@endphp
<div class="widget widget-recent gn-animation" data-animation="fadeInUp" data-animation-delay="0" data-animation-offset="75%">
	<h5 class="widget-title">Recent Posts</h5>
	<ul>
	@forelse($recent_news as $recent_new)
		<li>
			<div class="thumb">
			<a href="{{URL::to($recent_new->image)}}">
				<img src="{{URL::to($recent_new->image)}}" class="sidebar" alt="img">
				</a>
			</div>
			<div class="content">
				<h3><a href="{{route('new.single',$recent_new->id)}}">{{$recent_new->heading}}</a></h3>
				<div class="date">{{$recent_new->created_at->diffForHumans()}}</div>
			</div>
		</li>
		
		@empty
		<li>No News</li>
@endforelse
	</ul>
</div><!-- /.widget-recent -->
<div class="widget widget-ads gn-animation" data-animation="fadeInUp" data-animation-delay="0" data-animation-offset="75%">
	<a href="#"><img src="images/ad.jpg" alt="image"></a>
	<p class="text-ad">Advertisement</p>
</div><!-- /.widget-ads -->
<div class="widget widget-most-popular gn-animation" data-animation="fadeInUp" data-animation-delay="0" data-animation-offset="75%">
	<h5 class="widget-title">5 Most Popular</h5>
	<ul>
	@php
    $i=1;
	@endphp
	@forelse($pop_news as $pop_new)
		<li>
			<div class="order">{{$i}}</div>
			<p><a href="{{route('new.single',$pop_new->news->id)}}">{{$pop_new->news->heading}}</a></p>
		</li>
		@php
		$i=$i+1;
	    @endphp
	
		@empty
		<li>No News</li>
@endforelse
	</ul>
</div><!-- /.widget-popular -->
<div class="widget widget-tabs gn-animation" data-animation="fadeInUp" data-animation-delay="0" data-animation-offset="75%">
	<div class="tabs">
		<ul class="menu-tab">
			<li class="active"><a href="#">Comments</a></li>
		   	<li><a href="#">Popular</a></li>
		   	<li><a href="#">Tags</a></li>
		</ul><!-- /.menu-tab -->
		<div class="content-tab">
		   	<div class="content">
				<ul class="comments">
				@forelse($comments as $comment)
				
					<li>
						<div class="avatar">
						<a href="{{URL::to($comment->user->image)}}">
							<img src="{{URL::to($comment->user->image)}}"  alt="img"></a>
						</div>
						<p><a href="{{route('user.show',$comment->user->id)}}">{{$comment->user->name}}</a> on <a href="{{route('comment.show',$comment->news->id)}}">{{$comment->news->heading}}</a> 2 hours</p>
					</li>	
					@empty
	              	<li>No Comment</li>
            	@endforelse	
				</ul>
		   	</div><!-- /.comments -->
		   	<div class="content">
				<ul class="pop-posts">
				
               	@forelse($pop_news as $pop_new)
					<li>
						<div class="thumb">
						<a href="{{URL::to($pop_new->news->image)}}">
							<img src="{{URL::to($pop_new->news->image)}}" class="sidebar" alt="img"></a>
						</div>
						<div class="text">
							<a href="{{route('new.single',$pop_new->news->id)}}">{{$pop_new->news->heading}}</a>
							<i>{{$pop_new->news->created_at->diffForHumans()}}</i>
						</div>
					</li>
					@empty
	              	<li>No News</li>
            	@endforelse
				</ul>
		   	</div><!-- /.comments -->
		   	<div class="content">
				<div class="tags">
					<a href="#">business</a>
					<a href="#">themeforest</a>
					<a href="#">good news</a>
					<a href="#">startups</a>
					<a href="#">red</a>
					<a href="#">politics</a>
					<a href="#">europe</a>
					<a href="#">asia</a>
				</div>
		   	</div><!-- /.comments -->
		</div><!-- /.content-tab -->
	</div><!-- /.tabs -->
</div><!-- /.widget-tabs -->
<div class="widget widget-follow-us gn-animation" data-animation="fadeInUp" data-animation-delay="0" data-animation-offset="75%">
	<h5 class="widget-title text-dark">Follow Us</h5>
	<div class="socials">
		<a class="facebook" href="https://www.facebook.com/profile.php?id=100014002519180"><i class="fa fa-facebook"></i></a>
		<a class="twitter" href="https://twitter.com/Md_Shakil_Sard"><i class="fa fa-twitter"></i></a>
		
	</div>
</div><!-- /.widget-follow-us -->

<div class="widget widget-subscribe gn-animation" data-animation="fadeInUp" data-animation-delay="0" data-animation-offset="75%">
	<h5 class="widget-title">Good News Newsetter</h5>
	<p>Subscribe to our email newsletter for good news, sent out every Monday.</p>
      @include('admin.includes.message')

	<form method="post" action="{{route('subscribe.save')}}" id="subscribe-form" data-mailchimp="true">
	{{csrf_field()}}
		<div id="subscribe-content">
			<div class="input">
			   <input type="text" id="subscribe-email" name="email" placeholder="Email" value="{{Request::old('email')}}">
			</div>
			<div class="button">
			   <button type="submit" id="subscribe-button" class="" title="Subscribe now">Subscribe</button>
			</div>
		</div>
		<div id="subscribe-msg"></div>
	</form>
</div><!-- /.widget-subscribe -->
<div class="widget widget-recent gn-animation" data-animation="fadeInUp" data-animation-delay="0" data-animation-offset="75%">
	<h5 class="widget-title">Business</h5>
	<ul>
	@forelse($bussinesses as $bussiness)

		<li>
			<div class="thumb">
			<a href="{{URL::to($bussiness->image)}}">
			<img  src="{{URL::to($bussiness->image)}}" class="sidebar" alt="img">
			</a>
			</div>
			<div class="content">
				<h3><a href="{{route('new.single',$bussiness->id)}}">{{$bussiness->heading}}</a></h3>
				<div class="date">{{$bussiness->created_at->diffForHumans()}}</div>
			</div>
		</li>
		@empty
		<li>
			<div class="thumb">
				<a href="#"><img src="images/thumbs/" alt="img"></a>
			</div>
			<div class="content">
				<h3><a href="#">No News</a></h3>
				<div class="date"></div>
			</div>
		</li>
@endforelse
	</ul>
</div><!-- /.widget-Business-->
<div class="widget widget-recent gn-animation" data-animation="fadeInUp" data-animation-delay="0" data-animation-offset="75%">
	<h5 class="widget-title">Holidays</h5>
	<ul>
	@forelse($holidays as $holiday)

		<li>
			<div class="thumb">
			<a href="{{URL::to($holiday->image)}}">
			<img  src="{{URL::to($holiday->image)}}" class="sidebar" alt="img">
			</a>
			</div>
			<div class="content">
				<h3><a href="{{route('new.single',$holiday->id)}}">{{$holiday->heading}}</a></h3>
				<div class="date">{{$holiday->created_at->diffForHumans()}}</div>
			</div>
		</li>
		@empty
		<li>
			<div class="thumb">
				<a href="#"><img src="images/thumbs/" alt="img"></a>
			</div>
			<div class="content">
				<h3><a href="#">No News</a></h3>
				<div class="date"></div>
			</div>
		</li>
@endforelse
	</ul>
</div><!-- /.widget-Business-->
