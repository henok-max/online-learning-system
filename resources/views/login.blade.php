<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signin </title>
    <link href="{{ asset('css/form.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
    <header>
        <nav>
            <div class="logo">
                <img src="{{ asset('images/logo.jpg') }}" alt="WebP Image" style="width: 70px; height: 70px; border-radius:50%;">
                <h1> DMU E-Learning</h1>
            </div>
            <ul class=" nav-links">
                <li><a href="/">Home</a></li>
                <li><a href="/contact">Contact</a></li>

            </ul>
        </nav>

    </header>
    <section style="margin-top:120px; justify-items: center;">
        <h1>Signin</h1>

        @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{ route('login') }}" method="POST">
            @csrf

            <label for="email">Email:</label>
            <input type="email" name="email" required>
            <br>

            <label for="password">Password:</label>
            <input type="password" name="password" required>
            <br>

            <button type="submit">Sign in</button>
        </form>

</body>

</html>