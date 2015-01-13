<?php

class Novedad extends Eloquent{

	protected $table = 'novedad';
	protected $fillable = array('turno_id', 'descripcion');

	public function turno(){
		return $this->belongsTo('Turno');
	}
}