<?php
	$ubii='';
	$code= $_POST['code'];
   if(!isset($code)){
	   header("location: index.html");
   }


?>



<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title >BALANZA ELECTRONICA</title>
	<link rel="shortcut icon" href="img/icon.png" type="image/x-icon" />
	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">


	<link type="text/css" rel="stylesheet" href="css_otros/bootstrap.min.css" />


	<link type="text/css" rel="stylesheet" href="css_otros/style.css" />



    <link href="css_otros/css/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="css_otros/css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<link href="css_otros/css/nprogress/nprogress.css" rel="stylesheet">
    <link href="css_otros/css/iCheck/skins/flat/green.css" rel="stylesheet">
	<link href="css_otros/css/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet"/>
	<link href="css_otros/css/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">



       <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

		<link href="css_otros/css_aux_registrar_solicitud.css" rel="stylesheet">
	
		<style type="text/css">
			.centred {
				position: absolute;
				left: 50%;
				top: 50%;
				-webkit-transform: translate(-50%, -50%);
				transform: translate(-50%, -50%);
			}
  </style>

		<style>
#toast-container {
    position: sticky;
    z-index: 1055;
    top: 0
}

#toast-wrapper {
    position: absolute;
    top: 0;
    right: 0;
    margin: 5px
}

#toast-container > #toast-wrapper > .toast {
    min-width: 150px
}

#toast-container > #toast-wrapper > .toast >.toast-header strong {
    padding-right: 20px;
	font-size: 11px;
}
			</style>



		<style>

.form-control {
    display: block;
    width: 100%;
    padding: 0.375rem 0.75rem;
    font-size: 15px;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: 0.25rem;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}

.container {
    max-width: 100%
}

			.bootstrap-select>.dropdown-toggle.bs-placeholder{
				color: white;
				font-size: 12px;

			}

			.bootstrap-select .dropdown-menu.inner {
				position: static;
				float: none;
				border: 0;
				padding: 0;
				margin: 0;
				border-radius: 0;
				-webkit-box-shadow: none;
				box-shadow: none;
				font-size: 12px;
			}
			.btn:not(:disabled):not(.disabled) {
				cursor: pointer;
				font-size: 13px;
			}


			.bootstrap-select .dropdown-toggle .filter-option {
				position: absolute;
				top: 0;
				left: 0;
				padding-top: inherit;
				padding-right: inherit;
				padding-bottom: inherit;
				padding-left: inherit;
				height: 100%;
				width: 100%;
				text-align: left;
				font-size: 12px;
			}


			.bootstrap-select .dropdown-toggle .caret {
				position: absolute;
				top: 50%;
				right: 12px;
				margin-top: -4px;
				vertical-align: middle;
			}

			.modal-dialog {
				width: 600px;
				margin: 100px auto;
			}



			[type="file"] + label {
				font-family: sans-serif;
				background: #f44336;
				border: 2px solid #f44336;
				border-radius: 3px;
				color: #fff;
				cursor: pointer;
				transition: all 0.2s;
				margin: auto;
				font-size: 12px;
				padding: 2px 0px;
			}




										 </style>

</head>

<body style="background-image: url('img_otros/chatarra.jpg');">

			<div class="container" style="background-image: url('img_otros/chatarra.jpg');">
				<div class="row">
					<div class="booking-form">

					<input id="ubii" value="<?php echo $ubii?>"style="display:none">
					<input id="code" value="<?php echo $code?>"style="display:none">







						<div class="row" style="margin: auto; border: 1px solid white;">


							<div style="width: 20%;margin:auto; display: flex;
							flex-direction: column;
							justify-content: center;">
							  <!-- logo -->
							  <div  class="esp0" >
							       <img src="" id="logo"  style="width: 100%;"/>


							  </div>

							</div>

							<div style="width: 50%; display: flex;
							flex-direction: column;
							justify-content: center;    border-right: 1px solid white;
							 border-left: 1px solid white;">


							<div  class="esp1center">

							<strong><p class="datp1">BALANZA ELECTRONICA</p></strong>
							 </div>




							</div>

							<div style="width: 30%; margin: auto; display: flex;
							flex-direction: column;
							justify-content: center;">


							<!-- sucursal -->
							 <div  class="esp1center">


<div class="row" style="margin: auto; border: 1px solid white;">

<div style="width: 100%; display: flex;flex-direction: column; justify-content: center;  border-right: 1px solid white;">


<div id="documentos" class="input-field col s4"></div>



</div>
</div>











							 </div>


							</div>


							</div>






	<input id="id" type="hidden" class="form" value="0">
    <input id="docnum_f" type="hidden">
    <input id="docentry_f" type="hidden">
    <input id="docnum_p" type="hidden">
    <input id="docentry_p" type="hidden">
    <input id="docnum_e" type="hidden">
    <input id="docentry_e" type="hidden">

    <input id="top" type="hidden" value="0">







	<div class="row" style="margin: auto; border: 1px solid white;">
								<div style="width: 60%; display: flex;flex-direction: column; justify-content: center;  border-right: 1px solid white;">


								<div class="row" style="margin: auto;    width: 100%;">



								</div>

								</div>


								<div style="width: 20%; display: flex;flex-direction: column; justify-content: center;     border-right: 1px solid white;">


								
							<div class="row" style="margin: auto;">

<div style="width: 100%; display: flex;flex-direction: column; justify-content: center;">
<label  style="color:white">ESTADO</label>

<select id="estado" class="nat"  style="color: white;
    border: 1px solid #fff;
    background-color: transparent;
    font-size: 15px;" disabled>
<option value="1">INICIAL</option>
<option value="2">FINALIZADO</option>
<option value="4">PENDIENTE</option>
</select>

</div>
  </div>


									</div>



									<div style="width: 20%; display: flex;flex-direction: column; justify-content: center;  ">
									<div class="row" style="margin: auto;">

<div style="width: 100%; display: flex;flex-direction: column; justify-content: center;  ">
<label style="color:white">TIPO DE SERVICIO</label>
        <select id="origen" class="nat form" class="nat" style="color: white;
    border: 1px solid #fff;
    background-color: transparent;
    font-size: 15px;WIDTH: 100%;"  disabled>
           <option value="CONTADO">CONTADO</option>
           <option value="CREDITO">CREDITO</option>
           <option value="CONTADO">REEMPLAZO TICKET CONTADO</option>
           <option  value="OTROS SERVICIOS">OTROS SERVICIOS</option>
         </select>


</div>
  </div>


									</div>


							 </div>























	<div class="row" style="margin: auto; border: 1px solid white;">
	<div style="width: 100%; display: flex;
							flex-direction: column;
							justify-content: center;    border-right: 1px solid white;
							 border-left: 1px solid white;">


							<div  class="esp1center">

							<strong><p class="datp1" id="titlel">Datos Informativos</p></strong>
							 </div>




							</div>

    </div>







	<div class="row" style="margin: auto; border: 1px solid white;">
								<div style="width: 35%; display: flex;flex-direction: column; justify-content: center;  border-right: 1px solid white;">


								<div class="row" style="margin: auto;    width: 100%;">
									<div  class="esp22nc1_title">


										<div style="display: flex;flex-direction: column; justify-content: center; margin: auto; width: 100%; ">
										<div class="row" style="margin: auto;    width: 100%;">


											<div class="datp1  form-group">
												<input  disabled class="form-control form"  value="0000-00-00 00:00:00" id="fecha1" type="text" placeholder="Primer Pesaje">
												<span class="form-label">Primer Pesaje</span>
											</div>
										</div>
										</div>

									</div>


								</div>

								</div>


								<div style="width: 35%; display: flex;flex-direction: column; justify-content: center;  border-right: 1px solid white;">


									<div class="row" style="margin: auto;    width: 100%;">
										<div  class="esp22nc1_title">


											<div style="display: flex;flex-direction: column; justify-content: center; margin: auto; width: 100%; ">
											<div class="row" style="margin: auto;    width: 100%;">

												<div class="datp1  form-group">
													<input  disabled  class="form-control  form"  value="0000-00-00 00:00:00" id="fecha2" type="text" placeholder="Segundo Pesaje">
													<span class="form-label">Segundo Pesaje</span>
												</div>
											</div>
											</div>

										</div>


									</div>

									</div>



									<div style="width: 30%; display: flex;flex-direction: column; justify-content: center;  border-right: 1px solid white;">


										<div class="row" style="margin: auto;    width: 100%;">
											<div  class="esp22nc1_title">


												<div style="display: flex;flex-direction: column; justify-content: center; margin: auto; width: 100%; ">
												<div class="row" style="margin: auto;    width: 100%;">


													<div class="datp1 form-group">
														<input  disabled   class="form-control  form" id="ticket"  value="0" type="text" placeholder="Ticket">
														<span class="form-label">Ticket</span>
													</div>
												</div>
												</div>

											</div>


										</div>

										</div>


							 </div>









							 <div class="row" style="margin: auto; border: 1px solid white;">
								<div style="width: 60%; display: flex;flex-direction: column; justify-content: center;  border-right: 1px solid white;">


								<div class="row" style="margin: auto;    width: 100%;">
									<div  class="esp22nc1_title">


										<div style="display: flex;flex-direction: column; justify-content: center; margin: auto; width: 100%; ">
										<div class="row" style="margin: auto;    width: 100%;">


											<div class="datp1  form-group">
												<input  disabled   class="form-control form" value="Usuario" id="usuario" type="text" placeholder="Usuario">
												<span class="form-label">Usuario</span>
											</div>
										</div>
										</div>

									</div>


								</div>

								</div>


								<div style="width: 40%; display: flex;flex-direction: column; justify-content: center;  border-right: 1px solid white;">


									<div class="row" style="margin: auto;    width: 100%;">
										<div  class="esp22nc1_title">


											<div style="display: flex;flex-direction: column; justify-content: center; margin: auto; width: 100%; ">
											<div class="row" style="margin: auto;    width: 100%;">

												<div class="datp1  form-group">
													<input  disabled   class="form-control  form" value="Sucursal" id="sucursal" type="text" placeholder="Sucursal">
													<span class="form-label">Sucursal</span>
												</div>
											</div>
											</div>

										</div>


									</div>

									</div>


							 </div>









         <br>





















							<div class="row" style="margin: auto; border: 1px solid white;">
								<div style="width: 100%; display: flex;flex-direction: column; justify-content: center;  border-right: 1px solid white;">


								<div class="row" style="margin: auto;    width: 100%;">
									<div  class="esp22nc1_title">


										<div style="display: flex;flex-direction: column; justify-content: center; margin: auto; width: 100%; ">
										<div class="row" style="margin: auto;    width: 100%;">

											<div class="datp1 form-group">
												<input list="brow" class="form-control form" onkeyup="mayus(this);"   value="Cliente" id="cliente" type="text" placeholder="Cliente">
												<span class="form-label">Cliente</span>

												  <datalist id="brow">

												  </datalist>

											</div>



										</div>
										</div>

									</div>


								</div>

								</div>

							 </div>













							 <div class="row" style="margin: auto; border: 1px solid white;">
								<div style="width: 60%; display: flex;flex-direction: column; justify-content: center;  border-right: 1px solid white;">


								<div class="row" style="margin: auto;    width: 100%;">
									<div  class="esp22nc1_title">


										<div style="display: flex;flex-direction: column; justify-content: center; margin: auto; width: 100%; ">
										<div class="row" style="margin: auto;    width: 100%;">
										    <input   id="proveedor_did" class="hide"  value="0" type="text" />
											<div class="datp1 form-group">
												<input  list="brow1"  onkeyup="mayus(this);"  oninput="seleccionv1(this,'brow1')"   value="Proveedor"  class="form-control form"  id="proveedor"  name="proveedor" type="text" placeholder="Proveedor">
												
												<span class="form-label">Proveedor</span>

												  <datalist id="brow1">
												  </datalist>




											</div>
										</div>
										</div>

									</div>


								</div>

								</div>










								<div style="width: 20%; display: flex;flex-direction: column; justify-content: center;  border-right: 1px solid white;">


