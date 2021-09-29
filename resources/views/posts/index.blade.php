@extends('layouts.app')

@section('content')
@if (session()->has('error'))
    <div class="alert alert-danger">
        {{ session()->get('error') }}
    </div>
@endif

<div class="clearfix">
<a href="{{route('posts.create')}}" 
class="btn float-right btn-success" 
style="margin-bottom:10px " >
Add post
</a>
</div>


<div class="card card-default">
    <div class="card-header">
            all posts
        </div>
        <div class="card-body">
            @if ($posts->count() > 0)
                <table class="table">
                    <thead >
                        <tr>
                            <th>Image</th>
                            <th>Title</Title></th>
                            <th>actoins</th>
                        <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td>
                                    <img src="{{ asset('storage/'.$post->image) }}" 
                                    width="100px" 
                                    height="50px">
                                </td>
                                <td>
                                    {{ $post->title }} 
                                </td>
                                <td>
                                    <form class="float-right ml-2" 
                                        action="{{route('posts.destroy',$post->id)}}" 
                                        method="POST">
                                            @csrf
                                            @method('DELETE')
                                    <button class="btn btn-danger btn-sm">
                                        {{$post->trashed() ? 'Delete' : " Trashed " }}
                                    </button>
                                    </form>
                                        @if(!$post->trashed())
                                    <a href="{{route('posts.edit',$post->id)}}"
                                        class="btn btn-primary float-right btn-sm">
                                        Edit
                                    </a>
                                    @else
                                    <a href="{{route('trashed.restore', $post->id)}}"
                                        class="btn btn-primary float-right btn-sm">
                                        Restore
                                    </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach 
                    </tbody>
                </table>
                @else
                <div class="card-body">
                    <h1 class="text-center">
                    No Posts Yet
                    </h1>
                </div>  
            @endif
        </div>
    </div>
@endsection