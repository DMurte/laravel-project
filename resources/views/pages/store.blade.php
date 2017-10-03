@extends("app")

@section('head_title', 'Featured Properties | '.getcong('site_name') )
@section('head_url', Request::url())

@section("content")

 <!-- begin:header -->
    <div id="header" class="heading" style="background-image: url({{ URL::asset('assets/img/img01.jpg') }});">
      <div class="container">
        <div class="row">
          <div class="col-md-10 col-md-offset-1 col-sm-12">
            <div class="page-title">
              <h2>Tienda</h2>
            </div>
            <ol class="breadcrumb">
              <li><a href="{{ URL::to('/') }}">Home</a></li>
              <li class="active">Tienda</li>
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
          <div class="col-md-12">

            <!-- begin:product -->
            <div class="row container-realestate">

              @foreach($productos as $producto)
              <a href="store/{{$producto->id}}">
              <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="property-container">
                  <div class="property-image">

                    @if($producto->img != null)
                    <img style="margin-left: 2%;" src="{{ URL::asset('upload/properties/'.$producto->img.'-s.jpg') }}" width="300" alt="person">
            				<br>
            			  @endif
                    <div class="property-price">

                      <p>$ {{$producto->price}} COP </p>
                    </div>

                  </div>
                  <div class="property-features">
                    <h4>{{$producto->title}} </h4>
                  </div>
                  <div class="property-content">
                    <h5><a href=""> <small> Tipo de producto: {{ $producto->tipos->descripcion}}</small></a></h5>
                  </div>
                </div>
              </div>
              </a>
              @endforeach


            </div>
            <!-- end:product -->

            <!-- begin:pagination -->
            @include('_particles.pagination', ['paginator' => $productos])
            <!-- end:pagination -->
          </div>
          <!-- end:article -->

          <!-- begin:sidebar -->

          <!-- end:sidebar -->

        </div>
      </div>
    </div>
    <!-- end:content -->

@endsection
