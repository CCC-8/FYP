<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dealer</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="/DealerAssets/img/favicon.png" rel="icon">
    <link href="/DealerAssets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="/DealerAssets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/DealerAssets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/DealerAssets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="/DealerAssets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="/DealerAssets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="/DealerAssets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="/DealerAssets/css/style.css" rel="stylesheet">

</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header">
        <div class="container">

            <h1><a href="/DealerIndex">{{ $loggedInUser->name }}</a></h1>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link active" href="#header">Home</a></li>
                    <li><a class="nav-link" href="#profile">Profile</a></li>
                    <li><a class="nav-link" href="#services">Products</a></li>
                    <li><a class="nav-link" href="#about">Services</a></li>
                    <li><a class="nav-link" href="/DealerLogout"><button type="button"
                                style="background: #18d26e; border: 0; padding: 6px 20px;
                        color: #fff; border-radius: 4px;">Logout</button></a>
                    </li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <main>
        @yield('body')
    </main>

    <!-- Vendor JS Files -->
    <script src="/DealerAssets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="/DealerAssets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/DealerAssets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="/DealerAssets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="/DealerAssets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="/DealerAssets/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="/DealerAssets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="/DealerAssets/js/main.js"></script>

</body>

</html>
