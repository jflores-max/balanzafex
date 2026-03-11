DROP TABLE IF EXISTS balanza;
CREATE TABLE IF NOT EXISTS balanza (
	id integer PRIMARY KEY ASC,
	Code,
	Name,
	U_NroTicket,
	U_Fecha,
	U_Hora,
	U_Origen,
	U_Estado,
	U_Placa,
	U_Marca,
	U_Color,
	U_NombreChofer,
	U_CI_Chofer,
	U_Bruto,
	U_Tara,
	U_Neto,
	U_NIT,
	U_RazonSocial,
	U_NroFactura,
	U_NroAutorizacion,
	U_CodigoControl,
	U_FecLimEmision,
	U_DocEntryFactura,
	U_NroDocFactura,
	U_DocEntryPagoRec,
	U_NroDocPagoRec,
	U_DocEntryEntrega,
	U_NroDocEntrega,
	U_IdUsuario,
	U_NroDoc,
	U_Nombre,
	U_OrigenDoc,
	U_Observaciones,
	U_FechaSal,
	U_HoraSal,
	U_CardCode,
	U_TotalFactura,
	U_Sucursal,
	U_Usuario_Anulacion,
	U_Fecha_Anulacion,
	U_Hora_Anulacion,
	Cambio
	);

DROP TABLE IF EXISTS balanza1;
CREATE TABLE IF NOT EXISTS balanza1 (
	id integer PRIMARY KEY ASC,
	Code,
	Name,
	U_Nro_Ticket,
	U_Nro_Orden,
	U_Peso_Total,
	U_Cliente,
	U_Fecha,
	U_Hora,
	U_ID,
	U_Tipo_Doc,
	U_Despachador,
	U_Observacion
	);

DROP TABLE IF EXISTS usuario;
CREATE TABLE IF NOT EXISTS usuario (id integer PRIMARY KEY ASC,user,pase,MEMO,CODI,CODEV,OWNER,SUCURSAL,PROPIETARIO,TIPO,GOO,admin);
insert into usuario (user,pase,MEMO,CODI,CODEV,OWNER,SUCURSAL,PROPIETARIO,TIPO,GOO,admin) values("regdom","RRey2021","MEMO","CODI","CODEV","OWNER","SUCURSAL","PROPIETARIO","U","GOO","1");

DROP TABLE IF EXISTS extra;
CREATE TABLE IF NOT EXISTS extra (
	Code,
	Data
);
insert into extra values("RAZON",'[{"RAZON":"MONTERREY LOCAL"},{"RAZON":"MONTERREY CLIENTES"},{"RAZON":"IMPORTADORA MONTERREY SRL"},{"RAZON":"MONTERREY (INGRESO DE TRASPASO)"},{"RAZON":"KIMBERLY BOLIVIA SA"},{"RAZON":"MONTACARGA"},{"RAZON":"MONTERREY CHATARRAS"}]');
insert into extra values("TIPO",'[{"TIPO":"INGRESO DE TRASPASO"},{"TIPO":"TRASPASO"},{"TIPO":"NOTA DE DESPACHO"},{"TIPO":"NOTA DE DEBITO"},{"TIPO":"CEMENTO ITACAMBA"},{"TIPO":"OBSERVACIONES"}]');	
insert into extra values("SUCURSAL",'[{"SUCURSAL":"Sucursal 00"},{"SUCURSAL":"Sucursal 01"},{"SUCURSAL":"Sucursal 02"},{"SUCURSAL":"Sucursal 03"},{"SUCURSAL":"Sucursal 04"},{"SUCURSAL":"Sucursal 05"},{"SUCURSAL":"Sucursal 06"},{"SUCURSAL":"Sucursal 07"},{"SUCURSAL":"Sucursal 08"},{"SUCURSAL":"Sucursal 09"},{"SUCURSAL":"Sucursal 10"},{"SUCURSAL":"Sucursal 11"},{"SUCURSAL":"Sucursal 12"},{"SUCURSAL":"Sucursal 16"},{"SUCURSAL":"Sucursal 17"},{"SUCURSAL":"Sucursal 18"},{"SUCURSAL":"Sucursal 19"},{"SUCURSAL":"Sucursal 20"}]');
