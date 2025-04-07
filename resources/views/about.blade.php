<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - DMU E-Learning</title>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
    @include('components.header')

    <section class="about-us">
        <div class="content">
            <h2>About DMU E-Learning</h2>
            <p>DMU E-Learning is a platform designed to provide world-class online courses. Our mission is to make education accessible to everyone, anywhere. We bring together the best instructors and the latest learning technologies to deliver high-quality courses across various domains, including web development, data science, graphic design, and much more.</p>
            <h3>Why Choose Us?</h3>
            <ul>
                <li>Experienced instructors from industry leaders.</li>
                <li>Flexible online courses with lifetime access.</li>
                <li>Hands-on projects and real-world experience.</li>
                <li>Affordable and accessible to all learners.</li>
            </ul>
        </div>
    </section>

    @include('components.footer')
</body>

</html>