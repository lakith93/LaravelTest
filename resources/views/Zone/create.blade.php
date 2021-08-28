@extends('layouts.app')

@section('content')
    <div class="container mt-5 d-flex justify-content-center">
        <div class="card w-50">
            <div class="card-body">
                <div class="row d-flex justify-content-center">
                    <h3 class="d-flex justify-content-center"> Add Zone </h3>
                </div>

                <form method="POST" action="/zone">
                    @csrf
                    <div class="row mb-3 mt-3">
                        <div class="col-md-5 text-end">
                            <label for="code" class="form-label fw-bold" >Zone Code</label>
                            @error('code')
                            <div class="mt-1 text-danger small">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-7">
                            <input type="text" id="code" name="code" class="form-control"
                                   @error('code') style="border-color: red" @enderror value="{{ $code }}" readonly>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-5 text-end">
                            <label for="long_des" class="form-label fw-bold">Zone Long Description</label>
                            @error('long_des')
                            <div class="text-danger small">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-7">
                            <input type="text" id="long_des" name="long_des" class="form-control"
                                   @error('long_des') style="border-color: red"
                                   @enderror value="{{ old('long_des') }}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-5 text-end">
                            <label for="short_des" class="form-label fw-bold">Short Description</label>
                            @error('short_des')
                            <div class="mt-1 text-danger small">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-7">
                            <input type="text" id="short_des" name="short_des" class="form-control"
                                   @error('short_des') style="border-color: red" @enderror value="{{ old('short_des') }}">
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
