@extends('layouts.master')

@section('content')

    <div class="d-flex justify-content-center">

    <div class="card text-center" style="width: 75%;">
        <div class="card-body">

            <div class="app-content content">
                <div class="content-wrapper">
                    <div class="content-header row">
                        <div class="content-header-left col-md-6 col-12 mb-2">
                            <div class="row breadcrumbs-top">
                                <div class="breadcrumb-wrapper col-12">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="">Candidacy Request </a>
                                        </li>
                                        <li class="breadcrumb-item"><a href=""> Candidates </a>
                                        </li>
                                        <li class="breadcrumb-item active">Request Information
                                        </li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="content-body">
                        <!-- Basic form layout section start -->
                        <section id="basic-form-layouts">
                            <div class="row match-height">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title" id="basic-layout-form"> Candidate's Information </h4>
                                            <a class="heading-elements-toggle"><i
                                                    class="la la-ellipsis-v font-medium-3"></i></a>
                                            <div class="heading-elements">
                                                <ul class="list-inline mb-0">
                                                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                                    <li><a data-action="close"><i class="ft-x"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        @include('admins.includes.alerts.success')
                                        @include('admins.includes.alerts.errors')
                                        <div class="card-content collapse show">
                                            <div class="card-body">
                                                <form method="POST" action="{{route('candidates.store')}}"  enctype="multipart/form-data">
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



                                                                @isset($electionprogs)
                                                                    <input type="hidden" id="election_title" name="election_title" value="{{$electionprogs->id}}">
                                                                @endisset
                                                    <div class="mb-3">
                                                        <label for="election-campaign" class="form-label">election-campaign</label>
                                                        <input type="text" class="form-control" id="election-campaign" name="election_campaign">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="governorate" class="form-label">Governorate</label>
                                                        <select class="form-select" aria-label="governorate" name="governorate">
                                                            <option selected>Select Governorate</option>
                                                            <option value="Damascus">Damascus</option>
                                                            <option value="Aleppo">Aleppo</option>
                                                            <option value="Hamaa">Hamaa</option>
                                                            <option value="Homs">Homs</option>
                                                            <option value="Al-Sweida">Al-Sweida</option>
                                                            <option value="Daraa">Daraa</option>
                                                            <option value="Lattakia">Lattakia</option>
                                                            <option value="Tarrtous">Tarrtous</option>
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
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- // Basic form layout section end -->
                    </div>
                </div>
            </div>

        </div>
    </div>

    </div>


@endsection
