<?php

class SedeController extends BaseController {
 
    public function postIndex(){
    	return Input::all();
    	try{
    		$sede = Sede::create(Input::all());
    		return Redirect::to('ips')->with('mensaje',"Sede creada con éxito");
    	}catch (Exception $e) {
    		return Redirect::to('ips')->with('error',"Error al crear esta sede, revisa los datos de ingreso");
    	}
    }
 
}