<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="http://mircolombia.com/upload/favicon.png">
    <title>Mir Colombia</title>
    <link rel="stylesheet" type="text/css" href="/app_assets/lib/perfect-scrollbar/css/perfect-scrollbar.min.css"/>
    <link rel="stylesheet" type="text/css" href="/app_assets/lib/material-design-icons/css/material-design-iconic-font.min.css"/>
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="/app_assets/lib/jquery.vectormap/jquery-jvectormap-1.2.2.css"/>
    <link rel="stylesheet" type="text/css" href="/app_assets/lib/jqvmap/jqvmap.min.css"/>
    <link rel="stylesheet" type="text/css" href="/app_assets/lib/datetimepicker/css/bootstrap-datetimepicker.min.css"/>
    <link rel="stylesheet" href="/app_assets/css/style.css" type="text/css"/>
  </head>
  <body>
    <div class="be-wrapper be-fixed-sidebar">
      @include("app._particles.header");

      @include("app._particles.sidebar")

			<div class="be-content">
				@yield("content")
      </div>

    </div>
    <script src="/app_assets/lib/jquery/jquery.min.js" type="text/javascript"></script>
    <script src="/app_assets/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
    <script src="/app_assets/js/main.js" type="text/javascript"></script>
    <script src="/app_assets/lib/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="/app_assets/lib/jquery-flot/jquery.flot.js" type="text/javascript"></script>
    <script src="/app_assets/lib/jquery-flot/jquery.flot.pie.js" type="text/javascript"></script>
    <script src="/app_assets/lib/jquery-flot/jquery.flot.resize.js" type="text/javascript"></script>
    <script src="/app_assets/lib/jquery-flot/plugins/jquery.flot.orderBars.js" type="text/javascript"></script>
    <script src="/app_assets/lib/jquery-flot/plugins/curvedLines.js" type="text/javascript"></script>
    <script src="/app_assets/lib/jquery.sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
    <script src="/app_assets/lib/countup/countUp.min.js" type="text/javascript"></script>
    <script src="/app_assets/lib/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
    <script src="/app_assets/lib/jqvmap/jquery.vmap.min.js" type="text/javascript"></script>
    <script src="/app_assets/lib/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
    <script src="/app_assets/js/app-dashboard.js" type="text/javascript"></script>
    <script src="/app_assets/lib/datatables/js/jquery.dataTables.min.js" type="text/javascript"></script>
        <script src="/app_assets/js/app-tables-datatables.js" type="text/javascript"></script>
<script src="/app_assets/lib/datatables/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
    <script type="text/javascript">
      $(document).ready(function(){
      	//initialize the javascript
      	App.init();
        App.dataTables();
        App.dashboard();

      });
    </script>
  </body>
</html>
