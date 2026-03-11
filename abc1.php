<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Access-Control-Allow-Origin: *');
date_default_timezone_set("America/La_Paz");
include("cfg.php");
include "config/config.php";

require_once(dirname(__FILE__).'/class/class.phpmailer.php');
require_once(dirname(__FILE__).'/lib/Exception.php');
require_once(dirname(__FILE__).'/lib/PHPMailer.php');
require_once(dirname(__FILE__).'/lib/SMTP.php');



$call=$_GET['nombre'];


switch ($call) {

	
	case 'correo':
		$U_NroTicket__='123456';
		$u_sucursal='Sucursal 14';
		$peso_neto=1000;
      


		$buscar_importaciones= query_importaciones("SELECT cc.* FROM boleta_transporte cc");

		if(count($buscar_importaciones)>0){
		   $peso_sap= $buscar_importaciones[0]['Peso'];
		   $codigo_bt= $buscar_importaciones[0]['Codigo'];
		   $Balanza= $buscar_importaciones[0]['Balanza'];
		  
			if($u_sucursal==$Balanza){


			   $peso_dife = $peso_neto-$peso_sap;
			 //  echo $peso_dife;

			 //  if($peso_dife>100){

   
				   $fecha=date('Y-m-d H:i:s');
				   $dedx_boleta= query_importaciones("update boleta_transporte  cc  set  
				   cc.FechaModificacionBalanza='$fecha',
				   cc.Peso_Neto_Balanza='$peso_neto', 
				   cc.Peso_diferencia='$peso_dife',
				   cc.EstadoBoletaBalanza=1 
				   where cc.Balanza='$Balanza'");
   
   
				   $arrayy=array();
				   $arrayy['U_NroTicket']=$U_NroTicket__;
				   $arrayy['codigo_bt']=$codigo_bt;
				   $arrayy['peso_sap']= $peso_sap;
				   $arrayy['peso_neto']=$peso_neto;
				   $arrayy['peso_dife']=$peso_dife;
				   $arrayy['balanza']=$Balanza;
		   
   
				  $en_correo= correo_peso_balanza_logistica($arrayy);
               //   echo $en_correo;
   
			//    }else{
				 
   
			// 	   $fecha=date('Y-m-d H:i:s');
			// 	   $dedx_boleta= query_importaciones("update boleta_transporte  cc  set  
			// 	   cc.FechaModificacionBalanza='$fecha',
			// 	   cc.Peso_Neto_Balanza='$peso_neto', 
			// 	   cc.Peso_diferencia='$peso_dife'
			// 	   where cc.Balanza='$Balanza'");
			// 	   echo $en_correo;
			//    }


			}
		}

    break;
}








function is_valid_email($str)
{
  $matches = null;
  return (1 === preg_match('/^[A-z0-9\\._-]+@[A-z0-9][A-z0-9-]*(\\.[A-z0-9_-]+)*\\.([A-z]{2,6})$/', $str, $matches));
}


function query($sql){
	$conn =  mysqli_connect(host,user,pass,db);
	if ($conn->connect_error) {
		trigger_error('Database connection failed: '  . $conn->connect_error, E_USER_ERROR);
	}
	mysqli_query($conn,"SET NAMES 'utf8'");
	if (strpos($sql, 'insert') !== false) {
		mysqli_query($conn,$sql);
		$last_id = mysqli_insert_id($conn);
		return $last_id;
	}
	if (strpos($sql, 'update') !== false|strpos($sql, 'delete') !== false) {
		$result = $conn->query($sql);
		return $result;
	}
	$result=mysqli_query($conn,$sql);
	$arr = array();
	if($result === false) {
		trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
	} else {
		$result->data_seek(0);
		while($row = $result->fetch_assoc()){
			$arr[] = $row;
		}
	}
	return $arr;
}


function query_importaciones($sql){
	$conn =  mysqli_connect(host_importaciones,user_importaciones,pass_importaciones,db_importaciones);
	if ($conn->connect_error) {
		trigger_error('Database connection failed: '  . $conn->connect_error, E_USER_ERROR);
	}
	mysqli_query($conn,"SET NAMES 'utf8'");
	if (strpos($sql, 'insert') !== false) {
		mysqli_query($conn,$sql);
		$last_id = mysqli_insert_id($conn);
		return $last_id;
	}
	if (strpos($sql, 'update') !== false|strpos($sql, 'delete') !== false) {
		$result = $conn->query($sql);
		return $result;
	}
	$result=mysqli_query($conn,$sql);
	$arr = array();
	if($result === false) {
		trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
	} else {
		$result->data_seek(0);
		while($row = $result->fetch_assoc()){
			$arr[] = $row;
		}
	}
	return $arr;
}





function query_soli($sql){
	$conn =  mysqli_connect(DB_HOST_soli,DB_USER_soli,DB_PASS_soli,DB_NAME_soli);
	if ($conn->connect_error) {
		trigger_error('Database connection failed: '  . $conn->connect_error, E_USER_ERROR);
	}
	mysqli_query($conn,"SET NAMES 'utf8'");
	if (strpos($sql, 'insert') !== false) {
		mysqli_query($conn,$sql);
		$last_id = mysqli_insert_id($conn);
		return $last_id;
	}
	if (strpos($sql, 'update') !== false|strpos($sql, 'delete') !== false) {
		$result = $conn->query($sql);
		return $result;
	}
	$result=mysqli_query($conn,$sql);
	$arr = array();
	if($result === false) {
		trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
	} else {
		$result->data_seek(0);
		while($row = $result->fetch_assoc()){
			$arr[] = $row;
		}
	}
	return $arr;
}






function setSesion1($var,$value){
	clearSesion1($var);
	$_SESSION[$var]=$value;
}
function getSesion1($var){
	if(isset($_SESSION[$var])){
		return $_SESSION[$var];
	}
	return null;
}
function clearSesion1($var){
	if(isset($_SESSION[$var])){
		unset($_SESSION[$var]);
	}
}

function queryy($sql){
	$conn =  mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
	if ($conn->connect_error) {
		trigger_error('Database connection failed: '  . $conn->connect_error, E_USER_ERROR);
	}
	mysqli_query($conn,"SET NAMES 'utf8'");
	if (strpos($sql, 'insert') !== false) {
		mysqli_query($conn,$sql);
		$last_id = mysqli_insert_id($conn);
		return $last_id;
	}
	if (strpos($sql, 'update') !== false|strpos($sql, 'delete') !== false) {
		$result = $conn->query($sql);
		return $result;
	}
	$result=mysqli_query($conn,$sql);
	$arr = array();
	if($result === false) {
		trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
	} else {
		$result->data_seek(0);
		while($row = $result->fetch_assoc()){
			$arr[] = $row;
		}
	}
	return $arr;
}

function getHora(){
	return date("H:i:s");
}
function getFecha(){
	return date("Y-m-d");
}
function getTime(){
	return date("Y-m-d H:i:s");
}
function hanas($sql){
	$datasource = "HANA32";
	//$servername = "192.168.0.18:30015";
	$servername="hanab1:30015";
	$username = "INTEGRATOR";
	$password = "Lo%10Mandamiento%";
	$conn = odbc_connect("Driver=HDBODBC32;ServerNode=$servername;Database=".server_db.";CHAR_AS_UTF8=1", $username, $password);
	if (!($conn)) {
		exit("Connection Failed: " . $conn);
	} else {
		$odbc_result  = odbc_exec($conn,$sql);
		if (!$odbc_result) {
			exit("Error in SQL");
		}
		return getArray($odbc_result);
		odbc_close($conn);
	}
	return null;
}



function hanaquery($sql){
	$res=hanas("CALL \"".server_db."\".\"SP_INT_QUERY\"('$sql');");
	return $res;
}



function hanacall($sql){
	$res=hanas("CALL \"".server_db."\".$sql");
	return $res;
}


function getMax($table){
	$res=hanaquery('select max(TO_INT("Code")) as MAX from "@'.$table.'"');
	$code=isset($res[0]['MAX'])?$res[0]['MAX']:0;
	$code=intval($code)+1;
	return $code;
}
function loger($data,$usuario,$idSesion, $userr){
	$idSesion=posted('idSesion');
	$code=getMax('BALANZA_LOG');
	$url=mainUrl.'U_BALANZA_LOG';
	$res=callApis('POST',$url,array("Code"=>$code,
		"Name"=>$code,
		"U_NroTicket" => $data[0]['U_NroTicket'],
		"U_Estado" => $data[0]['U_Estado'],
		"U_IdUsuario" =>$usuario,
		"U_Bruto" =>$data[0]['U_Bruto'],
		"U_Tara" =>$data[0]['U_Tara'],
		"U_Neto" => $data[0]['U_Neto'],
		"U_Fecha" => date("Y-m-d"),
		"U_Hora" => date("H:i:s")),$idSesion, $userr);
	$res=json_decode($res,TRUE);
	return isset($res['U_NroTicket']);
}






function callApis($type,$url,$params,$idSesion,$usuario){
	if($idSesion!=null){
		$header=array('Content-type: application/json;odata=minimalmetadata;charset=utf8\r\n',"Cookie: B1SESSION=$idSesion; ROUTEID=.node0");
	}else{
		$header=array('Content-type: application/json;odata=minimalmetadata;charset=utf8\r\n');
	}
	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => $url,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_SSL_VERIFYPEER => false,
		CURLOPT_SSL_VERIFYHOST => false,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => $type,
		CURLOPT_POSTFIELDS =>json_encode($params),
		CURLOPT_HTTPHEADER => $header,
		));
	curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($params));
	$response = curl_exec($curl);
	$data=json_decode($response,TRUE);
	$dato=getTime();
	$dbsql=server_db;


	if(isset($data['error'])){
		query("insert into errores value(null,'$response','$dato','$dbsql' ,'$usuario','$url')");
		return false;
	}else{
	  query("insert into errores value(null,'$response','$dato','$dbsql' ,'$usuario','$url')");
		return $response;
	}
}







