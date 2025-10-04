@extends('layout')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Siswa</title>
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
            height: 94vh;
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
        h1 {
            font-size: 2.3rem;
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
        .form-group {
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

        /* Gaya untuk input, select */
        input[type="text"],
        select {
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

        /* Fokus pada input dan select */
        input[type="text"]:focus,
        select:focus {
            border: 2px solid #60a5fa;
            outline: none;
        }

        /* Gaya untuk tombol */
        .btn {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 8px;
            background-color: #00a4e4;
            color: white;
            font-size: 1.2rem;
            text-transform: uppercase;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        /* Hover pada tombol */
        .btn:hover {
            background-color: #4EC9EE;
            transform: translateY(-2px);
        }

        /* Gaya untuk alert */
        .alert {
            background-color: #ff4d4d;
            color: white;
            padding: 10px;
            border-radius: 8px;
            margin-top: 20px;
            text-align: left;
        }

        .alert ul {
            margin: 0;
            padding-left: 20px;
        }

        /* Responsif untuk layar lebih kecil */
        @media (max-width: 480px) {
            .container {
                width: 90%;
                padding: 20px;
            }

            h1 {
                font-size: 2rem;
            }

            label {
                font-size: 1rem;
            }

            input[type="text"],
            select,
            .btn {
                font-size: 1rem;
                padding: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Tambah Siswa</h1>
    <form action="{{ route('siswa.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="nisn">NISN</label>
            <input type="text" name="nisn" id="nisn" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="kelas">Kelas</label>
            <input type="text" name="kelas" id="kelas" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="status_pembayaran">Status Pembayaran</label>
            <select name="status_pembayaran" id="status_pembayaran" class="form-control" required>
                <option value="">- Pilih Status -</option>
                <option value="Sudah Membayar">Sudah Membayar</option>
                <option value="Belum Membayar">Belum Membayar</option>
            </select>
        </div>
        
        <label for="tahun_masuk_id">Tahun Masuk:</label>
    <select name="tahun_masuk_id" id="tahun_masuk_id">
        <option value="">-- Pilih Tahun Masuk --</option>
        @foreach ($tahunMasuks as $tahunMasuk)
            <option value="{{ $tahunMasuk->id }}">{{ $tahunMasuk->tahun }}</option>
        @endforeach
    </select>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</div>
</body>
</html>
@endsection
