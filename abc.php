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


function query_entrega_db($sql){
	$conn =  mysqli_connect(host_importaciones,user_importaciones,pass_importaciones,db_entrega);
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






// function hanas($sql){
// 	$datasource = "HANA64";
// 	$servername = "192.168.0.18:30015";
// 	$username = "INTEGRATOR";
// 	$password = "Lo%10Mandamiento%";
// 	$conn = odbc_connect("Driver=HDBODBC32;ServerNode=$servername;Database=".server_db.";CHAR_AS_UTF8=1", $username, $password);
// 	if (!($conn)) {
// 		exit("Connection Failed: " . $conn);
// 	} else {
// 		$odbc_result  = odbc_exec($conn,$sql);
// 		if (!$odbc_result) {
// 			exit("Error in SQL");
// 		}
// 		return getArray($odbc_result);
// 		odbc_close($conn);
// 	}
// 	return null;
// }





function hanas($sql){
	$datasource = "HANA64";
	//$servername = "192.168.0.18:30015";
	$servername="hanab1:30015";
	$username = "INTEGRATOR";
	$password = "Lo%10Mandamiento%";
	$conn = odbc_connect("Driver=HDBODBC;ServerNode=$servername;Database=".server_db.";CHAR_AS_UTF8=1", $username, $password);
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
	
	$datoo=getTime();
	$daty= json_encode($params);
	$dbsqll=server_db;

	query("insert into callapis_info  (JSON,  FechaRegistro, Base, tipo, url, user)
	value('$daty', '$datoo', '$dbsqll', '$type', '$url', '$usuario')");
	
	
	if($idSesion!=null){
		$header=array('Content-type: application/json;odata=minimalmetadata;charset=utf8\r\n',"Cookie: B1SESSION=$idSesion; ROUTEID=.node0");
		query("insert into callapis_info  (JSON,  FechaRegistro, Base, tipo, url, user, validar_session)
		value('$daty', '$datoo', '$dbsqll', '$type', '$url', '$usuario',1)");
	}else{
		$header=array('Content-type: application/json;odata=minimalmetadata;charset=utf8\r\n');
		query("insert into callapis_info  (JSON,  FechaRegistro, Base, tipo, url, user, validar_session)
		value('$daty', '$datoo', '$dbsqll', '$type', '$url', '$usuario',0)");
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

     query("insert into callapis_info  (JSON,  FechaRegistro, Base, tipo, url, user)
	 value('$response', '$dato', '$dbsql', '$type', '$url', '$usuario')");


	if(isset($data['error'])){
		query("insert into errores value(null,'$response','$dato','$dbsql' ,'$usuario','$url')");
		return false;
	}else{
	  query("insert into errores value(null,'$response','$dato','$dbsql' ,'$usuario','$url')");
		return $response;
	}
}





function callApis_logout($type,$url,$params,$idSesion,$usuario){
	
	$datoo=getTime();
	$daty= json_encode($params);
	$dbsqll=server_db;

	query("insert into callapis_info  (JSON,  FechaRegistro, Base, tipo, url, user)
	value('$daty', '$datoo', '$dbsqll', '$type', '$url', '$usuario')");

    $header=array('Content-Type: application/json','Cookie: ROUTEID=.node3');

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

     query("insert into callapis_info  (JSON,  FechaRegistro, Base, tipo, url, user)
	 value('$response', '$dato', '$dbsql', '$type', '$url', '$usuario')");


	if(isset($data['error'])){
		query("insert into errores value(null,'$response','$dato','$dbsql' ,'$usuario','$url')");
		return false;
	}else{
	  query("insert into errores value(null,'$response','$dato','$dbsql' ,'$usuario','$url')");
		return $response;
	}
}




function callApis_invoce($type,$url,$params,$idSesion,$usuario){
	
	$datoo=getTime();
	$daty= json_encode($params);
	$dbsqll=server_db;

	query("insert into callapis_info  (JSON,  FechaRegistro, Base, tipo, url, user)
	value('$daty', '$datoo', '$dbsqll', '$type', '$url', '$usuario')");
	
	
	if($idSesion!=null){
		$header=array('Content-type: application/json;odata=minimalmetadata;charset=utf8\r\n',"Cookie: B1SESSION=$idSesion; ROUTEID=.node0");
		query("insert into callapis_info  (JSON,  FechaRegistro, Base, tipo, url, user, validar_session)
		value('$daty', '$datoo', '$dbsqll', '$type', '$url', '$usuario',1)");
	}else{
		$header=array('Content-type: application/json;odata=minimalmetadata;charset=utf8\r\n');
		query("insert into callapis_info  (JSON,  FechaRegistro, Base, tipo, url, user, validar_session)
		value('$daty', '$datoo', '$dbsqll', '$type', '$url', '$usuario',0)");
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

     query("insert into callapis_info  (JSON,  FechaRegistro, Base, tipo, url, user,Data )
	 value('$response', '$dato', '$dbsql', '$type', '$url', '$usuario', '$data')");

	 
	if(isset($data['DocEntry'])){
		return $response;
	}else{
		return 0;
	}
}




function callApiss($type,$url,$params,$idSesion,$usuario, $sucursal, $code){
	$datoo=getTime();
	$texto1 = '';
	$daty= json_encode($params);
	$estado_balanza = $params['U_Estado'];
	$dbsqll=server_db;

	query("insert into control_ticket  ( JSON, FechaRegistro, POSI,Base, tipo, Sucursal, code, Estado)
		value('$daty','$datoo',1, '$dbsqll', '$type', '$sucursal', '$code', '$estado_balanza')");



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

	query("insert into control_ticket  (JSON,  FechaRegistro, POSI)
	value('$response', '$datoo',2)");



	if(isset($data['error'])){
		query("insert into errores value(null,'$response','$dato','$dbsql' ,'$usuario','$url','',0)");
		return false;
	}else{
		query("insert into control_ticket  (JSON,  FechaRegistro, POSI)
		value('$response', '$datoo',3)");

		if($estado_balanza==2){
			$peso_sap=0;
			$peso_neto=0;
			$u_sucursal='';
			$texto = '';
			$U_NroTicket__ ='';

			$daty= json_encode($params);
			
			$datos_relevantes_sucursal = query_importaciones("SELECT cc.Id, cc.Descripcion, cc.Detalle, cc.Estado FROM datos_relevantes cc WHERE cc.Id IN (1) AND cc.Estado=1");
			if(count($datos_relevantes_sucursal)>0){
				query("insert into control_ticket  (JSON,  FechaRegistro, POSI)
				value('$response', '$datoo',4)");

				$u_sucursal= $datos_relevantes_sucursal[0]['Detalle'];
				$texto = strtolower($u_sucursal);
				$texto1 = strtolower($sucursal);
				$sucuo=$texto.' '.$texto1;

				$old=hanaquery('select * from "@BALANZA" where "Code"=\'\''.$code.'\'\'');
				foreach ($old as $row) {
					$peso_neto=$row['U_Neto'];  
					$U_NroTicket__ =  $row['U_NroTicket'];
				}
	
			 query("insert into json_datos  (Reponse, Base, Usuario, fecharegistro, ticket, Detalle, EstadoTicket, Detalle1, Result)
			 value('$daty','$dbsql' ,'$usuario', '$dato', '$peso_neto', '', $estado_balanza, '$sucuo', '$response')");
	 
			 $res_monto=hanaquery('select TX."U_MONTOMAX" FROM "@PARAMETROS"  TX WHERE TX."Code" = 0024 AND TX."U_Activo" = 1');
			 $code_monto=isset($res_monto[0]['U_MONTOMAX'])?$res_monto[0]['U_MONTOMAX']:0;
	 
		 
		 
				 $bolop= "SELECT cc.* FROM boleta_transporte cc where cc.Ticket='$U_NroTicket__'";
				 $buscar_importaciones= query_importaciones($bolop);
				 if(count($buscar_importaciones)>0){
				   


	 
				$peso_sap= $buscar_importaciones[0]['Peso'];
				$codigo_bt= $buscar_importaciones[0]['Codigo'];
			    $id_boleta= $buscar_importaciones[0]['Id'];
			    $Balanza= $buscar_importaciones[0]['Balanza'];				
			    $Balanza = strtolower($Balanza);
	 
				$Mercaderia_info= json_decode($buscar_importaciones[0]['Mercaderia'], true);
				$Lotes_info= json_decode($buscar_importaciones[0]['Lotes'], true);

				
				
				for($ihfg=0; $ihfg<count($Mercaderia_info); $ihfg++)
				{
					$IdMercaderia=$Mercaderia_info[$ihfg]['id_'];
					$campo12=$Mercaderia_info[$ihfg]['campo12'];
					$campo10=$Mercaderia_info[$ihfg]['campo10'];
					$peso_actual=$Mercaderia_info[$ihfg]['peso_actual'];
					$dedx= query_importaciones("SELECT cc.CantidadPendiente FROM estacionguaracachi  cc WHERE cc.Id=$IdMercaderia AND cc.Estado=1");
					if(count($dedx)>0){ 
					   if($campo12==0){
						$fecha=date('Y-m-d H:i:s');
						$dedx_actualizar= query_importaciones("update estacionguaracachi  cc  set  
						 cc.CantidadPendiente= '0' , cc.FechaModificacion='$fecha' , cc.Estado=0  WHERE cc.Id=$IdMercaderia AND cc.Estado=1");
					   }else{
						$fecha=date('Y-m-d H:i:s');
						$dedx_actualizar= query_importaciones("update estacionguaracachi  cc  set   
						 cc.CantidadPendiente= '$campo12' , cc.FechaModificacion='$fecha'  WHERE cc.Id=$IdMercaderia AND cc.Estado=1");
					   }
					}
				}


				for($ihfgg=0; $ihfgg<count($Lotes_info); $ihfgg++)
				{
					$id_eg=$Lotes_info[$ihfgg]['id_'];
					$disnumber_=$Lotes_info[$ihfgg]['disnumber_'];                 
					$peso_=$Lotes_info[$ihfgg]['peso_'];   
					$datos_egeg=query_importaciones("SELECT cc.DocEntry, cc.LineNum FROM estacionguaracachi cc WHERE cc.Id=$id_eg");
					if(count($datos_egeg)>0){
						for($ilcvh=0; $ilcvh<count($datos_egeg); $ilcvh++){
						  $docentry_egeg=$datos_egeg[$ilcvh]['DocEntry'];
						  $linenum_egeg=$datos_egeg[$ilcvh]['LineNum'];
						  $datos_egeg_buscar=query_importaciones("SELECT cc.* FROM lista_lotes_aux cc WHERE cc.DocEntry='$docentry_egeg'  AND cc.LINENUM_FACTURA='$linenum_egeg' AND cc.DISTNUMBER='$disnumber_' AND cc.Estado=1");
						  if(count($datos_egeg_buscar)>0){
							$fecha=date('Y-m-d H:i:s');
							$body_datos= query_importaciones("update lista_lotes_aux  cc  set  cc.Estado=0, cc.FechaModificacion='$fecha', cc.UModificante='$usuario' 
																					WHERE cc.DocEntry='$docentry_egeg'  AND cc.LINENUM_FACTURA='$linenum_egeg' AND cc.DISTNUMBER='$disnumber_' AND cc.Estado=1");
						  }
						}
					}
				}




				if($texto1==$Balanza  &&  $estado_balanza==2){
				 $peso_dife =0;
				 $peso_dife = $peso_sap-$peso_neto;
				  if($peso_dife>=$code_monto){
	 
					 $fecha=date('Y-m-d H:i:s');
					 $dedx_boleta= query_importaciones("update boleta_transporte  cc  set  
					 cc.FechaModificacionBalanza='$fecha',
					 cc.EstadoBalanza=$estado_balanza,
					 cc.Peso_Neto_Balanza='$peso_neto', 
					 cc.Peso_diferencia='$peso_dife',
					 cc.EstadoBoletaBalanza=1 ,
					 cc.PesoMN=1,
					 cc.Estado=3
					 where cc.Ticket='$U_NroTicket__'");
	 
					 $arrayy=array();
					 $arrayy['U_NroTicket']=$U_NroTicket__;
					 $arrayy['codigo_bt']=$codigo_bt;
					 $arrayy['peso_sap']= $peso_sap;
					 $arrayy['peso_neto']=$peso_neto;
					 $arrayy['peso_dife']=$peso_dife;
					 $arrayy['balanza']=$Balanza;
					 $arrayy['id_boleta']=$id_boleta;
					 $en_correo= correo_peso_balanza_logistica($arrayy);
				  }else{
					 $peso_dife = $peso_neto-$peso_sap;
					  if($peso_dife>=$code_monto){
	 
						 $fecha=date('Y-m-d H:i:s');
						 $dedx_boleta= query_importaciones("update boleta_transporte  cc  set  
						 cc.FechaModificacionBalanza='$fecha',
						 cc.EstadoBalanza=$estado_balanza,
						 cc.Peso_Neto_Balanza='$peso_neto', 
						 cc.Peso_diferencia='$peso_dife',
						 cc.EstadoBoletaBalanza=1,
						 cc.PesoMN=2,
						 cc.Estado=3
						 where cc.Ticket='$U_NroTicket__'");
	 
						 $arrayy=array();
						 $arrayy['U_NroTicket']=$U_NroTicket__;
						 $arrayy['codigo_bt']=$codigo_bt;
						 $arrayy['peso_sap']= $peso_sap;
						 $arrayy['peso_neto']=$peso_neto;
						 $arrayy['peso_dife']=$peso_dife;
						 $arrayy['balanza']=$Balanza;
						 $arrayy['id_boleta']=$id_boleta;
						 $en_correo= correo_peso_balanza_logistica($arrayy);
					  }else{
	 
	 
						 $fecha=date('Y-m-d H:i:s');
						 $dedx_boleta= query_importaciones("update boleta_transporte  cc  set  
						 cc.FechaModificacionBalanza='$fecha',
						 cc.EstadoBalanza=$estado_balanza,
						 cc.Peso_Neto_Balanza='$peso_neto', 
						 cc.Peso_diferencia='$peso_dife',
						 cc.EstadoBoletaBalanza=0,
						 cc.Estado=3
						 where cc.Ticket='$U_NroTicket__'");
	 
	 
					  }
	 
	 
	 
		 
				  }
			  }
	 
	 
	 
				 }else{
					query("insert into control_ticket  (JSON,  FechaRegistro, POSI)
				    value('$response', '$datoo',5)");
				 }
	   
	 
	 
	 
	 
			}else {
				query("insert into control_ticket  (JSON,  FechaRegistro, POSI)
	        	value('$response', '$datoo',6)");
			}




		}

	
		
		return $response;
	}
}











// function callPost($url,$params,$idSesion){
// 	if($idSesion!=null){
// 		$header=array('Content-type: application/json;odata=minimalmetadata;charset=utf8\r\n',"Cookie: B1SESSION=$idSesion; ROUTEID=.node0");
// 	}else{
// 		$header=array('Content-type: application/json;odata=minimalmetadata;charset=utf8\r\n');
// 	}
// 	$res=@file_get_contents($url, false, stream_context_create([
// 		"ssl"=>[
// 		"verify_peer"=>false,
// 		"verify_peer_name"=>false,
// 		],
// 		'http' => [
// 		'method' => 'POST',
// 		'header'  => $header,
// 		'content' => json_encode($params)
// 		]
// 		]));
// 	return $res;
// }

function callPost($url) {
    $header = [
        'Content-type: application/json;odata=minimalmetadata;charset=utf8\r\n'
    ];

    $context = stream_context_create([
        'http' => [
            'method'  => 'POST',
            'header'  => $header,
            'content' => json_encode([]) // sin parámetros, la balanza solo devuelve el peso
        ]
    ]);

    $res = @file_get_contents($url, false, $context);

    if ($res === false) {
        return null; // error → no hay peso
    }

    return trim($res);
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

    $datoo=getTime();
	$daty= json_encode($params);
	query("insert into d_boleta  (JSON,  FechaRegistro)
	value('$daty', '$datoo')");




  $DETY='';
    $decoded_json = json_decode($daty, false);

    $id_boleta=$decoded_json->id_boleta;
	$U_NroTicket__ = $decoded_json->U_NroTicket;
	$codigo_bt=$decoded_json->codigo_bt;
	$peso_sap__=$decoded_json->peso_sap;
	$peso_neto__=$decoded_json->peso_neto;
	$peso_dife__=$decoded_json->peso_dife;
	$balanza=$decoded_json->balanza;




	$querii= query_importaciones("SELECT TT.cont, TT.Id, TT.IdMercaderia, TT.Cantidad, TT.Descripcion, TT.Comentario, TT.Foto1, TT.Foto2, TT.Foto3, TT.Foto4, TT.come, TT.estados
	FROM
	(
	(

	   SELECT (@REG:= @REG+1) AS cont, cc.Id,cc.IdMercaderia, cc.CantidadCN AS Cantidad,  ee.Descripcion, if(bb.Comentario='', 'Sin Comentario', bb.Comentario)  as Comentario ,
			'' as Foto1, '' as Foto2, '' as Foto3,  '' AS  Foto4,       'Sin Comentario' AS come,  'Sin Estados' as estados
	FROM      detallemercaderia_boleta_transporte cc 
	  INNER JOIN estacionguaracachi ee ON ee.Id= cc.IdMercaderia
   INNER JOIN boleta_transporte bb ON bb.Id= cc.IdBoleta
	
   ,
	   (SELECT @REG:=0) r
	  WHERE cc.IdBoleta=$id_boleta  AND NOT EXISTS (SELECT * FROM detalle_item df WHERE df.IdDBItem = cc.IdMercaderia AND df.IdB= cc.IdBoleta )
	  
	  
	   )
	
	) TT  ORDER BY TT.cont asc");

if(count($querii)>0){

	$me10='<table border="1" width="100%" cellpadding="5" cellspacing="5">
	<tr>				
		<td width="10%" style="    text-align: center;">#</td>
		<td width="50%" style="    text-align: center;">Detalle</td>
		<td width="40%" style="    text-align: center;">Peso KG</td>
		
	</tr>';

	for($ilGc=0; $ilGc<count($querii); $ilGc++)
	{

       $cdc=$querii[$ilGc]['Cantidad'];


		$DETY=$DETY.'<tr>		
	 
			<td width="10%" style="    text-align: center;">'.$querii[$ilGc]['cont'].'</td>
	
		   <td width="50%" style="    text-align: center;">'.$querii[$ilGc]['Descripcion'].'</td>
		   <td width="40%" style="    text-align: center;">'.$cdc.' KG</td>
		
	   
	   
			</tr>';





	}
}

	



	$me1='<table border="1" width="100%" cellpadding="5" cellspacing="5">
	<tr>				
		<td width="10%" style="    text-align: center;">#</td>

		<td width="30%" style="    text-align: center;">Peso Sistema KG</td>
		<td width="30%" style="    text-align: center;">Peso Neto Balanza KG</td>
		<td width="30%" style="    text-align: center;">Peso Diferencia KG</td>
		
	</tr>';

	$detyy='<tr>		
	 
			<td width="10%" style="    text-align: center;">1</td>
	
		   <td width="30%" style="    text-align: center;">'.$peso_sap__.'</td>
		   <td width="30%" style="    text-align: center;">'.$peso_neto__.'</td>
		   <td width="30%" style="    text-align: center;">'.$peso_dife__.'</td>
	   
	   
			</tr>';

	$message = '';

    //   $lista_personal_enviar_email=query_soli("SELECT cc.IdUsuario,  cc.NombreUsuario, cc.Usuario, cc.Email FROM usuario cc WHERE cc.ECImportacion=1 AND cc.Estado=1");


	  $FTY='SELECT T0."U_NAME", T0."E_Mail", T0."USER_CODE" FROM OUSR T0 
	  INNER JOIN OHEM T1 ON T0."USERID" = T1."userId" 
	  WHERE T1."U_Importaciones" =  \'\''.'SI'.'\'\' AND  T1."U_TipoUser" = \'\''.'A'.'\'\'';
      $lista_personal_enviar_email=hanaquery($FTY);


      if(count($lista_personal_enviar_email)>0){
		foreach ($lista_personal_enviar_email as $row) {
		// for($ilc=0; $ilc<count($lista_personal_enviar_email); $ilc++)
		// {
		  $IdUsuario=1;
		  $usuario_code=$row['USER_CODE'];
		  $NombreUsuario= $row['U_NAME'];
		  $Email= $row['E_Mail'];
		//  $Email= 'jflores@monterreysrl.com.bo';
		  $message = '
		  <h3 align="center">Balanza '.$balanza.'</h3>
		  <h3 align="center">Detalle del Ticket Balanza '.$U_NroTicket__.' Observado</h3>
		  <h3 align="center">Boleta Transporte '.$codigo_bt.' Observado</h3>
		  <h3 align="center">Usuario: '.$NombreUsuario.'</h3>

		  '.$me1.'
		  '.$detyy.'
		  
		  </table>';






           $message=$message.'</br></br><p style=" font-size: 15px;
		   font-weight: bold;
		   margin: 20px 0px;
		   border-bottom: 1px solid lightgray;
		   padding-bottom: 10px;"> Detalle Boleta </p>
            
		   '.$me10.'
		  '.$DETY.'
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
				(IdUsuario, FechaRegistro, EstadoEnvio, Detalle, TicketB, User, correo) 
				values 
				($IdUsuario,'$fecha',0, '$message','$U_NroTicket__', '$usuario_code', '$Email')");
			} else {
				$fecha=date('Y-m-d H:i:s');
				//enviado
				$insert_detalle= query_importaciones("insert into correo_peso_balanza
				(IdUsuario, FechaRegistro, EstadoEnvio, Detalle, TicketB, User, correo) 
				values 
				($IdUsuario,'$fecha',1, '$message','$U_NroTicket__', '$usuario_code', '$Email')");
			}
		}



		}


	  }




 	  return 1;

 }






?>