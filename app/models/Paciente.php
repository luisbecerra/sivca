<?php

class Paciente extends Eloquent{

	protected $table = 'paciente';
	protected $softDelete = true;
	//public $timestamps = false;
	protected $fillable = array('id','tipo_id','nombre', 'tipo_id', 'f_nacimiento', 'genero', 'direccion', 'regimen', 'lugar_id', 'eps_id');

	public function eps(){
		return $this->belongsTo('Eps');
	}

	public function lugar(){
		return $this->belongsTo('Lugar');
	}
}