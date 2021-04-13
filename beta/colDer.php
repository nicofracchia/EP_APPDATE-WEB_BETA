<?php
echo "<div class='colDer'>";

// TWITTER TIMELINE
echo "	<div class='contenedorTW'>";
echo "		<div class='texto'>Tweets de @EsferaPublicaOk</div>";
echo "		<div class='timelineTW'>";
echo "			<a class='twitter-timeline' href='https://twitter.com/EsferaPublicaOk?ref_src=twsrc%5Etfw'></a>";
echo "			<script async src='https://platform.twitter.com/widgets.js' charset='utf-8'></script>";
echo "		</div>";
echo "	</div>";

// PAUTAS PUBLICITARIAS
$url = 'https://esferapublica.com.ar/apprn.php';
$ch = curl_init($url);
$data = Array(
	'accion' => 'publicidad'
);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$publicidad = curl_exec($ch);
curl_close($ch);

$publicidad = json_decode($publicidad);
foreach($publicidad as $p){
	echo "<a href='".$p->url."' target='_blank'><img src='".$p->imagen."' alt='".$p->url."' /></a>";
}

// ULTIMOS TEMAS
$url = 'https://esferapublica.com.ar/apprn.php';
$ch = curl_init($url);
$data = Array(
	'accion' => 'ultimosTemas'
);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$ultimosTemas = curl_exec($ch);
curl_close($ch);

$ultimosTemas = json_decode($ultimosTemas);
echo "<div class='ultimosTemas'>";
echo "	<h3>Últimos temas</h3>";
echo "	<form action='/beta/busqueda' method='post'>";
foreach($ultimosTemas as $t){
	echo "<input type='submit' name='tema' value='".$t->tema."' />";
}
echo "	</form>";
echo "</div>";



echo "</div>";



?>