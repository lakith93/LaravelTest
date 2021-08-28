@extends('layouts.app')

@section('content')
    <div class="container mt-5 d-flex justify-content-center">
        <div class="card w-75">
            <div>
                <x-alert/>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-9">
                        <h3 class="d-flex justify-content-center"> Zone </h3>
                    </div>
                    <div class="col-md-3">
                        <a href="{{ route('zone.create') }}" class="btn btn-success">Add Zone</a>
                    </div>
                </div>
                <table class="table table-striped mt-3">
                    <thead>
                    <tr>
                        <th>Zone Code</th>
                        <th>Zone Long Description</th>
                        <th>Short Description</th>
                        <th></th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($zones as $zone)
                        <tr>
                            <td>{{$zone->code}}</td>
                            <td>{{$zone->long_des}}</td>
                            <td>{{$zone->short_des}}</td>
                            <td><a href="/zone/{{$zone->id}}/edit"><i class="fas fa-edit"></i></a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
