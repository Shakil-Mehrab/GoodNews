@php
use App\Model\News;
    $news=News::all();
@endphp
{{-- @if(isset($category))
	<search-component category-id="{{$category->id}}" :area-ids="{{$area->descendants->pluck('id')->push($area->id)}}"></search-component>
@else
	<search-component :area-ids="{{$products->pluck('id')->push($products->id)}}"></search-component>
 @endif
<hr> --}}
<search-component :area-ids="{{$news->pluck('id')}}"></search-component>