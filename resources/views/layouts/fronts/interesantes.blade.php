@if(count($enlacesi) <= 0 )
    <div class="no-data">No hay enlaces disponibles</div>


@else
    <div id="carouselbotonesproductos" class="owl-carousel owl-theme" style="margin-top: 7px;">
        @foreach($enlacesi as $item )
            <div class="owl-item" id="botones" style=" height: 80px">
                <a href="{{ route('home.circuitos') }}">
                    <div class="owl-item" id="botones" style=" height: 80px;">
                        <a href="{{$item->nombre }}">
                            <img src="{{ asset('imagen/enlaceinteresante/'.$item->imagen) }}" style="width: 210px;">
                        </a>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
@endif
