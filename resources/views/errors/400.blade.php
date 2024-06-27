<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Error 400 - Bad Request</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/error.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container text-center">
        <div class="row justify-content-center">
            <div class="col-md-8 bgcard d-flex justify-content-center align-item-center">
                <div class="card bg-dark text-white shadow-lg">
                    <div class="card-body">
                        <h1 class="display-1 text-orange">400</h1>
                        <h2 class="display-4">Bad Request</h2>
                        <hr class="my-4 border-orange">
                        <p class="lead">The server cannot or will not process the request due to something that is perceived to be a client error.</p>
                        <a href="{{ url('/') }}" class="btn btn-orange btn-lg mb-2  text-white">Back to Homepage</a>
                        <br>
                        <button class="btn btn-outline-light btn-lg gobackBtn" onclick="javascript:history.back()">< Go Back</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
