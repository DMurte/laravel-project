@extends("app.app")

@section("content")

  <div class="main-content container-fluid">
    <div class="row">
      <div class="col-xs-12 col-md-6 col-lg-3">
                  <div class="widget widget-tile">
                    <div id="spark1" class="chart sparkline"></div>
                    <div class="data-info">
                      <div class="desc">Ladrillo Hoy</div>
                      <div class="value"><span class="indicator indicator-equal mdi mdi-chevron-right"></span>$<span data-toggle="counter" data-end="10" class="number">0</span>
                      </div>
                    </div>
                  </div>
      </div>
      <div class="col-xs-12 col-md-6 col-lg-3">
                  <div class="widget widget-tile">
                    <div id="spark2" class="chart sparkline"></div>
                    <div class="data-info">
                      <div class="desc">Ladrillo Venta</div>
                      <div class="value"><span class="indicator indicator-positive mdi mdi-chevron-up"></span>$<span data-toggle="counter" data-end="100"  class="number">0</span>
                      </div>
                    </div>
                  </div>
      </div>
      <div class="col-xs-12 col-md-6 col-lg-3">
                  <div class="widget widget-tile">
                    <div id="spark3" class="chart sparkline"></div>
                    <div class="data-info">
                      <div class="desc">Ladrillo Compra</div>
                      <div class="value"><span class="indicator indicator-positive mdi mdi-chevron-up"></span>$<span data-toggle="counter" data-end="150" class="number">0</span>
                      </div>
                    </div>
                  </div>
      </div>

    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="widget widget-fullwidth be-loading">
          <div class="widget-head">
            <div class="tools">
              <div class="dropdown"><span data-toggle="dropdown" class="icon mdi mdi-more-vert visible-xs-inline-block dropdown-toggle"></span>
                <ul role="menu" class="dropdown-menu">
                  <li><a href="#">Week</a></li>
                  <li><a href="#">Month</a></li>
                  <li><a href="#">Year</a></li>
                  <li class="divider"></li>
                  <li><a href="#">Today</a></li>
                </ul>
              </div><span class="icon mdi mdi-chevron-down"></span><span class="icon toggle-loading mdi mdi-refresh-sync"></span><span class="icon mdi mdi-close"></span>
            </div>
              <span class="title">Índice del dane</span>
          </div>
          <div class="widget-chart-container">
            <div class="widget-chart-info">
              <ul class="chart-legend-horizontal">
                <li><span data-color="main-chart-color1"></span> Info</li>
                <li><span data-color="main-chart-color2"></span> Info</li>
                <li><span data-color="main-chart-color3"></span> Info</li>
              </ul>
            </div>
            <div class="widget-counter-group widget-counter-group-right">
              <div class="counter counter-big">
                <div class="value">25%</div>
                <div class="desc">Info</div>
              </div>
              <div class="counter counter-big">
                <div class="value">5%</div>
                <div class="desc">info</div>
              </div>
              <div class="counter counter-big">
                <div class="value">5%</div>
                <div class="desc">info</div>
              </div>
            </div>
            <div id="main-chart" style="height: 260px;"></div>
          </div>

        </div>
      </div>
    </div>


    <div class="row">
      <div class="col-xs-12 col-md-6">
        <div class="panel panel-default">
          <div class="panel-heading">Ultimas Transacciones</div>
          <div class="panel-body">
            <ul class="user-timeline user-timeline-compact">
              <li class="latest">
                <div class="user-timeline-date">Ahora</div>
                <div class="user-timeline-title">Compra de ladrillos $100</div>
                <div class="user-timeline-description">Vestibulum lectus nulla, maximus in eros non, tristique.</div>
              </li>
              <li>
                <div class="user-timeline-date">15:35</div>
                <div class="user-timeline-title">Compra de credito 1</div>
                <div class="user-timeline-description">Vestibulum lectus nulla, maximus in eros non, tristique.</div>
              </li>
              <li>
                <div class="user-timeline-date">Ayer</div>
                <div class="user-timeline-title">Compra de Ladrillos $100</div>
                <div class="user-timeline-description">Vestibulum lectus nulla, maximus in eros non, tristique.      </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-xs-12 col-md-6">
        <div class="widget widget-calendar">
        <div id="calendar-widget"></div>
      </div>
      </div>
    </div>
  </div>
  @endsection
