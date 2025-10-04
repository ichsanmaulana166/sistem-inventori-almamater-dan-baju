<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Sistem Inventori</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            display: flex;
            height: 100vh;
            background-color: #f0f0f0;
        }

        /* Sidebar */
        .sidebar {
            width: 250px;
            background-color: #4EC9EE;
            color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-top: 20px;
        }

        .sidebar img {
            width: 60px;
            height: 60px;
            border-radius: 50%;
        }

        .sidebar h3 {
            margin-top: 20px;
            font-size: 18px;
            text-align: center;
        }

        .sidebar .menu {
            margin-top: 40px;
            width: 100%;
        }

        .sidebar .menu a {
            display: flex;
            align-items: center;
            padding: 15px;
            text-decoration: none;
            color: white;
            font-size: 16px;
            border-bottom: 1px solid #1f9cc7;
        }

        .sidebar .menu a:hover {
            background-color: #00a4e4;
        }

        .sidebar .menu a i {
            margin-right: 15px;
            font-size: 20px;
        }

        .sidebar .menu a span {
            font-size: 16px;
        }

        /* Main content */
        .content {
            flex: 1;
            background-color: white;
            padding: 20px;
        }

        .content1 {
            flex: 1;
            background-color: white;
            padding: 1px;
        }

        .header {
            justify-content: space-between;
            background-color: #4EC9EE;
            color: white;
            padding: 30px ;
        }

        .header h1 {
            font-size: 24px;
            text-align: right;
        }

        .header .menu-icon {
            font-size: 30px;
            cursor: pointer;
        }

        /* Table Section */
        .main-content {
            margin-top: 20px;
        }

        .main-content h2 {
            background-color: #4EC9EE;
            color: white;
            padding: 10px;
            border-radius: 5px;
        }

        .main-content .actions {
            margin: 20px 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .main-content .actions button {
            background-color: #4EC9EE;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .main-content .actions button:hover {
            background-color: #00a4e4;
        }

        .main-content .actions input {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .table-container {
            background-color: #f0f0f0;
            padding: 20px;
            border-radius: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        table th, table td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ccc;
        }

        table th {
            background-color: #4EC9EE;
            color: white;
        }

        table td {
            background-color: #4EC9EE;
            color: black;
        }

        table td a {
            text-decoration: none;
            color: black;
        }

        table td a:hover {
            color: #00a4e4;
        }

        table td i {
            font-size: 20px;
        }

        /* Hidden content */
        .main-content.hidden {
            display: none;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                width: 200px;
            }
            
            .header h1 {
                font-size: 18px;
            }

            .main-content h2 {
                font-size: 18px;
            }

            table th, table td {
                font-size: 14px;
                padding: 8px;
            }
        }

        @media (max-width: 480px) {
            .sidebar {
                width: 150px;
            }

            .header h1 {
                font-size: 16px;
            }

            table th, table td {
                font-size: 12px;
                padding: 6px;
            }

            .main-content .actions button {
                font-size: 12px;
                padding: 8px 10px;
            }

            .main-content .actions input {
                font-size: 12px;
                padding: 8px;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
    <img src="/images/user_icon.png" alt="Logo">
    <h3>Selamat Datang<br>Admin Keuangan</h3>
        <div class="menu">
            <a href="#" id="btn-tahun" onclick="showTahun()"><i class="fas fa-calendar-alt"></i><span>📅 TAHUN</span></a>
            <a href="/siswa/datatahunsiswa" id="btn-siswa"><i class="fas fa-users"></i><span>👤 SISWA</span></a>
            <a href="/laporan" id="btn-laporan" onclick="showLaporan()"><i class="fas fa-file-alt"></i><span>📝 LAPORAN</span></a>
            <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();"><i></i>
                        {{ __('⭕ LOGOUT') }}
                    </x-responsive-nav-link>
                </form>
        </div>
    </div>

    <!-- Main Content -->
    <div class="content1">
        <!-- Header -->
        <div class="header">
            <h1>Sistem Inventori Almamater</h1>
        </div>
        <div class="content">

        <!-- First Content: Data Tahun Masuk -->
        <div class="main-content" id="data-tahun-masuk">
            <h2>Data Tahun Masuk</h2>
            <div class="table-container">
            <div class="actions">
                <div>
    <form method="GET" action="{{ route('tahun_masuk.index') }}" id="filterForm">
        <button type="button" onclick="window.location='{{ route('tahun_masuk.create') }}'">+ Tahun Masuk</button>
        </div>

        <div>
            Show 
            <select name="entries" onchange="document.getElementById('filterForm').submit()">
                <option value="10" {{ request('entries') == 10 ? 'selected' : '' }}>10</option>
                <option value="25" {{ request('entries') == 25 ? 'selected' : '' }}>25</option>
                <option value="50" {{ request('entries') == 50 ? 'selected' : '' }}>50</option>
            </select>
            entries
        </div>
        <div>
            <label for="search">Search:</label>
            <input placeholder="Cari Tahun" type="text" id="search" name="search" value="{{ request('search') }}" onkeyup="document.getElementById('filterForm').submit()">
        </div>
    </form>
</div>




                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tahun</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
            @foreach ($tahunMasuks as $index => $tahunMasuk)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $tahunMasuk->tahun }}</td>
                <td>
                    <a href="{{ route('tahun_masuk.edit', $tahunMasuk->id) }}">Edit /</a>
                    <form action="{{ route('tahun_masuk.destroy', $tahunMasuk->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
                </table>
                <div>
    {{ $tahunMasuks->appends(request()->query())->links() }}
</div>

            </div>
        </div>

        <!-- Second Content: Data Tahun Siswa -->
        <div class="main-content hidden" id="data-tahun-siswa">


            </div>
        </div>

        <!-- Third Content: Data Siswa -->
        <div class="main-content hidden" id="data-siswa">

        </div>

        <!-- Fourth Content: Daftar Siswa Pembayaran Laporan -->
        <div class="main-content hidden" id="data-laporan">

    </div>

    <!-- Font Awesome for icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <!-- JavaScript for toggling content -->
    <script>
        function showTahun() {
            // Hide all other contents
            hideAll();
            // Show the "Data Tahun" content
            document.getElementById('data-tahun-masuk').classList.remove('hidden');
        }

        function showTahunSiswa() {
            // Hide all other contents
            hideAll();
            // Show the "Data Siswa" content
            document.getElementById('data-tahun-siswa').classList.remove('hidden');
        }
        function showSiswa() {
            // Hide all other contents
            hideAll();
            // Show the "Data Siswa" content
            document.getElementById('data-siswa').classList.remove('hidden');
        }


        function showLaporan() {
            // Hide all other contents
            hideAll();
            // Show the "Data Laporan" content
            document.getElementById('data-laporan').classList.remove('hidden');
        }

        function hideAll() {
            // Hide all content sections
            document.getElementById('data-tahun-masuk').classList.add('hidden');
            document.getElementById('data-tahun-siswa').classList.add('hidden');
            document.getElementById('data-siswa').classList.add('hidden');
            document.getElementById('data-laporan').classList.add('hidden');
        }
    </script>
</body>
</html>
