<?php

class AmbulanciaController extends BaseController {

	public function getIndex()
	{
        $ambulancias = Ambulancia::all();
		return View::make('ambulancia')->with('ambulancias',$ambulancias);
	}


    public function postIndex()
    {
        
        //return Input::all();
        //toma valores del form e inserta ambulancia
        if(Input::get())
        {
            $dataAmbulancia = array(
                'id' => intval(Input::get('id')),
                'num_tpropiedad' => intval(Input::get('num_tpropiedad')),
                'tipo'=> Input::get('tipo'),
                'placa'=> Input::get('placa'),
                'marca'=> Input::get('marca'),
                'dir_ambulancia'=> Input::get('dir_ambulancia'),
                'modelo'=> Input::get('modelo'),
                'f_venc_seguro'=> Input::get('f_venc_seguro'),
                'f_venc_soat'=> Input::get('f_venc_soat'),
                'num_poliza'=> intval(Input::get('num_poliza')),
                'f_vig_poliza'=> Input::get('f_vig_poliza'),
                'f_venc_poliza' => Input::get('f_venc_poliza'),
                'f_rev_tecmecanica' =>  Input::get('f_rev_tecmecanica'));  
            $ambulancia = new Ambulancia($dataAmbulancia);
            
            //inserto las imagenes de la ambulancia
            $imagenes = Input::file('imagenes');

            foreach ($imagenes as $imagen) {
                $file=$imagen->getClientOriginalName();
                $i = 0;
                $info = explode(".",$file);
                $miImg = $file;
                while(file_exists('AmbulanciasImg/'. $miImg)){ 
                    $i++;
                    $miImg = $info[0]."(".$i.")".".".$info[1];              
                }
                $imagen->move("AmbulanciasImg",$miImg);
                $data= array('url' => "AmbulanciasImg/".$miImg);
                $archivo = new ImgAmbulancia($data);
                $archivo->ambulancia()->associate($ambulancia);
                $archivo->save();
            }

            if($ambulancia->save())
            {
                return Redirect::to('ambulancia')->with('mensaje',"Ambulancia creada con éxito");
            }else{
                return Redirect::to('ambulancia')->with('error',"Error al crear esta ambulancia, revisa los datos de ingreso");
            }
        }else{
            return View::make('ambulancia');
        }
    }

}