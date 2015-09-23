<?php  
$carpeta="files/";
opendir($carpeta);
$destino=$carpeta.$_FILES['foto']['name'];

copy($_FILES['foto']['tmp_name'], $destino);

echo "Archivo subido exitosamente";
$nombre=$_FILES['foto']['name'];
echo "<img src=\"files/$nombre\">";
?>












