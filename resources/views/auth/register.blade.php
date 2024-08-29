<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/styleAuth.css') }}">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center position-relative">

        <!-- Logo Image 1 -->
        <img src="{{ asset('assets/auth/logo-kubukami.png') }}" alt="Logo 1" class="bg-logo bg-logo-1">
        <!-- Logo Image 2 -->
        <img src="{{ asset('assets/auth/logo-kubukami.png') }}" alt="Logo 2" class="bg-logo bg-logo-2">

        <div class="card p-4 border-0 transparent-card bg-transparent">
            <!-- The floating image -->
            <img src="{{ asset('assets/auth/3d-business-young-man-raising-his-fists 1.png') }}" alt="Man Image" class="floating-image">
            <div class="text-center mb-4">
                <h2>Daftar Sekarang</h2>
            </div>
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div class="mb-3">
                    <input type="text" class="form-control shadow-input" name="name" placeholder="Nama" aria-label="Nama" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div class="mb-3">
                    <input type="email" class="form-control shadow-input" name="email" placeholder="Email" aria-label="Email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <input type="password" class="form-control shadow-input" name="password" placeholder="Password" aria-label="Password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="mb-3">
                    <input type="password" class="form-control shadow-input" name="password_confirmation" placeholder="Konfirmasi Password" aria-label="Konfirmasi Password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="d-grid">
                    <button class="btn btn-primary">Daftar Sekarang</button>
                </div>
                <div class="text-center my-3">
                    <span>Atau Daftar Dengan</span>
                </div>
                <div class="d-grid">
                    <button class="btn btn-outline-secondary"><img src="https://img.icons8.com/color/16/000000/google-logo.png"/> Daftar dengan Google</button>
                </div>
                <div class="text-center my-3">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>