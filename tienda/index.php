<?php 
	include ('conexion/conexion.php');
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="es"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang="es"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="es"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="es"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Christiane  Nakad | De la moda lo que te acomoda</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/bootstrap.min.css">        
        <link rel="stylesheet" href="../css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="../css/main.css">
        <link rel="stylesheet" type="text/css" href="../css/icomoon.css">
        <script src="../js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>
	<body>
		<!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <div class="contenedor">
        	<!--menu-->
        	<header>
	            <nav class="navbar app-navbar">
	                <div class="container">
	                    <div class="navbar-header">
	                        <button class="navbar-toggle" data-toggle="collapse" data-target="#menu">
	                            <span class="icon-bar app-icon"></span>
	                            <span class="icon-bar app-icon"></span>
	                            <span class="icon-bar app-icon"></span>
	                        </button>
	                        <a href="../index.html" class="navbar-brand app-link"><img src="../img/cn.jpg" class="img-responsive center-block"></a>
	                    </div>
	                    <div class="collapse navbar-collapse" id="menu">
	                        <ul class="nav navbar-nav navbar-right app-nav">
	                            <li><a href="../tienda/index.php">Shop</a></li>
	                            <li><a href="../Nosotros.html">Nosotros</a></li>
	                            <li><a href="../tiendas.html">Tiendas</a></li>
	                            <li><a href="#">Contacto</a></li>
	                        </ul>
	                    </div>
	                </div>
	            </nav>
          	</header>
          	<!--contenido-->
          	<div class="container">
          		<form action="" method="post">
          			<div class="form-group">						
						<input type="text" name='buscar' placeholder="Buscar" class="form-control">
					</div>
					<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span> Buscar</button>					
				</form>
				<br>
				<a href="carrito.php" class="btn btn-success"><span class="glyphicon glyphicon-shopping-cart"></span> Ver Carrito</a>
				<br>
				<br>
				<div class="table-responsive">
					<table class="table table-hover table-condensed">
						<thead>
							<th>id</th>
							<th>Imagen</th>
							<th>Nombre</th>
							<th>Descripcion</th>
							<th>Precio</th>
							<th>Stock</th>
							<th>Fecha</th>
							<th>Agregar</th>
						</thead>
						<?php
							$consulta = mysql_query("SELECT * FROM producto");
							if (isset($_POST['buscar'])) {
							 	$consulta = mysql_query("SELECT * FROM producto WHERE nombre like '%".$_POST['buscar']."%'");
							 } 			
							while($fila=mysql_fetch_array($consulta)) {
								$id= $fila[0];
								$Imagen= $fila[5];
								$Nombre= $fila[1];
								$Descripcion= $fila[2];
								$Precio= $fila[3];
								$Stock= $fila[4];
								$Fecha= $fila[6];
								//$Agregar='<a href="carrito.php?id='.$fila[0].'" title="'.$fila[0].'">Agregar</a>'
						?>
						<tbody>
							<td><?php echo $id; ?></td>
							<td><img width='50px' src="<?php echo $Imagen; ?>"></td>
							<td><?php echo $Nombre; ?></td>
							<td><?php echo $Descripcion; ?></td>
							<td><?php echo $Precio; ?></td>
							<td><?php echo  $Stock; ?></td>
							<td><?php echo  $Fecha; ?></td>
							<td>
								<form action="carrito.php" method="POST">
									<input type="hidden" name="id_txt" value="<?php echo $id; ?>">
									<input type="hidden" name="nombre" value="<?php echo $Nombre; ?>">
									<input type="hidden" name="precio" value="<?php echo $Precio; ?>">
									<input type="hidden" name="cantidad" value="<?php echo $Stock; ?>">
									<button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-usd"></span> Comprar</button>								
								</form>
							</td>
						</tbody>
						<?php } ?>
					</table>
				</div>				
          	</div>          	
			<!--Pie-->
          	<footer class="app-footer">
            	<div class="app-empresa">
              		<img src="../img/logo.png">
              		<p>De la moda lo que te acomoda</p>              
            	</div>            
            	<h3>Seamos amigos</h3>
            	<span class="icon-facebook app-icon1"></span>
            	<span class="icon-twitter app-icon1"></span>
            	<span class="icon-google-plus app-icon1"></span>
            	<p>Siguenos en nuestras redes sociales y enterate de las novedades que tenemos para ti.</p>              
          	</footer>
        </div>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="../js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

        <script src="../js/vendor/bootstrap.min.js"></script>

        <script src="../js/main.js"></script>	
	</body>
</html>