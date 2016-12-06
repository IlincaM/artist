@extends('panelViews::mainTemplate')
@section('page-wrapper')
<h1>{{$post->title}}</h1>
<p>{{$post->body}}</p>
<p>{{$post->dimension}}</p>
<p>year: {{$post->year}}</p>
<p>{{$post->img}}</p>
@stop
