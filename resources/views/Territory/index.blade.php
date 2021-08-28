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
                        <h3 class="d-flex justify-content-center"> Territory </h3>
                    </div>
                    <div class="col-md-3">
                        <a href="{{ route('territory.create') }}" class="btn btn-success">Add Territory</a>
                    </div>
                </div>
                <table class="table table-striped mt-3">
                    <thead>
                    <tr>
                        <th>Zone</th>
                        <th>Region</th>
                        <th>Territory Code</th>
                        <th>Territory Name</th>
                        <th></th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($territories as $territory)
                        <tr>
                            <td>{{$territory->zone_id}}</td>
                            <td>{{$territory->region_id}}</td>
                            <td>{{$territory->code}}</td>
                            <td>{{$territory->name}}</td>
                            <td><a href="/territory/{{$territory->id}}/edit"><i class="fas fa-edit"></i></a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
