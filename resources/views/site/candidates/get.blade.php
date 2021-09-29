@extends('layouts.master')

@section('content')

    @if(session()->has('error'))
        <div class="alert alert-danger">
            {{session()->get('error')}}
        </div>
    @endif

    @isset($canidates)

        @foreach($canidates as $canidate)

        <div class="d-flex justify-content-center">
            <div class="col-sm-6">
                <div class="row"></div>
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <div class="card text-center border-dark mb-1" size="20">
                    <img class="card-img-top"
                         src="{{ asset('dashboard/assets/images/candidates/' . $canidate -> image) }}" alt="Card image cap">
                    <div class="card-body">
                        <h1 class="card-title">{{$canidate->first_name}}</h1>
                        <p class="card-text">{{$canidate->last_name}}</p>
                        <h3 class="card-text">{{$canidate->father_name}}</h3>
                        <h3 class="card-text">{{$canidate->mother_name}}</h3>
                        <a href="{{route('candidates.show',$canidate->id)}}" class="btn btn-primary">Details</a>
                    </div>
                </div>
            </div>

        </div>

@endforeach
    @endisset

@endsection
