<?php

class TurnoController extends BaseController {
 
    public function getIndex(){
    	$ambulancias=DB::table('ambulancia')->get();
    	return View::make('turno')->with('ambulancias',$ambulancias);
    }

    public function getInfo($fecha){
    	$turnos=Turno::where('dia_inicio','=',$fecha)->get();
    	return View::make('turnosDia')->with('fecha',$fecha)->with('turnos',$turnos);
    }

    public function postIndex(){
    	try{
    		$turno = Turno::create(Input::all());
    		return Redirect::to('turno')->with('mensaje',"Turno creado con éxito");
    	}catch (Exception $e) {
    		return Redirect::to('turno')->with('error',"Error al crear esta turno, revisa los datos de ingreso");
    	}
    }

    public function postEliminar($id){
        try{
            $turno = Turno::find($id);
            $turno->delete();
            return Redirect::to('turno')->with('mensaje',"Turno eliminado con éxito");
        }catch (Exception $e) {
            return Redirect::to('turno')->with('error',"Error al eliminar este turno, intenta nuevamente");
        }
    }
 
}