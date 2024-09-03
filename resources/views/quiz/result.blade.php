@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-lg-offset-2 col-lg-8">
				<h1 align="center">Your Result</h1>
				<br>
				<table class="table">
					<thead>
						<tr>
							<th>Total number of qustions</th>
							<th>Correct Answers</th>
							<th>Incorrect Answers</th>
							<th>No attempt</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>{{$result['total_ques']}}</td>
							<td>{{$result['correct']}}</td>
							<td>{{$result['incorrect']}}</td>
							<td>{{$result['no_attempt']}}</td>
						</tr>
					</tbody>
				</table>
				<br>
				<br>
				<h4 align="center">Your Score</h4>
				<p align="center">{{$result['score']}}</p>
				<br>
				<hr>
				<br>
				<h4 align="center">Rate the quiz</h4>
				<p align="center">Please take sometime to rate our quiz and leave a comment for us. Thank you!!!</p>
				<br>
				<form class="form-horizontal" method="post"  action="/quiz/{{$result['cat_id']}}">
					{{csrf_field()}}
				    <div class="form-group">
				      <label class="col-lg-2 control-label">Rating</label>
				      <div class="col-lg-10">
				      	<div class="stars">
				      	    <input class="star star-5" id="star-5" type="radio" name="star" value="5" />
				      	    <label class="star star-5" for="star-5"></label>
				      	    <input class="star star-4" id="star-4" type="radio" name="star" value="4"/>
				      	    <label class="star star-4" for="star-4"></label>
				      	    <input class="star star-3" id="star-3" type="radio" name="star" value="3"/>
				      	    <label class="star star-3" for="star-3"></label>
				      	    <input class="star star-2" id="star-2" type="radio" name="star" value="2"/>
				      	    <label class="star star-2" for="star-2"></label>
				      	    <input class="star star-1" id="star-1" type="radio" name="star" value="1"/>
				      	    <label class="star star-1" for="star-1"></label>
				      	</div>
				        <!-- <div class="radio">
				          <label>
				            <input type="radio" name="rate" id="optionsRadios1" value="5" checked="">
				            *****
				          </label>
				        </div>
				        <div class="radio">
				          <label>
				            <input type="radio" name="rate" id="optionsRadios2" value="4">
				            ****
				          </label>
				        </div>
				        <div class="radio">
				          <label>
				            <input type="radio" name="rate" id="optionsRadios2" value="3">
				            ***
				          </label>
				        </div>
				        <div class="radio">
				          <label>
				            <input type="radio" name="rate" id="optionsRadios2" value="2">
				            **
				          </label>
				        </div>
				        <div class="radio">
				          <label>
				            <input type="radio" name="rate" id="optionsRadios2" value="1">
				            *
				          </label>
				        </div> -->
				      </div>
				    </div>
				    <div class="form-group">
				      <label for="textArea" class="col-lg-2 control-label">Comment</label>
				      <div class="col-lg-10">
				        <textarea class="form-control" rows="3" id="comment" name="comment"></textarea>
				      </div>
				    </div>
				    <div class="form-group">
				      <div class="col-lg-10 col-lg-offset-2">
				        <button type="submit" class="btn btn-primary">Rate and go home</button>
				      </div>
				    </div>
				</form>
			</div>
			<!-- <div class="col-lg-2">
				<a href="{{route('student')}}" class="btn btn-info">Home</a>
			</div> -->
		</div>
	</div>
@endsection
