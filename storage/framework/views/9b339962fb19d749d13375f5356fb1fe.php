<!-- resources/views/tahun_masuk/edit.blade.php -->


<?php $__env->startSection('content'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Tahun Masuk - Form</title>
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

        /* Container utama untuk form */
        .main-content {
            background-color: #1f2937;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4);
            width: 400px;
            text-align: center;
        }
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            max-width: 100%;
            padding: 20px;
        }

        /* Judul di atas form */
        .main-content h2 {
            font-size: 1.9rem;
            margin-bottom: 60px;
            color: #ffffff;
            text-transform: uppercase;
            letter-spacing: 1px;
            text-shadow: 2px 4px 8px rgba(0, 0, 0, 0.2);
        }

        /* Label untuk input */
        label {
            display: block;
            font-size: 1.2rem;
            margin-bottom: 10px;
            text-align: left;
            color: #cbd5e0;
        }

        /* Gaya untuk input teks */
        input[type="text"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 2px solid transparent;
            border-radius: 10px;
            background-color: #334155;
            color: #ffffff;
            font-size: 1rem;
            box-shadow: inset 0 3px 6px rgba(0, 0, 0, 0.2);
            transition: border 0.3s ease;
        }

        /* Fokus pada input */
        input[type="text"]:focus {
            border: 2px solid #60a5fa;
            outline: none;
        }

        /* Tombol simpan */
        button {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 10px;
            background-color: #00a4e4;
            color: white;
            font-size: 1.2rem;
            text-transform: uppercase;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        /* Hover pada tombol */
        button:hover {
            background-color: #4EC9EE;
            transform: translateY(-2px);
        }

        /* Responsif untuk layar lebih kecil */
        @media (max-width: 480px) {
            .main-content {
                width: 90%;
                padding: 20px;
            }

            .main-content h2 {
                font-size: 1.5rem;
            }

            label {
                font-size: 1rem;
            }

            input[type="text"],
            button {
                font-size: 1rem;
                padding: 10px;
            }
        }
    </style>
</head>
<body>
<div class="container">
    <div class="main-content">
    <h2>Edit Tahun Masuk</h2>
    <form action="<?php echo e(route('tahun_masuk.update', $tahunMasuks->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <input type="text" id="tahun" name="tahun" value="<?php echo e($tahunMasuks->tahun); ?>" required>
        <button type="submit">Update</button>
    </form>
</div>
</div>
</body>
</html>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\magang\resources\views/tahun_masuk/edit.blade.php ENDPATH**/ ?>