<?php

class TripulacionController extends BaseController {

	public function getIndex()
	{
        $ambulancias = Ambulancia::all();
        $tripulacion = Tripulacion::all();
		return View::make('tripulacion')->with('ambulancias',$ambulancias)->with('tripulacion',$tripulacion);
	}

    public function postIndex(){
        try{
            $ambulancia = Ambulancia::find(Input::get("ambulancia"));
            $tripulacion = new Tripulacion(Input::all());
            $tripulacion->ambulancia()->associate($ambulancia);
            $ambulancia->save();
            $tripulacion->save();
            return Redirect::to('tripulacion')->with('mensaje',"Tripulante creado con éxito");
        }catch (Exception $e) {
            return Redirect::to('tripulacion')->with('error',"Error al crear este tripulante, revisa los datos de ingreso");
        }
    }

}