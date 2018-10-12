@extends('layouts.app')

@section('content')

<div class="container" >
	<div class="row" >
		<div class="col-md-12">
			<form action="{{ url('cvs') }}" method="POST" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="form-group  @if($errors->get('titre')) has-error @endif">
					<label>Titre :</label>
					<input type="text" name="titre" class="form-control" value="{{ old('titre') }}">
					@if($errors->get('titre'))
						@foreach($errors->get('titre') as $message)
							<li style="color: red">{{ $message }}</li>
						@endforeach
					@endif
				</div>
				<div class="form-group  @if($errors->get('presentation')) has-error @endif">
					<label>Presentation :</label>
					<textarea name="presentation" class="form-control">{{ old('presentation') }}</textarea>
					@if($errors->get('presentation'))
						@foreach($errors->get('presentation') as $message)
							<li style="color: red">{{ $message }}</li>
						@endforeach
					@endif
				</div>
				<div class="form-group">
					<label>Image :</label>
					<input class="form-control" type="file" name="photo">
				</div>
				<div class="form-group">
					<input type="submit" class="form-control btn btn-primary" value="Enregistrer">
				</div>

			</form>
		</div>
	</div>
</div>

@endsection