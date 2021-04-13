var oFunc = oFunc || {};

/** ***** FUNCIONES FECHAS ***** **/

oFunc.setDateFormatArgentina = function(el){
	let val = el.value.split('-');
	if(val.length > 1){
		fechaFormateada = val[2]+'/'+val[1]+'/'+val[0];
		el.setAttribute('data-formateado', fechaFormateada);
	}
}

/** ***** FUNCIONES HEADER ***** **/
oFunc.fnOcultaTodosMenues = function(menu){
	if(menu != 'secciones')oFunc.fnOcultaMenuSecciones();
	if(menu != 'contacto')oFunc.fnOcultaMenuContacto();
	if(menu != 'info')oFunc.fnOcultaMenuInfo();	
	if(menu != 'busqueda')oFunc.fnOcultaMenuBusqueda();
	if(menu != 'login')oFunc.fnOcultaMenuLogin();
	if(menu != 'registro')oFunc.fnOcultaMenuRegistro();
}

// SECCIONES
oFunc.fnMuestraMenuSecciones = function(){
	oFunc.fnOcultaTodosMenues('secciones');
	let flechitaModal = document.querySelector('#flechitaModalSecciones');
	let menu = document.querySelector('#menuSecciones');
	let recMenu = menu.getBoundingClientRect();
	let widthMenu = menu.offsetWidth;
	let heightMenu = menu.offsetHeight;
	let modal = document.querySelector('#contMenuSecciones');
	let recModal = modal.getBoundingClientRect();

	modal.style.display = 'block';
	let _top = heightMenu + recMenu.top;
	modal.style.top = _top+'px';
	let _paddingFlechitaIzq = recMenu.left - recModal.left + widthMenu / 2 - window.innerWidth * 2 / 100;
	flechitaModal.style.paddingLeft = _paddingFlechitaIzq+'px';
	
	if(recModal.left == 0){
		oFunc.fnMuestraMenuSecciones();
	}
}
oFunc.fnOcultaMenuSecciones = function(){
	let modal = document.querySelector('#contMenuSecciones');
	modal.style.display = 'none';
}

