@extends('layouts.app')

@section('content')
    <div class="container mt-5 d-flex justify-content-center">
        <div class="card w-50">
            <div class="card-body">
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" id="username" @error('username') style="border-color: red" @enderror>
                    </div>
                    @error('username')
                    <div class="mt-1 text-danger small">
                        {{ $message }}
                    </div>
                    @enderror

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="password" @error('password') style="border-color: red" @enderror>
                    </div>
                    @error('password')
                    <div class="mt-1 text-danger small">
                        {{ $message }}
                    </div>
                    @enderror

                    <div class="mt-2 mb-4 text-danger small">
                        @if(session('status'))
                            {{ session('status') }}
                        @endif
                    </div>

                    <button type="submit" class="btn btn-success mt-2">Login</button>
                </form>
            </div>
        </div>
    </div>
@endsection
