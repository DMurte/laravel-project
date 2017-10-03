<div class="be-left-sidebar">
  <div class="left-sidebar-wrapper"><a href="#" class="left-sidebar-toggle">Inicio</a>
    <div class="left-sidebar-spacer">
      <div class="left-sidebar-scroll">
        <div class="left-sidebar-content">
          <ul class="sidebar-elements">
            <li class="divider">Menu</li>
            <li class="{{classActivePath('dashboard')}}"><a href="/app/dashboard"><i class="icon mdi mdi-home"></i><span>Inicio</span></a>
            </li>
            <li><a href="{{ URL::to('app/network/'.Auth::user()->id)}}"><i class="icon mdi mdi-share"></i><span>Mi red</span></a>
            </li>
            <li class="{{classActivePath('aportes')}}"><a href="/app/aportes" ><i class="icon mdi mdi-money"></i><span>Aportes</span></a>
            </li>
            <li ><a href="{{ URL::to('app/credits/'.Auth::user()->id) }}"><i class="icon mdi mdi-balance"></i><span>Créditos</span></a>
            </li>

            <li class="{{classActivePath('ladrillos')}}"><a href="{{ URL::to('app/ladrillos/'.Auth::user()->id) }}"><i class="icon mdi mdi-layers"></i><span>Ladrillos</span></a>
            </li>
            <li class="{{classActivePath('properties')}}"><a href="/app/properties" ><i class="icon mdi mdi-city-alt"></i><span>Ofrece tu inmueble</span></a>
            </li>
            <li ><a href="reting.html"><i class="icon mdi mdi-chart"></i><span>Reting</span></a>
            </li>
            <li ><a href="{{ URL::to('app/commissions/'.Auth::user()->id) }}"><i class="icon mdi mdi-money-box"></i><span>Comisiones</span></a>
            </li>
            <li ><a href="/app/pqrs"><i class="icon mdi mdi-comment-text-alt"></i><span>PQRS</span></a>
            </li>
            <li ><a href="/app/projects"><i class="icon mdi mdi-home"></i><span>Proyectos</span></a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="progress-widget">
      © Cooperativa Mir 2017
    </div>
  </div>
</div>
