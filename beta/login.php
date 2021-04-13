<?php

	if(
		isset($_POST['login']) and 
		isset($_POST['usuario']) and 
		isset($_POST['clave']) and 
		$_POST['login'] == '1' and 
		$_POST['usuario'] != '' and 
		$_POST['clave'] != ''
	){
		$url = 'https://esferapublica.com.ar/apprn.php';
		$ch = curl_init($url);
		$data = Array(
			'accion' => 'login',
			'params' => Array(
				'usuario' => $_POST['usuario'],
				'pass' => $_POST['clave'],
				'origen' => 'WEB'
			)
		);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$login = curl_exec($ch);
		curl_close($ch);
		
		$login = json_decode($login);
		if($login->ID != 0){
			$_SESSION['idCliente'] = $login->ID;
			$_SESSION['NYA'] = $login->NYA;
		}
	}
	
	if(isset($_POST['logout']) and $_POST['logout'] == '1'){
		$_SESSION['idCliente'] = 0;
		$_SESSION['NYA'] = "";
		session_destroy();
	}
	