<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>

    @include('components.header')

    <section class="contact-us">
        <h2>Contact Us</h2>
        <p>We'd love to hear from you! You can reach out to us via any of the following methods:</p>

        <div class="contact-info">
            <div class="contact-item">
                <h3>Email</h3>
                <p>
                    <a href="mailto:henokayalew31@gmail.com.com">henokayalew31@gmail.com</a>
                </p>
            </div>
            <div class="contact-item">
                <h3>Phone</h3>
                <p>
                    <a href="tel:+251930958877">+251 930 958 877</a>
                </p>
            </div>
            <div class="contact-item">
                <h3>Address</h3>
                <p>1234 Main Street, Debre Markos, ETHIOPIA</p>
            </div>
        </div>
        <div class="social-media">
            <h3>Social Media</h3>
            <a href="https://facebook.com/yourpage">Facebook</a><br>
            <a href="https://twitter.com/yourprofile">Twitter</a>
        </div>
    </section>

    @include('components.footer')

</body>

</html>