<?php session_start();
//if(!isset($_SESSION['DBTips'])){die();}
include "../core/php/conexion.php";


$opcion=$_POST["opcion"];

if($opcion=="RegisterNewUser"){

	$email=$_POST["email"];
	$data['respuesta']=true;
	echo json_encode($data);
}
elseif($opcion=="RegisterFreeNewUser"){	

	$array_user = array();
	$array_user["email"]=$_POST["email"];
	$array_user["name"]=$_POST["name"];
	$array_user["lastname"] =$_POST["lastname"];
	$array_user["address"]=$_POST["address"];
	$array_user["zipcode"] =$_POST["zipcode"];
	$array_user["country"] =$_POST["country"];
	$array_user["state"]=$_POST["state"];
	$array_user["psw"]=$_POST["psw"];

	require_once("../model/Subscription.php");
	$subscription=new Subscription();

	$resultado=$subscription->InsertNewUser($array_user);
	if($resultado["respuesta"]){
		$data['respuesta']=true;
		$data['page']="statitics";
		echo json_encode($data);
	}
	else{
		echo $resultado["mensaje"];
	}
}