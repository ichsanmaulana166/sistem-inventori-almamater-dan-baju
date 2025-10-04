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
            flex-direction: row;

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
            flex-shrink: 0; /* Mencegah sidebar berubah ukuran */

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

        /* Submenu */
        .submenu {
            display: none; /* Submenu disembunyikan secara default */
            flex-direction: column;
            width: 100%;
        }

        .submenu a {
            padding-left: 40px;
            font-size: 14px;
            background-color: #2BBEEA;
        }

        /* Main content */
        .content {
            flex: 1;
            overflow-y: auto;
            background-color: white;
            padding: 20px;
        }

        .content1 {
            flex: 1;
            display: flex;
            background-color: white;
            padding: 1px;
            flex-direction: column;

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
            margin: 10px 0;
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
            overflow-x: auto; /* Tambahkan scrolling horizontal */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            overflow-x: auto; /* Tambahkan scrolling horizontal */

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
        <h3>Selamat Datang<br>Admin Barang</h3>
        <div class="menu">
            <a href="/barang" id="btn-barang" onclick="showBarang()"><i class="fas fa-users"></i><span>🛒 BARANG</span></a>
            <a href="#" id="btn-siswa" onclick="showSiswa()"><i class="fas fa-calendar-alt"></i><span>👤 SISWA</span></a>
            <a href="#" id="btn-laporan" onclick="toggleSubmenu()"><i class="fas fa-file-alt"></i><span>📝 LAPORAN</span></a>
            <div class="submenu" id="submenu-laporan">
                <a href="/barang/laporan-penambahan" onclick="showLaporanPenambahan()"><i><i></i></i>Penambahan</a>
                <a href="/dashboard_barang/laporan_pengambilan" onclick="showLaporanPengambilan()"><i><i></i></i>Pengambilan</a>
            </div>
            <form method="POST" action="<?php echo e(route('logout')); ?>">
                    <?php echo csrf_field(); ?>
                    <?php if (isset($component)) { $__componentOriginald69b52d99510f1e7cd3d80070b28ca18 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald69b52d99510f1e7cd3d80070b28ca18 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.responsive-nav-link','data' => ['href' => route('logout'),'onclick' => 'event.preventDefault();
                                        this.closest(\'form\').submit();']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('responsive-nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('logout')),'onclick' => 'event.preventDefault();
                                        this.closest(\'form\').submit();']); ?><i></i>
                        <?php echo e(__('⭕ LOGOUT')); ?>

                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald69b52d99510f1e7cd3d80070b28ca18)): ?>
<?php $attributes = $__attributesOriginald69b52d99510f1e7cd3d80070b28ca18; ?>
<?php unset($__attributesOriginald69b52d99510f1e7cd3d80070b28ca18); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald69b52d99510f1e7cd3d80070b28ca18)): ?>
<?php $component = $__componentOriginald69b52d99510f1e7cd3d80070b28ca18; ?>
<?php unset($__componentOriginald69b52d99510f1e7cd3d80070b28ca18); ?>
<?php endif; ?>
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

                <!-- First Content: Data Barang -->
                <div class="main-content hidden" id="data-barang">

</div>

        <!-- Second Content: Data Siswa -->
        <div class="main-content" id="data-siswa">
            <h2>Data Siswa</h2>

            <div class="table-container">
            <div class="actions">
            <div>
                            Show 
                            <select id="entriesPerPage" onchange="fetchFilteredData()">
                                <option value="10" <?php echo e(request('entries_per_page') == 10 ? 'selected' : ''); ?>>10</option>
                                <option value="25" <?php echo e(request('entries_per_page') == 25 ? 'selected' : ''); ?>>25</option>
                                <option value="50" <?php echo e(request('entries_per_page') == 50 ? 'selected' : ''); ?>>50</option>
                            </select>
                            entries
                        </div>
                        <div>
                            Pilih Tahun:
                            <select id="tahunMasuk" class="form-select" onchange="fetchFilteredData()">
                                <option value="">-Tahun-</option>
                                <?php $__currentLoopData = $tahunMasuks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tahunMasuk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($tahunMasuk->id); ?>" <?php echo e(request('tahun_masuk_id') == $tahunMasuk->id ? 'selected' : ''); ?>>
                    <?php echo e($tahunMasuk->tahun); ?>

                </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div>
                            <label for="search">Search:</label>
                            <input type="text" id="search" name="search" placeholder="Cari NISN..." value="<?php echo e(request('search')); ?>" onkeyup="fetchFilteredData()">
                        </div>
            </div>
            <form action="<?php echo e(route('siswa.savePengambilan')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>NISN</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Ukuran Almamater</th>
                <th>Ukuran Baju</th>
                <th>Kartu NISN</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($index + 1); ?></td>
                    <td><input type="hidden" name="students[<?php echo e($index); ?>][nisn]" value="<?php echo e($student->nisn); ?>"><?php echo e($student->nisn); ?></td>
                    <td><?php echo e($student->nama); ?></td>
                    <td><?php echo e($student->kelas); ?></td>
                    <td>
    <select name="students[<?php echo e($index); ?>][almamater_size]">
        <option value="">-Ukuran Almamater-</option>
        <?php $__currentLoopData = $almamaterSizes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $almamater): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($almamater->size); ?>">
                <?php echo e($almamater->size); ?> (Tersedia: <?php echo e($almamater->total); ?>)
            </option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
