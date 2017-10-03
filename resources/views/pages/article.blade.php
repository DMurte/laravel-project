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


            <div class="well" style=" background-color: white;">

                <h3>{{$articulo->titulo}}</h3><hr style="border-top: 1px solid black;">
                @if($articulo->img != null)
                <img src="{{ URL::asset('upload/blogs/'.$articulo->img.'-b.jpg') }}" class="img-responsive" alt="{{$articulo->titulo}}">
                <br>
                @endif

                {!! ($articulo->contenido) !!}
                <hr style="border-top: 1px solid black;">
                </div>


            <!-- end:article -->

            <!-- begin:pagination -->

            <!-- end:pagination -->

        </div>

        </div>
      </div>
    </div>
    <!-- end:content -->

@endsection
