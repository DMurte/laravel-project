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

    <input type="hidden" name="id" value="{{$credit->id}}">
    <br>
    <h1>&nbsp&nbsp&nbspCrédito {{$credit->title}}</h1>

    @if($credit->type==1) <h4>&nbsp&nbsp&nbsp&nbsp&nbsp&nbspTipo : CONDONABLE</h4> @endif
    @if($credit->type==2) <h4>&nbsp&nbsp&nbsp&nbsp&nbsp&nbspTipo : EDUCATIVO</h4>  @endif
    @if($credit->type==3) <h4>&nbsp&nbsp&nbsp&nbsp&nbsp&nbspTipo : DE LIBRE DESTINACIÓN</h4>    @endif
    @if($credit->type==4) <h4>&nbsp&nbsp&nbsp&nbsp&nbsp&nbspTipo : DE PROTECCIÓN SOLIDARIA</h4> @endif
    @if($credit->type==5) <h4>&nbsp&nbsp&nbsp&nbsp&nbsp&nbspTipo : ESPECIAL RESIDENCIA MEDICA</h4> @endif
    @if($credit->type==6) <h4>&nbsp&nbsp&nbsp&nbsp&nbsp&nbspTipo : DE VIVIENDA</h4>  @endif
    @if($credit->type==7) <h4>&nbsp&nbsp&nbsp&nbsp&nbsp&nbspTipo : MICROCRÉDITO</h4> @endif

    <h4>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspValor : {{ $credit->price}}</h4>




    	    <div class="panel-body">
            <table  align="left" width="*%" cellspacing=1 cellpadding=1>
            <tr><td>
            <img style="margin-left: 2%; margin-right: 20px;" src="{{ URL::asset('upload/properties/'.$credit->image.'-s.jpg') }}" width="300" alt="person"></td>
            <td><textarea autofocus rows=16 cols=140 type=text readonly onfocus="this.blur()" style="border: none;" >{{$credit->description}}</textarea></td>
            </tr></table>
    	    </div>
		{!! Form::close() !!}
    <div class="clearfix"></div>
</div>

</div>





@endsection
