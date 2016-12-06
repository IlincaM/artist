@extends('panelViews::mainTemplate')
@section('page-wrapper')
<div class="row">
    <div class="col-md-8">
        <h1>{{$posts->title}}</h1>
        <p>{{$posts->body}}</p>
    </div>
    <div class="col-md-4">
        <div class='well'>
            <dl class="dl-horizontal">
                <dt>Created At:</dt>
                <dd>{{date('M j, Y h:ia',strtotime($posts->created_at))}}</dd>
            </dl>
            <dl class="dl-horizontal">
                <dt>Last Updated:</dt>
                <dd>{{date('M j, Y h:ia',strtotime($posts->updated_at))}}</dd>
            </dl>
            <hr>
            <div class="row">
                <div class="col-sm-6">
                    {!! Html::linkRoute('admin.show','Cancel',array($posts->id),array('class'=>'btn btn-danger btn-block')) !!}
                </div> 
                
            </div>
        </div>

    </div>
</div>


@stop
