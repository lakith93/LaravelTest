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
                        <h3 class="d-flex justify-content-center"> Region </h3>
                    </div>
                    <div class="col-md-3">
                        <a href="{{ route('region.create') }}" class="btn btn-success">Add Region</a>
                    </div>
                </div>
                <table class="table table-striped mt-3">
                    <thead>
                    <tr>
                        <th>Zone</th>
                        <th>Region Code</th>
                        <th>Region Name</th>
                        <th></th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($regions as $region)
                        <tr>
                            <td>{{$region->zone_id}}</td>
                            <td>{{$region->code}}</td>
                            <td>{{$region->name}}</td>
                            <td><a href="/region/{{$region->id}}/edit"><i class="fas fa-edit"></i></a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
