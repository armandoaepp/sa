<?php
/* Clase Bean Generada  - Creado por @armandoaepp */
class Bean_persona extends Bean_general{
//Constructor
	public function Bean_persona(){}
//Atributos
	private $cPerCodigo;
	private $cPerNombre;
	private $cPerApellidos;
	private $dPerNacimiento;
	private $nPerTipo;
	private $nPerEstado;
//Propiedades
	public function setcPerCodigo($cPerCodigo_){ $this->cPerCodigo=$cPerCodigo_;}
	public function getcPerCodigo(){ return $this->cPerCodigo;}
	public function setcPerNombre($cPerNombre_){ $this->cPerNombre=$cPerNombre_;}
	public function getcPerNombre(){ return $this->cPerNombre;}
	public function setcPerApellidos($cPerApellidos_){ $this->cPerApellidos=$cPerApellidos_;}
	public function getcPerApellidos(){ return $this->cPerApellidos;}
	public function setdPerNacimiento($dPerNacimiento_){ $this->dPerNacimiento=$dPerNacimiento_;}
	public function getdPerNacimiento(){ return $this->dPerNacimiento;}
	# 2 persona natural
	public function setnPerTipo($nPerTipo_ = 2 ){ $this->nPerTipo=$nPerTipo_;}
	public function getnPerTipo(){ return $this->nPerTipo;}
	public function setnPerEstado($nPerEstado_){ $this->nPerEstado=$nPerEstado_;}
	public function getnPerEstado(){ return $this->nPerEstado;}
}