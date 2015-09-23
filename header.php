<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<title>TICKET</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<script language=”JavaScript”>

function cerrar() {
window.open(“”,”_parent”,””);
var ventana = window.self;
ventana.opener = window.self;
ventana.close();
}

</script>


<!-- Inicio Script convertir en mayuscula al ingresar	-->
<script language    ="JavaScript" type="text/javascript" src="ajax.js"></script>

<script language    =""="JavaScript">
function conMayusculas(field) {
field.value         = field.value.toUpperCase()
}
</script>
<!-- Fin Script convertir en mayuscula al ingresar-->
<!--link rel="stylesheet/less" href="less/bootstrap.less" type="text/css" /-->
<!--link rel="stylesheet/less" href="less/responsive.less" type="text/css" /-->
<!--script src="js/less-1.3.3.min.js"></script-->
<!--append ‘#!watch’ to the browser URL, then refresh the page. -->

<link href="/ticket/css/bootstrap.min.css" rel="stylesheet">
<link href="/ticket/css/style.css" rel="stylesheet">

<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<![endif]-->

<!-- Fav and touch icons -->
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="/ticket/img/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="/ticket/img/apple-touch-icon-114-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="/ticket/img/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="/ticket/img/apple-touch-icon-57-precomposed.png">
<link rel="shortcut icon" href="/ticket/img/favicon.ico">

<script type="text/javascript" src="/ticket/js/jquery.min.js"></script>
<script type="text/javascript" src="/ticket/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/ticket/js/scripts.js"></script>
</head>

<body>
<div class="container">
<div class="row clearfix">
<div class="col-md-12 column">
<nav class="navbar navbar-default" role="navigation">
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse"
 data-target="#bs-example-navbar-collapse-1">
  <span class="sr-only">Toggle navigation</span>
  <span class="icon-bar"></span><span class="icon-bar">
  	
  </span><span class="icon-bar"></span>
  </button> <a class="navbar-brand" href="/ticket/home">
  <label class="text-primary">Inicio</label></a>
</div>

<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
<ul class="nav navbar-nav">
<li>
<a href="/ticket/registrar">
<label class="text-success">REGISTRO DE TICKETS</label></a>
</li>
<li>
<a href="/ticket/consulta/desarrollo"><label class="text-warning">TICKETS EN DESARROLLO</label></a>
</li>
<li>
<a href="/ticket/consulta/solucionado">
<label class="text-danger">TICKETS SOLUCIONADO DEL DIA  <?PHP  echo "(";echo date('d-m-Y'); echo ")";?> </label></a>
</li>

</ul>

<ul class="nav navbar-nav navbar-right">

</ul>
</div>

</nav>
</div>
</div>

</div>
</body>
</html>
