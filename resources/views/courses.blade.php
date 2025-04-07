<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses</title>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <style>
        .sign-in-message-box {
            display: none;
            border: 2px solid red;
            background-color: whitesmoke;
            color: #333;
            font-weight: bold;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            z-index: 100;
            /* Ensures it appears above other elements */
        }

        .course {
            position: relative;
            text-align: center;
        }
    </style>
</head>

<body>
    @include('components.header') <!-- Include the header component -->

    <!-- Main content section -->
    <section style="margin-top: 110px;">
        <h1 style="text-align: center; font-size:35px;">Courses</h1>
        <section class="course-categories">
            @foreach($courses as $course)
            <a href="#" onclick="showSignInMessage(event, {{ $course->id }})">
                <div class="category course" id="course-{{ $course->id }}">
                    <h3>{{ $course->name }}</h3>
                    <p>{{ $course->description }}</p>
            </a>
            <h2> Click to Enroll </h2>

            <!-- Placeholder for the sign-in message -->
            <div class="sign-in-message-box" id="message-{{ $course->id }}">
                Sign in first to enroll.
            </div>
            </div>
            @endforeach
        </section>
    </section>

    <script>
        function showSignInMessage(event, courseId) {
            event.preventDefault();

            // Hide all messages first
            const messages = document.querySelectorAll('.sign-in-message-box');
            messages.forEach(message => message.style.display = 'none');

            // Show the specific message for the clicked course
            const messageElement = document.getElementById(`message-${courseId}`);
            if (messageElement) {
                messageElement.style.display = 'block';

                // Hide the message after 3 seconds
                setTimeout(() => {
                    messageElement.style.display = 'none';
                }, 3000);
            }
        }
    </script>
</body>

</html>