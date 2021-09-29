@extends('layouts.master')

@section('content')

    @if(session()->has('error'))
        <div class="alert alert-danger">
            {{session()->get('error')}}
        </div>
    @endif


        @isset($electionprogs)
            @foreach($electionprogs as $electionprog)

                <div class="d-flex justify-content-center">
                <div class="col-sm-6">
                    <div class="row"></div>
                    <div class="divider-custom">
                        <div class="divider-custom-line"></div>
                        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                        <div class="divider-custom-line"></div>
                    </div>
                    <div class="card text-center border-dark mb-1">
                        <img class="card-img-top"
                             src="{{URL::asset('site/assets/img/sy.PNG')}}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">{{$electionprog->title}}</h5>
                            <p class="card-text">End Date({{$electionprog->end_date}})</p>
                            <a href="{{route('elctionprog.show',$electionprog->id)}}" class="btn btn-primary">Show Details</a>
                        </div>
                    </div>
                </div>

                </div>
            @endforeach
        @endisset



@endsection
