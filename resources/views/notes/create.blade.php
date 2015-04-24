@extends('app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<h4>Notes</h4>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<form class="form-horizontal" role="form" method="put" action="/notes/{{$note->id}}">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="form-group">
						<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
							<input type="text" class="form-control" name="title" placeholder="Title">
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
							<input type="text" class="form-control" name="body" placeholder="Body">
						</div>
					</div>
					<button class="btn btn-primary" type="submit">Update</button>
				</form>
			</div>
		</div>
	</div>	
@endsection