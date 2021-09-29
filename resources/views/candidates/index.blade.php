@extends('layouts.master')

@section('content')
    @if(session()->has('error'))
        <div class="alert alert-danger">
            {{session()->get('error')}}
        </div>
    @endif


    <div class="clearfix">
        <a href="{{route('candidate.create')}}"
           class="btn float-right btn-success"
           style="margin-bottom:10px " >
            Add Candidates
        </a>
    </div>
    <div class="card card-default">
        <div class="card-header">
            all candidates
        </div>
        <div class="card-body">

            <table
                class="table display nowrap table-striped table-bordered scroll-horizontal">
                <thead class="">
                <tr>
                    <th>First Name </th>
                    <th>Last Name  </th>
                    <th>election_title </th>
                    <th>election_campaign</th>
                    <th>image</th>
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
                            {{ $candidate->email }}
                        </td>
                        <td>
                            {{ $candidate->election_title }}
                        </td>
                        <td>
                            {{ $candidate->image }}
                        </td>
                        <td>
                    </tr>
{{--                        <td>{{$category -> name}}</td>--}}
{{--                        <td>{{$category -> _parent  }}</td>--}}
{{--                        <td>{{$category -> slug}}</td>--}}
{{--                        <td>{{$category -> getActive()}}</td>--}}
{{--                        <td> <img style="width: 150px; height: 100px;" src=" "></td>--}}
{{--                        <td>--}}
{{--                            <div class="btn-group" role="group"--}}
{{--                                 aria-label="Basic example">--}}
{{--                                <a href="{{route('dashboard.subcategories.edit',$category -> id)}}"--}}
{{--                                   class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">تعديل</a>--}}


{{--                                <a href="{{route('dashboard.subcategories.delete',$category -> id)}}"--}}
{{--                                   class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">حذف</a>--}}



{{--                            </div>--}}
{{--                        </td>--}}
{{--                    </tr>--}}

{{--                            <form class="float-right ml-2"--}}
{{--                                  action="{{route('categories.destroy',$category->id)}}"--}}
{{--                                  method="POST">--}}
{{--                                @csrf--}}
{{--                                @method('DELETE')--}}
{{--                                <button class="btn btn-danger btn-sm">--}}
{{--                                    Delete--}}
{{--                                </button>--}}
{{--                            </form>--}}
{{--                            <a href="{{route('categories.edit',$category->id)}}"--}}
{{--                               class="btn btn-primary float-right btn-sm">--}}
{{--                                Edit--}}
{{--                            </a>--}}
                        </td>
                    </tr>
                @endforeach
                @endisset
                </tbody>
            </table>
        </div>
    </div>
@endsection
