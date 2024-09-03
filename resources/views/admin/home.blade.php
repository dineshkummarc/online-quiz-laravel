@extends('layouts.app')

@section('content')
<!-- <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Admin Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div> -->

<div class="container">
    <h2 align="center">Welcome Admin</h2>
    @include('partials.message')
    <br>
    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#highscore">High Score</a></li>
        <li><a data-toggle="tab" href="#chkteacher">Teacher</a></li>
        <li><a data-toggle="tab" href="#chkstudent">Student</a></li>
    </ul>

    <div class="tab-content">
        <div id="highscore" class="tab-pane fade in active">
            <h1>Highscores</h1>
            <br>
            <table class="table">
                <thead>
                    <tr>
                        <th>SNO</th>
                        <th>Category</th>
                        <th>Score (%)</th>
                        <th>Name</th>
                    </tr>
                </thead>
                <tbody>
                    @php($i=1)
                    @foreach($high_score as $marks)
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{$marks->cname}}</td>
                        <td>{{$marks->top}}</td>
                        <td>{{$marks->uname}}</td>
                    </tr>
                    @php($i++)
                    @endforeach
                </tbody>
            </table>
        </div>
        <div id="chkteacher" class="tab-pane fade">
            <h1>List of teachers</h1>
            <br>
            <table class="table">
                <thead>
                    <tr>
                        <th>SNO</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>No. of Quizes Made</th>
                    </tr>
                </thead>
                <tbody>
                    @php($i=1)
                    @foreach($teachers as $teacher)
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{$teacher->name}}</td>
                        <td>{{$teacher->email}}</td>
                        <td>{{$teacher->quiz_involved}}</td>
                    </tr>
                    @php($i++)
                    @endforeach
                </tbody>
            </table>
            <br>
            <center><a href="{{ route('admin.removeteacher') }}" class="btn btn-danger">Remove Teacher Account</a></center>
        </div>
        <div id="chkstudent" class="tab-pane fade">
            <h1>List of Students</h1>
            <br>
            <table class="table">
                <thead>
                    <tr>
                        <th>SNO</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>No. of Quizes Taken</th>
                    </tr>
                </thead>
                <tbody>
                    @php($i=1)
                    @foreach($students as $student)
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{$student->name}}</td>
                        <td>{{$student->email}}</td>
                        <td>{{$student->quiz_involved}}</td>
                    </tr>
                    @php($i++)
                    @endforeach
                </tbody>
            </table>
            <br>
            <center><a href="{{ route('admin.removestudent') }}" class="btn btn-danger">Remove Student Account</a></center>
        </div>
    </div>
</div>
@endsection
