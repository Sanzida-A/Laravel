@extends('layout')

@section('content')
<div class="uper">
 
    <table class="table table-striped">
      <thead>
          <tr>
            <td>ID</td>
            <td>Title</td>
            <td>Author</td>
            <td>Body</td>
            <td colspan="2">Action</td>
          </tr>
      </thead>
      <tbody>
          @foreach($p as $p)
          <tr>
              <td>{{$p->id}}</td>
              <td>{{$p->title}}</td>
              <td>{{$p->author}}</td>
              <td>{{$p->body}}</td>
              <td><a href="{{ route('posts.edit',$p->id)}}" class="btn btn-primary">Edit</a></td>
              <td>
                  <form action="{{ route('posts.destroy', $p->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Delete</button>
                  </form>
              </td>
          </tr>
          @endforeach
      </tbody>
    </table>
  <div>
@endsection