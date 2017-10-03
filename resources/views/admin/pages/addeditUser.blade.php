@extends("admin.admin_app")

@section("content")

<div id="main">
	<div class="page-header">
		<h2> {{ isset($user->name) ? 'Editar: '. $user->name : 'Añadir usuario' }}</h2>

		<a href="{{ URL::to('admin/users') }}" class="btn btn-default-light btn-xs"><i class="md md-backspace"></i> Atrás</a>

	</div>
	@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
	@endif
	 @if(Session::has('flash_message'))
				    <div class="alert alert-success">
				    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span></button>
				        {{ Session::get('flash_message') }}
				    </div>
	@endif

   	<div class="panel panel-default">
            <div class="panel-body">
                {!! Form::open(array('url' => array('admin/users/adduser'),'method'=>'POST','class'=>'form-horizontal padding-15','name'=>'user_form','id'=>'user_form','role'=>'form','enctype' => 'multipart/form-data')) !!}

								<div class="form-group">
										<label for="" class="col-sm-3 control-label">CC</label>
										<div class="col-sm-9">
											@if(isset($user->id))
											<input type="text" readonly name="id" value="{{ $user->id }}" class="form-control">
											@else
											<input type="text" name="cc" class="form-control" required>
											@endif



										</div>
								</div>

                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Nombre</label>
                    <div class="col-sm-9">
                        <input type="text" name="name" value="{{ isset($user->name) ? $user->name : null }}" class="form-control">
                    </div>
                </div>
				<div class="form-group">
                    <label for="" class="col-sm-3 control-label">Teléfono</label>
                    <div class="col-sm-9">
                        <input type="text" name="phone" value="{{ isset($user->phone) ? $user->phone : null }}" class="form-control" value="">
                    </div>
                </div>
				<div class="form-group">
                    <label for="" class="col-sm-3 control-label">Dirección</label>
                    <div class="col-sm-9">
                        <input type="text" name="address" value="{{ isset($user->address) ? $user->address : null }}" class="form-control" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Ciudad</label>
                        <div class="col-sm-9">
                        <input type="text" name="city" value="{{ isset($user->city) ? $user->city : null }}" class="form-control" value="">
                        </div>
                </div>



				<div class="form-group">
                    <label for="avatar" class="col-sm-3 control-label">Imágen de perfil</label>
                    <div class="col-sm-9">
                        <div class="media">
                            <div class="media-left">
                                @if(isset($user->image_icon))

									<img src="{{ URL::asset('upload/members/'.$user->image_icon.'-s.jpg') }}" width="80" alt="person">
								@endif

                            </div>
                            <div class="media-body media-middle">
                                <input type="file" name="image_icon" class="filestyle">
                            </div>
                        </div>

                    </div>
                </div>

				<hr />
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Email</label>
                    <div class="col-sm-9">
                        <input type="text" name="email" value="{{ isset($user->email) ? $user->email : null }}" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Contraseña</label>
                    <div class="col-sm-9">
                        <input type="password" name="password" value="" class="form-control">
                    </div>
                </div>

								@if(Auth::user()->usertype=="Admin")
								<div class="form-group">
										<label for="" class="col-sm-3 control-label">Rol</label>
										<div class="col-sm-9">
											<select class="form-control" name="usertype">
												<option value="Admin">Administrador</option>
												<option value="Owner">Cliente</option>
											</select>
										</div>
								</div>
								@else
								<input type="hidden" name="usertype" value="{{ isset($user->usertype) ? $user->usertype : 'Owner' }}">

				@endif
								<div class="form-group">
										<label for="" class="col-sm-3 control-label">Referido</label>
										<div class="col-sm-9">
											@if(isset($user->referred))
											{{$user->referred}}
											@else
											<input name="referred" class="form-control">
											@endif

												</div>
								</div>
								@if(!empty($ladrillos))
								<div class="form-group">
										<label for="" class="col-sm-3 control-label">Ladrillos</label>
										<div class="col-sm-9">
											<label>	{{$ladrillos}}
                      </label>
												</div>
								</div>

								<br>
								<b>Aportes</b><br>
								<table class="table table-bordered table-responsive">
									<th>id</th>
									<th>tipo</th>
									<th>Fecha</th>
									<th>Descripcion</th>
									<th>Cantidad</th>
									<th>Estado</th>
									<tr>
										@foreach($transacciones as $transaccion)
										<tr>
											<td>
												{{$transaccion->id}}
											</td>
											<td>
												{{$transaccion->tipo->descripcion}}
											</td>
											<td>
												{{$transaccion->date}}
											</td>
											<td>
												{{$transaccion->titulo}}
											</td>
											<td>
												{{$transaccion->bricks}}
											</td>
											<td>
												{{$transaccion->estado->name}}
											</td>
										</tr>

										@endforeach
									</tr>
								</table>
									@endif


                <hr>
                <div class="form-group">
                    <div class="col-md-offset-3 col-sm-9 ">
                    	<button type="submit" class="btn btn-primary">{{ isset($user->name) ? 'Editar Usuario' : 'Añadir Usuario' }}</button>

                    </div>
                </div>

                {!! Form::close() !!}
            </div>
        </div>


</div>

@endsection
