<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Dashboard Super Admin</title>
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




    .menu-btn:hover {
      background-color: #2563eb;
    }

    /* Main Content */
    .main-content {
      flex: 1;
      padding: 40px;
      position: relative;
                  background-color: white;

    }

    .main-content h1 {
      font-size: 35;
      color: #000000ff;
      margin-bottom: 40px;
      margin-left: 420px;
    }

.p{
  font-size: 25px;
        margin-bottom: 20px;

}
    /* Overlay */
    .overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      display: none;
      justify-content: center;
      align-items: center;
      z-index: 1000;
    }

    .overlay.show {
      display: flex;
    }

    /* Popup Menu */
    .popup-menu {
      background-color: #1f9cc7;
      padding: 30px 40px;
      border-radius: 10px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
      text-align: center;
      min-width: 300px;
      animation: fadeIn 0.3s ease;
    }

    .popup-menu h3 {
      margin-bottom: 25px;
      color: #ffffffff;
    }

    .popup-menu a {
      display: block;
      margin-bottom: 15px;
      font-size: 1rem;
      color: #000000ff;
      text-decoration: none;
      padding: 10px;
      border-radius: 10px;
      background-color: #ffffffff;
      transition: background 0.3s;
    }

    .popup-menu a:hover {
      background-color: #e8e6e6ff;
    }

    .close-btn {
      position: absolute;
      top: 20px;
      right: 30px;
      font-size: 3rem;
      color: #1f9cc7;
      cursor: pointer;
      font-weight: bold;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: scale(0.9); }
      to { opacity: 1; transform: scale(1); }
    }

    @media (max-width: 480px) {
      .popup-menu {
        width: 80%;
        padding: 20px;
      }
    }
  </style>
</head>
<body>

  <!-- Sidebar -->


      <div class="sidebar">
    <img src="/images/user_icon.png" alt="Logo">
        <h3>Selamat Datang<br>Super Admin</h3>
        <div class="menu">
    <a onclick="toggleOverlay()"><i></i>📁 MENU</a>

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
  <!-- Main content -->
<div class="main-content">
  <h1>Dashboard Super Admin</h1>
  <p class="p">
    Selamat datang di halaman utama Super Admin. Melalui dashboard ini, Anda dapat mengelola akses admin keuangan dan admin barang secara terpusat. 
    Gunakan tombol <strong>"Menu"</strong> di sisi kiri 
    untuk membuka navigasi utama yang berisi fitur-fitur penting.
  </p>

    <p class="p">Untuk memulai, silakan klik tombol <strong>"Menu"</strong> untuk memilih tindakan yang ingin dilakukan.
  </p>
</div>

  <!-- Overlay -->
  <div class="overlay" id="overlay">
    <div class="popup-menu">
      <h3>Pilih Menu</h3>
      <a href="/register">Register Admin</a>
      <a href="/tahun_masuk">Dashboard Keuangan</a>
      <a href="/barang">Dashboard Barang</a>
    </div>
    <div class="close-btn" onclick="toggleOverlay()">&times;</div>
  </div>

  <!-- Script -->
  <script>
    function toggleOverlay() {
      const overlay = document.getElementById('overlay');
      overlay.classList.toggle('show');
    }
  </script>

</body>
</html>
