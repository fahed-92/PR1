@extends('layouts.master')

@section('content')

    @if(session()->has('error'))
        <div class="alert alert-danger">
            {{session()->get('error')}}
        </div>
    @endif


    @isset($candidate)


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
                         src="{{ asset('dashboard/assets/images/candidates/' . $candidate -> image) }}" alt="Card image cap">
                    <div class="card-body">
                        <h3 class="card-title">first_name: {{$candidate->first_name}}</h3>
                        <h3 class="card-title">last_name: {{$candidate->last_name}}</h3>
                        <h3 class="card-title">father_name: {{$candidate->father_name}}</h3>
                        <h3 class="card-title">mother_name: {{$candidate->mother_name}}</h3>
                        <h3 class="card-title">age {{$candidate->age}}</h3>
                        <h3 class="card-title">nationality: {{$candidate->nationality}}</h3>
                        <h3 class="card-text">description: {{$candidate->description}}</h3>
                        <h3 class="card-text">election_campaign: {{$candidate->election_campaign}}</h3>
                        <h3 class="card-text">governorate: {{$candidate->governorate}}</h3>
                        <a href="{{route('candidates.show',$candidate->id)}}" class="btn btn-primary">Return</a>
                        <a href="{{route('candidate.vote',$candidate->id)}}" class="btn btn-primary">Give My Vote</a>
                    </div>
                </div>
            </div>

        </div>





    @endisset



@endsection
