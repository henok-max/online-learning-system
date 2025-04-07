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
                <h1>AI Quiz</h1>
                <nav style="margin-left: 90%;">
                    <ul class="nav-links">
                        <li><a href="/">Home</a></li>
                        <li><a href="{{ route('dashboard') }}">Back</a></li>
                    </ul>
                </nav>
            </header>
            <div class="quiz-container">
                <h1>AI Quiz</h1>
                <form id="quizForm">
                    <div class="question">
                        <p>1. Who is known as the "Father of Artificial Intelligence"?</p>
                        <ul class="options">
                            <li><input type="radio" name="q1" value="Alan Turing">Alan Turing</li>
                            <li><input type="radio" name="q1" value="John McCarthy">John McCarthy</li>
                            <li><input type="radio" name="q1" value="Marvin Minsky">Marvin Minsky</li>
                            <li><input type="radio" name="q1" value="Herbert Simon">Herbert Simon</li>
                        </ul>
                    </div>
                    <div class="question">
                        <p>2. What does NLP stand for in Artificial Intelligence?</p>
                        <ul class="options">
                            <li><input type="radio" name="q2" value="Natural Learning Processing">Natural Learning Processing</li>
                            <li><input type="radio" name="q2" value="Natural Language Processing">Natural Language Processing</li>
                            <li><input type="radio" name="q2" value="Neural Learning Processing">Neural Learning Processing</li>
                            <li><input type="radio" name="q2" value="Neural Language Processing">Neural Language Processing</li>
                        </ul>
                    </div>
                    <div class="question">
                        <p>3. Which of the following is a type of Machine Learning?</p>
                        <ul class="options">
                            <li><input type="radio" name="q3" value="Supervised">Supervised</li>
                            <li><input type="radio" name="q3" value="Unsupervised">Unsupervised</li>
                            <li><input type="radio" name="q3" value="Reinforcement">Reinforcement</li>
                            <li><input type="radio" name="q3" value="All of the above">All of the above</li>
                        </ul>
                    </div>
                    <div class="question">
                        <p>4. What is a neural network inspired by?</p>
                        <ul class="options">
                            <li><input type="radio" name="q4" value="The human brain">The human brain</li>
                            <li><input type="radio" name="q4" value="Computer chips">Computer chips</li>
                            <li><input type="radio" name="q4" value="Quantum mechanics">Quantum mechanics</li>
                            <li><input type="radio" name="q4" value="The Internet">The Internet</li>
                        </ul>
                    </div>
                    <div class="question">
                        <p>5. Which algorithm is commonly used in supervised learning for classification tasks?</p>
                        <ul class="options">
                            <li><input type="radio" name="q5" value="K-Means">K-Means</li>
                            <li><input type="radio" name="q5" value="Linear Regression">Linear Regression</li>
                            <li><input type="radio" name="q5" value="Decision Tree">Decision Tree</li>
                            <li><input type="radio" name="q5" value="Apriori">Apriori</li>
                        </ul>
                    </div>
                    <div class="question">
                        <p>6. What is the primary goal of Artificial Intelligence (AI)?</p>
                        <ul class="options">
                            <li><input type="radio" name="q6" value="To mimic human intelligence">To mimic human intelligence</li>
                            <li><input type="radio" name="q6" value="To perform repetitive tasks efficiently">To perform repetitive tasks efficiently</li>
                            <li><input type="radio" name="q6" value="To create new programming languages">To create new programming languages</li>
                            <li><input type="radio" name="q6" value="To automate industrial machinery">To automate industrial machinery</li>
                        </ul>
                    </div>
                    <div class="question">
                        <p>7. Which technique is used to train neural networks effectively?</p>
                        <ul class="options">
                            <li><input type="radio" name="q7" value="Gradient Descent">Gradient Descent</li>
                            <li><input type="radio" name="q7" value="Binary Search">Binary Search</li>
                            <li><input type="radio" name="q7" value="Deep Learning">Deep Learning</li>
                            <li><input type="radio" name="q7" value="Heuristic Analysis">Heuristic Analysis</li>
                        </ul>
                    </div>
                    <div class="question">
                        <p>8. What is the term used for a model in AI that learns by example from labeled data?</p>
                        <ul class="options">
                            <li><input type="radio" name="q8" value="Supervised Learning">Supervised Learning</li>
                            <li><input type="radio" name="q8" value="Unsupervised Learning">Unsupervised Learning</li>
                            <li><input type="radio" name="q8" value="Reinforcement Learning">Reinforcement Learning</li>
                            <li><input type="radio" name="q8" value="Self-Supervised Learning">Self-Supervised Learning</li>
                        </ul>
                    </div>
                    <div class="question">
                        <p>9. Which of the following is a deep learning framework?</p>
                        <ul class="options">
                            <li><input type="radio" name="q9" value="TensorFlow">TensorFlow</li>
                            <li><input type="radio" name="q9" value="Apache Hadoop">Apache Hadoop</li>
                            <li><input type="radio" name="q9" value="SQL">SQL</li>
                            <li><input type="radio" name="q9" value="MongoDB">MongoDB</li>
                        </ul>
                    </div>
                    <div class="question">
                        <p>10. What is the key difference between supervised and unsupervised learning?</p>
                        <ul class="options">
                            <li><input type="radio" name="q10" value="To mimic human intelligence">Supervised learning uses labeled data, while unsupervised learning uses unlabeled data.</li>
                            <li><input type="radio" name="q10" value="To perform repetitive tasks efficiently">Supervised learning focuses on classification, while unsupervised learning focuses on clustering.</li>
                            <li><input type="radio" name="q10" value="To create new programming languages">Supervised learning requires human intervention, unlike unsupervised learning.</li>
                            <li><input type="radio" name="q10" value="To automate industrial machinery">All of the above</li>
                        </ul>
                    </div>


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
                        q1: "John McCarthy",
                        q2: "Natural Language Processing",
                        q3: "All of the above",
                        q4: "The human brain",
                        q5: "Decision Tree",
                        q6: "To mimic human intelligence",
                        q7: "Gradient Descent",
                        q8: "Supervised Learning",
                        q9: "TensorFlow",
                        q10: "All of the above",

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
                        resultDiv.innerHTML = `<h3>You passed the quiz! Congratulations!</h3>`;
                    } else {
                        resultDiv.className = 'failed';
                        resultDiv.innerHTML = `<h3>You failed the quiz. Please try again.</h3>`;
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