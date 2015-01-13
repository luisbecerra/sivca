<?php

class EmpresaController extends BaseController {

	public function getIndex()
	{
		return View::make('empresa');
	}

	public function postCreate()
	{
		//toma valores del form, y crea una nueva empresa
        if(Input::get())
        {
            $data = array(
                'nombre' => Input::get('nombre'),
                'direccion' => Input::get('direccion'),
                'telefono' => intval(Input::get('telefono')),
                'celular' => intval(Input::get('celular'))
                );
            $empresa = new Empresa($data);
            if($empresa->save())
            {
                return Redirect::to('empresa')->with(array('success' => 'Empresa creada satisfactoriamente.'));
            }else{
                return Redirect::to('empresa')->withErrors($this->validateForms($inputs))->withInput();
 			}
 		}else{
 			return View::make('empresa');
 		}
	}
}