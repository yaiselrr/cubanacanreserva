<div class="row mb-2" id="bloques1">
    <div class="col-md-12" id="payment">
        <div class="card">
            <div class="card-header border-0 mx-auto" >
              <h3 class="card-title" style="color:#dc3545;font-weight:bold;" >@lang('cubanacan.realizar-pago')</h3>
            </div>
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                    <p class="d-flex flex-column text-left">
                       <span class="text-muted"> {{count($reservas)}}&nbsp;Producto(s)</span>
                    </p>
                    <p class="d-flex flex-column text-right">
                        <span class="font-weight-bold">
                            <i class="ion ion-android-arrow-up text-success"></i>@lang('cubanacan.total-pagar')&nbsp;{{$totalTopay}}
                        </span>
                        </p>
              </div>
              @if($reservas)
                @foreach($reservas as $producto)
                    <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                        <p class="text-success text">
                            <span class="text-muted">{{$producto['tipo_producto']}}</span>
                        </p>
                        <p class="d-flex flex-column text-right">
                        <span class="font-weight-bold">
                            <i class="ion ion-android-arrow-up text-success"></i>@lang('cubanacan.total-pagar-prod')&nbsp;{{$producto['total_precio']}}
                        </span>
                        </p>
                    </div>
                    <!-- /.d-flex -->
                        @if($producto['tipo_producto']=="Programa Flexi Fly Drive")
                        <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                            <p class="text-success text">
                                <span class="text-muted"></span>
                            </p>
                            <p class="d-flex flex-column text-right">
                                <span>
                                    <i class="ion ion-android-arrow-up text-success"></i>@lang('cubanacan.auto')&nbsp;{{$producto['auto']}}
                                </span>
                            </p>
                        </div>
                        <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                            <p class="text-success text">
                                <span class="text-muted"></span>
                            </p>
                            <p class="d-flex flex-column text-right">
                                <span>
                                    <i class="ion ion-android-arrow-up text-success"></i>@lang('cubanacan.adultos')&nbsp;
                                    {{$producto['cantAdultos']}}&nbsp;@lang('cubanacan.menores')&nbsp;{{$producto['cantN012']}}
                                    &nbsp;@lang('cubanacan.cantnoches')&nbsp;{{$producto['cantidadnoches']}}
                                </span>
                            </p>
                        </div>
                        <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                            <p class="text-success text">
                                <span class="text-muted"></span>
                            </p>
                            <p class="d-flex flex-column text-right">
                                <span>
                                    <i class="ion ion-android-arrow-up text-success"></i>@lang('cubanacan.cantHab')&nbsp;{{$producto['cantHabitaciones']}}
                                </span>
                            </p>
                        </div>
                        @else
                        // ir agregando el codigo del resto de los productos
                        @endif

                    <!-- /.d-flex -->
                @endforeach
                @else

                @endif
            </div>
          </div>
    </div>
