<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Error 403 - Forbidden</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Mengimpor font Poppins dari Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Mengimpor Bootstrap CSS dari CDN -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Mengimpor file CSS kustom error.css -->
    <link href="{{ asset('css/error.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container text-center">
        <div class="row justify-content-center">
            <div class="col-md-8 bgcard d-flex justify-content-center align-item-center">
                <div class="card bg-dark text-white shadow-lg">
                    <div class="card-body">
                        <!-- Judul error dengan kode status -->
                        <h1 class="display-1 text-orange">403</h1>
                        <!-- Deskripsi error -->
                        <h2 class="display-4">Access Denied.</h2>
                        <hr class="my-4 border-orange">
                        <!-- Pesan penjelasan tentang akses yang ditolak -->
                        <p class="lead">Sorry, you don't have permission to access this page. Please contact the administrator if you believe this is a mistake.</p>
                        <!-- Tombol untuk kembali ke halaman utama -->
                        <a href="{{ url('/') }}" class="btn btn-orange btn-lg mb-2 text-white">Back to Homepage</a>
                        <br>
                        <!-- Tombol untuk kembali ke halaman sebelumnya menggunakan JavaScript -->
                        <button class="btn btn-outline-light btn-lg gobackBtn" onclick="javascript:history.back()">< Go Back</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Mengimpor jQuery dari CDN -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <!-- Mengimpor Popper.js dari CDN -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <!-- Mengimpor Bootstrap JS dari CDN -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
