<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Cubanacan</title>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('adminLTE/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('adminLTE/dist/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{asset('adminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">

    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('adminLTE/plugins/summernote/summernote-bs4.css')}}">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{asset('adminLTE/plugins/toastr/toastr.min.css') }}">
    <!-- Animacion -->
    <link rel="stylesheet" href="{{asset('css/animacion.css')}}">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{ asset('adminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="{{ asset('adminLTE/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css')}}">

    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{asset('adminLTE/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('adminLTE/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('adminLTE/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">

{{--   <!-- TimePicker -->
   <link rel="stylesheet" href="{{asset('adminLTE/plugins/jquery-ui/jquery-ui.css')}}">--}}
<!-- Google Font: Source Sans Pro -->
    {{--<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">--}}
</head>
<body class="hold-transition sidebar-mini">

<!--Animacion-->
@include('layouts.animacion')

<div class="wrapper">
    <header class="main-header">

    </header>
    <!-- Navbar -->
@include('menus.header')
<!-- /.navbar -->

    <!-- Main Sidebar Container -->
@include('menus.leftsidebar')
<!-- End Main Sidebar Container -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <h1>
            @yield('header')
        </h1>
        @include('admin.session')
        @yield('content')
    </div>
    <!-- /.content-wrapper -->
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
        <div class="p-1">

        </div>
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- Default to the left -->
        <strong>Copyright &copy; 2019 <a href="https://adminlte.io">{{config('app.name')}}</a>.</strong>Todos los
        derechos reservados.
    </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{asset('adminLTE/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('adminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('adminLTE/dist/js/adminlte.min.js')}}"></script>
<script src="{{asset('adminLTE/dist/js/demo.js')}}"></script>


{{--<script src="{{ asset('js/additional-methods.js') }}" defer></script>--}}
<script src="{{ asset('js/jquery.validate.js') }}" defer></script>
<script src="{{ asset('js/messages_es.js') }}" defer></script>

<!--dataTables-->
<script src="{{asset('adminLTE/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{asset('adminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
<!-- Summernote -->
<script src="{{asset('adminLTE/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- tinymce CKEditor -->
<script src="{{asset('public/tinymce/tinymce.min.js') }}"></script>
<!-- SweetAlert2 -->
<script src="{{asset('adminLTE/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
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
<!-- bootstrap color picker -->
<script src="{{ asset('adminLTE/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="{{ asset('adminLTE/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('adminLTE/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Bootstrap Switch -->
<script src="{{ asset('adminLTE/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>

{{--<!--TimePicker -->
<script src="{{ asset('adminLTE/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<script src="{{ asset('time-duration-selector-timespinner/dist/jquery-ui-timespinner.js')}}"></script>--}}
<style>
    .thumb {
        height: 75px;
        width: 75px;
        margin: 10px 5px 0 0;
    }
</style>
<script type="text/javascript">
    function handleFileSelect(evt) {
        var files = evt.target.files; // FileList object
        // Loop through the FileList and render image files as thumbnails.

        const thumbs = document.querySelectorAll('.thumb');
        var elementoslist = document.getElementById('list');

        if (thumbs.length >= 1) {
            elementoslist.innerHTML = ''
        }
        for (var i = 0, iMax = files.length; i < iMax; i++) {
            var reader = new FileReader();
            let f = files[i];

            // Closure to capture the file information.
            reader.onload = (theFile => e => {
                // Render thumbnail.
                var span = document.createElement('span');
                span.innerHTML = ['<img class="thumb img-circle img-thumbnail"  src="', e.target.result,
                    '" title="', escape(theFile.name), '"/>'].join('');
                elementoslist.insertBefore(span, null);
            })(f);
            // Read in the image file as a data URL.
            reader.readAsDataURL(f);

        }
    };
    document.getElementById('files').addEventListener('change', handleFileSelect, false);
</script>
<script type="text/javascript">
    function mostrar(id) {
        if (id == "doble") {
            $("#doble").show();
            $("#sencilla").hide();
        }

        if (id == "sencilla") {
            $("#sencilla").show();
            $("#doble").hide();
        }
    };
    /*

            $(document).ready(function(){
                $("#tele").inputmask("(+53) 9999-9999",{ "onincomplete": function(){ alert('inputmask incomplete'); } });
            });
    */
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
    //Initialize Select2 Elements
    $('.select2').select2();

    //Initialize Select2 Elements
    $('.select2bs4').select2({
        theme: 'bootstrap4'
    });

    /*$('#fecha_inicio').dateTimePicker();
   $('#fecha_fin').dateTimePicker({
       onSelectDate:function(current_time, $input){
           var selectedDate = $input.val();
           alert(selectedDate);
       }
   });*/
    $('#fecha_arribo').dateTimePicker();

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', {'placeholder': 'dd/mm/yyyy'});
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', {'placeholder': 'mm/dd/yyyy'});
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


    //Date range as a button
    $('#daterange-btn').daterangepicker(
        {
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
            startDate: moment().subtract(29, 'days'),
            endDate: moment()
        },
        function (start, end) {
            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
        }
    );

    //Timepicker
    $('#timepicker').datetimepicker({
        format: 'LT'
    });
    /*
        //Timepicker2
        $('input.example').timespinner({
            Format: 'HH.MM TT',
        });*/


    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox();

    //Colorpicker
    $('.my-colorpicker1').colorpicker();
    //color picker with addon
    $('.my-colorpicker2').colorpicker();

    $('.my-colorpicker2').on('colorpickerChange', function (event) {
        $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    });

    $("input[data-bootstrap-switch]").each(function () {
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });

    $("#example1").DataTable({
        "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "Mostrar Todo"]],
    });

    $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
    });

    // Summernote textarea
    $('.textarea').summernote({
        placeholder: 'Descripción',
    });

    $('[data-mask]').inputmask();

    // bsCustomFileInput.init();

    $('.custom-file-input').change(function (e) {
        var files = [];
        for (var i = 0; i < $(this)[0].files.length; i++) {
            files.push($(this)[0].files[i].name);
        }
        $(this).next('.custom-file-label').html(files.join(', '));
    });

    $(document).ready(function () {
        setTimeout(function () {
            $('.contenido').fadeOut(1500);
        }, 2000);
        /*$('.contenido').Toasts('create', {
            class: 'bg-success',
            autohide: true,
            delay: 3000,
            body: ''
        })*/
    });

    $('.carousel').carousel({
        interval: 2000,
    });

    // for sidebar menu entirely but not cover treeview
    $('ul.sidebar-menu a').filter(function () {
        return $(this).hasClass('active');
    }).parent().addClass('active');

    // for treeview
    $('ul.treeview-menu a').filter(function () {
        return $(this).hasClass('active');
    }).parentsUntil(".sidebar-menu > .treeview-menu").addClass('active');

    $('#modal-delete').on('show.bs.modal', function (e) {
        var button = $(e.relatedTarget)
        var route = button.data('route')
        console.log('Opned Delete', route)

        var modal = $(this)
        modal.find('.modal-content #form_delete').attr('action', route);
    });
    $(document).ready(function () {

        $('#check1').on('change', function () {
            var checkbox = document.getElementById('check1');
            var input1 = document.getElementById('precio_adulto_variante2adultos');
            var input2 = document.getElementById('precio_1er_ninno_variante2adultos');
            var input3 = document.getElementById('precio_2do_ninno_variante2adultos');
            if (checkbox.checked) {
                input1.disabled = "";
                input2.disabled = "";
                input3.disabled = "";
            }
            else {
                input1.value = "";
                input2.value = "";
                input3.value = "";
                input1.disabled = "disabled";
                input2.disabled = "disabled";
                input3.disabled = "disabled";
            }
        });
        $('#check2').on('change', function () {
            var checkbox = document.getElementById('check2');
            var input1 = document.getElementById('precio_adulto_variante1adulto');
            var input2 = document.getElementById('precio_1er_ninno_variante1adulto');
            var input3 = document.getElementById('precio_2do_ninno_variante1adulto');
            var input4 = document.getElementById('precio_3er_ninno_variante1adulto');
            if (checkbox.checked) {
                input1.disabled = "";
                input2.disabled = "";
                input3.disabled = "";
                input4.disabled = "";
            }
            else {
                input1.value = "";
                input2.value = "";
                input3.value = "";
                input4.value = "";
                input1.disabled = "disabled";
                input2.disabled = "disabled";
                input3.disabled = "disabled";
                input4.disabled = "disabled";
            }
        });
        $('#check3').on('change', function () {
            var checkbox = document.getElementById('check3');
            var input1 = document.getElementById('precio_adulto_variante2adultos_2hasta3ninnos');
            var input2 = document.getElementById('precio_1er_ninno_variante1adultos_variante2adultos_2hasta3ninnos');
            var input3 = document.getElementById('precio_2do_ninno_variante1adultos_variante2adultos_2hasta3ninnos');
            var input4 = document.getElementById('precio_3er_ninno_variante1adultos_variante2adultos_2hasta3ninnos');
            if (checkbox.checked) {
                input1.disabled = "";
                input2.disabled = "";
                input3.disabled = "";
                input4.disabled = "";
            }
            else {
                input1.value = "";
                input2.value = "";
                input3.value = "";
                input4.value = "";
                input1.disabled = "disabled";
                input2.disabled = "disabled";
                input3.disabled = "disabled";
                input4.disabled = "disabled";
            }
        });
        $('#check4').on('change', function () {
            var checkbox = document.getElementById('check4');
            var input1 = document.getElementById('precio_adulto_variante3adultos_mismahabitacion');
            if (checkbox.checked) {
                input1.disabled = "";
            }
            else {
                input1.value = "";
                input1.disabled = "disabled";
            }
        });
        $('#check5').on('change', function () {
            var checkbox = document.getElementById('check5');
            var input1 = document.getElementById('precio_adulto_variante1adulto_mismahabitacion');
            if (checkbox.checked) {
                input1.disabled = "";
            }
            else {
                input1.value = "";
                input1.disabled = "disabled";
            }
        });

        $('#excursion_auto_clasico').on('change', function () {

            var excursion_auto_clasico = document.getElementById('excursion_auto_clasico');
            var input1 = document.getElementById('precio_pax_auto');
            var input2 = document.getElementById('hora_salida_auto');

            var excursion_unica = document.getElementById('excursion_unica');
            var input3 = document.getElementById('precio_pax_unica');
            var input4 = document.getElementById('precio_ninnos2a12annos_unica');

            var excursion_alimentacion = document.getElementById('excursion_alimentacion');
            var input5 = document.getElementById('precio_pax_almuerzo');
            var input6 = document.getElementById('precio_ninnos2a12anno_almuerzo');
            var input7 = document.getElementById('precio_pax_sin_almuerzo');
            var input8 = document.getElementById('precio_ninnos2a12anno_sin_almuerzo');
            var input9 = document.getElementById('precio_pax_TI');
            var input10 = document.getElementById('precio_ninnos2a12anno_TI');

            var excursion_habitacion = document.getElementById('excursion_habitacion');
            var input11 = document.getElementById('precio_pax_hab_sencilla');
            var input12 = document.getElementById('precio_ninnos2a12anno_hab_sencilla');
            var input13 = document.getElementById('precio_pax_hab_dobles');
            var input14 = document.getElementById('precio_ninnos2a12anno_hab_dobles');

            var excursion_pinar_vinnales = document.getElementById('excursion_pinar_vinnales');
            var input15 = document.getElementById('precio_pax_Pinar');
            var input16 = document.getElementById('precio_ninnos2a12anno_Pinar');
            var input17 = document.getElementById('precio_pax_Vinnales');
            var input18 = document.getElementById('precio_ninnos2a12anno_Vinnales');

            var excursion_cicloturismo = document.getElementById('excursion_cicloturismo');
            var input19 = document.getElementById('precio_pax_con_canopy');
            var input20 = document.getElementById('precio_pax_sin_canopy');

            var excursion_delfines = document.getElementById('excursion_delfines');
            var input21 = document.getElementById('precio_pax_banno_delfines');
            var input22 = document.getElementById('precio_ninnos2a12anno_banno_delfines');
            var input23 = document.getElementById('precio_pax_show_delfines');
            var input24= document.getElementById('precio_ninnos2a12anno_show_delfines');

            if (excursion_auto_clasico.checked) {
                input1.disabled = "";
                input2.disabled = "";

                excursion_unica.checked ="";
                input3.disabled = "disabled";
                input3.value = "";
                input4.disabled = "disabled";
                input4.value = "";

                excursion_alimentacion.checked ="";
                input5.disabled = "disabled";
                input5.value = "";
                input6.disabled = "disabled";
                input6.value = "";
                input7.disabled = "disabled";
                input7.value = "";
                input8.disabled = "disabled";
                input8.value = "";
                input9.disabled = "disabled";
                input9.value = "";
                input10.disabled = "disabled";
                input10.value = "";

                excursion_habitacion.checked ="";
                input11.disabled = "disabled";
                input11.value = "";
                input12.disabled = "disabled";
                input12.value = "";
                input13.disabled = "disabled";
                input13.value = "";
                input14.disabled = "disabled";
                input14.value = "";

                excursion_pinar_vinnales.checked ="";
                input15.disabled = "disabled";
                input15.value = "";
                input16.disabled = "disabled";
                input16.value = "";
                input17.disabled = "disabled";
                input17.value = "";
                input18.disabled = "disabled";
                input18.value = "";

                excursion_cicloturismo.checked ="";
                input19.disabled = "disabled";
                input19.value = "";
                input20.disabled = "disabled";
                input20.value = "";

                excursion_delfines.checked ="";
                input21.disabled = "disabled";
                input21.value = "";
                input22.disabled = "disabled";
                input22.value = "";
                input23.disabled = "disabled";
                input23.value = "";
                input24.disabled = "disabled";
                input24.value = "";
            }
        });

        $('#excursion_unica').on('change', function () {
            var excursion_unica = document.getElementById('excursion_unica');
            var input1 = document.getElementById('precio_pax_unica');
            var input2 = document.getElementById('precio_ninnos2a12annos_unica');

            var excursion_alimentacion = document.getElementById('excursion_alimentacion');
            var input3 = document.getElementById('precio_pax_almuerzo');
            var input4 = document.getElementById('precio_ninnos2a12anno_almuerzo');
            var input5 = document.getElementById('precio_pax_sin_almuerzo');
            var input6 = document.getElementById('precio_ninnos2a12anno_sin_almuerzo');
            var input7 = document.getElementById('precio_pax_TI');
            var input8 = document.getElementById('precio_ninnos2a12anno_TI');

            var excursion_habitacion = document.getElementById('excursion_habitacion');
            var input9 = document.getElementById('precio_pax_hab_sencilla');
            var input10 = document.getElementById('precio_ninnos2a12anno_hab_sencilla');
            var input11 = document.getElementById('precio_pax_hab_dobles');
            var input12 = document.getElementById('precio_ninnos2a12anno_hab_dobles');

            var excursion_pinar_vinnales = document.getElementById('excursion_pinar_vinnales');
            var input13 = document.getElementById('precio_pax_Pinar');
            var input14 = document.getElementById('precio_ninnos2a12anno_Pinar');
            var input15 = document.getElementById('precio_pax_Vinnales');
            var input16 = document.getElementById('precio_ninnos2a12anno_Vinnales');

            var excursion_cicloturismo = document.getElementById('excursion_cicloturismo');
            var input17 = document.getElementById('precio_pax_con_canopy');
            var input18 = document.getElementById('precio_pax_sin_canopy');

            var excursion_delfines = document.getElementById('excursion_delfines');
            var input19 = document.getElementById('precio_pax_banno_delfines');
            var input20 = document.getElementById('precio_ninnos2a12anno_banno_delfines');
            var input21 = document.getElementById('precio_pax_show_delfines');
            var input22= document.getElementById('precio_ninnos2a12anno_show_delfines');

            var excursion_auto_clasico = document.getElementById('excursion_auto_clasico');
            var input23 = document.getElementById('precio_pax_auto');
            var input24 = document.getElementById('hora_salida_auto');

            if (excursion_unica.checked) {
                input1.disabled = "";
                input2.disabled = "";

                excursion_alimentacion.checked ="";
                input3.disabled = "disabled";
                input3.value = "";
                input4.disabled = "disabled";
                input4.value = "";
                input5.disabled = "disabled";
                input5.value = "";
                input6.disabled = "disabled";
                input6.value = "";
                input7.disabled = "disabled";
                input7.value = "";
                input8.disabled = "disabled";
                input8.value = "";

                excursion_habitacion.checked ="";
                input9.disabled = "disabled";
                input9.value = "";
                input10.disabled = "disabled";
                input10.value = "";
                input11.disabled = "disabled";
                input11.value = "";
                input12.disabled = "disabled";
                input12.value = "";

                excursion_pinar_vinnales.checked ="";
                input13.disabled = "disabled";
                input13.value = "";
                input14.disabled = "disabled";
                input14.value = "";
                input15.disabled = "disabled";
                input15.value = "";
                input16.disabled = "disabled";
                input16.value = "";

                excursion_cicloturismo.checked ="";
                input17.disabled = "disabled";
                input17.value = "";
                input18.disabled = "disabled";
                input18.value = "";

                excursion_delfines.checked ="";
                input19.disabled = "disabled";
                input19.value = "";
                input20.disabled = "disabled";
                input20.value = "";
                input21.disabled = "disabled";
                input21.value = "";
                input22.disabled = "disabled";
                input22.value = "";

                excursion_auto_clasico.checked ="";
                input23.disabled = "disabled";
                input23.value = "";
                input24.disabled = "disabled";
                input24.value = "";
            }
        });

        $('#excursion_alimentacion').on('change', function () {
            var excursion_alimentacion = document.getElementById('excursion_alimentacion');
            var input1 = document.getElementById('precio_pax_almuerzo');
            var input2 = document.getElementById('precio_ninnos2a12anno_almuerzo');
            var input3 = document.getElementById('precio_pax_sin_almuerzo');
            var input4 = document.getElementById('precio_ninnos2a12anno_sin_almuerzo');
            var input5 = document.getElementById('precio_pax_TI');
            var input6 = document.getElementById('precio_ninnos2a12anno_TI');

            var excursion_unica = document.getElementById('excursion_unica');
            var input7 = document.getElementById('precio_pax_unica');
            var input8 =  document.getElementById('precio_ninnos2a12annos_unica');

            var excursion_habitacion = document.getElementById('excursion_habitacion');
            var input9 = document.getElementById('precio_pax_hab_sencilla');
            var input10 = document.getElementById('precio_ninnos2a12anno_hab_sencilla');
            var input11 = document.getElementById('precio_pax_hab_dobles');
            var input12 = document.getElementById('precio_ninnos2a12anno_hab_dobles');

            var excursion_pinar_vinnales = document.getElementById('excursion_pinar_vinnales');
            var input13 = document.getElementById('precio_pax_Pinar');
            var input14 = document.getElementById('precio_ninnos2a12anno_Pinar');
            var input15 = document.getElementById('precio_pax_Vinnales');
            var input16 = document.getElementById('precio_ninnos2a12anno_Vinnales');

            var excursion_cicloturismo = document.getElementById('excursion_cicloturismo');
            var input17 = document.getElementById('precio_pax_con_canopy');
            var input18 = document.getElementById('precio_pax_sin_canopy');

            var excursion_delfines = document.getElementById('excursion_delfines');
            var input19 = document.getElementById('precio_pax_banno_delfines');
            var input20 = document.getElementById('precio_ninnos2a12anno_banno_delfines');
            var input21 = document.getElementById('precio_pax_show_delfines');
            var input22= document.getElementById('precio_ninnos2a12anno_show_delfines');

            var excursion_auto_clasico = document.getElementById('excursion_auto_clasico');
            var input23 = document.getElementById('precio_pax_auto');
            var input24 = document.getElementById('hora_salida_auto');

            if (excursion_alimentacion.checked) {
                input1.disabled = "";
                input2.disabled = "";
                input3.disabled = "";
                input4.disabled = "";
                input5.disabled = "";
                input6.disabled = "";

                excursion_unica.checked ="";
                input7.disabled = "disabled";
                input7.value = "";
                input8.disabled = "disabled";
                input8.value = "";

                excursion_habitacion.checked ="";
                input9.disabled = "disabled";
                input9.value = "";
                input10.disabled = "disabled";
                input10.value = "";
                input11.disabled = "disabled";
                input11.value = "";
                input12.disabled = "disabled";
                input12.value = "";

                excursion_pinar_vinnales.checked ="";
                input13.disabled = "disabled";
                input13.value = "";
                input14.disabled = "disabled";
                input14.value = "";
                input15.disabled = "disabled";
                input15.value = "";
                input16.disabled = "disabled";
                input16.value = "";

                excursion_cicloturismo.checked ="";
                input17.disabled = "disabled";
                input17.value = "";
                input18.disabled = "disabled";
                input18.value = "";

                excursion_delfines.checked ="";
                input19.disabled = "disabled";
                input19.value = "";
                input20.disabled = "disabled";
                input20.value = "";
                input21.disabled = "disabled";
                input21.value = "";
                input22.disabled = "disabled";
                input22.value = "";

                excursion_auto_clasico.checked ="";
                input23.disabled = "disabled";
                input23.value = "";
                input24.disabled = "disabled";
                input24.value = "";
            }
        });

        $('#excursion_habitacion').on('change', function () {
            var excursion_habitacion = document.getElementById('excursion_habitacion');
            var input1 = document.getElementById('precio_pax_hab_sencilla');
            var input2 = document.getElementById('precio_ninnos2a12anno_hab_sencilla');
            var input3 = document.getElementById('precio_pax_hab_dobles');
            var input4 = document.getElementById('precio_ninnos2a12anno_hab_dobles');

            var excursion_unica = document.getElementById('excursion_unica');
            var input5 = document.getElementById('precio_pax_unica');
            var input6 =  document.getElementById('precio_ninnos2a12annos_unica');

            var excursion_alimentacion = document.getElementById('excursion_alimentacion');
            var input7 = document.getElementById('precio_pax_almuerzo');
            var input8 = document.getElementById('precio_ninnos2a12anno_almuerzo');
            var input9 = document.getElementById('precio_pax_sin_almuerzo');
            var input10 = document.getElementById('precio_ninnos2a12anno_sin_almuerzo');
            var input11 = document.getElementById('precio_pax_TI');
            var input12 = document.getElementById('precio_ninnos2a12anno_TI');

            var excursion_pinar_vinnales = document.getElementById('excursion_pinar_vinnales');
            var input13 = document.getElementById('precio_pax_Pinar');
            var input14 = document.getElementById('precio_ninnos2a12anno_Pinar');
            var input15 = document.getElementById('precio_pax_Vinnales');
            var input16 = document.getElementById('precio_ninnos2a12anno_Vinnales');

            var excursion_cicloturismo = document.getElementById('excursion_cicloturismo');
            var input17 = document.getElementById('precio_pax_con_canopy');
            var input18 = document.getElementById('precio_pax_sin_canopy');

            var excursion_delfines = document.getElementById('excursion_delfines');
            var input19 = document.getElementById('precio_pax_banno_delfines');
            var input20 = document.getElementById('precio_ninnos2a12anno_banno_delfines');
            var input21 = document.getElementById('precio_pax_show_delfines');
            var input22= document.getElementById('precio_ninnos2a12anno_show_delfines');

            var excursion_auto_clasico = document.getElementById('excursion_auto_clasico');
            var input23 = document.getElementById('precio_pax_auto');
            var input24 = document.getElementById('hora_salida_auto');

            if (excursion_habitacion.checked) {
                input1.disabled = "";
                input2.disabled = "";
                input3.disabled = "";
                input4.disabled = "";

                excursion_unica.checked ="";
                input5.disabled = "disabled";
                input5.value = "";
                input6.disabled = "disabled";
                input6.value = "";

                excursion_alimentacion.checked ="";
                input7.disabled = "disabled";
                input7.value = "";
                input8.disabled = "disabled";
                input8.value = "";
                input9.disabled = "disabled";
                input9.value = "";
                input10.disabled = "disabled";
                input10.value = "";
                input11.disabled = "disabled";
                input11.value = "";
                input12.disabled = "disabled";
                input12.value = "";

                excursion_pinar_vinnales.checked ="";
                input13.disabled = "disabled";
                input13.value = "";
                input14.disabled = "disabled";
                input14.value = "";
                input15.disabled = "disabled";
                input15.value = "";
                input16.disabled = "disabled";
                input16.value = "";

                excursion_cicloturismo.checked ="";
                input17.disabled = "disabled";
                input17.value = "";
                input18.disabled = "disabled";
                input18.value = "";

                excursion_delfines.checked ="";
                input19.disabled = "disabled";
                input19.value = "";
                input20.disabled = "disabled";
                input20.value = "";
                input21.disabled = "disabled";
                input21.value = "";
                input22.disabled = "disabled";
                input22.value = "";

                excursion_auto_clasico.checked ="";
                input23.disabled = "disabled";
                input23.value = "";
                input24.disabled = "disabled";
                input24.value = "";
            }
        });

        $('#excursion_pinar_vinnales').on('change', function () {
            var excursion_pinar_vinnales = document.getElementById('excursion_pinar_vinnales');
            var input1 = document.getElementById('precio_pax_Pinar');
            var input2 = document.getElementById('precio_ninnos2a12anno_Pinar');
            var input3 = document.getElementById('precio_pax_Vinnales');
            var input4 = document.getElementById('precio_ninnos2a12anno_Vinnales');


            var excursion_habitacion = document.getElementById('excursion_habitacion');
            var input5 = document.getElementById('precio_pax_hab_sencilla');
            var input6 = document.getElementById('precio_ninnos2a12anno_hab_sencilla');
            var input7 = document.getElementById('precio_pax_hab_dobles');
            var input8 = document.getElementById('precio_ninnos2a12anno_hab_dobles');

            var excursion_unica = document.getElementById('excursion_unica');
            var input9 = document.getElementById('precio_pax_unica');
            var input10 =  document.getElementById('precio_ninnos2a12annos_unica');

            var excursion_alimentacion = document.getElementById('excursion_alimentacion');
            var input11 = document.getElementById('precio_pax_almuerzo');
            var input12 = document.getElementById('precio_ninnos2a12anno_almuerzo');
            var input13 = document.getElementById('precio_pax_sin_almuerzo');
            var input14 = document.getElementById('precio_ninnos2a12anno_sin_almuerzo');
            var input15 = document.getElementById('precio_pax_TI');
            var input16 = document.getElementById('precio_ninnos2a12anno_TI');

            var excursion_cicloturismo = document.getElementById('excursion_cicloturismo');
            var input17 = document.getElementById('precio_pax_con_canopy');
            var input18 = document.getElementById('precio_pax_sin_canopy');

            var excursion_delfines = document.getElementById('excursion_delfines');
            var input19 = document.getElementById('precio_pax_banno_delfines');
            var input20 = document.getElementById('precio_ninnos2a12anno_banno_delfines');
            var input21 = document.getElementById('precio_pax_show_delfines');
            var input22= document.getElementById('precio_ninnos2a12anno_show_delfines');

            var excursion_auto_clasico = document.getElementById('excursion_auto_clasico');
            var input23 = document.getElementById('precio_pax_auto');
            var input24 = document.getElementById('hora_salida_auto');


            if (excursion_pinar_vinnales.checked) {
                input1.disabled = "";
                input2.disabled = "";
                input3.disabled = "";
                input4.disabled = "";

                excursion_habitacion.checked ="";
                input5.disabled = "disabled";
                input5.value = "";
                input6.disabled = "disabled";
                input6.value = "";
                input7.disabled = "disabled";
                input7.value = "";
                input8.disabled = "disabled";
                input8.value = "";

                excursion_unica.checked ="";
                input9.disabled = "disabled";
                input9.value = "";
                input10.disabled = "disabled";
                input10.value = "";

                excursion_alimentacion.checked ="";
                input11.disabled = "disabled";
                input11.value = "";
                input12.disabled = "disabled";
                input12.value = "";
                input13.disabled = "disabled";
                input13.value = "";
                input14.disabled = "disabled";
                input14.value = "";
                input15.disabled = "disabled";
                input15.value = "";
                input16.disabled = "disabled";
                input16.value = "";

                excursion_cicloturismo.checked ="";
                input17.disabled = "disabled";
                input17.value = "";
                input18.disabled = "disabled";
                input18.value = "";

                excursion_delfines.checked ="";
                input19.disabled = "disabled";
                input19.value = "";
                input20.disabled = "disabled";
                input20.value = "";
                input21.disabled = "disabled";
                input21.value = "";
                input22.disabled = "disabled";
                input22.value = "";

                excursion_auto_clasico.checked ="";
                input23.disabled = "disabled";
                input23.value = "";
                input24.disabled = "disabled";
                input24.value = "";
            }
        });

        $('#excursion_cicloturismo').on('change', function () {

            var excursion_cicloturismo = document.getElementById('excursion_cicloturismo');
            var input1 = document.getElementById('precio_pax_con_canopy');
            var input2 = document.getElementById('precio_pax_sin_canopy');

            var excursion_pinar_vinnales = document.getElementById('excursion_pinar_vinnales');
            var input3 = document.getElementById('precio_pax_Pinar');
            var input4 = document.getElementById('precio_ninnos2a12anno_Pinar');
            var input5 = document.getElementById('precio_pax_Vinnales');
            var input6 = document.getElementById('precio_ninnos2a12anno_Vinnales');


            var excursion_habitacion = document.getElementById('excursion_habitacion');
            var input7 = document.getElementById('precio_pax_hab_sencilla');
            var input8 = document.getElementById('precio_ninnos2a12anno_hab_sencilla');
            var input9 = document.getElementById('precio_pax_hab_dobles');
            var input10 = document.getElementById('precio_ninnos2a12anno_hab_dobles');

            var excursion_unica = document.getElementById('excursion_unica');
            var input11 = document.getElementById('precio_pax_unica');
            var input12 =  document.getElementById('precio_ninnos2a12annos_unica');

            var excursion_alimentacion = document.getElementById('excursion_alimentacion');
            var input13 = document.getElementById('precio_pax_almuerzo');
            var input14 = document.getElementById('precio_ninnos2a12anno_almuerzo');
            var input15 = document.getElementById('precio_pax_sin_almuerzo');
            var input16 = document.getElementById('precio_ninnos2a12anno_sin_almuerzo');
            var input17 = document.getElementById('precio_pax_TI');
            var input18 = document.getElementById('precio_ninnos2a12anno_TI');

            var excursion_delfines = document.getElementById('excursion_delfines');
            var input19 = document.getElementById('precio_pax_banno_delfines');
            var input20 = document.getElementById('precio_ninnos2a12anno_banno_delfines');
            var input21 = document.getElementById('precio_pax_show_delfines');
            var input22 = document.getElementById('precio_ninnos2a12anno_show_delfines');

            var excursion_auto_clasico = document.getElementById('excursion_auto_clasico');
            var input23 = document.getElementById('precio_pax_auto');
            var input24 = document.getElementById('hora_salida_auto');

            if (excursion_cicloturismo.checked) {
                input1.disabled = "";
                input2.disabled = "";

                excursion_pinar_vinnales.checked ="";
                input3.disabled = "disabled";
                input3.value = "";
                input4.disabled = "disabled";
                input4.value = "";
                input5.disabled = "disabled";
                input5.value = "";
                input6.disabled = "disabled";
                input6.value = "";

                excursion_habitacion.checked ="";
                input7.disabled = "disabled";
                input7.value = "";
                input8.disabled = "disabled";
                input8.value = "";
                input9.disabled = "disabled";
                input9.value = "";
                input10.disabled = "disabled";
                input10.value = "";

                excursion_unica.checked ="";
                input11.disabled = "disabled";
                input11.value = "";
                input12.disabled = "disabled";
                input12.value = "";

                excursion_alimentacion.checked ="";
                input13.disabled = "disabled";
                input13.value = "";
                input14.disabled = "disabled";
                input14.value = "";
                input15.disabled = "disabled";
                input15.value = "";
                input16.disabled = "disabled";
                input16.value = "";
                input17.disabled = "disabled";
                input17.value = "";
                input18.disabled = "disabled";
                input18.value = "";

                excursion_delfines.checked ="";
                input19.disabled = "disabled";
                input19.value = "";
                input20.disabled = "disabled";
                input20.value = "";
                input21.disabled = "disabled";
                input21.value = "";
                input22.disabled = "disabled";
                input22.value = "";

                excursion_auto_clasico.checked ="";
                input23.disabled = "disabled";
                input23.value = "";
                input24.disabled = "disabled";
                input24.value = "";
            }
        });

        $('#excursion_delfines').on('change', function () {

            var excursion_delfines = document.getElementById('excursion_delfines');
            var input1 = document.getElementById('precio_pax_banno_delfines');
            var input2 = document.getElementById('precio_ninnos2a12anno_banno_delfines');
            var input3 = document.getElementById('precio_pax_show_delfines');
            var input4 = document.getElementById('precio_ninnos2a12anno_show_delfines');

            var excursion_cicloturismo = document.getElementById('excursion_cicloturismo');
            var input5 = document.getElementById('precio_pax_con_canopy');
            var input6 = document.getElementById('precio_pax_sin_canopy');

            var excursion_pinar_vinnales = document.getElementById('excursion_pinar_vinnales');
            var input7 = document.getElementById('precio_pax_Pinar');
            var input8 = document.getElementById('precio_ninnos2a12anno_Pinar');
            var input9 = document.getElementById('precio_pax_Vinnales');
            var input10 = document.getElementById('precio_ninnos2a12anno_Vinnales');

            var excursion_habitacion = document.getElementById('excursion_habitacion');
            var input11 = document.getElementById('precio_pax_hab_sencilla');
            var input12 = document.getElementById('precio_ninnos2a12anno_hab_sencilla');
            var input13 = document.getElementById('precio_pax_hab_dobles');
            var input14 = document.getElementById('precio_ninnos2a12anno_hab_dobles');

            var excursion_unica = document.getElementById('excursion_unica');
            var input15 = document.getElementById('precio_pax_unica');
            var input16 =  document.getElementById('precio_ninnos2a12annos_unica');

            var excursion_alimentacion = document.getElementById('excursion_alimentacion');
            var input17 = document.getElementById('precio_pax_almuerzo');
            var input18 = document.getElementById('precio_ninnos2a12anno_almuerzo');
            var input19 = document.getElementById('precio_pax_sin_almuerzo');
            var input20 = document.getElementById('precio_ninnos2a12anno_sin_almuerzo');
            var input21 = document.getElementById('precio_pax_TI');
            var input22 = document.getElementById('precio_ninnos2a12anno_TI');

            var excursion_auto_clasico = document.getElementById('excursion_auto_clasico');
            var input23 = document.getElementById('precio_pax_auto');
            var input24 = document.getElementById('hora_salida_auto');

            if (excursion_delfines.checked) {
                input1.disabled = "";
                input2.disabled = "";
                input3.disabled = "";
                input4.disabled = "";

                excursion_cicloturismo.checked ="";
                input5.disabled = "disabled";
                input5.value = "";
                input6.disabled = "disabled";
                input6.value = "";

                excursion_pinar_vinnales.checked ="";
                input7.disabled = "disabled";
                input7.value = "";
                input8.disabled = "disabled";
                input8.value = "";
                input9.disabled = "disabled";
                input9.value = "";
                input10.disabled = "disabled";
                input10.value = "";

                excursion_habitacion.checked ="";
                input11.disabled = "disabled";
                input11.value = "";
                input12.disabled = "disabled";
                input12.value = "";
                input13.disabled = "disabled";
                input13.value = "";
                input14.disabled = "disabled";
                input14.value = "";

                excursion_unica.checked ="";
                input15.disabled = "disabled";
                input15.value = "";
                input16.disabled = "disabled";
                input16.value = "";

                excursion_alimentacion.checked ="";
                input17.disabled = "disabled";
                input17.value = "";
                input18.disabled = "disabled";
                input18.value = "";
                input19.disabled = "disabled";
                input19.value = "";
                input20.disabled = "disabled";
                input20.value = "";
                input21.disabled = "disabled";
                input21.value = "";
                input22.disabled = "disabled";
                input22.value = "";

                excursion_auto_clasico.checked ="";
                input23.disabled = "disabled";
                input23.value = "";
                input24.disabled = "disabled";
                input24.value = "";
            }
        });
    });

    $(window).on('load', function () {
        $('#voyager-loader').fadeOut('slow');
    });

    $(function () {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });

        $('.swalDefaultSuccess').click(function () {
            Toast.fire({
                type: 'success',
                title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            })
        });
        $('.toastrDefaultSuccess').click(function () {
            toastr.success('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
        });
        $('.toastsDefaultAutohide').click(function () {
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
</body>
</html>