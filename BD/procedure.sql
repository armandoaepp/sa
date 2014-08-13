/*
Navicat MySQL Data Transfer

Source Server         : LOCAL
Source Server Version : 50616
Source Host           : 127.0.0.1:3306
Source Database       : planeatec_sa

Target Server Type    : MYSQL
Target Server Version : 50616
File Encoding         : 65001

Date: 2014-08-11 10:16:50
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Procedure structure for ups_Get_Periodo_Activo
-- ----------------------------
DROP PROCEDURE IF EXISTS `ups_Get_Periodo_Activo`;
DELIMITER ;;
CREATE PROCEDURE `ups_Get_Periodo_Activo`()
BEGIN
	# ESTRAER PERIODO ACTIVO
	# debe de haber un solo periodo ACTIVO :)
	SELECT
		periodo.nPrdCodigo,
		periodo.cPrdDescripcion ,
		periodo.dPrdFecInic,
		periodo.dPrdFecFin
	FROM periodo
	WHERE periodo.nPrdEstado = 1
	LIMIT 1;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Buscar_Parametro
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Buscar_Parametro`;
DELIMITER ;;
CREATE PROCEDURE `usp_Buscar_Parametro`(nParCodigo int (11), nParClase int(11))
BEGIN

		SELECT
				parametro.nParCodigo,
				parametro.cParJerarquia ,
				parametro.cParNombre,
				parametro.cParDescripcion
		FROM parametro
		WHERE parametro.nParEstado = 1
		AND parametro.nParClase = nParClase
		AND parametro.nParCodigo = nParCodigo;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Buscar_PerCosecha_by_nPerCosCodigo
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Buscar_PerCosecha_by_nPerCosCodigo`;
DELIMITER ;;
CREATE PROCEDURE `usp_Buscar_PerCosecha_by_nPerCosCodigo`(nPerCosCodigo INT)
BEGIN
		SELECT
			percosecha.nPerCosCodigo,
			percosecha.cPerCodigo,
			percosecha.nParcCodigo,
			percosecha.nParcClase,
			percosecha.nProdCodigo,
			percosecha.nProdClase,
			percosecha.nPrdCodigo,
			percosecha.cCosCodigo,
			percosecha.fHectareas,
			percosecha.fQuintales,
			percosecha.fKilogramos,
			percosecha.fHolgura
			-- percosecha.cGlosa
		FROM percosecha
		WHERE percosecha.nPerCosCodigo = nPerCosCodigo;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Buscar_PerParametro
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Buscar_PerParametro`;
DELIMITER ;;
CREATE PROCEDURE `usp_Buscar_PerParametro`(cPerCodigo VARCHAR(20) , nParCodigo INT, nParClase INT)
BEGIN

	SELECT
		perparametro.cPerCodigo,
		perparametro.cPerParValor ,
		perparametro.cPerParGlosa
	FROM 	perparametro
	WHERE perparametro.cPerCodigo = cPerCodigo
	AND perparametro.nParCodigo = nParCodigo
	AND perparametro.nParClase =  nParClase
	;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Buscar_Persona_By_cPerCodigo
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Buscar_Persona_By_cPerCodigo`;
DELIMITER ;;
CREATE PROCEDURE `usp_Buscar_Persona_By_cPerCodigo`(cPerCodigo varchar(20))
BEGIN
	-- ok
	SELECT persona.cPerCodigo, persona.cPerNombre, persona.cPerApellidos
	FROM persona
	WHERE persona.cPerCodigo = cPerCodigo;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Buscar_Persona_By_cPerDocNumero
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Buscar_Persona_By_cPerDocNumero`;
DELIMITER ;;
CREATE PROCEDURE `usp_Buscar_Persona_By_cPerDocNumero`(nPerTipo int(11), nPerDocTipo int(11), cPerDocNumero varchar(20))
BEGIN
	#Routine body goes here...
	SELECT persona.cPerCodigo, persona.cPerNombre, persona.cPerApellidos,
				perdocumento.nPerDocTipo, perdocumento.cPerDocNumero
	FROM persona
	INNER JOIN perdocumento ON persona.cPerCodigo=perdocumento.cPerCodigo
	WHERE persona.nPerEstado=1
	AND perdocumento.nPerDocEstado=1
	AND	( (nPerTipo	=	0  ) 				OR 	(persona.nPerTipo = nPerTipo) )
	AND	( (nPerDocTipo	=	0  ) 		OR 	(perdocumento.nPerDocTipo = nPerDocTipo) )
	AND	( (cPerDocNumero	=	"-")	OR	(perdocumento.cPerDocNumero LIKE CONCAT(cPerDocNumero,"%")) );
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Elm_Persona
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Elm_Persona`;
DELIMITER ;;
CREATE PROCEDURE `usp_Elm_Persona`(cPerCodigo varchar(100))
BEGIN
	UPDATE persona
	SET nPerEstado=0
	WHERE persona.cPerCodigo=cPerCodigo;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Filtrar_Parametro
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Filtrar_Parametro`;
DELIMITER ;;
CREATE PROCEDURE `usp_Filtrar_Parametro`(nOriReg Int(4), nCanReg Int(4), nPagRegistro Int(4) , nParClase int(11) , cParNombre varchar(100), cParDescripcion varchar(500))
BEGIN

	IF  (nPagRegistro = 1 ) THEN
		SET @sentencia = CONCAT('SELECT parametro.nParCodigo,
							parametro.cParNombre,
							IFNULL(parametro.cParDescripcion,"") cParDescripcion
					FROM parametro
					WHERE parametro.nParClase="',nParClase,'"
					AND parametro.nParEstado = 1
					AND( ( "',cParNombre ,'" 				= "-" )	OR ( parametro.cParNombre like "',cParNombre ,'%") )
					AND( ( "',cParDescripcion ,'" 	= "-" ) OR ( parametro.cParDescripcion like "',cParDescripcion ,'%") )
					ORDER BY parametro.cParDescripcion ASC
					LIMIT  ',nOriReg,',',nCanReg,' ; ');
					prepare consulta FROM @sentencia;
					execute consulta;
	ELSE
		SELECT parametro.nParCodigo,
				parametro.cParNombre,
				IFNULL(parametro.cParDescripcion,"") cParDescripcion
		FROM parametro
		WHERE parametro.nParClase = nParClase
		AND parametro.nParEstado = 1
		AND ( ( cParNombre 			= "-" ) OR ( parametro.cParNombre 			LIKE CONCAT(cParNombre,'%') ) )
		AND	( ( cParDescripcion = "-" ) OR ( parametro.cParDescripcion 	LIKE CONCAT(cParDescripcion,'%') ) )
		ORDER BY parametro.cParDescripcion ASC ;
	END IF;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Get_Caserios_by_nDisCodigo
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Get_Caserios_by_nDisCodigo`;
DELIMITER ;;
CREATE PROCEDURE `usp_Get_Caserios_by_nDisCodigo`(nDisCodigo INT)
BEGIN
	SELECT
		caserio.nCasCodigo ,
		caserio.cCasDescripcion
	FROM caserio
	WHERE caserio.nDisCodigo = nDisCodigo
	;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Get_Caserio_by_nCasCodigo
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Get_Caserio_by_nCasCodigo`;
DELIMITER ;;
CREATE PROCEDURE `usp_Get_Caserio_by_nCasCodigo`(nCasCodigo INT)
BEGIN
	SELECT
		caserio.nCasCodigo ,
		caserio.cCasDescripcion ,
		caserio.nDisCodigo
	FROM caserio
	WHERE caserio.nCasEstado =  1
	AND caserio.nCasCodigo = nCasCodigo ;


END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_get_DocPersona
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_get_DocPersona`;
DELIMITER ;;
CREATE PROCEDURE `usp_get_DocPersona`(cDocCodigo varchar(20), cPerCodigo varchar(20), nDocTipo int(4), nDocPerTipo int(4), nPerRelacion int(4))
BEGIN
	#Routine body goes here...
	SELECT	docpersona.cDocCodigo, docpersona.cPerCodigo
	FROM 	docpersona
	WHERE docpersona.cDocCodigo		=	cDocCodigo
	AND		docpersona.cPerCodigo		=	cPerCodigo
	AND		docpersona.nDocTipo			=	nDocTipo
	AND		docpersona.nDocPerTipo	=	nDocPerTipo
	AND		docpersona.nPerRelacion	=	nPerRelacion;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Get_Parametro_By_cParClase
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Get_Parametro_By_cParClase`;
DELIMITER ;;
CREATE PROCEDURE `usp_Get_Parametro_By_cParClase`(nParClase int(11))
BEGIN
		SELECT parametro.nParCodigo,
				parametro.cParNombre,
				parametro.cParDescripcion
		FROM parametro
		WHERE parametro.nParEstado = 1
		AND parametro.nParClase = nParClase
		ORDER BY 	parametro.cParDescripcion ,
		parametro.cParNombre  ASC;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Get_Parametro_By_Todos
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Get_Parametro_By_Todos`;
DELIMITER ;;
CREATE PROCEDURE `usp_Get_Parametro_By_Todos`(nParCodigo int(4), nParClase Int(4), cParJerarquia nVarChar(20), cParNombre nVarChar(100), cParDescripcion nVarChar(500), nParEstado Int(3))
BEGIN

	SELECT parametro.nParCodigo,
		parametro.nParClase,
		parametro.cParJerarquia,
		parametro.cParNombre,
		parametro.cParDescripcion,
		(length(parametro.cParJerarquia)) as CanJerarquia
	From parametro
	WHERE (( nParCodigo = 0) OR (parametro.nParCodigo = nParCodigo ))
	AND (( nParClase = 0) OR (parametro.nParClase = nParClase ))
	AND (( cParJerarquia = '-' ) OR (parametro.cParJerarquia = cParJerarquia ))
	AND (( cParNombre = '-' ) OR (parametro.cParNombre = cParNombre ))
	AND (( cParDescripcion = '-' ) OR (parametro.cParDescripcion = cParDescripcion ))
	AND (( nParEstado = 0) OR (parametro.nParEstado = nParEstado ))
	ORDER BY parametro.cParJerarquia;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Get_Parametro_cParDesc_by_cParJeranquia
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Get_Parametro_cParDesc_by_cParJeranquia`;
DELIMITER ;;
CREATE PROCEDURE `usp_Get_Parametro_cParDesc_by_cParJeranquia`(nParClase int(11), cParJerarquia varchar(20), cParDescripcion varchar(200))
BEGIN

		SELECT 	parametro.nParCodigo,
						parametro.cParJerarquia ,
						parametro.cParNombre,
						parametro.cParDescripcion
		FROM parametro
		WHERE parametro.nParEstado = 1
		AND	parametro.nParClase = nParClase
		AND ( ( cParJerarquia 	= "-" ) OR ( parametro.cParJerarquia 			= cParJerarquia ) )
		AND	( ( cParDescripcion = "-" ) OR ( parametro.cParDescripcion 	= cParDescripcion ) );

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Get_Parametro_Head_nParClase-000
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Get_Parametro_Head_nParClase-000`;
DELIMITER ;;
CREATE PROCEDURE `usp_Get_Parametro_Head_nParClase-000`(nParClase INT(4))
BEGIN
		SELECT parametro.cParJerarquia ,
			parametro.cParNombre ,
			parametro.cParDescripcion FROM parametro
		WHERE parametro.nParClase =  nParClase
		AND parametro.nParEstado = 0
		AND parametro.nParCodigo = 0  ;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Get_Parametro_Padre_nParClase
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Get_Parametro_Padre_nParClase`;
DELIMITER ;;
CREATE PROCEDURE `usp_Get_Parametro_Padre_nParClase`(nParClase INT(4))
BEGIN
	-- OK -> para seleccionar el registro cabecera de cada clase 0_0
		SELECT
			parametro.cParJerarquia ,
			parametro.cParNombre ,
			parametro.cParDescripcion
		FROM parametro
		WHERE parametro.nParClase =  nParClase
		AND parametro.nParEstado = 0
		AND parametro.nParCodigo = 0  ;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Get_Parcelas_by_cPerCodigo
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Get_Parcelas_by_cPerCodigo`;
DELIMITER ;;
CREATE PROCEDURE `usp_Get_Parcelas_by_cPerCodigo`(nOriReg Int(4), nCanReg Int(4), nPagRegistro Int(4), cParNombre VARCHAR(100) , cParDescripcion VARCHAR(200), cPerCodigo VARCHAR(20))
BEGIN


	IF  (nPagRegistro = 1 ) THEN

		SET @sentencia = CONCAT('
					SELECT
						parametro.nParCodigo,
						parametro.cParNombre ,
						parametro.cParDescripcion,
						perparametro.cPerCodigo,
						perparametro.cPerParValor,
						perparametro.cPerParGlosa
					FROM parametro
					INNER JOIN perparametro ON   perparametro.nParCodigo =  parametro.nParCodigo
																	AND perparametro.nParClase = parametro.nParClase
					WHERE parametro.nParClase = 2006
					AND parametro.nParEstado =  1
					AND perparametro.cPerCodigo = "',cPerCodigo ,'"
				AND( ("',cParNombre  ,'" ="-"  ) OR ( parametro.cParNombre like "',cParNombre  ,'%") )
				AND( ("',cParDescripcion  ,'" ="-"  ) OR (  parametro.cParNombre like "',cParDescripcion  ,'%") )
				ORDER BY 	parametro.cParNombre, parametro.cParDescripcion ASC
				LIMIT ',nOriReg,',',nCanReg);
		prepare consulta FROM @sentencia;
		execute consulta;

	ELSE

		SELECT
			parametro.nParCodigo,
			parametro.cParNombre ,
			parametro.cParDescripcion,
			perparametro.cPerCodigo,
			perparametro.cPerParValor,
			perparametro.cPerParGlosa
		FROM parametro
		INNER JOIN perparametro ON   perparametro.nParCodigo =  parametro.nParCodigo
														AND perparametro.nParClase = parametro.nParClase

		WHERE parametro.nParClase = 2006
		AND parametro.nParEstado =  1
		AND perparametro.cPerCodigo = cPerCodigo
		AND ((cParNombre = "-") OR ( parametro.cParNombre	LIKE CONCAT(cParNombre,"%") ))
		AND ((cParDescripcion = "-") OR ( parametro.cParDescripcion	LIKE CONCAT(cParDescripcion,"%") ))
		ORDER BY 	parametro.cParNombre, parametro.cParDescripcion ASC
		;

	END IF;


END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Get_PerCoseha_by_cPerCodigo
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Get_PerCoseha_by_cPerCodigo`;
DELIMITER ;;
CREATE PROCEDURE `usp_Get_PerCoseha_by_cPerCodigo`(nOriReg Int(4), nCanReg Int(4), nPagRegistro Int(4), cPerCodigo VARCHAR(20))
BEGIN


	IF  (nPagRegistro = 1 ) THEN

		SET @sentencia = CONCAT('
					SELECT
						persona.cPerCodigo,
						percosecha.nPerCosCodigo ,
						p_parcela.nParCodigo AS nParCodParcela ,
						p_parcela.cParDescripcion AS cParDescParcela,
						p_producto.nParCodigo AS nParCodProducto,
						p_producto.cParDescripcion AS cParDescProducto,
						percosecha.cCosCodigo,
						percosecha.fHectareas,
						percosecha.fQuintales,
						percosecha.fKilogramos,
						percosecha.fHolgura

					FROM percosecha
					INNER JOIN persona ON persona.cPerCodigo = percosecha.cPerCodigo
					INNER JOIN parametro AS p_parcela ON p_parcela.nParCodigo =  percosecha.nParcCodigo
																						AND p_parcela.nParClase = percosecha.nParcClase
																						AND p_parcela.nParEstado =  1
					INNER JOIN parametro AS p_producto ON p_producto.nParCodigo =  percosecha.nProdCodigo
																					 AND p_producto.nParClase = percosecha.nProdClase
																					 AND p_producto.nParEstado =  1
					INNER JOIN periodo ON periodo.nPrdCodigo = percosecha.nPrdCodigo
															AND periodo.nPrdEstado =  1

					WHERE p_parcela.nParClase = 2006
					AND p_producto.nParClase =  2007
					AND persona.cPerCodigo = "',cPerCodigo ,'"
					AND percosecha.nPerCosEstado = 1
				ORDER BY p_parcela.cParDescripcion ASC
				LIMIT ',nOriReg,',',nCanReg);
		prepare consulta FROM @sentencia;
		execute consulta;

	ELSE


	SELECT
		persona.cPerCodigo,
		percosecha.nPerCosCodigo ,
		p_parcela.nParCodigo AS nParCodParcela ,
		p_parcela.cParDescripcion AS cParDescParcela,
		p_producto.nParCodigo AS nParCodProducto,
		p_producto.cParDescripcion AS cParDescProducto,
		percosecha.cCosCodigo,
		percosecha.fHectareas,
		percosecha.fQuintales,
		percosecha.fKilogramos,
		percosecha.fHolgura

	FROM percosecha
	INNER JOIN persona ON persona.cPerCodigo = percosecha.cPerCodigo
	INNER JOIN parametro AS p_parcela ON p_parcela.nParCodigo =  percosecha.nParcCodigo
																		AND p_parcela.nParClase = percosecha.nParcClase
																		AND p_parcela.nParEstado =  1
	INNER JOIN parametro AS p_producto ON p_producto.nParCodigo =  percosecha.nProdCodigo
																	 AND p_producto.nParClase = percosecha.nProdClase
																	 AND p_producto.nParEstado =  1
	INNER JOIN periodo ON periodo.nPrdCodigo = percosecha.nPrdCodigo
											AND periodo.nPrdEstado =  1

	WHERE p_parcela.nParClase = 2006
	AND p_producto.nParClase =  2007
	AND persona.cPerCodigo = cPerCodigo
	AND percosecha.nPerCosEstado = 1
	ORDER BY p_parcela.cParDescripcion ASC
		;

	END IF;


END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Get_Periodo_By_nPrdCodigo
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Get_Periodo_By_nPrdCodigo`;
DELIMITER ;;
CREATE PROCEDURE `usp_Get_Periodo_By_nPrdCodigo`(nPrdCodigo Int(4))
BEGIN

	SELECT periodo.nPrdCodigo,
		periodo.cPrdDescripcion,
		periodo.nPrdTipo ,
		periodo.dPrdFecInic,
		periodo.dPrdFecFin,
		periodo.nPrdEstado
	FROM periodo
	WHERE periodo.nPrdCodigo		  = nPrdCodigo;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Get_Permisos_Botonera_By_Usuario
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Get_Permisos_Botonera_By_Usuario`;
DELIMITER ;;
CREATE PROCEDURE `usp_Get_Permisos_Botonera_By_Usuario`(nPerTipo int(4), nPerEstado int(4), nPerUsuEstado Int(4), nPerUsuAccEstado Int(4), nParClase Int(4),cPerCodigo  varchar(20), nPerUsuAccGrupo Int(4), nParTipo Int(4), nParSrcClase Int(4), nParSrcCodigo Int(4))
BEGIN
	SELECT persona.cPerCodigo,
		persona.cPerNombre,
		persona.nPerTipo,
		perusuacceso.nPerUsuAccGrupo,
    perusuacceso.nPerUsuAccCodigo,
		perusuacceso.nPerUsuAccEstado,
		parametro.cParJerarquia,
		parametro.cParNombre,
    parametro.cParDescripcion,
		(length(parametro.cParJerarquia)) as CanJerarquia,
		parparametro.cValor
	FROM persona
  INNER JOIN perusuario  	ON persona.cPerCodigo    = perusuario.cPerCodigo
  INNER JOIN perusuacceso ON perusuario.cPerCodigo = perusuacceso.cPerCodigo
  INNER JOIN parametro    ON parametro.nParCodigo  = perusuacceso.nPerUsuAccCodigo AND parametro.nParClase = perusuacceso.nPerUsuAccObjCodigo
	INNER JOIN parparametro	ON parparametro.nParDstClase = parametro.nParClase AND parparametro.nParDstCodigo = parametro.nParCodigo
	WHERE persona.nPerTipo             = nPerTipo
  AND persona.nPerEstado             <> nPerEstado
  AND perusuario.nPerUsuEstado       <> nPerUsuEstado
  AND perusuacceso.nPerUsuAccEstado  <>	nPerUsuAccEstado
  AND parametro.nParClase            = nParClase
  AND persona.cPerCodigo             = cPerCodigo
	AND perusuacceso.nPerUsuAccGrupo	 = nPerUsuAccGrupo
	AND parametro.nParEstado			   		 = nParTipo
	AND parparametro.nParSrcClase			 = nParSrcClase
	AND parparametro.nParSrcCodigo		 = nParSrcCodigo
	ORDER BY parametro.cParJerarquia;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Get_Permisos_By_Usuario
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Get_Permisos_By_Usuario`;
DELIMITER ;;
CREATE PROCEDURE `usp_Get_Permisos_By_Usuario`(nPerTipo int(4), nPerEstado int(4), nPerUsuEstado Int(4), nPerUsuAccEstado Int(4), nParClase Int(4), cPerCodigo  varchar(20), nPerUsuAccGrupo Int(4))
BEGIN
	SELECT persona.cPerCodigo,
		persona.cPerNombre,
		persona.nPerTipo,
		perusuacceso.nPerUsuAccGrupo,
    perusuacceso.nPerUsuAccCodigo,
		perusuacceso.nPerUsuAccEstado,
		parametro.cParJerarquia,
		parametro.cParNombre,
		-- CONCAT(UPPER(LEFT(parametro.cParDescripcion,1)),lower(SUBSTR(parametro.cParDescripcion,2))) AS NombreMenu,
		parametro.cParDescripcion AS NombreMenu,
		(length(parametro.cParJerarquia)) as CanJerarquia
	FROM persona
  INNER JOIN perusuario   ON persona.cPerCodigo    = perusuario.cPerCodigo
  INNER JOIN perusuacceso ON perusuario.cPerCodigo = perusuacceso.cPerCodigo
  INNER JOIN parametro    ON parametro.nParCodigo  = perusuacceso.nPerUsuAccCodigo AND parametro.nParClase = perusuacceso.nPerUsuAccObjCodigo
	WHERE persona.nPerTipo            = nPerTipo
  AND persona.nPerEstado            <> nPerEstado
  AND perusuario.nPerUsuEstado      <> nPerUsuEstado
  AND perusuacceso.nPerUsuAccEstado <> nPerUsuAccEstado
  AND parametro.nParClase           = nParClase
  AND persona.cPerCodigo            = cPerCodigo
	AND perusuacceso.nPerUsuAccGrupo	= nPerUsuAccGrupo
	AND parametro.nParEstado <> 0
	ORDER BY parametro.cParJerarquia;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Get_Permiso_By_Acceso_Grupo_Persona
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Get_Permiso_By_Acceso_Grupo_Persona`;
DELIMITER ;;
CREATE PROCEDURE `usp_Get_Permiso_By_Acceso_Grupo_Persona`(nParCodigo int(4), nParClase Int(4), cPerCodigo  varchar(20), nPerUsuAccEstado Int(4))
BEGIN
	SELECT  perusuacceso.nPerUsuAccCodigo   ,
       		perusuacceso.cPerCodigo         ,
        	perusuacceso.nPerUsuAccGrupo    ,
        	perusuacceso.nPerUsuAccPrdCodigo,
        	perusuacceso.nPerUsuAccEstado
	FROM    perusuacceso
	WHERE   perusuacceso.nPerUsuAccEstado = nPerUsuAccEstado
  AND perusuacceso.cPerCodigo        = cPerCodigo
  AND perusuacceso.nPerUsuAccGrupo   = nParClase
  AND perusuacceso.nPerUsuAccCodigo  = nParCodigo;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Get_PerParametro_by_cPer_nPar_Codigo
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Get_PerParametro_by_cPer_nPar_Codigo`;
DELIMITER ;;
CREATE PROCEDURE `usp_Get_PerParametro_by_cPer_nPar_Codigo`(cPerCodigo VARCHAR(20),  nParClase INT)
BEGIN

SELECT
			parametro.nParCodigo,
			parametro.cParNombre ,
			parametro.cParDescripcion,
			perparametro.cPerCodigo,
			perparametro.cPerParValor,
			perparametro.cPerParGlosa
		FROM parametro
		INNER JOIN perparametro ON  perparametro.nParCodigo =  parametro.nParCodigo
														AND perparametro.nParClase = parametro.nParClase

		WHERE perparametro.cPerCodigo = cPerCodigo
		AND parametro.nParClase = nParClase
		AND parametro.nParEstado =  1
		ORDER BY parametro.cParDescripcion , parametro.cParNombre ;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Get_Persona_By_Apellidos
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Get_Persona_By_Apellidos`;
DELIMITER ;;
CREATE PROCEDURE `usp_Get_Persona_By_Apellidos`(cPerNatApellido varchar(250))
BEGIN
	SELECT 	persona.cPerCodigo,
			CONCAT(persona.cPerNombre, ' ' ,persona.cPerApellidos) Nombre,
			IFNULL(perdocumento.cPerDocNumero,"-") cPerDocNumero,
			RIGHT(persona.cPerCodigo,5)
	FROM	persona
	INNER JOIN pernatural 	ON persona.cPerCodigo = pernatural.cPerCodigo
	LEFT JOIN perdocumento 	ON persona.cPerCodigo = perdocumento.cPerCodigo
	WHERE   persona.nPerTipo        = 1
  AND persona.nPerEstado          <> 0
	AND perdocumento.nPerDocTipo 		<>6
	AND perdocumento.nPerDocEstado	= 1
	HAVING Nombre LIKE CONCAT(cPerNatApellido ,'%')
	limit 0,8;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Get_Persona_By_cPerDocNumero
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Get_Persona_By_cPerDocNumero`;
DELIMITER ;;
CREATE PROCEDURE `usp_Get_Persona_By_cPerDocNumero`(cPerDocNumero varchar(250), nPerDocTipo Int(4), cPerCodigo varchar(20))
BEGIN
	SELECT CONCAT(persona.cPerApellidos,' ', persona.cPerNombre),  perdocumento.cPerDocNumero, parametro.cParDescripcion
	FROM perdocumento
		INNER JOIN persona 		ON persona.cPerCodigo = perdocumento.cPerCodigo
		INNER JOIN parametro 		ON perdocumento.nPerDocTipo = parametro.nParCodigo AND parametro.nParClase = 1001
	WHERE perdocumento.cPerDocNumero=cPerDocNumero
		AND perdocumento.nPerDocTipo = nPerDocTipo
		AND persona.nPerEstado = 1
		AND ((cPerCodigo ='-') OR (persona.cPerCodigo <> cPerCodigo ));
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Get_Persona_By_nPerRelTipo_cPerDocNumero
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Get_Persona_By_nPerRelTipo_cPerDocNumero`;
DELIMITER ;;
CREATE PROCEDURE `usp_Get_Persona_By_nPerRelTipo_cPerDocNumero`(nPerRelTipo int(11), cPerDocNumero varchar(100))
BEGIN
	IF  (nPerRelTipo = 1 ) THEN
		SET @sentencia=CONCAT('SELECT	persona.cPerCodigo,
																	persona.cPerNombre,
																	"-",
																	rubro.cParDescripcion,
																	CONCAT(contacto.cPerNombre, " ", contacto.cPerApellidos) AS cPerApellidos
													FROM persona
													INNER JOIN perjuridica ON persona.cPerCodigo=perjuridica.cPerCodigo
													INNER JOIN perdocumento ON persona.cPerCodigo=perdocumento.cPerCodigo
													INNER JOIN parametro AS rubro ON rubro.nParCodigo=perjuridica.nPerJurRubro AND rubro.nParClase=1006
													INNER JOIN perrelacion ON perrelacion.cPerJuridica=perjuridica.cPerCodigo
													INNER JOIN persona	AS contacto ON contacto.cPerCodigo=perrelacion.cPerCodigo AND perrelacion.nPerRelTipo=2018
													WHERE perdocumento.cPerDocNumero=',cPerDocNumero,'
													AND persona.nPerTipo = 2
													AND persona.nPerEstado = 1
													AND perdocumento.nPerDocTipo=7
													AND perrelacion.nPerRelEstado=1');
					prepare consulta FROM @sentencia;
					execute consulta;
	ELSE
		SELECT	persona.cPerCodigo,
						persona.cPerNombre,
						pernatural.cPerNatApePaterno,
						pernatural.cPerNatApeMaterno,
						'0',
						perdocumento.nPerDocTipo
		FROM persona
		INNER JOIN pernatural ON persona.cPerCodigo=pernatural.cPerCodigo
		INNER JOIN perdocumento ON persona.cPerCodigo=perdocumento.cPerCodigo
		WHERE perdocumento.cPerDocNumero = cPerDocNumero
		AND persona.nPerTipo = 1
		AND persona.nPerEstado = 1
		AND perdocumento.nPerDocTipo=2;
	END IF;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Get_Persona_GenerarCodigo
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Get_Persona_GenerarCodigo`;
DELIMITER ;;
CREATE PROCEDURE `usp_Get_Persona_GenerarCodigo`(nPerTipo INT)
BEGIN

	SELECT 	IFNULL( MAX(persona.cPerCodigo)+1 , CONCAT(nPerTipo , '000000001') )  AS cPerCodigo
	FROM		persona
	WHERE		LENGTH(persona.cPerCodigo) > 9
	AND 	persona.nPerTipo = nPerTipo;

/*
  SELECT 	IFNULL( MAX(persona.cPerCodigo)+1 , '1000001' )
	FROM		persona;
*/

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Get_Productores
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Get_Productores`;
DELIMITER ;;
CREATE PROCEDURE `usp_Get_Productores`(nOriReg Int(4), nCanReg Int(4), nPagRegistro Int(4) , cPerDocNumero VARCHAR(20) , cPerApellidos VARCHAR(250), cPerNombre VARCHAR(250) , nParCodStatus INT(11) , cParSector VARCHAR(100))
BEGIN

	IF  (nPagRegistro = 1 ) THEN
		SET @sentencia = CONCAT('
					SELECT
						persona.cPerCodigo,
						persona.dPerNacimiento,
						persona.cPerNombre ,
						persona.cPerApellidos ,
						perdocumento.cPerDocNumero,
						permail.cPerMail ,
						pertelefono.cPerTelNumero ,
						perpar_fechaIncorp.cPerParValor AS dFechaIncorp ,
						p_status.cParDescripcion AS cParStatus ,
						p_sector.cParDescripcion AS cParSector
					FROM persona
					INNER JOIN perdocumento ON perdocumento.cPerCodigo =  persona.cPerCodigo
					INNER JOIN perrelacion ON perrelacion.cPerCodigo =  persona.cPerCodigo
					INNER JOIN permail ON permail.cPerCodigo =  persona.cPerCodigo
					INNER JOIN pertelefono ON pertelefono.cPerCodigo =  persona.cPerCodigo
					# FECHA DE INCORPORACION DEL PRODUCTOR
					INNER JOIN perparametro AS perpar_fechaIncorp ON perpar_fechaIncorp.cPerCodigo = persona.cPerCodigo
																	AND perpar_fechaIncorp.nParClase = 2005
																	AND perpar_fechaIncorp.nParCodigo =  1

					# STATUS DEL PRODUCTOR
					INNER JOIN perparametro AS perpar_status ON perpar_status.cPerCodigo = persona.cPerCodigo
																	AND perpar_status.nParClase = 2003

					INNER JOIN parametro AS p_status ON p_status.nParCodigo = perpar_status.nParCodigo
																					AND p_status.nParClase = perpar_status.nParClase
																					AND p_status.nParEstado =  1
					# SECTOR AL PERTENECE EL PRODUCTOR
					INNER JOIN perubigeo ON perubigeo.cPerCodigo = persona.cPerCodigo
					INNER JOIN parametro AS p_sector ON p_sector.nParCodigo =  perubigeo.nPerUbiCodigo
																						AND p_sector.nParClase =  2002
																						AND p_status.nParEstado =  1
					WHERE persona.nPerTipo =  2
					AND persona.nPerEstado > 0
					AND perrelacion.nPerRelTipo =  2002
					AND perrelacion.nPerRelEstado =  1

					AND( ( "',cPerDocNumero ,'" = "-" )	OR ( perdocumento.cPerDocNumero	LIKE "',cPerDocNumero ,'%") )
					AND( ( "',cPerApellidos ,'" = "-" )	OR ( persona.cPerApellidos	LIKE "',cPerApellidos ,'%") )
					AND( ( "',cPerNombre ,'" 		= "-" )	OR ( persona.cPerNombre	LIKE "',cPerNombre ,'%") )
					AND( ( ',nParCodStatus ,' 	= 0 )	OR (p_status.nParCodigo	=	',nParCodStatus ,' ) )
					AND( ( "',cParSector ,'" 		= "-" )	OR ( p_sector.cParDescripcion	LIKE "',cParSector ,'%") )
					ORDER BY persona.cPerApellidos, persona.cPerNombre ,perdocumento.cPerDocNumero ASC

					LIMIT  ',nOriReg,',',nCanReg,' ; ');
					prepare consulta FROM @sentencia;
					execute consulta;
	ELSE
		SELECT
			persona.cPerCodigo,
			persona.dPerNacimiento,
			persona.cPerNombre ,
			persona.cPerApellidos ,
			-- pernatural.cPerNatApePaterno,
			-- pernatural.cPerNatApeMaterno,
			-- pernatural.nPerNatSexo ,
			-- esto optimizaria si queremos sacar el sexo de pernatural
			-- (SELECT pernatural.nPerNatSexo FROM pernatural WHERE pernatural.cPerCodigo = persona.cPerCodigo LIMIT 1 ) AS nPerNatSexo ,
			perdocumento.cPerDocNumero,
			permail.cPerMail ,
			pertelefono.cPerTelNumero ,
			perpar_fechaIncorp.cPerParValor AS dFechaIncorp ,
			p_status.cParDescripcion AS cParStatus ,
			p_sector.cParDescripcion AS cParSector
		FROM persona
		-- INNER JOIN pernatural ON  pernatural.cPerCodigo   = persona.cPerCodigo
		INNER JOIN perdocumento ON perdocumento.cPerCodigo =  persona.cPerCodigo
		INNER JOIN perrelacion ON perrelacion.cPerCodigo =  persona.cPerCodigo
		INNER JOIN permail ON permail.cPerCodigo =  persona.cPerCodigo
		INNER JOIN pertelefono ON pertelefono.cPerCodigo =  persona.cPerCodigo
		# FECHA DE INCORPORACION DEL PRODUCTOR
		INNER JOIN perparametro AS perpar_fechaIncorp ON perpar_fechaIncorp.cPerCodigo = persona.cPerCodigo
														AND perpar_fechaIncorp.nParClase = 2005
														AND perpar_fechaIncorp.nParCodigo =  1

		# STATUS DEL PRODUCTOR
		INNER JOIN perparametro AS perpar_status ON perpar_status.cPerCodigo = persona.cPerCodigo
														AND perpar_status.nParClase = 2003

		INNER JOIN parametro AS p_status ON p_status.nParCodigo = perpar_status.nParCodigo
																		AND p_status.nParClase = perpar_status.nParClase
																		AND p_status.nParEstado =  1
		# SECTOR AL PERTENECE EL PRODUCTOR
		INNER JOIN perubigeo ON perubigeo.cPerCodigo = persona.cPerCodigo
		INNER JOIN parametro AS p_sector ON p_sector.nParCodigo =  perubigeo.nPerUbiCodigo
																			AND p_sector.nParClase =  2002
																			AND p_status.nParEstado =  1
		WHERE persona.nPerTipo =  2
		AND persona.nPerEstado > 0
		AND perrelacion.nPerRelTipo =  2002
		AND perrelacion.nPerRelEstado =  1
		AND	( ( cPerDocNumero = "-" ) OR ( perdocumento.cPerDocNumero	LIKE CONCAT(cPerDocNumero,"%") ) )
		AND	( ( cPerApellidos = "-" ) OR ( persona.cPerApellidos 	LIKE CONCAT(cPerApellidos,"%") ) )
		AND ( ( cPerNombre 		= "-" ) OR ( persona.cPerNombre 		LIKE CONCAT(cPerNombre,"%") ) )
		AND ( ( nParCodStatus		= 0 ) OR ( p_status.nParCodigo	=	nParCodStatus ) )
		AND ( ( cParSector		= "-" ) OR ( p_sector.cParDescripcion 	LIKE CONCAT(cParSector,"%") ) )
		ORDER BY persona.cPerApellidos, persona.cPerNombre ,perdocumento.cPerDocNumero ASC ;


	END IF;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Get_Productor_by_cPerCodigo
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Get_Productor_by_cPerCodigo`;
DELIMITER ;;
CREATE PROCEDURE `usp_Get_Productor_by_cPerCodigo`(cPerCodigo VARCHAR(20))
BEGIN

			SELECT
				persona.cPerCodigo,
				persona.dPerNacimiento,
				persona.cPerNombre ,
				pernatural.cPerNatApePaterno,
				pernatural.cPerNatApeMaterno,
				persona.nPerEstado ,
				pernatural.nPerNatSexo ,
				perdocumento.cPerDocNumero,
				permail.cPerMail ,
				pertelefono.cPerTelNumero ,
				perpar_fechaIncorp.cPerParValor AS dFechaIncorp ,
				p_status.nParCodigo AS nParStatus ,
				p_status.cParDescripcion AS cParStatus ,
				p_sector.nParCodigo AS nParSector ,
				p_sector.cParDescripcion AS cParSector
			FROM persona
			INNER JOIN pernatural ON  pernatural.cPerCodigo   = persona.cPerCodigo
			INNER JOIN perdocumento ON perdocumento.cPerCodigo =  persona.cPerCodigo
			INNER JOIN perrelacion ON perrelacion.cPerCodigo =  persona.cPerCodigo
			INNER JOIN permail ON permail.cPerCodigo =  persona.cPerCodigo
			INNER JOIN pertelefono ON pertelefono.cPerCodigo =  persona.cPerCodigo
			# FECHA DE INCORPORACION DEL PRODUCTOR
			INNER JOIN perparametro AS perpar_fechaIncorp ON perpar_fechaIncorp.cPerCodigo = persona.cPerCodigo
															AND perpar_fechaIncorp.nParClase = 2005
															AND perpar_fechaIncorp.nParCodigo =  1

			# STATUS DEL PRODUCTOR
			INNER JOIN perparametro AS perpar_status ON perpar_status.cPerCodigo = persona.cPerCodigo
															AND perpar_status.nParClase = 2003

			INNER JOIN parametro AS p_status ON p_status.nParCodigo = perpar_status.nParCodigo
																			AND p_status.nParClase = perpar_status.nParClase
																			AND p_status.nParEstado =  1
			# SECTOR AL PERTENECE EL PRODUCTOR
			INNER JOIN perubigeo ON perubigeo.cPerCodigo = persona.cPerCodigo
			INNER JOIN parametro AS p_sector ON p_sector.nParCodigo =  perubigeo.nPerUbiCodigo
																				AND p_sector.nParClase =  2002
																				AND p_status.nParEstado =  1


			WHERE persona.nPerTipo =  2
			AND persona.nPerEstado > 0
			AND perrelacion.nPerRelTipo =  2002
			AND perrelacion.nPerRelEstado =  1
			AND persona.cPerCodigo =  cPerCodigo  ; -- '2000000004'


