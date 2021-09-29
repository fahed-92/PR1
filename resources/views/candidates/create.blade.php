@extends('layouts.master')

@section('content')

    <div class="card card-default">
        <div class="card-header">
            Add a new candidate
        </div>
        <div class="card-body">

            <div class="card border-dark mb-3" style="max-width: 18rem;">
                <div class="card-header">General Information</div>
                <div class="card-body text-dark">
                    <form method="POST" action="{{route('candidate.store')}}">
                        @csrf
                        <div class="mb-3">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="first_name" name="first_name">
                        </div>
                        <div class="mb-3">
                            <label for="last-name" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="last-name" name="last_name">
                        </div>
                        <div class="mb-3">
                            <label for="father-name" class="form-label">Father Name</label>
                            <input type="text" class="form-control" id="father-name" name="father_name">
                        </div>
                        <div class="mb-3">
                            <label for="mother-name" class="form-label">Mother Name</label>
                            <input type="text" class="form-control" id="mother-name" name="mother_name">
                        </div>
                        <div class="mb-3">
                            <label for="age" class="form-label">Age</label>
                            <input type="text" class="form-control" id="age" name="age">
                        </div>
{{--                        <div class="mb-3">--}}
{{--                            <label for="election_program_id" class="form-label">Election Program</label>--}}
{{--                            <select name="parent_id" class="select2 form-control">--}}
{{--                                <optgroup label="من فضلك أختر القسم ">--}}
{{--                                    @if($election_programs && $election_programs -> count() > 0)--}}
{{--                                        @foreach($election_programs as $election_program)--}}
{{--                                            <option--}}
{{--                                                value="{{$election_program -> id }}">{{$election_program -> name}}</option>--}}
{{--                                        @endforeach--}}
{{--                                    @endif--}}
{{--                                </optgroup>--}}
{{--                            </select>--}}
{{--                        </div>--}}
                        <div class="mb-3">
                            <label for="n-number" class="form-label">National Number</label>
                            <input type="text" class="form-control" id="n-number" name="n_number">
                        </div>
                        <div class="mb-3">
                            <label for="nationality" class="form-label">Nationality</label>
                            <input type="text" class="form-control" id="nationality" name="nationality">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">description</label>
                            <input type="text" class="form-control" id="description" name="description">
                        </div>
                        <div class="mb-3">
                            <label for="election-title" class="form-label">Election Title</label>
                            <input type="text" class="form-control" id="election-title" name="election_title">
                        </div>
                        <div class="mb-3">
                            <label for="election-campaign" class="form-label">election-campaign</label>
                            <input type="text" class="form-control" id="election-campaign" name="election_campaign">
                        </div>
                        <div class="mb-3">
                            <label for="governorate" class="form-label">Governorate</label>
                            <select class="form-select" aria-label="governorate" name="governorate">
                                <option selected>Select Governorate</option>
                                <option value="1">Damascus</option>
                                <option value="2">Aleppo</option>
                                <option value="3">Hamaa</option>
                                <option value="4">Homs</option>
                                <option value="5">Al-Sweida</option>
                                <option value="6">Daraa</option>
                                <option value="7">Lattakia</option>
                                <option value="8">Tarrtous</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label" >image</label>
                            <input class="form-control" type="file" id="image" name="image">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label" >Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control" id="Password" name="password">
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