<div class="row" style="margin: auto;    width: 100%;">
	<div  class="esp22nc1_title">


		<div style="display: flex;flex-direction: column; justify-content: center; margin: auto; width: 100%; ">
		<div class="row" style="margin: auto;    width: 100%;">



			<div class="datp1 form-group">
				<input class="form-control" id="CINITP" onkeyup="mayus(this);" value="" type="text" placeholder="CI/NIT">
				<span class="form-label">CI/NIT</span>

			</div>
		</div>
		</div>

	</div>


</div>

</div>



<div style="width: 20%; display: flex;flex-direction: column; justify-content: center;  border-right: 1px solid white;">


<div class="row" style="margin: auto;    width: 100%;">
	<div  class="esp22nc1_title">


		<div style="display: flex;flex-direction: column; justify-content: center; margin: auto; width: 100%; ">
		<div class="row" style="margin: auto;    width: 100%;">



			<div class="datp1 form-group">
				<input   class="form-control" id="TelefonoP" onkeyup="mayus(this);" value="" type="number" placeholder="Teléfono">
				<span class="form-label">Teléfono</span>

			
			</div>
		</div>
		</div>

	</div>


</div>

</div>
















							 </div>

















							 <div class="row" style="margin: auto; border: 1px solid white;">
								<div style="width: 60%; display: flex;flex-direction: column; justify-content: center;  border-right: 1px solid white;">


								<div class="row" style="margin: auto;    width: 100%;">
									<div  class="esp22nc1_title">


										<div style="display: flex;flex-direction: column; justify-content: center; margin: auto; width: 100%; ">
										<div class="row" style="margin: auto;    width: 100%;">

										    <input   id="transportadora_did" class="hide" value="0"  type="text"/>
											<div class="datp1 form-group">
												<input  list="brow2" onkeyup="mayus(this);" oninput="seleccionv1(this,'brow2')"  value="Transportadora" class="form-control form" id="transportadora"  name="transportadora" type="text" placeholder="Transportadora">
											
												<span class="form-label">Transportadora</span>

												<datalist id="brow2">
												  </datalist>
											</div>
										</div>
										</div>

									</div>


								</div>

								</div>



<div style="width: 20%; display: flex;flex-direction: column; justify-content: center;  border-right: 1px solid white;">


<div class="row" style="margin: auto;    width: 100%;">
	<div  class="esp22nc1_title">


		<div style="display: flex;flex-direction: column; justify-content: center; margin: auto; width: 100%; ">
		<div class="row" style="margin: auto;    width: 100%;">



			<div class="datp1 form-group">
				<input  class="form-control" id="CINITT"  onkeyup="mayus(this);" value="" type="text" placeholder="CI/NIT">
				<span class="form-label">CI/NIT</span>

			</div>
		</div>
		</div>

	</div>


</div>

</div>



<div style="width: 20%; display: flex;flex-direction: column; justify-content: center;  border-right: 1px solid white;">


<div class="row" style="margin: auto;    width: 100%;">
	<div  class="esp22nc1_title">


		<div style="display: flex;flex-direction: column; justify-content: center; margin: auto; width: 100%; ">
		<div class="row" style="margin: auto;    width: 100%;">



			<div class="datp1 form-group">
				<input   class="form-control" id="TelefonoT"  onkeyup="mayus(this);" value="" type="number" placeholder="Teléfono">
				<span class="form-label">Teléfono</span>

			
			</div>
		</div>
		</div>

	</div>


</div>

</div>













							 </div>
























							 <div class="row" style="margin: auto; border: 1px solid white;">
								<div style="width: 35%; display: flex;flex-direction: column; justify-content: center;  border-right: 1px solid white;">


								  <div class="row" style="margin: auto;    width: 100%;">
									<div  class="esp22nc1_title">


										<div style="display: flex;flex-direction: column; justify-content: center; margin: auto; width: 100%; ">
										<div class="row" style="margin: auto;    width: 100%;">

										<input   id="producto_did" class="hide" value="0"  type="text" />
											<div class="datp1  form-group">
												<input  list="brow3"  onkeyup="mayus(this);" oninput="seleccionv1(this,'brow3')" value="Producto" class="form-control form"  id="producto" name="producto" type="text" placeholder="Producto">
												<span class="form-label">Producto</span>
												  <datalist id="brow3">
												  </datalist>
											</div>
										</div>
										</div>

								    	</div>


								     </div>

								   </div>



								   



								   <div style="width: 15%; display: flex;flex-direction: column; justify-content: center;  border-right: 1px solid white;">


								  <div class="row" style="margin: auto;    width: 100%;">
									<div  class="esp22nc1_title">


										<div style="display: flex;flex-direction: column; justify-content: center; margin: auto; width: 100%; ">
										<div class="row" style="margin: auto;    width: 100%;">
											<div class="datp1  form-group">
											    <select onclick="buscartipo()" id="tipos" class="form-control" required>
										         <option value="1" selected>Interno</option>
											     <option value="2">Externo</option>
										        </select>
										        <span class="select-arrow"></span>
										        <span class="form-label">Tipo</span>
											</div>
										</div>
										</div>

								    	</div>


								     </div>

								   </div>




 <div id="tipo_interno" style="  width: 25%; display: flex;flex-direction: column; justify-content: center;  border-right: 1px solid white;">


<div class="row" style="margin: auto;    width: 100%;">
	<div  class="esp22nc1_title">


		<div style="display: flex;flex-direction: column; justify-content: center; margin: auto; width: 100%; ">
		<div class="row" style="margin: auto;    width: 100%;">

			<div class="datp1  form-group">
			                                   <select id="tipo_interno_s" class="form-control" required>
											     <option value="1" selected>Tipo Interno</option>
										        </select>
										        <span class="select-arrow"></span>
										        <span class="form-label">Tipo Interno</span>
			</div>
		</div>
		</div>

	</div>


</div>

