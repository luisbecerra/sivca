<?php 

class Eps extends Eloquent {

	protected $table = 'eps';
	protected $fillable = array('nombre');
	public $timestamps = false;

	public function paciente(){
		return $this->hasMany('Paciente');
	}

}