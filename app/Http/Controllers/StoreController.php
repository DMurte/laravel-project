<?php

namespace App\Http\Controllers;

use App\User;
use App\Bricks;
use Payu;
use Auth;
use App\Transaction;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class StoreController extends Controller
{


    public function view_all()
    {
		$productos = Bricks::paginate(9);

        return view('pages.store',compact('productos'));
    }

    public function view_one($id){


      $producto = Bricks::find($id);
      /*$transaccion = new Transaction;
      $transaccion->user_id = Auth::user()->id;
      $transaccion->status = 0;
      $transaccion->bricks = $producto->price;
      $transaccion->type = $producto->tipo;
      $transaccion->save();*/
      return view('pages.storeid')->with('producto',$producto);
    }

    public function buy($id){

      $producto = Bricks::find($id);
      $transaccion = new Transaction;
      $transaccion->user_id = Auth::user()->id;
      $transaccion->status = 0;
      $transaccion->bricks = $producto->price;
      $transaccion->type = $producto->tipo;
      $transaccion->packages_id = $producto->id;
      $transaccion->cantidad = $producto->cantidad;
      $transaccion->titulo = $producto->title;
      $transaccion->save();



      $referenceCode = $transaccion->id;
      //$referenceCode = "TestPayU";
      $apiKey = 'ZOMhRfJc08dw0aG59J2gDI7uM4';
      //$apiKey = '4Vj8eK4rloUd272L48hsrarnUA';

      $merchantId = 629744;
      //$merchantId = 508029; // pruebas sandbox

      $accountId = 632079;
      //$accountId = 512321;

      $amount = str_replace(".", "", $producto->price);
      //$amount = 3;

      $currency = "COP";
      //$currency =  "USD";

      $buyerEmail = Auth::user()->email;
      $signature = md5($apiKey."~".$merchantId."~".$referenceCode."~".$amount.'~'.$currency);
      $produccion = "https://gateway.payulatam.com/ppp-web-gateway/";
      $desarrollo = "https://sandbox.gateway.payulatam.com/ppp-web-gateway";


      echo '<form action="'.$produccion.'" method="POST" id="payForm" name="payForm">
        <input type="hidden" name="merchantId" value="'.$merchantId.'">
        <input type="hidden" name="accountId" value="'.$accountId.'">
        <input type="hidden" name="description" value="'.$producto->title.' - '.$producto->tipos->descripcion.' - '.$producto->price.'">
        <input type="hidden" name="referenceCode" value="'.$referenceCode.'">
        <input type="hidden" name="amount" value="'.$amount.'">
        <input type="hidden" name="tax" value="0">
        <input type="hidden" name="taxReturnBase" value="0">
        <input type="hidden" name="shipmentValue" value="0">
        <input type="hidden" name="currency" value="COP">
        <input type="hidden" name="lng" value="es">
        <input type="hidden" name="test" value="0">
        <input type="hidden" name="buyerEmail" value="'.$buyerEmail.'">
        <input type="hidden" name="sourceUrl" value="http://mircolombia.com/store/verificar">
        <input type="hidden" name="buttonType" value="SIMPLE">
        <input type="hidden" name="signature" value="'.$signature.'">
        <input style="display:none;" type="image" border="0" id="formButton" src="http://www.payulatam.com/img-secure-2015/boton_pagar_pequeno.png" onclick="this.form.urlOrigen.value = window.location.href;">
      </form>';

      echo '<script language="javascript">
        document.getElementById("formButton").click();
    </script>';
    }


public function verificar(){


$ApiKey = "ZOMhRfJc08dw0aG59J2gDI7uM4";
$merchant_id = $_REQUEST['merchantId'];
$referenceCode = $_REQUEST['referenceCode'];
$TX_VALUE = $_REQUEST['TX_VALUE'];
$New_value = number_format($TX_VALUE, 1, '.', '');
$currency = $_REQUEST['currency'];
$transactionState = $_REQUEST['transactionState'];
$firma_cadena = "$ApiKey~$merchant_id~$referenceCode~$New_value~$currency~$transactionState";
$firmacreada = md5($firma_cadena);
$firma = $_REQUEST['signature'];
$reference_pol = $_REQUEST['reference_pol'];
$cus = $_REQUEST['cus'];
$extra1 = $_REQUEST['description'];
$pseBank = $_REQUEST['pseBank'];
$lapPaymentMethod = $_REQUEST['lapPaymentMethod'];
$transactionId = $_REQUEST['transactionId'];

if ($_REQUEST['transactionState'] == 4 ) {

	$estadoTx = "Transacción aprobada";

  $user = Network::where('user_id','=',Auth::user()->id)->first();
  $padre_directo = Network::where('id','=',$user->parent_id)->first();

  $settings = Settings::findOrFail('1');
  $direct_percentage = $settings->direct_commission;
  $indirect_percentage = $settings->indirect_commission;
  $producto = Bricks::where('price','=',$TX_VALUE);

  $direct_commission = ($direct_percentage/100)*($producto->cantidad);
  $indirect_commission = ($indirect_percentage/100)*($producto->cantidad);

  if(!empty($padre_directo->id)){

    $transaccion = new Transaction;
    $transaccion->user_id = $padre_directo->user_id;
    $transaccion->status = 1;
    $transaccion->bricks = '-';
    $transaccion->type = 5;
    $transaccion->packages_id = 0;
    $transaccion->cantidad =$direct_commission;
    $transaccion->titulo ='Comisión por'.Auth::user()->name;
    $transaccion->save();

    $padre_indirecto = Network::where('id','=',$padre_directo->parent_id)->first();

      if(!empty($padre_indirecto->id)){

        $transaccion = new Transaction;
        $transaccion->user_id = $padre_indirecto->user_id;
        $transaccion->status = 1;
        $transaccion->bricks = '-';
        $transaccion->type = 6;
        $transaccion->packages_id = 0;
        $transaccion->cantidad =$indirect_commission;
        $transaccion->titulo ='Comisión por'.Auth::user()->name;
        $transaccion->save();

        $padre_indirecto_2 = Network::where('id','=',$padre_indirecto->parent_id)->first();

        if(!empty($padre_indirecto_2->id)){

          $transaccion = new Transaction;
          $transaccion->user_id = $padre_indirecto_2->user_id;
          $transaccion->status = 1;
          $transaccion->bricks = '-';
          $transaccion->type = 6;
          $transaccion->packages_id = 0;
          $transaccion->cantidad =$indirect_commission;
          $transaccion->titulo ='Comisión por'.Auth::user()->name;
          $transaccion->save();

      }
    }
  }
}

else if ($_REQUEST['transactionState'] == 6 ) {
	$estadoTx = "Transacción rechazada";
}

else if ($_REQUEST['transactionState'] == 104 ) {
	$estadoTx = "Error";
}

else if ($_REQUEST['transactionState'] == 7 ) {
	$estadoTx = "Transacción pendiente";
}

else {
	$estadoTx=$_REQUEST['mensaje'];
}


if (strtoupper($firma) == strtoupper($firmacreada)) {
?>
	<h2>Resumen Transacción</h2>
	<table>
	<tr>
	<td>Estado de la transaccion</td>
	<td><?php echo $estadoTx; ?></td>
	</tr>
	<tr>
	<tr>
	<td>ID de la transaccion</td>
	<td><?php echo $transactionId; ?></td>
	</tr>
	<tr>
	<td>Referencia de la venta</td>
	<td><?php echo $reference_pol; ?></td>
	</tr>
	<tr>
	<td>Referencia de la transaccion</td>
	<td><?php echo $referenceCode; ?></td>
	</tr>
	<tr>
	<?php
	if($pseBank != null) {
	?>
		<tr>
		<td>cus </td>
		<td><?php echo $cus; ?> </td>
		</tr>
		<tr>
		<td>Banco </td>
		<td><?php echo $pseBank; ?> </td>
		</tr>
	<?php
	}
	?>
	<tr>
	<td>Valor total</td>
	<td>$<?php echo number_format($TX_VALUE); ?></td>
	</tr>
	<tr>
	<td>Moneda</td>
	<td><?php echo $currency; ?></td>
	</tr>
	<tr>
	<td>Descripción</td>
	<td><?php echo ($extra1); ?></td>
	</tr>
	<tr>
	<td>Entidad:</td>
	<td><?php echo ($lapPaymentMethod); ?></td>
	</tr>
	</table>
<?php
}
else
{
?>
	<h1>Error validando firma digital.</h1>
<?php
} //fin espagueti



    }


    public function EstadoTransacciones(){

      $data ='{
           "test": false,
           "language": "en",
           "command": "ORDER_DETAIL_BY_REFERENCE_CODE",
           "merchant": {
              "apiLogin": "T102JZRA926hzg9",
              "apiKey": "ZOMhRfJc08dw0aG59J2gDI7uM4"
           },
           "details": {
              "referenceCode": "57"
           }
        }';
      $data_string = ($data);
      $ch = curl_init('https://api.payulatam.com/reports-api/4.0/service.cgi');
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
      curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_HTTPHEADER, array(
          'Content-Type: application/json',
          'Content-Length: ' . strlen($data_string))
      );
      echo $result = curl_exec($ch);
      //var_dump($result);



    }



}
