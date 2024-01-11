<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link rel="stylesheet" href="{{ asset('storage/css/login_styles.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@700&family=Lobster&family=Poppins:wght@300&display=swap" rel="stylesheet">
    <title>Login</title>
</head>
<body>
    <div class="home" style="background-image: url('{{ asset("storage/assets/background.jpg") }}')">
        <div class="left-container">
            <img class="logo" src="{{ asset('storage/assets/SMS-Logo.png') }}" alt="logo">
        </div>
        <div class="right-container">
            <div class="button-box">
                <div id="btn"></div>
                <button type="button" class="toggle-btn" onclick="student()">Student</button>
                <button type="button" class="toggle-btn" onclick="faculty()">Faculty</button>
            </div>
            <div class="student-login-container">
                <form id="student" class="form" action="{{ route('postLogin') }}" method="POST">
                    @csrf
                    <h3>Student Login</h3>
                    <div class="form-group">
                        <label for="accountName">Student Name</label>
                        <input placeholder="Student Name" name="accountName" id="accountName" type="text" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input name="password" placeholder="Password" id="password" type="password" required>
                    </div>
                    <button type="submit" class="form-submit-btn">Login</button>
                </form>
                <form id="faculty" class="form">
                    <h3>Faculty Login</h3>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input required="" placeholder="Username" name="username" id="username" type="text">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input required="" name="password" placeholder="Password" id="password" type="password">
                    </div>
                    <button type="submit" class="form-submit-btn">Login</button>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('storage/js/login_script.js') }}"></script>
</body>
</html>
