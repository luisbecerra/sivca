<?php
//Pagina principal donde está el formulario de identificación
Route::get('/',  function(){
    return "Inicio";
    //return View::make('login');
})->before('guest');

Route::get('/login',  function(){
    return View::make('login');
});


//Procesa el formulario e identifica al usuario
Route::post('/', array('uses' => 'AuthController@doLogin', 'before' => 'guest') );
//Desconecta al usuario
Route::get('logout', array('uses' => 'AuthController@doLogout', 'before' => 'auth') );


Route::group(array('before' => 'auth'),function(){

});