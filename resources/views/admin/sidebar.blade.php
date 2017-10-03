<!-- Sidebar Left -->
  <div class="sidebar left-side" id="sidebar-left">
	 <div class="sidebar-user">
		<div class="media sidebar-padding">
			<div class="media-left media-middle">

				@if(Auth::user()->image_icon)

									<img src="{{ URL::asset('upload/members/'.Auth::user()->image_icon.'-s.jpg') }}" width="60" alt="person" class="img-circle">

							@else

							<img src="{{ URL::asset('admin_assets/images/guy.jpg') }}" alt="person" class="img-circle" width="60"/>

							@endif
			</div>
			<div class="media-body media-middle">

				<a href="{{ URL::to('admin/profile') }}" class="h4 margin-none">{{ Auth::user()->name }}</a>
				<ul class="list-unstyled list-inline margin-none">
					<li><a href="{{ URL::to('admin/profile') }}"><i class="md-person-outline"></i></a></li>
					@if(Auth::User()->usertype=="Admin")
					<li><a href="{{ URL::to('admin/settings') }}"><i class="md-settings"></i></a></li>
					@endif
					<li><a href="{{ URL::to('admin/logout') }}"><i class="md-exit-to-app"></i></a></li>
				</ul>
			</div>
		</div>
	</div>
	<!-- Wrapper Reqired by Nicescroll (start scroll from here) -->
	<div class="nicescroll">
		<div class="wrapper" style="margin-bottom:90px">
			<ul class="nav nav-sidebar" id="sidebar-menu">

               @if(Auth::user()->usertype=='Admin')

               		<li class="{{classActivePath('dashboard')}}"><a href="{{ URL::to('admin/dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	                <li class="{{classActivePath('bricks')}}"><a href="{{ URL::to('admin/bricks') }}"><i class="fa fa-cube"></i>Tienda</a></li>
	                <li class="{{classActivePath('properties')}}"><a href="{{ URL::to('admin/properties') }}"><i class="md md-pin-drop"></i>Inmuebles</a></li>
                  <li class="{{classActivePath('blog')}}"><a href="{{ URL::to('admin/blog') }}"><i class="fa fa-rss"></i>Blog</a></li>
                  <li class="{{classActivePath('news')}}"><a href="{{ URL::to('admin/news') }}"><i class="fa fa-newspaper-o"></i>Noticias</a></li>


					<li class="{{classActivePath('transacciones')}}"><a href="{{ URL::to('admin/transacciones') }}"><i class="md md-star"></i>Transacciones</a></li>

          <li class="{{classActivePath('projects')}}"><a href="{{ URL::to('admin/projects') }}"><i class="fa fa-home"></i>Proyectos</a></li>

					<li class="{{classActivePath('users')}}"><a href="{{ URL::to('admin/users') }}"><i class="fa fa-users"></i>Usuarios</a></li>

          <li class="{{classActivePath('credits')}}"><a href="{{ URL::to('admin/credits') }}"><i class="fa fa-bank"></i>Créditos</a></li>

					<li class="{{classActivePath('inquiries')}}"><a href="{{ URL::to('admin/inquiries') }}"><i class="fa fa-send"></i>Mensajes</a></li>

          <li class="{{classActivePath('slider')}}"><a href="{{ URL::to('admin/slider') }}"><i class="fa fa-sliders"></i>Carrusel</a></li>

          <li class="{{classActivePath('testimonials')}}"><a href="{{ URL::to('admin/testimonials') }}"><i class="fa fa-comments"></i>Testimonios</a></li>

					<li class="{{classActivePath('subscriber')}}"><a href="{{ URL::to('admin/subscriber') }}"><i class="md md-email"></i>Suscriptores</a></li>

	        <li class="{{classActivePath('settings')}}"><a href="{{ URL::to('admin/settings') }}"><i class="md md-settings"></i>Información</a></li>


               @else

               @endif


			</ul>


		</div>
	</div>
</div>
  <!-- // Sidebar -->

  <!-- Sidebar Right -->
  <div class="sidebar right-side" id="sidebar-right">
	<!-- Wrapper Reqired by Nicescroll -->
	<div class="nicescroll">
		<div class="wrapper">
			<div class="block-primary">
				<div class="media">
					<div class="media-left media-middle">
						<a href="#">
							 @if(Auth::user()->image_icon)

									<img src="{{ URL::asset('upload/members/'.Auth::user()->image_icon.'-s.jpg') }}" width="60" alt="person" class="img-circle border-white">

							@else

							<img src="{{ URL::asset('admin_assets/images/guy.jpg') }}" alt="person" class="img-circle border-white" width="60"/>

							@endif
						</a>
					</div>
					<div class="media-body media-middle">
						<a href="{{ URL::to('admin/profile') }}" class="h4">{{ Auth::user()->name }}</a>
						<a href="{{ URL::to('admin/logout') }}" class="logout pull-right"><i class="md md-exit-to-app"></i></a>
					</div>
				</div>
			</div>
			<ul class="nav nav-sidebar" id="sidebar-menu">
				<li><a href="{{ URL::to('admin/profile') }}"><i class="md md-person-outline"></i> Account</a></li>

				@if(Auth::user()->usertype=='Admin')

				<li><a href="{{ URL::to('admin/settings') }}"><i class="md md-settings"></i> Settings</a></li>

				@endif

				<li><a href="{{ URL::to('admin/logout') }}"><i class="md md-exit-to-app"></i> Logout</a></li>
			</ul>
		</div>
	</div>
</div>
  <!-- // Sidebar -->
