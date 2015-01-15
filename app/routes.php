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

	//rutas para ips
	Route::controller('inicio', 'InicioController');

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

	//rutas para lugar
	Route::controller('lugar', 'LugarController');

	//rutas para rotacion
	Route::controller('turno', 'TurnoController');

	//rutas para novedades
	Route::controller('novedad', 'NovedadController');

	//ruta para ambulancias
	Route::controller('ambulancia', 'AmbulanciaController');

	//ruta para empresa
	Route::controller('empresa', 'EmpresaController');

	//ruta para empresa
	Route::controller('tripulacion', 'TripulacionController');

	//ruta para cursos de la tripulacion
	Route::controller('curso', 'CursoController');

	//ruta para equipos de comunicacion
	Route::controller('comunicacion', 'ComunicacionController');

	//ruta para atenciones de pacientes
	Route::controller('atencion', 'AtencionController');

	//ruta para atenciones de pacientes
	Route::controller('estadisticas', 'EstadisticasController');

	//ruta para pacientes
	//Route::controller('paciente', 'PacienteController');
});