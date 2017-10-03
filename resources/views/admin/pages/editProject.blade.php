@extends("admin.admin_app")

@section("content")
<div id="main">
	<div class="page-header">
		<h2>Editar Proyecto</h2>
	</div>
	@if(Session::has('flash_message'))
				    <div class="alert alert-success">
				    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span></button>
				        {{ Session::get('flash_message') }}
				    </div>
	@endif

<div class="panel panel-default panel-shadow">
  {!! Form::open(['url' => 'admin/projects/editar', 'method' => 'post','enctype' => 'multipart/form-data']) !!}

    <input type="hidden" name="id" value="{{$project->id}}">
	    <div class="panel-body">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<label>Estatus</label>

			<select class="form-control" name="tipo">
				@foreach($tipos as $tipo)
				<option value="{{$tipo->id}}"
					@if($project->tipo==$tipo->id)
					{{"selected"}}
					@endif
					>{{$tipo->status}}</option>
				@endforeach
			</select>
			<br>
	    <label>Titulo</label>
	    <input type="text" name="title" class="form-control" value="{{$project->title}}" required>
	    <br>
	    <label>Descripcion</label>
	    <textarea class="form-control summernote" name="description" rows="10">{{$project->description}}</textarea>
			<br>
			<div class="row">
        @if($project->image!= null)
        <img style="margin-left: 2%;" src="{{ URL::asset('upload/properties/'.$project->image.'-s.jpg') }}" width="300" alt="person">
				<br>
			  @endif
			</div>
			<br>
			<label>Imagen</label>
			<input type="file" name="featured_image">
			<br>





			<center><input type="submit" class="btn btn-primary"> </center>
	    </div>
		{!! Form::close() !!}
    <div class="clearfix"></div>
</div>

</div>





@endsection
