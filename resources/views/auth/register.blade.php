@extends('layout.master-auth')

@section('title', 'Java Learn - Register')

@section('content')

<div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-md-9 col-lg-6 col-xl-5">
            <img src="{{ asset('landing-asset/img/LgoJava.png') }}" class="img-fluid" alt="Sample image">
        </div>
        <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
            <form action="{{ route('register.post') }}" method="post">
                @csrf
                <div class="divider d-flex align-items-center my-4">
                    <p class="text-center fw-bold mx-3 mb-0 text-white">Register</p>
                </div>

                <!-- Email input -->
                <div class="form-outline mb-4">
                    <label class="form-label text-white" for="email">Email address</label>
                    <input type="email" id="email" name="email" class="form-control form-control-lg" placeholder="Enter Email" required />
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                    <label class="form-label text-white" for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control form-control-lg" placeholder="Enter Password" minlength="6" required />
                </div>

                <!-- Confirm Password input -->
                <div class="form-outline mb-4">
                    <label class="form-label text-white" for="confirm_password">Confirm Password</label>
                    <input type="password" id="confirm_password" name="confirm_password" class="form-control form-control-lg" placeholder="Confirm Password" minlength="6" required />
                </div>

                <div class="text-center text-lg-start mt-4 pt-2">
                    <button type="submit" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">Sign Up</button>
                    <p class="small fw-bold mt-2 pt-1 mb-0 text-white">Already have an account? 
                        <a href="{{ route('login') }}" class="link-danger">Login</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection
