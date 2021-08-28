@extends('layouts.app')

@section('content')
    <div class="container mt-5 d-flex justify-content-center">
        <div class="card w-100">
            <div class="card-body">
                <div class="row mb-5 mt-2">
                    <h3 class="d-flex justify-content-center fw-bold"> PURCHASE ORDER VIEW </h3>
                </div>
{{--                <form action="poo" method="POST">--}}
{{--                    @csrf--}}
                    <div class="row">
                        <div class="col-md-2"></div>
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
                            <label for="po_number" class="form-label fw-bold">PO NO</label>
                        </div>
                        <div class="col-md-2">
                            <input type="text" id="po_number" name="po_number" class="form-control"
                                   @error('po_number') style="border-color: red" @enderror >
                            @error('po_number')
                            <div class="mt-1 text-danger small">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-3"></div>
                        <div class="col-md-1 text-end">
                            <label for="territory_id" class="form-label fw-bold">FROM</label>
                        </div>
                        <div class="col-md-2">
                            <input type="date" id="from_date" name="from_date" class="form-control"
                                   @error('from_date') style="border-color: red" @enderror>
                            @error('from_date')
                            <div class="mt-1 text-danger small">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="col-md-1 text-end">
                            <label for="territory_id" class="form-label fw-bold">TO</label>
                        </div>
                        <div class="col-md-2">
                            <input type="date" id="to_date" name="to_date" class="form-control"
                                   @error('to_date') style="border-color: red" @enderror>
                            @error('to_date')
                            <div class="mt-1 text-danger small">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>


                    <div class="row mt-2">
                        <div class="col-md-4"></div>
                        <div class="col-md-4 d-flex justify-content-center">
{{--                            <button type="submit" class="btn btn-success mt-2" id="BtnSearch">Search</button>--}}
                            <button class="btn btn-success mt-2" id="BtnSearch">Search</button>
                        </div>
                        <div class="col-md-4"></div>
                    </div>

                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <table class="table table-bordered mt-5 text-center" id="poDetailsTable">
                                <thead>
                                <tr style="background-color: #289f2c">
                                    <th>REGION</th>
                                    <th>TERRITORY</th>
                                    <th>DISTRIBUTOR</th>
                                    <th>PO NUMBER</th>
                                    <th>DATE</th>
                                    <th>TIME</th>
                                    <th>TOTAL AMOUNT</th>
                                    <th>VIEW PO</th>
                                </tr>
                                </thead>

                                <tbody>

{{--                                @if(!$pos)--}}
{{--                                @else--}}
{{--                                    @foreach($pos as $po)--}}
{{--                                        <tr>--}}
{{--                                            <td>{{$po->region_code}}</td>--}}
{{--                                            <td>{{$po->territory_code}}</td>--}}
{{--                                            <td>{{$po->name}}</td>--}}
{{--                                            <td>{{$po->po_number}}</td>--}}
{{--                                            <td>{{$po->date}}</td>--}}
{{--                                            <td>{{$po->date}}</td>--}}
{{--                                            <td>{{$po->date}}</td>--}}
{{--                                            <td><a href="#"><i class="fas fa-edit"></i></a></td>--}}
{{--                                        </tr>--}}
{{--                                    @endforeach--}}
{{--                                @endif--}}
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-1"></div>
                    </div>
{{--                </form>--}}
            </div>
        </div>
    </div>
@endsection


{{ csrf_field() }}
<script src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script>

    function poNumber() {
        // var poNumber = $('#po_number').val();
        $.ajax({
            url: "/po-number/" + $('#po_number').val(),
            type: "GET",
            // dataType: 'json',
            success: function (response) {
                $('#poTest').val(response[0].po_number);
                // alert(response)
                console.log(response[0].po_number)
            },
            error: function (response) {
                alert(response);
            }
        });

    }
    $(document).ready(function () {
        $('#BtnSearch').on('click', function (event) {
            $.ajax({
                url: "/poo",
                type: "POST",
                dataType: 'json',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "region_id": $('#region_id').val(),
                    "territory_id": $('#territory_id').val(),
                    "po_number": $('#po_number').val(),
                    "from_date": $('#from_date').val(),
                    "to_date": $('#to_date').val(),
                },
                success: function (response) {
                    // alert(response[0].region_code)
                    // alert(response.length)
                    console.log(response)
                    let len = 0;
                    $('#poDetailsTable tbody').empty(); // Empty <tbody>
                    if (response != null) {
                        len = response.length;
                    }
                    if (len > 0) {
                        for (var i = 0; i < len; i++) {
                            var regionCode = response[i].region_code;
                            var territory_code = response[i].territory_code;
                            var name = response[i].name;
                            var po_number = response[i].po_number;
                            var date = response[i].date;
                            var total = response[i].total;
                            var tr_str = "<tr>" +
                                "<td align='center'>" + regionCode + "</td>" +
                                "<td align='center'>" + territory_code + "</td>" +
                                "<td align='center'>" + name + "</td>" +
                                "<td align='center'>" + po_number + "</td>" +
                                "<td align='center'>" + date + "</td>" +
                                "<td align='center'>" + date + "</td>" +
                                "<td align='center'>" + total + "</td>" +
                                "<td align='center'>" +  "<a href='/po/excel/" + po_number +"'> <button type='submit'><i class='fas fa-edit'></i></button> </a>" + "</td>" +
                                "</tr>";
                            $("#poDetailsTable tbody").append(tr_str);
                        }
                    } else {
                        var tr_str = "<tr>" +
                            "<td align='center' colspan='8'>No record found.</td>" +
                            "</tr>";
                        $("#poDetailsTable tbody").append(tr_str);
                    }
                },
                error: function (response) {
                    alert(response);
                }
            });
        });
    });
</script>

