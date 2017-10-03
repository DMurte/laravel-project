@extends("admin.admin_app")

@section("content")

<div id="main">
	<div class="page-header">
		<a href="{{ URL::to('admin/dashboard') }}" class="btn btn-default-light btn-xs"><i class="md md-backspace"></i> Back</a>
		<div class="pull-right">
			<a href="{{URL::to('admin/user/credits/'.$user->id)}}" class="btn btn-dark">Añadir Crédito <i class="fa fa-plus"></i></a>
			<a href="{{URL::to('admin/user/addcommission/'.$user->id)}}" class="btn btn-dark">Agregar Comisión <i class="fa fa-plus"></i></a>
		</div>

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
    <div role="tabpanel">
    <!-- Nav tabs -->
    <!-- Tab panes -->
    <div class="tab-content tab-content-default">
        <div role="tabpanel" class="tab-pane active" id="account">
            {!! Form::open(array('url' => 'admin/profile','class'=>'form-horizontal padding-15','name'=>'account_form','id'=>'account_form','role'=>'form','enctype' => 'multipart/form-data')) !!}

                <div class="form-group">
                    <label for="avatar" class="col-sm-3 control-label">Profile Picture</label>
                    <div class="col-sm-9">
                        <div class="media">
                            <div class="left">
									<img src="{{ URL::asset('upload/members/'.Auth::user()->image_icon.'-s.jpg') }}" width="80" alt="person">
                            </div>
                        </div>

                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Nombre</label>
                    <div class="col-sm-9">
                        <strong><input type="text" readonly name="name" value="{{$user->name}}" class="form-control" value=""></strong>
                    </div>
                </div>

								<div class="form-group">
                    <label for="" class="col-sm-3 control-label">CC</label>
                    <div class="col-sm-9">
                        <input type="text" readonly name="id" value="{{$user->id}}" class="form-control" value="">
                    </div>
                </div>
				 <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Email</label>
                    <div class="col-sm-9">
                        <input type="email" readonly name="email" value="{{$user->email}}" class="form-control" value="">
                    </div>
                </div>
				<div class="form-group">
                    <label for="" class="col-sm-3 control-label">Teléfono</label>
                    <div class="col-sm-9">
                        <input type="text" readonly name="phone" value="{{$user->phone}}" class="form-control" value="">
                    </div>
                </div>
				<div class="form-group">
                    <label for="" class="col-sm-3 control-label">Dirección</label>
                    <div class="col-sm-9">
                        <input type="text" readonly name="address" value="{{$user->address}}" class="form-control" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Ciudad</label>
                    <div class="col-sm-9">
                        <input type="text" readonly name="city" value="{{$user->city}}" class="form-control" value="">
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Rol</label>
                    <div class="col-sm-9">
                        <input type="text" readonly name="rol" value="{{$user->usertype}}" class="form-control" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Referido</label>
                    <div class="col-sm-9">
                        <input type="text" readonly name="referred" value="{{$user->referred}}" class="form-control" value="">
                    </div>
                </div>

								<div class="form-group">
										<label for="" class="col-sm-3 control-label">Créditos</label>
										<div class="col-sm-9">
											<table class="table table-bordered table-responsive">
									      <tr>
									        <th>Tipo</th>
									        <th>Título</th>
									        <th>Descripción</th>
													<th>Valor</th>
													<th>Desasignar</th>
									      </tr>
									      @foreach($allcredits as $credit)
									        <tr>
														@if($credit->type==1) <td>Condonable</td> @endif
														@if($credit->type==2) <td>Educativo</td>  @endif
														@if($credit->type==3) <td>de Libre destinación </td>   @endif
														@if($credit->type==4) <td>de Protección solidaria</td> @endif
														@if($credit->type==5) <td>Especial residencia médica </td> @endif
														@if($credit->type==6) <td>de Vivienda</td>  @endif
														@if($credit->type==7) <td>Microcrédito</td> @endif
														<td>{{$credit->title}}</td>
									          <td>{{$credit->description}}</td>
														<td>{{$credit->price}}</td>
														<td><a href="credit/delete/{{$credit->id}}/{{$user->id}}" onclick="return confirm('Estas seguro?.')" class="btn btn-danger"><i class="fa fa-remove" aria-hidden="true"></i></a></td>
									        </tr>
									      @endforeach
                     
									    </table>

										</div>
								</div>



								<div class="form-group">
										<label for="" class="col-sm-3 control-label">Comisiones</label>
										<div class="col-sm-9">
											<table class="table table-bordered table-responsive">
												<tr>
													<th>Tipo</th>
					                <th>Título</th>
				                  <th>Fecha</th>
				                  <th>Ladrillos</th>
												</tr>
												@foreach($comisiones as $comision)
													<tr>
														@if($comision->type == 5) <td>Comisión directa</td>    @endif
														@if($comision->type == 6) <td>Comisión indirecta</td>   @endif
														<td>{{$comision->titulo}}</td>
														<td>{{$comision->date}}</td>
														<td>{{$comision->cantidad}}</td>
													</tr>
												@endforeach

											</table>

										</div>

								</div>

								<div class="form-group">
										<label for="" class="col-sm-3 control-label">Ladrillos ganados por comisión</label>
										<div class="col-sm-9">
												<input type="text" readonly name="comisiones_sumatoria" value="{{$comisiones_sumatoria}}" class="form-control" value="">
										</div>
								</div>

								<div class="form-group">
										<label for="" class="col-sm-3 control-label">Transacciones</label>
										<div class="col-sm-9">
											<table class="table table-bordered table-responsive">
									      <tr>
									        <th>id</th>
									        <th>Estado</th>
									        <th style="white-space: nowrap;">Valor</th>
									        <th>Fecha</th>
									        <th>Tipo</th>
									        <th>Origen</th>
									        <th>Producto</th>
									        <th>Comision</th>
									        <th>Cantidad</th>
									        <th>Borrar</th>
									      </tr>
									      @foreach($transacciones as $transaccion)
									        <tr>
									          <td>
									            {{$transaccion->id}}
									          </td>
									          <td>
									            @if($transaccion->estado->name == "APROBADA")<p style="color:green;">{{$transaccion->estado->name}}@else {{$transaccion->estado->name}} </p>@endif

									          </td>
									          <td>
									          $ {{$transaccion->bricks}}
									          </td>
									          <td>
									            {{$transaccion->date}}
									          </td>
									          <td>
									            @if($transaccion->type == 1) {{ "Ladrillos" }}   @endif
									            @if($transaccion->type == 2) {{ "Póliza" }}   @endif
									            @if($transaccion->type == 3) {{ "Seguro" }}   @endif
									            @if($transaccion->type == 4) {{ "Fondos de ahorro e inversión" }}   @endif

									          </td>
									          <td>
									            {{str_replace('"', "", $transaccion->origen)}}
									          </td>
									          <td>{{$transaccion->titulo}}</td>
									          <td>$ {{$transaccion->comision}}</td>
									          <td>{{$transaccion->cantidad}}</td>
									          <td>
									            <a href="transacciones/delete/{{$transaccion->id}}" onclick="return confirm('Estas seguro?.')" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i></a>
									         </td>
									        </tr>
									      @endforeach

									    </table>

										</div>

								</div>
								<div class="form-group">
										<label for="" class="col-sm-3 control-label">Ladrillos comprados</label>
										<div class="col-sm-9">
												<input type="text" readonly name="comisiones_sumatoria" value="{{$bought_bricks}}" class="form-control" value="">
										</div>
								</div>

								<div class="form-group">
										<label for="" class="col-sm-3 control-label">Ladrillos en total </label>
										<div class="col-sm-9">
												<input type="text" readonly name="comisiones_sumatoria" value="{{$ladrillos}}" class="form-control" value="">
										</div>
								</div>





                <hr>

            {!! Form::close() !!}
        </div>
    </div>
</div>
</div>

@endsection
