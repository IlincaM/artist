@extends('panelViews::mainTemplate')
@section('page-wrapper')
<script type="text/javascript" src=" {{ URL::asset('js/ajax.js') }}"></script>

<div class="row">
    <div >
        <h1>Create new page</h1>
        <hr>
        {!! Form::open(array('route' => 'admin.store','data-parsley-validate' => '','files'=>true))!!}
        {{Form::label('title','Title:',['class' => 'labelColor'])}}
        {{Form::text('title', null,array('class' => 'form-control', 'required' => '','maxlenght' => '255')) }}
        {{Form::label('slug','Slug:',['class' => 'labelColor'])}}
        {{Form::text('slug',null,array('class' => 'form-control','required' => '','minlength'=>'3','maxlength'=>'255'))}}
        {{Form::label('type-page_id','Type of the page:')}}

        <select name="type-page_id"  id="type-page_id" > 
            <option disabled selected value >Please select</option>  
            <?php foreach ($types as $key => $value) { ?>

                <option value="<?php echo $value['id']; ?>"><?php echo $value['title']; ?></option> 
            <?php } ?>
        </select>
        <!--This should appear if the page is an Art Page (option 1 in the select box)-->

        <div id="artOption" class="field">
            <p>Piece of art</p>
        </div>
        <!--This should appear if the page is a Simple Page (option 2 in the select box)-->
        <div id="simpleOption" class="field">
            {{Form::label('body','Body:',['class' => 'labelColor'])}}
            {{Form::textarea('body',null,array('class' => 'form-control','required' => ''))}}
            {{Form::hidden('show-nav',0)}}
            {{Form::checkbox('show-nav',1)}}

        </div>
                {{Form::submit('Create New Page',array('class' => 'btn btn-block'))}}

        {!! Form::close() !!}

    </div> 
</div>
@stop