</div>



								<div  id="tipo_externo" style=" width: 25%; display: flex;flex-direction: column; justify-content: center;  border-right: 1px solid white;">


									<div class="row" style="margin: auto;    width: 100%;">
										<div  class="esp22nc1_title">


											<div style="display: flex;flex-direction: column; justify-content: center; margin: auto; width: 100%; ">
											<div class="row" style="margin: auto;    width: 100%;">
											<input   id="origenf_did" class="hide"  value="0" type="text" />
												<div class="datp1  form-group">
													<input  list="brow4"  onkeyup="mayus(this);" oninput="seleccionv1(this,'brow4')" class="form-control  form"  id="origenf" name="origenf" type="text" placeholder="Origen">
													<span class="form-label">Origen</span>
													<datalist id="brow4">
												  </datalist>
												</div>
											</div>
											</div>

										</div>


									</div>

									</div>




























									<div style="width: 25%; display: flex;flex-direction: column; justify-content: center;  border-right: 1px solid white;">


										<div class="row" style="margin: auto;    width: 100%;">
											<div  class="esp22nc1_title">


												<div style="display: flex;flex-direction: column; justify-content: center; margin: auto; width: 100%; ">
												<div class="row" style="margin: auto;    width: 100%;">

												<input   id="destino_did"  class="hide" value="0" type="text" />
													<div class="datp1 form-group">
														<input   list="brow5" onkeyup="mayus(this);" oninput="seleccionv1(this,'brow5')"  value="Destino" class="form-control  form" id="destino" name="destino" type="text" placeholder="Destino">
														<span class="form-label">Destino</span>
														<datalist id="brow5">
												        </datalist>
													</div>
												</div>
												</div>

											</div>
										</div>

										</div>


							 </div>






















							 <div class="row" style="margin: auto; border: 1px solid white;">
								<div style="width: 25%; display: flex;flex-direction: column; justify-content: center;  border-right: 1px solid white;">


								<div class="row" style="margin: auto;    width: 100%;">
									<div  class="esp22nc1_title">


										<div style="display: flex;flex-direction: column; justify-content: center; margin: auto; width: 100%; ">
										<div class="row" style="margin: auto;    width: 100%;">

											<div class="datp1 form-group">
												<input  id="placa" list="li_placa" onkeyup="mayus(this);"  oninput="onInput()"   value="Placa" class="form-control form" type="text" placeholder="Placa">
												<span class="form-label">Placa</span>

												  <datalist id="li_placa">
												  </datalist>
											</div>
										</div>
										</div>

									</div>


								</div>

								</div>




								<div style="width: 25%; display: flex;flex-direction: column; justify-content: center;  border-right: 1px solid white;">


									<div class="row" style="margin: auto;    width: 100%;">
										<div  class="esp22nc1_title">


											<div style="display: flex;flex-direction: column; justify-content: center; margin: auto; width: 100%; ">
											<div class="row" style="margin: auto;    width: 100%;">


												<div class="datp1 form-group">
													<input class="form-control form" onkeyup="mayus(this);"  type="text"  value="Marca" id="marca" placeholder="Marca">
													<span class="form-label">Marca</span>
												</div>
											</div>
											</div>

										</div>


									</div>

									</div>



									<div style="width: 25%; display: flex;flex-direction: column; justify-content: center;  border-right: 1px solid white;">


										<div class="row" style="margin: auto;    width: 100%;">
											<div  class="esp22nc1_title">


												<div style="display: flex;flex-direction: column; justify-content: center; margin: auto; width: 100%; ">
												<div class="row" style="margin: auto;    width: 100%;">

													<div class="datp1 form-group">
														<input class="form-control form"  onkeyup="mayus(this);" type="text" value="Color"  id="color" placeholder="Color">
														<span class="form-label">Color</span>
													</div>
												</div>
												</div>

											</div>


										</div>

										</div>
										<div style="width: 25%; display: flex;flex-direction: column; justify-content: center;  border-right: 1px solid white;">


											<div class="row" style="margin: auto;    width: 100%;">
												<div  class="esp22nc1_title">


													<div style="display: flex;flex-direction: column; justify-content: center; margin: auto; width: 100%; ">
													<div class="row" style="margin: auto;    width: 100%;">
													<input   id="chata_did" class="hide" value="0" type="text" />
														<div class="datp1 form-group">
															
															<input  list="brow6"  onkeyup="mayus(this);"  oninput="seleccionv1(this,'brow6')"  class="form-control" value="Chata" id="chata" name="chata" type="text" placeholder="Chata">
															<span class="form-label">Chata</span>
																<datalist id="brow6">
												                </datalist>
														</div>
													</div>
													</div>

												</div>


											</div>

											</div>

							 </div>













							 <div class="row" style="margin: auto; border: 1px solid white;">
								<div style="width: 40%; display: flex;flex-direction: column; justify-content: center;  border-right: 1px solid white;">


								<div class="row" style="margin: auto;    width: 100%;">
									<div  class="esp22nc1_title">


										<div style="display: flex;flex-direction: column; justify-content: center; margin: auto; width: 100%; ">
										<div class="row" style="margin: auto;    width: 100%;">


											<div class="datp1 form-group">
												<input class="form-control form" onkeyup="mayus(this);"  type="text"  value="Conductor" id="conductor" placeholder="Conductor">
												<span class="form-label">Conductor</span>
											</div>
										</div>
										</div>

									</div>


								</div>

								</div>


								<div style="width: 30%; display: flex;flex-direction: column; justify-content: center;  border-right: 1px solid white;">


									<div class="row" style="margin: auto;    width: 100%;">
										<div  class="esp22nc1_title">


											<div style="display: flex;flex-direction: column; justify-content: center; margin: auto; width: 100%; ">
											<div class="row" style="margin: auto;    width: 100%;">


												<div class="datp1 form-group">
													<input class="form-control form" onkeyup="mayus(this);"  type="text"  value="CI"  id="ci_conductor" placeholder="CI">
													<span class="form-label">CI</span>
												</div>
											</div>
											</div>

										</div>


									</div>

									</div>



									<div style="width: 30%; display: flex;flex-direction: column; justify-content: center;  border-right: 1px solid white;">


										<div class="row" style="margin: auto;    width: 100%;">
											<div  class="esp22nc1_title">


												<div style="display: flex;flex-direction: column; justify-content: center; margin: auto; width: 100%; ">
												<div class="row" style="margin: auto;    width: 100%;">

													<div class="datp1 form-group">
														<input class="form-control form"   onkeyup="mayus(this);" type="text" value="Ext" id="ci_exp"  placeholder="Ext">
														<span class="form-label">Ext</span>
													</div>
												</div>
												</div>

											</div>


										</div>

										</div>


							 </div>
























							 <div class="row" style="margin: auto; border: 1px solid white;">
								<div style="width: 25%; display: flex;flex-direction: column; justify-content: center;  border-right: 1px solid white;">


								<div class="row" style="margin: auto;    width: 100%;">
									<div  class="esp22nc1_title">


										<div style="display: flex;flex-direction: column; justify-content: center; margin: auto; width: 100%; ">
										<div class="row" style="margin: auto;    width: 100%;">

											<div class="datp1 form-group">
										    	<div class="row" style="margin: auto; border: 1px solid white;">
							                    	<div style="width: 70%; display: flex;flex-direction: column; justify-content: center;  border-right: 1px solid white;">
													  <input class="form-control" value="0" id="peso1" type="text" placeholder="Peso Tara">
												      <span class="form-label">Peso Tara</span>
												    </div>
													<div style="width: 30%; display: flex;flex-direction: column; justify-content: center;  border-right: 1px solid white;">
													  <button id="getPeso1" class="waves-effect btn" style="margin-top: 1.5em;margin: auto; color: white; background:  #BE040F;">Obtener</button>
												    </div>
							                	</div>


											</div>
										</div>
										</div>

									</div>

								</div>

								</div>


								<div style="width: 25%; display: flex;flex-direction: column; justify-content: center;  border-right: 1px solid white;">


									<div class="row" style="margin: auto;    width: 100%;">
										<div  class="esp22nc1_title">


											<div style="display: flex;flex-direction: column; justify-content: center; margin: auto; width: 100%; ">
											<div class="row" style="margin: auto;    width: 100%;">

												<div class="datp1 form-group">


												<div class="row" style="margin: auto; border: 1px solid white;">
							                    	<div style="width: 70%; display: flex;flex-direction: column; justify-content: center;  border-right: 1px solid white;">
													  <input class="form-control" value="0"  id="peso2" type="text" placeholder="Peso Bruto">
													  <span class="form-label">Peso Bruto</span>
												    </div>
													<div style="width: 30%; display: flex;flex-direction: column; justify-content: center;  border-right: 1px solid white;">
												    	<button id="getPeso2" class="waves-effect btn" style="margin-top: 1.5em;margin: auto; color: white; background: #BE040F;">Obtener</button>
												    </div>
							                	</div>





												</div>
											</div>
											</div>

										</div>


									</div>

									</div>



									<div style="width: 50%; display: flex;flex-direction: column; justify-content: center;  border-right: 1px solid white;">


										<div class="row" style="margin: auto;    width: 100%;">
											<div  class="esp22nc1_title">


												<div style="display: flex;flex-direction: column; justify-content: center; margin: auto; width: 100%; ">
												<div class="row" style="margin: auto;    width: 100%;">

													<div class="datp1 form-group">
														<input  id="neto" class="form-control" type="text" value="0" placeholder="Peso Neto">
														<span   class="form-label">Peso Neto</span>
													</div>
												</div>
												</div>

											</div>


										</div>

										</div>



										<!-- <div style="width: 25%; display: flex;flex-direction: column; justify-content: center;  border-right: 1px solid white;">


											<div class="row" style="margin: auto;    width: 100%;">
												<div  class="esp22nc1_title">


													<div style="display: flex;flex-direction: column; justify-content: center; margin: auto; width: 100%; ">
													<div class="row" style="margin: auto;    width: 100%;">


														<div class="datp1 form-group">
															<input  id="netoqq"  class="form-control" type="text" value="0"   placeholder="Peso QQ">
															<span class="form-label">Peso QQ</span>
														</div>
													</div>
													</div>

												</div>


											</div>

											</div> -->

							 </div>








							 <div class="row"  id="observacion11" style="margin: auto; border: 1px solid white;">
								<div style="width: 100%; display: flex;flex-direction: column; justify-content: center;  border-right: 1px solid white;">


								<div class="row" style="margin: auto;    width: 100%;">
									<div  class="esp22nc1_title">


										<div style="display: flex;flex-direction: column; justify-content: center; margin: auto; width: 100%; ">
										<div class="row" style="margin: auto;    width: 100%;">


											<div class="datp1 form-group">
												<textarea id="observacion" style="height: 100px; padding: 30px 25px;" class="form-control" type="text"  placeholder="Observación">Sin observación</textarea>
												<span class="form-label" style="top: 10px;">Observación</span>
											</div>
										</div>
										</div>

									</div>


								</div>

								</div>



							 </div>



	




						 
							 <div class="row" id="observacion22"  style="margin: auto; border: 1px solid white;">
								<div style="width: 100%; display: flex;flex-direction: column; justify-content: center;  border-right: 1px solid white;">


								<div class="row" style="margin: auto;    width: 100%;">
									<div  class="esp22nc1_title">


										<div style="display: flex;flex-direction: column; justify-content: center; margin: auto; width: 100%; ">
										<div class="row" style="margin: auto;    width: 100%;">


											<div class="datp1 form-group">
												<textarea id="observacion2" style="height: 100px; padding: 30px 25px;" class="form-control" type="text"  placeholder="Segunda Observación">Sin observación</textarea>
												<span class="form-label" style="top: 10px;">Segunda Observación</span>
											</div>
										</div>
										</div>

									</div>


								</div>

								</div>



							 </div> 





							 <div class="form-btn" >
								<button   id="saver"  class="submit-btn  hide">Registrar Peso</button>
							</div>













				</div>
			</div>

	</div>

	<script src="js_otros/jquery.min.js"></script>
	<script>
		$('.form-control').each(function () {
			floatedLabel($(this));
		});

		$('.form-control').on('input', function () {
			floatedLabel($(this));
		});

		function floatedLabel(input) {
			var $field = input.closest('.form-group');
			if (input.val()) {
				$field.addClass('input-not-empty');
			} else {
				$field.removeClass('input-not-empty');
			}
		}







	</script>

