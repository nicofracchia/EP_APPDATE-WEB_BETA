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
		$txt = str_replace("¡", '', $txt);
		$txt = str_replace("¢", '', $txt);
		$txt = str_replace("£", '', $txt);
		$txt = str_replace("¤", '', $txt);
		$txt = str_replace("¥", '', $txt);
		$txt = str_replace("¦", '', $txt);
		$txt = str_replace("§", '', $txt);
		$txt = str_replace("¨", '', $txt);
		$txt = str_replace("©", '', $txt);
		$txt = str_replace("ª", '', $txt);
		$txt = str_replace("«", '', $txt);
		$txt = str_replace("¬", '', $txt);
		$txt = str_replace("®", '', $txt);
		$txt = str_replace("¯", '', $txt);
		$txt = str_replace("°", '', $txt);
		$txt = str_replace("±", '', $txt);
		$txt = str_replace("²", '', $txt);
		$txt = str_replace("³", '', $txt);
		$txt = str_replace("´", '', $txt);
		$txt = str_replace("µ", '', $txt);
		$txt = str_replace("¶", '', $txt);
		$txt = str_replace("·", '', $txt);
		$txt = str_replace("¸", '', $txt);
		$txt = str_replace("¹", '', $txt);
		$txt = str_replace("º", '', $txt);
		$txt = str_replace("»", '', $txt);
		$txt = str_replace("¼", '', $txt);
		$txt = str_replace("½", '', $txt);
		$txt = str_replace("¾", '', $txt);
		$txt = str_replace("¿", '', $txt);
		$txt = str_replace("À", 'A', $txt);
		$txt = str_replace("Á", 'A', $txt);
		$txt = str_replace("Â", 'A', $txt);
		$txt = str_replace("Ã", 'A', $txt);
		$txt = str_replace("Ä", 'A', $txt);
		$txt = str_replace("Å", 'A', $txt);
		$txt = str_replace("Æ", 'A', $txt);
		$txt = str_replace("Ç", '', $txt);
		$txt = str_replace("È", 'E', $txt);
		$txt = str_replace("É", 'E', $txt);
		$txt = str_replace("Ê", 'E', $txt);
		$txt = str_replace("Ë", 'E', $txt);
		$txt = str_replace("Ì", 'I', $txt);
		$txt = str_replace("Í", 'I', $txt);
		$txt = str_replace("Î", 'I', $txt);
		$txt = str_replace("Ï", 'I', $txt);
		$txt = str_replace("Ð", 'D', $txt);
		$txt = str_replace("Ñ", 'N', $txt);
		$txt = str_replace("Ò", 'O', $txt);
		$txt = str_replace("Ó", 'O', $txt);
		$txt = str_replace("Ô", 'O', $txt);
		$txt = str_replace("Õ", 'O', $txt);
		$txt = str_replace("Ö", 'O', $txt);
		$txt = str_replace("×", '', $txt);
		$txt = str_replace("Ø", 'O', $txt);
		$txt = str_replace("Ù", 'U', $txt);
		$txt = str_replace("Ú", 'U', $txt);
		$txt = str_replace("Û", 'U', $txt);
		$txt = str_replace("Ü", 'U', $txt);
		$txt = str_replace("Ý", 'Y', $txt);
		$txt = str_replace("Þ", '', $txt);
		$txt = str_replace("ß", '', $txt);
		$txt = str_replace("à", 'a', $txt);
		$txt = str_replace("á", 'a', $txt);
		$txt = str_replace("â", 'a', $txt);
		$txt = str_replace("ã", 'a', $txt);
		$txt = str_replace("ä", 'a', $txt);
		$txt = str_replace("å", 'a', $txt);
		$txt = str_replace("æ", '', $txt);
		$txt = str_replace("ç", '', $txt);
		$txt = str_replace("è", 'e', $txt);
		$txt = str_replace("é", 'e', $txt);
		$txt = str_replace("ê", 'e', $txt);
		$txt = str_replace("ë", 'e', $txt);
		$txt = str_replace("ì", 'i', $txt);
		$txt = str_replace("í", 'i', $txt);
		$txt = str_replace("î", 'i', $txt);
		$txt = str_replace("ï", 'i', $txt);
		$txt = str_replace("ð", 'o', $txt);
		$txt = str_replace("ñ", 'n', $txt);
		$txt = str_replace("ò", 'o', $txt);
		$txt = str_replace("ó", 'o', $txt);
		$txt = str_replace("ô", 'o', $txt);
		$txt = str_replace("õ", 'o', $txt);
		$txt = str_replace("ö", 'o', $txt);
		$txt = str_replace("÷", '', $txt);
		$txt = str_replace("ø", 'o', $txt);
		$txt = str_replace("ù", 'u', $txt);
		$txt = str_replace("ú", 'u', $txt);
		$txt = str_replace("û", 'u', $txt);
		$txt = str_replace("ü", 'u', $txt);
		$txt = str_replace("ý", 'y', $txt);
		$txt = str_replace("þ", '', $txt);
		$txt = str_replace("ÿ", 'y', $txt);
		$txt = str_replace("€", '', $txt);
		
		return $txt;
	}
}
?>