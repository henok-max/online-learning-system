<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <style>
        /* Add necessary CSS */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #333;
            color: white;
            padding: 10px 20px;
            height: 90px;
        }

        header .logo img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }

        header .nav-links {
            list-style: none;
            display: flex;
            gap: 20px;

        }

        header .nav-links a {
            color: white;
            text-decoration: none;
        }

        .container {
            padding: 20px;
        }

        .course-card {
            background-color: white;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 60%;
        }

        .course-card h3 {
            margin: 0 0 10px;
        }

        .course-card p {
            margin: 0;
            color: #555;
        }

        .btn-view {
            display: inline-block;
            margin-top: 10px;
            padding: 8px 15px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 14px;
        }

        .btn-view:hover {
            background-color: #0056b3;
        }

        .profile-container {
            position: fixed;
            top: 5px;
            right: 5px;
            align-items: center;


        }

        .profile-icon {
            width: 60px;
            height: 45px;
            border-radius: 50%;
            cursor: pointer;
        }

        .dropdown-menu {
            display: none;
            position: absolute;
            top: 50px;
            right: 10px;
            width: 400px;
            height: 300px;
            background: white;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 10px;
            border-radius: 8px;
            color: #333;
            align-items: center;
            padding-left: 50px;
            padding-top: 40px;


        }

        .dropdown-menu.show {
            display: block;
        }

        .progress-bar {
            background-color: #e0e0e0;
            border-radius: 5px;
            overflow: hidden;
            width: 100%;
            height: 20px;
            margin-top: 10px;
        }

        .progress-bar-inner {
            height: 100%;
            background-color: #007bff;
            transition: width 0.3s ease-in-out;
        }
    </style>
    <script>
        function toggleProfileDropdown() {
            const dropdown = document.getElementById('profile-dropdown');
            dropdown.classList.toggle('show');
        }
    </script>
</head>

<body>
    <header>
        <div class="logo">
            <img src="{{ asset('images/logo.jpg') }}" alt="WebP Image" style="width: 70px; height: 70px; border-radius:50%;">
            <h1>DMU E-Learning</h1>
        </div>
        <div style="margin-right:80px;">
            <ul class="nav-links">
                <li><a href="/">Home</a></li>
                <li><a href="{{ route('courses.index') }}">More Courses</a></li>

            </ul>
        </div>
        <div class="profile-container">
            <img src="{{ Auth::user()->Profile_Picture }}" alt="Profile_Picture" class="profile-icon" onclick="toggleProfileDropdown()">
            <h2>Profile</h2>
            <div id="profile-dropdown" class="dropdown-menu">
                <h3>Name:{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h3>
                <h3>Email:{{ Auth::user()->email }}</h3>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button style="margin-top:80px;" type="submit">Logout</button>
                </form>
            </div>
        </div>
    </header>



    <div style="margin-left:250px; margin-top:80px; padding: 20px;">
        <h1 style="margin-left:150px;">Welcome, {{ Auth::user()->first_name }}</h1>
        <h2 style="margin-left:150px;">Your Enrolled Courses</h2>


        @foreach($enrolledCourses as $course)
        <div class="course-card">
            <h3>{{ $course->name }}</h3>
            <p>{{ $course->description }}</p>

            @if ($course->lessons->isNotEmpty())
            <!-- Progress Bar -->
            <div class="progress-bar" style="background: #f0f0f0; border-radius: 5px; overflow: hidden; margin-top: 10px;">
                <div class="progress-bar-inner" style="width: {{ $course->progress }}%; background: #007bff; height: 20px;"></div>
            </div>
            <p style="margin-top: 5px; color: #555;">{{ $course->progress }}% completed</p>

            <!-- Button with Dynamic Text -->
            @if ($course->buttonText && $course->nextLessonId)
            <a href="{{ route('lessons.show', ['courseId' => $course->id, 'lessonId' => $course->nextLessonId]) }}" class="btn-view">
                {{ $course->buttonText }}
            </a>
            @endif
            @else
            <!-- Coming Soon for Courses Without Lessons -->
            <h2 style="margin-top: 10px; color: #999;">Coming Soon</h2>
            @endif
        </div>
        @endforeach



    </div>
</body>

</html>