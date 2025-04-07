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
                <h1>Syntax</h1>
                <nav style="margin-left: 90%;">
                    <ul class="nav-links">
                        <li><a href="/">Home</a></li>
                        <li><a href="{{ route('dashboard') }}">Back</a></li>
                    </ul>
                </nav>
            </header>
            <section>
                <h1>JavaScript Syntax</h1>
                <p>
                    JavaScript syntax refers to the rules and conventions that define how to write JavaScript code. Understanding the basic syntax is essential for writing clean and error-free JavaScript programs.
                </p>

                <h2>Basic Syntax Components</h2>
                <ul>
                    <li><strong>Case Sensitivity:</strong> JavaScript is case-sensitive. For example, <code>myVariable</code> and <code>myvariable</code> are two different identifiers.</li>
                    <li><strong>Statements:</strong> JavaScript code is made up of statements, and each statement is separated by a semicolon (<code>;</code>).</li>
                    <li><strong>Whitespace:</strong> JavaScript ignores extra spaces and line breaks, making it flexible to format code for better readability.</li>
                    <li><strong>Comments:</strong> Comments are used to explain code and are ignored by the JavaScript engine.</li>
                </ul>

                <h2>Example: JavaScript Comments</h2>
                <pre>
        <code>
// This is a single-line comment

/*
This is a multi-line comment
that spans multiple lines
*/
        </code>
    </pre>

                <h2>Variables and Data Types</h2>
                <p>
                    JavaScript variables are used to store data values. Variables are declared using <code>var</code>, <code>let</code>, or <code>const</code>.
                </p>
                <pre>
        <code>
let name = "John";     // String
const age = 30;        // Number
var isStudent = true;  // Boolean
        </code>
    </pre>

                <h2>Operators</h2>
                <p>
                    JavaScript provides various operators for performing operations on values:
                </p>
                <ul>
                    <li><strong>Arithmetic Operators:</strong> <code>+, -, *, /, %</code></li>
                    <li><strong>Assignment Operators:</strong> <code>=, +=, -=, *=, /=</code></li>
                    <li><strong>Comparison Operators:</strong> <code>==, ===, !=, !==, >, <,>=, <=< /code>
                    </li>
                    <li><strong>Logical Operators:</strong> <code>&&, ||, !</code></li>
                </ul>

                <h2>Example: Arithmetic Operations</h2>
                <pre>
        <code>
let a = 10;
let b = 5;
console.log("Addition: " + (a + b)); // 15
console.log("Subtraction: " + (a - b)); // 5
console.log("Multiplication: " + (a * b)); // 50
console.log("Division: " + (a / b)); // 2
console.log("Modulus: " + (a % b)); // 0
        </code>
    </pre>

                <h2>Control Structures</h2>
                <p>JavaScript uses control structures like <code>if</code>, <code>else</code>, <code>for</code>, and <code>while</code> to define the flow of execution.</p>
                <pre>
        <code>
if (a > b) {
    console.log("a is greater than b");
} else {
    console.log("b is greater than or equal to a");
}
        </code>
    </pre>

                <h2>Functions</h2>
                <p>Functions are blocks of reusable code that can be executed when called.</p>
                <pre>
        <code>
function greet(name) {
    return "Hello, " + name;
}
console.log(greet("Alice")); // Outputs: Hello, Alice
        </code>
    </pre>

                <h2>Dynamic Interaction with HTML</h2>
                <p>JavaScript can interact with HTML to create dynamic web pages:</p>
                <pre>
        <code>
document.getElementById("example").innerHTML = "JavaScript is fun!";
        </code>
    </pre>
                <p>For this code to work, the HTML must have an element with <code>id="example"</code>.</p>

                <h2>Practice Exercise</h2>
                <p>
                    Write a program to accept a user's name as input and display a personalized greeting.
                </p>
                <pre>
        <code>
let userName = prompt("Enter your name:");
console.log("Welcome, " + userName + "!");
        </code>
    </pre>

                <h2>Conclusion</h2>
                <p>
                    Mastering JavaScript syntax is the first step toward becoming a proficient JavaScript developer. Practice regularly to strengthen your understanding.
                </p>
            </section>
            <!-- Mark the lesson as completed -->


            <!-- Link to the next lesson -->

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