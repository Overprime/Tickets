<script type="text/javascript" language="javascript"
src="listado/desarrollo.js"></script>

<div class="container">
<div class="row clearfix">
<div class="col-md-12 column">
<div class="table-responsive">
<table class="table table-bordered table-condensed" 
id="desarrollo">
<?php require_once('../bd/conexion.php');
	$fecha=date("Y-m-d");
$link=  Conectarse();
$listado=  mysql_query("SELECT ate_id,ate_tck_id,user.nombres,
concat(u.nombre,' ',u.apellido) as fullname,
ar.nombre,emp.nombreempresa,ta.descripcion,
t.tck_detalle,ate_horaasig,est.est_descripcion,ate_detalle,ate_horaestado from atencion as a  inner join ticket  as t on
a.ate_tck_id=t.tck_id  inner join   webnets_rdgdb.usuario as  u  on
t.tck_usuario=u.idusuario  inner join webnets_rdgdb.area as ar on
u.area_idarea=ar.idarea inner join usuario as user on 
a.ate_usuario=user.codigo inner join  empresa as emp on
t.tck_empresa=emp.codigoempresa inner join estado as est on
a.ate_estado=est.est_id  inner join tipoactividad as ta on 
t.tck_tipo=ta.codigoactividad  where a.ate_estado like '02'",$link);
?>
<thead>
<tr>
<th>TCK</th>
<th>RESP.</th>
<th>USUARIO</th>
<th>EMPRESA</th>
<th>ÁREA</th>
<th>TIPO</th>
<th>DETALLE</th>
<th>HORA INICIO</th>
<th>HORA FIN</th>
</tr>
</thead>
<tbody>
<?php


while($reg= mysql_fetch_array($listado))
{
?>
<tr class="active">
<td><?php echo $reg[ate_tck_id]; ?></td>
<td><?php echo $reg[nombres]; ?></td>
<td><?php echo $reg[fullname]; ?></td>
<td><?php echo $reg[nombreempresa]; ?></td>
<td><?php echo $reg[nombre]; ?></td>
<td><?php echo $reg[descripcion]; ?></td>
<td><?php echo $reg[tck_detalle]; ?></td>
<td><?php echo $reg[ate_horaasig]; ?></td>
<td><?php echo $reg[ate_horaestado]; ?></td>
</tr>

<?php 
}
?>
<tbody>
</table>
</div>
</div>
</div>	
</div>