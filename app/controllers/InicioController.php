<?php

class InicioController extends BaseController {
 
    public function getIndex(){
    	$nTripulantes=Tripulacion::count();
		$nAmbulancias=Ambulancia::count();
		$nPacientes=Tripulacion::count();
		$nIps=Tripulacion::count();
		$nAtendidos=Atencion::select('paciente_id')->groupBy('paciente_id')->get();
		$nPoblacion=Poblacion::sum('i_total');

		$date=date("Y-m-d",strtotime("+10 day"));
    	
    	$vencidos = Ambulancia::orWhere('f_venc_seguro','=',$date)
    						->orWhere('f_venc_soat','=',$date)
    						->orWhere('f_venc_poliza','=',$date)
    						->get();


	    return View::make('inicio')
	    	->with('nTripulantes',$nTripulantes)
	    	->with('nAmbulancias',$nAmbulancias)
	    	->with('nPacientes',$nPacientes)
	    	->with('nIps',$nIps)
	    	->with('nAtendidos',$nAtendidos)
	    	->with('nPoblacion',$nPoblacion)
	    	->with('vencidos',$vencidos);
    }

    public function getPruebas(){
    	$fecha1=Input::get('fecha1', date('Y-m-d 00:00:00') );
    	$fecha2=Input::get('fecha2', date('Y-m-15 23:59:59'));
        $tAtencion=Input::get('t_atencion', 'Todas');
        $motivo=Input::get('motivo', 'Todas');

    	$atenciones=Paciente::select(DB::raw('count(paciente.id) as atendidos,lugar.id,lugar.nombre,lugarp.id as id_padre,lugarp.nombre as nombre_padre,lugar.tipo as tipo_lugar'))
    						->whereHas('atenciones', function($q) use ($fecha1,$fecha2,$tAtencion,$motivo){
							    $q->whereBetween('created_at', array($fecha1,$fecha2) );

                                if($motivo!='Todas')
                                    $q=$q->where('motivo','=',$motivo);

                                if($tAtencion!='Todas')
                                    $q=$q->where('tAtencion','=',$tAtencion);
							})
    						->join('lugar','lugar.id','=','paciente.lugar_id')
    						->join('lugar as lugarp','lugarp.id','=','lugar.lugar_id')
    						->groupBy('lugar.id')
    						->groupBy('id_padre')
    						->get();

        
        $datos=array();
        
        foreach ($atenciones as $key => $atencion) {
            if(!array_key_exists($atencion->nombre_padre,$datos)){
                $datos[$atencion->nombre_padre]=array();
                array_push($datos[$atencion->nombre_padre], $atencion->tipo_lugar );
            }
            //comuna o corregimiento
            $cc = array( 'nombre' => $atencion->nombre,'atendidos' => $atencion->atendidos );
            array_push($datos[$atencion->nombre_padre], $cc );   
        }
        
        //return $atenciones;
    	//return Response::json($datos);
        return json_decode(json_encode($datos)).toString();
    }

 
}