@extends('layouts.master')
@section('carousel')
@include('front.news.carousel')
@endsection
@section('leftside')
@include('front.news.leftside.leftside')	
@endsection
@section('lower')
@include('front.news.politics_news')					
@include('front.news.education_news')	
@include('front.news.recreation_news')
@include('front.news.finalnews_news')
@endsection








