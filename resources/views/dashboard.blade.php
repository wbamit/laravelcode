<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>

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

        .dashboard-card {
            background: #fff;
            width: 100%;
            max-width: 500px;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .dashboard-card h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .user-info {
            margin-bottom: 25px;
        }

        .user-info h3 {
            color: #444;
            margin-bottom: 10px;
        }

        .user-info p {
            color: #666;
            word-break: break-word;
        }

        .logout-btn {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 6px;
            background: #dc3545;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
        }

        .logout-btn:hover {
            background: #c82333;
        }

        @media (max-width: 480px) {
            .dashboard-card {
                padding: 20px;
            }

            .dashboard-card h1 {
                font-size: 24px;
            }

            .user-info h3 {
                font-size: 18px;
            }

            .user-info p {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>

<div class="dashboard-card">
    
    @if(session('success'))
    <div style="
        background:#d4edda;
        color:#155724;
        padding:10px;
        margin-bottom:15px;
        border-radius:5px;
    ">
        {{ session('success') }}
    </div>
@endif

    <h1>Dashboard</h1>

    <div class="user-info">
        <h3>Welcome {{ auth()->user()->name }}</h3>
        <p><strong>Email:</strong> {{ auth()->user()->email }}</p>
    </div>

    <form method="POST" action="/logout">
        @csrf

        <button type="submit" class="logout-btn">
            Logout
        </button>
    </form>

</div>

</body>
</html>