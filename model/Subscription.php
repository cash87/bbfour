<?php
class Subscription{

	private $data=array();

	public function __construct(){
	}

	public function getData(){
		return $this->data;
	}

	public function setData($data){
		$this->data=$data;
	}

	public function getCatalogo($id_catalogo_padre){
		$query="SELECT * FROM ciudad_segura.catalogo where id_catalogo_padre=$id_catalogo_padre;";
		$datos=conexion($query);
		$respuesta=array();

		if($datos[0]["evento"]=="correcto"){
			$respuesta=array("respuesta"=>true,"numRegs"=>$datos[0]["numRegs"]);
			array_shift($datos);
			$this->data=$datos;
		}
		else{
			$respuesta=array("respuesta"=>false,"mensaje"=>"error:".$datos[0]["msg"]);
		}
		return $respuesta;
	}

	public function InsertNewUser($array_user){

		$query="INSERT INTO tips.users (name, lastnames, address, state, cp, country, email, password, remember_token, created_at, updated_at) VALUES ('$array_user[name]', '$array_user[lastname]', '$array_user[address]', '$array_user[state]', '$array_user[zipcode]', '$array_user[country]','$array_user[email]', '$array_user[psw]',null,now(),null)";


		$datos=conexion($query);
		$respuesta = array();
		if($datos[0]["evento"]=="correcto"){
			$respuesta=array("respuesta"=>true);
			$this->data=$datos[0];
		}
		else{
			$respuesta=array("respuesta"=>false,"mensaje"=>"error:".$datos[0]["msg"]);
		}
		return $respuesta;
	}
}
?>