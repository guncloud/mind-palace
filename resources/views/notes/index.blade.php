@extends('app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<h4>Notes <a class="btn btn-info" href="notes/create">New Note</a></h4>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<form class="form-horizontal" role="form" method="post" action="">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					@foreach ($notes as $note)
						<h4>
							{{$note->title}} 
							<small>
								<a href="/notes/{{$note->id}}/edit" class="btn btn-xs btn-info">Update</a>
								<a href="#" class="btn btn-xs btn-info remove" id="{{$note->id}}">Remove</a>
							</small>
						</h4>
						<p>
							{{$note->body}}
						</p>
					@endforeach
				</form>
			</div>
		</div>
	</div>	
@endsection

@section('js')
	<script type="text/javascript">
	$(function(){
		$('.remove').click(function(){
			var id = $(this).attr('id');
			$.post('/notes/'+id, {
				_method : 'DELETE',
				_token : "{{csrf_token()}}"
			}, function(data){
				console.log(data);
				if(data != "false"){
					location.reload();
				}
			});
		})
	});
	</script>
@endsection