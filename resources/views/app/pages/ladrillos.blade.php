@extends("app.app")

@section("content")
        <div class="page-head">
          <h2 class="page-head-title">Mis Ladrillos</h2>
          <ol class="breadcrumb">
            <li><a href="#">Inicio</a></li>
            <li class="active">Ladrillos</li>
          </ol>
        </div>
        <div class="main-content container-fluid">
          <div class="row">
            <div class="col-md-12">

              <?php
              setlocale(LC_ALL,"es_ES@euro","es_ES","esp");

               ?>
              <ul class="timeline">
                @foreach($transacciones as $transaccion)



                <li class="timeline-item timeline-item-detailed">
                  <div class="timeline-date"><span>{{ucfirst(strftime("%B %d, %Y ",strtotime($transaccion->date)))}}</span></div>
                  <div class="timeline-content">
                    <div class="timeline-avatar">
                      @if(Auth::user()->image_icon)

                         <img src="{{ URL::asset('upload/members/'.Auth::user()->image_icon.'-s.jpg') }}" class="circle">
                     @else

                     <img src="/app_assets/img/avatar.png" alt="Avatar" class="circle">

                     @endif

                    </div>
                    <div class="timeline-header"><span class="timeline-time">{{ucfirst(strftime("%H:%M",strtotime($transaccion->date)))}}</span>

                      <p class="timeline-activity">{{$transaccion->titulo}}</p>
                    </div>
                  </div>
                </li>
                @endforeach


              </ul>
            </div>
          </div>
        </div>
@endsection
