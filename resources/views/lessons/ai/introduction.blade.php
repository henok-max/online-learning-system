<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $lesson->title }}</title>
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
                <h1>Introduction to Artificial Intelligence</h1>
                <nav style="margin-left: 90%;">
                    <ul class="nav-links">
                        <li><a href="/">Home</a></li>
                        <li><a href="{{ route('dashboard') }}">Back</a></li>
                    </ul>
                </nav>
            </header>

            <section>
                <h1> What is AI?</h1>
                <p>Artificial Intelligence (AI) refers to the simulation of human intelligence by machines, particularly computer systems. It allows machines to perform tasks that typically require human cognitive skills, such as decision-making, problem-solving, learning, and understanding language.</p>

                <h2>AI is not a single technology but an interdisciplinary field that combines:</h2>
                <ul>
                    <li>Mathematics</li>
                    <li>Computer Science</li>
                    <li>Data Analytics</li>
                    <li>Psychology</li>
                </ul>
                <h2>Examples of AI in daily life:</h2>
                <ul>
                    <li>Virtual assistants like Siri or Alexa</li>
                    <li>Recommendation systems on Netflix and YouTube

                    <li>Smart home devices like automated thermostats</li>
                </ul>
            </section>
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