<div id="addend" class="extra" style="height: 100vh;display:none;width: 100vw; position: fixed; top: 0; left: 0; text-align: center; z-index:9999;"></div>

  <div id="progressShow" class="valign-wrapper" style="height: 100vh; width: 100vw; position: fixed; top: 0; left: 0; text-align: center; background: rgba(0,0,0,.5); z-index:99999; ">
    <!-- <b id="msgProgress" style="top: 50%; position: relative; color: white; background: #202020; padding: .25em; border-radius: 8%;"></b> -->
       <div class="centred">	
        <img src="img/progress1.gif"><br>
        <b id="msg_progress">PROCESANDO...</b>
      </div>

  </div>


 <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
     <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>







    <!-- Latest compiled and minified JavaScript -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

        <!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/i18n/defaults-*.min.js"></script>
<script type="text/javascript" src="print/printThis.js"></script>


</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>


<script>
var ller_proveedor='';
var lastItem=null;
var observacion1="";
var clients=[];
//var ff_direccion= $('#ubii').val()+'server.php';
var ff_direccion='';

function getSesion_(name){
	return window.localStorage.getItem(name);
}

function setSesion_(name,value){
	window.localStorage.setItem(name,value);
}
async function send_(file,datos,funcion){
	var domain='';
	var debug=true;
	var es=$.ajax({
		type: "POST",
		url: domain+file,
		dataType: 'json',
		data: datos,
		success: function(json){
			if(debug){
				console.log('request=>'+JSON.stringify(datos)+"\n"+'response=>'+JSON.stringify(json));
			}
			funcion(json);
		},
		error: function (err) {
			alert('Error la Operación'), console.log('request=>'+JSON.stringify(datos)+"\n"+'error response=>'+JSON.stringify(err));
		}
	});
}



function onInput() {
    var val = document.getElementById("placa").value;
    var opts = document.getElementById('li_placa').childNodes;
    for (var i = 0; i < opts.length; i++) {
      if (opts[i].value === val) {
              var fty=opts[i].value;

		      send_(ff_direccion,{call:'getPlaca',idSesion:getSesion_('idSesion'),placa:fty},function(datad){
                 console.log('ff '+datad);

               if(datad.length>0){
			     $('#marca').val(datad[0]['U_Marca']);
				 $('#color').val(datad[0]['U_Color']);
				 $('#conductor').val(datad[0]['U_NombreChofer']);
				 $('#ci_conductor').val(datad[0]['U_CI_Chofer']);
				 $('#ci_exp').val(datad[0]['U_OrigenDoc']);


                }
               });

        break;
      }
    }
  }




function lector(va1){
	var ller= `<option value="`+va1+`">`;
	return ller;
}




function lector_select(va1, va2, con){
	var ller='';
	if(con==1){
	 ller= `<option value="`+va1+`"  selected>`+va2+`</option>`;
	}else{
	 ller= `<option value="`+va1+`">`+va2+`</option>`;
	}
	
	return ller;
}

