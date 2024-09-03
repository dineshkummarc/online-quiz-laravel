@extends('layouts.app')

@section('content')
<!-- <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Student Dashboard</div>

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
    <h2 align="center">Welcome {{ Auth::user()->name }}</h2>
    @include('partials.message');
    <br>
    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#profile">Profile</a></li>
        <li><a data-toggle="tab" href="#take_quiz">Take Quiz</a></li>
        <li><a data-toggle="tab" href="#quiz_taken">Quiz Taken</a></li>
        <li><a data-toggle="tab" href="#highscore">High Score</a></li>
    </ul>

    <div class="tab-content">
        <div id="profile" class="tab-pane fade in active">
            <h2 align="center">Profile</h2>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <label style="font-size: 20px;">Name    : {{ Auth::user()->name }}</label><br>
                    <label style="font-size: 20px;">Email   : {{ Auth::user()->email }}</label><br>
                    <label style="font-size: 20px;">Your IQ : {{ $iq }}</label>
                </div>
            </div>
            <hr>
            <div>
                <h3 align=""></h3>
            </div>
        </div>
        <div id="take_quiz" class="tab-pane fade">
            <h2 align="center">Take Quiz</h2>
            <br>
            <center><button type="button" class="btn btn-primary" data-toggle="tab" href="#select">Start Quiz</button></center>
            <div class="col-sm-offset-4 col-sm-4"><br>
                <div id="select" class="tab-pane fade">
                    <p align="center">Select Category</p>
                    <form method="get" action="{{'/quiz/5'}}">
                        {{csrf_field()}}
                        <select class="form-control" name="category">
                            @foreach($category as $cat)
                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                            @endforeach
                        </select><br>
                        <center><input type="submit" value="Submit" class="btn btn-primary"></center>
                    </form>
                </div>
            </div>
        </div>
        <div id="quiz_taken" class="tab-pane fade">
            <h2 align="center">Quiz Taken</h2>
            <br>
            <table class="table">
                    <thead>
                        <tr>
                            <th>SNO</th>
                            <th>Category</th>
                            <th>Score</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($i=1)
                        @foreach($quiz_taken as $percent)
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$percent->name}}</td>
                            <td>{{$percent->score}}</td>
                        </tr>
                        @php($i++)
                        @endforeach
                    </tbody>
                </table>
        </div>
        <div id="highscore" class="tab-pane fade">
            <h2 align="center">Highscores</h2>
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
    </div>
</div>

@endsection
