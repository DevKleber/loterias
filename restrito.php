<?php

$sessaoUsuario = $_SESSION['mega_cd_user'];
$sair 		   = $_REQUEST['sair'];
$cookieUsuario = $_COOKIE['MEGA_ID_USER'];

$btn_userExistente = $_REQUEST['btn_entrarUserExistente'];
$btn_novoUser 	   = $_REQUEST['btn_novoUser'];

$userExistente 	   = $_REQUEST['entrarUserExistente'];

// alerta("cookie: ".$cookieUsuario);
// alerta("session: ".$sessaoUsuario);

if(isset($sair)){
	// alerta("clicou em sair");
	require_once("login.php");
	removerCookieSession();
	die();
}else{

	if(isset($btn_userExistente)){
		// alerta("clicou em usuario existente");
		$cd_usuario = $megasena->find($userExistente);
		// alerta("usuario: ".$cd_usuario[0]->cd_user);
		$cd_userFind = $cd_usuario[0]->cd_user;
		setLocalStorage("MEGA_ID_USER",$cd_userFind);
		$ls = getLocalStorage("MEGA_ID_USER");
		setcookie("MEGA_ID_USER", $cd_userFind);
		$_SESSION["MEGA_ID_USER"] = $cd_userFind;
		// setcookie("MEGA_ID_USER",$cd_userFind,strtotime( '+1080 days' ));
		$_SESSION['mega_cd_user'] = $cd_userFind;
		// die;
		direciona("index.php");
	}else{
		if(isset($btn_novoUser)){
			alerta("clicou em novo usuario");
			$megasena->incluirUser('user','pass');
			direciona("index.php");
		}
		else{
			// if(!isset($cookieUsuario)){
			if(!$_SESSION["MEGA_ID_USER"]){
				alerta("não existe cookie");
				require_once"login.php";
				die();
			}
		}
	}
}
function setLocalStorage($var,$value){
	print'<script>localStorage.setItem("'.$var.'", "'.$value.'");</script>';
}
function getLocalStorage($var){
	$ls = '<script>var ls = localStorage.getItem("'.$var.'"); </script>';
	return $ls;
}
function direciona($para_url) {
	header('Location: '.$para_url);
	print'<script>window.location="' . $para_url . '"</script>';
}

function alerta($mensagem) {
	echo '<script>alert("' . $mensagem . '");</script>';
}
function removerCookieSession(){

	ob_start();
	setcookie("MEGA_ID_USER", "", time() - 3600);
	unset($_SESSION['mega_cd_user']);

}