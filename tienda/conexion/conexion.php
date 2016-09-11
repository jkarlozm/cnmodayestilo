<?php
	$conexion = mysql_connect('localhost', 'root', '') or die ('No hay conexion a la base de datos');
	$db=mysql_select_db('tienda',$conexion) or die ('No existe la base de datos');
?>