<?php

class AtencionController extends BaseController {
 
    public function getIndex(){
    	$ipss=Ips::all();
        $epss=Eps::all();
        $ambulancias=Ambulancia::all();
        $veredas=Lugar::where('tipo','=',6)->orderBy('nombre','asc')->get();
        $corregimientos=Lugar::where('tipo','=',5)->get();
        $barrios=Lugar::where('tipo','=',4)->orderBy('nombre','asc')->get();
        $comunas=Lugar::where('tipo','=',3)->get();
        $ciudades=Lugar::where('tipo','=',2)->get();
        $atenciones=Atencion::paginate(20);

        return View::make('atencion')
                        ->with('atenciones',$atenciones)
                        ->with('epss',$epss)
                        ->with('ipss',$ipss)
                        ->with('ambulancias',$ambulancias)
                        ->with('veredas',$veredas)
                        ->with('corregimientos',$corregimientos)
                        ->with('barrios',$barrios)
                        ->with('comunas',$comunas)
                        ->with('ciudades',$ciudades);

                        
    }

    public function postIndex(){

        try{
            $paciente = Paciente::find( Input::get('id') );
            
            if(Input::get('eps_id') == 'no_eps')
                Input::merge(array('eps_id' => NULL));

            $paciente = ($paciente) ? $paciente : Paciente::create( Input::all() );
            Input::merge(array( 'paciente_id' => $paciente->id ));


            $atencion = Atencion::create( Input::all() );
            return Redirect::to('atencion')->with('mensaje',"Atención agregada con éxito");
        }catch (Exception $e) {
            return Redirect::to('atencion')->with('error',"Error al agregar esta atención, revisa los datos de ingreso");
        }
    }

    public function postEditar($id){
        try{
            $atencion = Atencion::find( $id );
            $paciente = Paciente::find( Input::get('id') );

            if(Input::get('eps_id') == 'no_eps')
                Input::merge(array('eps_id' => NULL));

            $atencion->update( Input::all() );
            $paciente->update( Input::all() );
            return Redirect::to('atencion')->with('mensaje',"Atención editada con éxito");
        }catch (Exception $e) {
            return Redirect::to('atencion')->with('error',"Error al editar esta atención, revisa los datos de ingreso");
        }
    }
 
}