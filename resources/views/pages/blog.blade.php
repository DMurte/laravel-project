@extends("app")

@section('head_title', 'Blog | '.getcong('site_name') )
@section('head_url', Request::url())

@section("content")

 <!-- begin:header -->
    <div id="header" class="heading" style="background-image: url({{ URL::asset('assets/img/img01.jpg') }});">
      <div class="container">
        <div class="row">
          <div class="col-md-10 col-md-offset-1 col-sm-12">
            <div class="page-title">
              <h2>Blog</h2>
            </div>
            <ol class="breadcrumb">
              <li><a href="{{ URL::to('/') }}">Home</a></li>
                <li class="active">Blog</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <!-- end:header -->

    <!-- begin:content -->
    <div id="content">
      <div class="container-fluid">
        <div class="row">
          <!-- begin:article -->

          <div class="col-md-8 col-md-offset-2">


            <!-- begin:article -->

            @foreach($articulos as $articulo)
            <div class="well" style=" background-color: white;">
              <a href="articulo/{{$articulo->id}}" style="text-decoration: none;color:black;">
                <h3>{{$articulo->titulo}}</h3><hr style="border-top: 1px solid black !important;">
                @if($articulo->img != null)
                <img src="{{ URL::asset('upload/blogs/'.$articulo->img.'-b.jpg') }}" class="img-responsive" alt="{{$articulo->titulo}}">
                <br>
                @endif

                <p style="text-align:justify;">{!! primer_parrafo($articulo->contenido) !!}</p>
                <hr style="border-top: 1px solid black;">
                </div>
              </a>
            @endforeach
            <!-- end:article -->

            <!-- begin:pagination -->
            @include('_particles.pagination', ['paginator' => $articulos])
            <!-- end:pagination -->

        </div>

        </div>
      </div>
    </div>
    <!-- end:content -->

@endsection