// CONTACTO
oFunc.fnMuestraMenuContacto = function(){
	oFunc.fnOcultaTodosMenues('contacto');
	let flechitaModal = document.querySelector('#flechitaModalContacto');
	let menu = document.querySelector('#menuContacto');
	let recMenu = menu.getBoundingClientRect();
	let widthMenu = menu.offsetWidth;
	let heightMenu = menu.offsetHeight;
	let modal = document.querySelector('#contMenuContacto');
	let recModal = modal.getBoundingClientRect();

	modal.style.display = 'block';
	let _top = heightMenu + recMenu.top;
	modal.style.top = _top+'px';
	let _paddingFlechitaIzq = recMenu.left - recModal.left + widthMenu / 2 - window.innerWidth * 2 / 100;
	flechitaModal.style.paddingLeft = _paddingFlechitaIzq+'px';
	
	if(recModal.left == 0){
		oFunc.fnMuestraMenuContacto();
	}
}
oFunc.fnOcultaMenuContacto = function(){
	let modal = document.querySelector('#contMenuContacto');
	modal.style.display = 'none';
}
oFunc.fnValidaCamposCto = function(){
	let nya = document.querySelector('#ctoNYA').value;
	let mail = document.querySelector('#ctoMail').value;
	let tel = document.querySelector('#ctoTelefono').value;
	let consulta = document.querySelector('#ctoConsulta').value;
	
	if(nya == ''){
		document.querySelector('#reqNYA').style.display = 'block';
		document.querySelector('#ctoNYA').focus();
		return false;
	}else{
		document.querySelector('#reqNYA').style.display = 'none';
	}
	if(mail == ''){
		document.querySelector('#reqMail').style.display = 'block';
		document.querySelector('#ctoMail').focus();
		return false;
	}else{
		document.querySelector('#reqMail').style.display = 'none';
	}
	var validacionMail = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	if(!validacionMail.test(mail)){
		document.querySelector('#invMail').style.display = 'block';
		document.querySelector('#ctoMail').focus();
		return false;
	}else{
		document.querySelector('#invMail').style.display = 'none';
	}
	
	if(tel == ''){
		document.querySelector('#reqTel').style.display = 'block';
		document.querySelector('#ctoTelefono').focus();
		return false;
	}else{
		document.querySelector('#reqTel').style.display = 'none';
	}
	if(consulta == ''){
		document.querySelector('#reqConsulta').style.display = 'block';
		document.querySelector('#ctoConsulta').focus();
		return false;
	}else{
		document.querySelector('#reqConsulta').style.display = 'none';
	}
	
	return true;
}
oFunc.fnEnviarContacto = function(){
	if(oFunc.fnValidaCamposCto()){
		(async () => {
			let paramsContacto = JSON.stringify({
				accion: 'enviarContacto',
				params: {
					nya: document.querySelector('#ctoNYA').value,
					mail: document.querySelector('#ctoMail').value,
					tel: document.querySelector('#ctoTelefono').value,
					consulta: document.querySelector('#ctoConsulta').value
				}
			});

			let responseMail = await fetch(
				'enviarContacto.php', {
				method: 'POST',
				mode: 'cors',
				headers: {
				  Accept: 'application/json',
				  'Content-Type': 'application/json'
				},
				body: paramsContacto
			  }
			);
			let json = await responseMail.json();
			document.querySelector('#frmCto').style.display = 'none';
			document.querySelector('#msjCto').style.display = 'block';
			document.querySelector('#msjCtoInt').innerHTML = json.mensaje;
			console.log('JSON:',json);
		})();
	}
}
oFunc.fnCancelarContacto = function(){
	document.querySelector('#ctoNYA').value = '';
	document.querySelector('#ctoMail').value = '';
	document.querySelector('#ctoTelefono').value = '';
	document.querySelector('#ctoConsulta').value = '';
	document.querySelector('#frmCto').style.display = 'flex';
	document.querySelector('#msjCto').style.display = 'none';
	oFunc.fnOcultaMenuContacto();
}

// INFO
oFunc.fnMostrarMenuInfo = function(){
	oFunc.fnOcultaTodosMenues('info');
	let modal = document.querySelector('#seccionNosotrosHeader');
	modal.style.display = 'flex';
	/*
	let flechitaModal = document.querySelector('#flechitaModalInfo');
	let menu = document.querySelector('#menuInfo');
	let recMenu = menu.getBoundingClientRect();
	let widthMenu = menu.offsetWidth;
	let heightMenu = menu.offsetHeight;
	let modal = document.querySelector('#contMenuInfo');
	let recModal = modal.getBoundingClientRect();

	modal.style.display = 'block';
	let _top = heightMenu + recMenu.top;
	modal.style.top = _top+'px';
	let _paddingFlechitaIzq = recMenu.left - recModal.left + widthMenu / 2 - window.innerWidth * 2 / 100;
	flechitaModal.style.paddingLeft = _paddingFlechitaIzq+'px';
	
	if(recModal.left == 0){
		oFunc.fnMostrarMenuInfo();
	}
	*/
}
oFunc.fnOcultaMenuInfo = function(){
	let modal = document.querySelector('#seccionNosotrosHeader');
	modal.style.display = 'none';
	/*
	let modal = document.querySelector('#contMenuInfo');
	modal.style.display = 'none';
	*/
}

