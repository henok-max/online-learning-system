<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $lesson->name }}</title>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/lesson.css') }}" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }

        .quiz-container {
            max-width: 800px;
            margin: 50px auto;
            background: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .primary {
            display: inline-block;
            color: #fff;
            background-color: #007bff;
            margin: 10px;
            border-radius: 5px;
            width: 200px;
            height: 50px;
            text-align: center;
            line-height: 50px;
        }



        h1,
        h3 {
            text-align: center;
            color: #333;
        }

        .question {
            margin: 20px 0;
            color: #555;
        }

        .options {
            list-style-type: none;
            padding: 0;
        }

        .options li {
            margin: 10px 0;
        }

        .options input {
            margin-right: 10px;
        }

        #result {
            margin-top: 20px;
            padding: 15px;
            text-align: center;
            border-radius: 5px;
        }

        .passed {
            background-color: #d4edda;
            color: #155724;
        }

        .failed {
            background-color: #f8d7da;
            color: #721c24;
        }

        button {
            display: block;
            margin: 10px auto;
            padding: 10px 20px;
            border: none;
            background-color: #007bff;
            color: #fff;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
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
                <h1>JavaScript Quiz</h1>
                <nav style="margin-left: 90%;">
                    <ul class="nav-links">
                        <li><a href="/">Home</a></li>
                        <li><a href="{{ route('dashboard') }}">Back</a></li>
                    </ul>
                </nav>
            </header>
            <div class="quiz-container">
                <h1>JavaScript Quiz</h1>
                <form id="quizForm">
                    <div class="question">
                        <p>1. What is the output of `console.log(typeof null)`?</p>
                        <ul class="options">
                            <li><input type="radio" name="q1" value="object">Object</li>
                            <li><input type="radio" name="q1" value="null">Null</li>
                            <li><input type="radio" name="q1" value="undefined">Undefined</li>
                            <li><input type="radio" name="q1" value="string">String</li>
                        </ul>
                    </div>
                    <!-- Add similar blocks for other questions -->
                    <div class="question">
                        <p>2. Which of the following is not a JavaScript data type?</p>
                        <ul class="options">
                            <li><input type="radio" name="q2" value="String">String</li>
                            <li><input type="radio" name="q2" value="Number">Number</li>
                            <li><input type="radio" name="q2" value="Boolean">Boolean</li>
                            <li><input type="radio" name="q2" value="Float">Float</li>
                        </ul>
                    </div>
                    <div class="question">
                        <p>3. Which company developed JavaScript?</p>
                        <ul class="options">
                            <li><input type="radio" name="q3" value="Microsoft"> Microsoft</li>
                            <li><input type="radio" name="q3" value="Netscape"> Netscape</li>
                            <li><input type="radio" name="q3" value="Sun Microsystems"> Sun Microsystems</li>
                            <li><input type="radio" name="q3" value="Oracle"> Oracle</li>
                        </ul>
                    </div>

                    <div class="question">
                        <p>4. What is the result of `0.1 + 0.2 === 0.3` in JavaScript?</p>
                        <ul class="options">
                            <li><input type="radio" name="q4" value="true"> true</li>
                            <li><input type="radio" name="q4" value="false"> false</li>
                        </ul>
                    </div>

                    <div class="question">
                        <p>5. Which method is used to parse a string to an integer in JavaScript?</p>
                        <ul class="options">
                            <li><input type="radio" name="q5" value="parseInt()"> parseInt()</li>
                            <li><input type="radio" name="q5" value="parseFloat()"> parseFloat()</li>
                            <li><input type="radio" name="q5" value="Number()"> Number()</li>
                            <li><input type="radio" name="q5" value="None of the above"> None of the above</li>
                        </ul>
                    </div>
                    <div class="question">
                        <p>6.Which keyword is used to define a constant in JavaScript?</p>
                        <ul class="options">
                            <li><input type="radio" name="q6" value="var"> var</li>
                            <li><input type="radio" name="q6" value="let"> let</li>
                            <li><input type="radio" name="q6" value="const"> const</li>
                            <li><input type="radio" name="q6" value="constant"> constant</li>
                        </ul>
                    </div>
                    <div class="question">
                        <p>7.What is the result of the following code?</p>
                        <pre><code>console.log(2 + '2');   </code></pre>


                        <ul class="options">
                            <li><input type="radio" name="q7" value="4"> 4</li>
                            <li><input type="radio" name="q7" value="22"> 22</li>
                            <li><input type="radio" name="q7" value="NaN"> NaN</li>
                            <li><input type="radio" name="q7" value="undefined"> undefined</li>
                        </ul>
                    </div>
                    <div class="question">
                        <p>8.Which method can be used to add elements to the end of an array?</p>
                        <ul class="options">
                            <li><input type="radio" name="q8" value="push()"> push()</li>
                            <li><input type="radio" name="q8" value="pop()"> pop()</li>
                            <li><input type="radio" name="q8" value="shift()"> shift()</li>
                            <li><input type="radio" name="q8" value="unshift()"> unshift()</li>
                        </ul>
                    </div>
                    <div class="question">
                        <p>9.What is the output of the following code?</p>
                        <pre><code> let x; console.log(x);</code></pre>

                        <ul class="options">
                            <li><input type="radio" name="q9" value="null"> null</li>
                            <li><input type="radio" name="q9" value="undefined"> undefined</li>
                            <li><input type="radio" name="q9" value="0"> 0</li>
                            <li><input type="radio" name="q9" value="ReferenceError"> ReferenceError</li>
                        </ul>
                    </div>
                    <div class="question">
                        <p>10.Which method is used to convert JSON data to a JavaScript object?</p>
                        </p>
                        <ul class="options">
                            <li><input type="radio" name="10" value="JSON.stringify()"> JSON.stringify()</li>
                            <li><input type="radio" name="10" value="JSON.parse()"> JSON.parse()</li>
                            <li><input type="radio" name="10" value="JSON.convert()"> JSON.convert()</li>
                            <li><input type="radio" name="10" value="JSON.objectify()"> JSON.objectify()</li>
                        </ul>
                    </div>

                    <!-- Add all other questions here -->
                    <button type="button" onclick="calculateScore()">Submit Quiz</button>
                </form>
                <div id="result"></div>
            </div>

            <form id="scoreForm" method="POST" action="{{ route('quiz.submit') }}">
                @csrf
                <input type="hidden" name="lesson_id" value="{{ $lesson->id }}">

                <input type="hidden" name="score" id="scoreInput">

            </form>

            <script>
                function calculateScore() {
                    const correctAnswers = {
                        q1: "object",
                        q2: "Float",
                        q3: "Netscape",
                        q4: "false",
                        q5: "parseInt()",
                        q6: "const",
                        q7: "22",
                        q8: "push()",
                        q9: "undefined",
                        q10: "JSON.parse()",


                        // Add the correct answers for other questions here
                    };

                    let score = 0;
                    let totalQuestions = Object.keys(correctAnswers).length;

                    Object.keys(correctAnswers).forEach(question => {
                        const selectedOption = document.querySelector(`input[name="${question}"]:checked`);
                        if (selectedOption && selectedOption.value === correctAnswers[question]) {
                            score++;
                        }
                    });

                    const percentage = (score / totalQuestions) * 100;
                    const resultDiv = document.getElementById('result');
                    const scoreInput = document.getElementById('scoreInput');

                    if (percentage >= 50) {
                        resultDiv.className = 'passed';
                        resultDiv.innerHTML = `<h3>You passed the exam! Ready to graduate.</h3>`;

                    } else {
                        resultDiv.className = 'failed';
                        resultDiv.innerHTML = `<h3>You failed the exam. Please try again.</h3>`;
                    }

                    scoreInput.value = percentage;
                    document.getElementById('scoreForm').submit();
                }
            </script>
            @php
            $userScore = $lesson->quizeResults
            ->where('student_id', Auth::id())
            ->sortByDesc('created_at')
            ->first()?->score;
            @endphp

            @if($userScore >= 50)
            <a href="{{ route('certificate.generate', ['lesson_id' => $lesson->id]) }}" class="primary">
                View Certificate
            </a>
            <a href="{{ route('certificate.download', ['lesson_id' => $lesson->id]) }}" class="primary">
                Download Certificate
            </a>
            @elseif($userScore)
            <button class="btn btn-secondary" disabled>
                You need at least 50% to unlock the certificate
            </button>
            @else
            <button class="btn btn-secondary" disabled>
                Complete the quiz to unlock the certificate
            </button>
            @endif


            <!-- section -->
            <div style="margin-left:80%; margin-bottom:10px;">
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