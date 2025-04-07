<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ethics</title>
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
                <h1>Ethics in Artificial Intelligence</h1>
                <nav style="margin-left: 90%;">
                    <ul class="nav-links">
                        <li><a href="/">Home</a></li>
                        <li><a href="{{ route('dashboard') }}">Back</a></li>
                    </ul>
                </nav>
            </header>

            <section>
                <h1>Ethics in Artificial Intelligence</h1>
                <p>
                    The rapid development of AI raises ethical concerns. Addressing these is critical to ensure responsible AI use.
                </p>
                <h2>Key Ethical Issues:</h2>
                <ul>
                    <li><strong>Bias:</strong> Algorithms may reflect and amplify societal biases.</li>
                    <li><strong>Privacy:</strong> AI systems often require sensitive data.</li>
                    <li><strong>Job Displacement:</strong> Automation may replace human workers.</li>
                </ul>
                <h2>Approaches to Ethical AI:</h2>
                <ul>
                    <li>Implementing fairness in algorithms.</li>
                    <li>Ensuring transparency in AI systems.</li>
                    <li>Adopting regulations for responsible AI development.</li>
                </ul>
                <p>
                    Ethical considerations are essential for building trust in AI and ensuring its benefits for humanity.
                </p>
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