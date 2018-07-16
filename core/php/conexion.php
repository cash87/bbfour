<?php	
function conexion($query){
	if(!isset($_SESSION['DBTips'])){
		//$servidor= array('server' => "10.181.133.195",'user' => "root",'pass' => "Nextengo");
		//$servidor= array('server' => "192.168.125.208",'user' => "root",'pass' => "N3xt3ng@");
		$servidor= array('server' => "localhost",'user' => "tips",'pass' => "Sp0rt1p5");
	}
	else{
		$servidor= array('server' => "127.0.0.1",'user' => $_SESSION['DBTips']['email'],'pass' => $_SESSION['DBTips']['password']);
	}
	$dbname="tips";
	$resultados= null;
	$con=null;

	try{
		$con=new PDO("mysql:host=".$servidor['server'].";dbname=$dbname;",$servidor['user'],$servidor['pass'],array(PDO::MYSQL_ATTR_LOCAL_INFILE=>true,PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES latin1"));
	}catch(PDOException $e){
		$resultados[]=array('evento' =>"error",'msg' =>" >>>> ".$e->getMessage()."\n");
		return $resultados;
	}

	try{
		$result= $con->query($query,PDO::FETCH_ASSOC);
	}catch(PDOException $e){
		$resultados[]=array('evento' =>"error",'msg' =>" >>>> ".$e->getMessage()."\n");
		$con=null;
		return $resultados;
	}

	if($result){
		try{
			$tuplas=$result->fetchAll();
			$resultados[]=array('evento' =>"correcto",'msg' =>"Consulta ejecutada correctamente\n",'numRegs' =>$result->rowCount(),'id' =>$con->lastInsertId());
			if($result->rowCount()==0){
				for ($i=0;$i<$result->columnCount();$i++) {
					$tuplas[0][$result->getColumnMeta($i)['name']]="";
				}
			}
			$resultados=array_merge($resultados,$tuplas);
		}catch(PDOException $e){
				$resultados[]=array('evento' =>"correcto",'msg' =>"Consulta ejecutada correctamente\n",'numRegs' =>$result->rowCount(),'id' =>$con->lastInsertId());
		}
	}
	else{
		$resultados[]=array('evento' =>"error",'msg' =>"$query >>>> ".implode($con->errorInfo())."\n");
	}
	$con=null;
	return ($resultados);
}