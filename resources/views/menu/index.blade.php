<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Grayscale - Start Bootstrap Theme</title>
        <link rel="icon" type="image/x-icon" href="front/assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="front/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="front/css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="{{ route('menu') }}">AHP Website</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link {{ ($judul === 'Main Menu') ? 'active' : '' }}" href="{{ route('menu') }}">Main Menu</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Riwayat</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Profile</a></li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </ul>
                </div>
            </div>
        </nav>
        @yield('content')
        <!-- Footer-->
        <footer class="footer bg-black small text-center text-white-50"><div class="container px-4 px-lg-5">&copy; <span id="year"></span> AHP Website</div></footer>
        <!-- Bootstrap core JS-->
        <script src="front/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="front/js/scripts.js"></script>
        <script>
            // Menampilkan tahun saat ini secara otomatis
            document.getElementById("year").textContent = new Date().getFullYear();
        </script>
    </body>
</html>
