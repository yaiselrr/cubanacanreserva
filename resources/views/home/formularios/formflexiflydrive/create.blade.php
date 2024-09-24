 <div class="card card-danger card-outline">
    <div class="card-header">
      <h3 class="card-title">
        <i class="fas fa-edit"></i>
        ! Registre los datos para su reserva !
      </h3>
    </div>
    <div class="card-body pad table-responsive">
        <form id="frmFfdReserva" action="" method="post">
        <div class="row">
            <div class="col-md-5">
              <div class="form-group">
                <label for="dpfecha">Fecha:
                    <small style="color: red"> *</small>
                </label>
                <input type="date" class="form-control required" min="{{date('Y-m-d')}}" name="fecha" id="dpfechaReserva" placeholder="Fecha">
                </div>
              <!-- /.form-group -->
                <div class="form-group">
                <label for="tblugarentrega">Lugar de entrega:
                    <small  style="color: red"> *</small>
                </label>
                <input type="text" class="form-control required" id="tblugarentrega" name="lugarentrega">
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                    <label for="tblugarecojida">Lugar de recogida:
                        <small style="color: red"> *</small>
                    </label>
                    <input type="text" class="form-control required" id="tblugarecojida" name="lugarecojida">
                    </div>
                    <!-- /.form-group -->
                <div class="form-group">
                    <label for="rngcantidadnoches">Cantidad de noches:
                        <small  style="color: red"> *</small>
                    </label>
                    <input type="range" class="form-control-range custom-range nocero" name="cantnoches" id="rngcantidadnoches"  min="6" max="60" value="6" step="1" oninput="num.value = this.value">
                    <output id="num" style="float:right;">6</output>
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                    <label for="rngcantidadmenores">Cantidad de ni&ntilde;os de 0 a 12 a&ntilde;os:
                    </label>
                    <input type="range" class="form-control-range custom-range" id="rngcantidadmenores" name="cantmenores"  min="0" max="10" value="0" step="1" oninput="num1.value = this.value">
                    <output id="num1" style="float:right;">0</output>
                </div>
                <!-- /.form-group -->
            </div>
            <div class="col-md-2">
            </div>
            <!-- /.col -->
            <div class="col-md-5">
              <div class="form-group">
                <label>Auto:
                    <small  style="color: red"> *</small>
                </label>
                    <select id="sbAutos" class="select2 noceroautos" name="autos" style="width: 100%;">
                </select>
              </div>
              <!-- /.form-group -->
              <div class="form-group">
                <label for="hora_entrega">Hora de entrega:
                    <small  style="color: red"> *</small>
                </label>
                <input type="time" class="form-control required" id="hora_entrega" name="horaentrega" name="hora_entrega" placeholder="">
              </div>
              <!-- /.form-group -->
              <div class="form-group">
                <label for="hora_recogida">Hora de recogida:
                    <small style="color: red"> *</small>
                </label>
                <input type="time" class="form-control required" id="hora_recogida" name="horarecogida" name="hora_recogida" placeholder="">
              </div>
              <!-- /.form-group -->
              <div class="form-group">
                <label for="rngcantidadadultos">Cantidad de Adultos:
                    <small style="color: red"> *</small>
                </label>
                <input type="range" class="form-control-range custom-range nocero" id="rngcantidadadultos" name="cantadultos" min="0" max="50" step="1" value="0" oninput="num2.value = this.value">
                <output id="num2" style="float:right;">0</output>
            </div>
            <!-- /.form-group -->
            </div>
            <!-- /.col -->
          </div></br>
        </form>
          <div class="row">
            <strong> <i class="fas fa-users" style="color:#dc3545"> </i>&nbsp;Datos de los pasajeros:</strong>
          </div>
          <div class="row">
            <button id="btnAddPasajeros" type="button" class="btn float-right redbutton">@lang('cubanacan.adicionar')
              </button>&nbsp;
              <button id="btnDeletePasajeros" type="button" class="btn float-right redbutton" style="margin-right: 5px;">
                @lang('cubanacan.eliminar')
              </button>
          </div></br>
          <div class="row">
            <table class="table table-hover" role="grid" id="tblPasajeros">
                <thead>
                  <tr>
                    <th style="text-align: center;">Nombre y Apellidos</th>
                    <th style="text-align: center;">No. Pasaporte</th>
                    <th style="text-align: center;">Fecha de arribo</th>
                    <th style="text-align: center;">No. Vuelo</th>
                    <th style="text-align: center;">Nacionalidad</th>
                    <th style="text-align: center;">Opciones</th>
                  </tr>
                </thead>
                <tbody id="bdPasajeros">

                </tbody>
              </table>
          </div></br>
          <div class="row">
            <span><strong><i class="fas fa-lg fa-building" style="color:#dc3545"> </i>&nbsp;Hoteles:</strong> </br>
                Seleccione la forma en la cual usted va a reservar el hotel:
            </span>
          </div>
          <div class="form-group clearfix">
            <div class="icheck-danger">
              <input type="radio" name="rbHoteles" value="rbHotel" id="rbHotel">
              <label for="rbHotel">
                Directamente en la Recepción del hotel, luego del arribo al país.
              </label>
            </div>
            <div class="icheck-danger">
              <input type="radio" name="rbHoteles"  id="rbWeb" value="rbWeb" checked>
              <label for="rbWeb">
                De manera previa o anticipada (antes de llegar al País) a través de nuestro Sitio Web.
              </label>
            </div>
          </div></br>
          <div class="row" id="phBookinHoteles">
            <div class="col-md-5">
                <div id="phCantidadHab" class="form-group">
                    <label for="rngcantidadhabitaciones">Cantidad de Habitaciones:*</label>
                    <input type="range" class="form-control-range custom-range" id="rngcantidadhabitaciones"  min="0" max="2" value="0" step="1"  oninput="num4.value = this.value">
                    <output id="num4" style="float:right;">0</output>
                </div>
                <!-- /.form-group -->
            </div>
          </div></br>
          <div class="row" id="phBookinHotelestitle">
            <strong>Reservar hoteles:</strong>
          </div>
          <div class="row" id="phBookinHotelesButtons">
            <button id="btnAddHoteles" type="button" class="btn float-right redbutton">@lang('cubanacan.adicionar')
              </button>&nbsp;
              <button id="btnDeleteHoteles" type="button" class="btn float-right redbutton" style="margin-right: 5px;">
                @lang('cubanacan.eliminar')
              </button>
          </div></br>
          <div class="row ">
            <table class="table table-hover" role="grid" id="phBookinHotelesTable">
                <thead>
                  <tr>
                    <th style="width:45%;text-align:center">Hotel</th>
                    <th style="width:45%;text-align:center">Cantidad de habitaciones</th>
                    <th style="text-align:center;">Opciones</th>
                  </tr>
                </thead>
                <tbody id="bdHoteles">
                </tbody>
              </table>
          </div>
          <div class="row">
              <div>
                <span class="rounded spanFFTotal" id="spgrandTotal">Total a pagar: </span>
              </div>
          </div>
          <div class="row" style="float:right;">
            <button id="btnDeleteReserva" type="button" class="btn float-right redbutton" style="margin-right: 5px;">
                @lang('cubanacan.cancelar')
            </button>
            <button id="btnAddReserva" type="button" class="btn float-right redbutton" style="margin-right: 5px;">
                @lang('cubanacan.reservar')
            </button>
          </div>
    </div>
 </div>
 <div class="modal fade" id="modal-flexi-pasajeros">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="color: red;">Datos de los pasajeros</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

                <div class="modal-body">
                    <form id="frmPasajeros" name="frmPasajeros" role="form" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="tblFfdNombre">Nombre y apellidos:
                                        <small style="color: red"> *</small>
                                    </label>
                                    <input type="text" class="form-control required" id="tblFfdNombre">

                                </div>
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label for="tblFfdPasaporte">No pasaporte:
                                        <small style="color: red"> *</small>
                                    </label>
                                    <input type="text" class="form-control required" id="tblFfdPasaporte">
                                </div>
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label for="tbFechaArribo">Fecha de arribo:
                                        <small style="color: red"> *</small>
                                    </label>
                                    <input type="date" class="form-control required" name="tbFechaArribo" id="tbFechaArribo" min="{{date('Y-m-d')}}" placeholder="Fecha de Arribo">
                                    </div>
                                <!-- /.form-group -->
                            </div>
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Nacionalidad
                                        <small style="color: red"> *</small>
                                    </label>
                                    <select id="sbNacionalidad" class="select2bs4 nocero"  style="width: 100%;">
                                    </select>
                                </div>
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label for="tblFfdNoVuelo">No. de vuelo:
                                        <small style="color: red"> *</small>
                                    </label>
                                    <input type="text" class="form-control required" id="tblFfdNoVuelo">
                                </div>
                                <!-- /.form-group -->
                            </div>
                        </div>
                     </form>
                </div>
                <div class="modal-footer">
                    <button id="btnCancelPasajero" type="button" class="btn redbutton" style="float: right;">
                        @lang('cubanacan.cancelar')
                    </button>
                    <button id="btnAddPasajero" type="button" class="btn redbutton">@lang('cubanacan.guardar')</button>
                </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class="modal fade" id="modal-flexi-hoteles">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="color: red;">Reservar Hoteles</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body" id="phFrmHoteles">
                    <form id="frmHoteles" name="frmHoteles" role="form" enctype="multipart/form-data">
                        @csrf
                     <div id="phFrmHoteles" class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Hoteles:</label>
                                <select id="sbHoteles" name="sbHoteles" class="select2bs4 nocerohoteles" style="width: 100%;">
                                </select>
                              </div>
                              <!-- /.form-group -->
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="rngcantidadhabdobles">Cantidad de habitaciones dobles:*</label>
                                <input style="padding-top:12px;" type="range" class="form-control-range custom-range nocerooms" id="rngcantidadhabdobles"  name="rngcantidadhabdobles" min="0" max="2" value="0" step="1" oninput="num6.value = this.value">
                                <output id="num6" style="float:right;">0</output>
                            </div>
                        </div>
                     </div>
                    </form>
                </div>
                <div class="modal-footer">
                   <button id="btnCancelHotel" type="button" class="btn redbutton" style="float: right;">
                    @lang('cubanacan.cancelar')
                    </button>
                    <button id="btnAddHotel" type="button" class="btn redbutton"> @lang('cubanacan.guardar')</button>
                </div>

            </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class="modal fade" id="modal-flexi-warning">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="color: red;">Información</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body" id="phWarning" style="text-align:justify;">
                </div>
                <div class="modal-footer">
                   <button type="button" class="btn redbutton" data-dismiss="modal">OK</button>
                </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" id="modal-flexi-confirm">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="confirmLabel" style="color: red;">Confirmar</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body" id="phConfirmText" style="text-align:justify;">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn redbutton" id="btnConfirmNo">@lang('cubanacan.no')</button>
          <button type="button" class="btn redbutton" id="btnConfirmSi">@lang('cubanacan.si')</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

 @section('jscript')
    <script type="text/javascript">
        $(document).ready(function (){
              $.cubanacanMainNS.app.Init("sb");
              $.cubanacanMainNS.app.initRng(null,'rngcantidadhabitaciones','num4');
              $("#phCantidadHab").hide();
              $.cubanacanRenderComponentsNS.RenderPasajerosTable();
              $.cubanacanRenderComponentsNS.RenderHotelesTable();
        });
        $(document).on('change', "[id='dpfechaReserva']", function () {
            if(this.value!= null || this.value!=undefined)
            {
                var $parentTag = $(this).parent();
                $parentTag.removeClass('error');
                $('span.error',$parentTag).remove();
            }
        });
        $(document).on('change', "[id='tblugarentrega']", function () {
            if(this.value!= null || this.value!=undefined)
            {
                var $parentTag = $(this).parent();
                $parentTag.removeClass('error');
                $('span.error',$parentTag).remove();
            }
        });
        $(document).on('change', "[id='tblugarecojida']", function () {
            if(this.value!= null || this.value!=undefined)
            {
                var $parentTag = $(this).parent();
                $parentTag.removeClass('error');
                $('span.error',$parentTag).remove();
            }
        });
        $(document).on('change', "[id='rngcantidadnoches']", function () {
            if(this.value!= null || this.value!=undefined)
            {
                var $parentTag = $(this).parent();
                $parentTag.removeClass('error');
                $('span.error',$parentTag).remove();
                if(!$.cubanacanMainNS.app.GetIsWebBooking())
                {
                    var cantHab=parseInt($("#rngcantidadhabitaciones").val());
                    if(cantHab!==0)
                    {
                        $.cubanacanUtilesNS.CalculateFees(this.value,parseInt(this.value),$("#sbAutos").select2('data')[0].text,"change");
                    }
                }
                else
                {
                    $.cubanacanUtilesNS.ChangeCarForMultipleRooms($("#sbAutos").select2('data')[0].text);
                }
            }
        });
        $(document).on('change', "[id='rngcantidadhabdobles']", function () {
            if(this.value!= null || this.value!=undefined || this.value!=0 )
            {
                var $parentTag = $(this).parent();
                $parentTag.removeClass('error');
                $('span.error',$parentTag).remove();
            }
        });
        $(document).on('change', "[id='rngcantidadhabitaciones']", function () {
            if(this.value!= null || this.value!=undefined || this.value!=0 )
            {
                var $parentTag = $(this).parent();
                $parentTag.removeClass('error');
                $('span.error',$parentTag).remove();
                if(!$.cubanacanMainNS.app.GetIsWebBooking())
                {
                    $.cubanacanUtilesNS.CalculateFees(parseInt(this.value),$("#sbAutos").select2('data')[0].text,"change");
                }
            }
        });
        $(document).on('change', "[id='sbAutos']", function () {
            if(this.value!= 0)
            {
                var $parentTag = $(this).parent();
                $parentTag.removeClass('error');
                $('span.error',$parentTag).remove();
            }
        });
        $(document).on('change', "[id='hora_entrega']", function () {
            if(this.value!= null || this.value!=undefined)
            {
                var $parentTag = $(this).parent();
                $parentTag.removeClass('error');
                $('span.error',$parentTag).remove();
            }
        });
        $(document).on('change', "[id='hora_recogida']", function () {
            if(this.value!= null || this.value!=undefined)
            {
                var $parentTag = $(this).parent();
                $parentTag.removeClass('error');
                $('span.error',$parentTag).remove();
            }
        });
        $(document).on('change', "[id='rngcantidadadultos']", function () {
            if(this.value!= null || this.value!=undefined)
            {
                var $parentTag = $(this).parent();
                $parentTag.removeClass('error');
                $('span.error',$parentTag).remove();
                $.cubanacanMainNS.app.SetCantidadAdultos(this.value);
            }
        });
        $(document).on('change', "[id='rngcantidadmenores']", function () {
            if(this.value!= null || this.value!=undefined)
            {
                $.cubanacanMainNS.app.SetCantidadMenores(this.value);
            }
        });
        $(document).on('change', "[name='rbHoteles']", function ()
        {
            if(this.value=="rbHotel")
            {
                $("#num4").val(0);
            }
            else{
                $.cubanacanMainNS.app.SetTotalTopay(0.00,"change");
                $.cubanacanRenderComponentsNS.RenderTotalPrice();
            }
            this.value=="rbHotel"?$("#phCantidadHab").show():$("#phCantidadHab").hide();
            this.value=="rbWeb"?$("#phBookinHotelesTable").show():$("#phBookinHotelesTable").hide();
            this.value=="rbWeb"?$("#phBookinHotelesButtons").show():$("#phBookinHotelesButtons").hide();
            this.value=="rbWeb"?$("#phBookinHotelestitle").show():$("#phBookinHotelestitle").hide();
            this.value=="rbWeb"?$.cubanacanMainNS.app.SetIsWebBooking(true):$.cubanacanMainNS.app.SetIsWebBooking(false);

         });
       $(document).on('change', "[id='tbFechaArribo']", function ()
       {
            if(this.value!= null || this.value!=undefined)
            {
                var $parentTag = $(this).parent();
                $parentTag.removeClass('error');
                $('span.error',$parentTag).remove();

            }
        });
        $(document).on('change', "[id='tblFfdNombre']", function () {
            if(this.value!= null || this.value!=undefined)
            {
                var $parentTag = $(this).parent();
                $parentTag.removeClass('error');
                $('span.error',$parentTag).remove();
            }
        });
        $(document).on('change', "[id='tblFfdPasaporte']", function () {
            if(this.value!= null || this.value!=undefined)
            {
                var $parentTag = $(this).parent();
                $parentTag.removeClass('error');
                $('span.error',$parentTag).remove();
            }
        });
        $(document).on('change', "[id='sbNacionalidad']", function () {
            if(this.value!= 0)
            {
                var $parentTag = $(this).parent();
                $parentTag.removeClass('error');
                $('span.error',$parentTag).remove();
            }
        });

        $('#sbAutos').on("select2:select", function (e) {
             var itemToAdd = e.params.data.id;
             var itemText  = e.params.data.text;
             $.cubanacanUtilesNS.HandleAutosSelection(itemToAdd);
             if(!$.cubanacanMainNS.app.GetIsWebBooking())
             {
                var cantHab=parseInt($("#rngcantidadhabitaciones").val());
                if(cantHab!==0)
                {
                    $.cubanacanUtilesNS.CalculateFees(cantHab,itemText,"change");
                }
             }
             else{
                $.cubanacanUtilesNS.ChangeCarForMultipleRooms(itemText);
             }
        });
        $(document).on('change', "[id='tblFfdNoVuelo']", function () {
            if(this.value!= null || this.value!=undefined)
            {
                var $parentTag = $(this).parent();
                $parentTag.removeClass('error');
                $('span.error',$parentTag).remove();

            }
        });
        $('#sbHoteles').on('select2:select', function (e) {
            if(this.value!=0)
            {
                $('span.error').remove();
                $('.form-group',$('#frmHoteles')).removeClass('error');
            }
        });
        $("#btnAddHoteles").click(function () {
           if($('#nodatapasajerosrow').length != "0")
            {
                $("#phWarning").html("<span class='error'>"+$.cubanacanUtilesNS.GetLocalizedMessage($.cubanacanMainNS.app.GetWarningMessage(),"nopasajeros")+"</span>");
                $('#modal-flexi-warning').modal('show');
            }
            else
            {
                $('#modal-flexi-hoteles').modal('show');
            }
        });
        $("#btnAddPasajeros").click(function () {
           $.cubanacanFormDataHandlingNS.ValidateFrm("frmFfdReserva",true);
            if(!$.cubanacanMainNS.app.GetValidMainForm())
            {
                $("#phWarning").html("<span class='error'>"+$.cubanacanUtilesNS.GetLocalizedMessage($.cubanacanMainNS.app.GetWarningMessage(),"CantidadPasajerosCarro")+"</span>");
                $('#modal-flexi-warning').modal('show');
            }
            else{
                $('#modal-flexi-pasajeros').modal('show');
            }
        });

        $("#btnAddReserva").click(function () {
            $.cubanacanFormDataHandlingNS.ValidateFrm("frmFfdReserva");
        });

        $("#btnDeleteReserva").click(function () {
            $.cubanacanRenderComponentsNS.ModalConfirmSetUp("reserva");
            $.cubanacanRenderComponentsNS.ResetForm("frmFfdReserva");
        });

        $("#btnCancelPasajero").click(function () {
            $.cubanacanRenderComponentsNS.ResetForm("frmPasajeros");
        });

        $("#btnCancelHotel").click(function () {
            $.cubanacanRenderComponentsNS.ResetForm("frmHoteles");
        });

        $("#btnAddHotel").click(function () {
            $.cubanacanFormDataHandlingNS.ValidateFrm("frmHoteles");
        });

        $("#btnAddPasajero").click(function () {
            $.cubanacanFormDataHandlingNS.ValidateFrm("frmPasajeros");
        });

        $("#btnDeletePasajeros").click(function () {
            if($('#nodatapasajerosrow').length != "0")
            {
                $("#phWarning").html("<span class='error' style='text-align:justify;'>"+$.cubanacanUtilesNS.GetLocalizedMessage($.cubanacanMainNS.app.GetWarningMessage(),"nodata2delete")+"</span>");
                $('#modal-flexi-warning').modal('show');
            }
            else
            {
                $.cubanacanRenderComponentsNS.ModalConfirmSetUp("pasajeros");
            }
        });

        $("#btnDeleteHoteles").click(function () {
            if($('#nodatahotelesrow').length != "0")
            {
                $("#phWarning").html("<span class='error'>"+$.cubanacanUtilesNS.GetLocalizedMessage($.cubanacanMainNS.app.GetWarningMessage(),"nodata2delete")+"</span>");
                $('#modal-flexi-warning').modal('show');
            }
            else
            {
                $.cubanacanRenderComponentsNS.ModalConfirmSetUp("hoteles");
            }

        });

        $("#modal-flexi-hoteles").on("hidden.bs.modal", function () {
            $.cubanacanRenderComponentsNS.ResetForm("frmHoteles");
        });

        $("#modal-flexi-pasajeros").on("hidden.bs.modal", function () {
           $.cubanacanRenderComponentsNS.ResetForm("frmPasajeros");
        });

        function editPasajero(id)
        {
            var pasajeroId=parseInt(id.substring(id.indexOf("-")+1,id.length));
            $.cubanacanMainNS.app.SetEditingPasajero(pasajeroId);
            $.cubanacanFormDataHandlingNS.ShowEditPasajeroModal();
        };

        function deletePasajero(id)
        {
            var pasajeroId=parseInt(id.substring(id.indexOf("-")+1,id.length));
            $.cubanacanMainNS.app.SetPasajeroToDelete(pasajeroId);
            $.cubanacanRenderComponentsNS.ModalConfirmSetUp("pasajeros",1);
        };

        function editHotel(id)
        {
            var hotelId=parseInt(id.substring(id.indexOf("-")+1,id.length));
            $.cubanacanMainNS.app.SetEditingHotel(hotelId);
            $.cubanacanFormDataHandlingNS.ShowEditHotelModal();
        };

        function deleteHotel(id)
        {
            var hotelId=parseInt(id.substring(id.indexOf("-")+1,id.length));
            $.cubanacanMainNS.app.SetHotelToDelete(hotelId);
            $.cubanacanRenderComponentsNS.ModalConfirmSetUp("hoteles",1);
        };

    </script>
 @endsection

