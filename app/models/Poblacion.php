
<?php 

class Poblacion extends Eloquent{

	protected $table = 'poblacion';
	protected $fillable = array('desc_poblacion','i_total');
	public $timestamps = false;

}