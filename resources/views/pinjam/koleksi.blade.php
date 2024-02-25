<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Personal Book Collection</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Link CSS files -->
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Raleway:400,700'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.2.0/css/all.css'>
    <link rel="stylesheet" href="{{ asset('Template') }}/css/style.css">
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
    <div class="container">
        <a href="#" class="navbar-brand"><i class="fas fa-pen-nib"></i> Designs</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="myNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('pinjam.index') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('koleksi.index') }}">Koleksi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('kembali.index') }}">Pengembalian</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->name }} <i class="fas fa-user"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i> Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <h2 class="mb-4">My Personal Book Collection</h2>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Judul</th>
                <th>Foto</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th>Tahun Terbit</th>
            </tr>
            </thead>
            <tbody>
            {{-- Loop through each book in the collection --}}
            @foreach($books as $book)
                <tr>
                    <td>{{ $book->judul }}</td>
                    <td>
                        <img src="{{asset('img/'.$book->foto)}}" width="100px" alt="{{ $book->judul }}">
                    </td>
                    <td>{{ $book->penulis }}</td>
                    <td>{{ $book->penerbit }}</td>
                    <td>{{ $book->tahun_terbit }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

<footer class="bg-dark">
    <div class="container">
        <div class="row">
            <div class="col d-flex justify-content-center align-items-center text-light">
                <h3>©PUNYA PIDELLLLLLLL</h3>
            </div>
        </div>
    </div>
</footer>

<!-- partial -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/popper.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js'></script>
</body>
</html>
