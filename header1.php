
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Bootstrap 3, from LayoutIt!</title>

<meta name="description" content="Source code generated using layoutit.com">
<meta name="author" content="LayoutIt!">

<link href="/ticket/css/bootstrap.min.css" rel="stylesheet">
<link href="/ticket/css/style.css" rel="stylesheet">
<!-- Inicio Script convertir en mayuscula al ingresar	-->
<script language    ="JavaScript" type="text/javascript" src="ajax.js"></script>

<script language    =""="JavaScript">
function conMayusculas(field) {
field.value         = field.value.toUpperCase()
}
</script>
</head>
<body>

<div class="container">
<div class="row clearfix">
<div class="col-md-12 column">
<div class="container-fluid">
<div class="row">
<div class="col-md-12">
<ul class="nav nav-tabs">
<li class="active">
<a href="/ticket/home">Home</a>
</li>
<li>
<a href="/ticket/registrar">REGISTRO DE TICKETS</a>
</li>
<li >
<a href="/ticket/consulta/desarrollo">TICKETS EN DESARROLLO</a>
</li>
<li >
<a href="/ticket/consulta/solucionado">TICKETS SOLUCIONADOS
<?php echo '('. date('d-m-Y').')'; ?></a>
</li>
<li class="dropdown pull-right">
<a href="#" data-toggle="dropdown" class="dropdown-toggle">
<i class="glyphicon glyphicon-user text-success"></i> 
<?php echo $_SERVER['REMOTE_ADDR'].' ';?><strong class="caret"></strong></a>
<ul class="dropdown-menu">
<li>
<a href="#">SALIR</a>
</li>


</ul>
</li>
</ul>
</div>
</div>
</div>
</div>
</div>
</div>

<script src="/ticket/js/jquery.min.js"></script>
<script src="/ticket/js/bootstrap.min.js"></script>
<script src="/ticket/js/scripts.js"></script>
</body>
</html>