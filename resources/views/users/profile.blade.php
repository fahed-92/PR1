@extends('layouts.app')

@section('content')

<div class="card card-default">
<div class="card-header">
Profile
</div>
<div class="card-body">
<form action="{{ route('users.update',$user->id) }}" method="POST">
@csrf

<div class="form-group" >
<label for="name" >
Name
</label>
<input type="text"
value="{{ $user->name }} "
name="name"
class="form-control">
</div>
<div class="form-group" >
<label for="email" >
Email
</label>
<input type="text"
value="{{ $user->email }} "
name="email"
class="form-control">
</div>
<div class="form-group" >
<label for="about" >
About
</label>
<input type="text"
value="{{ $user->about }} "
name="about"
class="form-control">
</div>
<div class="form-group" >
<label for="facebook" >
FaceBook
</label>
<input type="text"
value="{{ $user->facebook }} "
name="facebook"
class="form-control">
</div>
<div class="form-group" >
<label for="twitter" >
Twitter
</label>
<input type="text"
value="{{ $user->twitter }} "
name="twitter"
class="form-control">
</div>
<div class="form-group" >
<label for="twitter" >
Twitter
</label>
<textarea name="description" 
    rows="3" 
    class=" @error('description') is invalide @enderror form-control" 
    placeholder="put the description" >
    {{ isset($post)? $post->description : "" }}
</textarea>
</div>


<div class="form-group">
<button 
class="btn btn-success" >
Update Profile
</button>
</div>
</form>
</div>
</div>
@endsection