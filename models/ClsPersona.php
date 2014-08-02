<?php
class ClsPersona extends ClsConexion
{

	# Funcion insertar tabla persona ->  nPerTipo si es una persona  juridica(2) o natural(1).
		function Set_Persona($bean_persona )
		{
			// $cPerNombre     = $bean_persona->getcPerCodigo() ;
			$cPerNombre     = $bean_persona->getcPerNombre() ;
			$cPerApellidos  = $bean_persona->getcPerApellidos() ;
			$dPerNacimiento = $bean_persona->getdPerNacimiento() ;
			$nPerTipo       = $bean_persona->getnPerTipo() ;
			$nPerEstado     = $bean_persona->getnPerEstado() ;

			$this->query = "CALL usp_Set_Persona( '$cPerNombre' ,  '$cPerApellidos' , '$dPerNacimiento' , $nPerTipo  , $nPerEstado )  ; ";
			$this->execute_query();
			$data = $this->rows ;
			return $data;
		}
	# Funcion Actualizar  tabla persona
		function Upd_Persona($bean_persona )
		{
			$cPerCodigo     = $bean_persona->getcPerCodigo() ;
			$cPerNombre     = $bean_persona->getcPerNombre() ;
			$cPerApellidos  = $bean_persona->getcPerApellidos() ;
			$dPerNacimiento = $bean_persona->getdPerNacimiento() ;
			$nPerEstado     = $bean_persona->getnPerEstado() ;

			$this->query = "CALL usp_Upd_Persona( '$cPerCodigo' ,'$cPerNombre' ,  '$cPerApellidos' , '$dPerNacimiento' ,  $nPerEstado )  ; ";
			$this->execute_query();
			$data = $this->rows ;
			return $data;
		}




}

?>