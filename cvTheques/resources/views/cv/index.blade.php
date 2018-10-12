@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		
		<div class="col-md-12">
			
			@include('partials.flash')

			<h1>la Liste Des Cv</h1>

			<div class="pull-right">
			<a href="{{ url('cvs/create') }}" class="btn btn-success">Nouveau Cv</a>
			</div>
			<br>
			<br><br>

			<div class="row">
				@foreach($listcv as $cv)
			  <div class="col-sm-6 col-md-4">
			    <div class="thumbnail">
			      <img src="{{ asset('storage/'.$cv->photo) }}" alt="...">
			      <div class="caption">
			        <h3>{{ $cv->titre }}</h3>
			        <p>
			        	<form action="{{ url('cvs/'.$cv->id) }}" method="POST">
			        		{{ csrf_field() }}
			        		{{ method_field('DELETE') }}
			        		<a href="#" class="btn btn-primary" role="button">Détail</a>
			        		<a href="{{ url('cvs/'.$cv->id.'/edit') }}" class="btn btn-warning" role="button">Edit</a>
			        		<input class="btn btn-danger" type="submit" name="" value="Delete">
			        	</form>
			        </p>
			      </div>
			    </div>
			  </div>
			  @endforeach()
			</div>
		</div>
	</div>
</div>
@endsection