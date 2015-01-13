<?php

class ImagenController extends BaseController {
 
    public function postIndex(){
        try{
            $tripulante = Tripulacion::find(Input::get('tripulante'));
            $curso = new CursoTripulacion(Input::all());
            $curso->tripulacion()->associate($tripulante);
            $tripulante->save();
            $curso->save();
            return Redirect::to('tripulacion')->with('mensaje',"Curso agregado con éxito");
        }catch (Exception $e) {
            echo $e;
        }
    }
 
}