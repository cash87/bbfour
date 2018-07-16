<?php 
session_start(['cookie_lifetime' => 3600,'gc_maxlifetime' => 3600,'use_strict_mode' => 1 ]);
include "../core/php/conexion.php";

$opcion=$_POST["opcion"];

if($opcion=="login") {
	require_once "../model/Ingreso.php";
	$usuario=$_POST["usuario"];
	$password=$_POST["password"];
	$Ingreso=new Ingreso($usuario,$password);
	$respuesta=$Ingreso->getUsuario();
	if($respuesta['respuesta']){
		$Ingreso->getData()[0]['tiempo']=0;
		$_SESSION['DBTips']=$Ingreso->getData()[0];
		$_SESSION['DBTips']["fecha"]=new DateTime();
		$respuesta['respuesta']='correcto';
		//$respuesta['area']=$Ingreso->getData()[0]['area'];
		//$respuesta['gerarquia']=$Ingreso->getData()[0]['gerarquia'];
		$respuesta2=$Ingreso->setIpUsuario($Ingreso->getData()[0]['id']);
		if($respuesta2['respuesta']){
			echo json_encode($respuesta);
		}
		else{
			echo json_encode(array('respuesta' =>'noLoger','error' =>$respuesta['mensaje']));
		}
	}
	else{
		echo json_encode(array('respuesta' =>'noLoger','error' =>$respuesta['mensaje']));
	}
}
?>