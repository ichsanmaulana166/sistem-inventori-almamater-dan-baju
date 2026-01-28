<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>

        <style>
            html, body {
                height: 100%; /* Memastikan body memenuhi layar */
                margin: 0;
                font-family: 'Figtree', sans-serif;
                background: #4EC9EE;
                color: white;
                display: flex;
                flex-direction: column;
            }

            .container {
                text-align: center;
                width: 100%;
                flex: 1; 
                display: flex;
                flex-direction: column;
            }

            header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 20px;
            }

            header nav {
                margin-left: auto; 
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

            .content {
                margin-top: 100px;
                margin-bottom: 100px;
                flex: 1; 
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

            footer {
                text-align: center;
                padding: 20px;
                font-size: 0.9rem;
                color: #000;
                background-color: #00a4e4; 
            }

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
            <header>
                <div></div> 

                @if (Route::has('login'))
                    <nav>
                        @auth
                            <a href="{{ url('/dashboard') }}">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}">Log in</a>
                        @endauth
                    </nav>
                @endif
            </header>

            <div class="content">
                <h1>Selamat Datang Di Sistem Inventori Almamater & Baju</h1>
                <p>Sistem inventori yang simple dan elegan</p>
            </div>

            <footer>
                FI TECHNOLOGY
            </footer>
        </div>
    </body>
</html>
