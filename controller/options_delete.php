<?php session_start();
//if(!isset($_SESSION['DBTips'])){die();}
include "../core/php/conexion.php";

$opcion=$_POST["opcion"];

if($opcion=="freetrial"){
	$data['_form']='

	
		<!--<div class="container">-->
		  <form id="FormSuscribe">
		    <div class="row">
		      <div class="col-25 form-group">
		        <label for="fname" class="input-group-addon">Nombre(s)</label>
		      </div>
		      <div class="col-75 input-group">
		        <input type="text" id="name" name="name" placeholder="Ej. Marco Antonio" class="form-control">
		      </div>
		    </div>
		    <div class="row">
		      <div class="col-25 form-group">
		        <label for="lastname">Apellidos</label>
		      </div>
		      <div class="col-75 input-group">
		        <input type="text" id="lastname" name="lastname" placeholder="Ej. Conte Guardiola" class="form-control">
		      </div>
		    </div>
		    <div class="row">
		      <div class="col-25 form-group">
		        <label for="email">Apellidos</label>
		      </div>
		      <div class="col-75 input-group">
		        <input type="text" id="email" name="email" placeholder="Ej. Conte Guardiola" class="form-control">
		      </div>
		    </div>
		    <div class="row">
		      <div class="col-25 form-group">
		        <label for="address">Direccion</label>
		      </div>
		      <div class="col-75 input-group">
		        <textarea id="address" name="address" placeholder="Av. de la Union #23, Col. Victoria, CDMX CP 03421" style="height:200px" class="form-control"></textarea>
		      </div>
		    </div>
		    <div class="row">
		      <div class="col-25 form-group">
		        <label for="zipcode">CP</label>
		      </div>
		      <div class="col-75 input-group">
		        <input type="text" id="zipcode" name="zipcode" placeholder="Ej. 02849" class="form-control">
		      </div>
		    </div>
		    <div class="row">
		      <div class="col-25 form-group">
		        <label for="country">Country</label>
		      </div>
		      <div class="col-75 input-group">
		        <select id="country" name="country" class="form-control">
		          <option value="mex">Mexico</option>
		          <option value="can">Canada</option>
		          <option value="usa">USA</option>
		        </select>
		      </div>
		    </div>
		    <div class="row">
		      <div class="col-25 form-group">
		        <label for="state">Country</label>
		      </div>
		      <div class="col-75 input-group">
		        <select name="state" id="state" class="form-control">
                    <option value="0"></option>
                    <option value="1">Aguascalientes</option>
                    <option value="2">Baja California</option>
                    <option value="3">Baja California Sur</option>
                    <option value="4">Campeche</option>
                    <option value="5">Coahuila</option>
                    <option value="6">Colima</option>
                    <option value="7">Chiapas</option>
                    <option value="8">Chihuahua</option>
                    <option value="9">DF/CDMX</option>
                    <option value="10">Durango</option>
                    <option value="11">Guanajuato</option>
                    <option value="12">Guerrero</option>
                    <option value="13">Hidalgo</option>
                    <option value="14">Jalisco</option>
                    <option value="15">México</option>
                    <option value="16">Michoacán</option>
                    <option value="17">Morelos</option>
                    <option value="18">Nayarit</option>
                    <option value="19">Nuevo León</option>
                    <option value="20">Oaxaca</option>
                    <option value="21">Puebla</option>
                    <option value="22">Querétaro</option>
                    <option value="23">Quintana Roo</option>
                    <option value="24">San Luis Potosí</option>
                    <option value="25">Sinaloa</option>
                    <option value="26">Sonora</option>
                    <option value="27">Tabasco</option>
                    <option value="28">Tamaulipas</option>
                    <option value="29">Tlaxcala</option>
                    <option value="30">Veracruz</option>
                    <option value="31">Yucatán</option>
                    <option value="32">Zacatecas</option>
                </select>
		      </div>
		    </div>
		    <div class="row">
		      <div class="col-25 form-group">
		        <label for="pswd">Apellidos</label>
		      </div>
		      <div class="col-75 input-group">
		        <input type="password" id="pswd" name="pswd" placeholder="" class="form-control">
		      </div>
		    </div>
		    <div class="row">
		    	<div class="form-group">
		    		<div class="input-group">
		      			<input type="submit" class="btn btn-search" value="Inscribirme">
			      	</div>
			    </div>
		    </div>
		  </form>
		<!--</div>-->';
	$data['respuesta']=true;
	echo json_encode($data);
}
elseif($opcion=="valid_user"){
	/*require_once("../model/FreeTrialSuscribe.php");
	$Evento=new Evento();

	require_once("../model/Excel.php");
	$Excel=new Excel();

	$resultado=$Evento->buscarIncidentes($tipo,$selMes,$fechIni,$fechTer,$selStd);
	$respuesta="";
	if($resultado["respuesta"]){
		$nombre=$Excel->generarExcelIncidentes($Evento->getData());
		$data['nombre']=$nombre;
		$data['numR']=count($Evento->getData());
		echo json_encode($data);
	}
	else{
		echo $resultado["mensaje"];
	}*/
}