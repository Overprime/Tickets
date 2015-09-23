<?php  
$carpeta="files/";
opendir($carpeta);
$destino=$carpeta.$_FILES['foto']['name'];

copy($_FILES['foto']['tmp_name'], $destino);

//echo "Archivo subido exitosamente";
$nombre=$_FILES['foto']['name'];

$Ruta="http://192.168.1.27/ticket/files/$nombre";


?>

<?php 
include('bd/conexion.php');
$Usuario=$_POST['usuario'];
$Empresa=$_POST['empresa'];
$Tipo=$_POST['tipo'];
$Detalle=eregi_replace("[\n|\r|\n\r]",' ',$_POST['detalle']);
$Correo=$_POST['correo'];
$horasistema=date('H:i');
$Estado='01';

/*Realizamos la consulta para  generar el 
codigoautomatico*/
$link=Conectarse();
$sql="SELECT t.tck_id,tck_usuario,concat(u.nombre,' ',u.apellido) as fullname,
  case t.tck_empresa
   when 1 then 'ROCKDRILL'
   when 2 then 'CODRISE'
   when 3 then 'OVERPRIME'
   when 4  then'ROCK DRILL MINING S.A DE CV'
   else 'NO EXISTE LA EMPRESA' end as 'det_empresa',
   	ta.descripcion
 from prueba.ticket  as t
inner join webnets_rdgdb.usuario as u on 
t.tck_usuario=u.idusuario INNER JOIN prueba.tipoactividad as ta ON 
t.tck_tipo=ta.codigoactividad  where tck_usuario='$Usuario'
 order by  t.tck_id desc limit 1;

";
$result       =mysql_query($sql,$link);
if ($row      =mysql_fetch_array($result)) {
mysql_field_seek($result,0);
while ($field =mysql_fetch_field($result)) {

}do {
/*Almacenamos los  datos en variables*/
$Ticket=$row[0];
$Idusuario=$row[1];
$Fullname=$row[2];
$Det_empresa=$row[3];
$Det_actividad=$row[4];
} while ($row =mysql_fetch_array($result));

}else { 
//echo "No hay registros para mostrar";
} 
?>

<?php 

$sql="SELECT tck_id from prueba.ticket order  by  tck_id  desc limit 1;
";
$result       =mysql_query($sql,$link);
if ($row      =mysql_fetch_array($result)) {
mysql_field_seek($result,0);
while ($field =mysql_fetch_field($result)) {

}do {
/*Almacenamos los  datos en variables*/
$Idticket=$row[0]+1;

} while ($row =mysql_fetch_array($result));

}else { 
//echo "No hay registros para mostrar";
} 
?>





<?php 

/*Insertamos los nuevos Datos*/

$Sql ="INSERT INTO prueba.ticket(tck_empresa,tck_detalle,tck_fecha,
tck_usuario,tck_estado,tck_tipo,tck_asunto) VALUES('$Empresa','$Detalle',now(),
'$Usuario','$Estado','$Tipo','$Ruta')";

$result=mysql_query($Sql);

if (!$result){echo "Error al guardar";}

else{

header('Location: http://arteamarillo.com/ticket/enviar3.php?usuario='.urlencode($Fullname).'&empresa='.urldecode($Det_empresa).
'&tipo='.urlencode($Det_actividad).'&detalle='.urlencode($Detalle).'&idusuario='.urlencode($Usuario).'&idticket='.$Idticket.
'&correo='.urlencode($Correo).'&horasistema='.urlencode($horasistema));
}


?>
