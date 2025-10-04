<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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

.login-container {
    background-color: #52C0E0;
    text-align: center;
}

.login-logo img {
    width: 100px;
    height: 100px;
}

.login-title {
    font-size: 24px;
    font-weight: bold;
    color: black;
    margin: 20px 0;
}

.login-form {
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

/* Local user-icon and key-icon paths */
.user-icon {
    background: url('/images/user_icon.png') no-repeat center center;
    background-size: cover;
}

.key-icon {
    background: url('/images/password_icon.png') no-repeat center center;
    background-size: cover;
}

input {
    border: none;
    outline: none;
    width: 100%;
    font-size: 16px;
}

input::placeholder {
    color: #aaa;
}

.login-button {
    background-color: #4E4E4E;
    color: white;
    font-size: 16px;
    font-weight: bold;
    padding: 10px 50px;
    border: none;
    border-radius: 10px;
    cursor: pointer;
}

.login-button:hover {
    background-color: #3D3D3D;
}
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-logo">
            <img src="/images/logo.png" alt="Logo">
        </div>
        <h1 class="login-title">SISTEM INVENTORI ALMAMATER</h1>

        <form class="login-form" method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Username -->
            <div class="input-group">
                <span class="icon user-icon"></span>
                <input id="email" type="email" name="email" placeholder="Username" required>
            </div>

            <!-- Password -->
            <div class="input-group">
                <span class="icon key-icon"></span>
                <input id="password" type="password" name="password" placeholder="Password" required>
            </div>

            <!-- Login Button -->
            <button type="submit" class="login-button">LOGIN</button>
        </form>
    </div>
</body>
</html>
