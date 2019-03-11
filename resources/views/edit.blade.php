@extends('layout')

@section('content')
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('posts.update', $p->id) }}">
        @method('PATCH')
        @csrf
        <div class="form-group">
          <label for="title">Title:</label>
          <input type="text" class="form-control" name="title" value="{{ $p->title }} "/>
        </div>
        <div class="form-group">
          <label for="author">Author:</label>
          <input type="text" class="form-control" name="author" value="{{ $p->author }}" />
        </div>
        <div class="form-group">
          <label for="body">Content :</label>
          <input type="text" class="form-control" name="body" value="{{ $p->body}}"/>
        </div>
        
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
  </div>
</div>
@endsection