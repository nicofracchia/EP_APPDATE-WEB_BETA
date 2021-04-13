<?php
	/** ***** PREVENT CACHE ***** **/
	header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
	header("Cache-Control: post-check=0, pre-check=0", false);
	header("Pragma: no-cache");
	/** ***** ************* ***** **/
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta http-equiv="expires" content="Sun, 01 Jan 2014 00:00:00 GMT"/>
	<meta http-equiv="pragma" content="no-cache" />
	<meta charset="utf-8">
	<link href="css/estilos.css" rel="stylesheet">
	<title> Appdate Legislativo </title>
</head>

<body class="fdo">
	<div class="contenedor">
		<div class="phoneFrame">
			<div class='encTel'><img src='img/soloHead.png' /></div>
			<div class='contenedorNoticias'>
				<table>
					<?php
						$conexion = mysqli_connect('esferapublica.com.ar', 'prowebsolutions', '123456321asd', 'appdate') or die ('NO FUNCA!!!');
						$SQL_LISTADO = "SELECT * FROM noticias WHERE status = 1 AND eliminada = '0' ORDER BY fecha DESC LIMIT 0, 20";
						$RS_LISTADO = mysqli_query($conexion, $SQL_LISTADO);
						
						while($n = mysqli_fetch_object($RS_LISTADO)){
							$fecha = explode('-', $n->fecha);
							$fecha = $fecha[2].'-'.$fecha[1].'-'.$fecha[0];
							$legislatura = explode('|', $n->legislaturas);
							$les = '';
							for($i = 0; $i < count($legislatura); $i++){
								if($legislatura[$i] != ''){
									$les = $legislatura[$i];
								}
							}
							$SQL_LEGISLATURA = "SELECT legislatura FROM legislaturas WHERE id = '".$les."'";
							$RS_LEGISLATURA = mysqli_query($conexion, $SQL_LEGISLATURA);
							$l = mysqli_fetch_object($RS_LEGISLATURA);
							
							echo "<tr>";
							echo "	<td>";
							echo "		<div class='tema'><span>".utf8_encode($l->legislatura)."</span> ".utf8_encode($n->tema)."</div>";
							echo "		<div class='titulo'>".utf8_encode($n->titulo)."</div>";
							echo "		<div class='texto'>".strip_tags(utf8_encode(substr($n->texto,0,80)))."...</div>";
							echo "		<div class='fecha'>".$fecha."</div>";
							echo "	</td>";
							echo "	<td style='width:30%;'><img src='".$n->imagen."' alt='".utf8_encode($n->titulo)."' /></td>";
							echo "</tr>";
							echo "<tr class='separador'><td colspan=2></td></tr>";
						}
					?>
				</table>
			</div>
			<div class='footTel'><img src='img/soloFoot2.png' /></div>
		</div>
		<div class="dialogContainer"> 
			<p class="txtDialog"> 
				<b> ¡Hola! </b> 
				<br>
				<br>
				Estas leyendo esto desde una computadora, pero <b> APPDATE </b> está pensado para tu celular. 
				Descargá la APP desde las <b>tiendas oficiales.</b>
				<br>
				<br> 
				<b> ¡Es gratis y lo seguirá siendo! </b>
			</p>
		</div>

<!--*********DIALOG RESPONSIVE*************-->

		<div class="dialogResp">
			<b style="font-size: 60px;">¡Hola!</b>
			<br>
			<p style="font-size: 45px;"> <b>Appdate</b> no es una página web, es una app de celular.</p> 
			<p style="font-size: 45px;">Descargala desde las <b>tiendas oficiales.</b></p>
			<p style="font-size:50px;"><b>¡Es gratis y lo seguirá siendo!</b></p>
			</p>
		</div>

<!-- *************************************-->

		<div class="icoTiendas">
			<a href="https://play.google.com/store/apps/details?id=com.prowebsolutions.appdatelegislativo" target="_blank">
				<img id="btwIcos" src="img/playstore.png" alt='PlayStore'>
			</a>
			<a href="https://www.apple.com/la/ios/app-store/" target="_blank">
				<img src="img/appstore.png" alt='AppleStore' />
			</a>
		</div>
	</div>
	<div class="footer"> 
		<div>
			<p class="esferaPublica"> Appdate Legislativo es un producto de <a class="linksEsfera" href="https://esferapublica.com.ar/" target="_blank"> <u> Esfera Pública </u> </a> </p> 
		</div>
		<div class="proweb">
			<p> Developed by <a class="linkProweb" href="http://prowebsolutions.net.ar" target="_blank"> Proweb Solutions </a> </p>	
		</div>
	</div>
	<div class="icoFooter">
		<a href="https://www.facebook.com/esferapublicaok" target="_blank">
			<img src="img/fbpc.png">
		</a>
		<a href="https://twitter.com/esferapublicaok" target="_blank">
			<img src="img/twpc.png">
		</a>
		<a href="https://www.linkedin.com/in/esfera-p%C3%BAblica-868559149?lipi=urn%3Ali%3Apage%3Ad_flagship3_profile_view_base%3B24F7ZGMkRWWEjXZK5GbEhA%3D%3D" target="_blank">
			<img src="img/lkpc.png">
		</a>
	</div>
	<div class='footerResp'>
<!--
		<b style="font-size:43px; line-height: 1.5;"> ¡APPDATE ES UNA APP PARA TU CELULAR! </b> 
		<br>
		<b style="font-size:35px; line-height: 3;"> DESCARGALA DESDE LAS TIENDAS OFICIALES </b>
-->
		<a style="padding:20px; text-decoration:none;" href="https://play.google.com/store/apps/details?id=com.prowebsolutions.appdatelegislativo" target="_blank">
			<img src="img/playstore.png" alt='PlayStore' class='iconoTiendas' />
		</a>
		<a style="padding:20px;" href class="noDec"="https://itunes.apple.com/us/app/appdate-legislativo/id1459810250?ls=1&mt=8" target="_blank">
			<img src="img/appstore.png" alt='AppleStore' class='iconoTiendas' />
		</a>
		<div class='redes'>
			<a href="https://www.facebook.com/esferapublicaok" target="_blank">
				<img src="img/fbicon.png">
			</a>
			<a style="padding:30px;" href="https://twitter.com/esferapublicaok" target="_blank"> 
				<img src="img/twicon.png">
			</a>
			<a href="https://www.linkedin.com/in/esfera-p%C3%BAblica-868559149?lipi=urn%3Ali%3Apage%3Ad_flagship3_profile_view_base%3B24F7ZGMkRWWEjXZK5GbEhA%3D%3D" target="_blank">
				<img src="img/lkicon.png">
			</a>
		</div>
		<div style='text-align:center;line-height:0.5;font-size:34px; margin-top:15px;'>
			Appdate Legislativo es un producto de <a class="linksEsfera linkResp" href="https://esferapublica.com.ar/" target="_blank" class='linkEP'> <u>Esfera Pública</u> </a>
			<br/><br/>
		</div>
		<div style='text-align:center; font-size:28px; margin-top:15px;'>
			Developed by <a class="linkProweb" href="http://prowebsolutions.net.ar" target="_blank" class='linkPW'> <u>Proweb Solutions</u> </a>
		</div>
	</div>
</body>

