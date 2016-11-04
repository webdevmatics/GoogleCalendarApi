@extends('layouts.base')

@section('content')
	
	<div class="container">
		
		<div class="row">
			
			<h3 class="display-3">
				{{$note->title}}
			</h3>

			<p>
				{{$note->body}}
			</p>

		</div>

	</div>

@endsection