@extends("app")
@section("content")

@include("_particles.slidersearch")
<style type="text/css">
 .property-container{
    max-height:335px;
    min-height:335px;
}
</style>

<!-- begin:content -->
    <div id="content">
      <div class="container">
        <!-- begin:latest -->
        <div class="row">
          <div class="col-md-12">
            <div class="heading-title">
              <h2>Últimos Inmuebles</h2>
            </div>
          </div>
        </div>
        <div class="row">
         @foreach($propertieslist as $i => $property)
          <div class="col-md-3  col-sm-6 col-xs-12">
            <div class="property-container">
              <div class="property-image">

                <img src="{{ URL::asset('upload/properties/'.$property->featured_image.'-s.jpg') }}" alt="{{ $property->property_name }}">
                <div class="property-price">
                  <h4>{{ getPropertyTypeName($property->property_type)->types }}</h4>
                  <p>{{getcong('currency_sign')}}@if($property->sale_price) {{$property->sale_price}} @else {{$property->rent_price}} @endif</p>
                  <p>
                  {{getcong('currency_sign')}}@if($property->brick_price) {{$property->brick_price}}
                  <i class="fa fa-cube" aria-hidden="true"></i> @else {{$property->brick_price}} @endif
                  </p>
                </div>
                @if ($property->state == 'Normal' || $property->state == '')
                <div class="property-status">
                  <span> {{$property->property_purpose}}</span>
                </div>
                @endif

                @if ($property->state == 'Vendido')
                <div class="property-status" style="background-color: #E14242">
                  <span> {{$property->state}}</span>
                </div>
                @endif
                @if ($property->state == 'Oferta')
                <div class="property-status" style="background-color: #ffce54">
                  <span> {{$property->state}}</span>
                </div>
                @endif
              </div>
              <div class="property-features">
                <span><i class="fa fa-home"></i> {{$property->area}}</span>
                <span><i class="fa fa-hdd-o"></i> {{$property->bedrooms}}</span>
                <span><i class="fa fa-male"></i> {{$property->bathrooms}}</span>
              </div>
              <div class="property-content">
                <h3><a href="{{URL::to('properties/'.$property->property_slug)}}">{{ str_limit($property->property_name,35) }}</a> <small>{{ str_limit($property->address,40) }}</small></h3>
              </div>
            </div>
          </div>
          <!-- break -->
		@endforeach
        </div>
      </div>
        <!-- end:latest -->
        <!-- end:latest -->
@include("_particles.testimonials")
<div class="container">
        <div class="row">
      <div class="col-md-6">
        <div class="col-md-12">
          <div class="heading-title">
            <h2>Últimos Blogs</h2>
          </div>
        </div>
      <div class="row">
       @foreach($articulos as $articulo)
        <div class="col-md-6 col-sm-6 col-xs-12">
          <a href="articulo/{{$articulo->id}}" style="text-decoration: none;color:black;">
          <div class="property-container">
            <div class="property-image">
              <img src="{{ URL::asset('upload/blogs/'.$articulo->img.'-b.jpg') }}" class="img-responsive" alt="{{$articulo->titulo}}">
              <div class="property-status">
                <span>Blog</span>
              </div>
              </div>
            <div class="property-content">
              <small>{{ $articulo->categoria()->descripcion }}</small>
                <h4>{{$articulo->titulo }}</h4>
            </div>
          </div>
          </a>
        </div>
  @endforeach
      </div>
    </div>
      <div class="col-md-6">
        <div class="col-md-12">
          <div class="heading-title">
            <h2>Noticias recomendadas</h2>
          </div>
        </div>
      <div class="row">
       @foreach($news as $article)
        <div class="col-md-6 col-sm-6 col-xs-12">
          <a href="articulo/{{$articulo->id}}" style="text-decoration: none;color:black;">
          <div class="property-container">
            <div class="property-image">
              <img src="{{ URL::asset('upload/blogs/'.$article->image.'-b.jpg') }}" class="img-responsive" alt="{{$article->title}}">
              <div class="property-status">
                <span>Blog</span>
              </div>
              </div>
              <div class="property-content">
                  <h4>{{$article->title}}</h4>
                  <div class="text-center">
                     <a class="signup" href="{{$article->url}}" target="_blank">Ver</a>
                  </div>
                  <br>
              </div>
          </div>
          </a>
        </div>
  @endforeach
      </div>
      </div>
      </div>
     <div class="row text-center">
       <div class="col-md-6">
         <br>
         <img src="http://www.supersolidaria.gov.co/sites/all/themes/nivelics/logo.png" alt="" width="260">
       </div>
       <div class="col-md-6">
          <a target="_blank" href="https://www.zonapagos.com/t_cmmircolombia/formas.asp?estado=crear&codigo=4BEAEF50C1790DB17DD41B60675AA77A6895012AEC1AC403&registro_externo=F20E97555A2F17D72C6E2B9734E732AE6C97DB6067A8459F"> <img src="http://detektor.com.co/conocenos/pse.png" alt="" width="150"></a>
       </div>
     </div>
      </div>
    </div>
    <!-- end:content -->


	@include("_particles.subscribe")



@endsection
