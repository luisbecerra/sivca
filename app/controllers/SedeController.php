<?php

class SedeController extends BaseController {
 
    public function postIndex(){
    	//return Input::all();
    	try{
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
    	}catch (Exception $e) {
    		return Redirect::to('ips')->with('error',"Error al crear esta sede, revisa los datos de ingreso");
    	}
    }

    public function postServicio($id,$servicioId){
        try{
            $sede = Sede::find( $id );
            $servicios = $sede->servicios()->where('servicio_id','=',$servicioId)->where('tipo_capacidad','=',Input::get('tipo-capacidad'))->get();
            if(sizeof($servicios)){
                $servicios[0]->pivot->capacidad = Input::get('capacidad');
                $servicios[0]->pivot->tipo_capacidad = Input::get('tipo-capacidad');
                $servicios[0]->pivot->save();
                return 1;
            }else{
                return 0;
            }
            
        }catch (Exception $e) {
            return 0;
        }
    }

    public function postEliminarServicio($id,$servicioId,$tipoCapacidad){
        try{
            $sede = Sede::find( $id );
            $servicios = $sede
                        ->servicios()
                        ->where('servicio_id','=',$servicioId)
                        ->where('tipo_capacidad','=',$tipoCapacidad)
                        ->get();

            if(sizeof($servicios)){
                $servicios[0]->delete();
                return 1;
            }else{
                return 0;
            }
            return 1;
        }catch (Exception $e) {
            return 0;
        }
    }
 
}