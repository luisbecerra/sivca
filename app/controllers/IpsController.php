<?php

class IpsController extends BaseController {
 
    public function getIndex(){
    	$ipss=Ips::all();
        $servicios=Servicio::all();
        return View::make('ips')->with('ipss',$ipss)->with('servicios',$servicios);
    }

    public function postIndex(){
    	try{
    		$ips = Ips::create(Input::all());
    		return Redirect::to('ips')->with('mensaje',"IPS creada con éxito");
    	}catch (Exception $e) {
    		return Redirect::to('ips')->with('error',"Error al crear esta ips, revisa los datos de ingreso");
    	}
    }
 
}