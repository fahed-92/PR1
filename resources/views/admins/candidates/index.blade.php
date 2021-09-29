@extends('admins.layouts.admin')

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title"> Candidate </h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Main Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active">Candidates
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- DOM - jQuery events table -->
                <section id="dom">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">All Candidates </h4>
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
                                    <div class="card-body card-dashboard">
                                        <table
                                            class="table display nowrap table-striped table-bordered scroll-horizontal">
                                            <thead class="">
                                            <tr>
                                                <th>First Name </th>
                                                <th>Last Name  </th>
                                                <th>Election Title </th>
                                                <th>Image</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @isset($candidates)
                                                @foreach($candidates as $candidate)
                                                    <tr>
                                                      <td>
                                                            {{ $candidate->first_name }}
                                                        </td>
                                                        <td>
                                                            {{ $candidate->last_name }}
                                                        </td>
                                                        <td>
                                                            {{ $candidate->election_title }}
                                                        </td>
                                                        <td>
                                                            {{ $candidate->image }}
                                                        </td>
                                                        <td>
                                                            <div class="btn-group" role="group"
                                                                 aria-label="Basic example">
                                                                <a href="{{route('admin.candidate.edit',$candidate -> id)}}"
                                                                   class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">Edit</a>

                                                                <form action="{{route('admin.candidate.delete',  $candidate->id)}}" method="POST">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                    <button class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1 submit"
                                                                            type="submit" onclick="return confirm('Are you sure you want to delete this post?')">
                                                                        Delete
                                                                    </button>
                                                                </form>

                                                                <form action="{{route('admin.candidate.status', $candidate->id)}}" method="POST">
                                                                    @method('PUT')
                                                                    @csrf
                                                                    <button class="btn btn-outline-warning btn-min-width box-shadow-3 mr-1 mb-1"
                                                                            type="submit" onclick="return confirm('Are you sure you want to non activat this program')">
                                                                        @if($candidate -> active == 0)
                                                                            Activation
                                                                        @else
                                                                            Non Activation
                                                                        @endif
                                                                    </button>
                                                                </form>
                                                            </div>
                                                            >
                                                        </td>

                                                        <td>
                                                    </tr>
                                                    </tr>
                                                @endforeach
                                            @endisset
                                            </tbody>
                                        </table>
                                        <div class="justify-content-center d-flex">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
