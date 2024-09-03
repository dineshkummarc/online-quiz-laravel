@extends('layouts.app')

@section('content')
	<div class="container">
		<h2 align="center">Check Rating</h2>
		<p align="center">Choose a category to display the rating and the comments from users</p>
		<br>
		<div class="row">
			<div class="col-lg-offset-4 col-lg-4">
				<form method="post" action="{{route('teacher.check_rating')}}">
		            {{csrf_field()}}
		            <select class="form-control" name="check">
		                <option value="0">Select category</option>
		                @foreach($category as $cat)
		                    <option value="{{$cat->id}}">{{$cat->name}}</option>
		                @endforeach
		            </select>
		            <br>
		            <center><input type="submit" value="Submit" class="btn btn-primary"></center>
		        </form>
			</div>
		</div>
		<br>
		<hr>
		<br>
		<table class="table">
			<thead>
				<tr>
					<th>SNO</th>
					<th>Name</th>
					<th>Rating</th>
					<th>Comment</th>
				</tr>
			</thead>
			<tbody>
				@php($i=1)
				@foreach($cat_rating as $rating)
				<tr>
					<td>{{$i}}</td>
					<td>{{$rating->name}}</td>
					<td>{{$rating->rate}}</td>
					<td>{{$rating->comment}}</td>
				</tr>
				@php($i++)
				@endforeach
			</tbody>
		</table>
		<br>
		<center><a href="{{route('teacher')}}" class="btn btn-info">Go Home</a></center>
	</div>
@endsection