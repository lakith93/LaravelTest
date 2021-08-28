@extends('layouts.app')

@section('content')
    <div class="container mt-5 d-flex justify-content-center">
        <div class="card w-100">
            <div class="mt-3 d-flex justify-content-center">
                <x-alert/>
            </div>
            <div class="card-body">
                <div class="row mb-5 mt-2">
                    <h3 class="d-flex justify-content-center fw-bold"> ADD INDIVIDUAL PURCHASE ORDER </h3>
                </div>
                <form action="/po" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-md-1 text-end">
                            <label for="zone_id" class="form-label fw-bold">Zone</label>
                        </div>
                        <div class="col-md-2">
                            <select class="form-select" id="zone_id" name="zone_id"
                                    @error('zone_id') style="border-color: red" @enderror>
                                <option value="">Select</option>
                                @foreach($zoneCodes as $zone)
                                    <option value="{{ $zone->id }}">{{ $zone->code }}</option>
                                @endforeach
                            </select>
                            @error('zone_id')
                            <div class="mt-1 text-danger small">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="col-md-1 text-end">
                            <label for="region_id" class="form-label fw-bold">Region</label>
                        </div>
                        <div class="col-md-2">
                            <select class="form-select" id="region_id" name="region_id"
                                    @error('region_id') style="border-color: red" @enderror>
                                <option value="">Select</option>
                                @foreach($regionCodes as $region)
                                    <option value="{{ $region->id }}">{{ $region->code }}</option>
                                @endforeach
                            </select>
                            @error('region_id')
                            <div class="mt-1 text-danger small">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="col-md-1 text-end">
                            <label for="territory_id" class="form-label fw-bold">Territory</label>
                        </div>
                        <div class="col-md-2">
                            <select class="form-select" id="territory_id" name="territory_id"
                                    @error('territory_id') style="border-color: red" @enderror>
                                <option value="">Select</option>
                                @foreach($territoryCodes as $territory)
                                    <option value="{{ $territory->id }}">{{ $territory->code }}</option>
                                @endforeach
                            </select>
                            @error('territory_id')
                            <div class="mt-1 text-danger small">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="col-md-1 text-end">
                            <label for="distributor_id" class="form-label fw-bold">Distributor</label>
                        </div>
                        <div class="col-md-2">
                            <select class="form-select" id="distributor_id" name="distributor_id"
                                    @error('distributor_id') style="border-color: red" @enderror>
                                <option value="">Select</option>
                                @foreach($distributors as $distributor)
                                    <option value="{{ $distributor->id }}">{{ $distributor->name }}</option>
                                @endforeach
                            </select>
                            @error('distributor_id')
                            <div class="mt-1 text-danger small">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-1"></div>
                        <div class="col-md-1 text-end">
                            <label for="date" class="form-label fw-bold">Date</label>
                        </div>
                        <div class="col-md-2">
                            <input type="text" id="date" name="date" class="form-control"
                                   value="{{ \Carbon\Carbon::now()->isoFormat('YYYY-MM-DD') }}"
                                   style="background-color: #fff" readonly>
                            @error('date')
                            <div class="mt-1 text-danger small">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-1 text-end">
                            <label for="po_number" class="form-label fw-bold">PO No</label>
                        </div>
                        <div class="col-md-2">
                            <input type="text" id="po_number" name="po_number" class="form-control" value="{{ $poNumber }}"
                                   style="background-color: #fff" readonly>
                            <div id="poTest"></div>
                            @error('po_number')
                            <div class="mt-1 text-danger small">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-1 text-end">
                            <label for="remark" class="form-label fw-bold">Remark</label>
                        </div>
                        <div class="col-md-2">
                            <input type="text" id="remark" name="remark" class="form-control">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <table class="table table-bordered mt-5 text-center">
                                <thead>
                                <tr style="background-color: #289f2c">
                                    <th>SKU CODE</th>
                                    <th>SKU NAME</th>
                                    <th>UNIT PRICE</th>
                                    <th>AVB QTY</th>
                                    <th>UNITS</th>
                                    <th>TOTAL PRICE</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($skus as $key=>$sku)
                                    <tr>
                                        <input type="hidden" id="id" value="{{$key + 1}}">
                                        <td><input type="text" id="code{{$key + 1}}" name="code{{$key + 1}}"
                                                   class="form-control" size="4" value="{{$sku->code}}" readonly
                                                   style="background-color: #fff; border-color: #fff; text-align: center">
                                        </td>
                                        <td><input type="text" id="sku_code{{$key + 1}}" name="sku_code{{$key + 1}}"
                                                   class="form-control" size="4" value="{{$sku->name}}" readonly
                                                   style="background-color: #fff; border-color: #fff; text-align: center">
                                        </td>
                                        <td><input type="text" id="dis_price{{$key + 1}}" name="dis_price{{$key + 1}}"
                                                   class="form-control" size="4" value="{{$sku->dis_price}}" readonly
                                                   style="background-color: #fff; border-color: #fff; text-align: center">
                                        </td>
                                        <td><input type="text" id="volume{{$key + 1}}" name="volume{{$key + 1}}"
                                                   class="form-control" size="4" value="{{$sku->volume}}" readonly
                                                   style="background-color: #fff; border-color: #fff; text-align: center">
                                        </td>
                                        <td><input type="text" id="units{{$key + 1}}" name="units{{$key + 1}}"
                                                   class="form-control" size="4" onkeyup="calculate({{$key + 1}})"></td>
                                        <td><input type="text" id="total{{$key + 1}}" name="total{{$key + 1}}"
                                                   class="form-control" size="4" readonly
                                                   style="background-color: #fff; border-color: #fff; text-align: center">
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-4"></div>
                        <div class="col-md-4 d-flex justify-content-center">
                            <button type="submit" class="btn btn-success">ADD PO</button>
                        </div>
                        <div class="col-md-4"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

{{ csrf_field() }}
<script src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script>
    function calculate(id) {
        var availableQty = $('#volume' + id).val();
        var units = $('#units' + id).val();

        if (availableQty < units) {
            $('#total' + id).val("")
            alert("Requested Quantity is higher than Available Quantity");
        } else {
            var total = $('#dis_price' + id).val() * $('#units' + id).val();
            $('#total' + id).val(total);
        }

        if (total === 0) {
            $('#total' + id).val("")
        }
    }

    $(document).ready(function () {

    });
</script>
