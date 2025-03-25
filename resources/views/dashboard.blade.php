<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .header {
            background-color: black;
            color: white;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .sidebar {
            width: 250px;
            height: 100vh;
            background-color: #f0f0f0;
            padding: 20px;
        }
        .sidebar h4 {
            text-align: center;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .menu-item {
            background: gray;
            color: white;
            padding: 15px;
            margin-bottom: 10px;
            text-align: center;
            font-weight: bold;
            border-radius: 5px;
            text-decoration: none;
            display: block;
        }
        .menu-item:hover {
            background: #6c757d;
        }
        .content {
            flex-grow: 1;
            padding: 20px;
        }
    </style>
</head>
<body>

    <!-- Header -->
    <div class="header">
        <div></div> <!-- Empty div for alignment -->
        <div class="d-flex align-items-center">
            <h2 class="text-end me-3">Welcome, {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</h2>
                <img src="{{ asset('storage/' . (auth()->user()->image_url ?? 'default-avatar.png')) }}"
                 alt="User Image" class="rounded-circle" width="50" height="50">
        </div>
    </div>

    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar">
            <h4>{{ auth()->user()->role->title }} Dashboard</h4>
            @if(auth()->user()->role_id == 1) {{-- System Admin --}}
                <a href="{{ route('user.account') }}" class="menu-item">User Account</a>
                <a href="#" class="menu-item">Human Resource</a>
                <a href="{{ route('users.profile', auth()->user()->id) }}" class="menu-item">Employee Profile</a>
                <a href="{{ route('user.quit') }}" class="menu-item">Quit</a>
            @elseif(auth()->user()->role_id == 2) {{-- HR --}}
                <a href="#" class="menu-item">Human Resource</a>
                <a href="{{route('users.profile', auth()->user()->id) }}" class="menu-item">Employee Profile</a>
                <a href="{{ route('user.quit') }}" class="menu-item">Quit</a>
            @else {{-- Regular User --}}
                <a href="{{route('users.profile', auth()->user()->id) }}" class="menu-item">Employee Profile</a>
                <a href="{{ route('user.quit') }}" class="menu-item">Quit</a>
            @endif
        </div>

    </div>

</body>
</html>
