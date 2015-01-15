<?php

class EstadisticasController extends BaseController {
 
    public function getIndex(){
        return View::make('estadisticas');
    }

    public function getDescripcion($turnoId){
    	$turno=Turno::find($turnoId);
    	return is_null($turno->novedad) ? "" : $turno->novedad->descripcion;
    }

    public function postIndex(){
        try{
            $turno = Turno::find( Input::get('turno_id') );
            if( is_null($turno->novedad) )
                $novedad= Novedad::create(Input::all());
            else{
                $novedad= $turno->novedad;
                $novedad->descripcion.=Input::get('descripcion');
                $novedad->save();
            }

            return Redirect::to('turno')->with('mensaje',"Novedad agregada con éxito");
        }catch (Exception $e) {
            return Redirect::to('turno')->with('error',"Error al agregar esta novedad, revisa los datos de ingreso");
        }
    }
 
}