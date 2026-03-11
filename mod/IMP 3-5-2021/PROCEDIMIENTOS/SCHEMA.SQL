ALTER PROCEDURE "SBO_MONTERREY"."SP_INT_REPORTE"(IN ORIGEN CHAR(20),IN FECHA1 CHAR(10),IN FECHA2 CHAR(10))
LANGUAGE SQLSCRIPT
SQL SECURITY INVOKER
READS SQL DATA AS
BEGIN
IF :ORIGEN <> 'CONTADO' THEN
select T0."U_NroTicket" as TICKET,T0."U_Origen" as ORIGEN,count(T1."U_Nro_Ticket") as CANTIDAD,
T0."U_RazonSocial" as RAZON, concat(TO_DATE(T0."U_Fecha"),
	concat(' ',
		concat(substring(T0."U_Hora"+10000,2,2),
			concat(':',substring(T0."U_Hora"+10000,4,2))
			)
		)
	) as FECHA, T0."U_Placa" as PLACA,T0."U_Estado" as ESTADO, T1."U_Nro_Orden" AS DOCNUMBER, 
T1."U_Cliente" AS CLIENTE, T1."U_Tipo_Doc" AS TIPODOC, T1."U_Observacion" as OBSERVACION
from "SBO_MONTERREY"."@BALANZA" T0 LEFT JOIN "SBO_MONTERREY"."@BALANZA1" T1
ON T0."U_NroTicket" = T1."U_Nro_Ticket"
group by T0."U_NroTicket",T1."U_Nro_Ticket",T0."U_Origen",T0."U_Estado",T1."U_Nro_Orden",
T0."U_RazonSocial", T0."U_Fecha", T0."U_Hora", T0."U_Placa", T1."U_Nro_Orden", 
T1."U_Cliente", T1."U_Tipo_Doc", T1."U_Observacion"
having T0."U_Fecha" between :FECHA1 and :FECHA2 and T0."U_Origen"='CREDITO' and T0."U_Estado"<>3 
order by T1."U_Tipo_Doc",T0."U_Fecha" asc;
ELSE 
select "U_NroTicket" as TICKET,"U_RazonSocial" as RAZON,
concat(TO_DATE("U_Fecha"),
	concat(' ',
		concat(substring("U_Hora"+10000,2,2),
			concat(':',substring("U_Hora"+10000,4,2))
			)
		)
	) as FECHA,"U_NroDocFactura" as FACTURA,"U_TotalFactura" as IMPORTE,"U_Placa" AS PLACA,"U_Origen" as ORIGEN
from "@BALANZA" 
where "U_Origen"=:ORIGEN and "U_Fecha" BETWEEN :FECHA1 AND :FECHA2 ORDER BY "U_NroTicket" ASC;
END IF;
END;

CREATE PROCEDURE "SBO_MONTERREY".SP_INT_GET_MAX_CODE_LOG()
LANGUAGE SQLSCRIPT
SQL SECURITY INVOKER AS
BEGIN
SELECT max(TO_INT("Code")) as CODE from "@BALANZA_LOG";
END;

CREATE PROCEDURE "SBO_MONTERREY".SP_INT_GET_MAX_CODE_AUTO()
LANGUAGE SQLSCRIPT
SQL SECURITY INVOKER AS
BEGIN
SELECT max(TO_INT("Code")) as CODE from "@BALANZA_AUTO";
END;