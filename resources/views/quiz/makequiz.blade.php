@extends('layouts.app')

@section('content')
	<div class="container">
		<h2 align="center">Enter Questions</h2>
		<br>
		<div class="row">
			<div class="col-lg-offset-2 col-lg-8">
				<form class="form-horizontal" method="post" action="/quiz">
					{{csrf_field()}}
				  <fieldset>
				    <legend>{{$details->name}}</legend>
				    <div class="form-group">
				          <label for="textArea" class="col-lg-2 control-label">Question</label>
				          <div class="col-lg-10">
				            <textarea class="form-control" rows="3" name="question" placeholder="Enter Question"></textarea>
				          </div>
				        </div>
				    <div class="form-group">
				      <label for="inputEmail" class="col-lg-2 control-label">Option 1</label>
				      <div class="col-lg-10">
				        <input type="text" class="form-control" name="opt1" placeholder="Enter Option 1">
				      </div>
				    </div>
				    <div class="form-group">
				      <label for="inputEmail" class="col-lg-2 control-label">Option 2</label>
				      <div class="col-lg-10"> 
				        <input type="text" class="form-control" name="opt2" placeholder="Enter Option 2">
				      </div>
				    </div>
				    <div class="form-group">
				      <label for="inputEmail" class="col-lg-2 control-label">Option 3</label>
				      <div class="col-lg-10">
				        <input type="text" class="form-control" name="opt3" placeholder="Enter Option 3">
				      </div>
				    </div>
				    <div class="form-group">
				      <label for="inputEmail" class="col-lg-2 control-label">Option 4</label>
				      <div class="col-lg-10">
				        <input type="text" class="form-control" name="opt4" placeholder="Enter Option 4">
				      </div>
				    </div>
				    <div class="form-group">
				      <label class="col-lg-2 control-label">Correct Answer</label>
				      <div class="col-lg-10">
				        <div class="radio">
				          <label>
				            <input type="radio" name="ans" id="optionsRadios1" value="1" checked="">
				            1
				          </label>
				        </div>
				        <div class="radio">
				          <label>
				            <input type="radio" name="ans" id="optionsRadios2" value="2">
				            2
				          </label>
				        </div>
				        <div class="radio">
				          <label>
				            <input type="radio" name="ans" id="optionsRadios2" value="3">
				            3
				          </label>
				        </div>
				        <div class="radio">
				          <label>
				            <input type="radio" name="ans" id="optionsRadios2" value="4">
				            4
				          </label>
				        </div>
				      </div>
				    </div>
				    <input type="number" name="cat_id" value="{{$details->id}}" style="visibility: hidden;">
				    <div class="form-group">
				      <div class="col-lg-10 col-lg-offset-2">
				        <button type="submit" class="btn btn-primary">Publish Question</button>
				        <a href="teacher" class="btn btn-default pull-right">Exit</a>
				      </div>
				    </div>
				  </fieldset>
				</form>
			</div>
		</div>
	</div>
@endsection