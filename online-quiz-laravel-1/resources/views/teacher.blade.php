@extends('layouts.app')

@section('content')
<!-- <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Teacher Dashboard</div>

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
    @include('partials.message')
    @include('partials.errors')
    <br>
    <ul class="nav nav-tabs">
        <li  class="active"><a data-toggle="tab" href="#profile">Profile</a></li>
        <li><a data-toggle="tab" href="#mquiz">Make Quiz</a></li>
        <li><a data-toggle="tab" href="#aquiz">Add Questions</a></li>
        <li><a data-toggle="tab" href="#madequiz">Quiz Made</a></li>
        <li><a data-toggle="tab" href="#dquiz">Delete Quiz</a></li>
        <li><a data-toggle="tab" href="#highscore">High Score</a></li>
    </ul>

    <div class="tab-content">
        <div id="profile" class="tab-pane fade in active">
            <h2 align="center">Profile</h2>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <label style="font-size: 20px;">Name : {{ Auth::user()->name }}</label><br>
                    <label style="font-size: 20px;">Email : {{ Auth::user()->email }}</label>
                </div>
            </div>
        </div>
        <div id="mquiz" class="tab-pane fade">
            <h2 align="center">Make Quiz</h2>
            <br>
            <center><button type="button" class="btn btn-primary" data-toggle="tab" href="#select3">Make Quiz</button></center><br><br>
            <div class="col-sm-offset-4 col-sm-4">
                <div id="select3" class="tab-pane fade">
                    <form action="{{route('teacher')}}" method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>Enter category</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <br>
                        <center><input type="submit" value="Submit" class="btn btn-primary"></center>
                    </form>
                </div>
            </div>
        </div>
        <div id="aquiz" class="tab-pane fade">
            <h2 align="center">Add Questions</h2>
            <br>
            <center><button type="button" class="btn btn-primary" data-toggle="tab" href="#select2">Add Questions</button></center><br><br>
            <div class="col-sm-offset-4 col-sm-4">
                <div id="select2" class="tab-pane fade">
                    <form action="{{route('teacher')}}" method="post">
                        {{csrf_field()}}
                        {{ method_field('PATCH') }}
                        <select class="form-control" name="q_addition">
                            @foreach($category as $cat)
                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                            @endforeach
                        </select>
                        <!-- <div class="form-group">
                            <label>Enter category</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Set timer(in minutes)</label>
                            <input type="number" name="timer" class="form-control"><br>
                        </div> -->
                        <br>
                        <center><input type="submit" value="Submit" class="btn btn-primary"></center>
                    </form>
                </div>
            </div>
        </div>
        <div id="madequiz" class="tab-pane fade">
            <h2 align="center">Quiz Made</h2>
            <div><br>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>SNO</th>
                            <th>Quiz Made</th>
                            <th>Average Rating</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($i=1)
                        @foreach($category as $cat)
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$cat->name}}</td>
                            <td>{{$cat->avg_rate}}</td>
                        </tr>
                        @php($i++)
                        @endforeach
                    </tbody>
                </table>
                <center><a href="{{route('teacher.check_rating')}}" class="btn btn-danger">Check rating</a></center> 
            </div>
        </div>
        <div id="dquiz" class="tab-pane fade">
            <h2 align="center">Delete Quiz</h2>
            <br>
            <center><button type="button" class="btn btn-primary" data-toggle="tab" href="#select">Delete Quiz</button></center>
            <div class="col-sm-offset-4 col-sm-4"><br>
                <div id="select" class="tab-pane fade">
                    <p align="center">Select Category</p>
                    <form method="post" action="{{'/quiz/5'}}">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                        <select class="form-control" name="delete_quiz">
                            @foreach($category as $cat)
                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                            @endforeach
                        </select><br>
                        <center><input type="submit" value="Submit" class="btn btn-primary"></center>
                    </form>
                </div>
            </div>
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
