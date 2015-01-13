<?php 

class Empresa extends Eloquent {

	protected $table = 'empresa';
	protected $fillable = array('nombre','direccion','telefono','celular');
	protected $softDelete = true;

}