<?php

class PoblacionController extends BaseController {
 
    public function getIndex()
	{
		$poblacion = Poblacion::orderBy('id')->get();
		return View::make('poblacion')->with( 'poblacion' , $poblacion );
	}


    public function postIndex()
    {
        //toma valores del form e inserta población
        if(Input::get())
        {
        	
        	$cabecera = Poblacion::where('desc_poblacion', '=', 'Cabecera')->first();
        	$cabecera->i_total = Input::get('cabecera');
        	$cabecera = $cabecera->save();
        	
        	$rural =  Poblacion::where('desc_poblacion', '=', 'Rural')->first();
        	$rural->i_total = Input::get('rural');
        	$rural = $rural->save();       

            if( $rural && $cabecera )
            {
              return Redirect::to('poblacion')->with('mensaje','Valores de población ingresados correctamente.');
            }
            else{
              return Redirect::to('poblacion')->with('error',"Error al editar los datos de la población");
            }
        }else{
            return View::make('poblacion');
        }
    } 
}