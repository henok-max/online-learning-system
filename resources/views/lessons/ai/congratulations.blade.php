<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Congratulations</title>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/congra.css') }}" rel="stylesheet">


</head>

<body>
    <header>
        <h1>Congratulations</h1>

    </header>
    <div class="congrats-container">
        <div class="trophy">🏆</div>
        <h1>Congratulations!</h1>
        <p>You’ve successfully completed the <strong>Artificial Intelligence</strong> course.</p>
        <p>Your hard work and dedication have paid off!</p>
        <div class="btn-container">
            <a href="{{ route('dashboard') }}">Go to Dashboard</a>
        </div>
    </div>
</body>

</html>