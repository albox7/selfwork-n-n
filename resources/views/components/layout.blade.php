<!DOCTYPE html>
<html lang="it">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>{{ $title ?? 'Vento del sud' }}</title>
		<link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500&family=Nunito:wght@400;500&display=swap" rel="stylesheet">
		@vite(['resources/css/app.css', 'resources/js/app.js'])
	</head>
	<body class="bg-body">

		{{-- NAVBAR --}}
		<nav id="navbar" class="navbar navbar-expand-lg">
			<div class="container-fluid">
				<a class="navbar-brand" href="{{ route('home') }}">
					<span class="d-block">Vento del sud</span>
					<small>Racconti dalla fine del mondo</small>
				</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNav">
					<ul class="navbar-nav ms-auto">
						<li class="nav-item">
							<a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" {{ request()->routeIs('home') ? 'aria-current="page"' : '' }} href="{{ route('home') }}">Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link {{ request()->routeIs('articles.create') ? 'active' : '' }}" {{ request()->routeIs('articles.create') ? 'aria-current="page"' : '' }} href="{{ route('articles.create') }}">Nuovo post</a>
						</li>
						<li class="nav-item">
							<a class="nav-link {{ request()->routeIs('tags.create') ? 'active' : '' }}" href="{{ route('tags.create') }}">Nuovo tag</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>


		{{-- CONTENUTO --}}
		<main>
			{{ $slot }}
		</main>

		
		{{-- FOOTER --}}
		<footer>
			&copy; {{ date('Y') }} - <a href="/">Vento del sud</a> &middot; Racconti dalla fine del mondo
		</footer>

	</body>
</html>
