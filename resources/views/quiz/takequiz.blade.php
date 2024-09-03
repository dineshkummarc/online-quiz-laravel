@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-offset-2 col-md-8">
				<h2 align="center">{{$cat->name}} Quiz</h2>
				<p align="center">Choose any one option for each question</p>
				<br>
				<form action="{{route('student')}}" method="post" id="form1">
					{{csrf_field()}}
					@php($i=1)
					@foreach($display as $ques)
					<table class="table table-hover table-fit">
					  <thead>
					    <tr>
					      <th>{{$i}}</th>
					      <th></th>
					      <th>{{$ques->question}}</th>
					    </tr>
					    @php($i++)
					  </thead>
					  <tbody>
					    <tr>
					      <td class="col-md-1">1</td>
					      <td class="col-md-1"><input type="radio" name="{{$ques->id}}" value="1"></td>
					      <td>{{$ques->opt1}}</td>
					    </tr>
					    <tr>
					      <td class="col-md-1">2</td>
					      <td class="col-md-1"><input type="radio" name="{{$ques->id}}" value="2"></td>
					      <td>{{$ques->opt2}}</td>
					    </tr>
					    <tr>
					      <td class="col-md-1">3</td>
					      <td class="col-md-1"><input type="radio" name="{{$ques->id}}" value="3"></td>
					      <td>{{$ques->opt3}}</td>
					    </tr>
					    <tr>
					      <td class="col-md-1">4</td>
					      <td class="col-md-1"><input type="radio" name="{{$ques->id}}" value="4"></td>
					      <td>{{$ques->opt4}}</td>
					    </tr>
					  </tbody>
					</table>
					<input type="radio" name="{{$ques->id}}" value="0" checked="checked" hidden="">
					<input type="text" name="category_id" value="{{$cat->id}}" hidden="">
					<br>
					@endforeach
					<center><input type="submit" name="submit" value="Submit" class="btn btn-success"></center>
				</form>
			</div>
		</div>
	</div>
@endsection