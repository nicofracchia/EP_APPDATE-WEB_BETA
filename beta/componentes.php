<?php

function noticiaListadoHTML($params){
	$url = $params['tema'].' '.$params['titulo'];
	$fn = new Funciones;
	$url = $params['id']."/".$fn->cambiarCaracteresEspeciales($url);
	$HTML  = "<div class='contNoticiaListado'><a href='noticia/".$url."'>";
	$HTML .= "	<div class='contIconitoListadoNoticia'><img src='images/iconos/secciones/".$params['seccion']."' alt='' class='iconitoListadoNoticia' /></div>";
	$HTML .= "	<div class='imagen' style='background-image:url(".$params['imagen'].");'></div>";
	$HTML .= "	<div class='contTxt'>";
	$HTML .= "		<div class='distritoTema'>";
	$HTML .= "			<span class='distrito'>".$params['legislatura']."</span> - ";
	$HTML .= "			<span class='tema'>".$params['tema']."</span>";
	$HTML .= "		</div>";
	$HTML .= "		<div class='titulo'>".$params['titulo']."</div>";
	$HTML .= "		<div class='contenido'>".$params['contenido']."...</div>";
	$HTML .= "		<div class='fecha'>".$params['fecha']."</div>";
	$HTML .= "	</div>";
	$HTML .= "</a></div>";
	
	/***** ORIGINAL ******
	$HTML  = "<div class='contNoticiaListado'><a href='noticia/".$url."'>";
	$HTML .= "	<div class='distrito'>".$params['legislatura']."</div>";
	$HTML .= "	<div class='imagen' style='background-image:url(".$params['imagen'].");'></div>";
	$HTML .= "	<div class='contTxt'>";
	$HTML .= "		<div class='titulo'>".$params['tema']." - ".$params['titulo']."</div>";
	$HTML .= "		<div class='contenido'>".$params['contenido']."...</div>";
	$HTML .= "	</div>";
	$HTML .= "</a></div>";
	**********************/
	
	return $HTML;
}

function iconoSeccionNoticia($secciones){
	// ||||2|3|5||
	$secciones = explode('|', $secciones);
	$sec = Array();
	foreach($secciones as $s){
		if($s != ''){
			$sec[] = $s;
		}
	}
	$icono = 'politica_y_sociedad.png';
	switch($sec[0]){
		case '1': $icono = 'politica_y_sociedad.png'; break;
		case '2': $icono = 'finanzas.png'; break;
		case '3': $icono = 'laboral.png'; break;
		case '4': $icono = 'industria.png'; break;
		case '5': $icono = 'agro.png'; break;
		case '6': $icono = 'energia.png'; break;
		case '7': $icono = 'telecomunicaciones.png'; break;
		case '8': $icono = 'consumidor.png'; break;
		case '9': $icono = 'salud.png'; break;
		case '10': $icono = 'medioambiente.png'; break;
		case '11': $icono = 'judicial.png'; break;
	}
	return $icono;
}

