<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>machineLearning</title>
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
                <h1>Machine Learning</h1>
                <nav style="margin-left: 90%;">
                    <ul class="nav-links">
                        <li><a href="/">Home</a></li>
                        <li><a href="{{ route('dashboard') }}">Back</a></li>
                    </ul>
                </nav>
            </header>

            <section>
                <h1>Machine Learning</h1>
                <p>
                    Machine Learning (ML) is a branch of AI that focuses on building systems that learn and improve from data without being explicitly programmed.
                </p>
                <h2>How Machine Learning Works:</h2>
                <ul>
                    <li>Collect data from various sources.</li>
                    <li>Train algorithms to recognize patterns.</li>
                    <li>Use trained models to make predictions or decisions.</li>
                </ul>
                <h2>Types of Machine Learning:</h2>
                <ul>
                    <li><strong>Supervised Learning:</strong> Uses labeled data for training.</li>
                    <li><strong>Unsupervised Learning:</strong> Finds patterns in unlabeled data.</li>
                    <li><strong>Reinforcement Learning:</strong> Learns through rewards and punishments.</li>
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