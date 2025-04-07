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
                <h1>Loops</h1>
                <nav style="margin-left: 90%;">
                    <ul class="nav-links">
                        <li><a href="/">Home</a></li>
                        <li><a href="{{ route('dashboard') }}">Back</a></li>
                    </ul>
                </nav>
            </header>

            <section>
                <h1>Loops</h1>
                <p>Loops are used to execute a block of code repeatedly as long as a condition is true.</p>

                <h2>Example: For Loop</h2>
                <pre>
        <code>
        
            for (let i = 1; i <= 5; i++) {
                console.log("Iteration: " + i);
            }
        
        </code>
    </pre>

                <h2>While Loop:</h2>
                <pre>
        <code>
        
            let count = 1;
            while (count <= 3) {
                console.log("Count: " + count);
                count++;
            }
       
        </code>
    </pre>

                <h2>Do-While Loop:</h2>
                <pre>
        <code>
        
            let number = 0;
            do {
                console.log("Number: " + number);
                number++;
            } while (number < 3);
       
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