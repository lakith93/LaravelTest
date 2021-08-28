@extends('layouts.app')

@section('content')
    <div class="container mt-5 d-flex justify-content-center">
        <div class="card w-75">
            <div>
                <x-alert/>
            </div>
            <div class="card-body">
                <form action="/invoice" method="POST">
                    @csrf

                    <div class="row mb-3">
                        <div class="col-md-8">
                            <h3 class="d-flex justify-content-center"> Add Invoice </h3>
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-success"> Generate Bulk Invoice </button>
{{--                            <a href="/invoice" class="btn btn-success">Generate Bulk Invoice</a>--}}
                        </div>
                    </div>


                    <table class="table table-striped mt-3">
                        <thead>
                        <tr>
                            <th></th>
                            <th>PO NO</th>
                            <th>Distributor</th>
                            <th>Date</th>
                            <th></th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($pos as $key=>$po)
                            <tr>
                                <td>
                                    @if($po->is_completed)
                                        <input type="checkbox" disabled>
                                    @else
                                        <input type="checkbox" name="po_id[]" value="{{ $po->id }}">
                                    @endif
                                </td>
                                <td>{{$po->po_number}}</td>
                                <td>{{$po->dis_name}}</td>
                                <td>{{$po->date}}</td>
                                <td>
                                    @if($po->is_completed)
                                        <i class="fas fa-check" style="color: green"></i></a>
                                    @else
                                        <a href="/invoice/store/{{$po->id}}"> <i
                                                class="fas fa-check" style="color: #a0aec0"></i> </a>
                                    @endif

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
@endsection
