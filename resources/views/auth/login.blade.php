@extends('layouts.app')
@section('styles')
<style>


    .login-background {
        background-image: url('https://res.cloudinary.com/demz8am4j/image/upload/v1727618712/town2_jumfst.jpg');
        background-size: contain; /* Ensures the entire image is visible */
        background-position: center; /* Centers the image */
        background-repeat: no-repeat; /* Prevents image from repeating */
        background-color: #000; /* Background color for any empty space (optional) */
        height: 100vh; /* Ensures the height of the background covers the viewport */
        width: 100vw; /* Ensures the width of the background covers the viewport */
        display: flex; /* Allows for centering content */
        align-items: center; /* Centers content vertically */
        justify-content: center; /* Centers content horizontally */
        position: absolute; /* Makes sure it covers the full viewport */
        top: 0;
        left: 0;
    }


    .login-container {
        max-width: 400px;
        width: 100%;
        background: rgba(255, 255, 255, 0.9);
        /* White background with opacity */
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .login-form h2 {
        margin-bottom: 20px;
        font-size: 34px;
        color: #cd222b;
        text-align: center;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-control {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .btn-primary {
        width: 100%;
        padding: 10px;
        border: none;
        border-radius: 4px;
        background-color: #01214a;
        color: #fff;
        font-size: 16px;
        cursor: pointer;
    }

    .btn-primary:hover {
        background-color: #01214a;
    }
</style>
@endsection

@section('content')
<div class="login-background">
    <div class="login-container">
        <div class="login-form">
            <h2 style="color:green;">Login Page</h2>

            <!-- Display error messages -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <input type="email" name="email" placeholder="Email" required class="form-control">
                </div>
                <div class="form-group">
                    <input type="password" name="password" placeholder="Password" required class="form-control">
                </div>
                <button type="submit" class="btn btn-primary" style="background-color: green;">Login</button>

            </form>

        </div>
    </div>
</div>
@endsection