<?php 

class EquipoComunicacion extends Eloquent {

	protected $table = "equipo_comunicacion";
	public $timestamps = false;
	protected $fillable = array('tipo','descripcion','numero_ce');

	public function ambulancia()
    {
        return $this->belongsTo('Ambulancia');
    }
}