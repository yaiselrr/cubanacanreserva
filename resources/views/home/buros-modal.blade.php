<div class="modal fade modal-slide-in-right" data-backdrop="static" data-keyboard="false" aria-hidden="true" role="dialog" tabindex="-1"
     id="buros-modal-{{$oficina->id}}">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 600px">
        <div class="modal-content ">
            <div class="modal-header" style="background-color: #DA2513">
                <h4 class="modal-title" style="color: #fff">Buros de Ventas</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="color: #fff">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="box-body">
                    {{--<input type="hidden" value="{{$oficina->id}}" id="oficina_id">--}}
                    <div class="card-body table-responsive">
                        <table class="table table-bordered border table-hover" id="listado_buros">
                            <thead style="text-align: center">
                            <tr>
                                <th>Nombre</th>
                                <th>Dirección</th>
                                <th>Teléfono</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $cont =false;
                            @endphp
                            @foreach($buros as $buro)
                                @if($buro->oficina_id == $oficina->id )
                                    <tr>
                                        <td>{{$buro->nombre}}</td>
                                        <td>{{$buro->direccion}}</td>
                                        <td>{{$buro->telefono}}</td>
                                    </tr>
                                @else
                                    @php
                                        $cont =true;
                                    @endphp
                                @endif
                            @endforeach
                            @if($cont)
                                <tr>
                                    <td colspan="3" align="center">No existen buros de ventas a mostrar</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

