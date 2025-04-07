<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link href="{{ asset('css/form.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
    @include('components.header')
    <section style="margin-top:120px; justify-items: center;">
        <h1>Signup Form</h1>

        <!-- Display errors -->
        @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <!-- Signup Form -->
        <form action="{{ route('student.register') }}" method="POST">
            @csrf
            <label for="first_name">First Name:</label>
            <input type="text" name="first_name" value="{{ old('first_name') }}" required>
            <br>

            <label for="last_name">Last Name:</label>
            <input type="text" name="last_name" value="{{ old('last_name') }}" required>
            <br>

            <label for="email">Email:</label>
            <input type="email" name="email" value="{{ old('email') }}" required>
            <br>

            <label for="password">Password:</label>
            <input type="password" name="password" required>
            <br>

            <button type="submit">Sign Up</button>
        </form>
    </section>
</body>

</html>