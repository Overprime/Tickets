<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<?php  include('header.php');?>
<?php include('bd/conexion.php'); ?>
<?php   $Usuario=$_REQUEST['usuario']; ?>
</head>
<body>

<?php 

/*Realizamos la consulta para  generar el 
codigoautomatico*/

$link=Conectarse();
$sql="SELECT t.tck_id,tck_usuario,concat(u.nombre,' ',u.apellido) as fullname from prueba.ticket  as t
inner join webnets_rdgdb.usuario as u on 
t.tck_usuario=u.idusuario where tck_usuario='$Usuario' order by  t.tck_id desc limit 1;

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



} while ($row =mysql_fetch_array($result));

}else { 
//echo "No hay registros para mostrar";
} 





?>
<div class="container">
<div class="row clearfix">
<div class="col-md-2 column">
</div>
<div class="col-md-3 column">
<img alt="140x140" src="img/ticket.png" class="img-responsive" />
</div>
<div class="col-md-3 column">
<p>  </p>
<address> <strong><label class="text-primary">¡¡REGISTRO EXITOSO!!</label></strong>
<br /> <label class="text-success">Muchas gracias </label>
<label class="text-danger"> <?php echo "$Fullname";?></label> <br /><label class="text-warning">
El Ticket <label class="text-danger"> <?php echo "$Ticket"; ?> </label> fue registrado exitosamente, en unos minutos
nos contactaremos contigo para poder resolver su inconveniente.</label><br />
<abbr title="Phone"></abbr> </address>
<p><a href="registrar" class="btn btn-success btn-lg">Registra otro ticket</a></p>

</div>
<div class="col-md-3 column">
</div>
</div>
<div class="row clearfix">
<div class="col-md-3 column">
</div>
<div class="col-md-6 column">
</div>
<div class="col-md-3 column">
</div>
</div>
</div>

</body>
</html>