</div>
<div class="row mb-2" id="bloques1">
    <div class="col-md-12" id="booking">
        <div class="card">
            <div class="card-header border-0" >
              <h3 class="card-title" >@lang('cubanacan.datos-reserva')</h3>
            </div>
            <div class="card-body pad table-responsive">
                <div class="row">
                    <span>@lang('cubanacan.pasarela-text')</span>
                </div><br/>
                <div class="row">
                    <span>@lang('cubanacan.tipo-tarjeta')</span>
                </div><br/>
                <div class="row">
                    <ul class="ulcreditcard">
                        @foreach($tarjetas as $tarjeta)
                        <li class="ulcreditcard">
                          <input class="ulcreditcard" type="checkbox" id="{{'cbCreditCard'.$tarjeta->id}}" name="creditcardlist" />
                          <label class="ulcreditcard" for="{{'cbCreditCard'.$tarjeta->id}}">
                            <img class="ulcreditcard" src="{{asset('/storage/'.$tarjeta->imagen)}}"
                          </label>
                        </li>
                        @endforeach
                      </ul>
                </div>
                <div class="row">
                    <span>@lang('cubanacan.titular-reserva')</span>
                </div><br/>
                <form id="frmPayment" action="" method="post">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="tbTitulardNombre">Nombre y apellidos:
                                    <small style="color: red"> *</small>
                                </label>
                                <input type="text" class="form-control required" id="tbTitulardNombre">
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label>@lang('cubanacan.nacionalidad')
                                    <small style="color: red"> *</small>
                                </label>
                                <select id="sbNacionalidadPay" class="select2bs4 noceronacionalidades"  style="width: 100%;">
                                </select>
                            </div>
                            <!-- /.form-group -->
                          <div class="form-group">
                            <div class="custom-control custom-checkbox">
                              <input class="custom-control-input" type="checkbox" id="cbterms" value="option1">
                              <label for="cbterms" class="custom-control-label">@lang('cubanacan.acuerdotitulo')&nbsp;<a href="javascript:">@lang('cubanacan.acuerdotitulolink')</a></label>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-2">
                        </div>
                        <!-- /.col -->
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="tblPaymentEmail">@lang('cubanacan.emailfield'):
                                    <small style="color: red"> *</small>
                                </label>
                                <input type="text" class="form-control email" id="tblPaymentEmail">
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                              <label for="tbPaymentPhone">@lang('cubanacan.phonefield'):
                                  <small style="color: red"> *</small>
                              </label>
                              <input type="text" class="form-control phone" id="tbPaymentPhone">
                            </div>
                        </div>
                        <!-- /.col -->
                      </div></br>
                </form>
                <div class="row"  style="float:right;">
                    <button id="btnCancelPayment" type="button" class="btn float-right redbutton" style="margin-right: 5px;">
                        @lang('cubanacan.cancelar')
                    </button>
                    <button id="btnPayment" type="button" class="btn float-right redbutton" style="margin-right: 5px;">
                        @lang('cubanacan.pagar')
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@section('jscript')
    <script type="text/javascript">
        $(document).ready(function (){
            $.cubanacanMainNS.app.Init("sb");
        });

        $('input[name="creditcardlist"]').on('change', function() {
            $('input[name="' + this.name + '"]').not(this).prop('checked', false);
        });

        $("#btnPayment").click(function () {
            $.cubanacanFormDataHandlingNS.ValidateFrm("frmPayment");
        });

        $("#btnCancelPayment").click(function () {
            $.cubanacanRenderComponentsNS.ResetForm("frmPayment");
        });

        $(document).on('change', "[id='tbTitulardNombre']", function () {
            if(this.value!= null || this.value!=undefined)
            {
                var $parentTag = $(this).parent();
                $parentTag.removeClass('error');
                $('span.error',$parentTag).remove();
            }
        });
        $(document).on('change', "[id='tblPaymentEmail']", function () {
            var regExp = new RegExp(/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/);
            if(this.value!= null || this.value!=undefined)
            {
                if(regExp.test(this.value) != false)
                {
                    var $parentTag = $(this).parent();
                    $parentTag.removeClass('error');
                    $('span.error',$parentTag).remove();
                }
            }
        });
        $(document).on('change', "[id='tbPaymentPhone']", function () {
            var regExp = new RegExp( /^(?:(?:\(?(?:00|\+)([1-4]\d\d|[1-9]\d?)\)?)?[\-\.\ \\\/]?)?((?:\(?\d{1,}\)?[\-\.\ \\\/]?){0,})(?:[\-\.\ \\\/]?(?:#|ext\.?|extension|x)[\-\.\ \\\/]?(\d+))?$/i);
            if(this.value!= null || this.value!=undefined || this.value!='')
            {
                if(regExp.test(this.value) != false)
                {
                    var $parentTag = $(this).parent();
                    $parentTag.removeClass('error');
                    $('span.error',$parentTag).remove();
                }
                else
                {
                    var $parentTag = $(this).parent();
                    $('span.error',$parentTag).html($.cubanacanUtilesNS.GetLocalizedMessage($.cubanacanMainNS.app.GetWarningMessage(),"phone"));
                }
            }
        });
    </script>
@endsection


