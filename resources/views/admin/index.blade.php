@extends('panelViews::mainTemplate')
@section('page-wrapper')

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
<tbody >
    @foreach($posts as $page)

    <tr>
        <th>{{ $page->id }}</th>        
        <td>{{ $page->title }}</td> 
        <td>{!! substr($page->body, 0, 50) !!} {{ strlen(strip_tags($page->body)) > 50 ? "..." : ""}}</td>
        <td>{{ $page->slug }}</td> 
        <td>{{ $page->category['title'] }}</td>
        <td>{{ $page->subcategory['title'] }}</td>
        <td><a href="{{route('admin.show', $page->slug)}}">{!! FA::fixedWidth('list') !!} View</a></td>
        <td><a href="{{route('admin.edit', $page->slug)}}">{!! FA::fixedWidth('pencil') !!} Update</a></td>
        <td><a href="#">{!! FA::fixedWidth('trash-o') !!}Delete</a></td>
    </tr>
    @endforeach
</tbody>
</table>

@stop

