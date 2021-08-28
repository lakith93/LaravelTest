@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div>
            <x-alert/>
        </div>
        <div class="section d-flex justify-content-center ">
            @if(\Illuminate\Support\Facades\Auth::user()->is_admin)
                <div class="card text-center m-2" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Zone</h5>
                        <p class="card-text">About all Zone Details</p>
                        <a href="{{ route('zone.index') }}" class="btn btn-success">View More</a>
                    </div>
                </div>

                <div class="card text-center m-2" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Region</h5>
                        <p class="card-text">About all Region Details</p>
                        <a href="{{ route('region.index') }}" class="btn btn-success">View More</a>
                    </div>
                </div>

                <div class="card text-center m-2" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Territory</h5>
                        <p class="card-text">About all Territory Details</p>
                        <a href="{{ route('territory.index') }}" class="btn btn-success">View More</a>
                    </div>
                </div>

                <div class="card text-center m-2" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">SKU</h5>
                        <p class="card-text">About all SKU Details</p>
                        <a href="{{ route('sku.index') }}" class="btn btn-success">View More</a>
                    </div>
                </div>
                <div class="card text-center m-2" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Invoice</h5>
                        <p class="card-text">About all Invoice Details</p>
                        <a href="{{ route('invoice.index') }}" class="btn btn-success">View More</a>
                    </div>
                </div>
            @endauth
            <div class="card text-center m-2" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Add PO</h5>
                    <p class="card-text">About all PO Details</p>
                    <a href="{{ route('po.create') }}" class="btn btn-success">View More</a>
                </div>
            </div>
            <div class="card text-center m-2" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">View PO</h5>
                    <p class="card-text">About all PO Details</p>
                    <a href="{{ route('po.index') }}" class="btn btn-success">View More</a>
                </div>
            </div>

        </div>
    </div>
@endsection
