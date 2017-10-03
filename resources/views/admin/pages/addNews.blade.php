@extends("admin.admin_app")

@section("content")
<div id="main">
	<div class="page-header">


		<h2>Agregar Noticia</h2>
	</div>
	@if(Session::has('flash_message'))
				    <div class="alert alert-success">
				    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span></button>
				        {{ Session::get('flash_message') }}
				    </div>
	@endif

<div class="panel panel-default panel-shadow">

		{!! Form::open(['url' => 'admin/news/addnews','method' => 'post','enctype' => 'multipart/form-data']) !!}
	    <div class="panel-body">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">

			<br>
			@if(!empty($article->id))
			<input type="hidden" value="{{$article->id}}" name="id">
			@endif

	    <label>Titulo</label>
	    <input type="text" name="title" class="form-control" value="@if(!empty($article->title)){{$article->title}}@endif" required>
	    <br>
      <label>Imagen Principal</label>
	    <input type="file" name="featured_image">
			<br>
			@if(!empty($article->image))
			 <img src="{{ URL::asset('upload/blogs/'.$article->image.'-b.jpg') }}" alt="" class="img-responsive" width="200">
			 	@endif
	    <br>
			<label>Url</label>
		 <input type="text" name="url" class="form-control" value="@if(!empty($article->url)){{$article->url}}@endif" required>
		 <br>


			<center><input type="submit" class="btn btn-primary"></center>
	    </div>
		{!! Form::close() !!}
    <div class="clearfix"></div>
</div>

</div>





@endsection