function querySelector(selector){
	if(document.querySelector(selector)==null){

	}
	return document.querySelector(selector);
}





  querySelector('#placa').onkeydown=function(e){
    let value=this.value;
		send_(ff_direccion,{call:'complexPlaca_n',idSesion:getSesion_('idSesion'),placa:value},function(data){
			console.log(data);
			$("#li_placa").empty();
				    var llerr= '';
			        data.forEach(function (values) {
					    var datou= values.PLACA;
					   console.log(datou);
					   var cc=lector(datou);
					    llerr=llerr+cc;
					});
					$("#li_placa").append(llerr);
             });

  };


  function querySelectorAll(selector){
	return document.querySelectorAll(selector);
  }

  function queryForeach(selector,funcion){
	document.querySelectorAll(selector).forEach(funcion);
  }














  function validarForPeso(input_dato){

   showProgress();
   var seleccion=document.getElementById('tipos');
   var f1=seleccion.selectedIndex;
   var f2=seleccion.options[seleccion.selectedIndex].text;
   var f3=seleccion.options[seleccion.selectedIndex].value; 
    

   //alert(f3);

 
			

			
		
   var d_proveedor=$("#proveedor_did").val();
   var d_proveedor_dato=  $("#proveedor").val();


    if(d_proveedor==0 && d_proveedor_dato !=""){
 
    var d_proveedor_cinitp=  $("#CINITP").val();
    console.log('d_proveedor_cinitp '+d_proveedor_cinitp);
    var d_proveedor_telefonotp=  $("#TelefonoP").val();
    console.log('d_proveedor_telefonotp '+d_proveedor_telefonotp);

    let endDataf1=[];
    endDataf1.push({ 
      "Name": d_proveedor_dato,
	  "U_TBO":"1",
	  "U_CI_NIT":d_proveedor_cinitp,
	  "U_Telefono":d_proveedor_telefonotp 
    });

    console.log('campo_registrar 1 '+JSON.stringify(endDataf1));
	 
	  send_(ff_direccion,{call:'registrar_informacion',array:JSON.stringify(endDataf1)},function(datadd){
	  console.log('campo_registrar 1 '+JSON.stringify(datadd));
	  if(datadd==0){
	    	let type = TYPES[3];
		   $.toast({
			title: 'Proveedor no registrado !!!',
			type: type,
			delay: 5000
		   });

		    $("#chata_did").val('0');
	        $("#destino_did").val('0');
	        $("#producto_did").val('0');
	        $("#transportadora_did").val('0');
			$("#proveedor_did").val('0');
		    hideProgress();
	  }else{
	    	$("#proveedor_did").val(datadd);
			console.log('campo_registrar 1 '+$("#proveedor_did").val());
            let type = TYPES[3];
            $.toast({
                title: 'Proveedor registrado correctamente !!!',
                type: type,
                delay: 5000
            });
			var d_transportadora=  $("#transportadora_did").val(); 
            var d_transportadora_dato=  $("#transportadora").val();
			if(d_transportadora==0 && d_transportadora_dato != ""){
				var d_transportadora_cinitp=  $("#CINITT").val();
                var d_transportadora_telefonotp=  $("#TelefonoT").val();

				   let endDataf2=[];
                   endDataf2.push({ 
                   "Name": d_transportadora_dato,
	               "U_TBO":"2",
                   "U_CI_NIT":d_transportadora_cinitp,
	               "U_Telefono":d_transportadora_telefonotp 
                   });
				   console.log('campo_registrar 2 '+JSON.stringify(endDataf2));
				   send_(ff_direccion,{call:'registrar_informacion',array:JSON.stringify(endDataf2)},function(datadd){
				  console.log('campo_registrar 2 '+JSON.stringify(datadd));
					if(datadd==0){
						let type = TYPES[3];
		                 $.toast({
			             title: 'Transportadora no registrada !!!',
		             	 type: type,
		             	 delay: 5000
		                });

						$("#chata_did").val('0');
	                    $("#destino_did").val('0');
	                    $("#producto_did").val('0');
	                    $("#transportadora_did").val('0');
			            $("#proveedor_did").val('0');	 
		                hideProgress();

					}else{
						   $("#transportadora_did").val(datadd); 
						   let type = TYPES[3];
		                   $.toast({
			               title: 'Transportadora registrado correctamente !!!',
			               type: type,
			               delay: 5000
		                   });

						   var d_producto_id=  $("#producto_did").val();
                           var d_producto=  $("#producto").val();
						   if(d_producto_id==0 && d_producto !=""){
							let endDataf3=[];
                              endDataf3.push({ 
                              "Name": d_producto,
	                          "U_TBO":"3",
	                          "U_CI_NIT":"",
	                          "U_Telefono":""
                              });
							  console.log('campo_registrar 3 '+JSON.stringify(endDataf3));
							  send_(ff_direccion,{call:'registrar_informacion',array:JSON.stringify(endDataf3)},function(datadd){
								console.log('campo_registrar 3 '+JSON.stringify(datadd));
								if(datadd==0){
									        let type = TYPES[3];
		                                    $.toast({
		                                 	title: 'Producto no registrado !!!',
		                                 	type: type,
		                                	delay: 5000
		                                    });

											$("#chata_did").val('0');
	                                        $("#destino_did").val('0');
	                                        $("#producto_did").val('0');
	                                        $("#transportadora_did").val('0');
			                                $("#proveedor_did").val('0');	 
		                                    hideProgress();
								}else{
									   $("#producto_did").val(datadd);
		                               let type = TYPES[3];
		                               $.toast({
		                               	title: 'Producto registrado correctamente !!!',
		                             	type: type,
			                            delay: 5000
		                               });

									   var d_destino_id=  $("#destino_did").val();
                                       var d_destino=  $("#destino").val();
									   if(d_destino_id==0 && d_destino != ""){
										    let endDataf4=[];
                                            endDataf4.push({ 
                                              "Name": d_destino,
	                                          "U_TBO":"4",
	                                          "U_CI_NIT":"",
	                                          "U_Telefono":""
                                            });
											console.log('campo_registrar 4 '+JSON.stringify(endDataf4));
											send_(ff_direccion,{call:'registrar_informacion',array:JSON.stringify(endDataf4)},function(datadd){
												console.log('campo_registrar 4 '+JSON.stringify(datadd));
												if(datadd==0){
													let type = TYPES[3];
		                                             $.toast({
			                                          title: 'Destino no registrado !!!',
		                                              type: type,
			                                          delay: 5000
		                                            });

		                                            $("#chata_did").val('0');
	                                                $("#destino_did").val('0');
	                                                $("#producto_did").val('0');
	                                                $("#transportadora_did").val('0');
		                                        	$("#proveedor_did").val('0');	 

		                                            hideProgress();
												}else{
													    $("#destino_did").val(datadd);
                                                        let type = TYPES[3];
                                                     	$.toast({
                                                       	title: 'Destino registrado correctamente !!!',
	                                                    type: type,
                                                        delay: 5000
                                                        });

														var d_chata_id=  $("#chata_did").val();
                                                        var d_chata=  $("#chata").val();
														if(d_chata_id==0 && d_chata!=""){
															  let endDataf5=[];
                                                              endDataf5.push({ 
                                                               "Name": d_chata,
	                                                           "U_TBO":"5",
	                                                           "U_CI_NIT":"",
                                                        	   "U_Telefono":""
                                                              });
															  console.log('campo_registrar 5 '+JSON.stringify(endDataf5));
															  send_(ff_direccion,{call:'registrar_informacion',array:JSON.stringify(endDataf5)},function(datadd){
																console.log('campo_registrar 5 '+JSON.stringify(datadd));
																if(datadd==0){
																	       let type = TYPES[3];
		                                                                    $.toast({
		                                                                	title: 'Chata no registrada !!!',
			                                                                type: type,
		                                                                 	delay: 5000
		                                                                    });

																			
																			$("#chata_did").val('0');
	                                                                        $("#destino_did").val('0');
	                                                                        $("#producto_did").val('0');
	                                                                        $("#transportadora_did").val('0');
		                                        	                        $("#proveedor_did").val('0');	 
		                                                                    hideProgress();
																}else{
																	   $("#chata_did").val(datadd);

                                                                             let type = TYPES[3];
                                                                             $.toast({
                                                                               title: 'Chata registrado correctamente !!!',
                                                                               type: type,
                                                                               delay: 5000
                                                                             });


                                                                        getPeso_22(input_dato,f3);

																}
															  });


														}else{
  	                                                        getPeso_22(input_dato,f3);
														}
												}
											});

									   }else{
										     $("#destino_did").val('0');
	                                         $("#producto_did").val('0');
	                                         $("#transportadora_did").val('0');
			                                 $("#proveedor_did").val('0');	 
	                                         hideProgress();
	                                         let type = TYPES[3];
		                                     $.toast({
		                                    	title: 'Necesita completar destino !!!',
			                                    type: type,
		                                    	delay: 5000
		                                     });
									   }
								}
							  });




						   }else{
							   $("#producto_did").val('0');
	                           $("#transportadora_did").val('0');
			                   $("#proveedor_did").val('0');	 
	                            hideProgress();
	                            let type = TYPES[3];
		                        $.toast({
		                     	title: 'Necesita completar producto !!!',
		                    	type: type,
		                    	delay: 5000
		                        });
						   }


					}
				   });

			}else{
				$("#transportadora_did").val('0');
			    $("#proveedor_did").val('0');	 
			        hideProgress();
		        	let type = TYPES[3];
		            $.toast({
			        title: 'Necesita completar transportadora !!!',
		        	type: type,
		        	delay: 5000
		            });
			}
	  }
     });

	}else{
		 $("#proveedor_did").val('0');	 
		 hideProgress();
		  let type = TYPES[3];
		    $.toast({
			title: 'Necesita completar proveedor !!!',
			type: type,
			delay: 5000
		   });
	}










 }




function getPeso_22(input,f3){

   if(f3==2){
            var  d_origenf_id_EXT=  $("#origenf_did").val();
            var d_origenf=  $("#origenf").val();
			if(d_origenf_id_EXT==0 && d_origenf != ""){
				  let endDataff=[];
                  endDataff.push({ 
                   "Name": d_origenf,
	               "U_TBO":"4",
	               "U_CI_NIT":"",
	               "U_Telefono":""
                  });
				  console.log('campo_registrar opcion '+JSON.stringify(endDataff));
				  send_(ff_direccion,{call:'registrar_informacion',array:JSON.stringify(endDataff)},function(datadd){
					if(datadd==0){
						let type = TYPES[3];
		                  $.toast({
			              title: 'Origen no registrado !!!',
		                  type: type,
			              delay: 5000
		                });

						$("#chata_did").val('0');
	                    $("#destino_did").val('0');
		              	$("#origenf_did").val('0');
	                    $("#producto_did").val('0');
	                    $("#transportadora_did").val('0');
			            $("#proveedor_did").val('0');	 
		                hideProgress();
					}else{
						$("#origenf_did").val(datadd);
                         let type = TYPES[3];
                           $.toast({
                           title: 'Origen registrado correctamente !!!',
                           type: type,
                           delay: 5000
                          });
						  getPeso_222(input);
					}
				  });
			}else{
				    $("#origenf_did").val('0');
				    $("#chata_did").val('0');
	                $("#destino_did").val('0');
					$("#producto_did").val('0');
	                $("#transportadora_did").val('0');
			        $("#proveedor_did").val('0');	 
	                 hideProgress();
	                 let type = TYPES[3];
		              $.toast({
			            title: 'Necesita completar origen!!!',
			            type: type,
			            delay: 5000
		              });
			}

   }else{


 var d_proveedor=$("#proveedor_did").val();
 console.log('campo_registrar opcion '+JSON.stringify(d_proveedor));

	  getPeso_222(input);
   }


}



function getPeso_222(input){

send_(ff_direccion,{call:'getPeso',user:getSesion_('userPeaje')},function(data){
hideProgress();
if(data==""|data=="00"){
let type = TYPES[1];
  $.toast({
   title: 'Por favor vuelva a intentar.',
   type: type,
   delay: 5000
});
return;
}else{

let type = TYPES[2];
  $.toast({
 title: 'Peso obtenido !!!',
 type: type,
 delay: 5000
});
$('#'+input).val(data);

var c1=$('#peso1').val();
var c2=$('#peso2').val();


	querySelector('#saver').classList.remove('hide');
	if(($('#peso1').val()!='0'&$('#peso2').val()=='0')|($('#peso1').val()=='0'&$('#peso2').val()!='0')){
	$('#estado').val(1);
	}else{
	$('#estado').val(2);
	}
	  let a=parseInt($('#peso1').val());
	  let b=parseInt($('#peso2').val());
	  let hu=parseInt(46);
	  $('#neto').val(Math.abs(a-b).toString());
}

});


}







function setVal(ele,value){
	ele=querySelector('#'+ele);
	if(ele.tagName.toLowerCase()=='textarea'|ele.tagName.toLowerCase()=='input') {
		ele.value=value;
		if(ele.getAttribute('type')=='text'|ele.getAttribute('type')=='password'|ele.tagName.toLowerCase()=='textarea'){
			if (value!=''){
				ele.parentNode.querySelector('label').classList.add('active');
			}else{
				ele.parentNode.querySelector('label').classList.remove('active');
			}
		}
		ele.dispatchEvent(new Event('keyup'));
	}else{
		ele.querySelectorAll('option').forEach(ele=>ele.removeAttribute('selected'));
		ele.querySelector(`option[value="${value}"]`).setAttribute('selected', 'selected');
		ele.dispatchEvent(new Event('change'));
	}
}
function checke(ele){
	if(typeof ele == 'string'){
		return querySelector(ele)!=null;
	}else{
		return ele!=null;
	}
}



        function showProgress(){
			$('#progressShow').show();
		}
		function hideProgress(){
			$('#progressShow').hide();
		}
