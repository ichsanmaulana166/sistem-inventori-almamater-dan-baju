<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Admin</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

body {
    background-color: #52C0E0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.register-container {
    background-color: #52C0E0;
    text-align: center;
}

.register-logo img {
    width: 100px;
    height: 100px;
}

.register-title {
    font-size: 24px;
    font-weight: bold;
    color: black;
    margin: 20px 0;
}

.register-form {
    display: flex;
    flex-direction: column;
    align-items: center;
}

.input-group {
    display: flex;
    align-items: center;
    background-color: white;
    border-radius: 10px;
    width: 300px;
    padding: 10px 20px;
    margin-bottom: 15px;
}

.input-group .icon {
    width: 24px;
    height: 24px;
    margin-right: 10px;
}

.user-icon {
    background: url('https://upload.wikimedia.org/wikipedia/commons/9/99/Icon-round-Question_mark.jpg') no-repeat center center;
    background-size: cover;
}

.email-icon {
    background: url('https://upload.wikimedia.org/wikipedia/commons/a/af/Icon-round-Email.svg') no-repeat center center;
    background-size: cover;
}

.password-icon,
.confirm-password-icon {
    background: url('https://upload.wikimedia.org/wikipedia/commons/2/27/Key_skeleton_%28PSF%29.svg') no-repeat center center;
    background-size: cover;
}

.role-icon {
    background: url('https://upload.wikimedia.org/wikipedia/commons/1/15/Icon-round-Role.svg') no-repeat center center;
    background-size: cover;
}

input,
select {
    border: none;
    outline: none;
    width: 100%;
    font-size: 16px;
}

select {
    background-color: transparent;
    color: #333;
}

input::placeholder,
select option {
    color: #8b8b8bff;
}

.register-button {
    background-color: #4E4E4E;
    color: white;
    font-size: 16px;
    font-weight: bold;
    padding: 10px 50px;
    border: none;
    border-radius: 10px;
    cursor: pointer;
}

.register-button:hover {
    background-color: #3D3D3D;
}

    </style>
</head>
<body>
    <div class="register-container">

        <div class="register-logo">
        <img src="/images/logo.png" alt="Logo">
        </div>
        <h1 class="register-title">REGISTER ADMIN</h1>
        <?php if($errors->any()): ?>
    <div style="background-color: #fff3cd; color: #856404; padding: 10px; border-radius: 8px; margin-bottom: 15px; width: 300px;">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li style="list-style: none;"><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>

        
        <form class="register-form" method="POST" action="<?php echo e(route('register')); ?>">
            <?php echo csrf_field(); ?>

            <!-- Name -->
            <div class="input-group">
                <span class="icon user-icon"></span>
                <input id="name" type="text" name="name" placeholder="Name" required autofocus autocomplete="name">
            </div>

            <!-- Email Address -->
            <div class="input-group">
                <span class="icon email-icon"></span>
                <input id="email" type="email" name="email" placeholder="Email" required autocomplete="username">
            </div>

            <!-- Password -->
            <div class="input-group">
                <span class="icon password-icon"></span>
                <input id="password" type="password" name="password" placeholder="Password" required autocomplete="new-password">
            </div>

            <!-- Confirm Password -->
            <div class="input-group">
                <span class="icon confirm-password-icon"></span>
                <input id="password_confirmation" type="password" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password">
            </div>

            <!-- Role Selection -->
            <div class="input-group">
                <span class="icon role-icon"></span>
                <select id="role" name="role" required>
                    <option value="">Pilih Role</option>
                                        <option value="super admin">Super Admin</option>
                    <option value="admin keuangan">Admin Keuangan</option>
                    <option value="admin barang">Admin Barang</option>
                </select>
            </div>

            <!-- Register Button -->
            <button type="submit" class="register-button">REGISTER</button>
        </form>
    </div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\magang\resources\views/auth/register.blade.php ENDPATH**/ ?>