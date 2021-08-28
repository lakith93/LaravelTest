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
                        <h3 class="d-flex justify-content-center"> Invoice </h3>
                    </div>
                    <div class="col-md-3">
                        <a href="{{ route('invoice.create') }}" class="btn btn-success">Create Invoice</a>
                    </div>
                </div>
                <table class="table table-striped mt-3">
                    <thead>
                    <tr>
                        <th>Distributor</th>
                        <th>Invoice NO</th>
                        <th>PO NO</th>
                        <th>Date</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($invoices as $invoice)
                        <tr>
                            <td>{{$invoice->dis_name}}</td>
                            <td>{{$invoice->in_number}}</td>
                            <td>{{$invoice->po_number}}</td>
                            <td>{{$invoice->date}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
