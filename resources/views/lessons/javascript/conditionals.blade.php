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
                <h1>Conditional Statements</h1>
                <nav style="margin-left: 90%;">
                    <ul class="nav-links">
                        <li><a href="/">Home</a></li>
                        <li><a href="{{ route('dashboard') }}">Back</a></li>
                    </ul>
                </nav>
            </header>

            <section>
                <h1>Conditional Statements</h1>
                <p>Conditional statements are used to perform actions based on certain conditions.</p>

                <h2>Example: Number Comparison</h2>
                <pre>
        <code>
      
            let number = 10;
            if (number > 0) {
                console.log("The number is positive.");
            } else if (number < 0) {
                console.log("The number is negative.");
            } else {
                console.log("The number is zero.");
            }
        
        </code>
    </pre>

                <h2>Switch Case:</h2>
                <pre>
        <code>
        
            let day = 2;
            switch (day) {
                case 1:
                    console.log("Monday");
                    break;
                case 2:
                    console.log("Tuesday");
                    break;
                default:
                    console.log("Invalid day");
            }
        
        </code>
    </pre>
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