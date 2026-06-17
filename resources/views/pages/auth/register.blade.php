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
                        <form x-data="registerForm()" @submit.prevent="submit">
                            @csrf

                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Your Name</label>
                                    <input type="text" name="name" class="form-control custom-input"
                                        placeholder="Enter your name">
                                    <small x-show="errors.name" x-text="errors.name?.[0]" style="color:red"></small>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Email Address</label>
                                    <input type="email" name="email" class="form-control custom-input"
                                        placeholder="john@example.com">
                                    <small x-show="errors.email" x-text="errors.email?.[0]" style="color:red"></small>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Phone number</label>
                                    <input type="text" name="phone" class="form-control custom-input"
                                        placeholder="(+880) 1879-212420">
                                    <small x-show="errors.phone" x-text="errors.phone?.[0]" style="color:red"></small>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control custom-input"
                                        placeholder="Enter password">
                                    <small x-show="errors.password" x-text="errors.password?.[0]" style="color:red"></small>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label class="form-label">UserName</label>
                                    <input type="text" name="userName" class="form-control custom-input"
                                        placeholder="Enter a user name.">
                                    <small x-show="errors.userName" x-text="errors.userName?.[0]" style="color:red"></small>
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

    <script>
        function registerForm() {
            return {
                errors: {},

                submit(e) {
                    this.errors = {};

                    fetch("/register", {
                            method: "POST",
                            headers: {
                                "X-Requested-With": "XMLHttpRequest",
                                "Accept": "application/json",
                                "X-CSRF-TOKEN": document.querySelector('input[name=_token]').value
                            },
                            body: new FormData(e.target)
                        })
                        .then(async (res) => {
                            if (res.status === 422) {
                                const data = await res.json();
                                this.errors = data.errors;
                                showToast('error', 'Validation Error', 'Please fix the form');
                                return;
                            }

                            if (res.ok) {
                                const data = await res.json()
                                console.log(data)
                                showToast('success', 'Success', data.message);
                                e.target.reset();
                                this.errors = {};
                                setTimeout(() => {
                                    window.location.href = data.redirect;
                                }, 1000);
                            }
                        })
                        .catch((err) => {
                            showToast('error', 'Error', err.message);
                        });
                }
            }
        }
    </script>
@endsection
