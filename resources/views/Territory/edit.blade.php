@extends('layouts.app')

@section('content')
    <div class="container mt-5 d-flex justify-content-center">
        <div class="card w-50">
            <div class="card-body">
                <div class="row d-flex justify-content-center">
                    <h3 class="d-flex justify-content-center"> Update Territory </h3>
                </div>

                <form method="POST" action="/territory/{{$territory->id}}">
                    @csrf
                    @method('put')
                    <div class="row mb-3 mt-3">
                        <div class="col-md-5 text-end">
                            <label for="zone_id" class="form-label fw-bold">Zone</label>
                            @error('zone_id')
                            <div class="mt-1 text-danger small">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-7">
                            <select class="form-select" aria-label="Default select example" id="zone_id" name="zone_id">
                                @foreach($zoneCodes as $zone)
                                    <option value="{{ $zone->id }}">{{ $zone->code }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3 mt-3">
                        <div class="col-md-5 text-end">
                            <label for="zone_id" class="form-label fw-bold">Region</label>
                            @error('region_id')
                            <div class="mt-1 text-danger small">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-7">
                            <select class="form-select" aria-label="Default select example" id="region_id" name="region_id">
                                @foreach($regionCodes as $region)
                                    <option value="{{ $region->id }}">{{ $region->code }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-5 text-end">
                            <label for="code" class="form-label fw-bold">Territory Code</label>
                            @error('code')
                            <div class="mt-1 text-danger small">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-7">
                            <input type="text" id="code" name="code" class="form-control"
                                   @error('code') style="border-color: red"
                                   @enderror value="{{ $territory->code }}" readonly>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-5 text-end">
                            <label for="name" class="form-label fw-bold">Territory Name</label>
                            @error('name')
                            <div class="mt-1 text-danger small">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-7">
                            <input type="text" id="name" name="name" class="form-control"
                                   @error('name') style="border-color: red" @enderror value="{{ $territory->name }}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-5 text-end"></div>
                        <div class="col-md-7">
                            <button type="submit" class="btn btn-success mt-2">Update</button>
                        </div>
                    </div>
                </form>


            </div>
        </div>
    </div>
@endsection
