<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
        <img src="{{asset('adminLTE/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Cubanacan</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="@if(Auth::user()->avatar)
                {{asset('/storage/'.Auth::user()->avatar)}}
                @else
                {{asset('adminLTE/dist/img/user2-160x160.jpg')}}
                @endif" class="img-circle elevation-2" alt="User Image">
            </div>
            @if(  Auth()->user()->role_id == 1)
                <div class="info">
                    <a href="#" class="d-block">{{ auth()->user()->name }} - Editor</a>
                    <a href="#"><i class="fa fa-circle text-success"></i> Conectado</a>
                </div>
            @endif
        </div>
        <!-- Sidebar user panel (optional) --
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{route('admin.index')}}" class="nav-link {{request()->is('admin')? 'active' :  ''}}">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Inicio
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview {{request()->routeIs('admin.manager.*') ? 'menu-open' :  ''}}">
                    <a href="" class="nav-link">
                        <i class="fas fa-briefcase"></i>
                        <p>
                            Administración
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('users.index')
                            <li class="nav-item">
                                <a href="{{route('admin.manager.users.index')}}"
                                   class="nav-link {{request()->routeIs('admin.manager.users*') ? 'active' :  ''}}">
                                    <i class="fas fa-user-circle"></i>
                                    <p>Usuario</p>
                                </a>
                            </li>
                        @endcan
                        @can('roles.index')
                            <li class="nav-item">
                                <a href="{{route('admin.manager.roles.index')}}"
                                   class="nav-link {{request()->routeIs('admin.manager.roles*') ? 'active' :  ''}}">
                                    <i class="fas fa-cog"></i>
                                    <p>Roles</p>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
                <li class="nav-item has-treeview {{request()->routeIs('admin.content.*') ? 'menu-open' :  ''}}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Gestionar Contenido
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('reservas.index')
                            <li class="nav-item">
                                <a href="{{route('admin.content.reservas')}}"
                                   class="nav-link {{request()->routeIs('admin.content.reservas*') ? 'active' :  ''}}">
                                    <i class="nav-icon fas fa-tasks"></i>
                                    <p>Reservas</p>
                                </a>
                            </li>
                        @endcan
                        @can('carruseles.index')
                            <li class="nav-item">
                                <a href="{{route('admin.content.carruseles.index')}}"
                                   class="nav-link {{request()->routeIs('admin.content.carruseles*') ? 'active' :  ''}}">
                                    <i class="nav-icon fas fa-tasks"></i>
                                    <p>Carruseles</p>
                                </a>
                            </li>
                        @endcan
                        @can('quienes-somos.index')
                            <li class="nav-item">
                                <a href="{{route('admin.content.quienes-somos.index')}}"
                                   class="nav-link {{request()->routeIs('admin.content.quienes-somos*') ? 'active' :  ''}}">
                                    <i class="nav-icon fas fa-tasks"></i>
                                    <p>Quienes Somos</p>
                                </a>
                            </li>
                        @endcan
                        @can('oficinas.index')
                            <li class="nav-item">
                                <a href="{{route('admin.content.oficinas.index')}}"
                                   class="nav-link {{request()->routeIs('admin.content.oficinas*') ? 'active' :  ''}}">
                                    <i class="nav-icon fas fa-tasks"></i>
                                    <p>Oficinas Comerciales</p>
                                </a>
                            </li>
                        @endcan
                        @can('buros.index')
                            <li class="nav-item">
                                <a href="{{route('admin.content.buros.index')}}"
                                   class="nav-link {{request()->routeIs('admin.content.buros*') ? 'active' :  ''}}">
                                    <i class="nav-icon fas fa-tasks"></i>
                                    <p>Buros de Ventas</p>
                                </a>
                        @endcan
                        @can('servicios.index')
                            <li class="nav-item">
                                <a href="{{route('admin.content.servicios.index')}}"
                                   class="nav-link {{request()->routeIs('admin.content.servicios*') ? 'active' :  ''}}">
                                    <i class="nav-icon fas fa-tasks"></i>
                                    <p>Servicio</p>
                                </a>
                            </li>
                        @endcan
                        @can('preguntas.index')
                            <li class="nav-item">
                                <a href="{{route('admin.content.preguntas.index')}}"
                                   class="nav-link {{request()->routeIs('admin.content.preguntas*') ? 'active' :  ''}}">
                                    <i class="nav-icon fas fa-tasks"></i>
                                    <p>Preguntas Frecuentes</p>
                                </a>
                            </li>
                        @endcan
                        @can('blogs.index')
                            <li class="nav-item">
                                <a href="{{route('admin.content.blogs.index')}}"
                                   class="nav-link {{request()->routeIs('admin.content.blogs*') ? 'active' :  ''}}">
                                    <i class="nav-icon fas fa-tasks"></i>
                                    <p>Blog</p>
                                </a>
                            </li>
                        @endcan
                        {{--@can('rutas.index')
                            <li class="nav-item">
                                <a href="{{route('admin.content.rutas.index')}}"
                                   class="nav-link {{request()->routeIs('admin.content.rutas*') ? 'active' :  ''}}">
                                    <i class="nav-icon fas fa-tasks"></i>
                                    <p>Rutas</p>
                                </a>
                            </li>
                        @endcan--}}
                        @can('contactos.index')
                            <li class="nav-item">
                                <a href="{{route('admin.content.contactos.index')}}"
                                   class="nav-link {{request()->routeIs('admin.content.contactos*') ? 'active' :  ''}}">
                                    <i class="nav-icon fas fa-tasks"></i>
                                    <p>Información de Contacto</p>
                                </a>
                            </li>
                        @endcan
                        <li class="nav-item has-treeview {{request()->routeIs('admin.content.circuitos*') || request()->routeIs('admin.content.precipaxs*') ? 'menu-open' :  ''}}">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-tasks"></i>
                                <p>
                                    Gestión Circuito
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @can('circuitos.index')
                                    <li class="nav-item">
                                        <a href="{{route('admin.content.circuitos.index')}}"
                                           class="nav-link {{request()->routeIs('admin.content.circuitos*') ? 'active' :  ''}}">
                                            <i class="nav-icon fas fa-check-circle"></i>
                                            <p>Circuitos</p>
                                        </a>
                                    </li>
                                @endcan
                                @can('precipaxs.index')
                                    <li class="nav-item">
                                        <a href="{{route('admin.content.precipaxs.index')}}"
                                           class="nav-link {{request()->routeIs('admin.content.precipaxs*') ? 'active' :  ''}}">
                                            <i class="nav-icon fas fa-check-circle"></i>
                                            <p>Precio Pax Circuitos</p>
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                        <li class="nav-item has-treeview {{request()->routeIs('admin.content.excursiones*') || request()->routeIs('admin.content.hotel-recogida*') ? 'menu-open' :  ''}}">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-tasks"></i>
                                <p>
                                    Gestión Excursiones
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @can('excursiones.index')
                                    <li class="nav-item">
                                        <a href="{{route('admin.content.excursiones.index')}}"
                                           class="nav-link {{request()->routeIs('admin.content.excursiones*') ? 'active' :  ''}}">
                                            <i class="nav-icon fas fa-check-circle"></i>
                                            <p>Excursión</p>
                                        </a>
                                    </li>
                                @endcan
                                @can('hoteles-recogida.index')
                                    <li class="nav-item">
                                        <a href="{{route('admin.content.hotel-recogida.index')}}"
                                           class="nav-link {{request()->routeIs('admin.content.hotel-recogida*') ? 'active' :  ''}}">
                                            <i class="nav-icon fas fa-check-circle"></i>
                                            <p>Hoteles de Recogida</p>
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                        <li class="nav-item has-treeview {{request()->routeIs('admin.content.hoteles*') || request()->routeIs('admin.content.precios-pax-hotel*') || request()->routeIs('admin.content.hotel-flexy-drive*') ? 'menu-open' :  ''}}">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-tasks"></i>
                                <p>
                                    Gestión Hoteles
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @can('hoteles.index')
                                    <li class="nav-item">
                                        <a href="{{route('admin.content.hoteles.index')}}"
                                           class="nav-link {{request()->routeIs('admin.content.hoteles*') ? 'active' :  ''}}">
                                            <i class="nav-icon fas fa-check-circle"></i>
                                            <p>Hotel</p>
                                        </a>
                                    </li>
                                @endcan
                                @can('precios-pax-hotels.index')
                                    <li class="nav-item">
                                        <a href="{{route('admin.content.precios-pax-hotel.index')}}"
                                           class="nav-link {{request()->routeIs('admin.content.precios-pax-hotel*') ? 'active' :  ''}}">
                                            <i class="nav-icon fas fa-check-circle"></i>
                                            <p>Precios x Pax del Hotel</p>
                                        </a>
                                    </li>
                                @endcan
                                @can('hoteles-flexy-drive.index')
                                    <li class="nav-item">
                                        <a href="{{route('admin.content.hotel-flexy-drive.index')}}"
                                           class="nav-link {{request()->routeIs('admin.content.hotel-flexy-drive*') ? 'active' :  ''}}">
                                            <i class="nav-icon fas fa-check-circle"></i>
                                            <p>Hoteles de Flexy & Drive</p>
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                        <li class="nav-item has-treeview {{request()->routeIs('admin.content.conectandos*') || request()->routeIs('admin.content.privados*') || request()->routeIs('admin.content.privadosimport*')
                        || request()->routeIs('admin.content.colectivos*') || request()->routeIs('admin.content.colectivosimport*')
                        || request()->routeIs('admin.content.preciosunicos*') || request()->routeIs('admin.content.rutas*')
                        || request()->routeIs('admin.content.lugaresrecogida*') ? 'menu-open' :  ''}}">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-tasks"></i>
                                <p>
                                    Gestión Traslados
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @can('conectandos.index')
                                    <li class="nav-item">
                                        <a href="{{route('admin.content.conectandos.index')}}"
                                           class="nav-link {{request()->routeIs('admin.content.conectandos*') ? 'active' :  ''}}">
                                            <i class="nav-icon fas fa-check-circle"></i>
                                            <p>Conectando Cuba</p>
                                        </a>
                                    </li>
                                @endcan
                                @can('privados.index')
                                    <li class="nav-item">
                                        <a href="{{route('admin.content.privados.index')}}"
                                           class="nav-link {{request()->routeIs('admin.content.privados*') ? 'active' :  ''}}">
                                            <i class="nav-icon fas fa-check-circle"></i>
                                            <p>Privados y Colectivos</p>
                                        </a>
                                    </li>
                                @endcan
                                @can('preciosunicos.index')
                                    <li class="nav-item">
                                        <a href="{{route('admin.content.preciosunicos.index')}}"
                                           class="nav-link {{request()->routeIs('admin.content.preciosunicos*') ? 'active' :  ''}}">
                                            <i class="nav-icon fas fa-check-circle"></i>
                                            <p>Transfer Colectivo Precio Unico</p>
                                        </a>
                                    </li>
                                @endcan
                                @can('rutas.index')
                                    <li class="nav-item">
                                        <a href="{{route('admin.content.rutas.index')}}"
                                           class="nav-link {{request()->routeIs('admin.content.rutas*') ? 'active' :  ''}}">
                                            <i class="nav-icon fas fa-check-circle"></i>
                                            <p>Rutas</p>
                                        </a>
                                    </li>
                                @endcan
                                @can('lugaresrecogida.index')
                                    <li class="nav-item">
                                        <a href="{{route('admin.content.lugaresrecogida.index')}}"
                                           class="nav-link {{request()->routeIs('admin.content.lugaresrecogida*') ? 'active' :  ''}}">
                                            <i class="nav-icon fas fa-check-circle"></i>
                                            <p>Lugares Recogida</p>
                                        </a>
                                    </li>
                                @endcan

                            </ul>
                        </li>
                        <li class="nav-item has-treeview {{request()->routeIs('admin.content.viajes-medidas*') || request()->routeIs('admin.content.precios-por-viajes-medidas*') ? 'menu-open' :  ''}}">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-tasks"></i>
                                <p>
                                    Gestión Viajes
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @can('viajes-medidas.index')
                                    <li class="nav-item">
                                        <a href="{{route('admin.content.viajes-medidas.index')}}"
                                           class="nav-link {{request()->routeIs('admin.content.viajes-medidas*') ? 'active' :  ''}}">
                                            <i class="nav-icon fas fa-check-circle"></i>
                                            <p>Viajes a la Medida</p>
                                        </a>
                                    </li>
                                @endcan
                                @can('precios-por-viajes-medidas.index')
                                    <li class="nav-item">
                                        <a href="{{route('admin.content.precios-por-viajes-medidas.index')}}"
                                           class="nav-link {{request()->routeIs('admin.content.precios-por-viajes-medidas*') ? 'active' :  ''}}">
                                            <i class="nav-icon fas fa-check-circle"></i>
                                            <p>Precios x Viajes a la Medida</p>
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                        <li class="nav-item has-treeview {{request()->routeIs('admin.content.eventos*') || request()->routeIs('admin.content.hoteles-eventos*') ? 'menu-open' :  ''}}">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-tasks"></i>
                                <p>
                                    Gestión Eventos
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @can('eventos.index')
                                    <li class="nav-item">
                                        <a href="{{route('admin.content.eventos.index')}}"
                                           class="nav-link {{request()->routeIs('admin.content.eventos*') ? 'active' :  ''}}">
                                            <i class="nav-icon fas fa-check-circle"></i>
                                            <p>Evento</p>
                                        </a>
                                    </li>
                                @endcan
                                @can('hoteles-eventos.index')
                                    <li class="nav-item">
                                        <a href="{{route('admin.content.hoteles-eventos.index')}}"
                                           class="nav-link {{request()->routeIs('admin.content.hoteles-eventos*') ? 'active' :  ''}}">
                                            <i class="nav-icon fas fa-check-circle"></i>
                                            <p>Hoteles de un Evento</p>
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                        <li class="nav-item has-treeview {{request()->routeIs('admin.content.flexi-drive*') || request()->routeIs('admin.content.autos-flexifly-drive*') ? 'menu-open' :  ''}}">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-tasks"></i>
                                <p>
                                    Gestión Flexy & Drive
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @can('flexi-drive.index')
                                    <li class="nav-item">
                                        <a href="{{route('admin.content.flexi-drive.index')}}"
                                           class="nav-link {{request()->routeIs('admin.content.flexi-drive*') ? 'active' :  ''}}">
                                            <i class="nav-icon fas fa-check-circle"></i>
                                            <p>Flexi & Drive</p>
                                        </a>
                                    </li>
                                @endcan
                                @can('autos-flexifly-drive.index')
                                    <li class="nav-item">
                                        <a href="{{route('admin.content.autos-flexifly-drive.index')}}"
                                           class="nav-link {{request()->routeIs('admin.content.autos-flexifly-drive*') ? 'active' :  ''}}">
                                            <i class="nav-icon fas fa-check-circle"></i>
                                            <p>Autos FlexiFly & Drive</p>
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                        @can('blogs.index')
                            <li class="nav-item">
                                <a href="{{route('admin.content.blogs.index')}}"
                                   class="nav-link {{request()->routeIs('admin.content.blogs*') ? 'active' :  ''}}">
                                    <i class="nav-icon fas fa-tasks"></i>
                                    <p>Blog</p>
                                </a>
                            </li>
                        @endcan
                        @can('encuestas.index')
                            <li class="nav-item">
                                <a href="{{route('admin.content.encuestas.index')}}"
                                   class="nav-link {{request()->routeIs('admin.content.encuestas*') ? 'active' :  ''}}">
                                    <i class="nav-icon fas fa-tasks"></i>
                                    <p>Encuestas</p>
                                </a>
                            </li>
                        @endcan
                        @can('tarjeta-credito.index')
                            <li class="nav-item">
                                <a href="{{route('admin.content.tarjeta-credito.index')}}"
                                   class="nav-link {{request()->routeIs('admin.content.tarjeta-credito*') ? 'active' :  ''}}">
                                    <i class="nav-icon fas fa-tasks"></i>
                                    <p>Tarjetas de Crédito</p>
                                </a>
                            </li>
                        @endcan
                        <li class="nav-item has-treeview {{request()->routeIs('admin.content.enlace_interesantes*') || request()->routeIs('admin.content.enlace_interesantes*') ? 'menu-open' :  ''}}">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-tasks"></i>
                                <p>
                                    Gestión Enlaces
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @can('enlace_interesantes.index')
                                    <li class="nav-item">
                                        <a href="{{route('admin.content.enlace_interesantes.index')}}"
                                           class="nav-link {{request()->routeIs('admin.content.enlace_interesantes*') ? 'active' :  ''}}">
                                            <i class="nav-icon fas fa-check-circle"></i>
                                            <p>Enlaces Interesantes</p>
                                        </a>
                                    </li>
                                @endcan
                                @can('enlace_reds.index')
                                    <li class="nav-item">
                                        <a href="{{route('admin.content.enlace_reds.index')}}"
                                           class="nav-link {{request()->routeIs('admin.content.enlace_reds*') ? 'active' :  ''}}">
                                            <i class="nav-icon fas fa-check-circle"></i>
                                            <p>Enlaces Redes Sociales</p>
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                        @can('clientes.index')
                            <li class="nav-item">
                                <a href="{{route('admin.content.clientes.index')}}"
                                   class="nav-link {{request()->routeIs('admin.content.clientes*') ? 'active' :  ''}}">
                                    <i class="nav-icon fas fa-tasks"></i>
                                    <p>Clientes</p>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
                <li class="nav-item has-treeview {{request()->routeIs('admin.nomenclator.*') ? 'menu-open' :  ''}}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-wrench"></i>
                        <p>
                            Gestionar Nomencladores
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('categorias.index')
                            <li class="nav-item">
                                <a href="{{route('admin.nomenclator.categorias.index')}}"
                                   class="nav-link {{request()->routeIs('admin.nomenclator.categorias*') ? 'active' :  ''}}">
                                    <i class="nav-icon fas fa-server"></i>
                                    <p>Categorías</p>
                                </a>
                            </li>
                        @endcan
                        @can('facilidades.index')
                            <li class="nav-item">
                                <a href="{{route('admin.nomenclator.facilidades.index')}}"
                                   class="nav-link {{request()->routeIs('admin.nomenclator.facilidades*') ? 'active' :  ''}}">
                                    <i class="nav-icon fas fa-server"></i>
                                    <p>Facilidad</p>
                                </a>
                            </li>
                        @endcan



                        @can('plan-alojamiento.index')
                            <li class="nav-item">
                                <a href="{{route('admin.nomenclator.plan-alojamiento.index')}}"
                                   class="nav-link {{request()->routeIs('admin.nomenclator.plan-alojamiento*') ? 'active' :  ''}}">
                                    <i class="nav-icon fas fa-server"></i>
                                    <p>Plan Alojamiento</p>
                                </a>
                            </li>
                        @endcan
                        @can('dias-antelacion-reserva.index')
                            <li class="nav-item">
                                <a href="{{route('admin.nomenclator.dias-antelacion-reserva.index')}}"
                                   class="nav-link {{request()->routeIs('admin.nomenclator.dias-antelacion-reserva*') ? 'active' :  ''}}">
                                    <i class="nav-icon fas fa-server"></i>
                                    <p>Días Antelación</p>
                                </a>
                            </li>
                        @endcan
                        @can('idiomas.index')
                            <li class="nav-item">
                                <a href="{{route('admin.nomenclator.idiomas.index')}}"
                                   class="nav-link {{request()->routeIs('admin.nomenclator.idiomas*') ? 'active' :  ''}}">
                                    <i class="nav-icon fas fa-server"></i>
                                    <p>Idiomas</p>
                                </a>
                            </li>
                        @endcan
                        @can('duracion.index')
                            <li class="nav-item">
                                <a href="{{route('admin.nomenclator.duracion.index')}}"
                                   class="nav-link {{request()->routeIs('admin.nomenclator.duracion*') ? 'active' :  ''}}">
                                    <i class="nav-icon fas fa-server"></i>
                                    <p>Duración</p>
                                </a>
                            </li>
                        @endcan
                        @can('dias-semana.index')
                            <li class="nav-item">
                                <a href="{{route('admin.nomenclator.dias-semana.index')}}"
                                   class="nav-link {{request()->routeIs('admin.nomenclator.dias-semana*') ? 'active' :  ''}}">
                                    <i class="nav-icon fas fa-server"></i>
                                    <p>Dias de la Semana</p>
                                </a>
                            </li>
                        @endcan
                        @can('frecuencia.index')
                            <li class="nav-item">
                                <a href="{{route('admin.nomenclator.frecuencia.index')}}"
                                   class="nav-link {{request()->routeIs('admin.nomenclator.frecuencia*') ? 'active' :  ''}}">
                                    <i class="nav-icon fas fa-server"></i>
                                    <p>Frecuencias</p>
                                </a>
                            </li>
                        @endcan
                        @can('modalidad.index')
                            <li class="nav-item">
                                <a href="{{route('admin.nomenclator.modalidad.index')}}"
                                   class="nav-link {{request()->routeIs('admin.nomenclator.modalidad*') ? 'active' :  ''}}">
                                    <i class="nav-icon fas fa-server"></i>
                                    <p>Modalidades</p>
                                </a>
                            </li>
                        @endcan
                        @can('lugar.index')
                            <li class="nav-item">
                                <a href="{{route('admin.nomenclator.lugar.index')}}"
                                   class="nav-link {{request()->routeIs('admin.nomenclator.lugar*') ? 'active' :  ''}}">
                                    <i class="nav-icon fas fa-server"></i>
                                    <p>Lugar</p>
                                </a>
                            </li>
                        @endcan
                        @can('nacionalidades.index')
                            <li class="nav-item">
                                <a href="{{route('admin.nomenclator.nacionalidades.index')}}"
                                   class="nav-link {{request()->routeIs('admin.nomenclator.nacionalidades*') ? 'active' :  ''}}">
                                    <i class="nav-icon fas fa-server"></i>
                                    <p>Nacionalidades</p>
                                </a>
                            </li>
                        @endcan
                        @can('provincias.index')
                            <li class="nav-item">
                                <a href="{{route('admin.nomenclator.provincias.index')}}"
                                   class="nav-link {{request()->routeIs('admin.nomenclator.provincias*') ? 'active' :  ''}}">
                                    <i class="nav-icon fas fa-server"></i>
                                    <p>Provincias</p>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
<style>
    .scrollbar {
        max-height: 400px;
        overflow-y: auto !important;

    }

</style>
