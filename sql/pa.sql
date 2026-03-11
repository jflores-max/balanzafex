SET SCHEMA BCK_MON2020;

DROP PROCEDURE SP_INT_DATA;
CREATE PROCEDURE SP_INT_DATA(IN usuario CHAR(50))
LANGUAGE SQLSCRIPT
SQL SECURITY INVOKER
READS SQL DATA AS
BEGIN
SELECT
T3."Memo" as MEMO,
T0."INTERNAL_K" AS CODI,
(SELECT TX."Name" FROM OUBR TX WHERE TX."Code" = T0."Branch") as RAMA,
T3."SlpCode" as CODEV,
T2."empID" as OWNER,
T1."Name" as SUCURSAL,
T0."U_NAME" as PROPIETARIO,
T2."U_TipoUser" AS TIPO,
T2."U_DirIP" AS GOO
FROM OUSR T0 
INNER JOIN OUDG T1 ON T0."DfltsGroup" = T1."Code"
INNER JOIN OHEM T2 ON T0."USERID" = T2."userId"
INNER JOIN OSLP T3 ON T2."salesPrson" = T3."SlpCode"
WHERE T0."USER_CODE" =:usuario;
END;

DROP PROCEDURE SP_INT_GET_TABLE;
CREATE PROCEDURE SP_INT_GET_TABLE(IN ITEM INT,IN FECHA1 CHAR(10),IN FECHA2 CHAR(10),IN SUCURSAL VARCHAR(50))
LANGUAGE SQLSCRIPT
SQL SECURITY INVOKER
READS SQL DATA AS
BEGIN
IF :ITEM > 0 THEN
select "Code","U_NroTicket", "U_Placa","U_Origen", "U_Estado", concat(TO_DATE("U_Fecha"),
	concat(' ',
		concat(substring("U_Hora"+10000,2,2),
			concat(':',substring("U_Hora"+10000,4,2))
			)
		)
	) as FECHA from "@BALANZA" where "U_NroTicket"=:ITEM and "U_Sucursal"=:SUCURSAL;
ELSE 
select "Code","U_NroTicket", "U_Placa","U_Origen", "U_Estado", concat(TO_DATE("U_Fecha"),
	concat(' ',
		concat(substring("U_Hora"+10000,2,2),
			concat(':',substring("U_Hora"+10000,4,2))
			)
		)
	) as FECHA from "@BALANZA" where "U_Sucursal"=:SUCURSAL and "U_Fecha" BETWEEN :FECHA1 AND :FECHA2 ORDER BY "U_NroTicket" DESC;
END IF;
END;

DROP PROCEDURE SP_INT_JSONENTREGA;
CREATE PROCEDURE SP_INT_JSONENTREGA(IN DOCENTRY INTEGER)
LANGUAGE SQLSCRIPT
SQL SECURITY INVOKER
READS SQL DATA AS
BEGIN
SELECT T0."CardCode" as "CardCode", 
T0."DocTotal" as "DocTotal",
0 as "LineNum",
13 as "BaseType",
:DOCENTRY as "BaseEntry",
0 as "BaseLine"
FROM OINV T0 WHERE T0."DocEntry" = :DOCENTRY;
END;

DROP PROCEDURE SP_INT_JSONFACTURA;
CREATE PROCEDURE SP_INT_JSONFACTURA(IN NIT CHAR(20),IN EMPID INTEGER)
LANGUAGE SQLSCRIPT
SQL SECURITY INVOKER
READS SQL DATA AS
BEGIN
SELECT 
'dDocument_Items' As DocType,
'CL009499' As CardCode,
'USD' As  DocCurrency,
1 As TransportationCode,
4 as Indicator,
'tYES' As ReserveInvoice,
96 As SalesPersonCode,
0 As LineNum,
'SRV0003' As ItemCode,
1 As Quantity,
'USD' As Currency,
'IVA' As TaxCode,
T4."U_CCOSTO1" AS COGSCostingCode,
T4."U_CCOSTO2" As CostingCode2,
T4."U_CCOSTO3" As CostingCode3,
T4."U_CCOSTO4"  As CostingCode4,
:NIT As FederalTaxID
FROM OHEM T0
INNER JOIN OUSR T1 ON T0."userId" = T1."USERID"
INNER JOIN OUBR T2 ON T1."Branch" = T2."Code"
INNER JOIN NNM1 T3 ON T2."Name" = T3."BeginStr"
INNER JOIN "@SUCURSALES" T4 ON T3."BeginStr" = T4."Code"
WHERE T0."empID" = :EMPID
GROUP BY T4."U_CCOSTO1",T4."U_CCOSTO2",T4."U_CCOSTO3",T4."U_CCOSTO4";
END;



