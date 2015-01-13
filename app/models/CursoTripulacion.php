<?php

class CursoTripulacion extends Eloquent {

	protected $table = "curso_tripulacion";
	public $timestamps = false;
	protected $fillable = array('nombre','fecha');

	public function tripulacion(){
		return $this->belongsTo('Tripulacion');
	}

}