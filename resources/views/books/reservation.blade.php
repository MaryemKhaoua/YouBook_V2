<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>YouBook</title>
</head>
<style>
    .navbar-brand {
    color: #339898;
    font-weight: bold;
}

.navbar-nav {
    margin-left: auto;
}
</style>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container">
        <a class="navbar-brand" href="{{ route('books.index') }}" style="color: #1F2532;"><span style="color: #597E52;" class="nav-brand-two">You</span>Book</a> 
            <button aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler" data-bs-target="#navbarSupportedContent" data-bs-toggle="collapse" type="button"><span class="navbar-toggler-icon"></span></button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav ms-auto mb-2 mb-lg-0">
					@if (auth()->user()->isAdmin())
					<li class="nav-item">
						<a class="nav-link navigation" href="{{ route('books.add') }}">Add Book</a>
					</li>
          @endif
					<li class="nav-item">
						<a class="nav-link ml-5 navigation" href="{{ route('books.reservation') }}">Reservation</a>
					</li>
                    <li class="nav-item">
						<a class="nav-link ml-5 navigation" href="{{ route('user.logout') }}">Log Out</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
    <div class="container">
        <h1 class="mt-5 mb-4">Reservations</h1>

        <div class="row">
            @foreach ($reservation as $reservation)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Reservation ID: {{ $reservation->id }}</h5>
                        <p class="card-text">Book ID: {{ $reservation->book_id }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
