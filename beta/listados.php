<?php
	session_start();


	if(!isset($_REQUEST['seccion']) or $_REQUEST['seccion'] < 0 or $_REQUEST['seccion'] > 12){
		header('Location:/beta/home');
	}else{
		$seccion = $_REQUEST['seccion'];
	}
	
	// PARAMETROS BUSQUEDA
	$busqueda = '';
	$desde = '';
	$hasta = '';
	$tema = '';
	$distrito = '';
	$filtroAplicado = '';
	$seccionPaginado = $seccion;
	if($seccion == 12){
		$seccion = '';
		$filtroAplicado = 'busqueda';
		if(isset($_POST['busqueda'])) $busqueda = $_POST['busqueda'];
		if(isset($_POST['desde']) and $_POST['desde']!= '') $desde = $_POST['desde'];
		if(isset($_POST['hasta']) and $_POST['hasta']!= '') $hasta = $_POST['hasta'];
		if(isset($_POST['tema'])) $tema = $_POST['tema'];
		if(isset($_POST['distrito'])) $distrito = $_POST['distrito'];
	}
	
	// VERIFICACION LOGIN
	$idCliente = 0;
	if(isset($_SESSION['idCliente']))
		$idCliente = $_SESSION['idCliente'];
	
	// PAGINADO
	$noticiasPorPagina = 40;
	if(!isset($_POST['pagina_actual']))
		$pagina_actual = 0;
	else
		$pagina_actual = $_POST['pagina_actual'];
	
	$pagina_anterior = $pagina_actual - $noticiasPorPagina;
	$pagina_siguiente = $pagina_actual + $noticiasPorPagina;
	
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="icon" href="images/favicon.png" />
		<title>Appdate Legislativo</title>
		<script src="js/funciones.js" type="text/javascript"></script>
		<link rel='stylesheet'  href='css/estilos.css' type='text/css' />
	</head>
	<body>
		<?php 
			include_once('componentes.php');
			include_once('header.php');
			
			
			// NOTICIAS
			$url = 'https://esferapublica.com.ar/apprn.php';
			$ch = curl_init($url);
			$data = Array(
				'accion' => 'listadoNoticias',
				'params' => Array(
					'verQuery' => 0,
					'limit' => $pagina_actual,
					'cantLimit' => $noticiasPorPagina + 1,
					'busqueda' => $busqueda,
					'desde' => $desde,
					'hasta' => $hasta,
					'tema' => $tema,
					'distrito' => $distrito,
					'menu' => $seccion,
					'filtroAplicado' => $filtroAplicado,
					'favoritos' => 0,
					'cliente' => $idCliente,
					'origen' => 'WEB'
				)
			);
			curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$noticias = curl_exec($ch);
			curl_close($ch);
			
			$noticias = json_decode($noticias);
			if(isset($noticias->SN) and $noticias->SN != 'FIN'){
				echo $noticias->SN;
			}
			$noticiasListado = Array();
			echo "<div class='listadoNoticias'>";
			$i = 1;
			$cantNoticiasPaginaActual = count($noticias->noticias);
			foreach($noticias->noticias as $n){
				$params = Array(
					'id' => $n->id,
					'seccion' => iconoSeccionNoticia($n->secciones),
					'fecha' => str_replace('-', '/', $n->fecha),
					'legislatura' => $n->legislatura,
					'imagen' => $n->imagen,
					'tema' => $n->tema,
					'titulo' => $n->titulo,
					'contenido' => substr($n->contenido, 0, 150)
				);
				if($i <= $noticiasPorPagina)
					echo noticiaListadoHTML($params);
				$i++;
			}
			echo "</div>";
			
			// PUBLICIDAD
			include_once('colDer.php');
		?>

			<div class='paginado'>
				<form action='#' method='post'>
					<input type='hidden' name='seccion' value='<?php echo $seccionPaginado; ?>' />
					<input type='hidden' name='busqueda' value='<?php echo $busqueda; ?>' />
					<input type='hidden' name='desde' value='<?php echo $desde; ?>' />
					<input type='hidden' name='hasta' value='<?php echo $hasta; ?>' />
					<input type='hidden' name='tema' value='<?php echo $tema; ?>' />
					<input type='hidden' name='distrito' value='<?php echo $distrito; ?>' />
					<?php
						if($pagina_anterior >= 0)
							echo "<button type='submit' name='pagina_actual' value='".$pagina_anterior."' class='pagAnt'><img src='images/iconos/paginado.svg' alt='Anterior' /> Anterior</button>";
						if($cantNoticiasPaginaActual > $noticiasPorPagina)
							echo "<button type='submit' name='pagina_actual' value='".$pagina_siguiente."' class='pagSig'>Siguiente <img src='images/iconos/paginado.svg' alt='Siguiente' /></button>";
					?>
				</form>
			</div>
			
			
		<?php include_once('footer.php'); ?>
		<script>
			async function xxx(){
				let paramsListadoNoticia = JSON.stringify({
				accion: 'listadoNoticias',
				params: {
				  busqueda: '',
				  desde: '',
				  hasta: '',
				  tema: '',
				  distrito: '',
				  menu: '',
				  limit: 0,
				  cantLimit: 13,
				  filtroAplicado: '',
				  favoritos: 0,
				  cliente: 0
				}
				});

				const response = await fetch(
					'apprn.php', {
					method: 'POST',
					headers: {
					  Accept: 'application/json',
					  'Content-Type': 'application/json'
					},
					body: paramsListadoNoticia
				  }
				);
				const json = await response.json();
				console.log('JSON:',json);
				document.getElementById('cargando').remove();
			}
			//xxx();
		</script>
	</body>
</html>