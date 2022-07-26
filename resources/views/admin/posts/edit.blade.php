@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>modifica post</h1>
    <form action="{{route('admin.posts.update', $post->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="name">Nome Autore</label>
            <input type="text" class="form-control" id="name" name="author_name" value="{{old('author_name', $post->author_name)}}">
          </div>
          <div class="form-group col-md-6">
            <label for="surname">Cognome Autore</label>
            <input type="text" class="form-control" id="surname" name="author_lastname" value="{{old('author_lastname', $post->author_lastname)}}">
          </div>
        </div>
        <div class="form-group">
          <label for="title">Titolo</label>
          <input type="text" class="form-control" id="title" name="title" value="{{old('title', $post->title)}}">
        </div>
        <div class="form-group">
          <label for="post">Post</label>
          <textarea rows="10" class="form-control" id="post" name="content">{{old('content', $post->content)}}</textarea>
        </div>
        {{-- @dd($post->content) --}}
        <div class="form-group">
          <label for="category">Categoria</label>
          <select class="form-control" id="category" name="category_id">
            <option value="">Seleziona categoria</option>
              @foreach ($categories as $category)
                  <option value="{{$category->id}}" {{old('category_id', $post->category_id) == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
              @endforeach
          </select>
        </div>
        @foreach ($tags as $tag)
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="{{$tag->slug}}" value="{{$tag->id}}">
            <label class="form-check-label" for="{{$tag->slug}}">{{$tag->name}}</label>
          </div>            
        @endforeach
        <div class="form-group">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="published" name="is_published">
            <label class="form-check-label" for="published">
              Pubblica
            </label>
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Modifica</button>
      </form>
  </div>
@endsection