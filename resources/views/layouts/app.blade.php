<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel App</title>

    <!-- Add your CSS stylesheets or link to an external CSS file -->
    <style>
        /* Global styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }

        /* Navigation bar styles */
        .navbar {
            background-color: #ff69b4; /* Change to pink color code */
            color: #fff;
            padding: 10px;
            display: flex;
            justify-content: space-between;
        }

        .navbar a {
            background-color: white;
            color: #030303;
            text-decoration: none;
            margin-right: 10px;
            font-size: 18px;
            padding: 8px 12px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .navbar a:hover {
            background-color: #ff1493; /* Change to a darker shade of pink */
        }

        /* Page container styles */
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            margin-top: 20px;
        }

        /* Card styles */
        .card {
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .card-header {
            background-color: #ff69b4; /* Change to pink color code */
            color: #fff;
            padding: 10px;
            margin-bottom: 20px;
        }

        .card-body {
            margin-bottom: 20px;
        }

        /* Form styles */
        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            margin-bottom: 5px;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .btn {
            padding: 10px 20px;
            background-color: #ff69b4; /* Change to pink color code */
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #ff1493; /* Change to a darker shade of pink */
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar">
            <a href="/">Home</a>
            <a href="/register">Register</a>
            <a href="/login">Login</a>
        </nav>

        @yield('content')
    </div>
</body>
</html>
