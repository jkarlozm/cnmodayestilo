<?php
	include ('conexion/conexion.php');
	session_start();
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
          	<!--Contendido-->
          	<div class="container">
	          	<h1>Carrito de compras</h1>
				<h3>sus compras hasta el momento son:</h3>
				<?php
					if (isset($_POST['id_txt'])) {
						$id=$_POST['id_txt'];
						$n=$_POST['nombre'];
						$p=$_POST['precio'];
						$c=$_POST['cantidad'];
						$mi_carrito[] = array('id' => $id, 'n' => $n, 'p' => $p, 'c' => $c);
					}	

					if (isset($_SESSION['carrito'])) {
						$mi_carrito = $_SESSION['carrito'];
						if (isset($_POST['id_txt'])) {
							$id=$_POST['id_txt'];
							$n=$_POST['nombre'];
							$p=$_POST['precio'];
							$c=$_POST['cantidad'];
							$pos=-1;
							for ($i=0; $i < count($mi_carrito); $i++) { 
								if ($id == $mi_carrito[$i]['id']) {
									$pos=$i;
								}
							}
							if ($pos<>-1) {
								$cuanto=$mi_carrito[$pos]['c']+$c;
								$mi_carrito[$pos] = array('id' => $id, 'n' => $n, 'p' => $p, 'c' => $cuanto);
							}
							else{
								$mi_carrito[] = array('id' => $id, 'n' => $n, 'p' => $p, 'c' => $c);
							}
						}		
					}

					if (isset($mi_carrito)) {
							$_SESSION['carrito'] = $mi_carrito;
						}	
				?>
				<div class="table-responsive">
					<table class="table table-hover table-condensed">
						<thead>
							<th>Producto</th>
							<th>Cantidad</th>
							<th>Precio</th>
							<th>Subtotal</th>
						</thead>
						<tbody>
							<?php
								if (isset($mi_carrito)) {
									$total = 0;
									for ($i=0; $i < count($mi_carrito); $i++) { 
							?>
							<tr>
								<td><?php echo $mi_carrito[$i]['n']; ?></td>
								<td><?php echo $mi_carrito[$i]['c']; ?></td>
								<td><?php echo $mi_carrito[$i]['p']; ?></td>
								<?php
									$Subtotal=$mi_carrito[$i]['p']*$mi_carrito[$i]['c'];
									$total = $total+$Subtotal;
								?>
								<td><?php echo "$ ".$Subtotal;?></td>
							</tr>
							<?php
									}
								}
							?>
							<tr>
								<td></td>
								<td></td>
								<td>total</td>
								<td><?php if(isset($total)) echo "$ ".$total; ?></td>
							</tr>						
						</tbody>
					</table>
				</div>				
				<a href="index.php" class="btn btn-danger"><span class="glyphicon glyphicon-hand-left"></span> Regresar</a>
				<br/>
				<br/>
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