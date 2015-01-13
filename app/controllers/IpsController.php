<?php

class IpsController extends BaseController {
 
    public function getIndex(){
    	$ipss=Ips::all();
        $servicios=Servicio::all();
        $barrios=Lugar::where('tipo','=',4)->get();
        $comunas=Lugar::where('tipo','=',3)->get();
        $ciudades=Lugar::where('tipo','=',2)->get();
        return View::make('ips')
                        ->with('ipss',$ipss)
                        ->with('servicios',$servicios)
                        ->with('barrios',$barrios)
                        ->with('comunas',$comunas)
                        ->with('ciudades',$ciudades);

    }

    public function postIndex(){
    	try{
    		$ips = Ips::create(Input::all());
    		return Redirect::to('ips')->with('mensaje',"IPS creada con éxito");
    	}catch (Exception $e) {
    		return Redirect::to('ips')->with('error',"Error al crear esta ips, revisa los datos de ingreso");
    	}
    }

    public function getInfoSedes($id){
        $ips=Ips::find($id);
        return View::make('sedeServicios')->with('ips',$ips);
    }
 
}