<?php

class AuthController extends BaseController {
 
    /**
     * Attempt user login
     */
    public function doLogin()
    {
        // Obtenemos el email, borramos los espacios
        // y convertimos todo a minúscula
        $username = mb_strtolower(trim(Input::get('usuario')));
        // Obtenemos la contraseña enviada
        $password = Input::get('contrasena');
 
        // Realizamos la autenticación
        if (Auth::attempt( array('username' => $username, 'password' => $password) ))
        {
            // Aquí también pueden devolver una llamada a otro controlador o
            // devolver una vista
            Auth::user()->touch();
            
            $ultDia=date("t", 1 );
            $fechaHabilitacion=date("Y-m-d",strtotime( date('Y-m-'.$ultDia)." -5 day" ));
            
            if( (Auth::user()->role==2) && (date('Y-m-d')<=$fechaHabilitacion) ){
                Auth::logout();
                return Redirect::to('login')->with('mensaje','Solo puedes ingresar los últimos 5 días del mes');
            }
            

            return Redirect::to('/inicio');
        }
 
        // La autenticación ha fallado re-direccionamos
        // a la página anterior con los datos enviados
        // y con un mensaje de error
        return Redirect::to('/login')->with('mensaje','Clave o contraseña incorrecta');
    }
 
    public function doLogout()
    {
        //Desconctamos al usuario
        Auth::logout();
 
        //Redireccionamos al inicio de la app con un mensaje
        return Redirect::to('/login');
    }

 
}