function callApiss($type,$url,$params,$idSesion,$usuario){
	if($idSesion!=null){
		$header=array('Content-type: application/json;odata=minimalmetadata;charset=utf8\r\n',"Cookie: B1SESSION=$idSesion; ROUTEID=.node0");
	}else{
		$header=array('Content-type: application/json;odata=minimalmetadata;charset=utf8\r\n');
	}
	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => $url,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_SSL_VERIFYPEER => false,
		CURLOPT_SSL_VERIFYHOST => false,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => $type,
		CURLOPT_POSTFIELDS =>json_encode($params),
		CURLOPT_HTTPHEADER => $header,
		));
	curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($params));
	$response = curl_exec($curl);
	$data=json_decode($response,TRUE);
	$dato=getTime();
	$dbsql=server_db;
	$data_param=json_encode($params);
	$estado_balanza = $params['U_Estado'];
	$u_sucursal = $params['U_Sucursal'];
	if(isset($data['error'])){
		query("insert into errores value(null,'$response','$dato','$dbsql' ,'$usuario','$url','$data_param', $estado_balanza)");
		return false;
	}else{

	//	if($estado_balanza==2){
		 $peso_neto=$params['U_Neto'];
		 $U_NroTicket__=$params['U_NroTicket'];
		// $buscar_importaciones= query_importaciones("SELECT cc.* FROM boleta_transporte cc  WHERE cc.Ticket='$U_NroTicket__'");
		 $buscar_importaciones= query_importaciones("SELECT cc.* FROM boleta_transporte cc");

		 if(count($buscar_importaciones)>0){
            $peso_sap= $buscar_importaciones[0]['Peso'];
			$codigo_bt= $buscar_importaciones[0]['Codigo'];
			$Balanza= $buscar_importaciones[0]['Balanza'];

             if($u_sucursal==$Balanza){


				$peso_dife = $peso_neto-$peso_sap;
				if($peso_dife>100){
					// $dedx_boleta= query_importaciones("update boleta_transporte  cc  set  
					// cc.Peso_Neto_Balanza='$peso_neto', 
					// cc.Peso_diferencia='$peso_dife',
					// cc.EstadoBoletaBalanza=1
					// where  cc.Ticket='$U_NroTicket__'");
	
					$fecha=date('Y-m-d H:i:s');
					$dedx_boleta= query_importaciones("update boleta_transporte  cc  set  
					cc.FechaModificacionBalanza='$fecha',
					cc.Peso_Neto_Balanza='$peso_neto', 
					cc.Peso_diferencia='$peso_dife',
					cc.EstadoBoletaBalanza=1 
					where cc.Balanza='$Balanza'");
	
	
					$arrayy=array();
					$arrayy['U_NroTicket']=$U_NroTicket__;
					$arrayy['codigo_bt']=$codigo_bt;
					$arrayy['peso_sap']= $peso_sap;
					$arrayy['peso_neto']=$peso_neto;
					$arrayy['peso_dife']=$peso_dife;
					$arrayy['balanza']=$Balanza;
			
	
				 //  $en_correo= correo_peso_balanza_logistica($arrayy);
	
	
				}else{
					// $dedx_boleta= query_importaciones("update boleta_transporte  cc  set  
					// cc.Peso_Neto_Balanza='$peso_neto', 
					// cc.Peso_diferencia='$peso_dife'
					// where  cc.Ticket='$U_NroTicket__'");
	
					$fecha=date('Y-m-d H:i:s');
					$dedx_boleta= query_importaciones("update boleta_transporte  cc  set  
					cc.FechaModificacionBalanza='$fecha',
					cc.Peso_Neto_Balanza='$peso_neto', 
					cc.Peso_diferencia='$peso_dife'
					where cc.Balanza='$Balanza'");
				}


			 }
		 }


	//	}


	  query("insert into errores value(null,'$response','$dato','$dbsql' ,'$usuario','$url','$data_param', $estado_balanza)");
		return $response;
	}
}







function callPost($url,$params,$idSesion){
	if($idSesion!=null){
		$header=array('Content-type: application/json;odata=minimalmetadata;charset=utf8\r\n',"Cookie: B1SESSION=$idSesion; ROUTEID=.node0");
	}else{
		$header=array('Content-type: application/json;odata=minimalmetadata;charset=utf8\r\n');
	}
	$res=@file_get_contents($url, false, stream_context_create([
		"ssl"=>[
		"verify_peer"=>false,
		"verify_peer_name"=>false,
		],
		'http' => [
		'method' => 'POST',
		'header'  => $header,
		'content' => json_encode($params)
		]
		]));
	return $res;
}



function getArray($odbc_result){
	$array=[];
	while($row = odbc_fetch_array( $odbc_result )){ 
		$array[] = $row;
	}
	return $array;
}




function posted($key){
	$cur=$_POST[$key];
	$cur=str_replace('"', '\"', $cur);
	$cur=str_replace("'", "\'", $cur);
	return $cur;
}





function convertirMonto($montox) 
{
	$monto = floor($montox);  
	$unidad            = array(1=>"uno", 2=>"dos", 3=>"tres", 4=>"cuatro", 5=>"cinco", 6=>"seis", 7=>"siete", 8=>"ocho", 9=>"nueve");
	$decena            = array(10=>"diez", 11=>"once", 12=>"doce", 13=>"trece", 14=>"catorce", 15=>"quince", 20=>"veinte", 30=>"treinta", 40=>"cuarenta", 50=>"cincuenta", 60=>"sesenta", 70=>"setenta", 80=>"ochenta", 90=>"noventa");
	$prefijo_decena    = array(10=>"dieci", 20=>"veinti", 30=>"treinta y ", 40=>"cuarenta y ", 50=>"cincuenta y ", 60=>"sesenta y ", 70=>"setenta y ", 80=>"ochenta y ", 90=>"noventa y ");
	$centena           = array(100=>"cien", 200=>"doscientos", 300=>"trescientos", 400=>"cuantrocientos", 500=>"quinientos", 600=>"seiscientos", 700=>"setecientos", 800=>"ochocientos", 900=>"novecientos");	
	$prefijo_centena   = array(100=>"ciento ", 200=>"doscientos ", 300=>"trescientos ", 400=>"cuantrocientos ", 500=>"quinientos ", 600=>"seiscientos ", 700=>"setecientos ", 800=>"ochocientos ", 900=>"novecientos ");
	$sufijo_miles      = "mil";
	$sufijo_millon     = "un millon";
	$sufijo_millones   = "millones";

	$base         = strlen(strval($monto));
	$pren         = intval(floor($monto/pow(10,$base-1)));
	$prencentena  = intval(floor($monto/pow(10,3)));
	$prenmillar   = intval(floor($monto/pow(10,6)));
	$resto        = $monto%pow(10,$base-1);
	$restocentena = $monto%pow(10,3);
	$restomillar  = $monto%pow(10,6);
	
	if (!$monto) return "";
	
	if ($monto>0) 
	{            
		switch ($base) {
			case 1: return $unidad[$monto];
			case 2: return array_key_exists((int)$monto, $decena)  ? $decena[$monto]  : $prefijo_decena[$pren*10]   . convertirMonto($resto);
			case 3: return array_key_exists((int)$monto, $centena) ? $centena[$monto] : $prefijo_centena[$pren*100] . convertirMonto($resto);
			case 4: case 5: case 6: return ($prencentena>1) ? convertirMonto($prencentena). " ". $sufijo_miles . " " . convertirMonto($restocentena) : $sufijo_miles. " " . convertirMonto($restocentena);
			case 7: case 8: case 9: return ($prenmillar>1)  ? convertirMonto($prenmillar). " ". $sufijo_millones . " " . convertirMonto($restomillar)  : $sufijo_millon. " " . convertirMonto($restomillar);
		}
	} else {
		echo "ERROR con el numero - $monto<br/> Debe ser un numero entero menor que " . number_format($maximo, 0, ".", ",") . ".";
	}
	return $texto;
}
















function correo_peso_balanza_logistica($params){

	$U_NroTicket__ = $params['U_NroTicket'];
	$codigo_bt=$params['codigo_bt'];
	$peso_sap=$params['peso_sap'];
	$peso_neto=$params['peso_neto'];
	$peso_dife=$params['peso_dife'];
	$balanza=$params['balanza'];

	$me1='<table border="1" width="100%" cellpadding="5" cellspacing="5">
	<tr>				
		<td width="10%" style="    text-align: center;">#</td>
		<td width="30%" style="    text-align: center;">Peso Neto Balanza</td>
		<td width="30%" style="    text-align: center;">Peso Sistema</td>
		<td width="30%" style="    text-align: center;">Peso Diferencia</td>
		
	</tr>';

	$detyy='<tr>		
	 
			<td width="10%" style="    text-align: center;">1</td>
		   <td width="30%" style="    text-align: center;">'.$peso_neto.'</td>
		   <td width="30%" style="    text-align: center;">'.$peso_sap.'</td>
		   <td width="30%" style="    text-align: center;">'.$peso_dife.'</td>
	   
	   
			</tr>';

	$message = '';

      $lista_personal_enviar_email=query_soli("SELECT cc.IdUsuario,  cc.NombreUsuario, cc.Usuario, cc.Email FROM usuario cc WHERE cc.ECImportacion=1 AND cc.Estado=1");
      if(count($lista_personal_enviar_email)>0){

		for($ilc=0; $ilc<count($lista_personal_enviar_email); $ilc++)
		{
		  $IdUsuario= $lista_personal_enviar_email[$ilc]['IdUsuario'];
		  $NombreUsuario= $lista_personal_enviar_email[$ilc]['NombreUsuario'];
		  $Email= $lista_personal_enviar_email[$ilc]['Email'];
		
		  $message = '
		  <h3 align="center">Balanza '.$balanza.'</h3>
		  <h3 align="center">Detalle del Ticket Balanza '.$U_NroTicket__.' Observado</h3>
		  <h3 align="center">Boleta Transporte '.$codigo_bt.' Observado</h3>
		  <h3 align="center">Usuario: '.$NombreUsuario.'</h3>

		  '.$me1.'
		  '.$detyy.'
		  
		  </table>';


		  if(is_valid_email($Email)){

			$mail = new PHPMailer;
			$mail->IsSMTP();	
			$mail->CharSet   = 'UTF-8';
			$mail->Encoding  = 'base64';							//Sets Mailer to send message using SMTP
			$mail->Host = 'mail.monterreysrl.com.bo';		
			$mail->Port = 587;								//Sets the default SMTP server port
			$mail->SMTPAuth = true;							//Sets SMTP authentication.
			$mail->Username = 'soportetic@monterreysrl.com.bo';					//Sets SMTP username
			$mail->Password = 'sssTTT123';					//Sets SMTP password
			$mail->SMTPSecure = '';							//Sets connection prefix. Options are "", "ssl" or "tls"
			$mail->From = 'soportetic@monterreysrl.com.bo';					//Sets the From email address for the message
			$mail->FromName = 'Detalle del Ticket Balanza '.$U_NroTicket__;			//Sets the From name of the message
			$mail->AddAddress($Email,$NombreUsuario);		//Adds a "To" address
			$mail->WordWrap = 50;							
			$mail->IsHTML(true);							//Sets message type to HTML
			$mail->Subject = 'Detalle del Ticket Balanza '.$U_NroTicket__;			//Sets the Subject of the message
			$mail->Body = $message;
			if (!$mail->send()) {
				$fecha=date('Y-m-d H:i:s');
				//no se envio
				$insert_detalle= query_importaciones("insert into correo_peso_balanza
				(IdUsuario, FechaRegistro, EstadoEnvio, Detalle, TicketB) 
				values 
				($IdUsuario,'$fecha',0, '$message','$U_NroTicket__')");
			} else {
				$fecha=date('Y-m-d H:i:s');
				//enviado
				$insert_detalle= query_importaciones("insert into correo_peso_balanza
				(IdUsuario, FechaRegistro, EstadoEnvio, Detalle, TicketB) 
				values 
				($IdUsuario,'$fecha',1, '$message','$U_NroTicket__')");
			}
		}



		}


	  }
 	  return 1;

 }


















?>