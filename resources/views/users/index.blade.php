@extends('layouts.app')

@section('content')
@if (session()->has('error'))
    <div class="alert alert-danger">
        {{ session()->get('error') }}
    </div>
@endif



<div class="card card-default">
    <div class="card-header">
            all Users
        </div>
        <div class="card-body">
            @if ($users->count() > 0)
                <table class="table">
                    <thead >
                        <tr>
                            <th>Image</th>
                            <th>usernamer</th>
                            <th>permissions</th>
                        <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>
                                   <!-- <img src="{{ asset('storage/'.$user->image) }}"
                                    width="100px"
                                    height="50px">-->
                                   <!-- <img src="{{$user->getGravatar()}}"
                                        style= "borfer-redius:50% "
                                        width="60px"
                                        height="60px" >  -->                              </td>
                                <td>
                                    {{ $user->name }}
                                </td>
                                <td>
                                @if(!$user->isAdmin())
                                    <form
                                    action="{{route('users.make-dashboard', $user)}}"
                                    method="post">
                                    @csrf
                                        <button
                                            class="btn btn-success"
                                            type="submit">
                                                Make Admin
                                            </button>
                                    </form>
                                    @else
                                    {{$user->role}}
                                @endif
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <div class="card-body">
                    <h1 class="text-center">
                    No Users Yet
                    </h1>
                </div>
            @endif
        </div>
    </div>
@endsection