function hideEle(selector){
	if(typeof selector == 'string'){
		queryForeach(selector,el => el.style.display="none");
	}else{
		selector.style.display="none";
	}
}


function localDate(data){
	data=data.split('-');
	return data[2]+'-'+data[1]+'-'+data[0];
}



  querySelector('#getPeso1').onclick=function(){
	validarForPeso('peso1');

  };


  
  querySelector('#getPeso2').onclick=function(){
	validarForPeso('peso2');
  };



function buscartipo(){
	querySelector('#saver').classList.add('hide');
	        var seleccion=document.getElementById('tipos');
			var f1=seleccion.selectedIndex;
            var f2=seleccion.options[seleccion.selectedIndex].text;
            var f3=seleccion.options[seleccion.selectedIndex].value; 
			if(f3==1){

$("#tipo_interno").show();
$("#tipo_externo").hide();
$("#tipo_interno_s").empty();

send_(ff_direccion,{call:'ListaAlmacen'},function(datala){
   var llerr= '';
   var con=0;
   datala.forEach(function (values) {
	con=con+1;
	var codef= values.WhsCode;
	var nombref= values.WhsName;
	
	var cc=lector_select(codef,nombref,con);
	console.log('detalle_dd '+codef+ ' '+nombref+'  '+con);
	  console.log('detalle_d '+cc);
	llerr=llerr+cc;
   });
   console.log('drd '+llerr);
   $("#tipo_interno_s").append(llerr);
});
}else{
if(f3==2){
   $("#tipo_externo").show();
   $("#tipo_interno").hide();
}
}
}



     $(document).ready(function(){
        
        hideProgress();
	
		 var edit_save = document.getElementById("logo");
		 edit_save.src = getSesion_('logo');

		 ff_direccion=getSesion_('url')+'server.php';
		 send_(ff_direccion,{call:'set_sesion_posi',posi:'b.html' },function(data) {
			var code = $('#code').val();

if(code==0){
         
    $("#observacion11").show();
	$("#observacion22").hide();
	
        	var seleccion=document.getElementById('tipos');
			var f1=seleccion.selectedIndex;
            var f2=seleccion.options[seleccion.selectedIndex].text;
            var f3=seleccion.options[seleccion.selectedIndex].value; 

         if(f3==1){

			 $("#tipo_interno").show();
			 $("#tipo_externo").hide();
		     $("#tipo_interno_s").empty();
			 
			send_(ff_direccion,{call:'ListaAlmacen'},function(datala){
				var llerr= '';
				var con=0;
			    datala.forEach(function (values) {
				 con=con+1;
				 var codef= values.WhsCode;
				 var nombref= values.WhsName;
			     
				 var cc=lector_select(codef,nombref,con);
				 console.log('detalle_dd '+codef+ ' '+nombref+'  '+con);
                   console.log('detalle_d '+cc);
			     llerr=llerr+cc;
		    	});
				console.log('drd '+llerr);
			    $("#tipo_interno_s").append(llerr);
			});
		 }
    

	lastItem=null;
 $('#fecha1').val("0000-00-00 00:00:00");
 $('#fecha2').val("0000-00-00 00:00:00");
 $("#sucursal").val(getSesion_('sucursal'));
 $("#usuario").val(getSesion_('owner'));

 $("#ci_exp").val('');
 $('#marca').val('');
 $('#color').val('');
 $('#conductor').val('');
 $('#ci_conductor').val('');
 $("#chata").val('');

 $("#peso1").val(0);
 $("#peso2").val(0);
 $("#neto").val(0);
 $("#ticket").val(0);
 $("#estado").val(1);
 $("#origen").val('OTROS SERVICIOS');
 $("#cliente").val('');
 $("#proveedor").val('');
 $("#transportadora").val('');
 $("#producto").val('');
 $("#destino").val('');
 $("#placa").val('');

 querySelector('#documentos').innerHTML=`<input id="facturaNumer"  class="hide" type="text" class="int" autocomplete="off" value="" placeholder="Ingresar"><label for="facturaNumer" class="label active">Nº Documento</label>`;


	send_(ff_direccion,{call:'getRazones'},function(data){
			clients=data;
			var conta=0;
			var llerr= '';
			clients.forEach(function (values) {
			   var datou= values.RAZON;
			   var cc=lector(datou);
			   llerr=llerr+cc;
			});
			$("#brow").append(llerr);
	});








	send_(ff_direccion,{call:'BALL_'},function(datad){
		 console.log('daty '+JSON.stringify(datad));
			datad.forEach(function (values) {
			   var datoid= values.Code;
				send_(ff_direccion,{call:'Listadatos_e1',ee:datoid},function(datadd){
				   console.log('daty '+JSON.stringify(datadd));
				   var llerr= '';
				   var datoud_ci_nit='';
				   var datoud_telefono='';
					   datadd.forEach(function (valuess) {
						var datoidd= valuess.Code;
						var datoud= valuess.Name;
						
						var cc=lector_lista(datoidd,datoud);
		
						llerr=llerr+cc;
					});
					if(datoid==4){
						$("#brow4").append(llerr);
						$("#brow5").append(llerr);
					}else{
						if(datoid==5){
							$("#brow6").append(llerr);
						}else{

                             if(datoid==1){
								  ller_proveedor=llerr;
								    $("#brow"+datoid).append(llerr);
									$("#CINITP").val(datoud_ci_nit);
									 $("#TelefonoP").val(datoud_telefono);
							 }else{
								if(datoid==2){
									$("#brow"+datoid).append(llerr);
									$("#CINITT").val(datoud_ci_nit);
									$("#TelefonoT").val(datoud_telefono);
								 }else{
									$("#brow"+datoid).append(llerr);
								 }

							 }

						
						}
					}



				});
			});
	 });















}else{




	send_(ff_direccion,{call:'getLast',idSesion:getSesion_('idSesion'),placa:code,sucursal:getSesion_('sucursal')},function(data){
	 console.log('detalle '+JSON.stringify(data));


	var  lastItem=data;
if(data.length==1){
	$("#observacion11").show();
	$("#observacion22").show();
$("#titlel").text('Datos Informaticos Revisión de Ticket');
$("#origen").val(data[0]['U_Origen']);
$("#id").val(data[0]['Code']);
$("#fecha1").val(`${localDate(data[0]['U_Fecha'].split(' ')[0])} ${data[0]['U_Hora']<1000?data[0]['U_Hora'].slice(0,1):data[0]['U_Hora'].slice(0,2)}:${data[0]['U_Hora'].slice(-2)}`);


if(data[0]['U_FechaSal']){
$("#fecha1").val(`${localDate(data[0]['U_FechaSal'].split(' ')[0])} ${data[0]['U_HoraSal']<1000?data[0]['U_HoraSal'].slice(0,1):data[0]['U_HoraSal'].slice(0,2)}:${data[0]['U_HoraSal'].slice(-2)}`);
}

$("#usuario").val(data[0]['U_Nombre']);
$("#sucursal").val(data[0]['U_Sucursal']);
$("#estado").val(data[0]['U_Estado']);
$("#ticket").val(data[0]['U_NroTicket']);
$("#placa").val(data[0]['U_Placa']);
$("#marca").val(data[0]['U_Marca']);
$("#color").val(data[0]['U_Color']);
$("#conductor").val(data[0]['U_NombreChofer']);
$("#ci_conductor").val(data[0]['U_CI_Chofer']);
$("#ci_exp").val(data[0]['U_OrigenDoc']);
 $("#peso1").val(data[0]['U_Tara']);
 $("#peso2").val(data[0]['U_Bruto']);
 $("#neto").val(data[0]['U_Neto']);
 $("#cliente").val(data[0]['U_RazonSocial']);



 $("#observacion").val(data[0]['U_Observaciones']);
 document.getElementById("observacion").disabled = true;

 //$("#observacion2").val(data[0]['U_Observaciones2']);
 $("#observacion2").val("");




 observacion1= data[0]['U_Observaciones'];
 document.getElementById("cliente").disabled = true;

 var var_int=data[0]['U_ID_Destino'];
		         send_(ff_direccion,{call:'obtenerinfo',ee:var_int},function(datadd){
          
				    datadd.forEach(function (valuess) {
				
						var datoud= valuess.Name;
						$("#destino").val(datoud);
						document.getElementById("destino").disabled = true;
						
					});

				
                 });
				 



				 var var_int=data[0]['U_ID_Chata'];
				 if(var_int!=0){
					send_(ff_direccion,{call:'obtenerinfo',ee:var_int},function(datadd){
          
		  datadd.forEach(function (valuess) {
	  
			  var datoud= valuess.Name;
			  $("#chata").val(datoud);
			  document.getElementById("chata").disabled = true;
			  
		  });

	  
	   });
				 }else{
					$("#chata").val('');
			        document.getElementById("chata").disabled = true;
				 }
		       



				 var var_int=data[0]['U_ID_Producto'];
		         send_(ff_direccion,{call:'obtenerinfo',ee:var_int},function(datadd){
          
				    datadd.forEach(function (valuess) {
				
						var datoud= valuess.Name;
						$("#producto").val(datoud);
						document.getElementById("producto").disabled = true;
						
					});

				
                 });




				 var var_int=data[0]['U_ID_Transportadora'];
				 send_(ff_direccion,{call:'obtenerinfo',ee:var_int},function(datadd){
          
		  datadd.forEach(function (valuess) {
	  
			  var datoud= valuess.Name;
			  $("#transportadora").val(datoud);
			  document.getElementById("transportadora").disabled = true;
			  var datoud_d1= valuess.CI_NIT;
			  var datoud_d2= valuess.TELEFONO;

			  if(datoud_d1===undefined){
				  $("#CINITT").val('');
				  document.getElementById("CINITT").disabled = true;
			  }else{
				  $("#CINITT").val(datoud_d1);
				  document.getElementById("CINITT").disabled = true;
			  }
			  if(datoud_d1===undefined){
				  $("#TelefonoT").val('');
				  document.getElementById("TelefonoT").disabled = true;
			  }else{
				  $("#TelefonoT").val(datoud_d2);
				  document.getElementById("TelefonoT").disabled = true;
			  }
			  
		  });

	  
	   });


				 var var_int=data[0]['U_ID_Proveedor'];
		         send_(ff_direccion,{call:'obtenerinfo',ee:var_int},function(datadd){
          
				    datadd.forEach(function (valuess) {
				
						var datoud= valuess.Name;
						$("#proveedor").val(datoud);
						document.getElementById("proveedor").disabled = true;
						var datoud_d1= valuess.CI_NIT;
						var datoud_d2= valuess.TELEFONO;

						if(datoud_d1===undefined){
							$("#CINITP").val('');
							document.getElementById("CINITP").disabled = true;
						}else{
							$("#CINITP").val(datoud_d1);
							document.getElementById("CINITP").disabled = true;
						}
						if(datoud_d1===undefined){
							$("#TelefonoP").val('');
							document.getElementById("TelefonoP").disabled = true;
						}else{
							$("#TelefonoP").val(datoud_d2);
							document.getElementById("TelefonoP").disabled = true;
						}
						
					});

				
                 });



var f3= data[0]['U_TipoOrigen'];



if(f3==1){

	document.getElementById("tipos").disabled = true;
	         $("#tipo_interno").show();
			 $("#tipo_externo").hide();
		     $("#tipo_interno_s").empty();
			 var var_int=data[0]['U_ID_Origen_Int'];
			send_(ff_direccion,{call:'ListaAlmacen_info',ee:var_int},function(datala){

				var llerr= '';
				var con=0;
			    datala.forEach(function (values) {
				 con=con+1;
				 var codef= values.WhsCode;
				 var nombref= values.WhsName;
				 var cc=lector_select(codef,nombref,con);
			     llerr=llerr+cc;
		    	});
			    $("#tipo_interno_s").append(llerr);
				document.getElementById("tipo_interno_s").disabled = true;
				
			});
}else{
	if(f3==2){
		document.getElementById("tipos").options.selectedIndex = 1;
		document.getElementById("tipos").disabled = true;
		$("#tipo_externo").show();
       $("#tipo_interno").hide()
		         var var_int=data[0]['U_ID_Origen'];
		         send_(ff_direccion,{call:'obtenerinfo',ee:var_int},function(datadd){
          
				    datadd.forEach(function (valuess) {
				
						var datoud= valuess.Name;
						$("#origenf").val(datoud);
						document.getElementById("origenf").disabled = true;
						
					});

				
                 });
	}
}






if($('#estado').val()!='4'){
if($('#peso1').val()!='0'){
  if(querySelector('#getPeso1')!=null)querySelector('#getPeso1').remove();
}
if($('#peso2').val()!='0'){
  if(querySelector('#getPeso2')!=null)querySelector('#getPeso2').remove();
}
}

if(getSesion_('type')=='A'){

}else{
if($('#estado').val()=='2'){
  if(querySelector('#saver')!=null)querySelector('#saver').remove();
}
}

querySelector('#documentos').innerHTML=`<p id="showDoc" class="waves-effect btn">DOCUMENTOS</p>`;


}

	});






}

		
	     });

	





     });


