<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>


    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }



        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #333;
            color: white;
            padding: 10px 20px;
            height: 90px;
        }

        header .logo img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }

        header .nav-links {
            list-style: none;
            display: flex;
            gap: 15px;
        }

        header .nav-links a {
            color: white;
            text-decoration: none;
            font-size: 1.2rem;
            margin-right: 15px;
        }



        header .nav-links a:hover {
            color: #007bff;
        }

        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .grid {
            display: flex;
            gap: 20px;
        }

        .card {
            flex: 1;
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .card h2 {
            color: #555;
            margin-bottom: 10px;
        }

        .card form input,
        .card form select,
        .card form button {
            width: 95%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .card form button {
            background-color: #333;
            color: white;
            border: none;
            cursor: pointer;
        }

        .card form button:hover {
            background-color: #555;
        }



        .btn-view button {
            background-color: #0056b3;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            margin: 10px;
            margin-left: 90%;
        }

        .btn-view button:hover {
            transform: scale(1.1);
        }

        .profile-container {
            position: fixed;
            top: 5px;
            right: 5px;
            align-items: center;


        }

        .profile-icon {
            width: 60px;
            height: 45px;
            border-radius: 50%;
            cursor: pointer;
        }

        .dropdown-menu {
            display: none;
            position: absolute;
            top: 50px;
            right: 10px;
            width: 400px;
            height: 300px;
            background: white;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 10px;
            border-radius: 8px;
            color: #333;
            align-items: center;
            padding-left: 70px;
            padding-top: 40px;


        }

        .dropdown-menu.show {
            display: block;
        }

        .dropdown-menu button {
            background-color: #0056b3;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
    </style>
    <script>
        function toggleProfileDropdown() {
            const dropdown = document.getElementById('profile-dropdown');
            dropdown.classList.toggle('show');
        }
    </script>
</head>

<body>
    <header>
        <div class="logo">
            <img src="{{ asset('images/logo.jpg') }}" alt="WebP Image" style="width: 70px; height: 70px; border-radius:50%;">
        </div>
        <div style="margin-right:80px;">
            <nav class="nav-links">
                <ul>
                    <a href="/">Home</a>
                </ul>
            </nav>
        </div>
        <div class="profile-container">
            <img src="{{ Auth::user()->Profile_Picture }}" alt="Profile_Picture" class="profile-icon" onclick="toggleProfileDropdown()">
            <h3>Profile</h3>
            <div id="profile-dropdown" class="dropdown-menu">
                <h3>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h3>
                <h3>{{ Auth::user()->email }}</h3>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button style="margin-top:80px;" type="submit">Logout</button>
                </form>
            </div>
        </div>
    </header>

    <div class="container">
        <h1>Welcome, Admin!</h1>

        <div class="grid">
            <!-- Add Course -->
            <div class="card">
                <h2>Add New Course</h2>
                <form method="POST" action="{{ route('admin.addCourse') }}">
                    @csrf
                    <input type="text" name="name" placeholder="Course Name" required>
                    <textarea name="description" rows="4" placeholder="Course Description" required></textarea>
                    <button type="submit">Add Course</button>
                </form>
            </div>

            <!-- Delete Student -->
            <div class="card">
                <h2>Delete Student</h2>
                <form method="POST" action="{{ route('admin.deleteStudent') }}">
                    @csrf
                    @method('DELETE')
                    <select name="student_id" required>
                        <option value="" disabled selected>Select Student</option>
                        @foreach($students as $student)
                        <option value="{{ $student->id }}">{{ $student->first_name }} {{ $student->last_name }}</option>
                        @endforeach
                    </select>
                    <button type="submit">Delete Student</button>
                </form>
            </div>

            <!-- Total Students -->
            <div class="card">
                <h2>Total Students</h2>
                <p>There are currently <strong>{{ $totalStudents }}</strong> students enrolled.</p>
            </div>
        </div>

        <div class="btn-view">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit">Logout</button>
            </form>
        </div>
    </div>
</body>

</html>