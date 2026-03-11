<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Access-Control-Allow-Origin: *');
include("abc.php");
$call=posted('call');
$fecha=date("Y-m-d H:i:s");
$date=date("Y-m-d");
$hora=date("H:i:s");
$cur_path = trim(preg_replace('/\s+/', ' ', shell_exec('echo %CD%'))).'\\';
//$cur_path

switch ($call) {
	case 'login':
	$user=posted('user');
	$pase=posted('pase');
	$pase=md5($pase);
	$data = query("select * from usuario where user='$user' and pase='$pase' and estado='1';");
	if(count($data)>0){
		unset($data[0]['pase']);
		echo json_encode($data);
	}else{
		echo json_encode(false);
	}
	break;

	case 'peso':
	$salida = shell_exec("$cur_path\balanza.exe > $cur_path\peso.log");
	$document = file_get_contents('peso.log');
	$res = trim(preg_replace("/[^0-9 ]/", "", $document));

	$pos = strpos($res, " ");
	$peso = substr($res, 0, $pos);
    //echo $peso;
	echo json_encode(rand(100,1000));
	break;

	case 'saveU':
	$user=posted('user');
	$pase=posted('pase');
	$owner=posted('owner');
	$sucursal=posted('sucursal');
	$pase=md5($pase);
	$data = query("insert into usuario values(null,'$user','$pase','$owner','$sucursal','1','U');");
	echo json_encode($data);
	break;

	case 'query':
	$data=query($_POST['sql']);
	echo json_encode($data);
	break;

	case 'server':
	$data=query("select * from extra where Code='SERVER'");
	echo json_encode($data[0]['Data']);
	break;

	case 'rest':
	$res=restoreDB($_POST['sql']);
	echo json_encode($res);
	break;
}
?>