</script>








<script>

function seleccion_tranportista(){
	var val = document.getElementById("transportadora").value;
    var opts = document.getElementById('brow2').childNodes;
    for (var i = 0; i < opts.length; i++) {
      if (opts[i].id === val) {
        alert(opts[i].value);
        break;
      }
    }
}






function seleccionv1(valop,lista){
	var namee= valop.id;
	var fgyf=0;
	var val = document.getElementById(namee).value;
	console.log('ft1 '+val);
   if(val.length>0){
	 var opts = document.getElementById(lista).childNodes;
     for (var i = 0; i < opts.length; i++) {
      if (opts[i].value === val) {
		  var cdf="#"+namee+"_did";
		  fgyf=opts[i].id;
		  $(cdf).val(fgyf);
        break;
      }
    }
   }else{
	var cdf="#"+namee+"_did";
    $(cdf).val(0);
   }


 if(lista=='brow1'){
	 if(fgyf!=0){
      send_(ff_direccion,{call:'obtenerinfo',ee:fgyf},function(datadd){
      console.log('datos_proveedor '+JSON.stringify(datadd.TELEFONO));
	   


	                datadd.forEach(function (values) {
					    var datou_CINIT= values.CI_NIT;
						var datou_TELEFONO= values.TELEFONO;
           

	                	if(datou_CINIT==null){
						
						$("#CINITP").val('');
   
				     	}else{
						$("#CINITP").val(datou_CINIT);
					    }
							
						

						if(datou_TELEFONO==null){
							$("#TelefonoP").val('');
						}else{
				
							$("#TelefonoP").val(datou_TELEFONO);
							//$("#TelefonoP").val(789456);
						}
					});

					


 
     });
	 }else{
		$("#CINITP").val('');
	    $("#TelefonoP").val('');
	 }

 }

 if(lista=='brow2'){
	if(fgyf!=0){
	    send_(ff_direccion,{call:'obtenerinfo',ee:fgyf},function(datadd){
        console.log('datos_proveedor '+JSON.stringify(datadd.CI_NIT));
	   
	                

						datadd.forEach(function (values) {
					    var datou_CINIT= values.CI_NIT;
						var datou_TELEFONO= values.TELEFONO;
           

	                	if(datou_CINIT==null){
						
						$("#CINITT").val('');
   
				     	}else{
						$("#CINITT").val(datou_CINIT);
					    }
							
						

						if(datou_TELEFONO==null){
							$("#TelefonoT").val('');
						}else{
				
							$("#TelefonoT").val(datou_TELEFONO);
							//$("#TelefonoP").val(789456);
						}
					});


 
     });
   }else{
     $("#CINITT").val('');
     $("#TelefonoT").val('');
    }
 }
 

}











function seleccion(valop){
    var namee= valop.id;
	$('input[name='+namee+']').on('input',function() {
	 var fgt= $("#"+namee+"").val();
     var selectedOption = $('option[value="'+fgt+'"]');
	 
     var fty= selectedOption.length ? selectedOption.attr('id'): '0';
     console.log(fty);
     });
}

function lector_lista(va1, va2){
	var ller= `<option id="`+va1+`" value="`+va2+`">`;
	return ller;
}




(function(b){b.toast=function(a,h,g,l,k){b("#toast-container").length||
	(
		b("body").prepend('<div id="toast-container" aria-live="polite" aria-atomic="true"></div>'),
	 b("#toast-container").append('<div id="toast-wrapper"></div>'));
	 var c="",d="",e="text-muted",f="",m="object"===typeof a?a.title||"":a||"AVISO!";
	 h="object"===typeof a?a.subtitle||"":h||"";g="object"===typeof a?a.content||"":g||"";
	 k="object"===typeof a?a.delay||3E3:k||3E3;switch("object"===typeof a?a.type||"":l||"info"){case "info":c="bg-info";
f=e=d="text-white";break;
case "success":c="bg-success";f=e=d="text-white";break;case "warning":case "warn":c="bg-warning";f=e=d="text-white";
break;
case "error":case "danger":c="bg-danger",f=e=d="text-white"}a='<div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="'+k+'">'+('<div class="toast-header '+c+" "+d+'">')+('<strong class="mr-auto">'+m+"</strong>");a+='<small class="'+e+'">'+h+"</small>";
a+='<button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">';
a+='<span aria-hidden="true" class="'+f+'">&times;</span>';a+="</button>";a+="</div>";""!==g&&(a+='<div class="toast-body">',a+=g,a+="</div>");a+="</div>";b("#toast-wrapper").append(a);b("#toast-wrapper .toast:last").toast("show")}})(jQuery);


      const TYPES = ['info', 'warning', 'success', 'error'],
      TITLES = {
        'info': 'AVISO!',
        'success': 'Awesome!',
        'warning': 'Watch Out!',
        'error': 'Doh!'
      },
      CONTENT = {
        'info': 'Por favor vuelva a intentar.',
        'success': 'The action has been completed.',
        'warning': 'It\'s all about to go wrong',
        'error': 'It all went wrong.'
      };




