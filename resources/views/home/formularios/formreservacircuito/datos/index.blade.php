<div id="datos">
    <div class="row col-md-12">
        <div class="row">
            <div class="col-md-4 mb-2">
                <a id="mostrar_datos" type="button" class="btn btn-light botones"
                   style="background: #fff;color: #2A4660;border-color: #2A4660">Adicionar</a>
            </div>
            <div class="col-md-4 mb-2">
                <a type="button" class="btn botones disabled" id="btn_modificar"
                   style="background: #DA2513;color: #fff;">Modificar</a>
            </div>
            <div class="col-md-4 mb-2">
                <a type="button" id="abrir-modal" class="btn botones disabled"
                   style="background: #DA2513;color: #fff;">Eliminar</a>
            </div>
        </div>
        <table id="listado_datos" class="table table-bordered table-hover">
            <thead style="text-align: center">
            <tr>
                <th hidden>No.</th>
                <th>Nombre y Apellidos</th>
                <th>Fecha de nacimiento</th>
                <th>No. Pasaporte</th>
                <th>Nacionalidad</th>
            </tr>
            </thead>
            <tbody>
            <tr id="noelementos">
                <td colspan="4" align="center">No existen datos de los clientes a
                    mostrar
                </td>
            </tr>
            </tbody>
        </table>
        <div class="row col-md-12">
            <div class="col-md-8 mb-2">
                <a class="btn btn-light botonestotalpago"
                   style="background: #DA2513;color: #fff;">Total a pagar 150.00
                    USD</a>
            </div>
            <div class="col-md-2 mb-2">
                <a id="mostrarreservaciones" type="button" class="btn btn-light botones"
                   style="background: #fff;color: #2A4660;border-color: #2A4660">Cancelar</a>
            </div>
            <div class="col-md-2 mb-2">
                <a type="submit" id="btn_guardar" class="btn botones"
                   style="background: #DA2513;color: #fff;">Aceptar</a>
            </div>
        </div>
    </div>
</div>