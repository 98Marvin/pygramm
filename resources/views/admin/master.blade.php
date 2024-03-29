<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Pygramm Technologies - Admin Dashboard</title>

    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500|Poppins:400,500,600,700|Roboto:400,500"
        rel="stylesheet" />
    <link href="https://cdn.materialdesignicons.com/3.0.39/css/materialdesignicons.min.css" rel="stylesheet" />

    <!-- PLUGINS CSS STYLE -->
    <link href="/back/assets/plugins/toaster/toastr.min.css" rel="stylesheet" />
    <link href="/back/assets/plugins/nprogress/nprogress.css" rel="stylesheet" />
    <link href="/back/assets/plugins/flag-icons/css/flag-icon.min.css" rel="stylesheet" />
    <link href="/back/assets/plugins/jvectormap/jquery-jvectormap-2.0.3.css" rel="stylesheet" />
    <link href="/back/assets/plugins/ladda/ladda.min.css" rel="stylesheet" />
    <link href="/back/assets/plugins/select2/css/select2.min.css" rel="stylesheet" />
    <link href="/back/assets/plugins/daterangepicker/daterangepicker.css" rel="stylesheet" />

    <!-- SLEEK CSS -->
    <link id="sleek-css" rel="stylesheet" href="/back/assets/css/sleek.css" />

    {{-- Toaster --}}
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>



    <!-- FAVICON -->
    <link href="/back/assets/img/favicon.png" rel="shortcut icon" />

    <!--
    HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries
  -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
    <script src="/back/assets/plugins/nprogress/nprogress.js"></script>
</head>


<body class="sidebar-fixed sidebar-dark header-light header-fixed" id="body">
    <script>
        NProgress.configure({
            showSpinner: false
        });
        NProgress.start();
    </script>

    <div class="mobile-sticky-body-overlay"></div>

    <div class="wrapper">

        <!--
          ====================================
          ——— LEFT SIDEBAR WITH FOOTER
          =====================================
        -->
       @include('admin.partials.sidebar')



        <div class="page-wrapper">
            <!-- Header -->
            @include('admin.partials.header')


            <div class="content-wrapper">
                <div class="content">
                    @yield('content')
                </div>

            </div>

            @include('admin.partials.footer')

        </div>
    </div>


    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDCn8TFXGg17HAUcNpkwtxxyT9Io9B_NcM" defer></script>
    <script src="/back/assets/plugins/jquery/jquery.min.js"></script>
    <script src="/back/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/back/assets/plugins/toaster/toastr.min.js"></script>
    <script src="/back/assets/plugins/slimscrollbar/jquery.slimscroll.min.js"></script>
    <script src="/back/assets/plugins/charts/Chart.min.js"></script>
    <script src="/back/assets/plugins/ladda/spin.min.js"></script>
    <script src="/back/assets/plugins/ladda/ladda.min.js"></script>
    <script src="/back/assets/plugins/jquery-mask-input/jquery.mask.min.js"></script>
    <script src="/back/assets/plugins/select2/js/select2.min.js"></script>
    <script src="/back/assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js"></script>
    <script src="/back/assets/plugins/jvectormap/jquery-jvectormap-world-mill.js"></script>
    <script src="/back/assets/plugins/daterangepicker/moment.min.js"></script>
    <script src="/back/assets/plugins/daterangepicker/daterangepicker.js"></script>
    <script src="/back/assets/plugins/jekyll-search.min.js"></script>
    <script src="/back/assets/js/sleek.js"></script>
    <script src="/back/assets/js/chart.js"></script>
    <script src="/back/assets/js/date-range.js"></script>
    <script src="/back/assets/js/map.js"></script>
    <script src="/back/assets/js/custom.js"></script>


    <script>
        @if(Session::has('message'))
        var type = "{{ Session::get('alert-type', 'info') }}"
        switch(type) {
                case 'info':
                    toastr.info(" {{ Session::get('message') }} ");
                    break;

                case 'success':
                    toastr.success(" {{ Session::get('message') }} ");
                    break;

                case 'warning':
                    toastr.warning(" {{ Session::get('message') }} ");
                    break;

                case 'error':
                    toastr.error("{{ Session::get('message') }}");
                    break;
                
            }
        @endif
    </script>



</body>

</html>