// BUSQUEDA
oFunc.fnMostrarMenuBusqueda = function(){
	oFunc.fnOcultaTodosMenues('busqueda');
	let flechitaModal = document.querySelector('#flechitaModalBusqueda');
	let menu = document.querySelector('#menuBusqueda');
	let recMenu = menu.getBoundingClientRect();
	let widthMenu = menu.offsetWidth;
	let heightMenu = menu.offsetHeight;
	let modal = document.querySelector('#contMenuBusqueda');
	let recModal = modal.getBoundingClientRect();

	modal.style.display = 'block';
	let _top = heightMenu + recMenu.top;
	modal.style.top = _top+'px';
	let _paddingFlechitaIzq = recMenu.left - recModal.left + widthMenu / 2 - window.innerWidth * 2 / 100;
	flechitaModal.style.paddingLeft = _paddingFlechitaIzq+'px';
	
	if(recModal.left == 0){
		oFunc.fnMostrarMenuBusqueda();
	}
}
oFunc.fnOcultaMenuBusqueda = function(){
	let modal = document.querySelector('#contMenuBusqueda');
	modal.style.display = 'none';
}

// LOGIN
oFunc.fnMostrarMenuLogin = function(){
	oFunc.fnOcultaTodosMenues('login');
	let flechitaModal = document.querySelector('#flechitaModalLogin');
	let menu = document.querySelector('#menuLogin');
	let recMenu = menu.getBoundingClientRect();
	let widthMenu = menu.offsetWidth;
	let heightMenu = menu.offsetHeight;
	let modal = document.querySelector('#contMenuLogin');
	let recModal = modal.getBoundingClientRect();

	modal.style.display = 'block';
	let _top = heightMenu + recMenu.top;
	modal.style.top = _top+'px';
	let _paddingFlechitaIzq = recMenu.left - recModal.left + widthMenu / 2 - window.innerWidth * 2 / 100;
	flechitaModal.style.paddingLeft = _paddingFlechitaIzq+'px';
	
	if(recModal.left == 0){
		oFunc.fnMostrarMenuLogin();
	}
}
oFunc.fnOcultaMenuLogin = function(){
	let modal = document.querySelector('#contMenuLogin');
	modal.style.display = 'none';
}
oFunc.fnValidaCamposLogin = function(){
	let mail = document.querySelector('#liMail').value;
	let pass = document.querySelector('#liClave').value;
	
	if(mail == ''){
		document.querySelector('#reqMailLi').style.display = 'block';
		document.querySelector('#liMail').focus();
		return false;
	}else{
		document.querySelector('#reqMailLi').style.display = 'none';
	}
	var validacionMail = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	if(!validacionMail.test(mail)){
		document.querySelector('#invMailLi').style.display = 'block';
		document.querySelector('#liMail').focus();
		return false;
	}else{
		document.querySelector('#invMailLi').style.display = 'none';
	}
	if(pass == ''){
		document.querySelector('#reqClaveLi').style.display = 'block';
		document.querySelector('#liClave').focus();
		return false;
	}else{
		document.querySelector('#reqClaveLi').style.display = 'none';
	}
	
	return true;
}
oFunc.fnEnviarLogin = function(){
	if(oFunc.fnValidaCamposLogin()){
		document.querySelector('#formLogin').submit();
	}
}

// REGISTRO
oFunc.fnMostrarMenuRegistro = function(){
	oFunc.fnOcultaTodosMenues('registro');
	let flechitaModal = document.querySelector('#flechitaModalLogin');
	let menu = document.querySelector('#menuLogin');
	let recMenu = menu.getBoundingClientRect();
	let widthMenu = menu.offsetWidth;
	let heightMenu = menu.offsetHeight;
	let modal = document.querySelector('#contMenuRegistro');
	let recModal = modal.getBoundingClientRect();

	modal.style.display = 'block';
	let _top = heightMenu + recMenu.top;
	modal.style.top = _top+'px';
	let _paddingFlechitaIzq = recMenu.left - recModal.left + widthMenu / 2 - window.innerWidth * 2 / 100;
	flechitaModal.style.paddingLeft = _paddingFlechitaIzq+'px';
	
	if(recModal.left == 0){
		oFunc.fnMostrarMenuRegistro();
	}
}
oFunc.fnOcultaMenuRegistro = function(){
	let modal = document.querySelector('#contMenuRegistro');
	modal.style.display = 'none';
}