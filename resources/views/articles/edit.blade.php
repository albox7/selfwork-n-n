<x-layout title="Modifica post">

	<div class="container-fluid extra-padding-container">

		<div class="row">
			<div class="col-12 col-md-8 col-lg-6">
				<h1 class="post-title">Modifica post</h1>
			</div>
		</div>

		<div class="row">
			<div class="col-12 col-md-8 col-lg-6 bg-form">

				{{-- Validazione --}}
				@if ($errors->any())
					<div class="alert alert-danger">
						<ul class="error-list">
							@foreach ($errors->all() as $error)
								<li>{!! $error !!}</li>
							@endforeach
						</ul>
					</div>
				@endif

				<form action="{{ route('articles.update', $article->id) }}" method="POST" enctype="multipart/form-data">
					@csrf
					@method('PUT')

					<div class="mb-4">
						<label for="title" class="form-label">Titolo</label>
						<input name="title" value="{{ old('title', $article->title) }}" type="text" class="form-control" id="title">
					</div>

					<div class="mb-5">
						<label for="subtitle" class="form-label">Sottotitolo</label>
						<input name="subtitle" value="{{ old('subtitle', $article->subtitle) }}" type="text" class="form-control" id="subtitle">
					</div>

					<div class="mb-4">
						<div class="row">
							<div class="col-auto">
								<img class="img-thumb" src="{{ Storage::url($article->image) }}" alt="{{ $article->title }}" class="img-thumb d-block mb-2">
							</div>
							<div class="col">
								<label for="image" class="form-label">Immagine</label>
								<input name="image" type="file" class="form-control" id="image">
							</div>
						</div>
					</div>

					<div class="mb-4">
						<label class="form-label mt-3 mb-2">Aggiungi Tags</label>
						<div class="row">
							@foreach($tags as $tag)
								<div class="col-4">
									<div class="form-check">
										<input class="form-check-input" type="checkbox" name="tags[]" value="{{ $tag->id }}" id="tag{{ $tag->id }}" {{ $article->tags->contains($tag->id) ? 'checked' : '' }}>
										<label class="form-check-label" for="tag{{ $tag->id }}">{{ $tag->name }}</label>
									</div>
								</div>
							@endforeach
						</div>
					</div>

					<div class="mb-5">
						<label for="article" class="form-label">Articolo</label>
						<textarea name="article" class="form-control" id="article" rows="6">{{ old('article', $article->article) }}</textarea>
					</div>

					<div class="d-flex gap-2">
						<button type="submit" class="btn btn-primary-custom">Salva modifiche</button>
						<a href="{{ route('articles.show', $article->id) }}" class="btn btn-primary-cancel">Annulla</a>
					</div>

				</form>

			</div>
		</div>

	</div>

</x-layout>