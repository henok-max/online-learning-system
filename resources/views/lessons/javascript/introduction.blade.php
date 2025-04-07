<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $lesson->name }}</title>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/lesson.css') }}" rel="stylesheet">

</head>

<body>
    <div style="display: flex;">
        <!-- Sidebar for lessons -->
        <div style="margin-top: 100px; width: 20%;">
            <aside>
                <h1>Lessons</h1>
                <ul>
                    @foreach($lessons as $lesson)
                    <li class="{{ in_array($lesson->id, $completedLessons) ? 'completed' : '' }}">
                        <a href="{{ route('lessons.show', ['courseId' => $courseId, 'lessonId' => $lesson->id]) }}">
                            {{ $lesson->name }}
                        </a>
                        @if(in_array($lesson->id, $completedLessons))
                        <span class="completion-indicator">✓</span>
                        @endif
                    </li>
                    @endforeach
                </ul>
            </aside>

        </div>

        <!-- Main content -->
        <div style="margin-top: 110px; width: 80%;">
            <header>
                <h1>Introduction</h1>
                <nav style="margin-left: 90%;">
                    <ul class="nav-links">
                        <li><a href="/">Home</a></li>
                        <li><a href="{{ route('dashboard') }}">Back</a></li>
                    </ul>
                </nav>
            </header>
            <section>
                <h1>Introduction</h1>
                <h2>What is JavaScript?</h2>
                <p>
                    JavaScript is a powerful and versatile programming language that is used to bring web pages to life.
                    While HTML structures the content and CSS styles it, JavaScript adds interactivity. It allows you to create
                    dynamic and interactive experiences like animations, form validation, pop-ups, and more.
                </p>

                <h2>Why Learn JavaScript?</h2>
                <p>
                    JavaScript is one of the core technologies of web development, alongside HTML and CSS. With JavaScript,
                    you can build interactive websites, web applications, games, and even server-side applications. Mastering
                    JavaScript opens the door to becoming a full-stack web developer.
                </p>

                <h2>What You'll Learn in This Course</h2>
                <ul>
                    <li>Basic syntax and features of JavaScript</li>
                    <li>How to work with variables, data types, and operators</li>
                    <li>Functions and control structures like loops and conditions</li>
                    <li>How to interact with the Document Object Model (DOM)</li>
                    <li>Event handling and creating interactive web pages</li>
                </ul>

                <p>We’re excited to have you here! Let’s get started on this journey to mastering JavaScript.</p>
            </section>
            <!-- Mark the lesson as completed -->

            <div style="margin-left:80%;">
                @if($nextLesson)
                <a href="{{ route('lessons.show', ['courseId' => $courseId, 'lessonId' => $nextLesson->id]) }}" class="next-btn">
                    Next: {{ $nextLesson->name }}
                </a>
                @else
                <p>You have completed all lessons!</p>
                @endif
            </div>
        </div>
    </div>
</body>

</html>