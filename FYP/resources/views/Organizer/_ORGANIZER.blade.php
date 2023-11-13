<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Organizer</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="/OrganizerAssets/img/favicon.png" rel="icon">
    <link href="/OrganizerAssets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="/OrganizerAssets/vendor/aos/aos.css" rel="stylesheet">
    <link href="/OrganizerAssets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/OrganizerAssets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/OrganizerAssets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="/OrganizerAssets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="/OrganizerAssets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link rel ="stylesheet" href ="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel ="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">

    <!-- Template Main CSS File -->
    <link href="/OrganizerAssets/css/style.css" rel="stylesheet">

</head>

<body>

    <i class="bi bi-list mobile-nav-toggle d-lg-none"></i>
    <!-- ======= Header ======= -->
    <header id="header" class="d-flex flex-column justify-content-center">

        <nav id="navbar" class="navbar nav-menu">
            <ul>
                <li><a href="/OrganizerIndex" class="nav-link "><i class="bx bx-home"></i> <span>Home</span></a>
                </li>
                <li><a href="/AccountManagement" class="nav-link "><i class="bx bx-user"></i>
                        <span>Account</span></a></li>
                <li><a href="/EventManagement" class="nav-link "><i class="bx bx-abacus"></i>
                        <span>Event</span></a></li>
                <li><a href="/DealershipManagement" class="nav-link "><i class="bx bx-network-chart"></i>
                        <span>Dealership</span></a></li>
                <li><a href="/VenueManagement" class="nav-link "><i class="bx bx-map-pin"></i>
                        <span>Venue</span></a></li>
                <li><a href="/CrewManagement" class="nav-link "><i class="bx bx-face"></i>
                        <span>Crew</span></a></li>
                <li><a href="/Calendar" class="nav-link "><i class="bx bx-calendar"></i>
                        <span>Calendar</span></a></li>
                <li><a href="/Login" class="nav-link "><i class="bx bx-log-out"></i>
                        <span>Login</span></a></li>
            </ul>
        </nav><!-- .nav-menu -->

    </header><!-- End Header -->

    <main>
        @yield('body')
    </main>

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="/OrganizerAssets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="/OrganizerAssets/vendor/aos/aos.js"></script>
    <script src="/OrganizerAssets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/OrganizerAssets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="/OrganizerAssets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="/OrganizerAssets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="/OrganizerAssets/vendor/typed.js/typed.umd.js"></script>
    <script src="/OrganizerAssets/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="/OrganizerAssets/vendor/php-email-form/validate.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@6.1.9/index.global.min.js'></script>

    <!-- Template Main JS File -->
    <script src="/OrganizerAssets/js/main.js"></script>

    {{-- DataTable --}}
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>

    {{-- Nav Bar Active Status --}}
    <script>
        $(document).ready(function() {

            var currentPath = window.location.pathname;

            $("#navbar ul li a").each(function() {
                var link = $(this).attr("href");

                if (link === currentPath) {
                    $(this).addClass("active");
                }
            });
        });
    </script>

    

</body>

</html>
