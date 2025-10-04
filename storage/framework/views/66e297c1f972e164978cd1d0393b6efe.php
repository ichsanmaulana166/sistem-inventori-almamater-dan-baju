<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>

        <!-- Styles -->
        <style>
            /* Mengatur body dan latar belakang */
            html, body {
                height: 100%; /* Memastikan body memenuhi layar */
                margin: 0;
                font-family: 'Figtree', sans-serif;
                background: #4EC9EE;
                color: white;
                display: flex;
                flex-direction: column;
            }

            /* Container utama */
            .container {
                text-align: center;
                width: 100%;
                flex: 1; /* Mengambil sisa tinggi yang ada */
                display: flex;
                flex-direction: column;
            }

            /* Header */
            header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 20px;
            }

            header nav {
                margin-left: auto; /* Menempatkan navigasi di kanan */
            }

            header nav a {
                color: #000;
                text-transform: uppercase;
                text-decoration: none;
                padding: 10px 20px;
                border: 2px solid transparent;
                transition: 0.3s;
            }

            header nav a:hover {
                border-bottom: 2px solid #fff;
            }

            /* Main content */
            .content {
                margin-top: 100px;
                margin-bottom: 100px;
                flex: 1; /* Isi bagian tengah dengan sisa ruang */
            }

            .content h1 {
                font-size: 3rem;
                margin-bottom: 20px;
                font-weight: bold;
                color: #000;
            }

            .content p {
                font-size: 1.2rem;
                color: #000;
            }

            /* Footer */
            footer {
                text-align: center;
                padding: 20px;
                font-size: 0.9rem;
                color: #000;
                background-color: #00a4e4; /* Opsional, menambah kontras footer */
            }

            /* Responsive design */
            @media (max-width: 768px) {
                .content h1 {
                    font-size: 2.5rem;
                }

                .content p {
                    font-size: 1rem;
                }

                header {
                    flex-direction: column;
                    gap: 10px;
                }
            }
        </style>
    </head>
    <body>
        <div class="container">
            <!-- Header -->
            <header>
                <div></div> <!-- Placeholder for logo or other content -->

                <?php if(Route::has('login')): ?>
                    <nav>
                        <?php if(auth()->guard()->check()): ?>
                            <a href="<?php echo e(url('/dashboard')); ?>">Dashboard</a>
                        <?php else: ?>
                            <a href="<?php echo e(route('login')); ?>">Log in</a>
                        <?php endif; ?>
                    </nav>
                <?php endif; ?>
            </header>

            <!-- Main content -->
            <div class="content">
                <h1>Selamat Datang Di Sistem Inventori Almamater & Baju</h1>
                <p>Sistem inventori yang simple dan elegan</p>
            </div>

            <!-- Footer -->
            <footer>
                FI TECHNOLOGY
            </footer>
        </div>
    </body>
</html>
<?php /**PATH C:\xampp\htdocs\magang\resources\views/welcome.blade.php ENDPATH**/ ?>