class Funciones {
	public function fechaBdToNormal($fecha){
		$fecha = explode('-', $fecha);
		$fecha = $fecha[2].'/'.$fecha[1].'/'.$fecha[0];
		return $fecha;
	}
	public function cambiarCaracteresEspeciales($txt){
		$txt = str_replace(':', '', $txt);
		$txt = str_replace('"', '', $txt);
		$txt = str_replace("&", '', $txt);
		$txt = str_replace("<", '', $txt);
		$txt = str_replace(">", '', $txt);
		$txt = str_replace(" ", '_', $txt);
		$txt = str_replace("??", '', $txt);
		$txt = str_replace("??", '', $txt);
		$txt = str_replace("??", '', $txt);
		$txt = str_replace("??", '', $txt);
		$txt = str_replace("??", '', $txt);
		$txt = str_replace("??", '', $txt);
		$txt = str_replace("??", '', $txt);
		$txt = str_replace("??", '', $txt);
		$txt = str_replace("??", '', $txt);
		$txt = str_replace("??", '', $txt);
		$txt = str_replace("??", '', $txt);
		$txt = str_replace("??", '', $txt);
		$txt = str_replace("??", '', $txt);
		$txt = str_replace("??", '', $txt);
		$txt = str_replace("??", '', $txt);
		$txt = str_replace("??", '', $txt);
		$txt = str_replace("??", '', $txt);
		$txt = str_replace("??", '', $txt);
		$txt = str_replace("??", '', $txt);
		$txt = str_replace("??", '', $txt);
		$txt = str_replace("??", '', $txt);
		$txt = str_replace("??", '', $txt);
		$txt = str_replace("??", '', $txt);
		$txt = str_replace("??", '', $txt);
		$txt = str_replace("??", '', $txt);
		$txt = str_replace("??", '', $txt);
		$txt = str_replace("??", '', $txt);
		$txt = str_replace("??", '', $txt);
		$txt = str_replace("??", '', $txt);
		$txt = str_replace("??", '', $txt);
		$txt = str_replace("??", 'A', $txt);
		$txt = str_replace("??", 'A', $txt);
		$txt = str_replace("??", 'A', $txt);
		$txt = str_replace("??", 'A', $txt);
		$txt = str_replace("??", 'A', $txt);
		$txt = str_replace("??", 'A', $txt);
		$txt = str_replace("??", 'A', $txt);
		$txt = str_replace("??", '', $txt);
		$txt = str_replace("??", 'E', $txt);
		$txt = str_replace("??", 'E', $txt);
		$txt = str_replace("??", 'E', $txt);
		$txt = str_replace("??", 'E', $txt);
		$txt = str_replace("??", 'I', $txt);
		$txt = str_replace("??", 'I', $txt);
		$txt = str_replace("??", 'I', $txt);
		$txt = str_replace("??", 'I', $txt);
		$txt = str_replace("??", 'D', $txt);
		$txt = str_replace("??", 'N', $txt);
		$txt = str_replace("??", 'O', $txt);
		$txt = str_replace("??", 'O', $txt);
		$txt = str_replace("??", 'O', $txt);
		$txt = str_replace("??", 'O', $txt);
		$txt = str_replace("??", 'O', $txt);
		$txt = str_replace("??", '', $txt);
		$txt = str_replace("??", 'O', $txt);
		$txt = str_replace("??", 'U', $txt);
		$txt = str_replace("??", 'U', $txt);
		$txt = str_replace("??", 'U', $txt);
		$txt = str_replace("??", 'U', $txt);
		$txt = str_replace("??", 'Y', $txt);
		$txt = str_replace("??", '', $txt);
		$txt = str_replace("??", '', $txt);
		$txt = str_replace("??", 'a', $txt);
		$txt = str_replace("??", 'a', $txt);
		$txt = str_replace("??", 'a', $txt);
		$txt = str_replace("??", 'a', $txt);
		$txt = str_replace("??", 'a', $txt);
		$txt = str_replace("??", 'a', $txt);
		$txt = str_replace("??", '', $txt);
		$txt = str_replace("??", '', $txt);
		$txt = str_replace("??", 'e', $txt);
		$txt = str_replace("??", 'e', $txt);
		$txt = str_replace("??", 'e', $txt);
		$txt = str_replace("??", 'e', $txt);
		$txt = str_replace("??", 'i', $txt);
		$txt = str_replace("??", 'i', $txt);
		$txt = str_replace("??", 'i', $txt);
		$txt = str_replace("??", 'i', $txt);
		$txt = str_replace("??", 'o', $txt);
		$txt = str_replace("??", 'n', $txt);
		$txt = str_replace("??", 'o', $txt);
		$txt = str_replace("??", 'o', $txt);
		$txt = str_replace("??", 'o', $txt);
		$txt = str_replace("??", 'o', $txt);
		$txt = str_replace("??", 'o', $txt);
		$txt = str_replace("??", '', $txt);
		$txt = str_replace("??", 'o', $txt);
		$txt = str_replace("??", 'u', $txt);
		$txt = str_replace("??", 'u', $txt);
		$txt = str_replace("??", 'u', $txt);
		$txt = str_replace("??", 'u', $txt);
		$txt = str_replace("??", 'y', $txt);
		$txt = str_replace("??", '', $txt);
		$txt = str_replace("??", 'y', $txt);
		$txt = str_replace("???", '', $txt);
		
		return $txt;
	}
}
?>