<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mengkerent - Login Administrator</title>
    <link rel="stylesheet" href="{{ asset('theme/dist/assets/css/main/app.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/dist/assets/css/pages/auth.css') }}">
    <link rel="shortcut icon" href="{{ asset('theme/dist/assets/images/logo/favicon.svg') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('theme/dist/assets/images/logo/favicon.png') }}" type="image/png">
    <style>
        #auth-left {
            padding-top: 20px; /* Mengurangi padding atas */
        }
        .auth-title, .auth-subtitle {
            margin-top: 10px; /* Mengurangi jarak antara elemen */
        }
    </style>
</head>

<body>
    <div id="auth">
        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="auth-logo">
                        <a href="/"><img src="{{ asset('theme/dist/assets/images/logo/mengkerent.png') }}" alt="Logo" class="img-fluid w-90 h-50"></a>
                    </div>
                    <h1 class="auth-title">Log in.</h1>
                    <p class="auth-subtitle mb-5">Log in dengan akun administrator</p>

                    <form action="/login" method="post">
                        @csrf
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="email" name="email" class="form-control form-control-xl" placeholder="Username" autofocus required>
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" name="password" class="form-control form-control-xl" placeholder="Password" required>
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <div class="form-check form-check-lg d-flex align-items-end">
                            <input class="form-check-input me-2" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label text-gray-600" for="flexCheckDefault">
                                Keep me logged in
                            </label>
                        </div>
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Log in</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">
                    <!-- Optionally, you can add some content here -->
                </div>
            </div>
        </div>
    </div>
</body>

</html>
