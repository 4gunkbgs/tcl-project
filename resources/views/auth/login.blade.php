@extends('layouts.master')

@section('content')
<main class="login-form" >
    <div class="cotainer" >
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card" >
                    <h3 class="card-header text-center" style="background-color: #20c997" >Login</h3>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login.custom') }}">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Email" id="email" class="form-control" name="email" required
                                    autofocus>
                                @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>

                            <div class="form-group mb-3">
                                <input type="password" placeholder="Password" id="password" class="form-control" name="password" required>
                                @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>

                            <div class="form-group mb-3">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember me
                                    </label>
                                </div>
                            </div>

                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-dark btn-block">Sign In</button>
                            </div>
                        </form>

                        @if(session()->has('message'))
                            <div class="alert alert-success mt-2">
                                {{ session()->get('message') }}
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection