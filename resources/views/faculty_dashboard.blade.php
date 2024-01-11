<!DOCTYPE HTML>
<html>

<head>
    <title>Admin Interface</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="https://cdn.jsdlvr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdlvr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{ asset('storage/css/faculty_dashboard_styles.css') }}">

</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <nav class="col-sm-3 col-md-2 sidebar">
                <ul class="nav nav-sidebar">
                    <li id="program" class="dropdown">
                        <a href="#">Program<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li id="sub-dropdown" class="dropdown"><a href="#">BSIT<span
                                        class="glyphicon glyphicon-chevron-right"></span></a>
                                <ul id="sub-dropdown-menu" class="dropdown-menu">
                                    <li><a href="#">1st year</a></li>
                                    <li><a href="#">2nd year</a></li>
                                    <li><a href="#">3rd year</a></li>
                                    <li><a href="#">4th year</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li id="course" class="dropdown">
                        <a href="#">Courses<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Web Development</a></li>
                            <li><a href="#">Database Administration</a></li>
                            <li><a href="#">IT Elective 1</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>

            <div class="container col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" style="background-color: #ffffff; border-radius: 20px;">
                <div class="row">
                    <div class="offset-md-3 col-md-6">
                        <input type="search" class="form-control" id="search" placeholder="Search Student Name">
                    </div>
                </div>

                <h3 id="error" class="text-center mt-3"></h3>

                <div class="row">
                    <div class="offset-md-1 col-md-10">

                        <table class="table table-bordered border-primary table hover mt-5 text-capitalize" id="mytable">

                        </table>
                        <a class="logout" href="{{ route('logout' )}}">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="{{ asset('storage/js/faculty_script.js') }}"></script>


</body>
</html>
