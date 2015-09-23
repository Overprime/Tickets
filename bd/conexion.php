<?php

  
function Conectarse()

{

if(!($link=mysql_connect("192.168.1.28","root","sistemas")))
{

echo"Error conectando la base de datos";

	exit();
}
  if (!mysql_select_db("prueba",$link)) 
  {

  	echo"Error seleccionando la base de datos";

  	exit();
}

return $link;

}


  ?>