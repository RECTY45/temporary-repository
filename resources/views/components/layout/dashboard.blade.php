@use('App\Enum\UserRole')
@props(['title' => 'Dashboard'])
<!DOCTYPE html>
<html lang="en">

    <head>
        <!-- Meta Tags -->
        <meta charset="utf-8">
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1.0"
        >
        <title>{{ $title }}</title>

        <!-- Apple Touch Icon -->
        <x-link
            rel="apple-touch-icon"
            sizes="180x180"
            href="assets/img/apple-touch-icon.png"
        />

        <!-- Favicon -->
        <x-link
            rel="icon"
            href="assets/img/favicon.png"
            type="image/x-icon"
        />
        <x-link
            rel="shortcut icon"
            href="assets/img/favicon.png"
            type="image/x-icon"
        />

        <!-- Theme Settings Js -->
        <x-script src="assets/js/theme-script.js"></x-script>

        <x-link
            rel="stylesheet"
            href="assets/css/animate.css"
        />
        <x-link
            rel="stylesheet"
            href="assets/css/bootstrap.min.css"
        />

        <!-- Main.css -->
        <x-link
            rel="stylesheet"
            href="assets/css/meanmenu.css"
        />

        <!-- Tabler Icon CSS -->
        <x-link
            rel="stylesheet"
            href="assets/plugins/tabler-icons/tabler-icons.css"
        />

        <!-- Fontawesome Icon CSS -->
        <x-link
            rel="stylesheet"
            href="assets/plugins/fontawesome/css/fontawesome.min.css"
        />
        <x-link
            rel="stylesheet"
            href="assets/plugins/fontawesome/css/all.min.css"
        />

        <!-- Fancybox CSS -->
        <x-link
            rel="stylesheet"
            href="assets/plugins/fancybox/jquery.fancybox.min.css"
        />

        <!-- Owlcarousel CSS -->
        <x-link
            rel="stylesheet"
            href="assets/plugins/owlcarousel/owl.carousel.min.css"
        />

        <!-- Iconsax CSS -->
        <x-link
            rel="stylesheet"
            href="assets/css/iconsax.css"
        />

        <!-- Datepicker CSS -->
        <x-link
            rel="stylesheet"
            href="assets/css/bootstrap-datetimepicker.min.css"
        />

        <!-- Style CSS -->
        <x-link
            rel="stylesheet"
            href="assets/css/style.css"
        />

        @stack('style')

    </head>

    <body>

        @include('__partials.header')

        <!-- Breadcrumb -->
        <div class="breadcrumb-bar breadcrumb-bg-04 text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-12">
                        <h2 class="breadcrumb-title mb-2">Dashboard</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center mb-0">
                                <li class="breadcrumb-item"><a href="index.html"><i class="isax isax-home5"></i></a>
                                </li>
                                <li
                                    class="breadcrumb-item active"
                                    aria-current="page"
                                >Dashboard</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Breadcrumb -->

        <!-- Page Wrapper -->
        <div class="content content-two">
            <div class="container">

                <div class="row">
                    @switch(auth()->user()->role)

                        @case(UserRole::BENGKEL)
                            @include('__partials.dashboard.sidebar-bengkel')
                        @break

                        @default
                            @include('__partials.dashboard.sidebar')
                    @endswitch

                    <div class="col-xl-9 col-lg-8">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Wrapper -->

        <!-- Cursor -->
        <div class="xb-cursor tx-js-cursor">
            <div class="xb-cursor-wrapper">
                <div class="xb-cursor--follower xb-js-follower"></div>
            </div>
        </div>
        <!-- /Cursor -->

        <div class="back-to-top">
            <a
                class="back-to-top-icon align-items-center justify-content-center d-flex"
                href="#top"
            ><i class="fa-solid fa-arrow-up"></i></a>
        </div>

        {{-- JQuery --}}
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

        <!-- Bootstrap JS -->
        <x-script src="assets/js/bootstrap.bundle.min.js"></x-script>

        <!-- Wow JS -->
        <x-script src="assets/js/wow.min.js"></x-script>

        <!-- Apex JS -->
        <x-script src="assets/plugins/apexchart/apexcharts.min.js"></x-script>
        <x-script src="assets/plugins/apexchart/chart-data.js"></x-script>

        <!-- MeanMenu Js -->
        <x-script src="assets/js/jquery.meanmenu.min.js"></x-script>

        <!-- Swiper Js -->
        <x-script src="assets/plugins/owlcarousel/owl.carousel.min.js"></x-script>

        <!-- Fancybox JS -->
        <x-script src="assets/plugins/fancybox/jquery.fancybox.min.js"></x-script>

        <!-- Counter JS -->
        <x-script src="assets/js/jquery.counterup.min.js"></x-script>
        <x-script src="assets/js/jquery.waypoints.min.js"></x-script>

        <!-- Sticky Sidebar JS -->
        <x-script src="assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></x-script>
        <x-script src="assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></x-script>

        <!-- Datepicker Core JS -->
        <x-script src="assets/plugins/moment/moment.js"></x-script>
        <x-script src="assets/js/bootstrap-datetimepicker.min.js"></x-script>

        <!-- cursor JS -->
        <x-script src="assets/js/cursor.js"></x-script>

        <!-- Script JS -->
        <x-script src="assets/js/script.js"></x-script>

        @stack('script')
    </body>

</html>
