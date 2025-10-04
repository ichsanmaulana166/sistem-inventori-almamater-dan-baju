@extends('layout')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Almamater</title>
    <style>
        /* Mengatur body dan latar belakang */
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: radial-gradient(circle at 70% 50%, #00a4e4, #4EC9EE);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: white;
        }

        /* Container utama */
        .container {
            background-color: #1f2937;
            padding: 18px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4);
            width: 400px;
            text-align: center;
        }

        /* Judul */
        h2 {
            font-size: 2rem;
            margin-bottom: 20px;
            color: #ffffff;
            text-transform: uppercase;
            letter-spacing: 1px;
            text-shadow: 2px 4px 8px rgba(0, 0, 0, 0.2);
        }

        /* Gaya form */
        form {
            width: 100%;
        }

        /* Gaya untuk form-group */
        .mb-3 {
            margin-bottom: 20px;
            text-align: left;
        }

        /* Gaya untuk label */
        label {
            display: block;
            font-size: 1.2rem;
            margin-bottom: 8px;
            color: #cbd5e0;
        }

        /* Gaya untuk select, input */
        select,
        input[type="number"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 10px;
            border: 2px solid transparent;
            border-radius: 8px;
            background-color: #334155;
            color: #ffffff;
            font-size: 1rem;
            box-shadow: inset 0 3px 6px rgba(0, 0, 0, 0.2);
            transition: border 0.3s ease;
        }

        /* Fokus pada select dan input */
        select:focus,
        input[type="number"]:focus {
            border: 2px solid #60a5fa;
            outline: none;
        }

        /* Gaya untuk tombol */
        .btn {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 8px;
            color: white;
            font-size: 1.2rem;
            text-transform: uppercase;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
            margin-bottom: 10px;
        }

        /* Tombol simpan (warna hijau) */
        .btn-success {
            background-color: #00a4e4;
        }

        /* Tombol batal (warna abu-abu) */
        .btn-secondary {
            background-color: #6c757d;
            display: block;
            text-align: center;
            text-decoration: none;
        }

        /* Hover pada tombol */
        .btn:hover {
            transform: translateY(-2px);
        }

        .btn-success:hover {
            background-color: #4EC9EE;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }

        /* Responsif untuk layar lebih kecil */
        @media (max-width: 480px) {
            .container {
                width: 90%;
                padding: 20px;
            }

            h2 {
                font-size: 1.8rem;
            }

            label {
                font-size: 1rem;
            }

            select,
            input[type="number"],
            .btn {
                font-size: 1rem;
                padding: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="container">    
        <h2>Tambah Almamater</h2>

    <form action="{{ route('barang.store-almamater') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="size" class="form-label">Size</label>
            <select name="size" id="size" class="form-control">
                <option value="S">S</option>
                <option value="M">M</option>
                <option value="L">L</option>
                <option value="XL">XL</option>
                <option value="XXL">XXL</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="total" class="form-label">Total</label>
            <input type="number" name="total" id="total" class="form-control" min="0" required>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('barang.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
</body>
</html>
@endsection
