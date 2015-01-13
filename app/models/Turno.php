<?php

class Turno extends Eloquent{

	protected $table = 'turno';
	protected $softDelete = true;
	protected $fillable = array('id', 'ambulancia_id', 'h_inicio', 'h_fin', 'dia_inicio','dia_fin');

	public function ambulancia(){
		return $this->belongsTo('Ambulancia');
	}

	public function novedad(){
		return $this->hasOne('Novedad');
	}
}