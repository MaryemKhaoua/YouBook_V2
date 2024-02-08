<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Books</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-info shadow-sm">
    <div class="container-fluid">
      <a class="navbar-brand h1" href="{{ route('books.index') }}">YouBook</a>
      <div class="col text-end">
        <a class="btn btn-sm btn-light" href="{{ route('books.create') }}">Add Book</a>
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
                  <a href="{{ route('books.edit', $book->id) }}" class="btn btn-primary btn-sm">Edit</a>
                </div>
                <div class="col">
                  <form action="{{ route('books.destroy', $book->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                  </form>
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
