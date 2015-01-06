<?php

class Sede extends Eloquent{

	protected $table = 'sede';
	//protected $softDelete = true;
	protected $fillable = array('id', 'id_ips', 'direccion', 'telefono', 'coordinador');

	public function ips(){
		return $this->belongsTo('Ips');
	}

	public function servicios(){
		return $this->belongsToMany('Servicio');
	}
}