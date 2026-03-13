<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Access-Control-Allow-Origin: *');
include("abc.php");
$call=posted('call');
$dbname=server_db;
$mainUrl=mainUrl;
$fecha=date("Y-m-d H:i:s");
$date=date("Y-m-d");
$hora=date("H:i:s");
$val_sesion='';
switch ($call) {



         case 'registrar_pb':
            $array=posted('array');
            $posi=posted('posi');
         
         
              $user=posted('user');
              $DocEntry=posted('DocEntry');
        
            
     
        $asignac=queryy("insert into json_subir(json, posi, fecha, user, DocEntry) values ('$array', '$posi','$fecha', '$user', '$DocEntry' ) ");
       
        if(count($asignac)>0){
            echo json_encode(1);
            return;
          }else{
            echo json_encode(0);
          }

            break;
        
        
        
        

    case 'docF':
    echo json_encode('<html><head><meta charset="utf-8" /> <title> Reporte</title> <style type="text/css"> html, body {display: block; font-family: "Calibri";font-size: 12px; margin: 0;} .small-text{font-size: 9px;} table{border-spacing: 0px} @page {size: 8.5in 11.5in;size: portrait; margin: 0mm 0mm 0mm 0mm; } p, .no-margin{margin: 0em;font-family: "Calibri"; } .right{text-align: right; } .center{text-align: center; } .bordered{border: 0px solid rgba(0,0,0,.2)} .blocker{position: absolute;height: 50%;width: 100%;} table{border-spacing: 0px} </style> </head> <body>

        <div class="bordered blocker"> <div class="right"> <p>{n_factura}</p> <p>{n_auto}</p> </div> <br> <br><br><br> <div style="padding-top: 1em;"> <table style="width: -webkit-fill-available;"> <tr> <td colspan="8" align="left"><b> Nombre : </b>{nombre_factura}</td> <td colspan="4" align="left" style="padding-left:30em;"><b> NIT/CI : </b>{nit}</td> </tr> <tr> <td colspan="8" align="left"><b> Fecha : </b>{lugar_fecha}</td> <td colspan="4" align="left"></td> </tr> </table> </div> 
        <br>
        <br> 
        <div> <table style="width: -webkit-fill-available;"> <tr> <td colspan="1">{cantidad_um}</td> <td colspan="3" style="padding-left:10em;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{descripcion}</td> <td colspan="1" style="padding-left:25em;">{precio}</td> <td colspan="1" style="padding-left:7.5em;">{total_linea}</td> </tr> </table> </div>

        <div class="bordered" style="position: absolute;bottom: 1.5em;height: 100px;width: 100%;display: inline-flex;"> <div class="bordered" style="padding-left: 10px;width: 100px;height: 100%;padding-top: 10px;"><div style="width:90px;height:90px;">{svg}</div></div><div class="bordered" style="width: calc(100% - 100px);height: 100%;"> <table style="width: -webkit-fill-available;"> <tr> <td colspan="9" align="left"><b> Son : </b>{total_text}</td> <td colspan="3" align="left"><b> Total USD : </b>{total_usd}</td> </tr> <tr> <td colspan="6" align="left"><b> Cod. de control : </b>{codigo_control}</td><td colspan="3" align="left"><b> T.C. : </b>{tc}</td><td colspan="3" align="left"><b> Total BS : </b>{total_bs}</td> </tr> <tr> <td colspan="8" align="left"><b> Fecha limite de Emision : </b>{fecha_limite}</td> <td colspan="4" align="left"></td> </tr> <tr> <td colspan="8" align="left"><b> Vendedor : </b>{vendedor}</td> <td colspan="4" align="left"></td> </tr> <tr> <td colspan="12" align="left" class="center small-text">El importe de esta factura deberá ser pagado en dólares americanos o en su equivalente en bolivianos al tipo de cambio vigente en la fecha de pago.<br> <b> "ESTA FACTURA CONTRIBUYE AL DESARROLLO DEL PAÍS EL USO ILÍCITO DE ESTA SERÁ SANCIONADO DE ACUERDO A LA LEY"</b><br>{ley_453}</td></tr> </table> </div> </div> </div>

        <div class="bordered blocker" style="top:50%"> <br><br><br> <div class="right"> <p>{n_factura}</p> <p> {n_auto}</p> </div> <br> <br> <br> <br> <div style="padding-top: 0.75em;"> <table style="width: -webkit-fill-available;margin-top: 0.5em;"> <tr> <td colspan="8" align="left"><b> Nombre : </b>{nombre_factura}</td> <td colspan="4" align="left" style="padding-left:30em;"><b> NIT/CI : </b>{nit}</td> </tr><tr> <td colspan="8" align="left"><b> Fecha : </b>{lugar_fecha}</td> <td colspan="4" align="left"></td> </tr> </table> </div> 
        <br>
        <div> <table style="width: -webkit-fill-available;padding-top:1em"> <tr> <td colspan="1">{cantidad_um}</td> <td colspan="3" style="padding-left:10em;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{descripcion}</td> <td colspan="1" style="padding-left:25em;">{precio}</td> <td colspan="1" style="padding-left:7.5em;">{total_linea}</td> </tr> </table> </div> 

        <div class="bordered" style="position: absolute;bottom: .5em;height: 100px;width: 100%;display: inline-flex;"><div class="bordered" style="padding-left: 10px;width: 100px;height: 100%;padding-top: 10px;"><div style="width:90px;height:90px;">{svg}</div></div> 
        <br><br><br><br><br><br><br><br><br>
        <div class="bordered" style="width: calc(100% - 100px);height: 100%;"> <table style="width: -webkit-fill-available;"> <tr> <td colspan="9" align="left"><b> Son : </b>{total_text}</td> <td colspan="3" align="left"><b> Total USD : </b>{total_usd}</td> </tr> <tr> <td colspan="6" align="left"><b> Cod. de control : </b>{codigo_control}</td><td colspan="3" align="left"><b> T.C. : </b>{tc}</td><td colspan="3" align="left"><b> Total BS : </b>{total_bs}</td> </tr> <tr> <td colspan="8" align="left"><b> Fecha limite de Emision : </b>{fecha_limite}</td> <td colspan="4" align="left"></td> </tr> <tr> <td colspan="8" align="left"><b> Vendedor : </b>{vendedor}</td> <td colspan="4" align="left"></td> </tr> <tr> <td colspan="12" align="left" class="center small-text">El importe de esta factura deberá ser pagado en dólares americanos o en su equivalente en bolivianos al tipo de cambio vigente en la fecha de pago.<br> <b> "ESTA FACTURA CONTRIBUYE AL DESARROLLO DEL PAÍS EL USO ILÍCITO DE ESTA SERÁ SANCIONADO DE ACUERDO A LA LEY"</b><br>{ley_453}</td></tr> </table> </div> </div> </div>

    </body> </html>');
break;

case 'version':
$version=posted('version');
echo json_encode(version==$version);
break;

    case 'cerrar_sesion':
        session_start();
        if (isset($_SESSION['posi'])   &&  isset($_SESSION['ubi'])  &&  isset($_SESSION['usert'])   &&  isset($_SESSION['passt'])  ){
            if(isset($_SESSION['ticketr'])){
                session_destroy();
                echo json_encode(1);         
            }else{
                session_destroy();
                echo json_encode(1);
            }
       
        }else{
            echo json_encode(1);
        }
 
    break;





       case 'set_sesion_ubi':
        $ubi=posted('ubi');
        session_start();
        $_SESSION['ubi']=$ubi;
        echo json_encode(1);
       break;


       case 'get_sesion_ubi':
         $res=[];
         session_start();
         if (isset($_SESSION['ubi'])){
            $res[0]['ubi']=$_SESSION['ubi'];
            echo json_encode($res);
         }
       
       break;


   case 'set_sesion_posi':
    $posi=posted('posi');
    session_start();
    $_SESSION['posi']=$posi;
    echo json_encode(1);
   break;






   case 'get_sesion_posi':
    $res=[];
    session_start();
     if (!isset( $_SESSION['posi'] ) ) {
       echo json_encode($res);
     } else{
       $res[0]['posi']=$_SESSION['posi'];
       echo json_encode($res);
     }
   
  break;



   
   case 'set_ticket':
    $ticketr=posted('ticketr');
    session_start();
    $_SESSION['ticketr']=$ticketr;
    echo json_encode(1);
   break;


   case 'get_ticket':
    $res=[];
     session_start();
      if (!isset( $_SESSION['ticketr'] ) ) {
        echo json_encode($res);
      } else{
        $res[0]['ticketr']=$_SESSION['ticketr'];
        echo json_encode($res);
      }
   break;





   case 'set_datos_user':
    $user=posted('usert');
    $pase=posted('passt');

    session_start();
    $_SESSION['usert']=$user;
    $_SESSION['passt']=$pase;
    echo json_encode(1);

break;



case 'get_datos_user':
    $res=[];
    session_start();
     if (!isset($_SESSION['usert'])  && !isset($_SESSION['passt']) ) {
       echo json_encode($res);
     } else{
       $res[0]['usert']=$_SESSION['usert'];
       $res[0]['passt']=$_SESSION['passt'];
       echo json_encode($res);
     }

break;


   case 'getData_info':
        $usuario = posted('user');
        $data = hanacall("\"SP_INT_DATA\"('$usuario')");
        if (count($data) == 1) {
            echo json_encode($data);
        } else {
            echo json_encode(false);
        }
        break;








case 'login':
$user=posted('user');
$pase=posted('pase');
$url=$mainUrl.'Login';
$data = array("UserName"=> $user, "Password"=> $pase, "CompanyDB"=> $dbname);
$res=callApis('POST',$url,$data,null,$user );
$data=json_decode($res,TRUE);
$data=isset($data['SessionId'])?json_encode($data['SessionId']):json_encode(false); 
$val_sesion=$data;
echo $data;
break;









case 'val_sesion':
    $idsesion=$val_sesion;
    echo json_encode($idsesion);
break;







case 'getData':
$usuario=posted('user');
$data=hanacall("\"SP_INT_DATA\"('$usuario')");
if(count($data)==1){
    //unset($data[0]['CODI']);
    unset($data[0]['MEMO']);
    unset($data[0]['CODEV']);
    unset($data[0]['OWNER']);
    unset($data[0]['GOO']);
    echo json_encode($data);
}else{
    echo json_encode(false);
}
break;






case 'getDataaa':
    $usuario='JMAMANI';
    $data=hanacall("\"SP_INT_DATA\"('$usuario')");
    if(count($data)==1){
        unset($data[0]['MEMO']);
        unset($data[0]['CODEV']);
        unset($data[0]['OWNER']);
        unset($data[0]['GOO']);
        echo json_encode($data);
    }else{
        echo json_encode(false);
    }
    break;



case 'getDataa':
    $usuario=$_GET['user'];


    $data=hanacall("\"SP_INT_DATA\"('$usuario')");
    if(count($data)==1){
        unset($data[0]['MEMO']);
        unset($data[0]['CODEV']);
        unset($data[0]['OWNER']);
        unset($data[0]['GOO']);
        echo json_encode($data);
    }else{
        echo json_encode(false);
    }
    break;
    







case 'complexNit':
$placa=posted('placa');
$res=hanaquery('select distinct("U_NIT") as NIT from "@BALANZA" where "U_NIT" like \'\'%'.$placa.'%\'\' limit 5');
$det=[];
foreach ($res as $row) {
    $item=$row['NIT'];
    $det[$item]=null;
}
echo json_encode($det);
break;

case 'complexPlaca':
$placa=posted('placa');
$res=hanaquery('select distinct("U_Placa") as NIT from "@BALANZA" where "U_Placa" like \'\'%'.$placa.'%\'\' limit 5');
$det=[];
foreach ($res as $row) {
    $item=$row['NIT'];
    $det[$item]=null;
}
echo json_encode($det);
break;



case 'reporte':
$idSesion=posted('idSesion');
$tipo=posted('tipo');
$fecha_i=posted('fecha_i');
$fecha_f=posted('fecha_f');
$sucursal=posted('sucursal');
$res=hanacall("\"SP_INT_REPORTE\"('$tipo','$fecha_i','$fecha_f','$sucursal')");
echo json_encode($res);
break;



case 'findDoc':
$idSesion=posted('idSesion');
$tipo=posted('tipo');
$ticket=posted('ticket');
$env='';
switch ($tipo) {
    case 'ORDEN DE CARGA':
     $env=$mainUrl."Invoices?\$filter=DocNum%20eq%20".$ticket."%20and%20DocumentSubType%20eq%20'bod_None'";
     $url=$env;
     break;
     case 'TRASPASO':
     $env='StockTransfers?$filter=DocNum%20eq%20'.$ticket;
     $url=$mainUrl.$env;
     break;
     case 'NOTA DE DEBITO':
     $env=$mainUrl."Invoices?\$filter=DocNum%20eq%20".$ticket."%20and%20DocumentSubType%20eq%20'bod_DebitMemo'";
     $url=$env;
    break;
}

 session_start();
 if(isset($_SESSION['usert'])){
 $usuariot=$_SESSION['usert'];
 $res=callApis('GET',$url,[],$idSesion,$usuariot);
  $res=json_decode($res,TRUE);
 echo json_encode($res['value']);
 }
break;






case 'buscarNullByFact':
$fact=posted('fact');
$res=hanaquery('select * from "@BALANZA" where "U_NroDocFactura"='.$fact.' order by "U_NroTicket" desc');
echo json_encode($res);
break;

case 'getLast_otros_servicios':
$placa=posted('placa');
$To=posted('To');
$Chata=posted('Chata');


  if($To==1 && $Chata==0){
       $res='select T1."Name" as proveedor,T2."Name" as trasnportadora ,T3."Name" as producto,T4."Name" as destino,T5."WhsName"  AS origen, T0."U_ID_Chata" AS chata from "@BALANZA" T0
           INNER JOIN "@BAL_DETALLEOTROS" T1 ON T0."U_ID_Proveedor" = T1."Code"
          INNER JOIN "@BAL_DETALLEOTROS" T2 ON T0."U_ID_Transportadora" = T2."Code"
           INNER JOIN "@BAL_DETALLEOTROS" T3 ON T0."U_ID_Producto" = T3."Code"
          INNER JOIN "@BAL_DETALLEOTROS" T4 ON T0."U_ID_Destino" = T4."Code"
       INNER JOIN OWHS T5 ON  T5."WhsCode"=T0."U_ID_Origen_Int"
       where T0."Code"=\'\''.$placa.'\'\'';

   $res=hanaquery($res);
   echo json_encode($res);
  }else{
    if($To==2 && $Chata==0){
        $res=hanaquery('select T1."Name" as proveedor,T2."Name" as trasnportadora,T3."Name" as producto,T4."Name" as destino,T5."Name" as origen, T0."U_ID_Chata" AS chata  from "@BALANZA" T0
        INNER JOIN "@BAL_DETALLEOTROS" T1 ON T0."U_ID_Proveedor" = T1."Code"
        INNER JOIN "@BAL_DETALLEOTROS" T2 ON T0."U_ID_Transportadora" = T2."Code"
        INNER JOIN "@BAL_DETALLEOTROS" T3 ON T0."U_ID_Producto" = T3."Code"
        INNER JOIN "@BAL_DETALLEOTROS" T4 ON T0."U_ID_Destino" = T4."Code"
        INNER JOIN "@BAL_DETALLEOTROS" T5 ON T0."U_ID_Origen" = T5."Code"
       
       where  T0."Code"=\'\''.$placa.'\'\'');
       echo json_encode($res);
      }else{
        if($To==1 && $Chata!=0){
            $res=hanaquery('select T1."Name" as proveedor,T2."Name" as trasnportadora,T3."Name" as producto,T4."Name" as destino,T5."WhsName"  as origen, T6."Name" AS chata  from "@BALANZA" T0
            INNER JOIN "@BAL_DETALLEOTROS" T1 ON T0."U_ID_Proveedor" = T1."Code"
            INNER JOIN "@BAL_DETALLEOTROS" T2 ON T0."U_ID_Transportadora" = T2."Code"
            INNER JOIN "@BAL_DETALLEOTROS" T3 ON T0."U_ID_Producto" = T3."Code"
            INNER JOIN "@BAL_DETALLEOTROS" T4 ON T0."U_ID_Destino" = T4."Code"
            INNER JOIN OWHS T5 ON  T5."WhsCode"=T0."U_ID_Origen_Int"
            INNER JOIN "@BAL_DETALLEOTROS" T6 ON T0."U_ID_Chata" = T6."Code"
           
           where  T0."Code"=\'\''.$placa.'\'\'');
           echo json_encode($res);
          }else{
            if($To==2 && $Chata!=0){
                $res=hanaquery('select T1."Name" as proveedor,T2."Name" as trasnportadora,T3."Name" as producto,T4."Name" as destino,T5."Name" as  origen ,T6."Name" AS chata from "@BALANZA" T0
                INNER JOIN "@BAL_DETALLEOTROS" T1 ON T0."U_ID_Proveedor" = T1."Code"
                INNER JOIN "@BAL_DETALLEOTROS" T2 ON T0."U_ID_Transportadora" = T2."Code"
                INNER JOIN "@BAL_DETALLEOTROS" T3 ON T0."U_ID_Producto" = T3."Code"
                INNER JOIN "@BAL_DETALLEOTROS" T4 ON T0."U_ID_Destino" = T4."Code"
                INNER JOIN "@BAL_DETALLEOTROS" T5 ON T0."U_ID_Origen" = T5."Code"
                INNER JOIN "@BAL_DETALLEOTROS" T6 ON T0."U_ID_Chata" = T6."Code"
           
               
               where  T0."Code"=\'\''.$placa.'\'\'');
               echo json_encode($res);

            }
          }
      }
  
  }


break;




    case 'getLast':
    $placa=posted('placa');
    $res=hanaquery('select * from "@BALANZA"  where "Code"=\'\''.$placa.'\'\'');
    echo json_encode($res);
    break;


case 'getPeso':
    $usuario = posted('user');
    $data = hanacall("\"SP_INT_DATA\"('$usuario')");

    if (!isset($data[0]['GOO']) || empty($data[0]['GOO'])) {
        $res = ["error" => "No se encontró URL de balanza para el usuario $usuario"];
        echo json_encode($res);
        break;
    }

    $urlB = $data[0]['GOO'];
    $endpoint = "http://".$urlB."/balanza/leerpeso.php";


    $res = callPost($endpoint);

    if ($res === false || $res === null) {
        $res = ["error" => "No se pudo conectar con la balanza en $endpoint"];
    }

    echo json_encode($res);
    break;





case 'getURLPeso':
    if(demo){
        echo json_encode(rand(100,1000));
        return;
    }
    $usuario=posted('user');
    $data=hanacall("\"SP_INT_DATA\"('$usuario')");
    $urlB="localhost";
    if(isset($data[0]['GOO'])){
        $urlB=$data[0]['GOO'];
        $urlB="http://".$urlB."/balanza/leerpeso.php";
    }
    echo json_encode($urlB);
    break;
    
 
        


case 'eraser':
$usuario=posted('user');
$data=query("select cc.* from eraser  cc where cc.user='$usuario' AND cc.Estado=1 ORDER BY cc.fecha desc ");
//$data=query("select * from eraser where user='$usuario'");
echo json_encode($data);
break;


case 'buscar_detalle_factura':
    $docentry_f=posted('docentry_f');
    $data=query("select  cc.* FROM detalle_fpe  cc  WHERE cc.JSON LIKE '%$docentry_f%' AND cc.posi=1  ORDER BY cc.FechaRegistro desc");
    echo json_encode($data);
break;
    



case 'buscar_detalle_factura_pago':
    $docentry_f=posted('docentry_f');
    $data=query("select  cc.* FROM detalle_fpe  cc  WHERE cc.docentry='$docentry_f' AND cc.posi=2 AND cc.JSON LIKE '%$docentry_f%'  ORDER BY cc.FechaRegistro desc");
    echo json_encode($data);
break;
    
case 'buscarentrega':
    $docentry_f=posted('docentry_f');
     $data=query("select  cc.* FROM detalle_fpe  cc  WHERE cc.docentry='$docentry_f' AND cc.posi=3 AND cc.JSON LIKE '%$docentry_f%'  ORDER BY cc.FechaRegistro desc LIMIT 1");

    echo json_encode($data);
break;


case 'buscar_datos_p_e_eraser':
    $docentry_f=posted('docentry_f');
    $data=query("select if(ISNULL(cc.docentry_p), '0',cc.docentry_p) as docentry_p, if(ISNULL(cc.docentry_e), '0',cc.docentry_e) as docentry_e ,
    if(ISNULL(cc.ticket), '0',cc.ticket) AS ticket
    from eraser  cc where  cc.docentry_f='$docentry_f'  ORDER BY cc.fecha desc ");
    echo json_encode($data);
break;
    




case 'error':
$usuario=posted('user');
//SELECT ss.* FROM errores ss WHERE ss.Usuario='JGREGORIO'  ORDER BY ss.fecha desc
//$data=query("select * from errores where date(fecha)='$date'");
$data=query("select ss.* FROM errores ss WHERE ss.Usuario='$usuario' and date(fecha)='$date' ORDER BY ss.fecha desc");
echo json_encode($data);
break;





case 'logout':
    $user=posted('user');
    $pase=posted('pase');
    $url=$mainUrl.'Logout';
    $data = array("UserName"=> $user, "Password"=> $pase, "CompanyDB"=> $dbname);
    $res=callApis_logout('POST',$url,$data,null,$user );
    echo json_encode(0);
break;
    


case 'getInvoicess_':


    $datoo=getTime();
    $idSesion=posted('idSesion');
    $usuario=posted('user');
    $data=$_POST['array'];
    $data_datos=$_POST['array_datos'];


    query("insert into control_contado_getfactura  (JSON,  FechaRegistro, User, JSON_datos)
	value('$data', '$datoo', '$usuario', '$data_datos')");



    $data=json_decode($data,TRUE);
    $datas=hanacall("\"SP_INT_DATA\"('$usuario')");
    $data[0]['UserSign']=$datas[0]['CODEV'];
    $data[0]['SalesPersonCode']=$datas[0]['CODEV'];
    $precio=hanaquery("SELECT T0.\"Price\" FROM ITM1 T0 WHERE T0.\"ItemCode\" = ''SRV0003'' AND  T0.\"PriceList\" = 1");
    $precio=floatval($precio[0]['Price']);
    $rate=hanaquery("SELECT T0.\"Rate\" FROM ORTT T0 WHERE T0.\"RateDate\" = CURRENT_DATE");
    $rate=floatval($rate[0]['Rate']);
    $cant=intval($data[0]["DocumentLines"][0]['Quantity']);
    $data[0]["DocumentLines"][0]['CostingCode3']='BLZ';
    $data[0]["DocumentLines"][0]["DocumentLineAdditionalExpenses"]=array(array("LineNumber"=> 0, "GroupCode"=> 0, "ExpenseCode"=> 4, "LineTotal"=> $precio*$cant*0.03, "LineTotalFC"=> $cant*$precio*0.03, "LineTotalSys"=> $cant*$precio*0.03),
        array("LineNumber"=> 0, "GroupCode"=> 1, "ExpenseCode"=> 3, "LineTotal"=> $precio*$cant*-0.03, "LineTotalFC"=> $cant*$precio*-0.03, "LineTotalSys"=> $cant*$precio*-0.03, "DistributionRule"=> $data[0]['DocumentLines'][0]['COGSCostingCode'], "DistributionRule2"=> $data[0]['DocumentLines'][0]['CostingCode2'], "DistributionRule3"=> "BLZ", "DistributionRule4"=> $data[0]['DocumentLines'][0]['CostingCode4']));
    $url=$mainUrl.'Invoices';
    session_start();
    if(isset($_SESSION['usert'])){
        $usuariot=$_SESSION['usert'];
        $res=callApis('POST',$url,$data[0],$idSesion,$usuariot);
        $data_rr=json_encode($data[0]);
        query("insert into detalle_fpe (JSON, FechaRegistro, posi, user, url, JSON_datos,Data_R) VALUES ('$res','$datoo', 1,'$usuario', '$url', '$data_datos','$data_rr')");
		$res=json_decode($res,TRUE);
       if(isset($res['error'])){
           query(" INSERT INTO error_ejecucion (JSON_REPONSE, url, dato_ingreso, usuario, fecharegistro) VALUES ('$res', '$url', '$data_rr','$usuario','$datoo')");
           echo json_encode(0);
       }else if(isset($res["DocNum"])){
           query("insert into eraser values(null,'$usuario','".$res["FederalTaxID"]."','".$res["U_NomFactura"]."',".$res["DocEntry"].",".$res["DocNum"].",null,null,null,null,null,'$fecha',1,0)");
           echo json_encode($res);
       }else{
           echo json_encode(0);
       }
    }
 
break;



case 'getInvoices':


    $datoo=getTime();
    $idSesion=posted('idSesion');
    $usuario=posted('user');
    $data=$_POST['array'];


    query("insert into control_contado_getfactura  (JSON,  FechaRegistro, User)
	value('$data', '$datoo', '$usuario')");



    $data=json_decode($data,TRUE);
    $datas=hanacall("\"SP_INT_DATA\"('$usuario')");
    $data[0]['UserSign']=$datas[0]['CODEV'];
    $data[0]['SalesPersonCode']=$datas[0]['CODEV'];
    $precio=hanaquery("SELECT T0.\"Price\" FROM ITM1 T0 WHERE T0.\"ItemCode\" = ''SRV0003'' AND  T0.\"PriceList\" = 1");
    $precio=floatval($precio[0]['Price']);
    $rate=hanaquery("SELECT T0.\"Rate\" FROM ORTT T0 WHERE T0.\"RateDate\" = CURRENT_DATE");
    $rate=floatval($rate[0]['Rate']);
    $cant=intval($data[0]["DocumentLines"][0]['Quantity']);
    $data[0]["DocumentLines"][0]['CostingCode3']='BLZ';
    $data[0]["DocumentLines"][0]["DocumentLineAdditionalExpenses"]=array(array("LineNumber"=> 0, "GroupCode"=> 0, "ExpenseCode"=> 4, "LineTotal"=> $precio*$cant*0.03, "LineTotalFC"=> $cant*$precio*0.03, "LineTotalSys"=> $cant*$precio*0.03),
        array("LineNumber"=> 0, "GroupCode"=> 1, "ExpenseCode"=> 3, "LineTotal"=> $precio*$cant*-0.03, "LineTotalFC"=> $cant*$precio*-0.03, "LineTotalSys"=> $cant*$precio*-0.03, "DistributionRule"=> $data[0]['DocumentLines'][0]['COGSCostingCode'], "DistributionRule2"=> $data[0]['DocumentLines'][0]['CostingCode2'], "DistributionRule3"=> "BLZ", "DistributionRule4"=> $data[0]['DocumentLines'][0]['CostingCode4']));
    $url=$mainUrl.'Invoices';
    session_start();
    if(isset($_SESSION['usert'])){
        $usuariot=$_SESSION['usert'];
        $res=callApis('POST',$url,$data[0],$idSesion,$usuariot);
        query("insert into detalle_fpe (JSON, FechaRegistro, posi, user, url) VALUES ('$res','$datoo', 1,'$usuario', '$url')");
		$res=json_decode($res,TRUE);
       if(isset($res['error'])){
		   $RESDF= json_encode($res,TRUE);
           query("insert into eraser_2023 values(null,'$usuario','0','$RESDF',null,null,null,null,null,null,null,'$fecha')");
           echo json_encode(0);
       }else if(isset($res["DocNum"])){
           query("insert into eraser values(null,'$usuario','".$res["FederalTaxID"]."','".$res["U_NomFactura"]."',".$res["DocEntry"].",".$res["DocNum"].",null,null,null,null,null,'$fecha')");
           echo json_encode($res);
       }else{
           echo json_encode(0);
       }
    }
 
break;



case 'getIncomingPayments_':
$datoo=getTime();
$idSesion=posted('idSesion');
$docEntry=posted('docEntry');
$data=$_POST['array'];
$data=json_decode($data,TRUE);
$url=$mainUrl.'IncomingPayments';

session_start();
if(isset($_SESSION['usert'])){
$usuariot=$_SESSION['usert'];


$res=callApis("POST",$url,$data[0],$idSesion,$usuariot);
query("insert into detalle_fpe (JSON, FechaRegistro, posi, user,url,docentry) VALUES ('$res','$datoo', 2,'', '$url', '$docEntry')");
$res=json_decode($res,TRUE);

if(isset($res['error'])){
    echo json_encode(0);
}else{
    if(isset($res["DocNum"])){
        query("update eraser set docnum_p=".$res["DocNum"].",docentry_p=".$res["DocEntry"]." where docentry_f=".$res["PaymentInvoices"][0]["DocEntry"]);
        echo json_encode($res);
    }else{
        echo json_encode(0);
    }  
}

}
break;






case 'getDeliveryNotes_':
$datoo=getTime();
$idSesion=posted('idSesion');
$docEntry=posted('docEntry');
$data=$_POST['array'];
$data=json_decode($data,TRUE);
$url=$mainUrl.'DeliveryNotes';

session_start();
if(isset($_SESSION['usert'])){
$usuariot=$_SESSION['usert'];

$res=callApis('POST',$url,$data[0],$idSesion,$usuariot);
query("insert into detalle_fpe (JSON, FechaRegistro, posi, user,url,docentry) VALUES ('$res','$datoo', 3,'', '$url', '$docEntry')");
$res=json_decode($res,TRUE);
if(isset($res['error'])){
    echo json_encode(0);
}else{
    if(isset($res["DocNum"])){
        query("update eraser set docnum_e=".$res["DocNum"].",docentry_e=".$res["DocEntry"]." where docentry_f=".$res["DocumentLines"][0]["BaseEntry"]);
        echo json_encode($res);
    }else{
        echo json_encode(0);
    }
    
}
}
break;






case 'getIncomingPayments':
    $datoo=getTime();
    $idSesion=posted('idSesion');
    $data=$_POST['array'];
    $data=json_decode($data,TRUE);
    $url=$mainUrl.'IncomingPayments';
    
    session_start();
    if(isset($_SESSION['usert'])){
    $usuariot=$_SESSION['usert'];
    
    
    $res=callApis("POST",$url,$data[0],$idSesion,$usuariot);
    query("insert into detalle_fpe (JSON, FechaRegistro, posi, user,url) VALUES ('$res','$datoo', 2,'', '$url')");
    $res=json_decode($res,TRUE);
    
    if(isset($res['error'])){
        echo json_encode(0);
    }else{
        if(isset($res["DocNum"])){
            query("update eraser set docnum_p=".$res["DocNum"].",docentry_p=".$res["DocEntry"]." where docentry_f=".$res["PaymentInvoices"][0]["DocEntry"]);
            echo json_encode($res);
        }else{
            echo json_encode(0);
        }  
    }
    
    }
    break;
    
    
    
    case 'getDeliveryNotes':
    $datoo=getTime();
    $idSesion=posted('idSesion');
    $data=$_POST['array'];
    $data=json_decode($data,TRUE);
    $url=$mainUrl.'DeliveryNotes';
    
    session_start();
    if(isset($_SESSION['usert'])){
    $usuariot=$_SESSION['usert'];
    $res=callApis('POST',$url,$data[0],$idSesion,$usuariot);
    query("insert into detalle_fpe (JSON, FechaRegistro, posi, user,url) VALUES ('$res','$datoo', 3,'', '$url')");
    $res=json_decode($res,TRUE);
    if(isset($res['error'])){
        echo json_encode(0);
    }else{
        if(isset($res["DocNum"])){
            query("update eraser set docnum_e=".$res["DocNum"].",docentry_e=".$res["DocEntry"]." where docentry_f=".$res["U_LB_DocEntry"]);
            echo json_encode($res);
        }else{
            echo json_encode(0);
        }
        
    }
    
    }
    break;
    







case 'getInvoicesposman':
    $idSesion=posted('idSesion');
    $usuario=posted('user');
    $data=$_POST['array'];
    $data=json_decode($data,TRUE);
    $datas=hanacall("\"SP_INT_DATA\"('$usuario')");
    $data[0]['UserSign']=$datas[0]['CODEV'];
    $data[0]['SalesPersonCode']=$datas[0]['CODEV'];
    $precio=hanaquery("SELECT T0.\"Price\" FROM ITM1 T0 WHERE T0.\"ItemCode\" = ''SRV0003'' AND  T0.\"PriceList\" = 1");
    $precio=floatval($precio[0]['Price']);
    $rate=hanaquery("SELECT T0.\"Rate\" FROM ORTT T0 WHERE T0.\"RateDate\" = CURRENT_DATE");
    $rate=floatval($rate[0]['Rate']);
    $cant=intval($data[0]["DocumentLines"][0]['Quantity']);
    $data[0]["DocumentLines"][0]['CostingCode3']='BLZ';
    $data[0]["DocumentLines"][0]["DocumentLineAdditionalExpenses"]=array(array("LineNumber"=> 0, "GroupCode"=> 0, "ExpenseCode"=> 4, "LineTotal"=> $precio*$cant*0.03, "LineTotalFC"=> $cant*$precio*0.03, "LineTotalSys"=> $cant*$precio*0.03),
    array("LineNumber"=> 0, "GroupCode"=> 1, "ExpenseCode"=> 3, "LineTotal"=> $precio*$cant*-0.03, "LineTotalFC"=> $cant*$precio*-0.03, "LineTotalSys"=> $cant*$precio*-0.03, "DistributionRule"=> $data[0]['DocumentLines'][0]['COGSCostingCode'], "DistributionRule2"=> $data[0]['DocumentLines'][0]['CostingCode2'], "DistributionRule3"=> "BLZ", "DistributionRule4"=> $data[0]['DocumentLines'][0]['CostingCode4']));
     $url=$mainUrl.'Invoices';
    echo json_encode($data[0]);

    //  echo json_encode($rate);
break;
    



case 'getTipos':
$res=hanaquery('select distinct("U_Tipo_Doc") from "@BALANZA1"');
echo json_encode($res);
break;

case 'getPlaca':
$placa=posted('placa');
$idSesion=posted('idSesion');
$res=hanaquery("select \"U_NroTicket\",\"U_Marca\",\"U_Color\",\"U_NombreChofer\",\"U_CI_Chofer\",\"U_OrigenDoc\",\"U_Estado\" from \"@BALANZA\" where \"U_Placa\"=''$placa'' ORDER BY \"U_NroTicket\" DESC limit 1");
echo json_encode($res);
break;

case 'getPlacaC':
$placa=posted('placa');
$sucursal=posted('sucursal');
$idSesion=posted('idSesion');
$res=hanaquery("select \"Code\",\"U_NroTicket\",\"U_Marca\",\"U_Color\",
\"U_NombreChofer\",\"U_CI_Chofer\",\"U_OrigenDoc\",\"U_Estado\"
 from \"@BALANZA\" where \"U_Placa\"=''$placa'' and \"U_Sucursal\"=''$sucursal'' and
  \"U_Origen\"=''CREDITO'' and \"U_Estado\"=''1'' ORDER BY \"Code\" DESC limit 1");
echo json_encode($res);
break;


// case 'getPlacaCP':
//     $placa=posted('placa');
   
//     $idSesion=posted('idSesion');
//     $res=hanaquery("select \"Code\",\"U_NroTicket\",\"U_Marca\",\"U_Color\",
//     \"U_NombreChofer\", \"U_Sucursal\",\"U_CI_Chofer\",\"U_OrigenDoc\",\"U_Estado\" from \"@BALANZA\"
//      where  \"U_Origen\"=''CREDITO'' or \"U_Origen\"=''OTROS SERVICIOS''  and    \"U_Placa\"=''$placa''  and \"U_Estado\"=''1'' ORDER BY \"Code\" DESC");
//     echo json_encode($res);
//     break;



    // case 'getPlacaCP':
    //     $placa=posted('placa');
       
    //     $idSesion=posted('idSesion');
    //     $res=hanaquery("select \"Code\",\"U_NroTicket\",\"U_Marca\",\"U_Color\",
    //     \"U_NombreChofer\", \"U_Sucursal\",\"U_CI_Chofer\",\"U_OrigenDoc\",\"U_Estado\" from \"@BALANZA\"
    //      where  \"U_Origen\"=''CREDITO'' or  \"U_Origen\"=''OTROS SERVICIOS''  and    \"U_Placa\"=''$placa''  and \"U_Estado\"=''1'' ORDER BY \"Code\" DESC");
    //     echo json_encode($res);
    //     break;
    


        case 'getPlacaCP':
            $placa=posted('placa');
            $idSesion=posted('idSesion');
            $res=hanaquery("select \"Code\",\"U_NroTicket\",\"U_Marca\",\"U_Color\",
            \"U_NombreChofer\", \"U_Sucursal\", \"U_Origen\" ,\"U_CI_Chofer\",\"U_OrigenDoc\",\"U_Estado\" from \"@BALANZA\"
             where  \"U_Origen\" in(''CREDITO'',''OTROS SERVICIOS'') and    \"U_Placa\"=''$placa''  and \"U_Estado\"=''1'' ORDER BY \"Code\" DESC");
            echo json_encode($res);
            break;

case 'getNit':
$placa=posted('nit');
$res=hanaquery('select "U_RazonSocial" from "@BALANZA" where "U_NIT" = \'\''.$placa.'\'\' order by "U_NroTicket" desc limit 1');
echo json_encode($res);
break;

case 'getRazones':
$res=hanaquery('select DISTINCT("U_RazonSocial") as RAZON from "@BALANZA" where "U_Origen"=\'\'CREDITO\'\' and "U_RazonSocial"<>\'\'\'\'');
echo json_encode($res);
break;

case 'complexPlaca_n':
    $placa=posted('placa');
    $res=hanaquery('select distinct("U_Placa") as PLACA from "@BALANZA" where "U_Placa" like \'\'%'.$placa.'%\'\' limit 20');
    echo json_encode($res);
    break;





    case 'Listadatos_chatarra':
       // $placa=posted('placa');
        $res=hanaquery('select T0."Code", T0."Name", T0."U_TBO", T0."U_FechaRegistro", T0."U_Usuario", T0."U_Estado", T1."Code", T1."Name", T1."U_Estado"
        FROM "@BAL_DETALLEOTROS" T0
        INNER JOIN "@BAL_TIPOOTROS" T1 ON T0."U_TBO" = T1."Code"');
        echo json_encode($res);
    break;



    case 'Listadatos_e1':
         $ee=posted('ee');
         $res=hanaquery('select T0."Code", T0."Name", T1."Name" as tipodelugar, T0."U_TBO", 
         T0."U_FechaRegistro", T0."U_Usuario", T0."U_Estado", T0."U_CI_NIT" as ci_nit,  T0."U_Telefono"  as telefono
         FROM "@BAL_DETALLEOTROS" T0
         INNER JOIN "@BAL_TIPOOTROS" T1 ON T0."U_TBO" = T1."Code" 
         WHERE T0."U_Estado"=1 AND T1."U_Estado"=1 AND   T0."U_TBO"='.$ee.'');
         echo json_encode($res);
     break;
 


     case 'ListaAlmacen':
        $res=hanaquery('select T0."WhsCode", T0."WhsName" FROM OWHS T0');
        echo json_encode($res);
    break;

    case 'ListaAlmacen_info':
        $ee=posted('ee');
        $res=hanaquery('select T0."WhsCode", T0."WhsName"     FROM OWHS T0  where  T0."WhsCode" =\'\''.$ee.'\'\'');
        echo json_encode($res);
    break;

     case 'obtenerinfo':
         $ee=posted('ee');
         $res=hanaquery('select T0."Code", T0."Name",T0."U_TBO",  T0."U_Estado", T0."U_CI_NIT" as ci_nit, 
          T0."U_Telefono"  as telefono  FROM "@BAL_DETALLEOTROS" T0 
           where    T0."Code" =\'\''.$ee.'\'\'   AND  T0."U_Estado"=1 ');
         echo json_encode($res);
     break;

    case 'BALL_':
        // $placa=posted('placa');
         $res=hanaquery('select T0."Code", T0."Name", T0."U_Estado" FROM "@BAL_TIPOOTROS" T0   where T0."U_Estado"=1 ');
         echo json_encode($res);
     break;




// case 'getFactura':
// $nit=posted('nit');
// $usuario=posted('user');
// $datas=hanacall("\"SP_INT_DATA\"('$usuario')");
// $owner=$datas[0]['OWNER'];
// $res=hanacall("\"SP_INT_JSONFACTURA\"('$nit',$owner)");
// echo json_encode($res);
// break;



case 'getFactura':
    $nit=posted('nit');
    $usuario=posted('user');
    $sucu=posted('sucu');
    $datas=hanacall("\"SP_INT_DATA\"('$usuario')");
    $owner=$datas[0]['OWNER'];
    $res=hanacall("\"SP_INT_JSONFACTURA\"('$nit',$owner)");
    $res1=hanaquery("select T0.\"U_IdImpuesto\" FROM \"@SUCURSALES\"  T0 WHERE T0.\"Code\" = ''$sucu'' ");
    $array_resultante= array_merge($res,$res1);
    echo json_encode($array_resultante);
break;

case 'getFactura_itemcode':
    $nit='';
    $usuario=posted('user');
    $datas=hanacall("\"SP_INT_DATA\"('$usuario')");
    $owner=$datas[0]['OWNER'];
    $res=hanacall("\"SP_INT_JSONFACTURA\"('$nit',$owner)");
    echo json_encode($res);
break;





case 'getPago':
$docEntry=posted('docEntry');
$res=hanacall("\"SP_INT_JSONPAGORECIBIDO\"('$docEntry')");
echo json_encode($res);
break;











    case 'getDoc':
        $idSesion=posted('idSesion');
        $ticket=posted('ticket');
        $res=hanaquery("select * from \"@BALANZA1\" where \"U_Nro_Ticket\"=''$ticket'' ORDER BY \"Code\" DESC");
        echo json_encode($res);
        break;
    


case 'getDocs':
    $idSesion=posted('idSesion');
    $usuario=posted('user');
    $data=hanacall("\"SP_INT_DATA\"('$usuario')");
    $fecha_i=posted('fecha_i');
    $fecha_f=posted('fecha_f');
    $url=$mainUrl."Invoices?\$filter=DocDate%20ge%20'$fecha_i'%20and%20DocDate%20le%20'$fecha_f'%20and%20DocumentsOwner%20eq%20".$data[0]['OWNER'];
    
    session_start();
    if(isset($_SESSION['usert'])){
    $usuariot=$_SESSION['usert'];
    $res=callApis('GET',$url,[],$idSesion,$usuariot);
    $res=json_decode($res,TRUE);


    $ar=array();
    if(count($res['value'])>0){
   // echo json_encode($res['value']);
        foreach ($res['value'] as $row) {
           // $ar[]=array('fecha' => $row['DocDate'].' '.$row['DocTime'],'precio' => $row['DocTotal'],'doc' => $row['DocNum'].' - '.$row['DocEntry']);
            $ar[]=array('fecha' => $row['DocDate'],'precio' => $row['DocTotal'],'doc' => $row['DocNum']);
        }
    }
    echo json_encode($ar);
    }
break;







    
case 'getDocNO':
    $idSesion=posted('idSesion');
    $norden=posted('norden');
    $res=hanaquery("select * from \"@BALANZA1\" where \"U_Nro_Orden\"=''$norden'' ORDER BY \"Code\" DESC");
    echo json_encode($res);
    break;


    
    
case 'get':
    $idSesion=posted('idSesion');
    $sucursal=posted('sucursal');
    $item=posted('item');
    $nro_docv=posted('nro_docv');
    $fecha_i=posted('fecha_i');
    $fecha_f=posted('fecha_f');
    if($item==''){ $item=0; }
    if($nro_docv==''){ $nro_docv='';
    }else{
        $resf=hanaquery("select * from \"@BALANZA1\" where \"U_Nro_Orden\"=''$nro_docv'' ORDER BY \"Code\" DESC");
        if(count($resf)>0){
            $nro_docv= $resf[0]['U_Nro_Ticket'];
        }else{
            $nro_docv='Sin Ticket';
        }
    }
     if($item>0){
        $all=hanaquery('select MM.U_Fecha,MM."U_Sucursal" ,MM."Code",MM."U_NroTicket",MM.DocStatus,MM.DocNum,MM."U_Placa",MM."U_Origen", MM."U_Estado",MM.FECHA
       FROM
        (
         (
           ( select  BB."U_Fecha" AS U_Fecha ,BB."U_Sucursal" ,BB."Code",BB."U_NroTicket",TX."DocStatus" as  DocStatus ,TX."DocNum" as DocNum,BB."U_Placa",BB."U_Origen", BB."U_Estado",
           concat(TO_DATE(BB."U_Fecha"),
           concat(\'\''.' '.'\'\',
               concat(substring(BB."U_Hora"+10000,2,2),
                   concat(\'\''.':'.'\'\',substring(BB."U_Hora"+10000,4,2))
                  )
               )
           ) as FECHA
            from "@BALANZA" BB
            INNER JOIN OINV TX  ON TX."DocEntry" = BB."U_DocEntryFactura"
            where  BB."U_Origen" in(\'\''.'CONTADO'.'\'\' ) )
union 
(select  BB1."U_Fecha" AS U_Fecha   ,BB1."U_Sucursal" ,BB1."Code",BB1."U_NroTicket",\'\''.''.'\'\' as DocStatus ,   0 as DocNum,BB1."U_Placa",BB1."U_Origen", BB1."U_Estado",
concat(TO_DATE(BB1."U_Fecha"),
concat(\'\''.' '.'\'\',
    concat(substring(BB1."U_Hora"+10000,2,2),
        concat(\'\''.':'.'\'\',substring(BB1."U_Hora"+10000,4,2))
       )
    )
) as FECHA
from "@BALANZA" BB1
where  BB1."U_Origen" in(\'\''.'TRANSFERENCIAM'.'\'\',\'\''.'CREDITO'.'\'\',\'\''.'OTROS SERVICIOS'.'\'\'   ))
            )
        ) MM  WHERE MM."U_Sucursal"=\'\''.$sucursal.'\'\' and MM."U_NroTicket"=\'\''.$item.'\'\'   ORDER BY MM."U_NroTicket" DESC
    ');
     }else{
        if($nro_docv!=''){
            $all=hanaquery('select MM.U_Fecha,MM."U_Sucursal" ,MM."Code",MM."U_NroTicket",MM.DocStatus,MM.DocNum,MM."U_Placa",MM."U_Origen", MM."U_Estado",MM.FECHA
       FROM
        (
         (
           ( select  BB."U_Fecha" AS U_Fecha ,BB."U_Sucursal" ,BB."Code",BB."U_NroTicket",TX."DocStatus" as  DocStatus ,TX."DocNum" as DocNum,BB."U_Placa",BB."U_Origen", BB."U_Estado",
           concat(TO_DATE(BB."U_Fecha"),
           concat(\'\''.' '.'\'\',
               concat(substring(BB."U_Hora"+10000,2,2),
                   concat(\'\''.':'.'\'\',substring(BB."U_Hora"+10000,4,2))
                  )
               )
           ) as FECHA
            from "@BALANZA" BB
            INNER JOIN OINV TX  ON TX."DocEntry" = BB."U_DocEntryFactura"
            where  BB."U_Origen" in(\'\''.'CONTADO'.'\'\' ) )
union 
(select  BB1."U_Fecha" AS U_Fecha   ,BB1."U_Sucursal" ,BB1."Code",BB1."U_NroTicket",\'\''.''.'\'\' as DocStatus ,   0 as DocNum,BB1."U_Placa",BB1."U_Origen", BB1."U_Estado",
concat(TO_DATE(BB1."U_Fecha"),
concat(\'\''.' '.'\'\',
    concat(substring(BB1."U_Hora"+10000,2,2),
        concat(\'\''.':'.'\'\',substring(BB1."U_Hora"+10000,4,2))
       )
    )
) as FECHA
from "@BALANZA" BB1
where  BB1."U_Origen" in(\'\''.'TRANSFERENCIAM'.'\'\',\'\''.'CREDITO'.'\'\',\'\''.'OTROS SERVICIOS'.'\'\'   ))
            )
        ) MM  WHERE MM."U_Sucursal"=\'\''.$sucursal.'\'\' and MM."Code"=\'\''.$nro_docv.'\'\'   ORDER BY MM."U_NroTicket" DESC');
        }else{
            $all=hanaquery('select MM.U_Fecha,MM."U_Sucursal" ,MM."Code",MM."U_NroTicket" , 
            MM.DocStatus,MM.DocNum,MM."U_Placa",MM."U_Origen", MM."U_Estado",MM.FECHA
           FROM
            (
             (
               ( select  BB."U_Fecha" AS U_Fecha ,BB."U_Sucursal" ,BB."Code",BB."U_NroTicket",  
            TX."DocStatus"  AS  DocStatus ,TX."DocNum" as DocNum,BB."U_Placa",BB."U_Origen", BB."U_Estado",
               concat(TO_DATE(BB."U_Fecha"),
               concat(\'\''.' '.'\'\',
                   concat(substring(BB."U_Hora"+10000,2,2),
                       concat(\'\''.':'.'\'\',substring(BB."U_Hora"+10000,4,2))
                      )
                   )
               ) as FECHA
                from "@BALANZA" BB
                INNER JOIN OINV TX  ON TX."DocEntry" = BB."U_DocEntryFactura"
                where  BB."U_Origen" in(\'\''.'CONTADO'.'\'\' ) )
    union 
    (select  BB1."U_Fecha" AS U_Fecha   ,BB1."U_Sucursal" ,BB1."Code",BB1."U_NroTicket",\'\''.''.'\'\' as DocStatus ,   0 as DocNum,BB1."U_Placa",BB1."U_Origen", BB1."U_Estado",
    concat(TO_DATE(BB1."U_Fecha"),
    concat(\'\''.' '.'\'\',
        concat(substring(BB1."U_Hora"+10000,2,2),
            concat(\'\''.':'.'\'\',substring(BB1."U_Hora"+10000,4,2))
           )
        )
    ) as FECHA
    from "@BALANZA" BB1
    where  BB1."U_Origen" in(\'\''.'TRANSFERENCIAM'.'\'\',\'\''.'CREDITO'.'\'\',\'\''.'OTROS SERVICIOS'.'\'\'   ))
                )
            ) MM  WHERE MM."U_Sucursal"=\'\''.$sucursal.'\'\' and MM.U_Fecha BETWEEN \'\''.$fecha_i.'\'\' AND \'\''.$fecha_f.'\'\'  ORDER BY MM."U_NroTicket" DESC
        ');
        }
     }
 //   $all=hanacall("\"SP_INT_GET_TABLE\"($item,'$fecha_i','$fecha_f','$sucursal')");
    //$pend=hanaquery('(select * from "@BALANZA" where "U_Estado"=\'\'1\'\' and "U_Sucursal"=\'\''.$sucursal.'\'\') UNION (select * from "@BALANZA" where "Code" in (select "Code" from "@BALANZA" where "U_Sucursal"=\'\''.$sucursal.'\'\' order by "U_Fecha" desc,"U_Hora" desc limit 1))');
   // $det=hanaquery("select b.* from \"@BALANZA\" a,\"@BALANZA1\" b where a.\"U_Estado\"=''1'' and a.\"Code\"=b.\"U_Nro_Ticket\"");
    $a='delete from balanza;';
    $x='delete from balanza1;';
    echo json_encode(array('all'=>$all,'pen'=>$a,'det'=>$x));
    break;
















    
    
 

    case 'registrar_informacion':
        session_start();
        $userr=$_SESSION['usert'];
        $pasee=$_SESSION['passt'];
        $url=$mainUrl.'Login';
        $data_user = array("UserName"=> $userr, "Password"=> $pasee, "CompanyDB"=> $dbname);
        $res_user=callApis('POST',$url,$data_user,null,$userr );
        $data_user=json_decode($res_user,TRUE);
        $idSesion=isset($data_user['SessionId'])?json_encode($data_user['SessionId']):json_encode(false); 


        $data=json_decode($_POST['array'],TRUE);
        $url_re=$mainUrl.'U_BAL_DETALLEOTROS';
        $dato= $data[0]['Name'];
        $ress=hanaquery('select T0."Code", T0."Name",T0."U_TBO",  T0."U_Estado", T0."U_CI_NIT" as ci_nit, 
        T0."U_Telefono"  as telefono  FROM "@BAL_DETALLEOTROS" T0 
        where    T0."Name" =\'\''.$dato.'\'\'   AND  T0."U_Estado"=1 ');
      
           if(count($ress)>0){
             $cdsc=$ress[0]['Code'];
             echo json_encode($cdsc);
           }else{
            $idSesion= str_replace( '"', '', $idSesion);
            $array50=array();
            $array50['Name']=$data[0]['Name'];
            $array50['U_TBO']=$data[0]['U_TBO'];
            $array50['U_Estado']=1;
            $array50['U_CI_NIT']=$data[0]['U_CI_NIT'];
            $array50['U_Telefono']=$data[0]['U_Telefono'];
            $array50['U_FechaRegistro']=date("Y-m-d H:i:s");
          
            $res50=callApis('POST',$url_re,$array50,$idSesion,$userr);
            $res50=json_decode($res50,TRUE);
               if(isset($res50['error'])){
                   echo json_encode(0);
               }else{
                 if(isset($res50["Code"])){
                   echo json_encode($res50["Code"]);
                 }else{
                    echo json_encode(0);
                 }
               }
           }
  
    break;



































    case 'finishBalanza_contado':


 
        $idSesion=posted('idSesion');
        $usuariot=posted('usuariot');
        $ob1=posted('ob11');
        $ob2=posted('ob22');
        $data=json_decode($_POST['array'],TRUE);


        $isNew=false;
        $data[0]['U_Fecha']=$fecha;
        $data[0]['U_Hora']=$hora;
        $sucursal=$data[0]['U_Sucursal'];
        $usuario=$data[0]['U_IdUsuario'];
        $array=array();
        
        $datas=hanacall("\"SP_INT_DATA\"('$usuario')");
        $preNew=hanaquery("select max(\"U_NroTicket\") as MAX from \"@BALANZA\" where \"U_Sucursal\"=''$sucursal'' and \"U_IdUsuario\"=''$usuario''");
        $max=intval($preNew[0]['MAX']);
        $max++;
        $codi=$datas[0]['CODI'];
        $branch=$datas[0]['RAMA'];
        $newCode="{$branch}-{$codi}-{$max}";
        $old=null;
        
        if($data[0]['Code']=='0'){
            $code=0;
            $data[0]['Code']=$newCode;
            $data[0]['Name']=$newCode;
            $data[0]['U_Observaciones']=$ob1;
          
            $resT=hanaquery('select max("U_NroTicket") as MAX from "@BALANZA" where "U_Sucursal"=\'\''.$sucursal.'\'\'');
            $ticket=isset($resT[0]['MAX'])?$resT[0]['MAX']:0;
            $ticket=intval($ticket)+1;
            $data[0]['U_NroTicket']=$ticket;
            $isNew=true;
        }
 
      
        
        
        
        session_start();
        if(isset($_SESSION['usert'])){
        $usuariot=$_SESSION['usert'];
        
        if($isNew){
            $res=callApiss('POST',$mainUrl.'U_BALANZA',$data[0],$idSesion,$usuariot, $sucursal, $code );
            $res=json_decode($res,TRUE);

             


            if(isset($res['error'])){
                echo json_encode($res);
            }else if(isset($res['U_NroDocFactura'])){
               //   query("delete from eraser where docnum_f=".$res['U_NroDocFactura']);

                  query("update eraser set Estado=2  where docnum_f=".$res['U_NroDocFactura']);


                echo json_encode(array('isNew' => $isNew,'id' => $res['Code']));
            }else{
                echo json_encode(0);
            }
        }

  
        }
        
        
        break;
        
        




case 'finishBalanza':



$idSesion=posted('idSesion');
$usuariot=posted('usuariot');
$ob1=posted('ob11');
$ob2=posted('ob22');
$index=posted('index');
$data=json_decode($_POST['array'],TRUE);
$isNew=false;
$data[0]['U_Fecha']=$fecha;
$data[0]['U_Hora']=$hora;
$sucursal=$data[0]['U_Sucursal'];
$usuario=$data[0]['U_IdUsuario'];
$array=array();

$datas=hanacall("\"SP_INT_DATA\"('$usuario')");
$preNew=hanaquery("select max(\"U_NroTicket\") as MAX from \"@BALANZA\" where \"U_Sucursal\"=''$sucursal'' and \"U_IdUsuario\"=''$usuario''");
$max=intval($preNew[0]['MAX']);
$max++;
$codi=$datas[0]['CODI'];
$branch=$datas[0]['RAMA'];
$newCode="{$branch}-{$codi}-{$max}";
$old=null;
if($data[0]['Code']=='0'){
    $code=0;
    $data[0]['Code']=$newCode;
    $data[0]['Name']=$newCode;
    $data[0]['U_Observaciones']=$ob1;
  
    $resT=hanaquery('select max("U_NroTicket") as MAX from "@BALANZA" where "U_Sucursal"=\'\''.$sucursal.'\'\'');
    $ticket=isset($resT[0]['MAX'])?$resT[0]['MAX']:0;
    $ticket=intval($ticket)+1;
    $data[0]['U_NroTicket']=$ticket;
    $isNew=true;
}else{
    $code=$data[0]['Code'];
    $data[0]['U_Observaciones2']=$ob2;
    $old=hanaquery('select * from "@BALANZA" where "Code"=\'\''.$code.'\'\'');
}
if($data[0]['U_Estado']!=='1'){
    $array['U_Estado']=$data[0]['U_Estado'];
    $array['U_FechaSal']=$date;
    $array['U_HoraSal']=$hora;
}
$array['U_Tara']=$data[0]['U_Tara'];
$array['U_Bruto']=$data[0]['U_Bruto'];
$array['U_Neto']=$data[0]['U_Neto'];
$array['U_Observaciones2']=$data[0]['U_Observaciones2'];



session_start();
if(isset($_SESSION['usert'])){
$usuariot=$_SESSION['usert'];

if($isNew){
    $res=callApiss('POST',$mainUrl.'U_BALANZA',$data[0],$idSesion,$usuariot, $sucursal, $code );
    $res=json_decode($res,TRUE);
    if(isset($res['error'])){
        echo json_encode($res);
    }else if(isset($res['U_NroDocFactura'])){
        //descomentar

        //  query("delete from eraser where docnum_f=".$res['U_NroDocFactura']);
         
          query("update eraser set Estado=2 where docnum_f=".$res['U_NroDocFactura']);



        echo json_encode(array('isNew' => $isNew,'id' => $res['Code']));
    }else{
        echo json_encode(0);
    }
}else{
    $res=callApiss('PATCH',$mainUrl.'U_BALANZA'.'(\''.$code.'\')',$array,$idSesion,$usuariot , $sucursal, $code);
    if($res!=''){
        echo json_encode($res);
        return;
    }
    echo json_encode(array('isNew' => $isNew,'id' => $code));
}
if($old!=null){
    loger($old,$usuario,$idSesion,$usuariot);
}
}


break;








































case 'news':
$idSesion=posted('idSesion');
$usuario=posted('user');
$data=json_decode($_POST['array'],TRUE);
$code=$data['document']['Code'];
$old=hanaquery('select * from "@BALANZA" where "Code"=\'\''.$code.'\'\'');
$document=$data['document'];
$lines=$data['lines'];



session_start();
if(isset($_SESSION['usert'])){
$usuariot=$_SESSION['usert'];


if($document['Code']!=$document['Name']){
    $document['Name']=$document['Code'];
    $res=callApis('POST',$mainUrl.'U_BALANZA',$document,$idSesion,$usuariot);
    $res=json_decode($res,TRUE);
    if(isset($res['error'])){
        echo json_encode($res);
        return;
    }
}else{
    if(strlen($document['U_HoraSal'])==4){
        $horaS=substr($document['U_HoraSal'],0,2).':'.substr($document['U_HoraSal'],2);
    }else {
        $horaS=substr($document['U_HoraSal'],0,1).':'.substr($document['U_HoraSal'],1);
    }
    $res=callApis('PATCH',$mainUrl.'U_BALANZA'.'(\''.$document['Code'].'\')',array('U_Tara'=>$document['U_Tara'],'U_Bruto'=>$document['U_Bruto'],'U_Neto'=>$document['U_Neto'],'U_Estado'=>$document['U_Estado'],'U_HoraSal'=>$horaS,'U_FechaSal'=>$document['U_FechaSal']),$idSesion,$_SESSION['usert']);
    if($res!=''){
        echo json_encode($res);
        return;
    }
}
$i=0;
if(count($lines)>0){
    ob_start();
    foreach ($lines as $line) {
        $code1=getMax('BALANZA1');
        $line['Code']=$code1;
        $line['Name']=$code1;
        $line['U_Nro_Ticket']=$document['Code'];
        $res1=callApis('POST',$mainUrl.'U_BALANZA1',$line,$idSesion,$usuariot);
        $res1=json_decode($res1,TRUE);
        if(isset($res1['U_ID'])){
            $i++;
        }
        ob_flush();
    }
    ob_end_flush();
}
echo json_encode(array('code'=>$document['Code'],'lines'=>$i));
if(count($old)>0){
    loger($old,$usuario,$idSesion,$usuariot);
}


}
















break;








case 'olds':
$url=$mainUrl.'U_BALANZA';
$idSesion=posted('idSesion');
$usuario=posted('user');
$data=json_decode($_POST['array'],TRUE);
$code=$data['document']['Code'];
$old=hanaquery('select * from "@BALANZA" where "Code"=\'\''.$code.'\'\'');
$document=$data['document'];
$lines=$data['lines'];


session_start();
if(isset($_SESSION['usert'])){
$usuariot=$_SESSION['usert'];


$res=callApis('PATCH',$url.'(\''.$code.'\')',$document,$idSesion,$usuariot);
$i=0;
if($res!=''){
   echo json_encode(array('document'=>0,'lines'=>$i));
   return;
}



ob_start();


foreach ($lines as $line) {
    $code1=getMax('BALANZA1');
    $line['Code']=$code1;
    $line['Name']=$code1;
    $res1=callApis('POST',$mainUrl.'U_BALANZA1',$line,$idSesion,$usuariot);
    $res1=json_decode($res1,TRUE);
    if(isset($res1['U_ID'])){
        $i++;
    }
    ob_flush();
}
ob_end_flush();
echo json_encode(array('document'=>1,'lines'=>$i));
loger($old,$usuario,$idSesion,$usuariot);





}







break;
















case 'autoBalanza':
$idSesion=posted('idSesion');
$usuario=posted('userCode');
$obs=posted('obs');
$item=posted('item');
$code=getMax('BALANZA_AUTO');
$url=$mainUrl.'U_BALANZA';

session_start();
if(isset($_SESSION['usert'])){
$usuariot=$_SESSION['usert'];
$res=callApis('PATCH',$mainUrl.'U_BALANZA'.'(\''.$item.'\')',array('U_Estado' => '4'),$idSesion,$usuariot);
if($res==""){
    $res1=callApis('POST',$mainUrl.'U_BALANZA_AUTO',array("Code"=>$code,"Name"=>$code,"U_NroTicket"=>$item,"U_IdUsuario"=>$usuario,"U_Motivo"=>$obs,"U_Fecha"=>$fecha,"U_Hora"=>$hora),$idSesion,$_SESSION['usert']);
    $res1=json_decode($res1,TRUE);
    echo json_encode(isset($res1['Code']));
    if(isset($_POST['old'])){
        $old=json_decode($_POST['old'],TRUE);
        loger($old,$usuario,$idSesion,$usuariot);
    }
}else{
    echo json_encode(false);
}
}










break;

case 'delBalanza':
$idSesion=posted('idSesion');
$obs=posted('obs');
$item=posted('item');
$usuario=posted('userCode');
$array=array();
$array['U_Estado']='3';
$array['U_Observaciones']=$obs;
$array['U_Usuario_Anulacion']=$usuario;
$array['U_Fecha_Anulacion']=$date;
$array['U_Hora_Anulacion']=$hora;


session_start();
if(isset($_SESSION['usert'])){
$usuariot=$_SESSION['usert'];
$res=callApis('PATCH',$mainUrl.'U_BALANZA'.'(\''.$item.'\')',$array,$idSesion,$usuariot);
if($res==''){
    if(isset($_POST['old'])){
        $old=json_decode($_POST['old'],TRUE);
        loger($old,$usuario,$idSesion,$usuariot); 
       
    }
}
echo json_encode($res=='');
}




break;

case 'saveDoc':
$code=getMax('BALANZA1');
$idSesion=posted('idSesion');
$data=json_decode($_POST['array'],TRUE);
$data[0]['Code']=$code;
$data[0]['Name']=$code;
$data[0]['U_Fecha']=$date;
$data[0]['U_Hora']=$hora;
$url=$mainUrl.'U_BALANZA1';
session_start();
if(isset($_SESSION['usert'])){
$usuariot=$_SESSION['usert'];
$res=callApis('POST',$url,$data[0],$idSesion,$usuariot);
$res=json_decode($res,TRUE);
echo json_encode(isset($res['U_ID']));
}


break;

case 'getEntrega':
$docEntry=posted('docEntry');
$res=hanacall("\"SP_INT_JSONENTREGA\"('$docEntry')");
echo json_encode($res);
break;

case 'getTipoDocumentos':
$res=hanaquery('select distinct("U_Tipo_Doc") as TIPO from "@BALANZA1" where "U_Tipo_Doc"!=\'\'ORDEN DE CARGA\'\'');
echo json_encode($res);
break;




case 'getFactData':
$ticket=posted('placa');
$res=hanaquery("select \"U_DocEntryFactura\" from \"@BALANZA\" where \"Code\"=''$ticket''");
$docentry=$res[0]['U_DocEntryFactura'];
$data=hanacall("\"SPLBFACTURAS\"($docentry)");
$totalBs=intval($data[0]['Total BS']);
$number=convertirMonto($totalBs);
$number=strtoupper($number);
$data[0]['textTotal']=$number;
echo json_encode($data);
break;




    case 'FN_EXXIS_FE_CABECERA_BOLIVIA':
    $DocEntry=posted('DocEntry');
    $data=hanaquery("select * from FN_EXXIS_FE_CABECERA_BOLIVIA (''$DocEntry'',13,''--'')");
    echo json_encode($data);
    break;
    

    
    case 'FN_EXXIS_FE_DETALLE_BOLIVIA':
    $DocEntry=posted('DocEntry');
    $data=hanaquery("select * from FN_EXXIS_FE_DETALLE_BOLIVIA (''$DocEntry'',13,0)");
    echo json_encode($data);
    break;

       
    

   
        case 'FN_EXXIS_ESTADO':
            $DocEntry=posted('DocEntry');
            $data=hanacall("\"SP_INT_VALIDAR_FEX\"($DocEntry)");
            echo json_encode($data);
            break;
            

           

case 'get_usuario_disponible':
    $usuario = posted('user');

     $data = hanacall("\"SP_INT_DATA\"('$usuario')");
    // //$data = hanacall("\"SP_INT_DATA\"('$usuario')");
    // // Validar que el SP haya devuelto datos
     if (empty($data) || !isset($data[0]['ALMACEN'])) {
        echo json_encode([
            "success" => false,
            "message" => "No se encontró información",
            "data" => []
        ]);
        exit; // 👈 IMPORTANTE
    }
    $almacen = addslashes($data[0]['ALMACEN']);
    $buscar_almacen = query_entrega_db("SELECT 'TRANSFERENCIAM' as value, 'TRANSFERENCIA DE MATERIAL' as text  FROM almacen_activo cc WHERE cc.ALMA = '$almacen'  AND cc.Estado = 1  "); 
   if (!empty($buscar_almacen)) {
        echo json_encode([
            "success" => true,
            "message" => "Usuario disponible",
            "data" => $buscar_almacen
        ]);
   } else {
       echo json_encode([
           "success" => false,
           "message" => "El almacén no está activo",
           "data" => []
       ]);
   }

break;




        case 'buscar_importaciones':
            $ticket=posted('ticket');
            $sucursal=posted('sucursal');
            $dr=0;
            $buscar_importaciones= query_importaciones("SELECT cc.* FROM boleta_transporte cc where cc.Ticket=$ticket  and  cc.Balanza='$sucursal' AND cc.Estado=2");
           if(count($buscar_importaciones)>0){
                $dr=$buscar_importaciones;
           }
           echo json_encode($dr);
          break;
  
  
  
          case 'sucursal_acopio':
              $sucursall= '';
              $datos_relevantes_sucursal = query_importaciones("SELECT cc.Id, cc.Descripcion, cc.Detalle, cc.Estado FROM datos_relevantes cc WHERE cc.Id IN (1) AND cc.Estado=1");
              if(count($datos_relevantes_sucursal)>0){
               $sucursall= $datos_relevantes_sucursal[0]['Detalle'];
              }
              echo json_encode($sucursall);
          break;
  

}

?>