(function ($) {

    const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    const sbSelectors=['sbAutos','sbNacionalidad','sbHoteles','sbNacionalidadPay'];

    var reservaModelDTO;
    var pasajerosModelDTO = [];
    var hotelesModelDTO =[];
    var hotelesCantHab=[];

    var localizedTextForBlade={
        'TotalToPay':{
            'es':'Total a pagar: ',
            'en':'Total a pagar: ',
            'de':'Total a pagar: ',
            'fr':'Total a pagar: ',
            'it':'Total a pagar: ',
        }
    }
    var sb2LocalizedMessage={
        'Autos':{
            'es':'Seleccione un modelo',
            'en':'Seleccione un modelo',
            'de':'Seleccione un modelo',
            'fr':'Seleccione un modelo',
            'it':'Seleccione un modelo'
        },
        'Hoteles':{
            'es':'Seleccione un hotel',
            'en':'Seleccione un hotel',
            'de':'Seleccione un hotel',
            'fr':'Seleccione un hotel',
            'it':'Seleccione un hotel',
        },
        'Nacionalidades':{
            'es':'Seleccione una nacionalidad',
            'en':'Seleccione una nacionalidad',
            'de':'Seleccione una nacionalidad',
            'fr':'Seleccione una nacionalidad',
            'it':'Seleccione una nacionalidad'
        },
    }
    var tablesNoDataLocalizedMessage={
        'Pasajeros':{
            'es':'No se han registrado datos de los pasajeros en su reserva',
            'en':'No se han registrado datos de los pasajeros en su reserva',
            'de':'No se han registrado datos de los pasajeros en su reserva',
            'fr':'No se han registrado datos de los pasajeros en su reserva',
            'it':'No se han registrado datos de los pasajeros en su reserva',
        },
        'Hoteles':{
            'es':'No se han registrado datos de los hoteles en su reserva',
            'en':'No se han registrado datos de los hoteles en su reserva',
            'de':'No se han registrado datos de los hoteles en su reserva',
            'fr':'No se han registrado datos de los hoteles en su reserva',
            'it':'No se han registrado datos de los hoteles en su reserva',
        }
    }
    var ajaxFormsValidationsLocalizedMessage={
        'nopasajeros':{
            'es':'Ud debe agregar el listado de pasajeros a su reserva antes de los hoteles<',
            'en':'You must add the pasengers list before booking any hotel',
            'de':'Ud debe agregar el listado de pasajeros a su reserva antes de los hoteles<',
            'fr':'Ud debe agregar el listado de pasajeros a su reserva antes de los hoteles<',
            'it':'Ud debe agregar el listado de pasajeros a su reserva antes de los hoteles<',
        },
        'required':{
            'es':'Debe establecer un valor para el campo',
            'en':'You must enter a value for the field',
            'de':'Debe establecer un valor para el campo',
            'fr':'Debe establecer un valor para el campo',
            'it':'Debe establecer un valor para el campo',
        },
        'email':{
            'es':'Email inválido',
            'en':'Invalid email',
            'de':'Email inválido',
            'fr':'Email inválido',
            'it':'Email inválido',
        },
        'phone':{
            'es':'Número de telefono inválido',
            'en':'Invalid phone number',
            'de':'Número de telefono inválido',
            'fr':'Número de telefono inválido',
            'it':'Número de telefono inválido',
        },
        'nocero':{
            'es':'El valor debe ser mayor que cero',
            'en':'The value must be bigger than cero',
            'de':'El valor debe ser mayor que cero',
            'fr':'El valor debe ser mayor que cero',
            'it':'El valor debe ser mayor que cero',
        },
        'noceroshoteles':{
            'es':'Debe seleccionar un hotel',
            'en':'You must select a Hotel',
            'de':'Debe seleccionar un hotel',
            'fr':'Debe seleccionar un hotel',
            'it':'Debe seleccionar un hotel',
        },
        'nocerosnacionalidades':{
            'es':'Debe seleccionar una nacionalidad',
            'en':'You must select a Nacionality',
            'de':'Debe seleccionar una nacionalidad',
            'fr':'Debe seleccionar una nacionalidad',
            'it':'Debe seleccionar una nacionalidad',
        },
        'nocerosrooms':{
            'es':'Debe especificar la cantidad de habitaciones dobles',
            'en':'You must specify the amount of double rooms',
            'de':'Debe especificar la cantidad de habitaciones dobles',
            'fr':'Debe especificar la cantidad de habitaciones dobles',
            'it':'Debe especificar la cantidad de habitaciones dobles',
        },
        'nocerosautos':{
            'es':'Debe seleccionar un modelo de auto',
            'en':'You must select a car model',
            'de':'Debe seleccionar un modelo de auto',
            'fr':'Debe seleccionar un modelo de auto',
            'it':'Debe seleccionar un modelo de auto',
        },
        'capacidadautospasajeros':{
            'es':'La cantidad de pasajeros introducida es superior a la capacidad del seleccionado',
            'en':'La cantidad de pasajeros introducida es superior a la capacidad del seleccionado',
            'de':'La cantidad de pasajeros introducida es superior a la capacidad del seleccionado',
            'fr':'La cantidad de pasajeros introducida es superior a la capacidad del seleccionado',
            'it':'La cantidad de pasajeros introducida es superior a la capacidad del seleccionado',
        },
        'controlesvslitadopasajeros':{
            'es':'La cantidad total de pasajeros(cants. adultos mas menores) no coincide con el total del listado de pasajeros',
            'en':'La cantidad total de pasajeros(cants. adultos mas menores) no coincide con el total del listado de pasajeros',
            'de':'La cantidad total de pasajeros(cants. adultos mas menores) no coincide con el total del listado de pasajeros',
            'fr':'La cantidad total de pasajeros(cants. adultos mas menores) no coincide con el total del listado de pasajeros',
            'it':'La cantidad total de pasajeros(cants. adultos mas menores) no coincide con el total del listado de pasajeros',
        }
    }
    var confirmMessage={
        'deletePasajeros':{
            'es':'Está seguro que desea eliminar todos los datos de los listados de pasajeros y hoteles ?',
            'en':'Are You shure you want to delete all the pasengers and hotels lists data ?',
            'de':'Está seguro que desea eliminar todos los datos de los listados de pasajeros y hoteles ?',
            'fr':'Está seguro que desea eliminar todos los datos de los listados de pasajeros y hoteles ?',
            'it':'Está seguro que desea eliminar todos los datos de los listados de pasajeros y hoteles ?',
        },
        'deletePasajero':{
            'es':'Está seguro que desea eliminar todos los datos del pasajero: ',
            'en':'Are You shure you want to delete all of the passenger: ',
            'de':'Está seguro que desea eliminar todos los datos del pasajero: ',
            'fr':'Está seguro que desea eliminar todos los datos del pasajero: ',
            'it':'Está seguro que desea eliminar todos los datos del pasajero: ',
        },
        'deleteHotel':{
            'es':'Está seguro que desea eliminar los datos del hotel: ',
            'en':'Are You shure you want to delete the data of hotel: ',
            'de':'Está seguro que desea eliminar los datos del hotel: ',
            'fr':'Está seguro que desea eliminar los datos del hotel: ',
            'it':'Está seguro que desea eliminar los datos del hotel: ',
        },
        'deleteHoteles':{
            'es':'Está seguro que desea eliminar todos los datos del listado de hoteles ?',
            'en':'Are You shure you want to delete all the hotels lists data ?',
            'de':'Está seguro que desea eliminar todos los datos del listado de hoteles ?',
            'fr':'Está seguro que desea eliminar todos los datos del listado de hoteles ?',
            'it':'Está seguro que desea eliminar todos los datos del listado de hoteles ?',
        },
        'deleteReserva':{
            'es':'Está seguro? Al eliminar la reserva todos los datos de los listados de pasajeros y hoteles serán eliminados junto con la misma',
            'en':'Are You shure? By deleting the bookin data you will delete all the pasengers and hotels lists data with it ?',
            'de':'Está seguro? Al eliminar la reserva todos los datos de los listados de pasajeros y hoteles serán eliminados junto con la misma',
            'fr':'Está seguro? Al eliminar la reserva todos los datos de los listados de pasajeros y hoteles serán eliminados junto con la misma',
            'it':'Está seguro? Al eliminar la reserva todos los datos de los listados de pasajeros y hoteles serán eliminados junto con la misma',
        }
    }
    var warningMessage={
        'nopasajeros':{
            'es':'Ud debe agregar el listado de pasajeros a su reserva antes de los hoteles',
            'en':'You must add the pasengers list before booking any hotel',
            'de':'Ud debe agregar el listado de pasajeros a su reserva antes de los hoteles',
            'fr':'Ud debe agregar el listado de pasajeros a su reserva antes de los hoteles',
            'it':'Ud debe agregar el listado de pasajeros a su reserva antes de los hoteles',
        },
        'nodata2delete':{
            'es':'No hay datos para ser eliminados',
            'en':'There is no data to delete',
            'de':'No hay datos para ser eliminados',
            'fr':'No hay datos para ser eliminados',
            'it':'No hay datos para ser eliminados',

        },
        'CantidadPasajerosCarro':{
            'es':'No se ha llenado aun el formulario de la reserva',
            'en':'The booking form is not filled yet',
            'de':'No se ha llenado aun el formulario de la reserva',
            'fr':'No se ha llenado aun el formulario de la reserva',
            'it':'No se ha llenado aun el formulario de la reserva',
        },
        'CantidadPasajerosControlesvsListado':{
            'es':'El total de pasajeros registrados en el listado debe ser igual a la cantidad especificada en el formulario',
            'en':'El total de pasajeros registrados en el listado debe ser igual a la cantidad especificada en el formulario',
            'de':'El total de pasajeros registrados en el listado debe ser igual a la cantidad especificada en el formulario',
            'fr':'El total de pasajeros registrados en el listado debe ser igual a la cantidad especificada en el formulario',
            'it':'El total de pasajeros registrados en el listado debe ser igual a la cantidad especificada en el formulario',
        },
        'CantidadPasajerosvsRooms':{
            'es':'El total de pasajeros registrados en el listado debe ser igual a la cantidad especificada en el formulario',
            'en':'El total de pasajeros registrados en el listado debe ser igual a la cantidad especificada en el formulario',
            'de':'El total de pasajeros registrados en el listado debe ser igual a la cantidad especificada en el formulario',
            'fr':'El total de pasajeros registrados en el listado debe ser igual a la cantidad especificada en el formulario',
            'it':'El total de pasajeros registrados en el listado debe ser igual a la cantidad especificada en el formulario',
        },
        'phone':{
            'es':'Número de telefono inválido',
            'en':'Invalid phone number',
            'de':'Número de telefono inválido',
            'fr':'Número de telefono inválido',
            'it':'Número de telefono inválido',
        },
    }
    var carritoComprasMessage={
        'carritocreado':{
            'es':'El producto se ha añadido al Carrito de compras.',
            'en':'El producto se ha añadido al Carrito de compras.',
            'de':'El producto se ha añadido al Carrito de compras.',
            'fr':'El producto se ha añadido al Carrito de compras.',
            'it':'El producto se ha añadido al Carrito de compras.',
        }
    }
    var dsNacionalidades,dsAutos,dsAutosCapacidades=[],dsHoteles,cantDobles,hotelesTableCounter=0,pasajerosTableCounter=0, startingIndex=0,autosId=[],autosText=[];

    $.cubanacanMainNS = {
        app: new function () {
            var self = this;
            var locale='es', editingPasajero, deletingPasajero, editingHotel, deletingHotel, cantidadHabitaciones=0,cantidadAdultos=0,cantidadMenores=0,cantidaAsientosAutos=0 ,isValid=false,totalTopay=0.00,isWebBooking=true;
            const baseUrl = "/home/productos/FlexyFlyDrive/";
            self.Init = function (tag) {
                self.BaseUrl = baseUrl;
                self.initSBs();
            }
            self.BuildUrl = function (path) {
                return self.BaseUrl + path;
            }
            self.SetLocale=function(lang){
                locale=lang;
            }
            self.GetLocale=function(){
                return locale;
            }
            self.SetValidMainForm=function(valid){
                isValid=valid;
            }
            self.GetValidMainForm=function(){
                return isValid;
            }
            self.SetCantidadAsientos=function(cantidadAsientos){
                (cantidadAsientos==0)?cantidaAsientosAutos=0:cantidaAsientosAutos+=cantidadAsientos;
            }
            self.GetCantidadAsientos=function(){
                return cantidaAsientosAutos;
            }
            self.SetCantidadHabitaciones=function(cantHab){
                cantidadHabitaciones=cantHab;
            }
            self.GetCantidadHabitaciones=function(){
                return cantidadHabitaciones;
            }
            self.SetCantidadAdultos=function(cantAdult){
                cantidadAdultos=cantAdult;
            }
            self.GetCantidadAdultos=function(){
                return cantidadAdultos;
            }
            self.SetCantidadMenores=function(cantMen){
                cantidadMenores=cantMen;
            }
            self.GetCantidadMenores=function(){
                return cantidadMenores;
            }
            self.SetIsWebBooking=function(webBoking){
                isWebBooking=webBoking;
            }
            self.GetIsWebBooking=function(){
                return isWebBooking;
            }
            self.SetTotalTopay=function(price,ops){
                if(ops=="change")
                {
                    totalTopay=price;
                }
                else if(ops=="remove")
                {
                    totalTopay-=price;
                }
                else
                {
                    totalTopay+=price;
                }
            }
            self.GetTotalTopay=function(){
                return totalTopay.toFixed(2);
            }
            self.SetEditingPasajero=function(pasajeroId){
                editingPasajero=pasajeroId;
            }
            self.GetEditingPasajero=function(){
                return editingPasajero;
            }
            self.SetPasajeroToDelete=function(pasajeroId){
                deletingPasajero=pasajeroId;
            }
            self.GetPasajeroToDelete=function(){
                return deletingPasajero;
            }
            self.SetEditingHotel=function(hotelId){
                editingHotel=hotelId;
            }
            self.GetEditingHotel=function(){
                return editingHotel;
            }
            self.SetHotelToDelete=function(hotelId){
                deletingHotel=hotelId;
            }
            self.GetHotelToDelete=function(){
                return deletingHotel;
            }
            self.GetWarningMessage=function(){
                return warningMessage;
            }
            self.initSBs = function(){
                $.cubanacanDataSourcesNS.GetDataForAutosSB();
                $.cubanacanDataSourcesNS.GetDataForNacionalidadesSB();
                $.cubanacanDataSourcesNS.GetDataForHotelesSB();
                $.cubanacanRenderComponentsNS.RenderTotalPrice();
                $.each(sbSelectors,function(index, value) {
                    $.cubanacanRenderComponentsNS.RenderSB2(value);
                });
            }
            self.initRng=function(id,selector,num)
                {
                if(id==null)
                {
                    $("#"+selector).attr({
                        "max" :2,
                        "min" :0
                    });
                    $("#"+num).val(0);
                }
                else
                {
                    $("#"+selector).attr({
                        "max" :2,
                        "min" :0
                    });
                    $("#"+selector).val(0);
                    $("#"+num).val(0);
                }
                }
        }
    };
    $.cubanacanDataSourcesNS={
        GetDataForNacionalidadesSB: function()
        {
            dsResult = $.parseJSON($.ajax({
                url: $.cubanacanMainNS.app.BuildUrl("getNacionalidades"),
                method: "get",
                dataType: 'json',
                async: false,
                data: CSRF_TOKEN
            }).responseText);
            dsNacionalidades=dsResult;
            dsNacionalidades.unshift({ id: "0", text: $.cubanacanUtilesNS.GetLocalizedMessage(sb2LocalizedMessage,"Nacionalidades")});
        },
        GetDataForAutosSB: function()
        {
            dsResult = $.parseJSON($.ajax({
                url: $.cubanacanMainNS.app.BuildUrl("getAutos"),
                method: "get",
                dataType: 'json',
                async: false,
                data: CSRF_TOKEN
            }).responseText);
            dsAutos=$.cubanacanUtilesNS.SplitAutosDS(dsResult);
            dsAutos.unshift({ id: "0", text: $.cubanacanUtilesNS.GetLocalizedMessage(sb2LocalizedMessage,"Autos")});
        },
        GetDataForHotelesSB: function()
        {
            dsResult = $.parseJSON($.ajax({
                url: $.cubanacanMainNS.app.BuildUrl("getHoteles"),
                method: "get",
                dataType: 'json',
                async: false,
                data: CSRF_TOKEN
            }).responseText);
            dsHoteles=dsResult;
            dsHoteles.unshift({ id: "0", text: $.cubanacanUtilesNS.GetLocalizedMessage(sb2LocalizedMessage,"Hoteles")});
        },
        GetCantHabDobles: function(id)
        {
            dsResult = $.parseJSON($.ajax({
                url: $.cubanacanMainNS.app.BuildUrl("getCantidadDisponible")+"/"+id,
                method: "get",
                dataType: 'json',
                async: false,
                data: CSRF_TOKEN
            }).responseText);
            cantDobles=dsResult[0].cantdobles;
        }
    };
    $.cubanacanRenderComponentsNS={
        RenderTotalPrice:function(){
            var localizedMessage=$.cubanacanUtilesNS.GetLocalizedMessage(localizedTextForBlade,"TotalToPay")
            $("#spgrandTotal").html(localizedMessage+$.cubanacanMainNS.app.GetTotalTopay()+ " USD");
        },
        RenderSB2:function(selector)
        {
             var dataSource=(selector=="sbAutos")?dsAutos:(selector=="sbHoteles")?dsHoteles:dsNacionalidades;
            $("#"+selector).select2(
            {
                theme: 'bootstrap4',
                minimumResultsForSearch: Infinity,
                dropdownCssClass : 'no-search',
                language: {
                    noResults: function() {
                        return "No hay resultados";
                    },
                    searching: function() {
                        return "Buscando...";
                    }
                },
                data:dataSource
            });
        },
        ResetForm:function(selector)
        {
            if(selector=="frmFfdReserva")
            {
                if($(".select2").length)
                {
                    $(".select2").val('0');
                    $(".select2").change();
                }
            }
            $('#'+selector).trigger("reset");
            if($(".select2bs4").length)
            {
                $(".select2bs4").val('0');
                $(".select2bs4").change();
            }
            $('.form-group',$('#'+selector)).removeClass('error');
            $('span.error').remove();
        },
        RenderPasajerosTable:function(itemPasajeros,ops)
        {
            noDataPasajerosMessage=$.cubanacanMainNS.app.GetLocale()=="es"?tablesNoDataLocalizedMessage.Pasajeros.es:tablesNoDataLocalizedMessage.Pasajeros.en;
            if((pasajerosTableCounter ==0) && (itemPasajeros==null || itemPasajeros == undefined))
            {
                $.cubanacanUtilesNS.CreateEmptyTableRow('6',noDataPasajerosMessage,'bdPasajeros');
            }
            else
            {
                if(ops==null || ops==undefined)
                {
                    var $tblPasajerosRow = $('#nodatapasajerosrow');
                    if($tblPasajerosRow.length!=0)
                    {
                        $tblPasajerosRow.remove();
                    }
                    var rowClass=($.cubanacanUtilesNS.IsEven(pasajerosTableCounter))?"even":"odd";
                    var $tblNewPasajerosRowTr=$("<tr id='pasajero-"+itemPasajeros.Id+"' class='"+rowClass+"'>");
                    $tblNewPasajerosRowTr.append('<td id="pasajeroName" style="text-align:center;">'+itemPasajeros.NombreApellidos+' </td><td id="noPassport" style="text-align:center;">'+itemPasajeros.NoPasaporte+' </td><td id="fechaArribo" style="text-align:center;">'+itemPasajeros.FechaArribo+' </td><td id="noVuelo" style="text-align:center;">'+itemPasajeros.NoVuelo+'</td><td id="Nacionalidad" style="text-align:center;">'+itemPasajeros.Nacionalidad+'</td><td id="tdAction" style="text-align:center;"><a onclick="javascript:editPasajero(this.id);" id="bntEditPasajero-'+itemPasajeros.Id+'" style="cursor:pointer;" ><i class="fas fa-edit" style="color:#dc3545"></i></a>&nbsp;&nbsp;&nbsp;<a id="bntDeletePasajero-'+itemPasajeros.Id+'" onclick="javascript:deletePasajero(this.id);" style="cursor:pointer;"><i class="fas fa-trash" style="color:#dc3545"></i></a></td>');
                    $('#bdPasajeros').append($tblNewPasajerosRowTr);
                    pasajerosTableCounter ++;
                }
                else
                {
                    $tableRow=$('#bdPasajeros').find("#pasajero-"+itemPasajeros.Id);
                    var $nameTdOld=$tableRow.find("#pasajeroName");
                    var $noPasaporteTdOld=$tableRow.find("#noPassport");
                    var $fechaArriboTdOld=$tableRow.find("#fechaArribo");
                    var $noVueloTdOld=$tableRow.find("#noVuelo");
                    var $nacionalidadTdOld=$tableRow.find("#Nacionalidad");
                    $nameTdOld.html(itemPasajeros.NombreApellidos);
                    $noPasaporteTdOld.html(itemPasajeros.NoPasaporte);
                    $fechaArriboTdOld.html(itemPasajeros.FechaArribo);
                    $noVueloTdOld.html(itemPasajeros.NoVuelo);
                    $nacionalidadTdOld.html(itemPasajeros.Nacionalidad);
                }

            }
        },
        RenderHotelesTable:function(itemHoteles,ops)
        {
            noDataHotelesMessage=$.cubanacanMainNS.app.GetLocale()=="es"?tablesNoDataLocalizedMessage.Hoteles.es:tablesNoDataLocalizedMessage.Hoteles.en;
            if(hotelesTableCounter==0 && (itemHoteles==null || itemHoteles == undefined))
            {
                $.cubanacanUtilesNS.CreateEmptyTableRow('3',noDataHotelesMessage,'bdHoteles');
            }
            else
            {
                if(ops==null || ops==undefined)
                {
                    var $tblRow = $('#nodatahotelesrow');
                    if($tblRow.length!=0)
                    {
                        $tblRow.remove();
                    }
                    var rowClass=($.cubanacanUtilesNS.IsEven(hotelesTableCounter))?"even":"odd";
                    var $tblNewRowTr=$("<tr id='hotel-"+itemHoteles.Id+"' class='"+rowClass+"'>");
                    $tblNewRowTr.append('<td id="hotelName" style="text-align:center;" >'+itemHoteles.Hotel+' </td><td id="cantidadHab" style="text-align:center;">'+itemHoteles.CantidadHab+' </td><td id="tdAction" style="text-align:center;"><a id="bntEdit-'+itemHoteles.Id+'" onclick="javascript:editHotel(this.id)" style="cursor:pointer;"><i class="fas fa-edit" style="color:#dc3545"></i></a>&nbsp;&nbsp;&nbsp;<a id="btnDelete-'+itemHoteles.Id+'" onclick="javascript:deleteHotel(this.id)" style="cursor:pointer;"><i class="fas fa-trash" style="color:#dc3545"></i></a></td>');
                    $('#bdHoteles').append($tblNewRowTr);
                    hotelesTableCounter ++;
                 }
                 else
                 {
                    $tableHotelesRow=$('#bdHoteles').find("#hotel-"+itemHoteles.Id);
                    var $hotelNameTdOld=$tableHotelesRow.find("#hotelName");
                    var $cantidadHabTdOld=$tableHotelesRow.find("#cantidadHab");
                    var valorOld=parseInt($cantidadHabTdOld.html());
                    var valorNew=parseInt(itemHoteles.CantidadHab)
                    var foundHotelCant =hotelesCantHab.find(function (element) {
                        return element.Hotel_Id === itemHoteles.Hotel_Id;
                    });
                    if(valorOld>valorNew)
                    {
                        foundHotelCant.CantidadHab-=valorNew;
                    }
                    else
                    {
                        foundHotelCant.CantidadHab+=1;
                    }
                    $hotelNameTdOld.html(itemHoteles.Hotel);
                    $cantidadHabTdOld.html(itemHoteles.CantidadHab);
                 }
            }

        },
        RemoveFromTable:function(selector,item){
            var tableItem=(selector=="bdPasajeros")?"pasajero-":"hotel-";
            var tableParent=$("#"+selector).parent();
            var $nodataRow=(selector=="bdPasajeros")?$('#nodatapasajerosrow'):$('#nodatahotelesrow');
            var $toRemove=$('#'+tableItem+item);
            $toRemove.remove();
            $.cubanacanUtilesNS.FixBgStyle(tableParent[0].id);
            if(pasajerosTableCounter===0 && $nodataRow.length===0 && selector =="bdPasajeros")
            {
                $.cubanacanUtilesNS.CreateEmptyTableRow('6',noDataPasajerosMessage,selector)
            }
            if(hotelesTableCounter===0 && $nodataRow.length===0 && selector =="bdHoteles")
            {
                $.cubanacanUtilesNS.CreateEmptyTableRow('3',noDataHotelesMessage,selector)
            }
        },
        ModalConfirmSetUp:function(list,amount,elementDesc)
        {
            var noReg=(amount==null || amount==undefined)?null:1;
            var modalConfirm = function(callback){

                if(list=="pasajeros")
                {
                    if(noReg===1)
                    {
                        var message=$.cubanacanMainNS.app.GetLocale()=="es"?confirmMessage.deletePasajero.es:confirmMessage.deletePasajeros.en;
                    }
                    else
                    {
                        var message=$.cubanacanMainNS.app.GetLocale()=="es"?confirmMessage.deletePasajeros.es:confirmMessage.deletePasajeros.en;
                    }
                    var foundPasajero =pasajerosModelDTO.find(function (element) {
                        return element.Id === $.cubanacanMainNS.app.GetPasajeroToDelete();
                    });
                    var pasajeroName=foundPasajero.NombreApellidos;
                    $("#phConfirmText").html('<div style="text-align:justify;"><span>'+message+' '+pasajeroName+'</span></div>');
                    $('#modal-flexi-confirm').modal('show');

                      $("#btnConfirmSi").on("click", function(){
                        callback(true,"pasajeros",noReg,$.cubanacanMainNS.app.GetPasajeroToDelete());
                        $("#modal-flexi-confirm").modal('hide');
                      });

                      $("#btnConfirmNo").on("click", function(){
                        callback(false);
                        $("#modal-flexi-confirm").modal('hide');
                      });
                }
                else if(list=="hoteles")
                {
                    if(noReg===1)
                    {
                        var message=$.cubanacanMainNS.app.GetLocale()=="es"?confirmMessage.deleteHotel.es:confirmMessage.deleteHotel.en;
                    }
                    else
                    {
                        var message=$.cubanacanMainNS.app.GetLocale()=="es"?confirmMessage.deleteHoteles.es:confirmMessage.deleteHoteles.en;
                    }
                    var foundHotel =hotelesModelDTO.find(function (element) {
                        return element.Id === $.cubanacanMainNS.app.GetHotelToDelete();
                    });
                    var foundHotelCant =hotelesCantHab.find(function (element) {
                        return element.Hotel_Id === foundHotel.Hotel_Id;
                    });
                    foundHotelCant.CantidadHab-=foundHotel.CantidadHab;
                    var hotelName=foundHotel.Hotel;
                    $("#phConfirmText").html('<div style="text-align:justify;"><span>'+message+' '+hotelName+'</span></div>');
                    $('#modal-flexi-confirm').modal('show');

                    $("#btnConfirmSi").on("click", function(){
                        callback(true,"hoteles",noReg,$.cubanacanMainNS.app.GetHotelToDelete());
                        $("#modal-flexi-confirm").modal('hide');
                      });

                      $("#btnConfirmNo").on("click", function(){
                        callback(false);
                        $("#modal-flexi-confirm").modal('hide');
                      });
                }
                else if(list=="reserva")
                {
                    if(hotelesModelDTO.length!==0 && pasajerosModelDTO!==0)
                    {
                        if(amount==null || amount==undefined)
                        {
                            var message=$.cubanacanMainNS.app.GetLocale()=="es"?confirmMessage.deleteReserva.es:confirmMessage.deleteReserva.en;
                            $("#phConfirmText").html('<div style="text-align:justify;"><span>'+message+'</span></div>');
                            $('#modal-flexi-confirm').modal('show');

                            $("#btnConfirmSi").on("click", function(){
                                callback(true,"reserva",noReg);
                                $("#modal-flexi-confirm").modal('hide');
                            });

                            $("#btnConfirmNo").on("click", function(){
                                callback(false);
                                $("#modal-flexi-confirm").modal('hide');
                            });
                        }
                    }
                    else
                    {

                    }
                }
            };
            modalConfirm(function(confirm,target,amount,itemId){
                switch(target)
                {
                    case"reserva":
                    if(hotelesModelDTO.length!==0 && pasajerosModelDTO!==0)
                    {
                        if(confirm)
                        {
                            reservaModelDTO=[];
                            hotelesModelDTO=[];
                            pasajerosModelDTO=[];
                            $("#bdHoteles").empty();
                            $.cubanacanUtilesNS.CreateEmptyTableRow('3',noDataHotelesMessage,'bdHoteles');
                            $("#bdPasajeros").empty();
                            $.cubanacanUtilesNS.CreateEmptyTableRow('6',noDataPasajerosMessage,'bdPasajeros');
                        }
                    }
                        break;
                    case"hoteles":
                            if(confirm && (itemId!=null || itemId != undefined))
                            {
                                $.cubanacanFormDataHandlingNS.DeleteHotel(itemId);
                            }
                        break;
                    case"pasajeros":
                            if(confirm && (itemId!=null || itemId != undefined))
                            {
                                $.cubanacanFormDataHandlingNS.DeletePasajero(itemId);
                            }
                        break;
                        case"terminos":

                        break;
                }
            });
        }
    }
    $.cubanacanFormDataHandlingNS={
        ValidateFrm: function(target,isSubmit)
        {
            var $form = $("#"+target);
            $('.form-group',$form).removeClass('error');
            $('span.error').remove();
            $('.required',$form).each(function(){
                var inputVal = $(this).val();
                var $parentTag = $(this).parent();
                if(inputVal == ''){
                    $parentTag.addClass('error').append('<span class="error">'+$.cubanacanUtilesNS.GetLocalizedMessage(ajaxFormsValidationsLocalizedMessage,"required")+'</span>');
                }
            });
            $('.nocero',$form).each(function(){
                var inputVal = $(this).val();
                var $parentTag = $(this).parent();
                if(inputVal == 0){
                    $parentTag.addClass('error').append('<span class="error">'+$.cubanacanUtilesNS.GetLocalizedMessage(ajaxFormsValidationsLocalizedMessage,"nocero")+'</span>');
                }
            });
            $('.nocerohoteles',$form).each(function(){
                var inputVal = $(this).val();
                var $parentTag = $(this).parent();
                if(inputVal == 0){
                    $parentTag.addClass('error').append('<span class="error">'+$.cubanacanUtilesNS.GetLocalizedMessage(ajaxFormsValidationsLocalizedMessage,"noceroshoteles")+'</span>');
                }
            });
            $('.noceroautos',$form).each(function(){
                var inputVal = $(this).val();
                var $parentTag = $(this).parent();
                if(inputVal == 0){
                    $parentTag.addClass('error').append('<span class="error">'+$.cubanacanUtilesNS.GetLocalizedMessage(ajaxFormsValidationsLocalizedMessage,"nocerosautos")+'</span>');
                }
            });
            $('.noceronacionalidades',$form).each(function(){
                var inputVal = $(this).val();
                var $parentTag = $(this).parent();
                if(inputVal == 0){
                    $parentTag.addClass('error').append('<span class="error">'+$.cubanacanUtilesNS.GetLocalizedMessage(ajaxFormsValidationsLocalizedMessage,"nocerosnacionalidades")+'</span>');
                }
            });
            $('.nocerooms',$form).each(function(){
                var inputVal = $(this).val();
                var $parentTag = $(this).parent();
                if(inputVal == 0){
                    $parentTag.addClass('error').append('<span class="error">'+$.cubanacanUtilesNS.GetLocalizedMessage(ajaxFormsValidationsLocalizedMessage,'nocerosrooms')+'</span>');
                }
            });
            $('.email',$form).each(function(){
                var inputVal = $(this).val();
                var $parentTag = $(this).parent();
                var regExp = new RegExp(/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/);
                if(regExp.test(inputVal) == false){
                    $parentTag.addClass('error').append('<span class="error">'+$.cubanacanUtilesNS.GetLocalizedMessage(ajaxFormsValidationsLocalizedMessage,'email')+'</span>');
                }
            });
            $('.phone',$form).each(function(){
                var inputVal = $(this).val();
                var $parentTag = $(this).parent();
                var regExp = new RegExp( /^(?:(?:\(?(?:00|\+)([1-4]\d\d|[1-9]\d?)\)?)?[\-\.\ \\\/]?)?((?:\(?\d{1,}\)?[\-\.\ \\\/]?){0,})(?:[\-\.\ \\\/]?(?:#|ext\.?|extension|x)[\-\.\ \\\/]?(\d+))?$/i);
                if(inputVal == '')
                {
                    $parentTag.addClass('error').append('<span class="error">'+$.cubanacanUtilesNS.GetLocalizedMessage(ajaxFormsValidationsLocalizedMessage,"required")+'</span>');
                }
                else
                {
                    if(regExp.test(inputVal) == false){
                        $parentTag.addClass('error').append('<span class="error">'+$.cubanacanUtilesNS.GetLocalizedMessage(ajaxFormsValidationsLocalizedMessage,'phone')+'</span>');
                    }
                }
            });
            $form.children('input').first().focus();;
            if ($('span.error').length == "0")
            {
                if(target=="frmHoteles")
                {
                    var hotelId=$.cubanacanMainNS.app.GetEditingHotel();
                    if(hotelId==null || hotelId==undefined)
                    {
                        itemHoteles={
                            'Id':$.cubanacanUtilesNS.GenerateId(),
                            'Hotel_Id':$("#sbHoteles").val(),
                            'Hotel':$("#sbHoteles").select2('data')[0].text,
                            'CantidadHab': $("#rngcantidadhabdobles").val()
                        }
                        var found = hotelesModelDTO.find(function (element) {
                            return element.Hotel_Id === $("#sbHoteles").val();
                        });
                        if(found!=null || found !=undefined)
                        {
                            var filtered= hotelesCantHab.find(function (element) {
                                return element.Hotel_Id==found.Hotel_Id
                            });
                            filtered.CantidadHab+=parseInt($("#rngcantidadhabdobles").val());
                        }
                        else
                        {
                            itemHotelesCantHab={
                                'Hotel_Id':$("#sbHoteles").val(),
                                'CantidadHab': parseInt($("#rngcantidadhabdobles").val())
                            }
                            hotelesCantHab.push(itemHotelesCantHab);
                        }
                        if($.cubanacanMainNS.app.GetIsWebBooking())
                        {
                                hotelesModelDTO.push(itemHoteles);
                                $.cubanacanRenderComponentsNS.RenderHotelesTable(itemHoteles);
                                var cantHabCalc=parseInt($("#rngcantidadhabdobles").val());
                                $.cubanacanMainNS.app.SetCantidadHabitaciones(cantHabCalc);
                                $.cubanacanUtilesNS.CalculateFees(cantHabCalc,$("#sbAutos").select2('data')[0].text,"add");
                        }
                    }
                    else
                    {
                        var found = hotelesModelDTO.find(function (element) {
                            return element.Id === parseInt($.cubanacanMainNS.app.GetEditingHotel());
                        });
                        $.cubanacanUtilesNS.CalculateFees(found.CantidadHab,$("#sbAutos").select2('data')[0].text,"remove");
                        found.Hotel_Id=$("#sbHoteles").val();
                        found.Hotel=$("#sbHoteles").select2('data')[0].text;
                        found.CantidadHab=$('#rngcantidadhabdobles').val();
                        $.cubanacanUtilesNS.CalculateFees($('#rngcantidadhabdobles').val(),$("#sbAutos").select2('data')[0].text,"add");
                        $.cubanacanRenderComponentsNS.RenderHotelesTable(found,'edit');
                        $('#modal-flexi-hoteles').modal('hide');
                        $.cubanacanMainNS.app.SetEditingHotel(null);
                    }
                }
                else if(target=="frmPasajeros")
                {
                    var pasajeroId=$.cubanacanMainNS.app.GetEditingPasajero();
                    if(pasajeroId==null || pasajeroId==undefined)
                    {
                        itemPasajeros={
                            'Id':$.cubanacanUtilesNS.GenerateId(),
                            'NombreApellidos':$('#tblFfdNombre').val(),
                            'NoPasaporte':$('#tblFfdPasaporte').val(),
                            'FechaArribo':$('#tbFechaArribo').val(),
                            'NoVuelo':$('#tblFfdNoVuelo').val(),
                            'Nacionalidad_Id':$("#sbNacionalidad").val(),
                            'Nacionalidad':$("#sbNacionalidad").select2('data')[0].text
                        }
                        pasajeroLimite=parseInt($.cubanacanMainNS.app.GetCantidadAdultos())+parseInt($.cubanacanMainNS.app.GetCantidadMenores());
                        if(pasajerosModelDTO.length>=pasajeroLimite)
                        {
                            $("#phWarning").html("<span class='error' style='text-align:justify;'>"+$.cubanacanUtilesNS.GetLocalizedMessage(warningMessage,'CantidadPasajerosControlesvsListado')+"</span>");
                            $('#modal-flexi-warning').modal('show');
                        }
                        else
                        {
                            pasajerosModelDTO.push(itemPasajeros);
                            $.cubanacanRenderComponentsNS.RenderPasajerosTable(itemPasajeros);
                        }
                    }
                    else
                    {
                        var found = pasajerosModelDTO.find(function (element) {
                            return element.Id === parseInt($.cubanacanMainNS.app.GetEditingPasajero());
                        });
                        found.NombreApellidos=$('#tblFfdNombre').val();
                        found.NoPasaporte=$('#tblFfdPasaporte').val();
                        found.FechaArribo=$('#tbFechaArribo').val();
                        found.NoVuelo=$('#tblFfdNoVuelo').val();
                        found.Nacionalidad_Id=$("#sbNacionalidad").val();
                        found.Nacionalidad=$("#sbNacionalidad").select2('data')[0].text;
                        $.cubanacanRenderComponentsNS.RenderPasajerosTable(found,'edit');
                        $('#modal-flexi-pasajeros').modal('hide');
                        $.cubanacanMainNS.app.SetEditingPasajero(null);
                    }
                }
                else if(target=="frmFfdReserva")
                {
                    $.cubanacanMainNS.app.SetValidMainForm(true);
                    if(isSubmit)
                    {
                        return;
                    }
                    // codigo comentado con funcionalidad para el caso de select multiple de autos
                    /*var sbAutosSelections=$("#sbAutos").select2('data');
                    $.each(sbAutosSelections, function(index, obj) {
                        autosId.push(obj["id"]);
                        autosText.push(obj["text"]);
                    });*/
                    reservaModelDTO={
                        "_token": CSRF_TOKEN,
                        'Id':$.cubanacanUtilesNS.GenerateId(),
                        'Fecha':$("#dpfechaReserva").val(),
                        'Auto_Id':$("#sbAutos").val(),
                        'Auto':$("#sbAutos").select2('data')[0].text,
                        'LugarEntrega':$("#tblugarentrega").val(),
                        'LugarRecogida':$("#tblugarecojida").val(),
                        'HoraEntrega':$("#hora_entrega").val(),
                        'HoraRecogida':$("#hora_recogida").val(),
                        'CantidadNoches':$("#rngcantidadnoches").val(),
                        'CantidadAdultos':$("#rngcantidadadultos").val(),
                        'CantidadNinnos':$("#rngcantidadmenores").val(),
                        'PrecioTotal':$.cubanacanMainNS.app.GetTotalTopay(),
                        'pasasjerosModel':pasajerosModelDTO,
                        'hotelesModelDTO':hotelesModelDTO,
                        'hotelesCantHab':hotelesCantHab
                    }
                    if(pasajerosModelDTO.length> $.cubanacanMainNS.app.GetCantidadAsientos())
                    {
                        var message=ajaxFormsValidationsLocalizedMessage.capacidadautospasajeros.es;
                        $("#phWarning").html("<span class='error' style='text-align:justify;'>"+$.cubanacanUtilesNS.GetLocalizedMessage(ajaxFormsValidationsLocalizedMessage,'capacidadautospasajeros')+"</span>");
                        $('#modal-flexi-warning').modal('show');
                    }
                    else{
                        var totalpasajerosControles=parseInt($("#rngcantidadadultos").val())+parseInt($("#rngcantidadmenores").val());
                        if(pasajerosModelDTO.length !=totalpasajerosControles)
                        {
                            $("#phWarning").html("<span class='error' style='text-align:justify;'>"+$.cubanacanUtilesNS.GetLocalizedMessage(ajaxFormsValidationsLocalizedMessage,'controlesvslitadopasajeros')+"</span>");
                            $('#modal-flexi-warning').modal('show');
                        }
                        else
                        {
                            $.cubanacanFormDataHandlingNS.CrearCarrito(reservaModelDTO);
                        }
                    }
                }
                else
                {

                }
                if(target!="frmFfdReserva")
                {
                    $.cubanacanRenderComponentsNS.ResetForm(target);
                }
            }
        },
        ShowEditPasajeroModal:function()
        {
            var found = pasajerosModelDTO.find(function (element) {
                return element.Id === $.cubanacanMainNS.app.GetEditingPasajero();
            });
            $('#tblFfdNombre').val(found.NombreApellidos);
            $('#tblFfdPasaporte').val(found.NoPasaporte);
            $('#tbFechaArribo').val(found.FechaArribo);
            $('#tblFfdNoVuelo').val(found.NoVuelo);
            $("#sbNacionalidad").val(found.Nacionalidad_Id);
            $("#sbNacionalidad").change();
            $('#modal-flexi-pasajeros').modal('show');
        },
        ShowEditHotelModal:function()
        {
            var found = hotelesModelDTO.find(function (element) {
                return element.Id === $.cubanacanMainNS.app.GetEditingHotel();
            });
            $("#rngcantidadhabdobles").val(found.CantidadHab);
            $("#num6").val(found.CantidadHab);
            $("#sbHoteles").val(found.Hotel_Id);
            $("#sbHoteles").change();
            $('#modal-flexi-hoteles').modal('show');
        },
        DeletePasajero:function(pasajeroId)
        {
            var found = pasajerosModelDTO.find(function (element) {
                return element.Id === pasajeroId;
            });
            var index = pasajerosModelDTO.indexOf(found);
            pasajerosModelDTO.splice(index, 1);
            pasajerosTableCounter --;
            $.cubanacanRenderComponentsNS.RemoveFromTable("bdPasajeros",parseInt(pasajeroId));
            $.cubanacanMainNS.app.SetPasajeroToDelete(null);
        },
        DeleteHotel:function(hotelId)
        {
            var found = hotelesModelDTO.find(function (element) {
                return element.Id === hotelId;
            });
            var index = hotelesModelDTO.indexOf(found);
            hotelesModelDTO.splice(index, 1);
            hotelesTableCounter--;
            $.cubanacanUtilesNS.CalculateFees(parseInt(found.CantidadHab),$("#sbAutos").select2('data')[0].text,"remove");
            $.cubanacanRenderComponentsNS.RemoveFromTable("bdHoteles",hotelId);
            $.cubanacanMainNS.app.SetHotelToDelete(null);
        },
        CrearCarrito:function(reservaModelDTO)
        {
            jQuery.ajax({
                url: $.cubanacanMainNS.app.BuildUrl("reservarFlexiFlyDrive"),
                method: 'post',
                dataType: 'json',
                data:reservaModelDTO,
                success: function(result){
                   if(result.isValid)
                   {
                        $("#phWarning").html("<span class='error' style='text-align:justify;'>"+$.cubanacanUtilesNS.GetLocalizedMessage(carritoComprasMessage,'carritocreado')+"</span>");
                        $('#modal-flexi-warning').modal('show');
                        setTimeout(window.location.href = result.redirect, 3000);
                   }
            }});
        }
    }
    $.cubanacanPaymentClient={
        PaymentMocker:function(){
            return true;
        }
    }
    $.cubanacanUtilesNS={
        CreateEmptyTableRow:function(colspan,localizedMessage,selector)
        {
            var noDataRow=(selector=="bdHoteles")?"nodatahotelesrow":"nodatapasajerosrow";
            var $tblRow = $('<tr class="odd" id="'+noDataRow+'">');
            $tblRow.append('<td style="text-align:center;font-weight:bold;" colspan='+colspan+'>'+localizedMessage+' </td>');
            $('#'+selector).after($tblRow);
        },
        IsEven:function(number)
        {
            return number % 2 == 0;
        },
        IsOdd:function(number)
        {
            return Math.abs(number % 2) == 1;
        },
        GenerateId:function()
        {
            startingIndex ++;
            return startingIndex;
        },
        FixBgStyle:function(selector)
        {
            var rows_array = [];
            $table=$();
            $('#'+selector+' tr').each(function (i) {
                rows_array[i] = $(this);
                $(this).removeClass('even');
                $(this).removeClass('odd');
            });
            if (rows_array != undefined || rows_array != null) {
                var rowslen = rows_array.length;
                for (var i = 0, n = rowslen; ++i < n;)
                {
                    var row = rows_array[i];
                    if($.cubanacanUtilesNS.IsEven(i))
                    {
                        row.addClass('odd');
                    }
                    else
                    {
                        row.addClass('even');
                    }
                }
            }
        },
        SplitAutosDS:function(dsAutosResult)
        {
            var returnableDsAutos=[];
            $.each(dsAutosResult, function(index, value) {
                var dsAutosCapacidadesItem={'id':value["id"],'asientos':value["capacidad_pasajero"]};
                var returnableDsAutosItem={'id':value["id"],'text':value["text"]};
                dsAutosCapacidades.push(dsAutosCapacidadesItem);
                returnableDsAutos.push(returnableDsAutosItem);
            });
            return returnableDsAutos;
        },
        HandleAutosSelection:function(autoItem)
        {
            if(autoItem===0)
            {
                $.cubanacanMainNS.app.SetCantidadAsientos(0);
            }
            else
            {
                var found = dsAutosCapacidades.find(function(element) {
                    return element.id ===Math.abs(autoItem);
                });
                $.cubanacanMainNS.app.SetCantidadAsientos(0);
                $.cubanacanMainNS.app.SetCantidadAsientos(parseInt(found.asientos))
            }
        },
        GetLocalizedMessage:function(jsonObject,messageType)
        {
            var pKey=messageType;
            var chKey=$.cubanacanMainNS.app.GetLocale();
            return jsonObject[pKey][chKey];
        },
        CalculateFees:function(cantHab,auto,ops)
        {
            var autos=autosText;
            var cantNoches=$("#rngcantidadnoches").val();
            var dataToSend={
                    "_token": CSRF_TOKEN,
                    "cantidadNoches":cantNoches,
                    "auto":auto,
                    "cantHab":cantHab
            }
            $.ajax({
                    url: $.cubanacanMainNS.app.BuildUrl("getTarifa"),
                    method: 'post',
                    dataType: 'json',
                    data:dataToSend,
                    success: function(result){
                        var precio=parseFloat(result[0].precioffd);
                        $.cubanacanMainNS.app.SetTotalTopay(precio,ops);
                        $.cubanacanRenderComponentsNS.RenderTotalPrice();
            }});
        },
        CheckPassengersvsRooms:function(cantHabDob)
        {
           if((parseInt(cantHabDob)*2)>(parseInt($.cubanacanMainNS.app.GetCantidadMeno())) && (parseInt(cantHabDob)*2)>(parseInt($.cubanacanMainNS.app.GetCantidadMenores())))
           {
               return true;
           }
           else{
               return false;
           }
        },
        ChangeCarForMultipleRooms:function(carName)
        {
            $.each(hotelesModelDTO,function(index, value) {
                $.cubanacanMainNS.app.SetTotalTopay(0,"change");
                var cantNoches=$("#rngcantidadnoches").val();
                var dataToSend={
                        "_token": CSRF_TOKEN,
                        "cantidadNoches":cantNoches,
                        "auto":carName,
                        "cantHab":value.CantidadHab
                }
                $.ajax({
                        url: $.cubanacanMainNS.app.BuildUrl("getTarifa"),
                        method: 'post',
                        dataType: 'json',
                        data:dataToSend,
                        success: function(result){
                            var precio=parseFloat(result[0].precioffd);
                            $.cubanacanMainNS.app.SetTotalTopay(precio,"add");
                            $.cubanacanRenderComponentsNS.RenderTotalPrice();
                }});
            });
        }
    }
})(jQuery);
