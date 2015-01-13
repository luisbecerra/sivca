<?php

class LugarController extends BaseController {
 
    public function getPadre($id){
    	$lugar=Lugar::find($id);
        return $lugar->padre;
    }
 
}