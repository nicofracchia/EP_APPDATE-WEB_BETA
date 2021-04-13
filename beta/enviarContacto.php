<?php
	
header('Content-Type: application/json');

$parametrosJSON = file_get_contents('php://input');
$parametros = json_decode($parametrosJSON, TRUE); 
$params = $parametros['params'];

//$para = "nico_fracchia_91@hotmail.com";
$para = "info@esferapublica.com.ar";
$asunto = 'Contacto desde la web Appdate Legislativo';
$mensaje = 'NOMBRE Y APELLIDO: '.utf8_decode($params['nya']).' 
MAIL: '.utf8_decode($params['mail']).'
TELEFONO: '.utf8_decode($params['tel']).'
CONSULTA:
'.utf8_decode($params['consulta']);
$cabeceras = "From: ".$params['mail']."\r\n"."Reply-To: ".$params['mail']."\r\n"."X-Mailer: PHP/".phpversion();
$respuesta = Array();
if(mail($para, $asunto, $mensaje, $cabeceras)){
	$respuesta['envio'] = 'OK';
	$respuesta['mensaje'] = 'El mensaje se envio correctamente!<br/><br/> Nos pondremos en contacto con la mayor brevedad posible.<br/><br/> Muchas gracias!<br/><br/>';
}else{
	$respuesta['envio'] = 'ERROR';
	$respuesta['mensaje'] = 'Se produjo un error enviando su mensaje. <br/> Por favor, intente nuevamente mas tarde.';
}

echo json_encode($respuesta);