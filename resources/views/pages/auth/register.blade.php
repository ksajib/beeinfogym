@extends('layouts.app')

@section('content')
    <div class="hero-header-inner">
        <div class="hero-scroll-hint">
            <span>Scroll</span>
            <div class="scroll-tick"></div>
        </div>

        <div class="container hero-content position-relative">
            <div class="hero-wm">REGISTER</div>
            <div class="row justify-content-center align-items-center min-vh-100">

                <div class="col-lg-5">
                    <div class="register-card p-5" style="background:var(--dark);">
                        <div class="text-center mb-4">
                            <h3 class="title uppercase text-light">Create Account</h3>
                        </div>
                        <form method="POST" action="/register">
                            @csrf

                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Your Name</label>
                                    <input type="text" name="name" class="form-control custom-input"
                                        placeholder="Enter your name" required>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Email Address</label>
                                    <input type="email" name="email" class="form-control custom-input"
                                        placeholder="john@example.com" required>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control custom-input"
                                        placeholder="Enter password" required>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label class="form-label">UserName</label>
                                    <input type="password" name="password_confirmation" class="form-control custom-input"
                                        placeholder="Enter a user name." required>
                                </div>
                            </div>

                            <button type="submit" class="btn gold-button w-100 mt-2">
                                Register
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
