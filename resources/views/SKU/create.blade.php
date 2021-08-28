@extends('layouts.app')

@section('content')
    <div class="container mt-5 d-flex justify-content-center">
        <div class="card w-50">
            <div class="card-body">
                <div class="row d-flex justify-content-center">
                    <h3 class="d-flex justify-content-center"> Add SKU </h3>
                </div>

                <form method="POST" action="/sku">
                    @csrf
                    <div class="row mb-3 mt-3">
                        <div class="col-md-5 text-end">
                            <label for="sku_id" class="form-label fw-bold">SKU ID</label>
                            @error('sku_id')
                            <div class="mt-1 text-danger small">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-7">
                            <input type="text" id="sku_id" name="sku_id" class="form-control"
                                   @error('sku_id') style="border-color: red" @enderror value="{{ $id }}" readonly>
                        </div>
                    </div>

                    <div class="row mb-3 mt-3">
                        <div class="col-md-5 text-end">
                            <label for="code" class="form-label fw-bold">SKU Code <span class="text-danger small"> * </span></label>
                            @error('code')
                            <div class="mt-1 text-danger small text-end">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-7">
                            <input type="text" id="code" name="code" class="form-control"
                                   @error('code') style="border-color: red" @enderror value="{{ old('code') }}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-5 text-end">
                            <label for="name" class="form-label fw-bold">SKU Name <span class="text-danger small"> * </span></label>
                            @error('name')
                            <div class="text-danger small">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-7">
                            <input type="text" id="name" name="name" class="form-control"
                                   @error('name') style="border-color: red"
                                   @enderror value="{{ old('name') }}">
                        </div>
                    </div>


                    <div class="row mb-3">
                        <div class="col-md-5 text-end">
                            <label for="mrp" class="form-label fw-bold">MRP <span class="text-danger small"> * </span></label>
                            @error('mrp')
                            <div class="text-danger small text-end">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-7">
                            <input type="text" id="mrp" name="mrp" class="form-control"
                                   @error('mrp') style="border-color: red"
                                   @enderror value="{{ old('mrp') }}">
                        </div>
                    </div>


                    <div class="row mb-3">
                        <div class="col-md-5 text-end">
                            <label for="dis_price" class="form-label fw-bold">Distributor Price <span class="text-danger small"> * </span></label>
                            @error('dis_price')
                            <div class="text-danger small">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-7">
                            <input type="text" id="dis_price" name="dis_price" class="form-control"
                                   @error('dis_price') style="border-color: red"
                                   @enderror value="{{ old('dis_price') }}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-5 text-end">
                            <label class="form-label fw-bold">Weight/Volume <span class="text-danger small"> * </span></label>
                            @error('weight')
                            <div class="text-danger small">
                                {{ $message }}
                            </div>
                            @enderror
                            @error('volume')
                            <div class="text-danger small">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <input type="text" id="weight" name="weight" class="form-control"
                                   @error('weight') style="border-color: red"
                                   @enderror value="{{ old('weight') }}">
                        </div>
                        <div class="col-md-3">
                            <select class="form-select" id="volume" name="volume">
                                @foreach(range(1, 20) as $volume)
                                    <option value="{{ $volume }}">{{ $volume }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="row mb-3">
                        <div class="col-md-5 text-end"></div>
                        <div class="col-md-7">
                            <button type="submit" class="btn btn-success mt-2">Save</button>
                        </div>
                    </div>
                </form>


            </div>
        </div>
    </div>
@endsection
