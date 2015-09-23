<script type="text/javascript" language="javascript"
src="listado/proveedor.js"></script>

<div class="container">
<div class="row clearfix">
<div class="col-md-12 column">
<div class="table-responsive">
<table class="table table-bordered table-condensed" 
id="proveedor">
<?php require_once('../bd/conexion.php');
$link=  Conectarse();
$listado=  mysql_query("SELECT * FROM maeprov ORDER BY idmaeprov",$link);
?>
<thead>
<tr>
<th>ID</th>
<th>CODIGO</th>
<th>RUC</th>
<th>ALIAS</th>
<th>RAZON SOCIAL</th>
<th>DIRECCION</th>
<th>REPRESENTANTE</th>
<th>TELEFONO</th>
</tr>
</thead>
<tbody>
<?php


while($reg= mysql_fetch_array($listado))
{
?>
<tr class="active">
<td><?php echo $reg[idmaeprov]; ?></td>
<td><?php echo $reg[codigo]; ?></td>
<td><?php echo $reg[ruc]; ?></td>
<td><?php echo $reg[alias]; ?></td>
<td><?php echo $reg[nombre]; ?></td>
<td><?php echo $reg[direccion]; ?></td>
<td><?php echo $reg[representante]; ?></td>
<td><?php echo $reg[telefono]; ?></td>
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