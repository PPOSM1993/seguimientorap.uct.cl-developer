<?
session_start();

$rut = $_SESSION["_RUTNRO"];
$perfil_codigo = $_SESSION["_PERFIL"];


function err_sesion($msje)
{
?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<!--  Hoja de estilos principal -->
		<link rel="stylesheet" type="text/css" href="css/main_portal.css" media="all" />
		<style>
			* {
				font-family: "Segoe UI", "Trebuchet MS", Geneva, Arial, Helvetica, SunSans-Regular, sans-serif;
				background-color: #fdfdfd;
				text-align: center;
			}

			body {
				background-color: #fdfdfd;
			}

			h4 {
				font-size: 20pt;
				font-weight: bold;
				color: #3366AF;
			}

			h5 {
				font-size: 11pt;
				font-weight: bold;
				color: #3A3A3A;
				margin: 0px
			}

			p {
				font-size: 10pt;
				color: #525C66;
			}

			td {
				font-size: 10pt;
			}
		</style>

		<head>

		<body>
			<div id="banner"></div>
			<?= $msje; ?>
		</body>

	</html>
<?
}




// Si se hizo un bypass desde el portal
if (isset($_POST['btn_intro']) && isset($_POST['hdd_user']) && isset($_POST['hdd_psw'])) {
	$_SESSION['_MASTER_RUT'] = base64_decode($_POST['hdd_user']);	// USUARIO MAESTRO INICIAL, NO CAMBIAR
	$_SESSION['user_actual'] = base64_decode($_POST['hdd_user']);	// USUARIO ACTUAL VIGENTE, PUEDE CAMBIAR

	$_SESSION['user']		= base64_decode($_POST['hdd_user']);	// VARIABLE DEL ESCRITORIO DEL PORTAL, NO CAMBIAR

	$_SESSION['psw']		= base64_decode($_POST['hdd_psw']);
	$_SESSION['log']		= base64_decode($_POST['hdd_log']);
	$_SESSION['sistema']	= base64_decode($_POST['hdd_log']);
}
echo $_SESSION['user_actual'];
echo $_SESSION['sistema'];

//--------------------------------------------------------------------------------------------------------------
//$_RUT 		= '12708007-0';	// RUT DE USUARIO DE PRUEBAS
//--------------------------------------------------------------------------------------------------------------

if (isset($_SESSION['user_actual'])) {
	$_RUT 		= $_SESSION['user_actual'];		// VARIABLE CON EL RUT ACTUAL	
	$_SISTEMA 	= 'SIST-RAP';
} else {
	if ($_SESSION['user_actual'] == "" || $_SESSION['user_actual'] == null) {
		echo 'rut: '. $rut . '<br>';
		echo 'perfil' . $perfil_codigo;
		$mensaje = "<h4>Error de sesión</h4>";
		$mensaje .= "<h5>Ocurrió un error al validar su sesión en el sistema</h5>";
		$mensaje .= "<p>Es probable que su sesión haya expirado, por favor vuelva a ingresar o autenticarse en el sistema.</p>";
	} else {
		$mensaje = "<h4>Error de sesión</h4>";
		$mensaje .= "<h5>Ocurrió un error al validar su sesión en el sistema</h5>";
		$mensaje .= "<p>Probablemente ha intentado ingresar a una página no autorizada para este perfil</p>";
	}
	err_sesion($mensaje);
	die();
}
header("Expires: 0");
header("Pragma: no-cache");

$_SISTEMA 	= 'SIST-RAP';

// Inicia las variables del usuario
$_PERFIL 	= "";		// Perfil predeterminado
$_EMAIL 	= "";		// Correo registrado en la base de seguridad
$_UNOMBRE	= "";		// Nombre completo del usuario

// Establece las variables de usuario y sistema
//$_SESSION["_RUTNRO"]		= $_RUT;
$_SESSION["_RUTNRO"]		= 18484885 - 6; // para trabajar en forma local
$_SESSION["_RUT"]	= substr(trim($_RUT), 0, -2);
$_SESSION["_SISTEMA"] 	= $_SISTEMA;


?>