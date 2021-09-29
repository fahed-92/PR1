@extends('admins.layouts.admin')

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
                         src="{{URL::asset('site/assets/img/sy.PNG')}}" alt="Card image cap">
                    <div class="card-body">
                        <h3 class="card-title">First_name: {{$candidate->first_name}}</h3>
                        <h3 class="card-title">Last_name: {{$candidate->last_name}}</h3>
                        <h3 class="card-title">Father_name: {{$candidate->father_name}}</h3>
                        <h3 class="card-title">Mother_name: {{$candidate->mother_name}}</h3>
                        <h3 class="card-title">Age {{$candidate->age}}</h3>
                        <h3 class="card-title">Nationality: {{$candidate->nationality}}</h3>
                        <h3 class="card-text">Description: {{$candidate->description}}</h3>
                        <h3 class="card-text">Election_campaign: {{$candidate->election_campaign}}</h3>
                        <h3 class="card-text">Governorate: {{$candidate->governorate}}</h3>
                        <form action="{{route('admin.candidate.approved',  $candidate->id)}}" method="POST">
                            @method('put')
                            @csrf
                            <button class="btn btn-outline-warning btn-min-width box-shadow-3 mr-1 mb-1"
                                    type="submit" onclick="return confirm('Are you sure you want to approve this candidate')">
                                Aprrove
                            </button>
                        </form>
                </div>
                </div>
            </div>

        </div>





    @endisset



@endsection
