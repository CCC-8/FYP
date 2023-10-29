<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Organizer</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="/assets/img/favicon.png" rel="icon">
    <link href="/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link rel ="stylesheet" href ="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel ="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">

    <!-- Template Main CSS File -->
    <link href="/assets/css/style.css" rel="stylesheet">

</head>

<body>

    <i class="bi bi-list mobile-nav-toggle d-lg-none"></i>
    <!-- ======= Header ======= -->
    <header id="header" class="d-flex flex-column justify-content-center">

        <nav id="navbar" class="navbar nav-menu">
            <ul>
                <li><a href="/" class="nav-link "><i class="bx bx-home"></i> <span>Home</span></a>
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
    <script src="/assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="/assets/vendor/aos/aos.js"></script>
    <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="/assets/vendor/typed.js/typed.umd.js"></script>
    <script src="/assets/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="/assets/vendor/php-email-form/validate.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@6.1.9/index.global.min.js'></script>

    <!-- Template Main JS File -->
    <script src="/assets/js/main.js"></script>

    {{-- DataTable --}}
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>

    {{-- Nav Bar Active Status --}}
    <script>
        $(document).ready(function() {
            // Get the current URL path
            var currentPath = window.location.pathname;

            // Loop through each nav link and compare the link's href to the current path
            $("#navbar ul li a").each(function() {
                var link = $(this).attr("href");

                // Check if the link matches the current path
                if (link === currentPath) {
                    $(this).addClass("active");
                }
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                initialDate: '2023-09-07',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                events: [{
                        title: 'All Day Event',
                        start: '2023-09-01'
                    },
                    {
                        title: 'Long Event',
                        start: '2023-09-07',
                        end: '2023-09-10'
                    },
                    {
                        groupId: '999',
                        title: 'Repeating Event',
                        start: '2023-09-09T16:00:00'
                    },
                    {
                        groupId: '999',
                        title: 'Repeating Event',
                        start: '2023-09-16T16:00:00'
                    },
                    {
                        title: 'Conference',
                        start: '2023-09-11',
                        end: '2023-09-13'
                    },
                    {
                        title: 'Meeting',
                        start: '2023-09-12T10:30:00',
                        end: '2023-09-12T12:30:00'
                    },
                    {
                        title: 'Lunch',
                        start: '2023-09-12T12:00:00'
                    },
                    {
                        title: 'Meeting',
                        start: '2023-09-12T14:30:00'
                    },
                    {
                        title: 'Birthday Party',
                        start: '2023-09-13T07:00:00'
                    },
                    {
                        title: 'Click for Google',
                        url: 'https://google.com/',
                        start: '2023-09-28'
                    }
                ]
            });

            calendar.render();
        });
    </script>

</body>

</html>
