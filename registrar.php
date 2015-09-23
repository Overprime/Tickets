 <!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<title>REGISTRAR TICKET</title>
<?php include('header1.php');?>
<?php include('bd/conexion.php');?>
<link rel                                  ="stylesheet" href="/ticket/css/jquery-ui.css">
<script src                                ="/ticket/js/jquery-1.10.2.js"></script>
<script src                                ="/ticket/js/jquery-ui.js"></script>
<link rel                                  ="stylesheet" href="/ticket/css/style.css">
<style>
.custom-combobox {
position: relative;
display: inline-block;
}
.custom-combobox-toggle {
position: absolute;
top: 0;
bottom: 0;
margin-left: -1px;
padding: 0;
font-size: 8px

}
.custom-combobox-input {
margin: 0;
padding: 5px 10px;
width: 420px;
font-size: 8px
}
</style>
<script>
(function( $ ) {
$.widget( "custom.combobox", {
_create: function() {
this.wrapper                               = $( "<span>" )
.addClass( "custom-combobox" )
.insertAfter( this.element );

this.element.hide();
this._createAutocomplete();
this._createShowAllButton();
},

_createAutocomplete: function() {
var selected                               = this.element.children( ":selected" ),
value                                      = selected.val() ? selected.text() : "";

this.input                                 = $( "<input>" )
.appendTo( this.wrapper )
.val( value )
.attr( "title", "" )
.addClass( "custom-combobox-input ui-widget ui-widget-content ui-state-default ui-corner-left" )
.autocomplete({
delay: 0,
minLength: 0,
source: $.proxy( this, "_source" )
})
.tooltip({
tooltipClass: "ui-state-highlight"
});

this._on( this.input, {
autocompleteselect: function( event, ui ) {
ui.item.option.selected                    = true;
this._trigger( "select", event, {
item: ui.item.option
});
},

autocompletechange: "_removeIfInvalid"
});
},

_createShowAllButton: function() {
var input                                  = this.input,
wasOpen                                    = false;

$( "<a>" )
.attr( "tabIndex", -1 )
.attr( "title", "Show All Items" )
.tooltip()
.appendTo( this.wrapper )
.button({
icons: {
primary: "ui-icon-triangle-1-s"
},
text: false
})
.removeClass( "ui-corner-all" )
.addClass( "custom-combobox-toggle ui-corner-right" )
.mousedown(function() {
wasOpen                                    = input.autocomplete( "widget" ).is( ":visible" );
})
.click(function() {
input.focus();

// Close if already visible
if ( wasOpen ) {
return;
}

// Pass empty string as value to search for, displaying all results
input.autocomplete( "search", "" );
});
},

_source: function( request, response ) {
var matcher                                = new RegExp( $.ui.autocomplete.escapeRegex(request.term), "i" );
response( this.element.children( "option" ).map(function() {
var text                                   = $( this ).text();
if ( this.value && ( !request.term || matcher.test(text) ) )
return {
label: text,
value: text,
option: this
};
}) );
},

_removeIfInvalid: function( event, ui ) {

// Selected an item, nothing to do
if ( ui.item ) {
return;
}

// Search for a match (case-insensitive)
var value                                  = this.input.val(),
valueLowerCase                             = value.toLowerCase(),
valid                                      = false;
this.element.children( "option" ).each(function() {
if ( $( this ).text().toLowerCase()        === valueLowerCase ) {
this.selected                              = valid = true;
return false;
}
});

// Found a match, nothing to do
if ( valid ) {
return;
}

// Remove invalid value
this.input
.val( "" )
.attr( "title", value + " didn't match any item" )
.tooltip( "open" );
this.element.val( "" );
this._delay(function() {
this.input.tooltip( "close" ).attr( "title", "" );
}, 2500 );
this.input.autocomplete( "instance" ).term = "";
},

_destroy: function() {
this.wrapper.remove();
this.element.show();
}
});
})( jQuery );


$(function() {
$( "#combobox" ).combobox();
$( "#toggle" ).click(function() {
$( "#combobox" ).toggle();
});
});
</script>

<script>
function validar(f){
f.enviar.value="POR FAVOR, ESPERE UN MOMENTO SU TICKET ESTA  SIENDO PROCESADO :D";
f.enviar.disabled=true;
f.usuario.value=(f.usuario.value=="")?"Anónimo":f. usuario.value;

return true}
</script>

</head>
<body>
<div class="container">
<div class="row clearfix">
<div class="col-md-3 column">
</div>
<div class="col-md-5 column">
<h3 class="text-success text-center">REGISTRO DE TICKET</h3>
<form role="form" method="POST" action="procesar.php"
enctype="multipart/form-data" onsubmit="return validar(this)">
<div class="form-group">
<div class    ="ui-widget">
<label class  ="text-primary">INGRESE SU NOMBRE:</label> <br>
<select name  ="usuario"  id="combobox"  required autofocus>
<option value ="">SELECCIONE EL USUARIO</option>
<?php
$link=Conectarse();
$Sql ="SELECT idusuario,concat(nombre,' ',apellido)as fullname FROM 
webnets_rdgdb.usuario order by nombre";

$result=mysql_query($Sql) or die(mysql_error());
while ($row=mysql_fetch_array($result)) {
?>
<option class="text-primary" value="<?php echo $row['idusuario']?>">
<?php echo $row['fullname']?></option>
<?php }?>
</select>

</div>

</div>
<div class="form-group">
<label  class="text-primary">EMPRESA:</label>
<select name="empresa" id="" class="form-control" required> 
<option value="">[SELECCIONE]</option>
<?php
$link=Conectarse();
$Sql ="SELECT idempresa,edescripcion FROM webnets_rdgdb.empresa";

$result=mysql_query($Sql) or die(mysql_error());
while ($row=mysql_fetch_array($result)) {
?>
<option class="text-success" value="<?php echo $row['idempresa']?>">
<?php echo $row['edescripcion']?></option>
<?php }?>
</select>
</div>
<div class="form-group">
<label class="text-primary">INGRESE SU CORREO ELECTRONICO CORPORATIVO:</label>
<input type="email" name="correo" class="form-control" 
placeholder="Ejemplo: josue.nunez@rockdrillgroup.com"   required>
</div>


<div class="form-group">
<label class="text-primary" >TIPO:</label>
<select class="form-control"name="tipo" required REQUIRED>
<option value="">[SELECCIONE]</option>
<?php
$link=Conectarse();
$Sql ="SELECT codigoactividad,descripcion FROM prueba.tipoactividad  WHERE estado='ACTIVO'
order by descripcion";

$result=mysql_query($Sql) or die(mysql_error());	
while ($row=mysql_fetch_array($result)) {
?>
<option class="text-success" value="<?php echo $row['codigoactividad']?>">
<?php echo $row['descripcion']?></option>
<?php }?>
</select>
</div>

<div class="form-group">
<label  class="text-primary" >INGRESE EL DETALLE DE SU INCONVENIENTE:</label>
<textarea name="detalle" class="form-control"  rows="3"  
placeholder="Ingrese  sus comentarios detallando especificamente
  su inconveniente o sugerencia."  onchange="conMayusculas(this);" required>
</textarea>
</div>

<div class="form-group">
<label  class="text-primary" >ADJUNTE  UN ARCHIVO PARA  UN MEJOR ANÁLISIS:.</label>
<input type="file" name="foto" class="form-control" id="">

</div>
<center>
<input type="submit" name="enviar" class="btn btn-primary btn-lg btn-block" value="Registrar"/>
</center>

</form>
</div>
<div class="col-md-4 column">
</div>
</div>
</div>
</body>
</html>