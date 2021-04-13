<?php
	session_start();


	if(!isset($_REQUEST['noticia']))
		header('Location:/beta/home');
	
	$ROOT = "../../";
	//$ROOT = "";
	$ID = $_REQUEST['noticia'];
	$idCliente = 0;
	if(isset($_SESSION['idCliente']))
		$idCliente = $_SESSION['idCliente'];
	
	// NOTICIA
	include_once('componentes.php');
	
	$url = 'https://esferapublica.com.ar/apprn.php';
	$ch = curl_init($url);
	$data = Array(
		'accion' => 'noticiaInterna',
		'params' => Array(
			'idNoticia' => $ID,
			'idCliente' => $idCliente,
			'origen' => 'WEB'
		)
	);
	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$noticia = curl_exec($ch);
	curl_close($ch);
	
	$n = json_decode($noticia);
	
	$FN = new Funciones;
	$fecha = $FN->fechaBdToNormal($n->fecha);
	
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="icon" href="images/favicon.png" />
		<title>Appdate Legislativo</title>
		<script src="<?php echo $ROOT;?>js/funciones.js" type="text/javascript"></script>
		<link rel='stylesheet'  href='<?php echo $ROOT;?>css/estilos.css' type='text/css' />
		
		<!-- REDES -->
		<meta property="og:url" content="http://appdatelegislativo.com.ar/<?php echo $_SERVER["REQUEST_URI"]; ?>" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="<?php echo strtoupper($n->tema).' - '.$n->titulo; ?>" />
		<meta property="og:description" content="<?php echo str_replace('"',"'",strip_tags($n->texto)); ?>" />
		<?php 
			if(isset($n->imagen) and $n->imagen != ''){
				echo "<meta property='og:image' content='".$n->imagen."' />";
			}
		?>
		<meta name="twitter:site" value="@eppw"/>
		<meta name="twitter:creator" content="@eppw">
		<meta name="twitter:description" content="<?php echo str_replace('"',"'",strip_tags($n->texto)); ?>"/>
		<?php 
			if(isset($n->imagen) and $n->imagen != ''){
				echo "<meta name='twitter:image' content='".$n->imagen."' />";
			}
		?>
		<meta name="twitter:title" content="<?php echo strtoupper($n->tema).' - '.$n->titulo; ?>"/>
	</head>
	<body>
		<?php 
			include_once('header.php');
		?>
			<div class='contenedorNoticiaInterna'>
				<div class='fecha'><?php echo $fecha; ?></div>
				<div class='tema'><?php echo $n->tema; ?></div>
				<div class='titulo'><?php echo $n->titulo; ?></div>
				<div class='datos'>
					<?php
						if($n->secciones != '')
							echo "SECCIONES: <span>".$n->secciones."</span> | ";
						if($n->distrito != '')
							echo "DISTRITO: <span>".$n->distrito."</span> | ";
						if($n->legislatura != '')
							echo "OTRO: <span>".$n->legislatura."</span> | ";
						if($n->personas != '')
							echo "EN ESTA NOTA: <span>".$n->personas."</span>";
					?>
				</div>
				<div class='imagen'>
					<div class='contImgNoticia'>
						<div class='contIconitoListadoNoticia'>
							<img src='<?php echo $ROOT."images/iconos/secciones/".iconoSeccionNoticia($n->secciones); ?>' alt='' class='iconitoListadoNoticia' />
						</div>
						<img src='<?php echo $n->imagen; ?>' alt='<?php echo $n->tema.' - '.$n->titulo; ?>' />
					</div>
				</div>
				<div class='compartir'>
					<a href='https://www.facebook.com/sharer/sharer.php?kid_directed_site=0&sdk=joey&u=<?php echo urlencode($_SERVER['SCRIPT_URI']); ?>&display=popup&ref=plugin&src=share_button' target='_blank'>
						<img src='<?php echo $ROOT;?>images/iconos/compartir/fb.png' alt='Facebook' />
					</a>
					<a href='https://twitter.com/share?url=<?php echo urlencode($_SERVER['SCRIPT_URI']); ?>' target='_blank'>
						<img src='<?php echo $ROOT;?>images/iconos/compartir/tw.png' alt='Twitter' />
					</a>
					<a href='https://api.whatsapp.com/send?text=<?php echo urlencode($_SERVER['SCRIPT_URI']); ?>' target='_blank'>
						<img src='<?php echo $ROOT;?>images/iconos/compartir/wp.png' alt='WhatsApp' />
					</a>
				</div>
				<div class='texto'>
					<?php 
						if($idCliente == 0){
							$t = explode('</p>', $n->texto);
							
							if(count($t) == 1 or (count($t) == 2 and $t[1] == '')){
								$t = explode('<br>', $n->texto);
								$t = explode('</br>', $t[0]);
								$t = explode('<br/>', $t[0]);
								$t = explode('<br />', $t[0]);
							}
							
							echo str_replace('<p>', '', $t[0]);
						}else{
							echo $n->texto;
						}
					?>
				</div>
				<?php
					if($n->adjuntos != ''){
						echo "<div class='adjuntos'><h2>Adjuntos:</h2>".$n->adjuntos."</div>";
					}
				?>
				<?php
					if($idCliente == 0){
						echo "<div class='infoNoticiaInterna' onclick='masInfo();'>+ Info</div>";
					}
				?>
				
			</div>			
		
		<?php
			
			// PUBLICIDAD
			include_once('colDer.php');
		
		
			include_once('footer.php'); 
		?>
		<script>
			function masInfo(){
				document.body.scrollTop = 0;
				document.documentElement.scrollTop = 0;
				oFunc.fnMuestraMenuContacto();
			}
		</script>
	</body>
</html>