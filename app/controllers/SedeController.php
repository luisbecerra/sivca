<?php

class SedeController extends BaseController {
 
    public function postIndex(){
    	//return Input::get('ips_id');
    	//try{
    		$sede = Sede::create( Input::except('servicio','tipo-capacidad','capacidad') );
    		$pivot = array();
    		foreach (Input::get('servicio') as $key => $servicioId) {
    			
    			$dataPivot=array(
    				'sede_id' => $sede->id,
					'servicio_id' => $servicioId,
					'tipo_capacidad' => Input::get('tipo-capacidad')[$key],
					'capacidad' => Input::get('capacidad')[$key]
    			);

    			array_push($pivot, $dataPivot);
    		}

    		if(sizeof($pivot))
    			DB::table('sede_servicio')->insert($pivot);
    	

    		return Redirect::to('ips')->with('mensaje',"Sede creada con éxito");
    	/*
    	}catch (Exception $e) {
    		return Redirect::to('ips')->with('error',"Error al crear esta sede, revisa los datos de ingreso");
    	}
    	*/
    }
 
}