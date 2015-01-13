<?php

class ComunicacionController extends BaseController {
 
    public function postIndex(){
    	try{
    		$ambulancia = Ambulancia::find(Input::get('ambulancia'));
    		$comunicacion = new EquipoComunicacion(Input::all());
    		$comunicacion->ambulancia()->associate($ambulancia);
    		$comunicacion->save();
    		return Redirect::to('ambulancia')->with('mensaje',"Equipo de comunicacion agregado con éxito");
    	}catch (Exception $e) {
    		echo $e;
    	}
    }
 
}