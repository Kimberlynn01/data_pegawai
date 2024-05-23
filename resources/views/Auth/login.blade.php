@extends('Auth.layouts.main')

@section('title', 'Login')


@push('style')
    <style>
        .login-container {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        .login-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .login-header h1 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .login-header p {
            color: #6c757d;
        }
    </style>
@endpush


@section('content')
    <div class="login-container">
        <div class="login-header">
            <h1>Login</h1>
            <p>Welcome back! Please login to your account.</p>
        </div>
        <form action="{{ route('login.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password"
                    placeholder="Enter your password">
            </div>

            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
        <div class="text-center mt-3">
            <p class="mb-0">Don't have an account? <a href="#">Sign up</a></p>
        </div>
    </div>
@endsection
