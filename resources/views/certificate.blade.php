<!DOCTYPE html>
<html>

<head>
    <title>Certificate of Completion</title>
    <style>
        body {
            text-align: center;
            padding: 40px;
            border-radius: 15px;
            background-color: #f9f9f9;
            border: solid #2c3e50;
        }

        .header-logo {
            width: 150px;
        }

        h1 {
            font-size: 40px;
            color: #2c3e50;
        }

        h3 {
            font-size: 30px;
            color: #34495e;
        }

        p {
            font-size: 25px;
            color: #7f8c8d;
            margin: 5px 0;
        }

        img {
            border-radius: 15px;
        }

        .para {
            margin: 0 80px;
        }


        strong {
            font-size: 35px;

        }
    </style>
</head>

<body>

    <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(public_path('images/logo.jpg'))) }}" alt="WebP Image" class="header-logo">
    <h1>DEBRE MARKOS UNIVERSITY</h1>


    <h3>Certificate of Completion</h3>
    <div class="para">
        <p>This is to certify that</p>
        <h3> {{ Auth::user()->first_name }} {{ Auth::user()->last_name }} </h3>
        <p> has successfully completed the course
            <strong> {{ $course->name }} </strong>
            With dedication and hard work, {{ Auth::user()->first_name }} has successfully completed the course titled {{ $course->name }}
            on {{ now()->format('F j, Y') }}. We commend your effort and encourage you to continue learning and growing with Debre Markos University.
        </p>
    </div>

</body>

</html>