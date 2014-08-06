<?php

require_once "../controllers/Funciones_Ajax/Fnc_Global.php";
include_once "../lib/mpdf/mpdf.php";
include_once "../lib/phpexcel/PHPExcel.php";



# =====================	Beans Php
include_once "../beans/Bean_general.php" ;
include_once "../beans/Bean_perusuario.php" ;
include_once "../beans/Bean_transaccion.php" ;
include_once "../beans/Bean_parametro.php" ;
include_once "../beans/Bean_departamento.php" ;
include_once "../beans/Bean_provincia.php" ;
include_once "../beans/Bean_distrito.php" ;
include_once "../beans/Bean_caserio.php" ;
include_once "../beans/Bean_periodo.php" ;
include_once "../beans/Bean_persona.php" ;
include_once "../beans/Bean_perdocumento.php" ;
include_once "../beans/Bean_pertelefono.php" ;
include_once "../beans/Bean_permail.php" ;
include_once "../beans/Bean_pernatural.php" ;
include_once "../beans/Bean_perrelacion.php" ;
include_once "../beans/Bean_perparametro.php" ;
include_once "../beans/Bean_perubigeo.php" ;

# =====================	Clases Php
require_once "ClsConexion.php";
require_once "ClsTransaccion.php";
require_once "ClsUsuario.php";

require_once "ClsParametro.php";
require_once "ClsDepartamento.php";
require_once "ClsProvincia.php";
require_once "ClsDistrito.php";
require_once "ClsCaserio.php";
require_once "ClsPeriodo.php";
require_once "ClsSector.php";
require_once "ClsPersona.php";
require_once "ClsPerNatural.php";
require_once "ClsPerDocumento.php";
require_once "ClsPerTelefono.php";
require_once "ClsPerMail.php";
require_once "ClsPerRelacion.php";
require_once "ClsPerParametro.php";
require_once "ClsPerUbigeo.php";

require_once "ClsProductor.php";
require_once "ClsUbigeo.php";



# =====================	Funciones Php
require_once "../controllers/Funciones_Ajax/Fnc_Comun.php";
require_once "../controllers/Funciones_Ajax/Fnc_Transaccion.php";
require_once "../controllers/Funciones_Ajax/Fnc_Usuario.php";
require_once "../controllers/Funciones_Ajax/Fnc_xajax_Comun.php";
require_once "../controllers/Funciones_Ajax/Fnc_Parametro.php";
require_once "../controllers/Funciones_Ajax/Fnc_Periodo.php";
require_once "../controllers/Funciones_Ajax/Fnc_Caserio.php";
require_once "../controllers/Funciones_Ajax/Fnc_Sector.php";
require_once "../controllers/Funciones_Ajax/Fnc_Productor.php";
require_once "../controllers/Funciones_Ajax/Fnc_Rpt_Generar.php";
require_once "../controllers/Funciones_Ajax/Fnc_Parcela.php";

set_time_limit(0);
# INICIALIZAR XAJAX
$xajax->processRequest();



?>