<?php
$route= "http://gempresarial.net/lineas/recargarMinutos";

$sesion = curl_init( $route );
$resultado = array(CURLOPT_RETURNTRANSFER => true);
curl_setopt_array( $sesion, $resultado );
curl_setopt($sesion, CURLOPT_CUSTOMREQUEST, 'GET');
curl_setopt($sesion, CURLOPT_USERAGENT, "Mozilla/5.0 (X11; Linux x86_64)");
$results =  curl_exec($sesion);
curl_close($sesion);
$registros = file_get_contents('resultado.txt');
file_put_contents('resultado.txt', $registros.$results);
echo $results;
?>