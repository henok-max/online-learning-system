<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses</title>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Flash messages for success and error -->
    @if(session('success'))
    <script>
        alert("{{ session('success') }}");
    </script>
    @endif

    <!-- Include the header component -->
    <header>
        <nav>
            <div class="logo">
                <img src="{{ asset('images/logo.jpg') }}" alt="WebP Image" style="width: 70px; height: 70px; border-radius: 50%;">
                <h1>DMU E-Learning</h1>
            </div>
            <ul class=" nav-links">
                <li><a href="/">Home</a></li>

                <li><a href="/about">About Us</a></li>
                <li><a href="/contact">Contact</a></li>

            </ul>
        </nav>

    </header>

    <!-- Main content section -->
    <section style="margin-top: 110px;">
        <h1 style="text-align: center; font-size:35px;">Courses</h1>

        <!-- Course Categories Section -->
        <section class="course-categories">
            @foreach($courses as $course)
            <a href="{{ route('student.enroll', ['course_id' => $course->id]) }}">
                <div class="category course">
                    <h3>{{ $course->name }}</h3>
                    <p>{{ $course->description }}</p>
                    <h2> Click to Enroll </h2>
                </div>


            </a>

            @endforeach
        </section>
    </section>

</body>

</html>