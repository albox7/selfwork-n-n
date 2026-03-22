<x-layout title="Crea nuovo post">

	<div class="container-fluid extra-padding-container">
		
		<div class="row">
			<div class="col-12 col-md-8 col-lg-6">
				<h1 class="post-title">Aggiungi un nuovo post</h1>
			</div>
		</div>

		
		{{-- Success message --}}
		@if (session('message'))
			<div class="row">
				<div class="col-12 col-md-8 col-lg-6">
					<div class="alert alert-success">
						{{ session('message') }}
					</div>
				</div>
			</div>
		@endif


		{{-- Validation messages --}}
		@if ($errors->any())
			<div class="row">
				<div class="col-12 col-md-8 col-lg-6">
					<div class="alert alert-danger">
						<ul class="error-list">
							@foreach ($errors->all() as $error)
								<li>{!! $error !!}</li>
							@endforeach
						</ul>
					</div>
				</div>
			</div>
		@endif


		<div class="row">
			<div class="col-12 col-md-8 col-lg-6 bg-form">
				
				<form action="{{route('articles.store')}}" method="POST" enctype="multipart/form-data">
					
					@csrf

					<div class="mb-3">
						<label for="title" class="form-label">Titolo</label>
						<input name="title" value="{{old('title')}}" type="text" class="form-control" id="title">
					</div>

					<div class="mb-3">
						<label for="subtitle" class="form-label">Sottotitolo</label>
						<input name="subtitle" value="{{old('subtitle')}}" type="text" class="form-control" id="subtitle">
					</div>
					
					<div class="mb-3">
						<label for="image" class="form-label">Immagine</label>
						<input name="image" type="file" class="form-control" id="image">
					</div>

					<div class="mb-4">
						<label for="article" class="form-label">Articolo</label>
						<textarea name="article" class="form-control" id="article" cols="30" rows="6">{{old('article')}}</textarea>
					</div>
					
					<div>
						<button type="submit" class="btn btn-primary-custom">Aggiungi</button>
					</div>
				</form>
			</div>
		</div>
	</div>

</x-layout>