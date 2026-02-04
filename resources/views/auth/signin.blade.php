<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <style>
        body { font-family: sans-serif; display: flex; justify-content: center; align-items: center; height: 100vh; background-color: #f0f2f5; }
        .container { background: white; padding: 2rem; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); width: 400px; }
        .form-group { margin-bottom: 1rem; }
        label { display: block; margin-bottom: 0.5rem; }
        input[type="text"], input[type="password"] { width: 100%; padding: 0.5rem; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        button { width: 100%; padding: 0.75rem; background-color: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer; }
        button:hover { background-color: #0056b3; }
        .radio-group { display: flex; gap: 1rem; }
        .radio-group label { display: inline; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Sign In</h2>
        @if($errors->any())
            <div style="color: red; margin-bottom: 1rem; text-align: center; background: #f8d7da; padding: 0.5rem; border-radius: 4px;">
                @foreach ($errors->all() as $error)
                    <p style="margin: 0;">{{ $error }}</p>
                @endforeach
            </div>
        @endif
        <form action="{{ route('auth.check_signin') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="repass">Confirm Password</label>
                <input type="password" id="repass" name="repass" required>
            </div>
            <button type="submit">Sign In</button>
        </form>
        <div class="link" style="text-align: center; margin-top: 1rem;">
            <p>Already have an account? <a href="{{ route('login') }}" style="color: #007bff; text-decoration: none;">Login</a></p>
        </div>
    </div>
</body>
</html>
