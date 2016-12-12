@extends('panelViews::mainTemplate')
@section('page-wrapper')
<script type="text/javascript" src=" {{ URL::asset('js/ajax.js') }}"></script>

<div class="row">
    <div >
        <h1>Create new page</h1>
        <!-- if there are creation errors, they will show here -->
        <hr>
        {!! Form::open(['route' => ['admin.store'],'method' => 'POST','data-parsley-validate' => '','files'=>true]) !!}


        {{Form::label('title','Title:',['class' => 'labelColor'])}}
        {{Form::text('title', null,array('class' => 'form-control', 'required' => '','maxlenght' => '255')) }}
        {{Form::label('slug','Slug:',['class' => 'labelColor'])}}
        {{Form::text('slug',null,array('class' => 'form-control','required' => '','minlength'=>'3','maxlength'=>'255'))}}
        {{Form::label('type-page_id','Type of the page:')}}

        <select name="type-page_id"  id="type-page_id" > 
            <option disabled selected value >Please select</option>  
            @foreach ($types as $key => $value) { 

            <option value="<?php echo $value['id']; ?>"><?php echo $value['title']; ?></option> 
            } 
            @endforeach
        </select>
        <!--This should appear if the page is an Art Page (option 1 in the select box)-->

        <div id="artOption" class="field">
            {{Form::label('body','Body:')}}
            {{Form::textarea('body',null,array('class' => 'form-control','required' => ''))}}
            {{Form::label('category','Select the project:')}}
        {{Form::text('category', null,array('class' => 'form-control', 'required' => '','maxlenght' => '255')) }}
<?php var_dump('<pre>',$page); ?>

            {{Form::hidden('show_nav',0)}}
            {{Form::label('show_nav','Show in the menu:')}}

            {{Form::checkbox('show_nav',1)}}
            {{ Form::hidden('type_id', 1) }}       
        </div>
        <!--This should appear if the page is a Simple Page (option 2 in the select box)-->
        <div id="simpleOption" class="field">
            {{Form::label('body','Body:')}}
            {{Form::textarea('body',null,array('class' => 'form-control','required' => ''))}}
            {{Form::hidden('show_nav',0)}}
            {{Form::label('show_nav','Show in the menu:')}}

            {{Form::checkbox('show_nav',1)}}
            {{ Form::hidden('type_id', 2) }}

        </div>
        {{Form::submit('Create New Page',array('class' => 'btn btn-block'))}}

        {!! Form::close() !!}

    </div> 
</div>
@stop
