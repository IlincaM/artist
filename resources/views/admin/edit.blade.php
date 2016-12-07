@extends('panelViews::mainTemplate')
@section('page-wrapper')
<!--<div class="row">
    <div class="col-md-8">
        <h1>{{$post->title}}</h1>
        <p>{{$post->body}}</p>
    </div>
    <div class="col-md-4">
        <div class='well'>
            <dl class="dl-horizontal">
                <dt>Created At:</dt>
                <dd>{{date('M j, Y h:ia',strtotime($post->created_at))}}</dd>
            </dl>
            <dl class="dl-horizontal">
                <dt>Last Updated:</dt>
                <dd>{{date('M j, Y h:ia',strtotime($post->updated_at))}}</dd>
            </dl>
            <hr>
            <div class="row">
                <div class="col-sm-6">
                    {!! Html::linkRoute('admin.show','Cancel',array($post->slug),array('class'=>'btn btn-danger btn-block')) !!}
                </div> 
                
            </div>
        </div>

    </div>
</div>-->
<div class="row">
    <!--Open a form and tell Laravel to conected it to the model-->
    {!! Form::model($post,['route' => ['admin.update',$post->id],'method' => 'PUT']) !!}
    <div class="col-md-8">
        {{Form::label('title','Title:')}}
        {{Form::text('title',null,['class' =>'form-control input-lg'])}}
        {{Form::label('slug','Slug:',['class' => 'form-spacing-top'])}}
        {{Form::text('slug',null,array('class' => 'form-control'))}}
        {{Form::label('body','Body:',['class' => 'form-spacing-top'])}}
        {{Form::textarea('body',null,['class' =>'form-control'])}}
    </div> 
    <div class="col-md-4">
        <div class="well">
            <dl class="dl-horizontal">
                <dt>Created At:</dt>
                <dd>{{ date('M j, Y h:ia',strtotime($post->created_at))  }}</dd>
            </dl>
            <dl class="dl-horizontal">
                <dt>Last Updated:</dt>
                <dd>{{date('M j, Y h:ia',strtotime($post->updated_at) ) }}</dd>
            </dl>
            <hr>
            <div class="row">
                <div class="col-sm-6">
                    {!! Html::linkRoute('admin.show','Cancel',array($post->slug),array('class' => 'btn btn-danger btn-block' )) !!}
                </div>
                <div class="col-sm-6">
                    {{Form::submit('Save Changes',['class' =>'btn btn-success btn-block'])}}


                </div>
            </div>
        </div> 
    </div>
    {!! Form::close() !!}
</div>

@stop
