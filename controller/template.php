<?php //session_start(true);
include "../core/php/conexion.php";
$opcion=$_POST["opcion"];
if($opcion=="load") {
	/*
	if(!isset($_SESSION['DBTips'])){
		echo json_encode(array('respuesta' =>false,'mensaje' =>"Usuario Invalido"));
	}
	else{
		$dteDiff  = $_SESSION['DBTips']["fecha"]->diff(new DateTime()); 
		if($dteDiff->format("%i")>29){
			echo json_encode(array('respuesta' =>false,'mensaje' =>"Usuario Invalido",'tiempo'=>$dteDiff->format("%i")));
		}
		else{
			require_once("../model/Ingreso.php");
			$Ingreso=new Ingreso();
			$resultado=$Ingreso->getIpValida($_SESSION['DBTips']["id"]);
			if($resultado["respuesta"]){
				if($Ingreso->getData()[0]["cuenta"]>0){
					echo json_encode(array('respuesta' =>true,'mensaje' =>"Usuario Correcto",'tiempo'=>$dteDiff->format("%i")));
				}
				else{
					echo json_encode(array('respuesta' =>false,'mensaje' =>"Usuario Invalido"));
				}
			}
			else{
				echo json_encode(array('respuesta' =>false,'mensaje' =>"Usuario Invalido"));
			}
		}
	}
	*/
	echo json_encode(array('respuesta' =>true,'mensaje' =>"Usuario Correcto"));
}
elseif($opcion=="activo") {
	//if(!isset($_SESSION['DBTips'])){
		echo json_encode(true);
	//}
	//else{
	//	$_SESSION['DBTips']["fecha"]=new DateTime();
	//	echo json_encode(true);
	//}
}
/*
elseif($opcion=="menu") {
	$respuesta="";

	require_once("../model/Ingreso.php");
	$Ingreso=new Ingreso();
	$resultado=$Ingreso->getPermisosUsuario($_SESSION['DBTips']["id"]);

	if($resultado["respuesta"]){
		$paginas=$Ingreso->getData()[0];
		$resultado2=$Ingreso->menu($_SESSION['DBTips']["id"]);
		if($resultado2["respuesta"]){
			$menu=$Ingreso->getData();
			$arrayMenu = array();
			foreach ($paginas as $key => $value) {
				foreach ($menu as $key2 => $value2) {
					if ($value2['paginas_col']===$key && $value==1){
						if($value2['idmenu_padre']!=""){
							if(array_key_exists($value2['idmenu_padre'], $arrayMenu)){
								$arrayMenu[$value2['idmenu_padre']]["hijos"][]=$value2;
							}
							else{
								$arrayMenu[$value2['idmenu_padre']]=$menu[array_search($value2['idmenu_padre'],array_column($menu, 'idmenu'))];
								$arrayMenu[$value2['idmenu_padre']]["hijos"][]=$value2;
							}
						}
						else{
							$arrayMenu[$value2['idmenu']]=$value2;
							$arrayMenu[$value2['idmenu']]["hijos"]=array();
						}
					}
				}
			}
			$respuesta.="<nav class='navbar navbar-inverse navbar-fixed-top' style='cursor: pointer; '>
							<div class='container-fluid'>
								<div class='navbar-header '>
									<button type='button' class='navbar-toggle' data-toggle='collapse' data-target='#navbar'>
										<div class='visible-sm visible-md visible-lg' style='color: white;'>MENU CASE <span class='glyphicon glyphicon-chevron-down'></span>
										</div>
										<div class='visible-xs'>
											<span class='icon-bar'></span>
											<span class='icon-bar'></span>
											<span class='icon-bar'></span>
										</div>
									</button>
									<a class='navbar-brand' style='color: white;font-size:100%;'>BIENVENID@ ".$_SESSION['DBTips']['nombre']."</a>
								</div>

							<div class='collapse navbar-collapse ' id='navbar'>";
			

			$respuesta.="<ul class='nav navbar-nav'>";
			usort($arrayMenu, function($a, $b) {
			    return $a['menu'] > $b['menu'];
			});
			foreach ($arrayMenu as $key => $value) {
				if(count($value['hijos'])==0){
					if($value['externa']==0){
						$respuesta.="<li><a onclick=menuRedir('".$value['url']."') title='".$value['menu']."'>";
					}else{
						$respuesta.="<li><a href='".$value['url']."' title='".$value['menu']."'>";
					}
					
					if($value['siglas']!=""){
						$respuesta.="<div>".$value['menu']."</div>";
					}
					else{
						$respuesta.=$value['menu'];
					}

					$respuesta.="</a></li>";
				}
				else{
					$respuesta.="<li class='dropdown'><a class='dropdown-toggle' data-toggle='dropdown' title='".$value['menu']."'>";
					if($value['siglas']!=""){
						$respuesta.="<div>".$value['menu']."<span class='caret'></span></div>";
					}
					else{
						$respuesta.=$value['menu']."<span class='caret'></span>";
					}
					$respuesta.="</a><ul class='dropdown-menu'>";
					foreach ($value['hijos'] as $key2 => $value2) {
						if($value2['externa']==0){
							$respuesta.="<li><a onclick=menuRedir('".$value2['url']."')>";
						}else{
							$respuesta.="<li><a href='".$value2['url']."'>";
						}
						if($value2['siglas']!=""){
							$respuesta.="<div>".$value2['menu']."</div>";
						}
						else{
							$respuesta.=$value2['menu'];
						}
						$respuesta.="</a></li>";
					}
					$respuesta.="</ul>";
					$respuesta.="</li>";
				}
			}
			$respuesta.="</ul>";
			$respuesta.="<ul class='nav navbar-nav navbar-right'>";
				$respuesta.="<li><a onclick=menuRedir('navbarLogOut')><span class='glyphicon glyphicon-log-out'></span> Logout</a></li>";
			$respuesta.="</ul>";
			
			
			echo $respuesta;
		}
		else{
			$respuesta.="<p class='navbar-text'>Error al accesar</p>";
			$respuesta.="<ul class='nav navbar-nav navbar-right'>";
				$respuesta.="<li><a onclick=menuRedir('navbarLogOut')><span class='glyphicon glyphicon-log-out'></span> Logout</a></li>";
			$respuesta.="</ul>";
			echo $respuesta;
		}
	}
	else{
		$respuesta.="<p class='navbar-text'>Error al accesar</p>";
		$respuesta.="<ul class='nav navbar-nav navbar-right'>";
			$respuesta.="<li><a onclick=menuRedir('navbarLogOut')><span class='glyphicon glyphicon-log-out'></span> Logout</a></li>";
		$respuesta.="</ul>";
		$respuesta.="</div>";
		$respuesta.="</div>";
		$respuesta.="</nav>";
		
		echo $respuesta;
	}
}*/

