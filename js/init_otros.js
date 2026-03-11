




function imprimirr(ticket){
//	setProgressMsg('Cargando...');
	var ff_direccion='server.php';
	send('server.php',{call:'getLast',idSesion:getSesion('idSesion'),placa:ticket,sucursal:getSesion('sucursal')},function(data){
	console.log('holaa '+JSON.stringify(data));
	var tara=data[0]['U_Tara']!=''?data[0]['U_Tara']+' KG':'';
	var bruto=data[0]['U_Bruto']!=''?data[0]['U_Bruto']+' KG':'';
	var neto=data[0]['U_Neto'];
	var sucursal_origen=data[0]['U_Sucursal'];
	var netoQQ=parseFloat(0);
	var segundo='';
	var detalle_ob='';
	var d_proveedor='';
	var d_transportadora='';
	var d_chata='SIN CHATA';
	var d_producto='';
	var d_tipo='';
	var d_origen='';
	var d_destino='';
	var f3= data[0]['U_TipoOrigen'];
	var var_int_chata=data[0]['U_ID_Chata'];
	
	if(f3==1){
		d_tipo= 'INTERNO';
	}else{
		d_tipo= 'EXTERNO';
	}
	if(data[0]['U_FechaSal']){

//      segundo=`<div>
// 	 <table style="width: -webkit-fill-available;">
// 	  <tr>
	  
// 	   <td colspan="12" align="right">    <p>SEGUNDO PESAJE : ${localDate(data[0]['U_FechaSal'].split(' ')[0])} ${data[0]['U_HoraSal']<1000?data[0]['U_HoraSal'].slice(0,1):data[0]['U_HoraSal'].slice(0,2)}:${data[0]['U_HoraSal'].slice(-2)}</p> </td>
// 	  </tr>
// 	 </table>
//    </div>`;



	 	 segundo=`<p>SEGUNDO PESAJE : ${localDate(data[0]['U_FechaSal'].split(' ')[0])} ${data[0]['U_HoraSal']<1000?data[0]['U_HoraSal'].slice(0,1):data[0]['U_HoraSal'].slice(0,2)}:${data[0]['U_HoraSal'].slice(-2)}</p>`;
	// 	 detalle_ob=`		 <div>
	// 	 <table style="width: -webkit-fill-available;">
	// 	  <tr>
	// 	   <td colspan="6" align="left">OBS. 1: ${data[0]['U_Observaciones']}</td>
	// 	   <td colspan="6" align="left">OBS. 2: ${data[0]['U_Observaciones2']}</td>
	// 	  </tr>
	// 	 </table>
	//    </div>`;

          var gy11=0;
		  var gy22=0;
          var ob11=data[0]['U_Observaciones'];
		  var ob22=data[0]['U_Observaciones2'];
		  if(ob11===null){
              gy11=1;
			  console.log("gy11 "+gy11);
		  }
		  if(ob22===null){
			 gy22=1;
			 console.log("gy22 "+gy22);
		  }
		
		  

	   if(gy11==0 && gy22==0 ){
		detalle_ob=`		 <div>
		<table style="width: -webkit-fill-available;">
		 <tr>
		  <td colspan="6" align="left">OBS. 1: ${data[0]['U_Observaciones']}</td>
		  <td colspan="6" align="left">OBS. 2: ${data[0]['U_Observaciones2']}</td>
		 </tr>
		</table>
	  </div>`;
	   }else{


		if(gy11==0 &&  gy22==1){
			detalle_ob=` <div>
			  <table style="width: -webkit-fill-available;">
			   <tr>
				<td colspan="12" align="left">OBS. 1: ${data[0]['U_Observaciones']}</td>
			   
			   </tr>
			  </table>
			</div>`;
}else{
	if(gy11==1 &&  gy22==0){
		  detalle_ob=` <div>
			  <table style="width: -webkit-fill-available;">
			   <tr>
				<td colspan="12" align="left">OBS. 2: ${data[0]['U_Observaciones2']}</td>
			   
			   </tr>
			  </table>
			</div>`;
}
}

	   }


		}else{
			if(data[0]['U_Observaciones']!=""){
				detalle_ob=`		 <div>
				<table style="width: -webkit-fill-available;">
				 <tr>
				  <td colspan="12" align="left">OBS. 1: ${data[0]['U_Observaciones']}</td>
				 
				 </tr>
				</table>
			  </div>`;
			}

		
		}
		


		console.log('detalle_ob '+detalle_ob);
		if(tara!=''&bruto!=''){
		netoQQ=parseFloat(parseFloat(neto)/parseFloat(46)).toFixed(2);
		neto+=' KG';
		netoQQ+=' QQ';
		}else{
		netoQQ='';
		neto='';
		}

					   send(ff_direccion,{call:'getLast_otros_servicios',placa:ticket,To:f3,Chata:var_int_chata},function(datadd){

						console.log('cc '+JSON.stringify(datadd));
						
						     datadd.forEach(function (valuess) {
						 	 d_proveedor= valuess.PROVEEDOR;
							 d_transportadora= valuess.TRASNPORTADORA;
							 d_origen= valuess.ORIGEN;
							 d_producto= valuess.PRODUCTO;
							 d_destino= valuess.DESTINO;

							 if(valuess.CHATA!=0){
								d_chata=valuess.CHATA;
							 }
						


							 var plan=`<!DOCTYPE html> <html> <head> <meta charset="utf-8" /> <title>Reporte</title>
							 <style type="text/css">@media print {html, body {display: block; font-family: "Calibri";font-weight:bolder; margin: 0; }
							 @page {size: 9.5cm 21.5cm;size: portrait; margin: 0mm 10mm 0mm 10mm; padding-top:4em; } }  p, .no-margin{margin: 0em;font-family: "Calibri"; }
							 .right{text-align: right; } .center{text-align: center; } </style> </head>
							 
							 
							 
							 
							 
							 <body style=""><br><br>
							 
							 <div class="right">
							 <p>USUARIO : ${data[0]['U_Nombre']}</p> 
							 <p>PRIMER PESAJE : ${localDate(data[0]['U_Fecha'].split(' ')[0])} 
							${data[0]['U_Hora']<1000?data[0]['U_Hora'].slice(0,1):data[0]['U_Hora'].slice(0,2)}:${data[0]['U_Hora'].slice(-2)}</p>
							 ${segundo}
							 
							 </div> 
					   
					   
					   
							 <div>
							 <table style="width: -webkit-fill-available;"> 
							 <tr>
								 <td colspan="6" align="left"> <p>BALANZA : ${sucursal_origen}</p>  </td> 
								 <td colspan="6" align="right"> <p>IMPORTE : ${parseFloat(data[0]['U_TotalFactura']).toFixed(2)} Bs.</p> </td>
							</tr> </table> 
							
							 </div> 
					   
							 
							   <div class="center"> <p>BOLETA DE PESAJE (${data[0]['U_Origen']}) - Nº Ticket: ${data[0]['U_NroTicket']}</p> <p>================================================</p> </div>
							 
							 
							 
								 <div>
								   <table style="width: -webkit-fill-available;">
									<tr>
									 <td colspan="6" align="left">CLIENTE : ${data[0]['U_RazonSocial']}</td>
									 <td colspan="6" align="left">PROVEEDOR : `+d_proveedor+`</td>
									</tr>
								   </table>
								 </div>
							 
							 
								 <div>
								   <table style="width: -webkit-fill-available;">
									<tr>
									 <td colspan="6" align="left">TRANSPORTADORA : `+d_transportadora+`</td>
									 <td colspan="6" align="left">PLACA : ${data[0]['U_Placa']}</td>
									 <td colspan="6" align="left">CHATA : `+d_chata+`</td>
									</tr>
								   </table>
								 </div>
							 
							 
							 
								 <div>
								   <table style="width: -webkit-fill-available;">
								   <tr>
									 <td colspan="6" align="left">CHOFER : `+data[0]['U_NombreChofer']+`</td>
									 <td colspan="6" align="left">CI. CHOFER : `+data[0]['U_CI_Chofer']+`</td>
								   </tr>
								   </table>
								  </div>
							 
							 
								 <div>
								   <table style="width: -webkit-fill-available;">
									<tr>
									 <td colspan="6" align="left">PRODUCTO : `+d_producto+`</td>
									 <td colspan="6" align="left">TIPO : `+d_tipo+`</td>
									 <td colspan="6" align="left">ORIGEN : `+d_origen+`</td>
									 <td colspan="6" align="left">DESTINO : `+d_destino+`</td>
									</tr>
							 
								 </table>
								  </div>
								  <br>
							 
							 
							 
							 
							 
							 
								  <div>
									<table style="width: -webkit-fill-available;">
								  <tr>
									<td colspan="3">PESO BRUTO</td><td colspan="3">PESO TARA</td><td colspan="3">PESO NETO(KG)</td>
									<td colspan="3">PESO NETO(QQ)</td></tr> <tr><td colspan="3">${bruto}</td><td colspan="3">${tara}</td>
								  <td colspan="3">${neto}</td><td colspan="3">${netoQQ}</td></tr> </table> 
								  </div>
								  
								  <br>
							 
					
								 ${detalle_ob}
							 
								 </body>
							 
							 
							 
								  </html>`;
							 
							 
								  console.log('plantilla '+plan);
								  hideProgress();
							     $(plan).printThis({  pageTitle: "Balanza",});
				



						  });



						});
	
	   });
	
	
	
	
	
	}

