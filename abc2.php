<?php


require_once(dirname(__FILE__).'/class/class.phpmailer.php');
require_once(dirname(__FILE__).'/lib/Exception.php');
require_once(dirname(__FILE__).'/lib/PHPMailer.php');
require_once(dirname(__FILE__).'/lib/SMTP.php');


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