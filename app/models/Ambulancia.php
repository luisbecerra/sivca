<?php

class Ambulancia extends Eloquent{

	protected $table = "ambulancia";
	protected $softdelete = true;
	protected $fillable = array('id','num_tpropiedad','tipo','placa','marca','dir_ambulancia','modelo','f_venc_seguro','f_venc_soat','num_poliza','f_vig_poliza', 'f_venc_poliza','f_rev_tecmecanica');

	public function imgAmbulancia()
    {
        return $this->hasMany('ImgAmbulancia');
    }
    public function equipoComunicacion()
    {
        return $this->hasMany('EquipoComunicacion');
    }
    public function tripulacion()
    {
        return $this->hasMany('Tripulacion');
    }
}