elseif($opcion=="pagina"){
	echo '
		<link rel="stylesheet" href="core/assets/css/bootstrapValidator.min.css?'.date('l jS \of F Y h:i:s A').'" />
		<link rel="stylesheet" href="core/assets/css/bootstrap-datepicker3.standalone.min.css?'.date('l jS \of F Y h:i:s A').'" />
		<link rel="stylesheet" href="core/assets/css/bootstrap-select.min.css?'.date('l jS \of F Y h:i:s A').'" />
		<link rel="stylesheet" href="core/assets/bootstrap-table/bootstrap-table.css?'.date('l jS \of F Y h:i:s A').'" />
		<link rel="stylesheet" href="core/assets/css/bootstrap2-toggle.min.css?'.date('l jS \of F Y h:i:s A').'" />
		<link rel="stylesheet" href="core/assets/font-awesome/css/font-awesome.css?'.date('l jS \of F Y h:i:s A').'" />
		<link rel="stylesheet" href="core/assets/css/bootstrap-datetimepicker.css?'.date('l jS \of F Y h:i:s A').'" />
		

		<script src="core/assets/js/bootstrapValidator.min.js?'.date('l jS \of F Y h:i:s A').'"></script>
		<script src="core/assets/js/bootstrap-datepicker.min.js?'.date('l jS \of F Y h:i:s A').'"></script>
		<script src="core/assets/js/bootstrap-datepicker.es.min.js?'.date('l jS \of F Y h:i:s A').'" charset="UTF-8"></script>
		<script src="core/assets/js/bootstrap-select.min.js?'.date('l jS \of F Y h:i:s A').'"></script>
		<script src="core/assets/bootstrap-table/bootstrap-table.js?'.date('l jS \of F Y h:i:s A').'"></script>
		<script src="core/assets/bootstrap-table/locale/bootstrap-table-es-MX.js?'.date('l jS \of F Y h:i:s A').'"></script>
		<script src="core/assets/js/bootstrap2-toggle.min.js?'.date('l jS \of F Y h:i:s A').'"></script>
		


		<script src="core/assets/js/moment.js?'.date('l jS \of F Y h:i:s A').'"></script>
		<script src="core/assets/js/transition.js?'.date('l jS \of F Y h:i:s A').'"></script>
		<script src="core/assets/js/collapse.js?'.date('l jS \of F Y h:i:s A').'"></script>
		<script src="core/assets/js/bootstrap-datetimepicker.js?'.date('l jS \of F Y h:i:s A').'"></script>
		<script src="core/assets/js/es.js?'.date('l jS \of F Y h:i:s A').'"></script>


	';
}
elseif ($opcion=="redireccion") {
	//echo "redirected";
	echo '
		<link rel="stylesheet" href="core/assets/css/bootstrapValidator.min.css?'.date('l jS \of F Y h:i:s A').'" />
		<link rel="stylesheet" href="core/assets/css/bootstrap-datepicker3.standalone.min.css?'.date('l jS \of F Y h:i:s A').'" />
		<link rel="stylesheet" href="core/assets/css/bootstrap-select.min.css?'.date('l jS \of F Y h:i:s A').'" />
		<link rel="stylesheet" href="core/assets/bootstrap-table/bootstrap-table.css?'.date('l jS \of F Y h:i:s A').'" />
		<link rel="stylesheet" href="core/assets/css/bootstrap2-toggle.min.css?'.date('l jS \of F Y h:i:s A').'" />
		<link rel="stylesheet" href="core/assets/font-awesome/css/font-awesome.css?'.date('l jS \of F Y h:i:s A').'" />
		<link rel="stylesheet" href="core/assets/css/bootstrap-datetimepicker.css?'.date('l jS \of F Y h:i:s A').'" />

		<script src="core/assets/js/bootstrapValidator.min.js?'.date('l jS \of F Y h:i:s A').'"></script>
		<script src="core/assets/js/bootstrap-datepicker.min.js?'.date('l jS \of F Y h:i:s A').'"></script>
		<script src="core/assets/js/bootstrap-datepicker.es.min.js?'.date('l jS \of F Y h:i:s A').'" charset="UTF-8"></script>
		<script src="core/assets/js/bootstrap-select.min.js?'.date('l jS \of F Y h:i:s A').'"></script>
		<script src="core/assets/bootstrap-table/bootstrap-table.js?'.date('l jS \of F Y h:i:s A').'"></script>
		<script src="core/assets/bootstrap-table/locale/bootstrap-table-es-MX.js?'.date('l jS \of F Y h:i:s A').'"></script>
		<script src="core/assets/js/bootstrap2-toggle.min.js?'.date('l jS \of F Y h:i:s A').'"></script>



		<script src="core/assets/js/moment.js?'.date('l jS \of F Y h:i:s A').'"></script>
		<script src="core/assets/js/transition.js?'.date('l jS \of F Y h:i:s A').'"></script>
		<script src="core/assets/js/collapse.js?'.date('l jS \of F Y h:i:s A').'"></script>
		<script src="core/assets/js/bootstrap-datetimepicker.js?'.date('l jS \of F Y h:i:s A').'"></script>
		<script src="core/assets/js/es.js?'.date('l jS \of F Y h:i:s A').'"></script>
		
	';

	if(isset($_POST["sessionVars"])){
		$_SESSION["DBTipsVars"]=$_POST["sessionVars"];
	}

	if(isset($_POST["redireccion"])){
		$redireccion=$_POST["redireccion"];
		require_once("../view/".$redireccion.".html");
		if (file_exists("../css/".$redireccion.".css")){
			echo "<link rel='stylesheet' href='css/".$redireccion.".css?".date('l jS \of F Y h:i:s A')."' />";
		}
		if (file_exists("../js/".$redireccion.".js")){
			echo "<script src='js/".$redireccion.".js?".date('l jS \of F Y h:i:s A')."'></script>";
		}
		
		
	}
}
elseif ($opcion=="logout"){
	require_once("../model/Ingreso.php");
	$Ingreso=new Ingreso();

	//$resultado=$Ingreso->deleteIpUsuario($_SESSION['DBTips']["id"]);
	//session_destroy();
}
?>
