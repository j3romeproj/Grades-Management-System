<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Grades</title>
    <link rel="stylesheet" href="{{ asset('storage/css/student_dashboard_styles.css') }}">
</head>
<body>
<header>
    <img src="{{ asset('storage/assets/SMS-Logo.png') }}" alt="University Logo">
    <h1>SMS<br> UNIVERSITY</h1>
</header>
<main>
    <div class="Report-Card">
        <h1>REPORT CARD</h1>
    </div>

    <section class="student-information">
        <table id="StudTable">
            <tbody>
            <tr id="first-row">
                <td>Student Name: {{$student->firstName}} {{$student->lastName}}</td>
                <td>School Year:</td>
            </tr>

            <tr>
                <td>Student No.: {{$student->student_id}}</td>
                <td>Term:</td>
            </tr>

            <tr>
                <td>Course:</td>
                <td>GPA:</td>
            </tr>
            </tbody>
        </table>
    </section>

    <section class="grades">
        <table id="GradesTable">
            <thead id="GradesTableHeader">
            <tr>
                <th>Subject Code</th>
                <th>Description</th>
                <th>Faculty Name</th>
                <th>Units</th>
                <th>Sect Code</th>
                <th>Final Grade</th>
                <th>Grade Status</th>
            </tr>
            </thead>
            <tbody id="GradesTableBody">
            @foreach($classes as $class)
                <tr>
                    <td>@foreach($courses as $course)
                            @if($course->course_id == $class->course_id)
                                {{$course->course_id}}
                            @endif
                        @endforeach</td></td>
                    <td>{{ $class->description }}</td>
                    <td>
                        @foreach($faculties as $faculty)
                            @if($faculty->faculty_id == $class->faculty_id)
                            {{$faculty->firstName}} {{$faculty->lastName}}
                            @endif
                        @endforeach
                    </td>
                    <td>
                        @foreach($courses as $course)
                            @if($course->course_id == $class->course_id)
                                {{$course->units}}
                            @endif
                        @endforeach</td>
                    <td></td>
                    <td></td>
                    <td>P/INC/F</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </section>

    <section class="LG_button">
        <a class="logout" href="{{ route('logout' )}}">Logout</a>
    </section>

</main>
</body>
</html>
