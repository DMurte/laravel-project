<!-- begin:navbar -->

<style media="screen">
.navbar-fixed-top .navbar-collapse, .navbar-fixed-bottom .navbar-collapse {
  max-height: 400px !important;
}
</style>
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">

        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-top">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{ URL::to('/') }}" style="padding-right: 0px;">

          @if(getcong('site_logo')) <img src="{{ URL::asset('upload/'.getcong('site_logo')) }}" alt=""> @else {{getcong('site_name')}} @endif

          </a>


        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->

        <div class="collapse navbar-collapse" id="navbar-top" style="max-height: 400px">
          <ul class="nav navbar-nav navbar-right">

            <li class="{{classActivePathPublic('')}}"><a href="{{ URL::to('/') }}">Inicio</a></li>
        	  <li class="{{classActivePathPublic('properties')}}"><a href="{{ URL::to('properties/') }}">Inmuebles</a></li>
            <li class="{{classActivePathPublic('store')}}"><a href="{{ URL::to('store/') }}">Tienda</a></li>
            <li class="{{classActivePathPublic('blog')}}"><a href="{{ URL::to('blog/') }}">Blog</a></li>
            <li class="{{classActivePathPublic('sale')}}"><a href="{{ URL::to('about-us/') }}">Nosotros</a></li>
            <li class="{{classActivePathPublic('sale')}}"><a href="{{ URL::to('credits/') }}">Creditos</a></li>
            <li class="{{classActivePathPublic('rent')}}"><a href="{{ URL::to('contact-us/') }}">Contacto</a></li>

             @if(Auth::check())
                   @if(Auth::user()->usertype == "Owner")
                 <li class="{{classActivePathPublic('rent')}}"><a href="{{ URL::to('app/dashboard/') }}">Mi Cuenta</a></li>
                   @else
                 <li class="{{classActivePathPublic('rent')}}"><a href="{{ URL::to('admin/dashboard/') }}">Administrador</a></li>
            @endif

            @else
             <li><a href="{{ URL::to('register') }}" class="signin">Registrarme</a></li>
             <li><a href="{{ URL::to('login') }}" class="signup">Ingresar</a></li>
            @endif
    </ul>

        </div><!-- /.navbar-collapse -->
      </div><!-- /.container -->
    </nav>
   <!-- end:navbar -->
