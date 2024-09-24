<div class="modal fade modal-slide-in-right" data-backdrop="static" data-keyboard="false" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-hab">
    <div class="modal-dialog ">
        <div class="modal-content bg-danger">
            <div class="modal-header">
                <h4 class="modal-title">Eliminar Elemento</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body">
                    <p>¿Está seguro que desea eliminar este elemento?
                        Esta acción no se puede deshacer.</p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" {{--data-dismiss="modal"--}} id="btn_cancelar_eliminar_habitacion">Cancelar</button>
                    <button id="remove_datos_hab" type="submit" class="btn btn-outline-light">Confirmar</button>
                </div>
        </div>
    </div>
</div>