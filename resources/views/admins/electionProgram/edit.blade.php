@extends('admins.layouts.admin')
@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">Main Dashboard </a>
                                </li>
                                <li class="breadcrumb-item"><a href=""> Election Programs </a>
                                </li>
                                <li class="breadcrumb-item active">Edit Program
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
                                    <h4 class="card-title" id="basic-layout-form"> Old Information </h4>
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
                                        <form class="form"
                                              action=" {{ route('admin.electionprog.update',$electionprog -> id) }} "
                                              method="post"
                                              enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-body">
                                                <h4 class="form-section"><i class="ft-home"></i> General Information </h4>

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> Title   </label>
                                                            <input type="text"
                                                                   value="{{$electionprog -> title}}" id="title"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   name="title">
                                                            @error("")
                                                            <span class="text-danger"> this field required</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="description"> Description   </label>
                                                            <input type="text" value="{{$electionprog -> description}}" id="description"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   name="description">
                                                            @error("")
                                                            <span class="text-danger"> this field required</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="start_date"> Start Date   </label>
                                                            <input type="text"
                                                                   value="{{$electionprog -> start_date}}" id="start_date"
                                                                   class="form-control"
                                                                   placeholder=" yyyy-mm-dd "
                                                                   name="start_date">
                                                            @error("")
                                                            <span class="text-danger"> this field required</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="end_date"> End Date   </label>
                                                            <input type="text"
                                                                   value="{{$electionprog -> end_date}}" id="end_date"
                                                                   class="form-control"
                                                                   placeholder=" yyyy-mm-dd "
                                                                   name="end_date">
                                                            @error("")
                                                            <span class="text-danger"> this field required</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                </div>
                                            <div class="form-actions center">
                                                <button type="button" class="btn btn-warning mr-1"
                                                        onclick="history.back();">
                                                    <i class="ft-x"></i> Cancel
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i> Update
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

@endsection
