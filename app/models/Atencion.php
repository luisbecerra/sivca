<?php

class Atencion extends Eloquent{

	protected $table = "atencion";
	protected $fillable = array('ambulancia_id','paciente_id','sede_id','tipo','dir_ambulancia','motivo','f_solicitud','f_atencion','f_inicio_traslado','f_fin_traslado');

	public function sede()
    {
        return $this->belongsTo('Sede');
    }
    public function paciente()
    {
        return $this->belongsTo('Paciente');
    }
    public function ambulancia()
    {
        return $this->belongsTo('Ambulancia');
    }
}