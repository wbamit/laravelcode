<!DOCTYPE html>
<html>
<head>
    <title>Login</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .login-card {
            background: #fff;
            width: 100%;
            max-width: 400px;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .login-card h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-control {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 15px;
        }

        .form-control:focus {
            outline: none;
            border-color: #0d6efd;
        }

        .login-btn {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 6px;
            background: #0d6efd;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
        }

        .login-btn:hover {
            background: #0b5ed7;
        }

        .remember-me{
            margin-bottom:15px;
        }

        .remember-me label{
            display:flex;
            align-items:center;
            gap:8px;
            font-size:14px;
            color:#555;
            cursor:pointer;
        }

        .remember-me input[type="checkbox"]{
            width:16px;
            height:16px;
            cursor:pointer;
        }

        .errors {
            margin-top: 15px;
            padding: 10px;
            background: #ffe5e5;
            border-radius: 6px;
            color: #dc3545;
        }

        .errors ul {
            padding-left: 20px;
        }

        .success {
            background: #d4edda;
            color: #155724;
        }

        .register-link {
            text-align: center;
            margin-top: 20px;
        }

        .register-link a {
            text-decoration: none;
            color: #0d6efd;
            font-weight: bold;
        }

        .register-link a:hover {
            text-decoration: underline;
        }

        @media (max-width: 480px) {
            .login-card {
                padding: 20px;
            }

            .login-card h2 {
                font-size: 24px;
            }
        }
    </style>
</head>
<body>

<div class="login-card">

    <h2>Login</h2>

    <form method="POST" action="/login">
        @csrf

        <div class="form-group">
            <input
                type="email"
                name="email"
                class="form-control"
                placeholder="Email"
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

        <div class="remember-me">
            <label>
                <input type="checkbox" name="remember" value="1">
                Remember Me
            </label>
        </div>

        <button type="submit" class="login-btn">
            Login
        </button>
    </form>

    @if(session('error'))
        <div class="alert alert-danger errors">
            {{ session('error') }}
        </div>
    @endif

    @if(session('success'))
        <div class="alert alert-success success">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="errors">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="register-link">
        <a href="/register">Create an Account</a>
    </div>

</div>

</body>
</html>