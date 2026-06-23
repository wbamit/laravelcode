<html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial, sans-serif;
        }

        body{
            min-height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
            background:#f4f6f9;
            padding:20px;
        }

        .card{
            width:100%;
            max-width:450px;
            background:#fff;
            padding:30px;
            border-radius:12px;
            box-shadow:0 4px 15px rgba(0,0,0,0.1);
        }

        .card h2{
            text-align:center;
            margin-bottom:25px;
            color:#333;
        }

        .form-group{
            margin-bottom:15px;
        }

        .form-control{
            width:100%;
            padding:12px;
            border:1px solid #ddd;
            border-radius:8px;
            font-size:14px;
        }

        .form-control:focus{
            outline:none;
            border-color:#0d6efd;
        }

        .btn{
            width:100%;
            padding:12px;
            border:none;
            border-radius:8px;
            background:#0d6efd;
            color:#fff;
            cursor:pointer;
            font-size:16px;
        }

        .btn:hover{
            background:#0b5ed7;
        }

        .error-box{
            margin-top:15px;
            padding:10px;
            border-radius:8px;
            background:#ffe5e5;
            color:#d10000;
        }

        .login-link{
            text-align:center;
            margin-top:20px;
        }

        .login-link a{
            text-decoration:none;
            color:#0d6efd;
        }

        @media(max-width:480px){

            .card{
                padding:20px;
            }

            .card h2{
                font-size:24px;
            }
        }
    </style>
</head>
<body>

<div class="card">

    <h2>Create Account</h2>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="form-group">
            <input
                type="text"
                name="name"
                class="form-control"
                placeholder="Full Name"
                value="{{ old('name') }}"
            >
        </div>

        <div class="form-group">
            <input
                type="email"
                name="email"
                class="form-control"
                placeholder="Email Address"
                value="{{ old('email') }}"
            >
        </div>

        <div class="form-group">
            <input
                type="password"
                name="password"
                class="form-control"
                placeholder="Password"
            >
        </div>

        <div class="form-group">
            <input
                type="password"
                name="password_confirmation"
                class="form-control"
                placeholder="Confirm Password"
            >
        </div>

        <button type="submit" class="btn">
            Register
        </button>
    </form>

    @if ($errors->any())
        <div class="error-box">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="login-link">
        Already have an account?
        <a href="{{ route('login') }}">
            Login
        </a>
    </div>

</div>

</body>
</html>
```
