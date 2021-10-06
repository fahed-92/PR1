@extends('layouts.master')

@section('content')

@isset($candidate)
    @isset($electionprog)
    <div class="card text-center">
        <div class="card-header">
            <h2> Confirmation </h2>
        </div>
        <div class="card-body">
            <h4 class="card-title">you will give your vote to{{$candidate->first_name}} in program {{$electionprog->title}} </h4>
            <p class="card-text"> With supporting text below as a natural lead-in to additional content.</p>
{{--            <a href="#" class="btn btn-primary">Go somewhere</a>--}}
            <form method="POST" action="{{route('vote.store')}}"  enctype="multipart/form-data">
                @csrf
                    <input type="hidden" id="election_program_id" name="election_program_id" value="{{$electionprog->id}}">
                    <input type="hidden" id="user_id" name="user_id" value="{{Auth::user()->id}}">
                    <input type="hidden" id="candidate_id" name="candidate_id" value="{{$candidate->id}}">

                <div class="form-actions center">
                    <button type="button" class="btn btn-warning mr-1"
                            onclick="history.back();">
                        <i class="ft-x"></i> Cancel
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="la la-check-square-o"></i> Save
                    </button>
                </div>
            </form>
        </div>
        <div class="card-footer text-muted">
        </div>
    </div>
    @endisset
    @endisset

    @endsection
