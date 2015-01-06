<?php

class Servicio extends Eloquent{

	protected $table = 'servicio';
	//protected $softDelete = true;
	protected $fillable = array('id', 'id_ips', 'direccion', 'telefono', 'coordinador');

	public function sedes(){
		return $this->belongsToMany('Sede');
	}
}