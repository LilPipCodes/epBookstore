<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - epBookstore</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body { background: #181818; color: #fff; }
        .sidebar { background: #111; min-height: 100vh; color: #fff; }
        .sidebar .nav-link { color: #fff; border-radius: 0 24px 24px 0; margin-bottom: 0.5rem; }
        .sidebar .nav-link.active, .sidebar .nav-link:hover { background: linear-gradient(90deg, #FF9800, #FF5722); color: #fff; }
        .dashboard-header { background: linear-gradient(90deg, #FF9800, #FF5722); color: #fff; padding: 1.5rem; border-radius: 0.5rem; margin-bottom: 2rem; }
        .kpi-card { background: #232323; color: #fff; border: none; }
        .btn-gradient { background: linear-gradient(90deg, #FF9800, #FF5722); border: none; color: #fff; }
        .btn-gradient:hover { background: #FF9800; color: #181818; }
        .table-dark { background: #232323; color: #fff; }
    </style>
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <nav class="sidebar p-3">
            <h2 class="fw-bold mb-4">Admin</h2>
            <ul class="nav flex-column">
                <li class="nav-item"><a class="nav-link active" href="/admin">Dashboard</a></li>
                <li class="nav-item"><a class="nav-link" href="/admin/books">Books</a></li>
                <li class="nav-item"><a class="nav-link" href="/admin/users">Users</a></li>
                <li class="nav-item"><a class="nav-link" href="/admin/categories">Categories</a></li>
                <li class="nav-item"><a class="nav-link" href="/admin/reports">Reports</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Settings</a></li>
            </ul>
        </nav>
        <!-- Main Content -->
        <div class="flex-grow-1">
            <!-- Top Bar -->
            <nav class="navbar navbar-expand navbar-dark" style="background: #232323;">
                <div class="container-fluid">
                    <form class="d-flex me-auto">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    </form>
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item me-3">
                            <a class="nav-link" href="#"><span class="badge bg-danger">3</span> <i class="bi bi-bell"></i></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="https://ui-avatars.com/api/?name=Admin" class="rounded-circle" width="32" height="32" alt="Profile"> Admin
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li><a class="dropdown-item" href="#">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
            <main class="p-4">
                @yield('content')
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
