<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  
  
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow-lg" style="width: 400px;">
    <div style="background-color: black;margin:0%;height:60px">
      
    </div>
       
    <div class="p-4">
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control" required autofocus>
            </div>
            @error('email')
            <div class="text-danger col-md-12 d-flex align-items-center">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            @error('password')
            <div class="text-danger col-md-12 d-flex align-items-center">{{ $message }}</div>
            @enderror

            <div>
            <button type="submit" class="btn btn-dark w-30" style="border-radius: 35%">Login</button>
             <a href="{{ route('password.request') }}" style="margin-left: 80px">Forgot Password?</a>
           </div>
        </form>
    </div>
    </div>
</body>
</html>
