<?php

class AuthController extends BaseController {
 
    /**
     * Attempt user login
     */
    public function doLogin()
    {
        // Obtenemos el email, borramos los espacios
        // y convertimos todo a minúscula
        $username = mb_strtolower(trim(Input::get('username')));
        // Obtenemos la contraseña enviada
        $password = Input::get('password');
 
        // Realizamos la autenticación
        if (Auth::attempt( array('username' => $username, 'password' => $password) ))
        {
            // Aquí también pueden devolver una llamada a otro controlador o
            // devolver una vista
            return Redirect::to('/inicio');
        }
 
        // La autenticación ha fallado re-direccionamos
        // a la página anterior con los datos enviados
        // y con un mensaje de error
        return Redirect::to('/login?error=1');
    }
 
    public function doLogout()
    {
        //Desconctamos al usuario
        Auth::logout();
 
        //Redireccionamos al inicio de la app con un mensaje
        return Redirect::to('/login');
    }
 
}