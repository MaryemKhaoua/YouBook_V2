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

  <div class="container mt-5">
    <div class="row row-cols-1 row-cols-md-3 g-4">
      @foreach ($books as $book)
        <div class="col">
          <div class="card h-100">
            <img src="https://www.tirryaq.com/wp-content/uploads/2020/11/zzz.jpg" class="card-img-top" alt="Book Cover">
            <div class="card-body">
              <h5 class="card-title">{{ $book->title }}</h5>
              <p class="card-text">{{ $book->description }}</p>
            </div>
            <div class="card-footer">
              <div class="row">
                <div class="col">
                @if (auth()->user()->isAdmin())
                  <a href="{{ route('books.edit', $book->id) }}" class="btn btn-primary btn-sm">Edit</a>
                </div>
                <div class="col">
                  <form action="{{ route('books.destroy', $book->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                  </form>
                  @endif
                </div>
                <div class="col">
                  <a href="{{ route('books.show', $book->id) }}" class="btn btn-info btn-sm">Details</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>

  <footer class="footer mt-auto py-3 bg-light text-center">
    <div class="container">
      <span class="text-muted">YouBook &copy; 2024</span>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
