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
        //return Input::all();
        $fecha1=Input::get('fecha1', date('Y-m-d')).' 00:00:00';
        $fecha2=Input::get('fecha2', date('Y-m-d')).' 23:59:59';
        $tAtencion=Input::get('t_atencion', 'Todas');
        $motivo=Input::get('motivo', 'Todas');

        $atenciones=Paciente::select(DB::raw('count(paciente.id) as atendidos,lugar.id,lugar.nombre,lugarp.id as id_padre,lugarp.nombre as nombre_padre,lugar.tipo as tipo_lugar'))
                            ->whereHas('atenciones', function($q) use ($fecha1,$fecha2,$tAtencion,$motivo){
                                $q->whereBetween('created_at', array($fecha1,$fecha2) );

                                if($motivo!='Todas')
                                    $q->where('motivo','=',$motivo);

                                if($tAtencion!='Todas')
                                    $q->where('tAtencion','=',$tAtencion);
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
        
        return View::make('estadisticas')->with('datos',$datos);
    }
 
}