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
                <h1> Variables and Constants</h1>
                <nav style="margin-left: 90%;">
                    <ul class="nav-links">
                        <li><a href="/">Home</a></li>
                        <li><a href="{{ route('dashboard') }}">Back</a></li>
                    </ul>
                </nav>
            </header>

            <section>
                <h1> Variables and Constants</h1>
                <p>
                    In JavaScript, variables are used to store data values. Variables can be declared using <code>var</code>, <code>let</code>, or <code>const</code>.
                </p>

                <h2>Declaring Variables:</h2>
                <pre>
        <code>
        let name = "Alice"; // Block-scoped variable
        const pi = 3.14;   // Constant value
        var age = 25;      // Function-scoped variable
        </code>
    </pre>

                <h2>Example: Personal Info</h2>
                <p>Storing and displaying personal information:</p>
                <pre>


            <code>
            let firstName = "Alice";
            let lastName = "Smith";
            let age = 25;
            console.log("Name: " + firstName + " " + lastName);
            console.log("Age: " + age);
            </code>
       
        
    </pre>

                <h2>Differences between <code>let</code>, <code>const</code>, and <code>var</code>:</h2>
                <ul>
                    <li><strong><code>let</code></strong>: Block-scoped and can be reassigned.</li>
                    <li><strong><code>const</code></strong>: Block-scoped and cannot be reassigned.</li>
                    <li><strong><code>var</code></strong>: Function-scoped and allows redeclaration.</li>
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