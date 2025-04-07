<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Learning Platform</title>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Navigation Bar -->

    <header>
        <nav>
            <div class="logo">
                <img src="{{ asset('images/logo.jpg') }}" alt="WebP Image" style="width: 70px; height: 70px; border-radius:50%;">
                <h1>DMU E-Learning</h1>
            </div>
            <ul class=" nav-links">
                <li><a href="/">Home</a></li>
                <li><a href="/course">Courses</a></li>
                <li><a href="/about">About Us</a></li>
                <li><a href="/contact">Contact</a></li>
                <li><a href="/login">Sign in</a></li>

            </ul>
        </nav>

    </header>




    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h2>Welcome to DMU E-Learning</h2>
            <p>Boost your career with online courses from the best learninng platform.</p>

            <a href="/signup" class="btn">Get Started</a>
        </div>
    </section>

    <!-- Course Categories -->
    <section class="course-categories">
        <div class="category">
            <h3>Web Development</h3>
            <p>Learn to build websites, applications, and more</p>
        </div>
        <div class="category">
            <h3>Data Science</h3>
            <p>Master data analysis, machine learning, and AI</p>
        </div>
        <div class="category">
            <h3>Graphic Design</h3>
            <p>Design stunning graphics and visual content</p>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 DMU E-Learning. All rights reserved.</p>
    </footer>
</body>

</html>