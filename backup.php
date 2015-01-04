<?php

backup_tables('localhost','quickapp_admin','gempresarial@2013','quickapp_gempresarial');


$route= "http://gempresarial.net/copiasBDGempresarial/enviarCorreo";

$sesion = curl_init( $route );
$resultado = array(CURLOPT_RETURNTRANSFER => true);
curl_setopt_array( $sesion, $resultado );
curl_setopt($sesion, CURLOPT_CUSTOMREQUEST, 'GET');
curl_setopt($sesion, CURLOPT_USERAGENT, "Mozilla/5.0 (X11; Linux x86_64)");
$results =  curl_exec($sesion);
curl_close($sesion);
$registros = file_get_contents('resultado2.txt');
file_put_contents('resultado2.txt', $registros.$results);
echo $results;

/* backup the db OR just a table */
//En la variable $talbes puedes agregar las tablas especificas separadas por comas:
//profesor,estudiante,clase
//O déjalo con el asterisco '*' para que se respalde toda la base de datos

function backup_tables($host,$user,$pass,$name,$tables = '*')
{
   
   $link = mysql_connect($host,$user,$pass);
   mysql_select_db($name,$link);
   
   //get all of the tables
   if($tables == '*')
   {
      $tables = array();
      $result = mysql_query('SHOW TABLES');
      while($row = mysql_fetch_row($result))
      {
         $tables[] = $row[0];
      }
   }
   else
   {
      $tables = is_array($tables) ? $tables : explode(',',$tables);
   }
   $return='';
   //cycle through
   foreach($tables as $table)
   {
      mysql_query ("SET NAMES 'utf8'");
      $result = mysql_query('SELECT * FROM '.$table);

      $num_fields = mysql_num_fields($result);
      
      $return.= 'DROP TABLE '.$table.';';
      $row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE '.$table));
      $return.= "\n\n".$row2[1].";\n\n";
      
    for ($i = 0; $i < $num_fields; $i++)
      {
         while($row = mysql_fetch_row($result))
         {
            $return.= 'INSERT INTO '.$table.' VALUES(';
            for($j=0; $j<$num_fields; $j++) 
            {
               $row[$j] = addslashes($row[$j]);
               $row[$j] = preg_replace("/\n+/","\\n",$row[$j]);
               if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
               if ($j<($num_fields-1)) { $return.= ','; }
            }
            $return.= ");\n";
         }
      }
      $return.="\n\n\n";
   }
   
   //save file
   $handle = fopen('db-backup-('.date("Y-m-d H:i:s").').sql','w+');
   fwrite($handle,$return);
   fclose($handle);
}


?>
