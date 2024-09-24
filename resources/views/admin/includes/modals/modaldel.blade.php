<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{ $c->id }}">
	<form action="{{ url($ruta.$c->id) }}" id="usuario-frm-delete" method="POST">
		@csrf
		@method('DELETE')
		<input type="hidden" name="id" value="{{ $c->id }}">

		<div class="modal-dialog">
          <div class="modal-content bg-danger">
            <div class="modal-header">
              <h4 class="modal-title">Eliminar {{ $nombre }}</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>¿Está seguro que desea eliminar el elemento {{ $nombre }}{{ $c->id }}?
				  Esta acción no se puede deshacer.</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-outline-light">Confirmar</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
	</form>


</div>