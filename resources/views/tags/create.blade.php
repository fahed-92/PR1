@extends('layouts.app')

@section('content')

<div class="card card-default">
<div class="card-header">
{{isset($tag) ? "Update Tag" :"Add a new Tag" }}
</div>
<div class="card-body">
<form action="{{ isset( $tag ) ? route('tags.update',$tag->id) : route('tags.store') }}" method="POST">
@csrf
@if( isset( $tag ))
@method('PUT')
@endif
<div class="form-group" >
<label for="tag" >
tag Name
</label>
<input type="text"
value="{{ isset( $tag ) ? $tag->name : "" }} "
name="name"
calss="@error ('name') is-invalid @enderror " 
placeholder="add new tag"
class="form-control">
@error('name')
<div class="alert alert-danger">
{{$message}}
</div>
@enderror
</div>
<div class="form-group">
<button 
class="btn btn-success" >
{{isset( $tag ) ? "Update" :"Add" }}
 </button>
</div>
</form>
</div>
</div>
@endsection