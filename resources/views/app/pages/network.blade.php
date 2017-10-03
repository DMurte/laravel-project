@extends("app.app")

@section("content")
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width">
    <title></title>
    <link rel="stylesheet" href="/assets/treant-js-master/Treant.css" type="text/css"/>

  </head>

  <body>
    <h2>&nbsp&nbsp&nbsp&nbsp&nbsp&nbspTu Red : </h2>
<br><br><br><br><br>
    <div class="" id="tree"></div>
    <div id="chart"></div>
    <script src="/assets/treant-js-master/vendor/raphael.js"></script>
    <script src="/assets/treant-js-master/Treant.js"></script>
    <script type="text/javascript">

           var tree= <?php echo ($tree);?>;
           var padre= "<?php echo $user->name; ?>";

           var arbol = {
             text: {name: padre},
             children:tree
           }
          //console.log(arbol);
         //var arbre = JSON.stringify(arbol);
        //console.log(arbre);

            var simple_chart_config = {
                chart:{
                 container:"#tree"
                 },
                 nodeStructure:arbol
                 };



          var my_chart =  new Treant(simple_chart_config);


    </script>



  </body>
@endsection
