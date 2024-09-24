<div id="ocultar_listado_habitaciones" class="row col-md-12">
    <input type="hidden" id="habitaciones" name="habitaciones">
    <div class="col-md-5 ">
        <img src="{{asset('assets/img/RESERVAR HABITACIONES.png')}}">
    </div>
    <ul class="list-inline ml-auto">
        <li class="list-inline-item">
            <a id="btn_vista_habitacion_datos_clientes" type="button"
               class="btn btn-light botones"
               style="background: #fff;color: #2A4660;border-color: #2A4660;">Adicionar</a>
        </li>
        <li class="list-inline-item">
            <a type="button" class="btn botones disabled" id="btn_modificar_habitacion"
               style="background: #DA2513;color: #fff;">Modificar</a>
        </li>
        <li class="list-inline-item">
            <a type="button" class="btn botones disabled" id="btn_abrir_modal_habitaciones"
               style="background: #DA2513;color: #fff;">Eliminar</a>
        </li>

    </ul>
    <table class="table table-bordered table-hover text-center" id="listado_habitaciones">
        <thead>
        <tr>
            <th hidden>No.</th>
            <th>Tipo de Habitación</th>
            <th>Adultos</th>
            <th>Niños de 2 a 12</th>
            <th>Niños de 0 a 2</th>
            <th hidden>Precio</th>
        </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
</div>