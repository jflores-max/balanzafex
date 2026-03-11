<?php 
 
 error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Access-Control-Allow-Origin: *');

$fecha=date('Y-m-d H:i:s');
$date=date('Y-m-d');
$hora=date('H:i:s');


$token=$_GET['dato'];
             
?>




<!DOCTYPE html>
																						   <html>
																						   <head>
																							
																						
																							 <meta charset="utf-8">
																							 <meta name="viewport" content="width=device-width, initial-scale=1">
																							 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
																							 <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
																							 <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
																							 <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
																		
																							 <script src="cfg.js"></script>
  <script src="js/jquery.js"></script>
  <script src="js/index.js"></script>
  <script src="js/db.js"></script>
  <script src="js/lc.js"></script>
  <script src="js/qr.js"></script>
  <script src="js/init.js"></script>





																							
																						
																							
																							 <title> Reporte</title>
																							 <style>
																							 .espacio1{
																							   width: 100%;
																							   margin: auto;
																							   padding: 50px 20px 20px 20px;
																							   
																							 }
																					   
																							 .esp0b{
																							 
																								 width: 100%;
																								 
																							  }
																					   
																							 .esp0{
																							 
																								width: 100%;
																								margin: auto;
																							 }
																							 .esp22{
																							 
																							 width: 100%;
																							 margin: auto;
																							 text-align: center;
																						  }
																							 .esp1{
																								padding: 5px;
																								width: 100%;
																								margin: auto;
																							 }
																					   
																					   
																							 .esp1b{
																							 
																								 width: 100%;
																							 
																							  }
																						  
																						 
																							 .container, .container-lg, .container-md, .container-sm, .container-xl {
																								 max-width: 1024px;
																							 }
																					   
																					   
																							 .esp145{
																							   padding: 5px 0px 5px 0px;
																						 
																								width: 100%;
																								margin: auto;
																							 }
																							 .esp6{
																								padding: 5px;
																								width: 100%;
																								margin: auto;
																								border: 1px solid black;
																							 }
																							 .esp2{
																								padding: 10px;
																								width: 100%;
																								margin: auto;
																							 }
																						 
																							 .datp{
																							   margin: auto;
																							 font-size: 14px;
																							 font-family: sans-serif;
																							 }
																						 
																							 .datp333{
																							   margin: auto;
																							 font-size: 13px;
																							 font-family: sans-serif;
																							 }
																							 .datp1{
																							   margin: auto;
																							 font-size: 12px;
																							 font-family: sans-serif;
																							 }
																						 
																							 .datp2{
																							   margin: auto;
																							 font-size: 12px;
																							 font-family: sans-serif;
																							 }
																							 .datp2ft{
																							   margin: auto;
																							 font-size: 10px;
																							 font-family: sans-serif;
																							 }
																							 .datp3{
																							   margin: auto;
																							 font-size: 16px;
																							 font-family: sans-serif;
																							 }
																					   
																					   
																							 .datp3ff{
																								 margin: auto;
																							   font-size: 20px;
																							   font-family: sans-serif;
																							   color:red;
																							   }
																							 .datp33{
																							   margin: auto;
																							 font-size: 15px;
																							 font-family: sans-serif;
																							 }
																					   
																					   
																							 .datp33ff{
																								 margin: auto;
																							   font-size: 16px;
																							   font-family: sans-serif;
																							   color:black;
																							   }
																					   
																					   
																					   
																					   
																					   
																					   
																					   
																					   
																						   </style>
																					 
																					 
																					 
																					 
																						 <style  type="text/css">
																								 body {
																							   width: 100%;
																							   height: 100%;
																							   margin: 0;
																							   padding: 0;
																							   background-color: #FAFAFA;
																							  
																						   }
																						   * {
																							   box-sizing: border-box;
																							   -moz-box-sizing: border-box;
																						   }
																						   .page {
																							   width: 210mm;
																							   min-height: 277mm;
																							   padding: 20mm;
																							   margin: 10mm auto;
																							   border: 1px #D3D3D3 solid;
																							   border-radius: 5px;
																							   background: white;
																							   box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
																						   }
																						   .subpage {
																							   padding: 1cm;
																							   border: 5px red solid;
																							   height: 257mm;
																							   outline: 2cm #FFEAEA solid;
																						   }
																						   
																						   @page {
																							   size: A4;
																							   margin: 0;
																						   }
																						   @media print {
																							   html, body {
																								   width: 220mm;
																								   height: 280mm;        
																							   }
																							   .page {
																								   margin: 0;
																								   border: initial;
																								   border-radius: initial;
																								   width: initial;
																								   min-height: initial;
																								   box-shadow: initial;
																								   background: initial;
																								   page-break-after: always;
																							   }
																						   }
																						   /* EOS */
																						 </style>
																						   </head>
																						   <body>
																						   
																							 <div class="container" style="margin: auto;">
																							  
																							   <div class="espacio1">
																								 <div class="row" style="margin: auto;">

																								   <div style="width: 100%; display: flex;margin-block-end: auto;
																								   flex-direction: column;
																								   justify-content: center;">
																									 <!-- logo -->

																									 <input id="token" value="<?php echo $token?>"  style="display:none"  >
																									 <div  class="esp0b">
																								   
																									 <p class="datp" style="text-align: center;">Detalle</p>
																									 </div>
																									  <!-- sucursal -->
																									
																						   
																						   
																								   </div>
																						   
																								 
																						   
																							   
																								 </div>
																						   
																						   
																						   
																						   
																						   
																						   
																						   
																						   
																							   </div>
																						   
																							 
																							   
																						   
																							 </div>
																												   
																						   
																					  
																						   
																						   </body>
																												</html>


																											 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
																												<script type="text/javascript" src="print/printThis.js"></script>
																											  
																												<script type="text/javascript">
																												





																										$( document ).ready(function() {


		
																											var DocEntry1=$('#token').val();











																												send('server.php',{call:'FN_EXXIS_ESTADO',DocEntry:DocEntry1},function(data12){
											data12.forEach(function(item12,index,arr){
												var estado12 =item12['IdEstado'];
                                                 
	                                            var cuff=item12['U_EXX_FE_Cuf'];
                                                
												var legthcu= cuff.length;
											    
												var datr1=23;
												var datr2=datr1+22;
											
                                                 


												var fg1= cuff.substring(0,datr1);
											

											
												var fg2= cuff.substring(datr1,datr2);
											
												var fg3= cuff.substring(datr2,legthcu);
											

                                                var cuff1= fg1+' '+fg2+' '+fg3;
							

												switch(estado12){
												   case '1':
													   alert('Factura: '+item12['Nombre']+' '+item12['U_EXX_FE_DESERR'] +' 1 '+DocEntry1);

												

													   send('server.php',{call:'FN_EXXIS_FE_CABECERA_BOLIVIA',DocEntry:DocEntry1},function(data1){
																				data1.forEach(function(item1,index,arr){   
																					folio= item1['Folio'];
																				
																					nit= item1['nitEmisor'];
																					sucursal=item1['codigoSucursal'];
																					punto_venta=item1['codigoPuntoVenta'];
																					direccion=item1['direccion'];
																					telefono=item1['telefono'];
																					ciudad=item1['municipio'];
																
																					fecha=	item1['fechaEmision'];
																					var fg22= fecha.substring(11, 16);
																				
											                                         var fg11= fecha.substring(0,10);
																	
																					 var dateString = fg11;
																				     dateString=convertDateFormat(dateString);
																					 fecha= dateString+' '+fg22;
																	
																				

																					nombrerazonsocial=item1['nombreRazonSocial'];
																					codigo_cliente=item1['codigoCliente'];
																					nitcicex=item1['numeroDocumento'];
																					 usuario= item1['usuario'];
																
																					 tipocambio= item1['tipoCambio'];
																					 complemento= item1['complemento'];
																
																
																					 if(complemento == null){
																						complemento='vacio';
																					 }
																					 montoTotalMoneda=item1['montoTotalMoneda'];
																					 montoTotal=item1['montoTotal'];
																					 montoTotalSujetoIva=item1['montoTotalSujetoIva'];
																
																
																					 var ftm=montoTotal;

                                                                                      console.log('cam0 '+ftm);
                                                                                

																					 var ftm1 = ftm.split(',');
																				     console.log('cam1 '+ftm1);
																					 var ftm2=ftm1[0]; 
																					 console.log('cam2 '+ftm2);
																					 var ftm3 = ftm2.split('.');
																					 console.log('cam3 '+ftm3);
																					 var ui=ftm3[0]  ;
																					 var uic=ftm3[1]  ;
                                                                                     console.log('cam4 '+ui);
																					 console.log('cam5 '+uic);
																			     	 var montoTotalgy= NumeroALetras(ui) +' '+uic;
																					 
																					 
																					 //alert(gy);


																
																					send('server.php',{call:'FN_EXXIS_FE_DETALLE_BOLIVIA',DocEntry:DocEntry1},function(data2){
																					   console.log("dcd" +JSON.stringify(data2));
																						data2.forEach(function(item2,index,arr){  
																							codigo_producto=item2['codigoProducto'];
																							cantidad=item2['cantidad'];
																							descripcion=item2['descripcion'];
																							precio_unitario=item2['precioUnitario'];
																							subtotal=item2['subTotal'];
																							descuento= item2['montoDescuento'];

																							if(descuento=='0'){
                                                                                               descuento='0.00';
																							}
																							leyenda= item2['leyenda'];
																				
																
																						});
																				 


																					




																					


																						var enlace='https://siat.impuestos.gob.bo/consulta/QR?nit='+nit+'&cuf='+cuff+'&numero='+folio;		
																						getQr(enlace,function(png,svg){
																	   
																	   
																						   plantilla=  `<!DOCTYPE html>
																						   <html>
																						   <head>
																							
																						
																							 <meta charset="utf-8">
																							 <meta name="viewport" content="width=device-width, initial-scale=1">
																					
																							
																						
																			
																							 <title> Reporte</title>
																							 <style>
																							 .espacio1{
																							   width: 100%;
																							   margin: auto;
																							   padding: 50px 20px 20px 20px;
																							   
																							 }
																					   
																							 .esp0b{
																							 
																								 width: 100%;
																								 
																							  }
																					   
																							 .esp0{
																							 
																								width: 100%;
																								margin: auto;
																							 }
																							 .esp22{
																							 
																							 width: 100%;
																							 margin: auto;
																							 text-align: center;
																						  }
																							 .esp1{
																								padding: 5px;
																								width: 100%;
																								margin: auto;
																							 }
																					   
																					   
																							 .esp1b{
																							 
																								 width: 100%;
																							 
																							  }
																						  
																						 
																							 .container, .container-lg, .container-md, .container-sm, .container-xl {
																								 max-width: 1024px;
																							 }
																					   
																					   
																							 .esp145{
																							   padding: 5px 0px 5px 0px;
																						 
																								width: 100%;
																								margin: auto;
																							 }
																							 .esp6{
																								padding: 5px;
																								width: 100%;
																								margin: auto;
																								border: 1px solid black;
																							 }
																							 .esp2{
																								padding: 10px;
																								width: 100%;
																								margin: auto;
																							 }
																						 
																							 .datp{
																							   margin: auto;
																							 font-size: 14px;
																							 font-family: sans-serif;
																							 }
																						 
																							 .datp333{
																							   margin: auto;
																							 font-size: 13px;
																							 font-family: sans-serif;
																							 }
																							 .datp1{
																							   margin: auto;
																							 font-size: 12px;
																							 font-family: sans-serif;
																							 }
																						 
																							 .datp2{
																							   margin: auto;
																							 font-size: 12px;
																							 font-family: sans-serif;
																							 }
																							 .datp2ft{
																							   margin: auto;
																							 font-size: 10px;
																							 font-family: sans-serif;
																							 }
																							 .datp3{
																							   margin: auto;
																							 font-size: 16px;
																							 font-family: sans-serif;
																							 }
																					   
																					   
																							 .datp3ff{
																								 margin: auto;
																							   font-size: 20px;
																							   font-family: sans-serif;
																							   color:red;
																							   }
																							 .datp33{
																							   margin: auto;
																							 font-size: 15px;
																							 font-family: sans-serif;
																							 }
																					   
																					   
																							 .datp33ff{
																								 margin: auto;
																							   font-size: 16px;
																							   font-family: sans-serif;
																							   color:black;
																							   }
																					   
																					   
																					   
																					   
																					   
																					   
																					   
																					   
																						   </style>
																					 
																					 
																					 
																					 
																						 <style  type="text/css">
																								 body {
																							   width: 100%;
																							   height: 100%;
																							   margin: 0;
																							   padding: 0;
																							   background-color: #FAFAFA;
																							  
																						   }
																						   * {
																							   box-sizing: border-box;
																							   -moz-box-sizing: border-box;
																						   }
																						   .page {
																							   width: 210mm;
																							   min-height: 277mm;
																							   padding: 20mm;
																							   margin: 10mm auto;
																							   border: 1px #D3D3D3 solid;
																							   border-radius: 5px;
																							   background: white;
																							   box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
																						   }
																						   .subpage {
																							   padding: 1cm;
																							   border: 5px red solid;
																							   height: 257mm;
																							   outline: 2cm #FFEAEA solid;
																						   }
																						   
																						   @page {
																							   size: A4;
																							   margin: 0;
																						   }
																						   @media print {
																							   html, body {
																								   width: 220mm;
																								   height: 280mm;        
																							   }
																							   .page {
																								   margin: 0;
																								   border: initial;
																								   border-radius: initial;
																								   width: initial;
																								   min-height: initial;
																								   box-shadow: initial;
																								   background: initial;
																								   page-break-after: always;
																							   }
																						   }
																						   /* EOS */
																						 </style>
																						   </head>
																						   <body>
																						   
																							 <div class="container" style="margin: auto;">
																							  
																							   <div class="espacio1">
																								 <div class="row" style="margin: auto;">
																						   
																						   
																						   
																								   <div style="width: 40%; display: flex;margin-block-end: auto;
																								   flex-direction: column;
																								   justify-content: center;">
																									 <!-- logo -->
																									 <div  class="esp0b">
																								   
																										<img src="http://app-web-mty/balanzafexs1/img/cdcd1.png" style="width: 100%;">
																									 </div>
																									  <!-- sucursal -->
																									 <div  class="esp1b">
																									   <p class="datp" style="text-align: center;">Sucursal Nro. `+sucursal+`</p>
																								 
																									 </div>
																									 <!-- punto de venta -->
																									 <div  class="esp1b">
																									   <p class="datp" style="text-align: center;">Nro. Punto de Venta : `+punto_venta+`</p>
																							   
																									 </div>
																									  <!-- direccion -->
																									 <div  class="esp1b">
																									   <p class="datp" style="text-align: center;">`+direccion+`</p>
																									 </div>
																									  <!-- espacio -->
																								   
																									   <!-- telefono -->
																									  <div class="esp1b">
																									   <p class="datp" style="text-align: center;">Teléfono : `+telefono+`</p>
																									  </div>
																									  <!-- ciudad -->
																									  <div  class="esp1b">
																									   <p class="datp" style="text-align: center;">`+ciudad+` - Bolivia</p>
																									   </div>
																						   
																						   
																								   </div>
																						   
																								   <div style="width: 25%;margin: auto;">
																								   
																								   
																								   </div>
																						   
																								   <div style="width: 13%;    margin-block-end: auto; display: flex;
																								   flex-direction: column;
																								   justify-content: center;">
																								   
																								   <div  class="esp1">
																								   
																									<strong><p class="datp1">NIT </p></strong> 
																								  </div>
																								   <!-- sucursal -->
																								  <div  class="esp1">
																									 <strong><p class="datp1">FACTURA N°</p></strong> 
																							  
																								  </div>
																								  <!-- punto de venta -->
																								  <div  class="esp1">
																								   <strong> <p class="datp1">CUF</p></strong>  
																							
																								  </div>
																						   
																								  <!-- punto de venta -->
																								  <div  class="esp1">
																								   <strong> <p class="datp1">ACTIVIDAD</p></strong>  
																							
																								  </div>
																								   </div>
																						   
																						   
																								   <div style="width: 17%;    margin-block-end: auto; display: flex;
																								   flex-direction: column;
																								   justify-content: center;">
																								   
																								   <div  class="esp145">
																								   
																								   <strong>  <p class="datp2" style="text-align: end;">`+nit+`</p></strong>  
																								  </div>
																								   <!-- sucursal -->
																								  <div  class="esp145">
																									<p class="datp2" style="text-align: end;">`+folio+`</p>
																							  
																								  </div>
																								  <!-- punto de venta -->
																								  <div  class="esp145">
																									<p class="datp2">`+cuff1+`</p>
																							
																								  </div>
																						   
																								   
																								  <div  class="esp145">
																								  <p class="datp2ft">VENTA AL POR MAYOR DE 
																								  M A T E R I A L E S D E 
																								  CONSTRUCCIÓN, ARTÍCULOS 
																								  DE FERRETERÍA, EQUIPO Y 
																								  MATERIALES DE FONTANERÍA Y 
																								  CALEFACCIÓN.
																								  </p>
																						  
																								</div>
																		   
																		   
																								   </div>
																						   
																						   
																								 </div>
																						   
																						   
																								 <div class="row" style="margin: auto;padding: 10px 0px 10px 0px;">
							   
																								 <div style="width: 100%;margin: auto;">
																								  <div class="esp22">
																								
																								  <strong><p class="datp3ff">FACTURA</p></strong>  
																								 </div>
																								  <!-- sucursal -->
																								  <div class="esp22">
																								
																								  <strong> <p class="datp33ff">(Con Derecho a Crédito Fiscal)</p></strong> 
																								 </div>
																							 
																						
																						
																								</div>
																							  </div>
																						
																						   
																						   
																								 <div class="row" style="margin: auto; padding: 10px 0px 10px 0px;">
																						   
																						   
																						   
																								   <div style="width: 20%;margin-block-end: auto; display: flex;
																								   flex-direction: column;
																								   justify-content: center;">
																								
																									  <!-- sucursal -->
																									 <div  class="esp1">
																									  <strong><p class="datp">Fecha:</p></strong> 
																								 
																									 </div>
																									 <!-- punto de venta -->
																									 <div  class="esp1">
																									   <strong> <p class="datp">Nombre/Razón Social:</p></strong> 
																							   
																									 </div>
																									  <!-- direccion -->
																									 <div  class="esp1">
																									   <strong> <p class="datp">Código de Cliente:</p></strong> 
																									 </div>
																									 
																						   
																						   
																								   </div>
																						   
																								   <div style="width: 2%;margin: auto;">
																								   
																								   
																								   </div>
																						   
																								 
																						   
																								   <div style="width: 15%;margin-block-end: auto;  display: flex;
																								   flex-direction: column;
																								   justify-content: center;">
																								
																									  <!-- sucursal -->
																									 <div  class="esp1">
																									   <p class="datp">`+fecha+`</p>
																								 
																									 </div>
																									 <!-- punto de venta -->
																									 <div  class="esp1">
																									   <p class="datp">`+nombrerazonsocial+`</p>
																							   
																									 </div>
																									  <!-- direccion -->
																									 <div  class="esp1">
																									   <p class="datp">`+codigo_cliente+`</p>
																									 </div>
																									 
																						   
																						   
																								   </div>
																						   
																								   <div style="width: %;margin: auto;">
																								   
																								   
																								   </div>
																						   
																								   <div style="width: 12%;margin-block-end: auto;  display: flex;
																								   flex-direction: column;
																								   justify-content: center;">
																								
																									  <!-- sucursal -->
																									 <div  class="esp1">
																									  <strong><p class="datp">NIT/CI/CEX:</p></strong> 
																								 
																									 </div>
																									 <!-- punto de venta -->
																									 <div  class="esp1">
																									  <strong><p class="datp">Complemento:</p></strong> 
																							   
																									 </div>
																									
																									 
																									 <!-- punto de venta -->
																									 <div  class="esp1">
																									  <strong><p class="datp">Tipo Cambio:</p></strong> 
																							   
																									 </div>
																						   
																								   </div>
																								   <div style="width: 2%;margin: auto;">
																								   
																								   
																								   </div>
																								   <div style="width: 12%;margin-block-end: auto;  display: flex;
																								   flex-direction: column;
																								   justify-content: end;">
																								
																									  <!-- sucursal -->
																									 <div  class="esp1">
																									   <p class="datp" style="text-align: end;">`+nitcicex+`</p>
																								 
																									 </div>
																									 <!-- punto de venta -->
																									 <div  class="esp1">
																									   <p class="datp" style="text-align: end;">`+complemento+`</p>
																							   
																									 </div>
																									 <!-- punto de venta -->
																									 <div  class="esp1">
																									   <p class="datp" style="text-align: end;">`+tipocambio+`</p>
																							   
																									 </div>
																									 
																						   
																						   
																								   </div>
																						   
																							   
																								 </div>
																						   
																						   
																						   
																						   
																						   
																								 <div class="row" style="margin: auto; border: 1px solid black;">
																						   
																						   
																						   
																								   <div style="width: 20%;margin-block-end: auto; display: flex;
																								   flex-direction: column;
																								   justify-content: center; border-right: 1px  solid black;">
																								
																									  <!-- sucursal -->
																									 <div  class="esp1">
																										   <p class="datp">Cod. Prod.</p>
																								 
																									 </div>
																								  
																								   </div>
																						   
																							   
																						   
																								 
																						   
																								   <div style="width: 15%;margin-block-end: auto;  display: flex;
																								   flex-direction: column;
																								   justify-content: center; border-right: 1px  solid black;">
																								
																									  <!-- sucursal -->
																									 <div  class="esp1">
																									   <p class="datp">Cantidad</p>
																								 
																									 </div>
																								
																								   </div>
																						   
																							  
																						   
																								   <div style="width:15%;margin-block-end: auto;  display: flex;
																								   flex-direction: column;
																								   justify-content: center; border-right: 1px  solid black;">
																								
																									  <!-- sucursal -->
																									 <div  class="esp1">
																								 <p class="datp">Descripción</p>
																								 
																									 </div>
																									
																								   </div>
																								
																								   <div style="width: 7%;margin-block-end: auto;  display: flex;
																								   flex-direction: column;
																								   justify-content: center; border-right: 1px  solid black;">
																								
																									  <!-- sucursal -->
																									 <div  class="esp1">
																									  <p class="datp">Und.</p>
																								 
																									 </div>
																									
																								   </div>
																						   
																						   
																						   
																								   <div style="width: 15%;margin-block-end: auto;  display: flex;
																								   flex-direction: column;
																								   justify-content: center;border-right: 1px  solid black;">
																								
																									  <!-- sucursal -->
																									 <div  class="esp1">
																									<p class="datp">Prec.Unit</p>
																								 
																									 </div>
																									
																								   </div>
																						   
																		   
																								   <div style="width: 15%;margin-block-end: auto;  display: flex;
																								   flex-direction: column;
																								   justify-content: center;border-right: 1px  solid black;">
																								
																									  <!-- sucursal -->
																									 <div  class="esp1">
																									<p class="datp">Descuento</p>
																								 
																									 </div>
																									
																								   </div>
																		   
																								   <div style="width: 13%;margin-block-end: auto;  display: flex;
																								   flex-direction: column;
																								   justify-content: center; ">
																								
																									  <!-- sucursal -->
																									 <div  class="esp1">
																										<p class="datp">SubTotal</p>
																								 
																									 </div>
																								  
																								   
																								   </div>
																						   
																								 </div>
																						   
																						   
																						   
																						   
																						   
																						   
																						   
																								 <div class="row" style="margin: auto; border: 1px solid black;">
																						   
																						   
																						   
																								   <div style="width: 20%; display: flex;
																								   flex-direction: column;
																								   justify-content: center; border-right: 1px  solid black;">
																								
																								
																									 <!-- punto de venta -->
																									 <div  class="esp1">
																									   <p class="datp">`+codigo_producto+`</p>
																							   
																									 </div>
																								   </div>
																						   
																							   
																						   
																								 
																						   
																								   <div style="width: 15%;  display: flex;
																								   flex-direction: column;
																								   justify-content: center; border-right: 1px  solid black;">
																								
																							  
																									 <div  class="esp1">
																									   <p class="datp">`+cantidad+`</p>
																							   
																									 </div>
																								   </div>
																						   
																							  
																						   
																								   <div style="width:15%; display: flex;
																								   flex-direction: column;
																								   justify-content: center;border-right: 1px  solid black;">
																								
																						   
																									 <div  class="esp1">
																									  <p class="datp">`+descripcion+`</p>
																							   
																									 </div>
																								   </div>
																								
																								   <div style="width: 7%; display: flex;
																								   flex-direction: column;
																								   justify-content: center; border-right: 1px  solid black;">
																								
																						   
																									 <div  class="esp1">
																										<p class="datp">UNI</p>
																							   
																									 </div>
																								   </div>
																						   
																						   
																						   
																								   <div style="width: 15%; display: flex;
																								   flex-direction: column;
																								   justify-content: center; border-right: 1px  solid black;">
																								
																						   
																									 <div  class="esp1">
																									   <p class="datp">`+precio_unitario+`</p>
																							   
																									 </div>
																								   </div>
																						   
																		   
																								   <div style="width: 15%;  display: flex;
																								   flex-direction: column;
																								   justify-content: center;border-right: 1px  solid black; ">
																								
																								
																									 <div  class="esp1">
																										<p class="datp">`+descuento+`</p> 
																							   
																									 </div>
																								   
																								   </div>
																						   
																		   
																								   <div style="width: 13%;  display: flex;
																								   flex-direction: column;
																								   justify-content: center; ">
																								
																								
																									 <div  class="esp1">
																										<p class="datp">`+subtotal+`</p> 
																							   
																									 </div>
																								   
																								   </div>
																						   
																						   
																							   
																								 </div>
																						   
																						   
																						   
																						   
																						   
																						   
																						   
																						   
																								 <div class="row" style="margin: auto; padding: 20px 0px 20px 0px;">
																						   
																						   
																						   
																								   <div style="width: 7%;margin: auto; display: flex;
																								   flex-direction: column;
																								   justify-content: center;">
																								
																									  <!-- sucursal -->
																									 <div  class="esp1">
																									  <strong><p class="datp">SON :</p></strong> 
																								 
																									 </div>
																								 
																						   
																								   </div>
																						   
																								   <div style="width: 57%;margin: auto; display: flex;
																								   flex-direction: column;
																								   justify-content: center;">
																								
																									  <!-- sucursal -->
																									 <div  class="esp1">
																									  <strong><p class="datp">`+montoTotalgy +`/100 BOLIVIANOS.</p></strong> 
																								 
																									 </div>
																								   </div>
																						   
																						   
																						   
																								   <div style="width: 28%;margin: auto; text-align: end; display: flex;
																								   flex-direction: column;
																								   justify-content: center;">
																								
																									  <!-- sucursal -->
																									 <div  class="esp1">
																									   <strong><p class="datp333">SUBTOTAL Bs</p></strong>
																								 
																									 </div>
																									 <!-- punto de venta -->
																									 <div  class="esp1">
																									 <strong><p class="datp333">DESCUENTO Bs</p></strong>  
																							   
																									 </div>
																					   
																									 
																									 <div  class="esp1">
																									  <strong><p class="datp333">TOTAL Bs</p></strong>
																								 
																									 </div>
																									 <!-- punto de venta -->
																									 <div  class="esp1">
																									   <strong><p class="datp333">IMPORTE BASE CREDITO FISCAL Bs</p></strong> 
																							   
																									 </div>
																									  <!-- direccion -->
																									 <div  class="esp1">
																									  <strong><p class="datp333">IMPORTE TOTAL USD</p></strong> 
																									 </div>
																						   
																								   </div>
																						   
																								   <div style="width: 2%;margin: auto;">
																								   
																								   
																								   </div>
																						   
																							   
																							   
																						   
																								   <div style="width: 6%;margin: auto; text-align: end;  display: flex;
																								   flex-direction: column;
																								   justify-content: center;">
																								
																		   
																		   
																		   
																		   
																								   <div  class="esp1">
																								   <strong> <p class="datp333" style="text-align: end;">`+subtotal+`</p></strong>
																							  
																								  </div>
																								  <!-- punto de venta -->
																								  <div  class="esp1">
																									<strong>  <p class="datp333" style="text-align: end;">`+descuento+`</p></strong>
																							
																								  </div>
																								   <!-- direccion -->
																								  <div  class="esp1">
																									<strong>  <p class="datp333" style="text-align: end;">`+montoTotal+`</p></strong>
																								  </div>
																								  
																								  <div  class="esp1">
																									<strong></strong> <p class="datp333" style="text-align: end;">`+montoTotalSujetoIva+`</p></strong>
																							  
																								  </div>
																								  <!-- punto de venta -->
																								  <div  class="esp1">
																									<strong>  <p class="datp333" style="text-align: end;">`+montoTotalMoneda+`</p></strong>
																							
																								  </div>
																		   
																		   
																		   
																						  
																						   
																								   </div>
																						   
																							   
																								 </div>
																						   
																						   
																						   
																						   
																						   
																						   
																								 <div class="row" style="margin: auto; padding: 20px 0px 20px 0px;">
																						   
																						   
																								   <div style="width: 75%;margin: auto; text-align: center; display: flex;
																								   flex-direction: column;
																								   justify-content: center;">
																								
																									<div  class="esp1" style="text-align: initial;">
																									<p class="datp333">El importe de esta factura, deberá ser pagado en dólares americanos o en su equivalente en bolivianos al tipo de cambio vigente en la fecha 
																									de pago.</p>  
																									</div>
																									  <!-- sucursal -->
																									 <div  class="esp1" style="text-align: initial;">
																									   <p class="datp333">ESTA FACTURA CONTRIBUYE AL DESARROLLO DEL PAÍS, EL USO ILÍCITO SERÁ SANCIONADO PENALMENTE DE ACUERDO A LEY</p>
																								 
																									 </div>
																									 <!-- punto de venta -->
																									 <div  class="esp1" style="text-align: initial;">
																									 <p class="datp333">`+leyenda+`</p>
																							   
																									 </div>
																									  <!-- direccion -->
																									 <div  class="esp1" style="text-align: initial;">
																									 <p class="datp333">Este documento es una impresión de un Documento Digital emitido en una Modalidad de Facturación en Línea</p> 
																									 </div>
																									 
																									 <div  class="esp1" style="text-align: initial;">
																									<p class="datp333">Usuario : `+usuario+`</p>
																								 
																									 </div>
																								 
																						   
																						   
																								   </div>
																						   
																								   <div style="width: 5%;margin: auto;">
																								   
																								   
																								   </div>
																						   
																								   <div style="width: 20%;margin: auto; display: flex;
																								   flex-direction: column;
																								   justify-content: center;">
																								
																									  <!-- sucursal -->
																									 <div  class="esp1">
																									 <img class="qrcode" style="width:100%;height:100%;" src="${png}">
																								 
																									 </div>
																								 
																						   
																								   </div>
																							   
																						   
																							   
																						   
																							   
																								 </div>
																						   
																						   
																						   
																						   
																						   
																						   
																						   
																						   
																							   </div>
																						   
																							 
																							   
																						   
																							 </div>
																												   
																						   
																					  
																						   
																						   </body>
																												</html>`;
							    

																												console.log(plantilla);
																											
																												$(plantilla).printThis({
																						  
																						  
																				  
																												});


																												setTimeout(function(){
																											
																													location.reload(true);
                                                                                                             	},2000);

																											
																						   hideProgress();
																			
																						
																				   });
																	   
																
																				 











																				
																				     	});
																
																			    	});
																			     });



												   break;
												   case '2':
								  
													   alert('Factura: '+item12['Nombre'] +' '+item12['U_EXX_FE_DESERR'] +' 2 ' +DocEntry1);
												        hideProgress();








													   break;
													   case '3':
														   alert(item12['Nombre']  +' '+item12['U_EXX_FE_DESERR'] +' 3 '+DocEntry1);
														   hideProgress();
														   break;
														   case '4':
															   alert('Factura: '+item12['Nombre'] +' '+item12['U_EXX_FE_DESERR']+' 4 '+DocEntry1);
															   hideProgress();
															   break;
															   case '5':
																   alert('Factura: '+item12['Nombre'] +' '+item12['U_EXX_FE_DESERR'] +' 5 '+DocEntry1 );
																   hideProgress();
																   break;
																   case '6':
																	   alert('Factura: '+item12['Nombre'] +' '+item12['U_EXX_FE_DESERR']+' 6 '+DocEntry1 );
																	   hideProgress();
																	   break;
																	   case '7':
																		   alert('Factura: '+item12['Nombre'] +' '+item12['U_EXX_FE_DESERR'] +' 7 '+DocEntry1 );
																		   hideProgress();
																		   break;
																		   case '8':
																			   alert('Factura: '+item12['Nombre'] +' '+item12['U_EXX_FE_DESERR'] +' 8 '+DocEntry1 );
																	
																			 
																			//    send('server.php',{call:'FN_EXXIS_FE_CABECERA_BOLIVIA',DocEntry:DocEntry1},function(data1){
																			// 	data1.forEach(function(item1,index,arr){   
																			// 		folio= item1['Folio'];
																				
																			// 		nit= item1['nitEmisor'];
																			// 		sucursal=item1['codigoSucursal'];
																			// 		punto_venta=item1['codigoPuntoVenta'];
																			// 		direccion=item1['direccion'];
																			// 		telefono=item1['telefono'];
																			// 		ciudad=item1['municipio'];
																
																			// 		fecha=	item1['fechaEmision'];
																			// 		var fg22= fecha.substring(11, 16);
																				
											                                //          var fg11= fecha.substring(0,10);
																	
																			// 		 var dateString = fg11;
																			// 	     dateString=convertDateFormat(dateString);
																			// 		 fecha= dateString+' '+fg22;
																	
																				

																			// 		nombrerazonsocial=item1['nombreRazonSocial'];
																			// 		codigo_cliente=item1['codigoCliente'];
																			// 		nitcicex=item1['numeroDocumento'];
																			// 		 usuario= item1['usuario'];
																
																			// 		 tipocambio= item1['tipoCambio'];
																			// 		 complemento= item1['complemento'];
																
																
																			// 		 if(complemento == null){
																			// 			complemento='vacio';
																			// 		 }
																			// 		 montoTotalMoneda=item1['montoTotalMoneda'];
																			// 		 montoTotal=item1['montoTotal'];
																			// 		 montoTotalSujetoIva=item1['montoTotalSujetoIva'];
																
																
																			// 		 var ftm=montoTotal;

                                                                            //           console.log('cam0 '+ftm);
                                                                                

																			// 		 var ftm1 = ftm.split(',');
																			// 	     console.log('cam1 '+ftm1);
																			// 		 var ftm2=ftm1[0]; 
																			// 		 console.log('cam2 '+ftm2);
																			// 		 var ftm3 = ftm2.split('.');
																			// 		 console.log('cam3 '+ftm3);
																			// 		 var ui=ftm3[0]  ;
																			// 		 var uic=ftm3[1]  ;
                                                                            //          console.log('cam4 '+ui);
																			// 		 console.log('cam5 '+uic);
																			//      	 var montoTotalgy= NumeroALetras(ui) +' '+uic;
																					 
																					 
																			// 		 //alert(gy);


																
																			// 		send('server.php',{call:'FN_EXXIS_FE_DETALLE_BOLIVIA',DocEntry:DocEntry1},function(data2){
																			// 		   console.log("dcd" +JSON.stringify(data2));
																			// 			data2.forEach(function(item2,index,arr){  
																			// 				codigo_producto=item2['codigoProducto'];
																			// 				cantidad=item2['cantidad'];
																			// 				descripcion=item2['descripcion'];
																			// 				precio_unitario=item2['precioUnitario'];
																			// 				subtotal=item2['subTotal'];
																			// 				descuento= item2['montoDescuento'];

																			// 				if(descuento=='0'){
                                                                            //                    descuento='0.00';
																			// 				}
																			// 				leyenda= item2['leyenda'];
																				
																
																			// 			});
																				 





																			//              	var enlace='https://siat.impuestos.gob.bo/consulta/QR?nit='+nit+'&cuf='+cuff+'&numero='+folio;		
																			// 	           getQr(enlace,function(png,svg){
																
																
																
																
																					
								
								
																			// 			//	$('.demo_factura').html(plantilla);
																				   
																			// 				//   $(plantilla).printThis({
																						   
																						   
																				   
																			// 				//   });



																		    //              		//win.document.write(``);
																
																
																
																							
																					 
												
																
																			//                    	//  win.document.close(); 
																		    //             		//  win.onload=function(){ 
																			//                 	// 	win.focus(); 
																			// 	             	//     win.print();
																			// 		            //     win.close();
																			// 	                //  };
																			// 	             	hideProgress();
																		    //                  	});
																
																				
																			// 	     	});
																
																			//     	});
																			//      });

																			   break;

												}
										   
												



											});
                                           
							         	});





									});






																				
																												
																												
																											














																												</script>