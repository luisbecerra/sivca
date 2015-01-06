<?php

class Ips extends Eloquent{

	protected $table = 'ips';
	protected $softDelete = true;
	protected $fillable = array('nombre', 'conformacion', 'caracter', 'nivel');

	public function sedes(){
		return $this->hasMany('Sede');
	}
}