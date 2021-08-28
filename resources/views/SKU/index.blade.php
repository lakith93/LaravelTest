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
                        <h3 class="d-flex justify-content-center"> SKU </h3>
                    </div>
                    <div class="col-md-3">
                        <a href="{{ route('sku.create') }}" class="btn btn-success">Add SKU</a>
                    </div>
                </div>
                <table class="table table-striped mt-3">
                    <thead>
                    <tr>
                        <th>SKU Code</th>
                        <th>SKU Name</th>
                        <th>MPR</th>
                        <th>Distributor Price</th>
                        <th>Weight/Volume</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($skus as $sku)
                        <tr>
                            <td>{{$sku->code}}</td>
                            <td>{{$sku->name}}</td>
                            <td>{{$sku->mrp}}</td>
                            <td>{{$sku->dis_price}}</td>
                            <td>{{$sku->weight}} / {{$sku->volume}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
