@extends('layouts.master')

@section('content')

    @if(session()->has('error'))
        <div class="alert alert-danger">
            {{session()->get('error')}}
        </div>
    @endif


    @isset($electionprog)


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
                        <h1 class="card-title">{{$electionprog->title}}</h1>
                        <p class="card-text">{{$electionprog->description}}</p>
                        <h3 class="card-text">START DATE({{$electionprog->start_date}})</h3>
                        <h3 class="card-text">END DATE({{$electionprog->end_date}})</h3>
                        <a href="{{route('candidates.get',$electionprog->id)}}" class="btn btn-primary">Candidates</a>
                        <a href="{{route('candidates.create',$electionprog->id)}}" class="btn btn-primary">candidacy request</a>
                    </div>
                </div>
            </div>

        </div>





    @endisset



@endsection
