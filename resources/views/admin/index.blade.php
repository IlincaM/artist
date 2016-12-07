@extends('panelViews::mainTemplate')
@section('page-wrapper')


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script type="text/javascript" src="{{ URL::asset('js/ajax.js') }}"></script>


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
<!--        <td><a href="#">{!! FA::fixedWidth('trash-o') !!}Delete</a></td>-->
        <td>

            <button class="delete-modal btn btn-danger" data-id="{{$page->id}}" data-title="{{$page->title}}" data-description="{{$page->description}}">
                <span class="glyphicon glyphicon-trash"></span> Delete
            </button>
        </td>
    </tr>
    @endforeach
</tbody>
</table>
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="id">id :</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="fid" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="title">Title:</label>
                        <div class="col-sm-10">
                            <input type="name" class="form-control" id="t">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="description">Description:</label>
                        <div class="col-sm-10">
                            <input type="name" class="form-control" id="d">
                        </div>
                    </div>
                </form>
                <div class="deleteContent">
                    Are you Sure you want to delete <span class="title"></span> ?
                    <span class="hidden id"></span>
                </div>
                <div class="modal-footer">
                    <button method="delete" type="button" class="btn actionBtn deleteB"  data-dismiss="modal">
                        <span id="footer_action_button" class='glyphicon'> </span>
                    </button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal">
                        <span class='glyphicon glyphicon-remove'></span> Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

