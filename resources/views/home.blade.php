<x-layout title="Home">

	<div class="container-fluid extra-padding-container">
		<div class="row mb-5">
			<div class="col-12">
				<h1 class="mt-4 mb-1">"La Patagonia mi ha dato il senso dell'infinito."</h1>
				<h3 class="mb-5 text-white-50">Pablo Neruda</h3>
			</div>
		</div>

		<div class="row g-4">
			@foreach ($articles as $article)
				<div class="col-12 col-md-4 col-lg-3 mb-4">
					<a href="{{ route('articles.show', $article->id) }}">
    					<div class="card h-100 justify-content-between">
        				
							<img class="img-fluid" src="{{ Storage::url($article->image) }}" alt="{{ $article->title }}">
							<div class="card-body d-flex flex-column">
            					<h4 class="card-title">
                					{{ $article->title }}
            					</h4>
            					<p class="card-text">{{ $article->subtitle }}</p>
        					</div>
													
    					</div>
					</a>
				</div>
			@endforeach
		</div>


</x-layout>