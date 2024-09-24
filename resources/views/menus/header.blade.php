<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{route('admin.index')}}" class="nav-link">Inicio</a>
        </li>
        <!--<ul class="breadcrumb hidden-xs">
            <li class="active">
                <i class="fa fa-home"></i>
                <a href="{{route('admin.index')}}">Inicio</a>
                <i class="fa fa-angle-right"></i>
            </li>
            @for($i = 0; $i <= count(Request::segments()); $i++)
                <li>
                    <a href="">{{Request::segment($i)}}</a>
                    @if($i < count(Request::segments()) & $i > 0)
                        {!!'<i class="fa fa-angle-right"></i>'!!}
                    @endif
                </li>
            @endfor
        </ul>-->
    </ul>
   <!-- <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Buscar" aria-label="Buscar">
            <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </form>-->

    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                <img src="@if(Auth::user()->avatar)
                {{asset('/storage/'.Auth::user()->avatar)}}
                @else
                {{asset('adminLTE/dist/img/user2-160x160.jpg')}}
                @endif" class="user-image img-circle elevation-2" alt="User Image">
                <span class="d-none d-md-inline">{{ auth()->user()->name }}</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <li class="user-header bg-primary">
                    <img src="{{asset('adminLTE/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">

                    <p>
                        {{ auth()->user()->name }} - Desarrollador Web
                        <small>{{ date('D').' '.date('M').'  '.date('Y') }}</small>
                    </p>
                </li>
                <li class="user-body">
                    <!--<div class="row">
                        <div class="col-4 text-center">
                            <a href="#">Followers</a>
                        </div>
                        <div class="col-4 text-center">
                            <a href="#">Sales</a>
                        </div>
                        <div class="col-4 text-center">
                            <a href="#">Friends</a>
                        </div>
                    </div>
                    <!-- /.row -->
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                    <a href="{{ route('logout') }}" class="btn btn-default btn-flat"
                       onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">Salir</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </li>
    </ul>
</nav>