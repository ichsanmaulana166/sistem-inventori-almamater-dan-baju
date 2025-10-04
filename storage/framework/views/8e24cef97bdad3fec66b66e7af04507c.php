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
            <a href="/tahun_masuk" id="btn-tahun" onclick="showTahun()"><i class="fas fa-calendar-alt"></i><span>📅 TAHUN</span></a>
            <a href="/siswa" id="btn-siswa" onclick="showTahunSiswa()"><i class="fas fa-users"></i><span>👤 SISWA</span></a>
            <a href="#" id="btn-laporan" onclick="showLaporan()"><i class="fas fa-file-alt"></i><span>📝 LAPORAN</span></a>
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

        <!-- First Content: Data Tahun Masuk -->
        <div class="main-content hidden" id="data-tahun-masuk">

        </div>

        <!-- Second Content: Data Tahun Siswa -->
        <div class="main-content hidden" id="data-tahun-siswa">

        </div>

        <!-- Third Content: Data Siswa -->
        <div class="main-content hidden" id="data-siswa">

        </div>

<!-- Fourth Content: Daftar Siswa Pembayaran Laporan -->
<div class="main-content" id="data-laporan">
    <h2>Daftar Siswa Berdasarkan Status Pembayaran</h2>

    <!-- Bagian Sudah Membayar -->
    <div class="table-container">
        <h3>Sudah Membayar</h3>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>NISN</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Status Pembayaran</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $sudahMembayar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $siswa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($index + 1); ?></td>
                        <td><?php echo e($siswa->nisn); ?></td>
                        <td><?php echo e($siswa->nama); ?></td>
                        <td><?php echo e($siswa->kelas); ?></td>
                        <td><?php echo e($siswa->status_pembayaran); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>

    <!-- Bagian Belum Membayar -->
    <div class="table-container" style="margin-top: 20px;">
        <h3>Belum Membayar</h3>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>NISN</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Status Pembayaran</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $belumMembayar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $siswa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($index + 1); ?></td>
                        <td><?php echo e($siswa->nisn); ?></td>
                        <td><?php echo e($siswa->nama); ?></td>
                        <td><?php echo e($siswa->kelas); ?></td>
                        <td><?php echo e($siswa->status_pembayaran); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
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
            window.location.href = '<?php echo e(route("laporan.index")); ?>';

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
<?php /**PATH C:\xampp\htdocs\magang\resources\views/laporan/index.blade.php ENDPATH**/ ?>