<?php 

class ImgAmbulancia extends Eloquent{

	protected $table = "img_ambulancia";
	public $timestamps = false;
	protected $fillable = array('url');

	public function ambulancia()
    {
        return $this->belongsTo('Ambulancia');
    }
}