@extends('panelViews::mainTemplate')
@section('page-wrapper')
<h1>{{$posts->title}}</h1>
<p>{{$posts->body}}</p>
<p>{{$posts->dimension}}</p>
<p>year: {{$posts->year}}</p>
<p>{{$posts->img}}</p>
@stop
