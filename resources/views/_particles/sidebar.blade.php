<div class="col-md-3 col-md-pull-9 sidebar">
            <div class="widget widget-white">
              <div class="widget-header">
                <h3>Búsqueda</h3>
              </div>

              {!! Form::open(array('url' => array('searchproperties'),'class'=>'advance-search','name'=>'search_form','id'=>'search_form','role'=>'form')) !!}
               <div class="form-group">
                      <label for="city">Ciudad</label>
                      <select class="form-control" name="city_id">
                        @foreach(\App\City::where('status','1')->orderBy('city_name')->get() as $city)

							<option value="{{$city->id}}">{{$city->city_name}}</option>

						@endforeach

                      </select>
                    </div>
                <div class="form-group">
                      <label for="purpose">Proposito</label>
                      <select class="form-control" name="purpose">
                        <option value="Sale">Venta</option>

                      </select>
               </div>
               <div class="form-group">
                      <label for="type">Tipo</label>
                      <select class="form-control" name="type">

                        @foreach(\App\Types::orderBy('types')->get() as $type)
                        <option value="{{$type->id}}">{{$type->types}}</option>
						@endforeach

                      </select>
              </div>

                <div class="form-group">
                      <label for="minprice">Precio Min</label>
                      <input type="text" name="min_price" class="form-control" placeholder="Precio Minimo (número)">
                </div>
                <div class="form-group">
                      <label for="maxprice">Precio Max</label>
                      <input type="text" name="max_price" class="form-control" placeholder="Precio Máximo (número)">
                    </div>

                <input type="" name="submit" value="Buscar" class="btn btn-primary btn-block">
              {!! Form::close() !!}
            </div>
            <!-- break -->
            <div class="widget widget-sidebar widget-white">
              <div class="widget-header">
                <h3>Tipo de inmueble</h3>
              </div>
              <ul class="list-check">
                @foreach(\App\Types::orderBy('types')->get() as $type)

                <li><a href="{{URL::to('type/'.$type->slug.'')}}">{{$type->types}}</a>&nbsp;({{countPropertyType($type->id)}})</li>

                @endforeach


              </ul>
            </div>

            <!-- break -->
          </div>
