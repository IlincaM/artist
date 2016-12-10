@extends('panelViews::mainTemplate')
@section('page-wrapper')
<h1>{{$page->title}}</h1>
<p>{{$page->body}}</p>
<p>{{$page->dimension}}</p>
<p>year: {{$page->year}}</p>
<p>{{$page->img}}</p>
@stop
