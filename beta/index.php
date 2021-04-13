<?php
	session_start();
	include_once('login.php');
	
	// VERIFICACION LOGIN
	$idCliente = 0;
	if(isset($_SESSION['idCliente']))
		$idCliente = $_SESSION['idCliente'];
	
	// PAGINADO
	$noticiasPorPagina = 40;
	if(!isset($_POST['pagina_actual']))
		$pagina_actual = 4;
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
		
		
			// NOTICIAS ROTADOR
			$url = 'https://esferapublica.com.ar/apprn.php';
			$ch = curl_init($url);
			$data = Array(
				'accion' => 'listadoNoticias',
				'params' => Array(
					'verQuery' => 0,
					'limit' => 0,
					'cantLimit' => 4,
					'busqueda' => '',
					'desde' => '',
					'hasta' => '',
					'tema' => '',
					'distrito' => '',
					'menu' => '',
					'filtroAplicado' => '',
					'favoritos' => 0,
					'cliente' => $idCliente,
					'origen' => 'WEB'
				)
			);
			curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$noticiasRot = curl_exec($ch);
			curl_close($ch);
			
			$noticiasRot = json_decode($noticiasRot);
			
			$noticiasRotador = Array();
			$i = 0;
			foreach($noticiasRot->noticias as $n){
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
				$noticiasRotador[$i] = noticiaListadoHTML($params);
				$i++;
			}
			
			
			// NOTICIAS LISTADO GENERAL
			$url = 'https://esferapublica.com.ar/apprn.php';
			$ch = curl_init($url);
			$data = Array(
				'accion' => 'listadoNoticias',
				'params' => Array(
					'verQuery' => 0,
					'limit' => $pagina_actual,
					'cantLimit' => $noticiasPorPagina + 1,
					'busqueda' => '',
					'desde' => '',
					'hasta' => '',
					'tema' => '',
					'distrito' => '',
					'menu' => '',
					'filtroAplicado' => '',
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
			
			$noticiasListado = Array();
			$i = 0;
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
				$noticiaListado[$i] = noticiaListadoHTML($params);
				$i++;
			}
		?>
		
		<div class='contYoutube'>
			<div class='colTextos'>
				<div class='titulo'>Sesiones en vivo Honorable Senado de la Nación Argentina.</div>
				<div class='texto'>SENADO TV EN VIVO.<br/>SEÑAL EMITIDA POR LA DIRECCIÓN GENERAL DE COMUNICACIÓN INSTITUCIONAL - SENADO TV.</div>
			</div>
			<div class='colVideo'>
				<iframe src="https://www.youtube.com/embed/8c-X_xP-w7E" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			</div>
		</div>
		<div class='noticiasHome'>
			<div class='ultimaNoticia' id='ultimaNoticia'>
				<?php echo $noticiasRotador[0]; ?>
			</div>
			<div class='noticias234' id='noticias234'>
				<?php 
					echo $noticiasRotador[1];
					echo $noticiasRotador[2];
					echo $noticiasRotador[3];
				?>
			</div>
		</div>
		<div class='listadoNoticias'>
			<?php 
				for($i = 0; $i < 40; $i++){
					echo $noticiaListado[$i];
				}
			?>
		</div>
		<?php 
			//PUBLICIDAD 
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
			var intervaloRotacion = setInterval(rotador, 10000);
			
			function rotador(){
				transparenciaRotador();
				let cambio = setTimeout(rotacion, 400);				
				let fadeIn = setTimeout(opacidadRotador, 400);
			}
			function rotacion(){
				let primeraNoticia = document.getElementById("ultimaNoticia").firstElementChild;
				let segundaNoticia = document.getElementById("noticias234").firstElementChild;
				let primeraNoticiaClon = primeraNoticia.cloneNode(true);
				let segundaNoticiaClon = segundaNoticia.cloneNode(true);
				
				primeraNoticia.remove();
				segundaNoticia.remove();

				document.getElementById("ultimaNoticia").append(segundaNoticiaClon);
				document.getElementById("noticias234").append(primeraNoticiaClon);
			}
			function transparenciaRotador(){
				document.getElementById("ultimaNoticia").style.opacity = 0
			}
			function opacidadRotador(){
				document.getElementById("ultimaNoticia").style.opacity = 1
			}
			
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
		</script>
	</body>
</html>