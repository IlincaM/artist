@extends('panelViews::mainTemplate')
@section('page-wrapper')


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script type="text/javascript" src="{{ URL::asset('js/ajax.js') }}"></script>
{!!Html::style('js/jquery-alertable-master/jquery.alertable.css')!!}
{!!Html::script('js/jquery-alertable-master/jquery.alertable.js')!!}
<script type="text/javascript" src="{{ URL::asset('js/jquery-alertable-master/jquery.alertable.js') }}"></script>


<h1>View all pages from the site</h1>
<table id='withoutMargins' class='table'>
    <thead >
    <th>#</th>
    <th>Title</th>
    <th>Body</th>
    <th>Slug</th>
    <th>Category</th>
    <th>Subcategory</th>
    <th>Edit</th>
    <th></th>
    <th></th>
</thead>
{{ csrf_field() }}

<tbody >
    @foreach($posts as $page)

    <tr class="item{{$page->id}}">
        <th>{{ $page->id }}</th>        
        <td>{{ $page->title }}</td> 
        <td>{!! substr($page->body, 0, 50) !!} {{ strlen(strip_tags($page->body)) > 50 ? "..." : ""}}</td>
        <td>{{ $page->slug }}</td> 
        <td>{{ $page->category['title'] }}</td>
        <td>{{ $page->subcategory['title'] }}</td>
        <td><a href="{{route('admin.show', $page->slug)}}">{!! FA::fixedWidth('list') !!} View</a></td>
        <td><a href="{{route('admin.edit', $page->slug)}}">{!! FA::fixedWidth('pencil') !!} Update</a></td>
        <td>
            <a href="#" onClick="Delete('{{$page->id}}','{{$page->title}}')">{!! FA::fixedWidth('trash-o') !!}Delete</a>
        </td>
    </tr>
    @endforeach
</tbody>
</table>
<script>
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
 var Delete = function(id,page)
{ 
     // ALERT JQUERY
    $.alertable.confirm('Are you sure you want to delete ' + page + ' ?').then(function() {
  var route = "{{url('/panel/Page/delete')}}/"+id+"#";
      var token = $("#token").val();
      $.ajax({
        url: route,
        headers: {'X-CSRF-TOKEN': token},
        type: 'post',
        dataType: 'json',
        
        success:$( ".item"+id).remove()
            
           
      });
     
  
    });
};




</script>
@stop

