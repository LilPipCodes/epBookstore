<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>epBookstore</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body { background: #181818; color: #fff; }
        .section-header { background: linear-gradient(90deg, #FF9800, #FF5722); color: #fff; padding: 1.5rem; border-radius: 0.5rem; margin-bottom: 2rem; }
        .filter-chips .chip { display: inline-block; background: linear-gradient(90deg, #FF9800, #FF5722); color: #fff; border-radius: 16px; padding: 0.5rem 1rem; margin-right: 0.5rem; margin-bottom: 0.5rem; font-weight: 500; }
        .btn-gradient { background: linear-gradient(90deg, #FF9800, #FF5722); border: none; color: #fff; }
        .btn-gradient:hover { background: #FF9800; color: #181818; }
        .book-card { background: #232323; color: #fff; border: none; }
        .book-card .card-title { font-weight: bold; }
        .book-card .star-rating { color: #FF9800; }
        .footer { background: #111; color: #fff; padding: 2rem 0; margin-top: 3rem; }
        .footer a { color: #FF9800; text-decoration: none; margin-right: 1rem; }
        .footer a:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <!-- Top Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark" style="background: #111;">
        <div class="container">
            <a class="navbar-brand fw-bold" href="/">epBookstore</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="/books">Popular</a></li>
                    <li class="nav-item"><a class="nav-link" href="/categories">Categories</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Fiction</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Non-Fiction</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">New Releases</a></li>
                </ul>
                <a href="#" class="btn btn-gradient ms-2">Sign Up / Login</a>
            </div>
        </div>
    </nav>
    <!-- Main Content -->
    <main class="py-4">
        @yield('content')
    </main>
    <!-- Footer -->
    <footer class="footer text-center">
        <div class="container">
            <a href="#">About</a>
            <a href="#">Contact</a>
            <a href="#">FAQ</a>
            <a href="#">Terms</a>
            <a href="#"><i class="bi bi-twitter"></i></a>
            <a href="#"><i class="bi bi-facebook"></i></a>
            <a href="#"><i class="bi bi-instagram"></i></a>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