END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Get_Sectores_by_nCasCodigo
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Get_Sectores_by_nCasCodigo`;
DELIMITER ;;
CREATE PROCEDURE `usp_Get_Sectores_by_nCasCodigo`(nCasCodigo INT)
BEGIN
				SELECT
					p_sector.nParCodigo ,
					p_sector.cParNombre ,
					p_sector.cParDescripcion ,
					caserio.nCasCodigo
				FROM  parametro AS p_sector
				INNER JOIN  caserio ON caserio.nCasCodigo = p_sector.cParJerarquia
																AND p_sector.nParClase = 2002
				WHERE p_sector.nParEstado = 1
				AND caserio.nCasEstado = 1
				AND caserio.nCasCodigo = nCasCodigo
				;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Get_Sel_Caserios
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Get_Sel_Caserios`;
DELIMITER ;;
CREATE PROCEDURE `usp_Get_Sel_Caserios`(nOriReg Int(4), nCanReg Int(4), nPagRegistro Int(4),   cDepDescripcion varchar(100) , cProDescripcion varchar(100) ,cDisDescripcion varchar(100) , cCasDescripcion varchar(100))
BEGIN


	IF  (nPagRegistro = 1 ) THEN

		SET @sentencia = CONCAT('
				SELECT
					departamento.nDepCodigo ,
					departamento.cDepDescripcion ,
					provincia.nProCodigo ,
					provincia.cProDescripcion ,
					distrito.nDisCodigo ,
					distrito.cDisDescripcion ,
					caserio.nCasCodigo ,
					caserio.cCasDescripcion
				FROM departamento
				INNER JOIN provincia ON  provincia.nDepCodigo  = departamento.nDepCodigo
				INNER JOIN distrito ON distrito.nProCodigo =  provincia.nProCodigo
				INNER JOIN caserio ON caserio.nDisCodigo =  distrito.nDisCodigo
				WHERE caserio.nCasEstado = 1
				AND( ("',cDepDescripcion  ,'" ="-"  ) OR (  departamento.cDepDescripcion like "',cDepDescripcion  ,'%") )
				AND( ("',cProDescripcion  ,'" ="-"  ) OR (  provincia.cProDescripcion like "',cProDescripcion  ,'%") )
				AND( ("',cDisDescripcion  ,'" ="-"  ) OR (  distrito.cDisDescripcion like "',cDisDescripcion  ,'%") )
				AND( ("',cCasDescripcion  ,'" ="-"  ) OR (  caserio.cCasDescripcion like "',cCasDescripcion  ,'%") )
				ORDER BY departamento.cDepDescripcion, provincia.cProDescripcion ,distrito.cDisDescripcion , caserio.cCasDescripcion ASC
				LIMIT ',nOriReg,',',nCanReg);
		prepare consulta FROM @sentencia;
		execute consulta;

	ELSE

		SELECT
			departamento.nDepCodigo ,
			departamento.cDepDescripcion ,
			provincia.nProCodigo ,
			provincia.cProDescripcion ,
			distrito.nDisCodigo ,
			distrito.cDisDescripcion ,
			caserio.nCasCodigo ,
			caserio.cCasDescripcion
		FROM departamento
		INNER JOIN provincia ON  provincia.nDepCodigo  = departamento.nDepCodigo
		INNER JOIN distrito ON distrito.nProCodigo =  provincia.nProCodigo
		INNER JOIN caserio ON caserio.nDisCodigo =  distrito.nDisCodigo
		WHERE caserio.nCasEstado = 1
		AND ((cDepDescripcion = "-") OR ( departamento.cDepDescripcion	LIKE CONCAT(cDepDescripcion,"%") ))
		AND ((cProDescripcion = "-") OR ( provincia.cProDescripcion	LIKE CONCAT(cProDescripcion,"%") ))
		AND ((cDisDescripcion = "-") OR ( distrito.cDisDescripcion	LIKE CONCAT(cDisDescripcion,"%") ))
		AND ((cCasDescripcion = "-") OR ( caserio.cCasDescripcion	LIKE CONCAT(cCasDescripcion,"%") ))
		ORDER BY departamento.cDepDescripcion, provincia.cProDescripcion ,distrito.cDisDescripcion , caserio.cCasDescripcion ASC
		;

	END IF;


END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Get_Sel_Periodos
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Get_Sel_Periodos`;
DELIMITER ;;
CREATE PROCEDURE `usp_Get_Sel_Periodos`(nOriReg Int(4), nCanReg Int(4), nPagRegistro Int(4),  cPrdDescripcion varchar(100))
BEGIN

	IF  (nPagRegistro = 1 ) THEN

		SET @sentencia = CONCAT('SELECT periodo.nPrdCodigo,
					 periodo.cPrdDescripcion,
					DATE_FORMAT(periodo.dPrdFecInic ,"%d/%m/%Y") AS dPrdFecInic,
					DATE_FORMAT(periodo.dPrdFecFin ,"%d/%m/%Y") AS dPrdFecFin ,
					periodo.nPrdEstado
				FROM periodo
				WHERE periodo.nPrdEstado 		IN( 1, 2)
				AND( ("',cPrdDescripcion ,'" ="-"  ) OR (  periodo.cPrdDescripcion like "',cPrdDescripcion ,'%") )
				ORDER BY DATE_FORMAT(periodo.dPrdFecInic ,"%d/%m/%Y") DESC , DATE_FORMAT(periodo.dPrdFecFin ,"%d/%m/%Y")  DESC
				LIMIT ',nOriReg,',',nCanReg);
		prepare consulta FROM @sentencia;
		execute consulta;

	ELSE

		SELECT periodo.nPrdCodigo,
			 periodo.cPrdDescripcion,
			 DATE_FORMAT(periodo.dPrdFecInic ,'%d/%m/%Y') AS dPrdFecInic,
			 DATE_FORMAT(periodo.dPrdFecFin ,'%d/%m/%Y') AS dPrdFecFin ,
			periodo.nPrdEstado

		FROM periodo
		WHERE periodo.nPrdEstado 		IN( 1, 2)
		AND( (cPrdDescripcion ='-') 		OR ( periodo.cPrdDescripcion like concat(cPrdDescripcion,'%')) )
		ORDER BY DATE_FORMAT(periodo.dPrdFecInic ,"%d/%m/%Y") DESC , DATE_FORMAT(periodo.dPrdFecFin ,"%d/%m/%Y")  DESC;

	END IF;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Get_Sel_Sectores
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Get_Sel_Sectores`;
DELIMITER ;;
CREATE PROCEDURE `usp_Get_Sel_Sectores`(nOriReg Int(4), nCanReg Int(4), nPagRegistro Int(4) ,  cProDescripcion varchar(100) ,cDisDescripcion varchar(100) , cCasDescripcion varchar(100),   cParDescSector varchar(100) ,cParNombre varchar(20))
BEGIN

	IF  (nPagRegistro = 1 ) THEN

		SET @sentencia = CONCAT('
			SELECT
					p_sector.nParCodigo ,
					p_sector.cParNombre ,
					p_sector.cParDescripcion ,
					caserio.nCasCodigo ,
					caserio.cCasDescripcion ,
					distrito.nDisCodigo ,
					distrito.cDisDescripcion ,
					provincia.nProCodigo ,
					provincia.cProDescripcion,
					departamento.nDepCodigo ,
					departamento.cDepDescripcion

				FROM  parametro AS p_sector
				INNER JOIN  caserio ON caserio.nCasCodigo = p_sector.cParJerarquia
																AND p_sector.nParClase = 2002
				INNER JOIN distrito ON distrito.nDisCodigo = caserio.nDisCodigo
				INNER JOIN provincia ON provincia.nProCodigo =  distrito.nProCodigo
				INNER JOIN departamento ON departamento.nDepCodigo = provincia.nDepCodigo
				WHERE p_sector.nParEstado = 1
				AND caserio.nCasEstado = 1
				AND distrito.nDisEstado =  1
				AND departamento.nDepEstado = 1
				AND( ("',cProDescripcion  ,'" ="-"  ) OR (  provincia.cProDescripcion like "',cProDescripcion  ,'%") )
				AND( ("',cDisDescripcion  ,'" ="-"  ) OR (  distrito.cDisDescripcion like "',cDisDescripcion  ,'%") )
				AND( ("',cCasDescripcion  ,'" ="-"  ) OR (  caserio.cCasDescripcion like "',cCasDescripcion  ,'%") )
				AND( ("',cParDescSector  ,'" = "-"  ) OR (  p_sector.cParDescripcion like "',cParDescSector  ,'%") )
				AND( ("',cParNombre  ,'" = "-"  ) OR ( p_sector.cParNombre like "',cParNombre  ,'%") )
				ORDER BY p_sector.cParDescripcion, caserio.cCasDescripcion , distrito.cDisDescripcion,provincia.cProDescripcion ASC
				LIMIT ',nOriReg,',',nCanReg);
		prepare consulta FROM @sentencia;
		execute consulta;

	ELSE
		-- cParJerarquia de parametro almacena  codigo distrito
				SELECT
					p_sector.nParCodigo ,
					p_sector.cParNombre ,
					p_sector.cParDescripcion ,
					caserio.nCasCodigo ,
					caserio.cCasDescripcion ,
					distrito.nDisCodigo ,
					distrito.cDisDescripcion ,
					provincia.nProCodigo ,
					provincia.cProDescripcion,
					departamento.nDepCodigo ,
					departamento.cDepDescripcion

				FROM  parametro AS p_sector
				INNER JOIN  caserio ON caserio.nCasCodigo = p_sector.cParJerarquia
																AND p_sector.nParClase = 2002
				INNER JOIN distrito ON distrito.nDisCodigo = caserio.nDisCodigo
				INNER JOIN provincia ON provincia.nProCodigo =  distrito.nProCodigo
				INNER JOIN departamento ON departamento.nDepCodigo = provincia.nDepCodigo
				WHERE p_sector.nParEstado = 1
				AND caserio.nCasEstado = 1
				AND distrito.nDisEstado =  1
				AND departamento.nDepEstado = 1
				AND ((cProDescripcion = "-") OR ( provincia.cProDescripcion	LIKE CONCAT(cProDescripcion,"%") ))
				AND ((cDisDescripcion = "-") OR ( distrito.cDisDescripcion	LIKE CONCAT(cDisDescripcion,"%") ))
				AND ((cCasDescripcion = "-") OR ( caserio.cCasDescripcion	LIKE CONCAT(cCasDescripcion,"%") ))
				AND ((cParDescSector = "-") OR ( 	p_sector.cParDescripcion LIKE CONCAT(cParDescSector,"%") ))
				AND ((cParNombre  = "-") OR ( 	p_sector.cParNombre  LIKE CONCAT(cParNombre ,"%") ))
				ORDER BY p_sector.cParDescripcion, caserio.cCasDescripcion , distrito.cDisDescripcion,provincia.cProDescripcion  ASC
				;

	END IF;


END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Get_SubPermisos_By_Usuario_Jerarquia
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Get_SubPermisos_By_Usuario_Jerarquia`;
DELIMITER ;;
CREATE PROCEDURE `usp_Get_SubPermisos_By_Usuario_Jerarquia`(nPerTipo int(4), nPerEstado int(4), nPerUsuEstado Int(4), nPerUsuAccEstado Int(4), nParClase Int(4), cPerCodigo  varchar(20), nCanJerarquia Int(4), cJerarquia nVarChar(50), nPerUsuAccGrupo Int(4), nParJerarquia Int(4))
BEGIN
	SELECT
		persona.cPerCodigo,
		persona.cPerNombre,
		persona.nPerTipo,
		perusuacceso.nPerUsuAccGrupo,
    perusuacceso.nPerUsuAccCodigo,
		perusuacceso.nPerUsuAccEstado,
		parametro.cParJerarquia,
		parametro.cParNombre ,
    Concat(left(parametro.cParDescripcion,1),lower(right(parametro.cParDescripcion,(length(parametro.cParDescripcion)-1)))) AS NombreMenu,
		(length(parametro.cParJerarquia)) as CanJerarquia
	FROM persona
  INNER JOIN perusuario   ON persona.cPerCodigo    = perusuario.cPerCodigo
  INNER JOIN perusuacceso ON perusuario.cPerCodigo = perusuacceso.cPerCodigo
  INNER JOIN parametro    ON parametro.nParCodigo  = perusuacceso.nPerUsuAccCodigo AND  parametro.nParClase = perusuacceso.nPerUsuAccObjCodigo
	WHERE   persona.nPerTipo           = nPerTipo
  AND persona.nPerEstado             <> nPerEstado
  AND perusuario.nPerUsuEstado       <> nPerUsuEstado
  AND perusuacceso.nPerUsuAccEstado  <> nPerUsuAccEstado
  AND parametro.nParClase            = nParClase
  AND persona.cPerCodigo             = cPerCodigo
	AND LENGTH(parametro.cParJerarquia)= (nCanJerarquia+2)
	AND LEFT(parametro.cParJerarquia,nParJerarquia)= cJerarquia
	AND perusuacceso.nPerUsuAccGrupo	 = nPerUsuAccGrupo
	AND parametro.nParEstado <> 0
	ORDER BY parametro.cParJerarquia ;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Get_Ubigeo_nParCodSector
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Get_Ubigeo_nParCodSector`;
DELIMITER ;;
CREATE PROCEDURE `usp_Get_Ubigeo_nParCodSector`(nParCodigo INT)
BEGIN
	SELECT
		p_sector.nParCodigo ,
		p_sector.cParDescripcion ,
		caserio.nCasCodigo,
		caserio.cCasDescripcion ,
		distrito.nDisCodigo ,
		distrito.cDisDescripcion ,
		provincia.nProCodigo ,
		provincia.cProDescripcion,
		departamento.nDepCodigo,
		departamento.cDepDescripcion
	FROM
	parametro AS p_sector
	INNER JOIN caserio ON caserio.nCasCodigo =  p_sector.cParJerarquia
	INNER JOIN distrito ON distrito.nDisCodigo = caserio.nDisCodigo
	INNER JOIN provincia ON provincia.nProCodigo =  distrito.nProCodigo
	INNER JOIN departamento ON departamento.nDepCodigo = provincia.nDepCodigo
	WHERE p_sector.nParClase =  2002
	AND p_sector.nParEstado = 1
	AND p_sector.nParCodigo = nParCodigo
	;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Get_Usuario_By_Clave_UserName
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Get_Usuario_By_Clave_UserName`;
DELIMITER ;;
CREATE PROCEDURE `usp_Get_Usuario_By_Clave_UserName`(cUserName varchar(50),cUserClave varchar(50))
BEGIN
	SELECT  perusuario.cPerCodigo,
		 persona.cPerNombre,
		 persona.cPerApellidos
	FROM    perusuario
	Inner Join persona ON persona.cPerCodigo = perusuario.cPerCodigo
	WHERE   perusuario.cPerUsuCodigo  =cUserName
  AND perusuario.cPerUsuClave   = cUserClave
  AND perusuario.nPerUsuEstado  <> 0;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Ins_Parametro
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Ins_Parametro`;
DELIMITER ;;
CREATE PROCEDURE `usp_Ins_Parametro`(nParCodigo int(11), nParClase int(11) ,cParNombre varchar(1000), cParDescripcion varchar(1000))
BEGIN

	DECLARE cParJerarquia VARCHAR(20);

-- Generar jerarquia para el parametro


	SELECT 	IFNULL( MAX(parametro.cParJerarquia)+1 , 1001 ) INTO cParJerarquia
	FROM 		parametro
	WHERE 	parametro.nParClase=nParClase AND parametro.nParCodigo <> 0 ;

		INSERT INTO parametro (parametro.nParCodigo,
												 parametro.nParClase,
												 parametro.cParJerarquia,
												 parametro.cParNombre,
												 parametro.cParDescripcion,
												 parametro.nParEstado)
  VALUES(nParCodigo, nParClase, cParJerarquia, cParNombre, cParDescripcion,	1);

	SELECT nParCodigo, cParJerarquia;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Ins_Transaccion
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Ins_Transaccion`;
DELIMITER ;;
CREATE PROCEDURE `usp_Ins_Transaccion`(nOpeCodigo int(11), cPerCodigo  varchar(20), cComputer varchar(250), cTraDescripcion varchar(250))
BEGIN

	insert into transaccion
		(cTraCodigo, nOpeCodigo, cPerCodigo, dTraFecha, cComputer, cTraDescripcion)
	values
		(CONCAT( CAST(replace(replace(replace(now(),'-',''),' ',''),':','') AS CHAR), LEFT(CAST(  REPLACE(UUID(),'-','') AS CHAR),36)),
		  nOpeCodigo,
		  cPerCodigo,
		  now(),
		  cComputer,
		  cTraDescripcion );

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Set_All_Parametro
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Set_All_Parametro`;
DELIMITER ;;
CREATE PROCEDURE `usp_Set_All_Parametro`(nParCodigo int(11), nParClase int(11) ,cParNombre varchar(100), cParDescripcion varchar(500))
BEGIN

	DECLARE cParJerarquia VARCHAR(20);

-- Generar jerarquia para el parametro
  SELECT 	IFNULL( MAX(parametro.cParJerarquia)+1 , 1001 ) INTO cParJerarquia
	FROM 		parametro
	WHERE 	parametro.nParClase=nParClase AND parametro.nParCodigo <> 0 ;

		INSERT INTO parametro (parametro.nParCodigo,
												 parametro.nParClase,
												 parametro.cParJerarquia,
												 parametro.cParNombre,
												 parametro.cParDescripcion,
												 parametro.nParEstado)
  VALUES(nParCodigo, nParClase, cParJerarquia, cParNombre, cParDescripcion,	1);

	SELECT nParCodigo, cParJerarquia;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Set_All_Persona
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Set_All_Persona`;
DELIMITER ;;
CREATE PROCEDURE `usp_Set_All_Persona`(cPerCodigo varchar(20), cPerNombre varchar(500), cPerApellidos varchar(500), dPerNacimiento varchar(20), nPerTipo int(3), nPerEstado int(3))
BEGIN
	/*registrar persona*/
	INSERT INTO persona(persona.cPerCodigo,
											persona.cPerNombre,
											persona.cPerApellidos,
											persona.dPerNacimiento,
											persona.nPerTipo,
											persona.nPerEstado)
	VALUES (cPerCodigo,
					cPerNombre,
					cPerApellidos,
					dPerNacimiento,
					nPerTipo,
					nPerEstado);

	SELECT cPerCodigo;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Set_Caserio
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Set_Caserio`;
DELIMITER ;;
CREATE PROCEDURE `usp_Set_Caserio`(cCasDescripcion VARCHAR(150), nDisCodigo INT)
BEGIN
	DECLARE nCasCodigo_ INT ;
	SELECT
		( IFNULL(MAX(caserio.nCasCodigo),0) + 1 )  INTO nCasCodigo_
	FROM caserio  ;

	INSERT INTO caserio	(
		caserio.nCasCodigo,
		caserio.cCasDescripcion,
		caserio.nDisCodigo,
		caserio.nCasEstado
	)
	VALUES (nCasCodigo_, cCasDescripcion, nDisCodigo,1 );

	SELECT nCasCodigo_ AS nCasCodigo ;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Set_DocPerParametro
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Set_DocPerParametro`;
DELIMITER ;;
CREATE PROCEDURE `usp_Set_DocPerParametro`(cDocCodigo varchar(20), cPerCodigo VARCHAR(20), nParCodigo INT(11), nParClase INT(11), cDocPerParValor varchar(500), cDocPerParGlosa VARCHAR(250))
BEGIN
		INSERT INTO docperparametro (
				docperparametro.cDocCodigo ,
				docperparametro.cPerCodigo,
				docperparametro.nParCodigo,
				docperparametro.nParClase,
				docperparametro.cDocPerParValor,
				docperparametro.cDocPerParGlosa,
				docperparametro.nDocPerParEstado
				)
		VALUES (cDocCodigo, cPerCodigo, nParCodigo, nParClase, cDocPerParValor, cDocPerParGlosa, 1);


END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Set_DocPersona
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Set_DocPersona`;
DELIMITER ;;
CREATE PROCEDURE `usp_Set_DocPersona`(cDocCodigo varchar(20), nDocPerTipo int(11), cPerCodigo varchar(20), nPerRelacion int(11),  nDocTipo int(11))
BEGIN

	INSERT INTO docpersona(docpersona.cDocCodigo,
												 docpersona.nDocPerTipo,
												 docpersona.cPerCodigo,
												 docpersona.nPerRelacion,
												 docpersona.nDocTipo)
	VALUES(cDocCodigo,
				 nDocPerTipo,
				 cPerCodigo,
				 nPerRelacion,
				 nDocTipo);

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Set_Parametro
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Set_Parametro`;
DELIMITER ;;
CREATE PROCEDURE `usp_Set_Parametro`(nParClase int(11) ,cParNombre varchar(100), cParDescripcion varchar(500))
BEGIN
  DECLARE nParCodigo INT;
	DECLARE cParJerarquia VARCHAR(20);
-- Generar codigo para el parametro
  SELECT 	IFNULL( MAX(parametro.nParCodigo)+1 , 1 ) INTO nParCodigo
	FROM		parametro
	WHERE		parametro.nParClase = nParClase;
-- Generar jerarquia para el parametro
  -- SELECT 	LPAD(IFNULL( MAX(parametro.cParJerarquia)+1 , 1001 ),4,'0') INTO cParJerarquia
	SELECT 	IFNULL( MAX(parametro.cParJerarquia)+1 , 1001 ) INTO cParJerarquia
	FROM 		parametro
	WHERE 	parametro.nParClase=nParClase AND parametro.nParCodigo <> 0 ;

		INSERT INTO parametro (parametro.nParCodigo,
												 parametro.nParClase,
												 parametro.cParJerarquia,
												 parametro.cParNombre,
												 parametro.cParDescripcion,
												 parametro.nParEstado)
  VALUES(nParCodigo, nParClase, cParJerarquia, cParNombre, cParDescripcion,	1);

	SELECT nParCodigo, cParJerarquia;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Set_PerCosecha
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Set_PerCosecha`;
DELIMITER ;;
CREATE PROCEDURE `usp_Set_PerCosecha`(cPerCodigo VARCHAR(20), nParcCodigo INT, nProdCodigo INT, nPrdCodigo INT, cCosCodigo VARCHAR(20), fHectareas FLOAT, fQuintales FLOAT, fKilogramos FLOAT,fHolgura FLOAT, cGlosa VARCHAR(250))
BEGIN

DECLARE nPerCosCodigo INT ;

	INSERT INTO  percosecha (
		percosecha.nPerCosCodigo,
		percosecha.cPerCodigo,
		percosecha.nParcCodigo,
		percosecha.nParcClase,
		percosecha.nProdCodigo,
		percosecha.nProdClase,
		percosecha.nPrdCodigo,
		percosecha.cCosCodigo,
		percosecha.fHectareas,
		percosecha.fQuintales,
		percosecha.fKilogramos,
		percosecha.fHolgura,
		percosecha.cGlosa,
		percosecha.nPerCosEstado
	)
	VALUES (null, cPerCodigo, nParcCodigo, 2006, nProdCodigo, 2007, nPrdCodigo, cCosCodigo, fHectareas, fQuintales, fKilogramos,fHolgura, cGlosa, 1);
	-- devolvemos el autoincrement
	SET nPerCosCodigo = LAST_INSERT_ID() ;
	SELECT nPerCosCodigo ;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Set_PerDocumento
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Set_PerDocumento`;
DELIMITER ;;
CREATE PROCEDURE `usp_Set_PerDocumento`(cPerCodigo VARCHAR(20), nPerDocTipo INT , cPerDocNumero VARCHAR(20) , dPerDocCaducidad DATE, nPerDocCategoria INT)
BEGIN

	INSERT INTO perdocumento (
	perdocumento.cPerCodigo,
	perdocumento.nPerDocTipo,
	perdocumento.cPerDocNumero,
	perdocumento.dPerDocCaducidad,
	perdocumento.nPerDocCategoria,
	perdocumento.nPerDocEstado
)
VALUES (cPerCodigo, nPerDocTipo, cPerDocNumero, dPerDocCaducidad, nPerDocCategoria, 1);

SELECT cPerCodigo ;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Set_Periodo
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Set_Periodo`;
DELIMITER ;;
CREATE PROCEDURE `usp_Set_Periodo`(cPrdDescripcion VARCHAR(250), dPrdFecInic DATE , dPrdFecFin DATE , nPrdTipo INT(4) ,  nPrdEstado INT(4))
BEGIN

	-- SELECT MAX(CAST((nPrdCodigo) AS SIGNED))+1
SELECT ( IFNULL(MAX(CAST((nPrdCodigo) AS SIGNED)),0)+1 ) INTO @pnPeriodo
	FROM periodo ;

	INSERT INTO periodo
	(
		periodo.nPrdCodigo,
		periodo.cPrdDescripcion,
		periodo.dPrdFecInic,
		periodo.dPrdFecFin,
		periodo.nPrdTipo,
		periodo.nPrdEstado
	)
	VALUES
	(
		@pnPeriodo,
		cPrdDescripcion,
		dPrdFecInic,
		dPrdFecFin,
		nPrdTipo ,
		nPrdEstado
	);

		SELECT  @pnPeriodo AS nPrdCodigo ;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Set_PerMail
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Set_PerMail`;
DELIMITER ;;
CREATE PROCEDURE `usp_Set_PerMail`(cPerCodigo VARCHAR(20),  cPerMail VARCHAR(120))
BEGIN
	DECLARE nPerMailItem_ INT ;

	SELECT IFNULL(MAX(permail.nPerMailItem ) +1 ,1) INTO nPerMailItem_
	FROM permail
	WHERE permail.cPerCodigo = cPerCodigo ;


	INSERT INTO permail (permail.cPerCodigo, permail.nPerMailItem, permail.cPerMail, permail.nPerMailEstado)
	VALUES (cPerCodigo, nPerMailItem_ , cPerMail , 1 );

	SELECT cPerCodigo , nPerMailItem_ AS nPerMailItem ;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Set_PerNatural
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Set_PerNatural`;
DELIMITER ;;
CREATE PROCEDURE `usp_Set_PerNatural`(cPerCodigo VARCHAR(20), cPerNatApePaterno VARCHAR(250), cPerNatApeMaterno VARCHAR(250) , nPerNatSexo INT, nPerNatEstCivi INT)
BEGIN

	INSERT INTO pernatural (
		pernatural.cPerCodigo,
		pernatural.cPerNatApePaterno,
		pernatural.cPerNatApeMaterno,
		pernatural.nPerNatSexo,
		pernatural.nPerNatEstCivil
	)
 VALUES (cPerCodigo, cPerNatApePaterno, cPerNatApeMaterno, nPerNatSexo, nPerNatEstCivi);

SELECT cPerCodigo ;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Set_PerParametro
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Set_PerParametro`;
DELIMITER ;;
CREATE PROCEDURE `usp_Set_PerParametro`(cPerCodigo VARCHAR(20), nParCodigo INT , nParClase INT , cPerParValor VARCHAR(100) , cPerParGlosa VARCHAR(250))
BEGIN
	INSERT INTO perparametro(
		perparametro.cPerCodigo,
		perparametro.nParCodigo,
		perparametro.nParClase,
		perparametro.cPerParValor,
		perparametro.cPerParGlosa,
		perparametro.nPerParEstado
	)
	VALUES (cPerCodigo, nParCodigo, nParClase, cPerParValor, cPerParGlosa , 1);

	SELECT cPerCodigo ;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Set_PerParParametro
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Set_PerParParametro`;
DELIMITER ;;
CREATE PROCEDURE `usp_Set_PerParParametro`(cPerCodigo VARCHAR(20), nParSrcCodigo INT, nParSrcClase INT, nParDstCodigo INT, nParDstClase INT, cParParValor VARCHAR(250), cParParGlosa VARCHAR(1000))
BEGIN
	-- ok
	INSERT INTO  peparparametro (
		peparparametro.cPerCodigo,
		peparparametro.nParSrcCodigo,
		peparparametro.nParSrcClase,
		peparparametro.nParDstCodigo,
		peparparametro.nParDstClase,
		peparparametro.cParParValor,
		peparparametro.cParParGlosa
	)
	VALUES (cPerCodigo, nParSrcCodigo, nParSrcClase, nParDstCodigo, nParDstClase, cParParValor, cParParGlosa);

	SELECT cPerCodigo ;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Set_PerRelacion
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Set_PerRelacion`;
DELIMITER ;;
CREATE PROCEDURE `usp_Set_PerRelacion`(cPerCodigo VARCHAR(20), nPerRelTipo INT, cPerUsuario VARCHAR(20), dPerRelacion DATE, cPerObservacion VARCHAR(100))
BEGIN

	DECLARE cPerJuridica_ VARCHAR(20) ;
	-- CON EL CODIGO DEL USUARIO VERIFICACMOS A QUE EMPRESA PERTENECE
	-- cPerUsuario  es el usuario que esta en linea haciendo el registro de la persona
		SELECT  perjuridica.cPerCodigo  INTO cPerJuridica_
		FROM  perjuridica
		INNER JOIN perrelacion ON perrelacion.cPerJuridica =   perjuridica.cPerCodigo
		INNER JOIN persona ON persona.cPerCodigo = perrelacion.cPerCodigo
		WHERE persona.cPerCodigo = cPerUsuario    ;


	INSERT INTO perrelacion (
		perrelacion.cPerCodigo,
		perrelacion.nPerRelTipo,
		perrelacion.cPerJuridica,
		perrelacion.dPerRelacion,
		perrelacion.cPerObservacion,
		perrelacion.nPerRelEstado
	)
	VALUES (cPerCodigo, nPerRelTipo, cPerJuridica_ , dPerRelacion, cPerObservacion, 1);

	SELECT cPerCodigo , cPerJuridica_ AS cPerJuridica_;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Set_Persona
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Set_Persona`;
DELIMITER ;;
CREATE PROCEDURE `usp_Set_Persona`(cPerNombre varchar(500), cPerApellidos varchar(500), dPerNacimiento varchar(20), nPerTipo int(3), nPerEstado int(3))
BEGIN
	# declarar variable
		DECLARE cPerCodigo_ VARCHAR(20);


  SELECT 	IFNULL( MAX(persona.cPerCodigo)+1 , CONCAT(nPerTipo , '000000001') )   INTO cPerCodigo_
	FROM		persona
	WHERE		LENGTH(persona.cPerCodigo) > 9
	AND 	persona.nPerTipo = nPerTipo;


	INSERT INTO persona(persona.cPerCodigo,
											persona.cPerNombre,
											persona.cPerApellidos,
											persona.dPerNacimiento,
											persona.nPerTipo,
											persona.nPerEstado)
	VALUES (cPerCodigo_,
					cPerNombre,
					cPerApellidos,
					dPerNacimiento,
					nPerTipo,
					nPerEstado);
	# seleccionar codigo
		SELECT cPerCodigo_ AS cPerCodigo;



END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Set_PerTelefono
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Set_PerTelefono`;
DELIMITER ;;
CREATE PROCEDURE `usp_Set_PerTelefono`(cPerCodigo VARCHAR(20), nPerTelTipo INT,  cPerTelNumero VARCHAR(20))
BEGIN
	DECLARE nPerTelItem_ INT ;

	SELECT IFNULL(MAX(pertelefono.nPerTelItem ) +1 ,1) INTO nPerTelItem_
	FROM pertelefono
	WHERE pertelefono.cPerCodigo = cPerCodigo ;

	INSERT INTO pertelefono (
		pertelefono.cPerCodigo,
		pertelefono.nPerTelTipo,
		pertelefono.nPerTelItem,
		pertelefono.cPerTelNumero,
		pertelefono.nPerTelEstado
	)
	VALUES (cPerCodigo, nPerTelTipo, nPerTelItem_ , cPerTelNumero, 1);

	SELECT cPerCodigo, nPerTelItem_  AS nPerTelItem ;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Set_PerUbigeo
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Set_PerUbigeo`;
DELIMITER ;;
CREATE PROCEDURE `usp_Set_PerUbigeo`(cPerCodigo VARCHAR(20), nPerUbiCodigo INT, cPerUbiGlosa VARCHAR(200))
BEGIN
	INSERT INTO perubigeo (
		perubigeo.cPerCodigo,
		perubigeo.nPerUbiCodigo,
		perubigeo.cPerUbiGlosa,
		perubigeo.nPerUbiEstado
	)
	VALUES (cPerCodigo, nPerUbiCodigo, cPerUbiGlosa, 1);

	SELECT cPerCodigo ;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Set_Transaccion
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Set_Transaccion`;
DELIMITER ;;
CREATE PROCEDURE `usp_Set_Transaccion`(nOpeCodigo int(11), cPerCodigo  varchar(20), cComputer varchar(250), cTraDescripcion varchar(250))
BEGIN

	insert into transaccion
		(cTraCodigo, nOpeCodigo, cPerCodigo, dTraFecha, cComputer, cTraDescripcion)
	values
		(CONCAT( CAST(replace(replace(replace(now(),'-',''),' ',''),':','') AS CHAR), LEFT(CAST(  REPLACE(UUID(),'-','') AS CHAR),36)),
		  nOpeCodigo,
		  cPerCodigo,
		  now(),
		  cComputer,
		  cTraDescripcion );

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_ubg_Get_Departamentos_by_nPaiCodigo
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_ubg_Get_Departamentos_by_nPaiCodigo`;
DELIMITER ;;
CREATE PROCEDURE `usp_ubg_Get_Departamentos_by_nPaiCodigo`(nPaiCodigo INT(11))
BEGIN
	SELECT
		departamento.nDepCodigo,
		departamento.cDepDescripcion
	FROM departamento
	WHERE departamento.nDepEstado = 1
	AND departamento.nPaiCodigo = nPaiCodigo
	ORDER BY departamento.cDepDescripcion ASC ;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_ubg_Get_Distritos_by_nProCodigo
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_ubg_Get_Distritos_by_nProCodigo`;
DELIMITER ;;
CREATE PROCEDURE `usp_ubg_Get_Distritos_by_nProCodigo`(nProCodigo INT(11))
BEGIN
	SELECT
		distrito.nDisCodigo ,
		distrito.cDisDescripcion
	FROM distrito
	WHERE distrito.nProCodigo = nProCodigo
	AND distrito.nDisEstado = 1
	ORDER BY distrito.cDisDescripcion ASC
	;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_ubg_Get_Provincias_by_nDepCodigo
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_ubg_Get_Provincias_by_nDepCodigo`;
DELIMITER ;;
CREATE PROCEDURE `usp_ubg_Get_Provincias_by_nDepCodigo`(nDepCodigo INT(11))
BEGIN
	SELECT
		provincia.nProCodigo ,
		provincia.cProDescripcion
	FROM provincia
	WHERE provincia.nDepCodigo = nDepCodigo
	AND provincia.nProEstado = 1
	ORDER BY provincia.cProDescripcion  ASC
;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Upd_Caserio
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Upd_Caserio`;
DELIMITER ;;
CREATE PROCEDURE `usp_Upd_Caserio`(nCasCodigo INT, cCasDescripcion VARCHAR(150) ,nDisCodigo INT)
BEGIN
	UPDATE caserio SET
		caserio.cCasDescripcion =  cCasDescripcion ,
		caserio.nDisCodigo      = nDisCodigo
	WHERE caserio.nCasCodigo = nCasCodigo ;

	SELECT nCasCodigo ;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Upd_Caserio_Estado
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Upd_Caserio_Estado`;
DELIMITER ;;
CREATE PROCEDURE `usp_Upd_Caserio_Estado`(nCasCodigo INT , nCasEstado INT)
BEGIN
		UPDATE caserio SET
		caserio.nCasEstado =  nCasEstado
	WHERE caserio.nCasCodigo = nCasCodigo ;
	SELECT nCasCodigo ;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Upd_Parametro
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Upd_Parametro`;
DELIMITER ;;
CREATE PROCEDURE `usp_Upd_Parametro`(nParCodigo int(11), nParClase  int(11) , cParNombre varchar(100), cParDescripcion varchar(255))
BEGIN

		UPDATE parametro
			SET parametro.cParNombre = cParNombre,
					parametro.cParDescripcion = cParDescripcion
		WHERE parametro.nParCodigo = nParCodigo
		AND parametro.nParClase = nParClase
		AND parametro.nParEstado = 1;

	SELECT  nParCodigo  ;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Upd_Parametro_and_cParJerarquia
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Upd_Parametro_and_cParJerarquia`;
DELIMITER ;;
CREATE PROCEDURE `usp_Upd_Parametro_and_cParJerarquia`(nParCodigo int(11), nParClase  int(11) ,cParJerarquia varchar(20), cParNombre varchar(100), cParDescripcion varchar(255))
BEGIN

		UPDATE parametro
			SET parametro.cParJerarquia = cParJerarquia,
					parametro.cParNombre = cParNombre,
					parametro.cParDescripcion = cParDescripcion

		WHERE parametro.nParCodigo = nParCodigo
		AND parametro.nParClase = nParClase
		AND parametro.nParEstado = 1;

	SELECT  nParCodigo  ;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Upd_Parametro_Estado
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Upd_Parametro_Estado`;
DELIMITER ;;
CREATE PROCEDURE `usp_Upd_Parametro_Estado`(nParCodigo int(11), nParClase int(11) ,   nParEstado int(3))
BEGIN
  UPDATE parametro SET
				parametro.nParEstado = nParEstado
	WHERE parametro.nParCodigo = nParCodigo
	AND parametro.nParClase = nParClase ;

SELECT nParCodigo  ;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Upd_PerCosecha
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Upd_PerCosecha`;
DELIMITER ;;
CREATE PROCEDURE `usp_Upd_PerCosecha`(nPerCosCodigo INT, ParcCodigo INT, nProdCodigo INT,  cCosCodigo VARCHAR(20), fHectareas FLOAT, fQuintales FLOAT, fKilogramos FLOAT,fHolgura FLOAT)
BEGIN
		UPDATE percosecha SET
			percosecha.nParcCodigo   = nParcCodigo ,
			-- percosecha.nParcClase    = nParcClase ,
			percosecha.nProdCodigo   = nProdCodigo ,
			-- percosecha.nProdClase    = nProdClase ,
			-- percosecha.nPrdCodigo    = nPrdCodigo ,
			percosecha.cCosCodigo    = cCosCodigo ,
			percosecha.fHectareas    = fHectareas ,
			percosecha.fQuintales    = fQuintales ,
			percosecha.fKilogramos   = fKilogramos ,
			percosecha.fHolgura      = fHolgura
		WHERE percosecha.nPerCosCodigo = nPerCosCodigo
		;

	SELECT  nPerCosCodigo  ;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Upd_PerCosecha_Estado
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Upd_PerCosecha_Estado`;
DELIMITER ;;
CREATE PROCEDURE `usp_Upd_PerCosecha_Estado`(nPerCosCodigo INT, nPerCosEstado INT)
BEGIN
		UPDATE percosecha SET
			percosecha.nPerCosEstado = nPerCosEstado
		WHERE percosecha.nPerCosCodigo = nPerCosCodigo
		;

	SELECT  nPerCosCodigo  ;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Upd_PerDocumento_by_cPerCodigo
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Upd_PerDocumento_by_cPerCodigo`;
DELIMITER ;;
CREATE PROCEDURE `usp_Upd_PerDocumento_by_cPerCodigo`(cPerCodigo VARCHAR(20), nPerDocTipo INT , cPerDocNumero VARCHAR(20))
BEGIN
	UPDATE  perdocumento SET
		perdocumento.cPerDocNumero = cPerDocNumero
	WHERE perdocumento.cPerCodigo = cPerCodigo
	AND perdocumento.nPerDocTipo = nPerDocTipo ;

	SELECT cPerCodigo ;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Upd_Periodo
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Upd_Periodo`;
DELIMITER ;;
CREATE PROCEDURE `usp_Upd_Periodo`(nPrdCodigo INT(11) , cPrdDescripcion VARCHAR(250) , dPrdFecInic DATE , dPrdFecFin DATE, nPrdTipo INT(11))
BEGIN

	UPDATE periodo SET
		periodo.cPrdDescripcion = cPrdDescripcion,
		periodo.dPrdFecInic     = dPrdFecInic,
		periodo.dPrdFecFin      = dPrdFecFin,
		periodo.nPrdTipo        = nPrdTipo
	WHERE periodo.nPrdCodigo = nPrdCodigo;
	-- esto para que el metodo de conexion no duelva error cuando se trabaja con transacciones
	SELECT "Ok" AS cMensaje ;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Upd_Periodo_Estado
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Upd_Periodo_Estado`;
DELIMITER ;;
CREATE PROCEDURE `usp_Upd_Periodo_Estado`(nPrdCodigo INT(11), nPrdEstado INT(4))
BEGIN
	UPDATE periodo SET
		periodo.nPrdEstado = nPrdEstado
	WHERE periodo.nPrdCodigo = nPrdCodigo;
	SELECT "ok" AS cMensaje ;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Upd_PerMail
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Upd_PerMail`;
DELIMITER ;;
CREATE PROCEDURE `usp_Upd_PerMail`(cPerCodigo VARCHAR(20) ,  nPerMailItem INT , cPerMail VARCHAR(200))
BEGIN

	UPDATE permail SET
		permail.cPerMail = cPerMail
	WHERE permail.cPerCodigo = cPerCodigo
	AND permail.nPerMailItem = nPerMailItem
	;

	SELECT cPerCodigo ;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Upd_PerNatural
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Upd_PerNatural`;
DELIMITER ;;
CREATE PROCEDURE `usp_Upd_PerNatural`(cPerCodigo VARCHAR(20), cPerNatApePaterno VARCHAR(250), cPerNatApeMaterno VARCHAR(250), nPerNatSexo INT, nPerNatEstCivil INT)
BEGIN
	UPDATE pernatural SET
		pernatural.cPerNatApePaterno = cPerNatApePaterno,
		pernatural.cPerNatApeMaterno = cPerNatApeMaterno,
		pernatural.nPerNatSexo = nPerNatSexo,
		pernatural.nPerNatEstCivil = nPerNatEstCivil
	WHERE pernatural.cPerCodigo = cPerCodigo ;

	SELECT cPerCodigo ;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Upd_PerParametro
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Upd_PerParametro`;
DELIMITER ;;
CREATE PROCEDURE `usp_Upd_PerParametro`(cPerCodigo VARCHAR(20) , nParCodigo INT , nParClase INT , cPerParValor VARCHAR(100) , cPerParGlosa VARCHAR(250))
BEGIN
	-- ACTUALIZAR solomente -> cPerParValor , cPerParGlosa ;
	UPDATE perparametro SET
		perparametro.cPerParValor = cPerParValor ,
		perparametro.cPerParGlosa = cPerParGlosa
	WHERE perparametro.cPerCodigo = cPerCodigo
	AND perparametro.nParCodigo = nParCodigo
	AND perparametro.nParClase = nParClase;

	SELECT cPerCodigo  ;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Upd_PerParametro_Estado
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Upd_PerParametro_Estado`;
DELIMITER ;;
CREATE PROCEDURE `usp_Upd_PerParametro_Estado`(cPerCodigo VARCHAR(20) , nParCodigo INT , nParClase INT ,nPerParEstado INT)
BEGIN

	UPDATE perparametro SET
		perparametro.nPerParEstado = nPerParEstado
	WHERE perparametro.cPerCodigo = cPerCodigo
	AND perparametro.nParCodigo = nParCodigo
	AND perparametro.nParClase = nParClase;

	SELECT cPerCodigo  ;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Upd_PerParametro_nParCodigoNew
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Upd_PerParametro_nParCodigoNew`;
DELIMITER ;;
CREATE PROCEDURE `usp_Upd_PerParametro_nParCodigoNew`(cPerCodigo VARCHAR(20) , nParCodigo INT , nParClase INT , cPerParValor VARCHAR(100) , cPerParGlosa VARCHAR(250) , nParCodigoNew INT)
BEGIN
	-- esto es para actualizar el nParCodigo cuando se seleccionar otro tipo de parametro para una clase
	-- esto generalmente cuando se utilizan combos para el parametro
	UPDATE perparametro SET
		perparametro.nParCodigo = nParCodigoNew  ,
		perparametro.cPerParValor = cPerParValor ,
		perparametro.cPerParGlosa = cPerParGlosa
	WHERE perparametro.cPerCodigo = cPerCodigo
	AND perparametro.nParCodigo = nParCodigo
	AND perparametro.nParClase = nParClase;

	SELECT cPerCodigo  ;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Upd_PerRelacion_Estado
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Upd_PerRelacion_Estado`;
DELIMITER ;;
CREATE PROCEDURE `usp_Upd_PerRelacion_Estado`(cPerCodigo VARCHAR(20), nPerRelTipo INT, cPerUsuario VARCHAR(20) , nPerRelEstado INT)
BEGIN

	DECLARE cPerJuridica_ VARCHAR(20) ;

	-- CON EL CODIGO DEL USUARIO VERIFICACMOS A QUE EMPRESA PERTENECE
	-- cPerUsuario  es el usuario que esta en linea haciendo el registro de la persona
		SELECT  perjuridica.cPerCodigo  INTO cPerJuridica_
		FROM  perjuridica
		INNER JOIN perrelacion ON perrelacion.cPerJuridica =   perjuridica.cPerCodigo
		INNER JOIN persona ON persona.cPerCodigo = perrelacion.cPerCodigo
		WHERE persona.cPerCodigo = cPerUsuario    ;

	 -- Modificamos el nPerRelEstado la persona queda Innavilitada
	 -- para el tipo de persona registra y para una determinada empresa
		UPDATE perrelacion SET
			perrelacion.nPerRelEstado = nPerRelEstado
		WHERE perrelacion.cPerCodigo = cPerCodigo
		AND perrelacion.nPerRelTipo  = nPerRelTipo
		AND perrelacion.cPerJuridica = cPerJuridica_ ;

	SELECT cPerCodigo, cPerJuridica_ AS cPerJuridica ;


END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Upd_Persona
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Upd_Persona`;
DELIMITER ;;
CREATE PROCEDURE `usp_Upd_Persona`(cPerCodigo varchar(20), cPerNombre varchar(500), cPerApellidos varchar(500), dPerNacimiento varchar(20),  nPerEstado int(3))
BEGIN

	UPDATE persona
	SET persona.cPerNombre		=	cPerNombre,
			persona.cPerApellidos	=	cPerApellidos,
			persona.dPerNacimiento=	dPerNacimiento ,
			persona.nPerEstado		= nPerEstado
	WHERE persona.cPerCodigo	=  cPerCodigo;

	SELECT cPerCodigo ;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Upd_PerTelefono
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Upd_PerTelefono`;
DELIMITER ;;
CREATE PROCEDURE `usp_Upd_PerTelefono`(cPerCodigo VARCHAR(20),   nPerTelTipo INT , nPerTelItem INT , cPerTelNumero VARCHAR(20) , nPerTelTipNew INT)
BEGIN

	UPDATE pertelefono SET
		pertelefono.nPerTelTipo = nPerTelTipNew ,
		pertelefono.cPerTelNumero = cPerTelNumero
	WHERE pertelefono.cPerCodigo = cPerCodigo
	AND pertelefono.nPerTelTipo = nPerTelTipo
	AND pertelefono.nPerTelItem = nPerTelItem;

	SELECT cPerCodigo ;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Upd_PerUbigeo
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Upd_PerUbigeo`;
DELIMITER ;;
CREATE PROCEDURE `usp_Upd_PerUbigeo`(cPerCodigo VARCHAR(20), nPerUbiCodigo INT , cPerUbiGlosa VARCHAR(200) ,  nPerUbiCodigoNew INT)
BEGIN
	UPDATE  perubigeo SET
		perubigeo.nPerUbiCodigo = nPerUbiCodigoNew ,
		perubigeo.cPerUbiGlosa  = cPerUbiGlosa
	WHERE perubigeo.cPerCodigo = cPerCodigo
	AND perubigeo.nPerUbiCodigo = nPerUbiCodigo;

SELECT cPerCodigo ;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Validar_Caserio
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Validar_Caserio`;
DELIMITER ;;
CREATE PROCEDURE `usp_Validar_Caserio`(cCasDescripcion VARCHAR(150) , nDisCodigo INT)
BEGIN

	SELECT
		caserio.nCasCodigo ,
		caserio.cCasDescripcion ,
		caserio.nDisCodigo
	FROM caserio
	WHERE caserio.cCasDescripcion = cCasDescripcion
		AND	caserio.nDisCodigo = nDisCodigo ;


END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Validar_Parametro
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Validar_Parametro`;
DELIMITER ;;
CREATE PROCEDURE `usp_Validar_Parametro`(nParClase int(11), cParNombre varchar(100), cParDescripcion varchar(500))
BEGIN

		SELECT 	parametro.nParCodigo,
						parametro.cParNombre,
						cParDescripcion
		FROM parametro
		WHERE parametro.nParEstado = 1
		AND	parametro.nParClase = nParClase
		AND ( ( cParNombre 			= "-" ) OR ( parametro.cParNombre 			= cParNombre ) )
		AND	( ( cParDescripcion = "-" ) OR ( parametro.cParDescripcion 	= cParDescripcion ) );

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Validar_Parametro_Upd
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Validar_Parametro_Upd`;
DELIMITER ;;
CREATE PROCEDURE `usp_Validar_Parametro_Upd`(nParCodigo int ,nParClase int(11), cParNombre varchar(100), cParDescripcion varchar(500))
BEGIN

		SELECT 	parametro.nParCodigo,
						parametro.cParNombre,
						cParDescripcion
		FROM parametro
		WHERE parametro.nParEstado = 1
		AND parametro.nParCodigo <> nParCodigo
		AND	parametro.nParClase = nParClase
		AND ( ( cParNombre 			= "-" ) OR ( parametro.cParNombre 			= cParNombre ) )
		AND	( ( cParDescripcion = "-" ) OR ( parametro.cParDescripcion 	= cParDescripcion ) );

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Validar_PerCosecha
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Validar_PerCosecha`;
DELIMITER ;;
CREATE PROCEDURE `usp_Validar_PerCosecha`(cPerCodigo VARCHAR(20), nParcCodigo INT , nProdCodigo INT, nPrdCodigo INT)
BEGIN

	SELECT
		percosecha.nPerCosCodigo ,
		percosecha.cCosCodigo,
		percosecha.fHectareas,
		percosecha.fQuintales,
		percosecha.fQuintales,
		percosecha.fKilogramos,
		percosecha.fHolgura
	FROM percosecha
	WHERE percosecha.cPerCodigo = cPerCodigo
	AND percosecha.nPrdCodigo = nPrdCodigo
	AND ( (nParcCodigo = 0 ) OR (percosecha.nParcCodigo = nParcCodigo) )
	AND ( (nParcCodigo = 0 ) OR (percosecha.nParcClase =  2006) )
	AND ( (nProdCodigo = 0 ) OR (percosecha.nProdCodigo = nProdCodigo) )
	AND ( (nProdCodigo = 0 ) OR (percosecha.nProdClase = 2007 ) )
	;


END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Validar_PerCosecha_Upd
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Validar_PerCosecha_Upd`;
DELIMITER ;;
CREATE PROCEDURE `usp_Validar_PerCosecha_Upd`(nPerCosCodigo INT,cPerCodigo VARCHAR(20), nParcCodigo INT , nProdCodigo INT, nPrdCodigo INT)
BEGIN

	SELECT
		percosecha.nPerCosCodigo ,
		percosecha.cCosCodigo,
		percosecha.fHectareas,
		percosecha.fQuintales,
		percosecha.fQuintales,
		percosecha.fKilogramos,
		percosecha.fHolgura
	FROM percosecha
	WHERE percosecha.cPerCodigo = cPerCodigo
	AND percosecha.nParcCodigo = nParcCodigo
	AND percosecha.nParcClase =  2006
	AND percosecha.nProdCodigo = nProdCodigo
	AND percosecha.nProdClase = 2007
	AND percosecha.nPrdCodigo = nPrdCodigo
	AND percosecha.nPerCosCodigo <> nPerCosCodigo
	LIMIT 1;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Validar_PerDocumento
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Validar_PerDocumento`;
DELIMITER ;;
CREATE PROCEDURE `usp_Validar_PerDocumento`(cPerCodigo VARCHAR(20) ,  nPerDocTipo INT ,cPerDocNumero VARCHAR(20) )
BEGIN
	SELECT
		perdocumento.cPerCodigo ,
		perdocumento.cPerDocNumero ,
		perdocumento.nPerDocTipo
	FROM perdocumento
	WHERE ((cPerCodigo = "-") OR (perdocumento.cPerCodigo = cPerCodigo))
	AND ((nPerDocTipo = 0 ) OR (perdocumento.nPerDocTipo = nPerDocTipo ))
	AND ((cPerDocNumero = "-") OR (perdocumento.cPerDocNumero = cPerDocNumero));


END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Validar_PerDocumento_Upd
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Validar_PerDocumento_Upd`;
DELIMITER ;;
CREATE PROCEDURE `usp_Validar_PerDocumento_Upd`(cPerCodigo VARCHAR(20) , cPerDocNumero VARCHAR(20))
BEGIN
	SELECT
		perdocumento.cPerCodigo ,
		perdocumento.cPerDocNumero ,
		perdocumento.nPerDocTipo
	FROM perdocumento
	WHERE perdocumento.cPerCodigo <> cPerCodigo
	AND perdocumento.cPerDocNumero = cPerDocNumero
	LIMIT 1 ;


END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Validar_Periodo
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Validar_Periodo`;
DELIMITER ;;
CREATE PROCEDURE `usp_Validar_Periodo`(nPrdCodigo int(11) , cPrdDescripcion varchar(150) , dPrdFecInic varchar(20) , dPrdFecFin varchar(20))
BEGIN

	SELECT
				periodo.nPrdCodigo ,
				periodo.cPrdDescripcion ,
				periodo.dPrdFecInic ,
				periodo.dPrdFecFin,
				periodo.nPrdEstado
	FROM periodo
	WHERE ((nPrdCodigo = 0 ) OR ( periodo.nPrdCodigo = nPrdCodigo ))
		AND ((cPrdDescripcion = '-' ) OR ( periodo.cPrdDescripcion = cPrdDescripcion ))
		AND ((dPrdFecInic = '-' ) OR ( periodo.dPrdFecInic = dPrdFecInic ))
		AND ((dPrdFecFin = '-' ) OR ( periodo.dPrdFecFin = dPrdFecFin ))
 ;
-- nPrdCodigo , cPrdDescripcion , dPrdFecInic , dPrdFecFin
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Validar_Periodo_by_Fecha
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Validar_Periodo_by_Fecha`;
DELIMITER ;;
CREATE PROCEDURE `usp_Validar_Periodo_by_Fecha`(dPrdFecha DATE , nPrdTipo INT(4))
BEGIN

	SELECT
				periodo.nPrdCodigo ,
				periodo.cPrdDescripcion ,
				periodo.dPrdFecInic ,
				periodo.dPrdFecFin ,
				periodo.nPrdEstado
				FROM periodo
	WHERE dPrdFecha  BETWEEN periodo.dPrdFecInic AND periodo.dPrdFecFin
	AND periodo.nPrdTipo = nPrdTipo
	AND nPrdEstado IN( 1 , 2) ;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for usp_Validar_Persona
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_Validar_Persona`;
DELIMITER ;;
CREATE PROCEDURE `usp_Validar_Persona`(cPerCodigo varchar(20) ,cPerNombres varchar(500), cPerApellidos varchar(500))
BEGIN

		SELECT 	persona.cPerCodigo,
						persona.cPerNombre,
						persona.cPerApellidos,
						persona.dPerNacimiento
		FROM persona
		WHERE persona.nPerEstado = 1
		AND ( ( cPerCodigo		= "-" ) OR ( persona.cPerCodigo 		= cPerCodigo 	) )
		AND ( ( cPerNombres		= "-" ) OR ( TRIM(persona.cPerNombre) 		= TRIM(cPerNombres) 	) )
		AND	( ( cPerApellidos	=	"-" ) OR ( TRIM(persona.cPerApellidos) 	= TRIM(cPerApellidos) ) );

END
;;
DELIMITER ;
