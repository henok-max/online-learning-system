<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI</title>
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
                <h1>Types of Artificial Intelligence</h1>
                <nav style="margin-left: 90%;">
                    <ul class="nav-links">
                        <li><a href="/">Home</a></li>
                        <li><a href="{{ route('dashboard') }}">Back</a></li>
                    </ul>
                </nav>
            </header>

            <section>
                <h1>Types of Artificial Intelligence</h1>
                <p>
                    AI can be categorized based on its capabilities and functionalities. Understanding these types helps us identify their use cases.
                </p>
                <h2>1. Narrow AI:</h2>
                <p>
                    This AI specializes in specific tasks. Examples include virtual assistants like Siri and image recognition systems.
                </p>
                <h2>2. General AI:</h2>
                <p>
                    General AI, still theoretical, aims to perform any intellectual task that a human can do.
                </p>
                <h2>3. Super AI:</h2>
                <p>
                    Super AI surpasses human intelligence in every field, including creativity and problem-solving.
                </p>
                <h2>Functional Classifications:</h2>
                <ul>
                    <li><strong>Reactive Machines:</strong> Perform simple tasks without memory.</li>
                    <li><strong>Limited Memory:</strong> Use past data to inform current decisions.</li>
                    <li><strong>Theory of Mind:</strong> Understand human emotions (still in development).</li>
                </ul>
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