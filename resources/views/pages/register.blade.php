@extends("app")

@section('head_title', 'Registrar | '.getcong('site_name') )
@section('head_url', Request::url())

@section("content")
<!-- begin:header -->
    <div id="header" class="heading" style="background-image: url({{ URL::asset('assets/img/img01.jpg') }});">
      <div class="container">
        <div class="row">
          <div class="col-md-10 col-md-offset-1 col-sm-12">
            <div class="page-title">
              <h2>Regístrate</p>
            </div>
            <ol class="breadcrumb">
              <li><a href="{{ URL::to('/') }}">Inicio</a></li>
              <li class="active">Registrarme</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <!-- end:header -->
<!-- begin:content -->
    <div id="content">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-md-offset-1">
            <div class="blog-container">
              <div class="blog-content" style="padding-top:0px;">
                  <div class="blog-title">
                  <h3>Crea una cuenta gratis</h3>

                </div>

                <div class="blog-text contact" style="margin-top: -40px;">
                  <div class="row">

                  	@if(Session::has('flash_message'))
				    <div class="alert alert-success">
				    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span></button>
				        {{ Session::get('flash_message') }}
				    </div>
				@endif
                    	<div class="message">
												<!--{!! Html::ul($errors->all(), array('class'=>'alert alert-danger errors')) !!}-->
							                    	@if (count($errors) > 0)
											    <div class="alert alert-danger">
											    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				                        <span aria-hidden="true">&times;</span></button>
											        <ul>
											            @foreach ($errors->all() as $error)
											                <li>{{ $error }}</li>
											            @endforeach
											        </ul>
											    </div>
											@endif

							                    </div>
                    <div class="col-md-8 col-sm-7">
                      <div class="pull-right"> Los campos con <red>(*)</red> son obligatorios  </div>
                      {!! Form::open(array('url' => 'register','class'=>'','id'=>'registerform','role'=>'form')) !!}
                        <div class="form-group">
                            <label for="cc">Cedula</label>
                            <input type="text" class="form-control" name="id" id="id" placeholder="Ingresa tu Cedula">
                        </div>
                         <div class="form-group">
                            <label for="email">Nombre y apellido</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Ingresa tus nombres y apellidos">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Ingresa tu email">
                        </div>

                         <div class="form-group">
                            <label for="email">Número Celular</label>
                            <input type="text" class="form-control" name="phone" id="phone" placeholder="Ingresa número celular">
                        </div>

                        <div class="form-group">
                            <label for="address">Dirección</label>
                            <input type="text" class="form-control" name="address" id="address" placeholder="Ingresa tu Direccion">
                        </div>

                         <div class="form-group">
                            <label for="city">Ciudad</label>
                            <input type="text" class="form-control" name="city" id="city" placeholder="Ingresa tu ciudad">
                        </div>

                        <div class="form-group">
                           <label for="referred">Referido</label>
                           <input type="email" class="form-control" name="referred" id="referred" placeholder="Ingresa el correo de tu referido">
                       </div>


                        <div class="form-group checkbox">
                              <p>Ya tienes una cuenta ? <a href="{{ URL::to('login') }}">Ingresa aqui.</a></p>
                        </div>

                          <div class="form-group" style="font-size: 13px; width: 1000px">
                        <p>  Al regístrarte aceptas los <a href="/terms-conditions" target="_blank">Terminos y condiciones</a> y la <a href="/privacy-policy" target="_blank">Politica de privacidad</a></p>
                          </div>

                        <div class="form-group">
                          <button type="submit" name="submit" class="btn btn-warning"><i class="fa fa-lock"></i> Regístrarme</button>
                        </div>
                      {!! Form::close() !!} <br>
                    </div>

                  </div>
                </div>



              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end:content -->

@endsection
