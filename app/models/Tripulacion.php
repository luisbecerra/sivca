<?php 

class Tripulacion extends Eloquent {

	protected $table = "tripulacion";
	protected $softDelete = true;
	protected $fillable = array('id','nombre','cargo');

	public function ambulancia(){
		return $this->belongsTo('Ambulancia');
	}

	public function cursoTripulacion()
    {
        return $this->hasMany('CursoTripulacion');
    }
}