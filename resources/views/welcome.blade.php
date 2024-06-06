<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Universitas Kayangan Yogyakarta</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>

        body, html {
            height: 100%;
            margin: 0;
            font-family: 'Montserrat', sans-serif;
            background-image: url('images/Background1.png'); /* Ganti dengan path gambar lokal Anda */
            background-size: contain; /* Membuat gambar menutupi seluruh area */
            background-position: center; /* Memusatkan gambar */
            background-repeat: no-repeat; /* Mencegah pengulangan gambar */
        }

        .container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100%;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5); /* Tambahkan shadow */
            background-color: rgba(242, 242, 242, 0.8); /* Ubah warna latar belakang menjadi abu-abu dengan transparansi 0.8 */
        }

        h1 {
            font-size: 4rem;
            margin-bottom: 30px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.7);
            font-weight: bold;
            color: #333;
        }
        .lead {
            font-size: 1.5rem;
            margin-bottom: 20px;
            color: #666;
        }
        .btn-custom {
            margin: 10px;
            padding: 15px 30px;
            font-size: 1.2rem;
            border-radius: 30px;
            transition: background 0.3s ease;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            background-color: #0331ff;
            color: #fff;
            border: none;
        }
        .btn-custom:hover {
            background-color: #6ab0ff;
        }
        .logo {
            width: 100px;
            height: 100px;
            margin-bottom: 20px;
            border-radius: 50%;
            background-color: #fff;
            padding: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            position: absolute;
            top: 20px;
            left: 20px;
        }
        .logo img {
            width: 100%;
            height: 100%;
            border-radius: 50%;
        }
    </style>
</head>
<body>
    <div class="container text-center">
        <div class="logo">
            <img src="{{ asset('images/Logo.png') }}" alt="Logo">
        </div>
        <h1>Universitas Kayangan</h1>
        <p class="lead">Data mahasiswa penting untuk arsip masa depan</p>
        <div>
            <a href="{{ route('login') }}" class="btn btn-custom">Masuk</a>
            <p class="register-text">Belum punya akun? <a href="{{ route('register') }}" class="register-link">Daftar sekarang</a></p>
        </div>
    </div>
    <!-- Bootstrap JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
