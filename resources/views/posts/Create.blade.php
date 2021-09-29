@extends('layouts.app')
 
 @section('content')
  <div class="card">
    <div class="card-header">
      {{ isset($post)? "Update post" :"Create new post" }}
    </div>
    <div class="card-body">
      <form action="{{ isset($post)? route('posts.update', $post->id) : route('posts.store') }}" 
            method="POST"
            enctype="multipart/form-data">
      @csrf
      @if (isset($post) ) 
         @method('PUT')   
      @endif
      <div class="form-group">
        <label for="exampleFormControlInput1">title:</label>
        <input type="text" name="title" class=" @error('title') is invalide @enderror form-control" 
          id="exampleFormControlInput1" placeholder="put the title" 
          value="{{ isset($post)? $post->title : "" }}">
          <label for="exampleFormControlTextarea1">
          description:
          </label>
            <textarea name="description" 
              rows="3" 
              class=" @error('description') is invalide @enderror form-control" 
              placeholder="put the description" >
                {{ isset($post)? $post->description : "" }}
            </textarea>
          <label for="post content">
            content:
          </label>
            <textarea name="content" 
            rows="3" 
            class=" @error('content') is invalide @enderror form-control" 
            placeholder="put the content">
                {{ isset($post)? $post->content : "" }}
            </textarea>
            @if(isset($post))
          <div class="form-group">
          <img src="{{asset('storage/' . $post->image)}}" 
          style="width:100%">
          </div>
          @endif
          <label for="Post image">image:</label>
          <input type="file" 
          name="image" 
          =" @error('image') is invalide @enderror form-control"
          value="{{ isset($post)? $post->image : "" }}">
          <!---select example from bootstrap-------------->
          <div class="form-group">
            <label for="selectCategory">
              Select a Category
            </label>
              <select name="categoryID" 
              class="form-control" 
              id="selectCategory">
              @foreach ($categories as $category)
                  <option value="{{$category->id}}">
                    {{$category->name}}
                  </option>
              @endforeach
            </select>
          </div>
          @if (!$tags->count() < 1 )
          <div class="form-group">
            <label for="selectTag">
              Select a Tag
            </label>
              <select name="tags[]" 
              class="form-control" 
              id="selectTag"
              multiple>
              @foreach ($tags as $tag)
                  <option value="{{$tag->id}}" 
                  @if($post->hasTag($tag->id))
                  selected
                  @endif
                  >
                    {{$tag->name}}  
                  </option>
              @endforeach
            </select>
          </div>
          @endif
        @error('title')
      <div class="alert alert-danger" role="alert">
         {{ $message }}
      </div>
        @enderror
      </div>
      <button type="submit" 
      class="btn btn-success">
        {{ isset($post)? "Update" : "ADD" }}
      </button>
    </form>
  </div>
</div>
 @endsection