DROP PROCEDURE SP_INT_JSONPAGORECIBIDO;
CREATE PROCEDURE SP_INT_JSONPAGORECIBIDO(IN DOCENTRY INTEGER)
LANGUAGE SQLSCRIPT
SQL SECURITY INVOKER
READS SQL DATA AS
BEGIN
SELECT T0."CardCode" as "CardCode", 
T0."DocCur" as "DocCurrency",
T0."DocTotal" as "CashSum",
'110101002' as "CashAccount",
0 as "LineNum",
:DOCENTRY as "DocEntry",
'it_Invoice' as "InvoiceType",
1 as "InstallmentId"
FROM OINV T0 WHERE T0."DocEntry" = :DOCENTRY;
END;

DROP PROCEDURE SP_INT_REPORTE;
CREATE PROCEDURE SP_INT_REPORTE(IN ORIGEN CHAR(20),IN FECHA1 CHAR(10),IN FECHA2 CHAR(10),IN SUCURSAL VARCHAR(50))
LANGUAGE SQLSCRIPT
SQL SECURITY INVOKER
READS SQL DATA AS
BEGIN
IF :ORIGEN <> 'CONTADO' THEN
select T0."U_Sucursal" AS SUCURSAL,T0."U_NroTicket" as TICKET,T0."U_Origen" as ORIGEN,count(T1."U_Nro_Ticket") as CANTIDAD,
T0."U_RazonSocial" as RAZON, concat(TO_DATE(T0."U_Fecha"),
	concat(' ',
		concat(substring(T0."U_Hora"+10000,2,2),
			concat(':',substring(T0."U_Hora"+10000,4,2))
			)
		)
	) as FECHA, T0."U_Placa" as PLACA,T0."U_Estado" as ESTADO, T1."U_Nro_Orden" AS DOCNUMBER, 
T1."U_Cliente" AS CLIENTE, T1."U_Tipo_Doc" AS TIPODOC, T1."U_Observacion" as OBSERVACION
from "@BALANZA" T0 LEFT JOIN "@BALANZA1" T1
ON T0."Code" = T1."U_Nro_Ticket"
group by T0."U_Sucursal",T0."U_NroTicket",T1."U_Nro_Ticket",T0."U_Origen",T0."U_Estado",T1."U_Nro_Orden",
T0."U_RazonSocial", T0."U_Fecha", T0."U_Hora", T0."U_Placa", T1."U_Nro_Orden", 
T1."U_Cliente", T1."U_Tipo_Doc", T1."U_Observacion"
having T0."U_Fecha" between :FECHA1 and :FECHA2 and T0."U_Origen"='CREDITO' and T0."U_Sucursal"=:SUCURSAL and T0."U_Estado"<>3 
order by T0."U_NroTicket" asc;
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
where "U_Origen"=:ORIGEN and "U_Sucursal"=:SUCURSAL and "U_Fecha" BETWEEN :FECHA1 AND :FECHA2 ORDER BY "U_NroTicket" ASC;
END IF;
END;

DROP PROCEDURE SP_INT_QUERY;
CREATE PROCEDURE SP_INT_QUERY(IN QUERY VARCHAR(5000))
LANGUAGE SQLSCRIPT SQL SECURITY INVOKER AS
BEGIN 
DECLARE T VARCHAR(5000);
SELECT :QUERY
INTO     T 
FROM    DUMMY;
EXECUTE IMMEDIATE :T;
END;

