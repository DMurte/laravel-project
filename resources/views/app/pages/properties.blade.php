@extends("app.app")

@section("content")

<div class="page-head">
  <h2 class="page-head-title">Ofrece tu inmueble</h2>
  <ol class="breadcrumb">
    <li><a href="#">Inicio</a></li>
    <li class="active">Ofrece tu inmueble</li>
  </ol>
</div>
<div class="row container">
  <a  href="addeditproperty" style="float: right; margin-bottom: 20px;" class="btn btn-rounded btn-space btn-primary btn-lg "><i class="icon icon-left mdi mdi-cloud-done"></i> Ofrecer nuevo inmueble</a>
            <div class="col-sm-12">
              <div class="panel panel-default panel-table">
                <div class="panel-heading">Lista de propiedades
                </div>
                <div class="panel-body">
                  <table id="table1" class="table table-striped table-hover table-fw-widget">
                    <thead>
                      <tr>
                          <th>ID</th>
                          <th>Nombre</th>
                  <th>Tipo</th>
                  <th>Proposito</th>
                          <th class="text-center">Publicado</th>
                          <th class="text-center width-100">Acción</th>
                      </tr>
                    </thead>
                    <tbody>
                          @foreach($propertieslist as $i => $property)
                      <tr class="odd gradeX">
                        <td>{{ $property->id }}</td>
                        <td>{{ $property->property_name }}</td>
                        <td>{{ getPropertyTypeName($property->property_type)->types }}</td>
                        <td>{{ $property->property_purpose }}</td>
                        <td class="text-center">
                            @if($property->status==1)
                                <i style="font-size: 20px; color: #4AC483" class="icon mdi mdi-check-circle">
                            @else
                                <i style="font-size: 20px; color: #DE4E4E" class="icon mdi mdi-alert-circle">
                            @endif
                        </td>
                        <td class="text-center">
                        <div class="btn-group">
                        <button type="button" class="btn btn-default-dark dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                          Acciones <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-right" role="menu">
                          <li><a href="{{ url('app/addeditproperty/'.$property->id) }}">  Editar</a></li>
                          <li><a href="{{ url('admin/properties/delete/'.$property->id) }}" onclick="return confirm('Estas seguro?.')"> Eliminar</a></li>
                        </ul>
                      </div>

                    </td>

                      </tr>

                       @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

@endsection
