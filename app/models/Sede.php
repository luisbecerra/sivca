<?php

class Sede extends Eloquent{

	protected $table = 'sede';
	//protected $softDelete = true;
	public $timestamps = false;
	protected $fillable = array('nombre', 'ips_id', 'lugar_id', 'direccion', 'telefono', 'coordinador');

	public function ips(){
		return $this->belongsTo('Ips');
	}

	public function servicios(){
		return $this->belongsToMany('Servicio')->withPivot('tipo_capacidad','capacidad');
	}
}