function show_random_toast()
{
  let type = TYPES[Math.floor(Math.random() * TYPES.length)],
      title = TITLES[type],
      content = CONTENT[type];

  $.toast({
    title: title,
    subtitle: '11 mins ago',
    content: content,
    type: type,
    delay: 5000
  });
}


	</script>





<script>




querySelector('#saver').onclick=function(){
	showProgress();

  var placac= $('#placa').val();


 send_(ff_direccion,{call:'getPlacaCP',idSesion:getSesion_('idSesion'),placa:placac},function(data){


if($('#ticket').val()!='0'){
     finishPesaje();
     return;
}

console.log('ff ff '+JSON.stringify(data));

console.log('cantidad '+data.length);

if(data.length==1 & $('#origen').val()=='OTROS SERVICIOS'){
	 finishPesaje();
     return;
}else{
	if(data.length>1&$('#origen').val()=='OTROS SERVICIOS'){
		var tdetalle='';
    for (ii=0; ii<data.length; ii++ ){
      var ccf=ii+1;
      if(data[ii]['U_Estado']=='1'|data[ii]['U_Estado']=='4'){
        var dadf=ccf+`. Este Nº de placa tiene un documento pendiente de finalizacion (Ticket : ${data[ii]['U_NroTicket']}) en la ${data[ii]['U_Sucursal']}, tipo de Servicio  ${data[ii]['U_Origen']} `;
        tdetalle= tdetalle+'<br>'+dadf;
      }
    }
	hideProgress();
	   let type = TYPES[3];
		  $.toast({
         title: tdetalle,
         type: type,
         delay: 10000
        });

       return;
   
	}else{
		if(data.length==0&$('#origen').val()=='OTROS SERVICIOS'){
			finishPesaje();
            return;
		}
	}
}

});




}




function finishPesaje(){
  
	var d_origenf_id_INT='';
	var d_origenf_id_EXT=0;
	
	var f3_ti=0;
  let endData=[];
  let endData1=[];
  var origen=$('#origen').val();
 let selectedIndex=2;
 var ob1=$('#observacion').val();
 var ob2=$('#observacion2').val();




  if($('#ticket').val()=='0'){





    if($('#peso1').val()==''& $('#peso2').val()==''& $('#neto').val()==''){

	    let type = TYPES[3];
		  $.toast({
         title: 'Complete los campos de Pesaje',
         type: type,
         delay: 5000
        });

      return;
    }
  }else{
	
    if($('#peso1').val()==''|$('#peso2').val()==''|$('#neto').val()==''){

	    let type = TYPES[3];
		  $.toast({
         title: 'Complete los campos de Pesaje',
         type: type,
         delay: 5000
        });
      return;
    }
  }

  var d_origenf_id_INT="";
  var d_origenf_id_EXT=0;

 var d_proveedor=$("#proveedor_did").val();
 var d_transportadora=$("#transportadora_did").val(); 
 var d_producto_id=$("#producto_did").val();
 var d_chata_id=$("#chata_did").val();
 var d_destino_id= $("#destino_did").val();
 var seleccion=document.getElementById('tipos');
 var f1=seleccion.selectedIndex;
 var f2=seleccion.options[seleccion.selectedIndex].text;
 var f3=seleccion.options[seleccion.selectedIndex].value; 

console.log('campo_registrar ff_proveedor '+d_proveedor);
console.log('campo_registrar ff_transportadora '+d_transportadora);
console.log('campo_registrar ff_producto '+d_producto_id);
console.log('campo_registrar ff_chata '+d_chata_id);
console.log('campo_registrar ff_destino_externo '+d_destino_id);
           
       if(d_proveedor!=0 && d_transportadora!=0 && d_producto_id!=0  && d_destino_id!=0){


		    if(f3==1){
	 			var seleccion_ti=document.getElementById('tipo_interno_s');
		    	var f1_ti=seleccion_ti.selectedIndex;
                var f2_ti=seleccion_ti.options[seleccion_ti.selectedIndex].text;
                d_origenf_id_INT=seleccion_ti.options[seleccion_ti.selectedIndex].value; 
				console.log('campo_registrar ff_origen_interno '+d_origenf_id_INT);
			}else{
				var d_origenf_id_EXT=$("#origenf_did").val();
				console.log('campo_registrar ff_origen_externo '+d_origenf_id_EXT);
			
			}


			console.log($('#observacion').val());

		endData.push({
      "Code": $('#id').val(),
      "Name": $('#id').val(),
      "U_NroTicket": $('#ticket').val(),
      "U_Sucursal": $('#sucursal').val(),
      "U_Fecha": null,
      "U_Hora": null,
      "U_Origen": origen,
      "U_Estado": $('#estado').val(),
      "U_Placa": $('#placa').val(),
      "U_Marca": $('#marca').val(),
      "U_Color": $('#color').val(),
      "U_NombreChofer": $('#conductor').val(),
      "U_CI_Chofer": $('#ci_conductor').val(),
      "U_Bruto": $('#peso2').val(),
      "U_Tara": $('#peso1').val(),
      "U_Neto": $('#neto').val(),
      "U_NIT": origen=="CONTADO"?$('#nit').val():"",
	  "U_Observaciones":null,
	  "U_Observaciones2":null,
	  "U_RazonSocial": $('#cliente').val(),
      "U_CardCode": selectedIndex==2?"":origen=="CONTADO"&incomingPayments!=null?incomingPayments['CardCode']:"",
      "U_NroFactura": selectedIndex==2?"":origen=="CONTADO"&invoices!=null?invoices['U_LB_NumeroFactura']:"",
      "U_NroAutorizacion":selectedIndex==2?"0":origen=="CONTADO"&invoices!=null?invoices['U_LB_NumeroAutorizac']:"0",
      "U_CodigoControl":selectedIndex==2?"":origen=="CONTADO"&invoices!=null?invoices['U_LB_CodigoControl']:"",
      "U_FecLimEmision":selectedIndex==2?null:origen=="CONTADO"&invoices!=null?invoices['U_LB_FechaLimiteEmis']:null,
      "U_TotalFactura":selectedIndex==2?"40.02":origen=="CONTADO"&invoices!=null?invoices['DocTotal']:"40.02",
      "U_DocEntryFactura":selectedIndex==2?0:origen=="CONTADO"&invoices!=null?invoices['DocEntry']:0,
      "U_NroDocFactura":selectedIndex==2?$('#facturaNumer').val():origen=="CONTADO"&invoices!=null?invoices['DocNum']:0,
      "U_DocEntryPagoRec":selectedIndex==2?0:origen=="CONTADO"&incomingPayments!=null?incomingPayments['DocNum']:0,
      "U_NroDocPagoRec":selectedIndex==2?0:origen=="CONTADO"&incomingPayments!=null?incomingPayments['DocEntry']:0,
      "U_DocEntryEntrega":selectedIndex==2?0:origen=="CONTADO"&deliveryNotes!=null?deliveryNotes['DocEntry']:0,
      "U_NroDocEntrega":selectedIndex==2?0:origen=="CONTADO"&deliveryNotes!=null?deliveryNotes['DocNum']:0,
      "U_IdUsuario": getSesion_('userPeaje'),
      "U_NroDoc": $('#ticket').val(),
      "U_Nombre": $('#usuario').val(),
      "U_OrigenDoc": $('#ci_exp').val(),
      "U_FechaSal": null,
      "U_HoraSal": null,
	  "U_ID_Proveedor": d_proveedor,
	  "U_ID_Transportadora":d_transportadora,
	  "U_ID_Producto":d_producto_id,
	  "U_ID_Origen":d_origenf_id_EXT,
	  "U_ID_Origen_Int":d_origenf_id_INT, 
	  "U_ID_Destino": d_destino_id,
	  "U_ID_Chata":d_chata_id,
	  "U_TipoOrigen":f3,
    });

	
	console.log('campo_registrar '+JSON.stringify(endData));


	send_(ff_direccion,{call:'get_datos_user'},function(datad){
	 var userr = datad[0]['usert'];
	 var passr = datad[0]['passt'];

	 send_(ff_direccion,{call:'login',user:userr,pase:passr},function(dataf){
		setSesion_('idSesion',dataf);


		send_(ff_direccion,{call:'finishBalanza',idSesion:getSesion_('idSesion'),index:selectedIndex,old:lastItem!=null?JSON.stringify(lastItem):null,array:JSON.stringify(endData),ob11:ob1,ob22:ob2,usuariot:userr },function(dataf){
	    console.log('ft '+JSON.stringify(dataf));

		if(dataf!=0){
			hideProgress();
			let type = TYPES[2];
		  $.toast({
         title:'Proceso registrado exitosamente.',
         type: type,
         delay: 10000
        });
			imprimir(dataf.id);
		
		}else{
            alert('sin info');
		}

     });



		
	 });
  

	});
  








	






	   }else{
		hideProgress();
		let type = TYPES[3];
		  $.toast({
         title: 'Obtenga Peso Nuevamente !!!',
         type: type,
         delay: 5000
        });
	   }

		




































}



function mayus(e) {
    e.value = e.value.toUpperCase();
}



function imprimir(ticket){

	
  send_(ff_direccion,{call:'set_sesion_posi',posi:'b.html' },function(data) {
	send_(ff_direccion,{call:'set_ticket',ticketr:ticket },function(datac) {
	 window.location.href = getSesion_('url');
    });
  });
  
	
	
	
}








</script>


