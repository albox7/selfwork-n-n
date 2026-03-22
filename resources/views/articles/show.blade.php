<x-layout title="{{ $article->title }}">

	<div class="container-fluid extra-padding-container">

		<div class="row bg-form">
			<div class="col-12 col-md-8 col-lg-6">

				<h1 class="post-title">{{ $article->title }}</h1>
				<h3 class="post-subtitle">{{ $article->subtitle }}</h3>
				<p class="post-text mb-5">{{ $article->article }}</p>

				
				{{-- Mostra i Tag --}}
				@if($article->tags->count() > 0)
					<div class="mt-3 mb-5 tags">
						<h4>Tag</h4>
						@foreach($article->tags as $tag)
							<span class="badge">{{ $tag->name }}</span>
						@endforeach
					</div>
				@endif


				<div class="d-flex gap-2 mb-4">
					<a href="{{ route('articles.edit', $article->id) }}" class="btn btn-primary-custom">Modifica</a>
				</div>

			</div>
			<div class="col-12 col-md-8 col-lg-6">
				<img src="{{ Storage::url($article->image) }}" alt="{{ $article->title }}" class="img-fluid img-post mb-4">
			</div>
			
		</div>

	</div>

</x-layout>