@extends("admin.admin_app")

@section("content")
<style type="text/css">
 .th{
    font-size:30%;!important;
	},
 .td{
	     font-size: 30%;!important;
}
</style>
<div id="main">
	@if(Session::has('flash_message'))
				    <div class="alert alert-success">
				    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span></button>
				        {{ Session::get('flash_message') }}
				    </div>
	@endif

<div class="panel panel-default panel-shadow">
    <div class="panel-body">

        <table id="data-table" class="table table-striped table-hover " cellspacing="0" width="100%">
            <thead>
	            <tr>
	                <th>Tipo</th>
	                <th>Titulo</th>
	                <th>Descripción</th>
									<th>Valor</th>


	                <th class="text-center width-100">Asignar</th>
	            </tr>
            </thead>

            <tbody>
            @foreach($allcredits as $i => $credits)
         	   <tr>
            	  <td>{{ $credits->type }}</td>
                <td>{{ $credits->title}}</td>
                <td>{{ $credits->description}}</td>
								<td>{{ $credits->price}}</td>


            <td class="text-center">
            <div class="">
              <a href="{{URL::to('admin/user/credit/'.$id.'/'.$credits->id)}}" class="btn btn-default-dark"> Asignar <i class=""></i></a>
            </div><br>
            </td>

            </tr>
           @endforeach

            </tbody>
        </table>
    </div>
    <div class="clearfix"></div>
</div>

</div>



@endsection
