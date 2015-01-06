<?php
//Pagina principal donde está el formulario de identificación
Route::get('/',  function(){
    return View::make('login');
})->before('guest');

Route::get('/login',  function(){
    return View::make('login');
});

//Procesa el formulario e identifica al usuario
Route::post('/', array('uses' => 'AuthController@doLogin', 'before' => 'guest') );
//Desconecta al usuario
Route::get('logout', array('uses' => 'AuthController@doLogout', 'before' => 'auth') );


Route::group(array('before' => 'auth'),function(){

	Route::get('/inicio',  function(){
	    return View::make('inicio');
	});

	Route::get('/consultaRUP',  function(){
	    return View::make('rup');
	});

	Route::get('/poblacionDane',  function(){
	    return View::make('dane');
	});

	Route::get('/consultaBDUA',  function(){
	    return View::make('bdua');
	});

	//rutas para poblacion
	Route::controller('poblacion', 'PoblacionController');

	//rutas para ips
	Route::controller('ips', 'IpsController');

	//rutas para sede
	Route::controller('sede', 'SedeController');

	Route::get('/pruebas',  function(){
	    $ips=Ips::find('HOSPITAL FEDERICO LLERAS ACOSTA E.S.E');
	    return $ips;
	});
});