</td>
<td>
    <select name="students[<?php echo e($index); ?>][baju_size]">
        <option value="">-Ukuran Baju-</option>
        <?php $__currentLoopData = $bajuSizes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $baju): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($baju->size); ?>">
                <?php echo e($baju->size); ?> (Tersedia: <?php echo e($baju->total); ?>)
            </option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
</td>
                    <td><input type="checkbox" name="students[<?php echo e($index); ?>][kartu_nisn]" value="1"></td>
                    <td><button type="submit">SIMPAN</button></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</form>

            </div>
        </div>


        <!-- Third Content: Data Laporan Penambahan-->
        <div class="main-content hidden" id="data-laporan-penambahan">

        </div>


        <!-- Fourth Content: Data Laporan Pengambilan-->
        <div class="main-content hidden" id="data-laporan-pengambilan">
 
        </div>

    <!-- Font Awesome for icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <!-- JavaScript for toggling content -->
    <script>
        function showSiswa() {
            // Hide all other contents
            hideAll();
            // Show the "Data Tahun" content
            document.getElementById('data-siswa').classList.remove('hidden');
        }

        function showBarang() {
            // Hide all other contents
            hideAll();
            // Show the "Data Siswa" content
            document.getElementById('data-barang').classList.remove('hidden');
        }
        function showLaporanPenambahan() {
            // Hide all other contents
            hideAll();
            // Show the "Data Siswa" content
            document.getElementById('data-laporan-penambahan').classList.remove('hidden');
        }
        function showLaporanPengambilan() {
            // Hide all other contents
            hideAll();
            // Show the "Data Siswa" content
            document.getElementById('data-laporan-pengambilan').classList.remove('hidden');
        }
        function toggleSubmenu() {
            const submenu = document.getElementById('submenu-laporan');
            submenu.style.display = submenu.style.display === 'flex' ? 'none' : 'flex';
        }

        function hideAll() {
            // Hide all content sections
            document.getElementById('data-siswa').classList.add('hidden');
            document.getElementById('data-barang').classList.add('hidden');
            document.getElementById('data-laporan-penambahan').classList.add('hidden');
            document.getElementById('data-laporan-pengambilan').classList.add('hidden');
        }

        document.querySelectorAll('.btn-save').forEach(button => {
    button.addEventListener('click', function() {
        const row = this.closest('tr');
        const data = {
            nisn: row.querySelector('td:nth-child(2)').textContent,
            almamater_size: row.querySelector('select[name="almamater_size[]"]').value,
            baju_size: row.querySelector('select[name="baju_size[]"]').value,
            kartu_nisn: row.querySelector('input[name="kartu_nisn[]"]').checked ? 1 : 0,
        };

        fetch('/barang/siswa/save', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify(data)
        }).then(response => response.json())
          .then(data => {
              if (data.success) {
                  alert('Data berhasil disimpan!');
              } else {
                  alert('Gagal menyimpan data.');
              }
          }).catch(error => console.error('Error:', error));
    });
});

function fetchFilteredData() {
            const entriesPerPage = document.getElementById('entriesPerPage').value;
            const tahunMasuk = document.getElementById('tahunMasuk').value;
            const search = document.getElementById('search').value;

            const params = new URLSearchParams({
                entries_per_page: entriesPerPage,
                tahun_masuk_id: tahunMasuk,
                search: search,
            });

            // Redirect with updated query params
            window.location.href = `?${params.toString()}`;
        }

    </script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\magang\resources\views/barang/siswa.blade.php ENDPATH**/ ?>