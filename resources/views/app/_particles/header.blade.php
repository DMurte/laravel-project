<nav class="navbar navbar-default navbar-fixed-top be-top-header" role="navigation">
  <div class="container-fluid">
    <div class="navbar-header"><a href="#" class="navbar-brand"></a></div>
    <div class="be-right-navbar">
      <ul class="nav navbar-nav navbar-right be-user-nav">
        <li class="dropdown"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="dropdown-toggle">
          @if(Auth::user()->image_icon)

             <img src="{{ URL::asset('upload/members/'.Auth::user()->image_icon.'-s.jpg') }}" >
         @else

         <img src="/app_assets/img/avatar.png" alt="Avatar">

         @endif

          <span class="user-name">{{ Auth::user()->name }}</span></a>
          <ul role="menu" class="dropdown-menu">
            <li>
              <div class="user-info">
                <div class="user-name">{{ Auth::user()->name }}</div>
              </div>
            </li>
            <li><a href="{{ URL::to('profile/') }}"><span class="icon mdi mdi-face"></span> Perfil</a></li>
            <li><a href="{{ URL::to('transactions/') }}"><span class="icon mdi mdi-view-stream"></span> Aportes</a></li>
            <li><a href="{{ URL::to('app/logout') }}"><span class="icon mdi mdi-power"></span> Salir</a></li>
          </ul>
        </li>
      </ul>
      <div class="page-title"><span></span></div>
      <ul class="nav navbar-nav navbar-right be-icons-nav">
        <!--<li class="dropdown"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="dropdown-toggle"><span class="icon mdi mdi-notifications"></span><span class="indicator"></span></a>
          <ul class="dropdown-menu be-notifications">
            <li>
              <div class="title">Notificaciones<span class="badge">3</span></div>
              <div class="list">
                <div class="be-scroller">
                  <div class="content">
                    <ul>
                      <li class="notification notification-unread"><a href="#">
                          <div class="image"><img src="app_assets/img/avatar2.png" alt="Avatar"></div>
                          <div class="notification-info">
                            <div class="text"><span class="user-name">Jessica Caruso</span> Entro a tu red.</div><span class="date">hace 2 min</span>
                          </div></a></li>
                      <li class="notification"><a href="#">
                          <div class="image"><img src="http://mircolombia.com/upload/favicon.png" alt="Avatar"></div>
                          <div class="notification-info">
                            <div class="text"><span class="user-name">Ladrillos</span> Aumento el precio</div><span class="date">hace 2 dias</span>
                          </div></a></li>
                      <li class="notification"><a href="#">
                          <div class="image"><img src="http://mircolombia.com/upload/favicon.png" alt="Avatar"></div>
                          <div class="notification-info">
                            <div class="text"><span class="user-name">Comisiones</span> Ganaste $200,000</div><span class="date">Hace 3 dias</span>
                          </div></a></li>
                      <li class="notification"><a href="#">
                          <div class="image"><img src="app_assets/img/avatar5.png" alt="Avatar"></div>
                          <div class="notification-info"><span class="text"><span class="user-name">Emily Carter</span> Entro a tu red </span><span class="date">Hace 1 semana</span></div></a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="footer"> <a href="#">Ver todas las notificaciones</a></div>
            </li>
          </ul>
        </li>-->
      </ul>
    </div>
    <div class="collapse navbar-collapse" id="navbar-top" style="max-height: 400px">
      <ul class="nav navbar-nav navbar-left">

        <!--<li class="{{classActivePathPublic('')}}"><a href="{{ URL::to('/') }}">Inicio</a></li>-->
        <li class="{{classActivePathPublic('properties')}}"><a href="{{ URL::to('properties/') }}">Inmuebles</a></li>
        <li class="{{classActivePathPublic('store')}}"><a href="{{ URL::to('store/') }}">Tienda</a></li>
        <li class="{{classActivePathPublic('blog')}}"><a href="{{ URL::to('blog/') }}">Blog</a></li>
        <li class="{{classActivePathPublic('sale')}}"><a href="{{ URL::to('about-us/') }}">Nosotros</a></li>
        <!--<li class="{{classActivePathPublic('sale')}}"><a href="{{ URL::to('credits/') }}">Creditos</a></li>-->
        <li class="{{classActivePathPublic('rent')}}"><a href="{{ URL::to('contact-us/') }}">Contacto</a></li>

         <!--@if(Auth::check())

         <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Mi Cuenta <b class="caret"></b></a>
          <ul class="dropdown-menu">


          @if(Auth::user()->usertype == "Owner")


            <li><a href="{{ URL::to('profile/') }}">Perfil</a></li>
            <li><a href="{{ URL::to('transactions/') }}">Aportes</a></li>
          @else
            <li><a href="{{ URL::to('admin/dashboard/') }}">Dashboard </a></li>
            <li><a href="{{ URL::to('admin/profile/') }}">Perfil</a></li>
          @endif
            <li><a href="{{ URL::to('logout') }}">Salir</a></li>-->

          </ul>
        </li>


         @else
          <li><a href="{{ URL::to('register') }}" class="signin">Registrarme</a></li>

          <li><a href="{{ URL::to('login') }}" class="signup">Ingresar</a></li>
         @endif


      </ul>
    </div>
  </div>
</nav>
