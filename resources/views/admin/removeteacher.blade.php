@extends('layouts.app')

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-md-offset-4 col-md-4">
				<h3 align="center">Select the teacher to remove</h3>
				<br>
				<p align="center">The account once removed cannot be revived.<br><br>Select Student</p>
				<form action="{{'/admin/home'}}" method="post">
					{{csrf_field()}}
					<div class="form-group">
						<select class="form-control" name="remove_user">
							@foreach($teachers as $teacher)
								<option value="{{$teacher->id}}">{{$teacher->name}}</option>
							@endforeach
						</select>
					</div>
					<center><input type="submit" name="submit" value="Remove" class="btn btn-danger"></center>
				</form>
			</div>
		</div>
	</div>

@endsection