@extends("app.app")

@section("content")

<div id="main">
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
    <br>
    <h1>&nbsp&nbsp&nbsp{{$project->title}}</h1>
        @if($project->status=1)
        <h4>&nbsp&nbsp&nbsp&nbsp&nbsp&nbspEn planeacion </h4>
        @elseif($project->status=2)
        <h4>&nbsp&nbsp&nbsp&nbsp&nbsp&nbspEn ejecución </h4>
        @else
        <h4>&nbsp&nbsp&nbsp&nbsp&nbsp&nbspEjecutado</h4>
        @endif

    	    <div class="panel-body">
            <table  align="left" width="*%" cellspacing=1 cellpadding=1>
            <tr><td>
            <img style="margin-left: 2%; margin-right: 20px;" src="{{ URL::asset('upload/properties/'.$project->image.'-s.jpg') }}" width="300" alt="person"></td>
            <td><textarea autofocus rows=16 cols=140 type=text readonly onfocus="this.blur()" style="border: none;" >{{$project->description}}</textarea></td>
            </tr></table>
    	    </div>
		{!! Form::close() !!}
    <div class="clearfix"></div>
</div>

</div>





@endsection
