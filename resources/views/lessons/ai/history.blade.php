<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History</title>
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
                <h1>History of Artificial Intelligence</h1>
                <nav style="margin-left: 90%;">
                    <ul class="nav-links">
                        <li><a href="/">Home</a></li>
                        <li><a href="{{ route('dashboard') }}">Back</a></li>
                    </ul>
                </nav>
            </header>

            <section>
                <h1>History of Artificial Intelligence</h1>
                <p>
                    AI has a rich history that spans decades, from theoretical ideas to practical applications. Let's explore the key milestones that shaped AI.
                </p>
                <h2>Early Beginnings:</h2>
                <ul>
                    <li><strong>1943:</strong> McCulloch and Pitts propose a mathematical model for neural networks.</li>
                    <li><strong>1950:</strong> Alan Turing introduces the Turing Test to measure machine intelligence.</li>
                </ul>
                <h2>The First AI Boom:</h2>
                <ul>
                    <li><strong>1956:</strong> The term "Artificial Intelligence" is coined during the Dartmouth Conference.</li>
                    <li><strong>1960s:</strong> Expert systems, such as DENDRAL, begin solving specific problems.</li>
                </ul>
                <h2>Modern Era:</h2>
                <ul>
                    <li><strong>1997:</strong> IBM’s Deep Blue defeats chess champion Garry Kasparov.</li>
                    <li><strong>2016:</strong> Google DeepMind’s AlphaGo beats world Go champion Lee Sedol.</li>
                </ul>
                <p>
                    AI's journey showcases a blend of scientific curiosity and technological advancement. The future holds even more promise as we build smarter systems.
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