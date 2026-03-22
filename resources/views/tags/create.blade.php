<x-layout title="Crea nuovo tag">

	<div class="container-fluid extra-padding-container">

		<div class="row">
			<div class="col-12 col-md-8 col-lg-6">
				<h1>Aggiungi un nuovo tag</h1>
			</div>
		</div>

		<div class="row">
			<div class="col-12 col-md-4 col-lg-4 bg-form">

				{{-- Success message --}}
				@if (session('message'))
					<div class="alert alert-success">
						{{ session('message') }}
					</div>
				@endif

				{{-- Validation messages --}}
				@if ($errors->any())
					<div class="alert alert-danger">
						<ul class="error-list">
							@foreach ($errors->all() as $error)
								<li>{!! $error !!}</li>
							@endforeach
						</ul>
					</div>
				@endif

				<form action="{{ route('tags.store') }}" method="POST">
					@csrf

					<div class="mb-4">
						<label for="name" class="form-label">Nome del tag</label>
						<input name="name" value="{{ old('name') }}" type="text" class="form-control" id="name">
					</div>

					<div>
						<button type="submit" class="btn btn-primary-custom">Aggiungi</button>
					</div>
				</form>

			</div>
		</div>

	</div>

</x-layout>