<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Title -->
    <title>VIAJES CUBANACAN</title>

    <!-- Custom styles for this template -->
    <link href="{{asset('assets/css/carousel.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/sitioStyle.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/freelancer.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('carousels/owlcarousel/assets/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('carousels/owlcarousel/assets/owl.theme.default.min.css')}}">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('adminLTE/plugins/fontawesome-free/css/all.min.css')}}">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('adminLTE/dist/css/adminlte.css')}}">
    <link rel="stylesheet" href="{{asset('adminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">

    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('adminLTE/plugins/summernote/summernote-bs4.css')}}">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{asset('adminLTE/plugins/toastr/toastr.min.css') }}">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{ asset('adminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="{{ asset('adminLTE/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css')}}">

    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{asset('adminLTE/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('adminLTE/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('adminLTE/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">

    <!-- Favicons -->
    {{--<link rel="apple-touch-icon" href="https://getbootstrap.com/docs/4.4/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="https://getbootstrap.com/docs/4.4/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="https://getbootstrap.com/docs/4.4/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="https://getbootstrap.com/docs/4.4/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="https://getbootstrap.com/docs/4.4/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
    <link rel="icon" href="https://getbootstrap.com/docs/4.4/assets/img/favicons/favicon.ico">--}}
    <link rel="icon" href="{{asset('assets/img/Logo.png')}}" sizes="32x32">
    <meta name="msapplication-config" content="/docs/4.4/assets/img/favicons/browserconfig.xml">
    <meta name="theme-color" content="#563d7c">
    @yield ('css')
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
        .error {
            color:red;
            text-align: justify;
        }
        .odd{
            background-color: rgba(0,0,0,.05)
        }

        .spanFFTotal {
            display: inline-block;
            background-color: #DA2513;
            display: inline-block;
            padding: 10px;
            color: #fff;
        }
        .redbutton{
            background-color: #DA2513;
            color: #fff;
        }

        .ulcreditcard ul {
            list-style-type: none;
          }

          .ulcreditcard  li {
            display: inline-block;
          }

          .ulcreditcard input[type="checkbox"][id^="cbCreditCard"] {
            display: none;
          }

          .ulcreditcard label {
            border: 1px solid #fff;
            padding: 10px;
            display: block;
            position: relative;
            margin: 10px;
            cursor: pointer;
          }

          .ulcreditcard label:before {
            background-color: white;
            color: white;
            content: " ";
            display: block;
            border-radius: 50%;
            border: 1px solid grey;
            position: absolute;
            top: -5px;
            left: -5px;
            width: 25px;
            height: 25px;
            text-align: center;
            line-height: 28px;
            transition-duration: 0.4s;
            transform: scale(0);
          }

          .ulcreditcard label img {
            height: 32px;
            width: 51px;
            transition-duration: 0.2s;
            transform-origin: 50% 50%;
          }

          .ulcreditcard :checked + label {
            border-color: #ddd;
          }

          .ulcreditcard :checked + label:before {
            content: "✓";
            background-color: grey;
            transform: scale(1);
          }

          .ulcreditcard :checked + label img {
            transform: scale(0.9);
            z-index: -1;
          }
    </style>

</head>
<body class="content">
<div class="container">
    {{--<!-- Preloader -->
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="cssload-container">
            <div class="cssload-loading"><i></i><i></i><i></i><i></i></div>
        </div>
    </div>--}}
    <a id="back-to-top" href="#" class="btn btn-sm back-to-top" style="width: 50px;height:40px;background: #DA2513;color: #fff" role="button" aria-label="Scroll to top">
        <i class="fas fa-chevron-up"></i>
    </a>
    <div class="fixed-top">
        <!-- Header -->
    @yield('header')
    <!-- Navbar -->
        @yield('navbar')

    </div>
    <br>
    <br>
    <br>
    <main class="py-4">

        @yield('content')
    </main>
</div>

<!-- Footer -->
@include('layouts.fronts.footer')
<!-- ./footer -->
<!-- jQuery -->
<script src="{{asset('adminLTE/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('adminLTE/plugins/bootstrap/js/bootstrap.bundle.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('adminLTE/dist/js/adminlte.js')}}"></script>
<script src="{{asset('adminLTE/dist/js/demo.js')}}"></script>


{{--<script src="{{ asset('js/additional-methods.js') }}" defer></script>--}}
<script src="{{ asset('js/jquery.validate.js') }}" defer></script>
<script src="{{ asset('js/messages_es.js') }}" defer></script>
<script src="{{ asset('assets/js/freelancer.js') }}" defer></script>

<script src="{{ asset('carousels/owlcarousel/owl.carousel.min.js') }}"></script>

<!--dataTables-->
<script src="{{asset('adminLTE/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{asset('adminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
<!-- Summernote -->
<script src="{{asset('adminLTE/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- SweetAlert2 -->
<script src="{{asset('adminLTE/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<!-- Toastr -->
<script src="{{asset('adminLTE/plugins/toastr/toastr.min.js') }}"></script>
<!-- InputMask -->
<script src="{{asset('adminLTE/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('adminLTE/plugins/inputmask/min/jquery.inputmask.bundle.min.js')}}"></script>
<!-- bs-custom-file-input -->
<script src="{{asset('adminLTE/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
<!-- Select2 -->
<script src="{{asset('adminLTE/plugins/select2/js/select2.full.min.js')}}"></script>
<!--datepicker-->
<script src="{{asset('/datePicker/date-time-picker.min.js')}}"></script>
<!-- date-range-picker -->
<script src="{{ asset('adminLTE/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="{{ asset('adminLTE/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('adminLTE/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Bootstrap Switch -->
<script src="{{ asset('adminLTE/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>
<!--FlexiFlyDrive-->
<script src="{{asset('js/frontend/jquery.flexi.fly.drive.js')}}"></script>
<script>
    window.jQuery || document.write('<script src="assets/js/jquery.slim.min.js"><\/script>')
</script>
<script type="text/javascript">
    $(document).ready(function ()
    {
        var locale='{!! App::getLocale() !!}';
        $.cubanacanMainNS.app.SetLocale(locale);
    });
    $('input[type=file]').on('change', function () {
        element = $(this);
        var files = this.files;
        var _URL = window.URL || window.webkitURL;
        var image, file;
        image = new Image();
        image.src = _URL.createObjectURL(files[0]);
        image.onload = function () {
            element.attr('uploadWidth', this.width);
            element.attr('uploadHeigth', this.height);
        }
    });

    $("#carouselbotonesproductos").owlCarousel(
        {
            items:3,
            autoplay: true,
            nav: true,
            navText: ['<span class="fas fa-arrow-left" style="color: #DA2513" aria-hidden="true"></span>',
                '<span class="fas fa-arrow-right" style="color: #DA2513" aria-hidden="true"></span>'],
            dots: false,
            loop: true,
            margin: 30,
            slideSpeed : 300,
            responsive: { 0: { items: 1 }, 768: { items: 1 }, 900: { items: 3 }}
        }
    );

    //Initialize Select2 Elements
    $('.select2').select2();

    //Initialize Select2 Elements
    $('.select2bs4').select2({
        theme: 'bootstrap4'
    });
    //Money Euro
    $('[data-mask]').inputmask();

    //Date range picker
    $('#reservation').daterangepicker();
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
        timePicker: true,
        timePickerIncrement: 30,
        locale: {
            format: 'MM/DD/YYYY hh:mm A'
        }
    });
    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox();

    $("input[data-bootstrap-switch]").each(function(){
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });

    $("#example1").DataTable({
        "lengthMenu": [ [5, 10, 25, 50, -1], [5, 10,25, 50, "Mostrar Todo"] ],
    });

    $('#example2').DataTable({
        "paging": false,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "scrollCollapse": true,
    });

    $('[data-mask]').inputmask();

    // for sidebar menu entirely but not cover treeview
    $('ul.sidebar-menu a').filter(function() {
        return $(this).hasClass('active');
    }).parent().addClass('active');

    $('#buros-modal-').on('show.bs.modal');

    $(function() {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });

        $('.swalDefaultSuccess').click(function() {
            Toast.fire({
                type: 'success',
                title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            })
        });
        $('.toastrDefaultSuccess').click(function() {
            toastr.success('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
        });
        $('.toastsDefaultAutohide').click(function() {
            $(document).Toasts('create', {
                title: 'Toast Title',
                autohide: true,
                delay: 750,
                body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            })
        });
    });
</script>
@yield('jscript')
@yield('jsprueba')
@yield('custom_js')
</body>
</html>
