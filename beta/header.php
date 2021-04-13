<?php
	if(!isset($ROOT))
		$ROOT = '';
	
	
?>

<div id='popupInicio'><img src="images/inicio_celular.png" alt=""></div>
<script>
	if(sessionStorage.getItem('visto') === null){
		document.getElementById('popupInicio').style.display = 'block';
		setTimeout(function(){
			document.getElementById('popupInicio').style.opacity = 0
		}, 10000);
		setTimeout(function(){
			document.getElementById('popupInicio').style.display = 'none'; 
			sessionStorage.setItem('visto', 'SI');
		}, 11000);
	}
</script>

<header>
	<div class='logo'>
		<a href='/beta/home'><img src='<?php echo $ROOT; ?>images/logo.png' alt='Appdate Legislativo' /></a>
	</div>
	<nav>
		<a href='/beta/home'>Inicio</a>
		<span id='menuSecciones' onmouseover="oFunc.fnMuestraMenuSecciones();" onmouseout="oFunc.fnOcultaMenuSecciones();">Secciones</span>
		<span href='Búsqueda' onclick="oFunc.fnMostrarMenuBusqueda();" id='menuBusqueda'>Buscar</span>
		<span onclick="oFunc.fnMostrarMenuInfo();" id='menuInfo'>Nosotros</span>
		<span id='menuContacto' onclick="oFunc.fnMuestraMenuContacto();">Contacto</span>
		<span href='Usuarios' onclick="oFunc.fnMostrarMenuLogin();" id='menuLogin'>MI CUENTA</span>
	</nav>
	
	<!-- SECCIONES -->
	<div id='contMenuSecciones' class='contMenuSecciones' onmouseover="oFunc.fnMuestraMenuSecciones();" onmouseout="oFunc.fnOcultaMenuSecciones();">
		<div id='flechitaModalSecciones' class='flechitaModal'><img src='<?php echo $ROOT; ?>images/iconos/flecha_modal.png' alt='Secciones' /></div>
		<div class='linea'>
			<a href='/beta/politica_y_sociedad'>
				<img src='<?php echo $ROOT; ?>images/iconos/secciones/politica_y_sociedad.png' alt='Política y Sociedad' /><br/>Política y Sociedad
			</a>
			<a href='/beta/economia_y_finanzas'>
				<img src='<?php echo $ROOT; ?>images/iconos/secciones/finanzas.png' alt='Economía y Finanzas' /><br/>Economía y Finanzas
			</a>
			<a href='/beta/laboral'>
				<img src='<?php echo $ROOT; ?>images/iconos/secciones/laboral.png' alt='Laboral' /><br/>Laboral
			</a>
			<a href='/beta/industria_y_pymes'>
				<img src='<?php echo $ROOT; ?>images/iconos/secciones/industria.png' alt='Industria y PYMES' /><br/>Industria y PYMES
			</a>
			<a href='/beta/agro'>
				<img src='<?php echo $ROOT; ?>images/iconos/secciones/agro.png' alt='Agro' /><br/>Agro
			</a>
			<a href='/beta/energia_y_mineria'>
				<img src='<?php echo $ROOT; ?>images/iconos/secciones/energia.png' alt='Energía y Minería' /><br/>Energía y Minería
			</a>
		</div>
		<div class='linea'>
			<a href='/beta/telecomunicaciones'>
				<img src='<?php echo $ROOT; ?>images/iconos/secciones/telecomunicaciones.png' alt='Telecomunicaciones C&T' /><br/>Telecomunicaciones C&T
			</a>
			<a href='/beta/usuarios_y_consumidores'>
				<img src='<?php echo $ROOT; ?>images/iconos/secciones/consumidor.png' alt='Usuarios y Consumidores' /><br/>Usuarios y Consumidores
			</a>
			<a href='/beta/salud_y_alimentacion'>
				<img src='<?php echo $ROOT; ?>images/iconos/secciones/salud.png' alt='Salud y Alimentación' /><br/>Salud y Alimentación
			</a>
			<a href='/beta/medioambiente'>
				<img src='<?php echo $ROOT; ?>images/iconos/secciones/medioambiente.png' alt='Medioambiente' /><br/>Medioambiente
			</a>
			<a href='/beta/judiciales'>
				<img src='<?php echo $ROOT; ?>images/iconos/secciones/judicial.png' alt='Judiciales' /><br/>Judiciales
			</a>
		</div>
	</div>
	
	<!-- CONTACTO -->
	<div id='contMenuContacto' class='contMenuContacto'>
		<div id='flechitaModalContacto' class='flechitaModal'><img src='<?php echo $ROOT; ?>images/iconos/flecha_modal.png' alt='Contacto' /></div>
		<div class='linea' id='frmCto'>
			<input type='text' name='nya' id='ctoNYA' placeholder='NOMBRE Y APELLIDO' />
			<span class='txtErrFrm' id='reqNYA'>Este campo es obligatorio.</span>
			<input type='email' name='mail' id='ctoMail' placeholder='EMAIL' />
			<span class='txtErrFrm' id='reqMail'>Este campo es obligatorio.</span>
			<span class='txtErrFrm' id='invMail'>El mail ingresado no es válido.</span>
			<input type='tel' name='telefono' id='ctoTelefono' placeholder='TELÉFONO' />
			<span class='txtErrFrm' id='reqTel'>Este campo es obligatorio.</span>
			<textarea name='consulta' id='ctoConsulta' placeholder='CONSULTA'></textarea>
			<span class='txtErrFrm' id='reqConsulta'>Este campo es obligatorio.</span>
			<input type='button' name='cancelar' id='ctoCancelar' value='CANCELAR' onclick='oFunc.fnCancelarContacto();' />
			<input type='button' name='enviar' id='ctoEnviar' value='ENVIAR' onclick='oFunc.fnEnviarContacto();' />
		</div>
		<div id='msjCto'>
			<div id='msjCtoInt'></div>
			<input type='button' name='cancelar' id='ctoCerrar' value='CERRAR' onclick='oFunc.fnCancelarContacto();' />
		</div>
	</div>
	
	<!-- INFO -->
	<div id='contMenuInfo' class='contMenuInfo'>
		<div id='flechitaModalInfo' class='flechitaModal'><img src='<?php echo $ROOT; ?>images/iconos/flecha_modal.png' alt='Info' /></div>
		<div class='linea'>
			APPDATE LEGISLATIVO es el servicio de noticias parlamentarias de <a href='https://esferapublica.com.ar/' target='_blank'>ESFERA PÚBLICA</a>, una agencia de información y asesoramiento especializada conformada por periodistas y politólogos con más de 10 años de experiencia en el quehacer legislativo.
			<br/><br/>
			En su versión libre y gratuita encontrarás updates de las principales novedades de la labor diaria del Congreso y las legislaturas locales en forma inmediata. Mientras que, si te suscribís, podrás acceder a más información y a contenidos exclusivos.
			<br/><br/>
			Te informamos sobre los proyectos de ley presentados, ponemos énfasis en las noticias que surgen de las comisiones, y detallamos qué se aprobó, rechazó y cómo votaron los bloques políticos en las sesiones.  
			<br/><br/>
			Vos estás leyendo esto desde una computadora, pero APPDATE está pensado para tu celular. Por eso, te invitamos a que descargues la APP desde las tiendas oficiales, para que tengas las noticias legislativas a sólo un touch en tu celular
			<br/><br/>
			<input type='button' name='cancelar' value='CERRAR' onclick='oFunc.fnOcultaMenuInfo();' />
		</div>
	</div>
	
	<!-- BUSQUEDA -->
	<?php
		if(!isset($busqueda))$busqueda = '';
		if(!isset($desde))$desde = '';
		if(!isset($hasta))$hasta = '';
		if(!isset($tema))$tema = '';
		if(!isset($distrito))$distrito = '';
		
	?>
	<div id='contMenuBusqueda' class='contMenuBusqueda'>
		<div id='flechitaModalBusqueda' class='flechitaModal'><img src='<?php echo $ROOT; ?>images/iconos/flecha_modal.png' alt='Busqueda' /></div>
		<div class='linea' id='frmBusqueda'>
			<form action='/beta/busqueda' method='post'>
				<input type='text' name='busqueda' id='busBusqueda' placeholder='Buscar' value='<?php echo $busqueda; ?>' />
				<input type='date' name='desde' id='busDesde' onchange='oFunc.setDateFormatArgentina(this);' data-formateado='Desde' value='<?php echo $desde; ?>' />
				<input type='date' name='hasta' id='busHasta' onchange='oFunc.setDateFormatArgentina(this);' data-formateado='Hasta' value='<?php echo $hasta; ?>' />
				<select name='distrito' id='busDistrito'>
					<option value="">Distrito</option>
					<option value="1" <?php if($distrito == 1) echo " selected"; ?>>Congreso</option>
					<option value="2" <?php if($distrito == 2) echo " selected"; ?>>Bonaerense</option>
					<option value="3" <?php if($distrito == 3) echo " selected"; ?>>Porteña</option>
					<option value="4" <?php if($distrito == 4) echo " selected"; ?>>Catamarca</option>
					<option value="5" <?php if($distrito == 5) echo " selected"; ?>>Chaco</option>
					<option value="6" <?php if($distrito == 6) echo " selected"; ?>>Chubut</option>
					<option value="7" <?php if($distrito == 7) echo " selected"; ?>>Córdoba</option>
					<option value="8" <?php if($distrito == 8) echo " selected"; ?>>Corrientes</option>
					<option value="9" <?php if($distrito == 9) echo " selected"; ?>>Entre Ríos</option>
					<option value="10" <?php if($distrito == 10) echo " selected"; ?>>Formosa</option>
					<option value="11" <?php if($distrito == 11) echo " selected"; ?>>Jujuy</option>
					<option value="12" <?php if($distrito == 12) echo " selected"; ?>>La Pampa</option>
					<option value="13" <?php if($distrito == 13) echo " selected"; ?>>La Rioja</option>
					<option value="14" <?php if($distrito == 14) echo " selected"; ?>>Mendoza</option>
					<option value="15" <?php if($distrito == 15) echo " selected"; ?>>Misiones</option>
					<option value="16" <?php if($distrito == 16) echo " selected"; ?>>Neuquén</option>
					<option value="17" <?php if($distrito == 17) echo " selected"; ?>>Río Negro</option>
					<option value="18" <?php if($distrito == 18) echo " selected"; ?>>Salta</option>
					<option value="19" <?php if($distrito == 19) echo " selected"; ?>>San Juan</option>
					<option value="20" <?php if($distrito == 20) echo " selected"; ?>>San Luis</option>
					<option value="21" <?php if($distrito == 21) echo " selected"; ?>>Santa Cruz</option>
					<option value="22" <?php if($distrito == 22) echo " selected"; ?>>Santa Fe</option>
					<option value="23" <?php if($distrito == 23) echo " selected"; ?>>Santiago del Estero</option>
					<option value="24" <?php if($distrito == 24) echo " selected"; ?>>Tierra del Fuego</option>
					<option value="25" <?php if($distrito == 25) echo " selected"; ?>>Tucumán</option>
				</select>
				<select name='tema' id='busTema'>
					<option value="">Tema</option>
					<?php
						$url = 'https://esferapublica.com.ar/apprn.php';
						$ch = curl_init($url);
						$data = Array('accion' => 'filtroTema');
						curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
						curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
						$temas = curl_exec($ch);
						curl_close($ch);
						$temas = json_decode($temas);
						foreach($temas->temas as $t){
							$sel = '';
							if($t == $tema) $sel = ' selected';
							echo "<option ".$sel.">".$t."</option>";
						}
					?>
				</select>
				<input type='button' name='cancelar' id='busCancelar' value='CANCELAR' onclick='oFunc.fnOcultaMenuBusqueda();' />
				<input type='submit' name='buscar' id='busBuscar' value='BUSCAR' />
			</form>
			<script>
				oFunc.setDateFormatArgentina(document.querySelector('#busDesde'));
				oFunc.setDateFormatArgentina(document.querySelector('#busHasta'));
			</script>
		</div>
	</div>
	
	<!-- LOGIN -->
	<div id='contMenuLogin' class='contMenuLogin'>
		<div id='flechitaModalLogin' class='flechitaModal'><img src='<?php echo $ROOT; ?>images/iconos/flecha_modal.png' alt='Login' /></div>
		<div class='linea' id='frmLogin'>
			<?php if(!isset($_SESSION['NYA']) or $_SESSION['NYA'] == ''){ ?>
			<div class='txtLiTop'>¡Bienvenidos a AppDate!</div>
			<form action='/beta/home' method='post' id='formLogin'>
				<input type='hidden' name='login' value='1' />
				<input type='email' name='usuario' id='liMail' placeholder='EMAIL' />
				<span class='txtErrFrm' id='reqMailLi'>Este campo es obligatorio.</span>
				<span class='txtErrFrm' id='invMailLi'>El mail ingresado no es válido.</span>
				<input type='password' name='clave' id='liClave' placeholder='CONTRASEÑA' />
				<span class='txtErrFrm' id='reqClaveLi'>Este campo es obligatorio.</span>
				<input type='button' name='enviar' id='liEnviar' value='INGRESAR' onclick='oFunc.fnEnviarLogin();' />
				<input type='button' name='cancelar' id='liCancelar' value='CANCELAR' onclick='oFunc.fnOcultaMenuLogin();' />
			</form>
			<div class='txtLiBottom'>¡Quiero SUSCRIBIRME al servicio de noticias de AppDate!</div>
			<?php }else{ ?>
			<div class='txtLiTop'>¡Bienvenido/a <?php echo $_SESSION['NYA']; ?> a AppDate!</div>
			<form action='/beta/home' method='post' id='formLogin'>
				<input type='hidden' name='logout' value='1' />
				<input type='button' name='cancelar' id='liCancelar' value='CANCELAR' onclick='oFunc.fnOcultaMenuLogin();' />
				<input type='submit' name='enviar' id='liEnviar' value='CERRAR SESIÓN' />
			</form>
			<?php } ?>
		</div>
	</div>
	
	<!-- REGISTRO -->
	<div id='contMenuRegistro' class='contMenuRegistro'>
		<div id='flechitaModalLogin' class='flechitaModal'><img src='<?php echo $ROOT; ?>images/iconos/flecha_modal.png' alt='Login' /></div>
		<div class='linea' id='frmLogin'>
			<div class='txtLiTop'>¡Bienvenidos a AppDate!</div>
			<div class='txtLiTop'>Si querés SUSCRIBIRTE para acceder a más información, registrate:</div>
			<form action='/beta/home' method='post' id='formLogin'>
				<input type='text' name='nombre' placeholder='Nombre' />
				<input type='text' name='apellido' placeholder='Apellido' />
				<input type='text' name='mail' placeholder='Mail' />
				<input type='text' name='telefono' placeholder='Teléfono' />
				<input type='text' name='clave' placeholder='Contraseña' />
				<input type='text' name='clave2' placeholder='Repetir contraseña' />
				<textarea name='comentarios' placeholder='Comentarios'></textarea>
				<input type='button' name='enviar' id='liEnviar' value='INGRESAR' onclick='oFunc.fnEnviarRegistro();' />
				<input type='button' name='cancelar' id='liCancelar' value='CANCELAR' onclick='oFunc.fnOcultaMenuRegistro();' />
			</form>
		</div>
	</div>
	
</header>