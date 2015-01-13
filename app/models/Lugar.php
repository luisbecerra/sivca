<?php

class Lugar extends Eloquent{

	protected $table = 'lugar';
	//protected $softDelete = true;
	public $timestamps = false;
	protected $fillable = array('nombre', 'tipo', 'urbano', 'id_lugar');


	public function padre(){
		return $this->belongsTo('Lugar','lugar_id', 'id');
	}

	public function hijos(){
		return $this->hasMany('Lugar');
	}
}