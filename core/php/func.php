<?php
function vivo($fecha,$down,$min){
	if($min=="" || $down=="" || !(preg_match('/\:/',$fecha))){
		$desde="";
	}
	else{
		if(preg_match('/\:/',$down) && preg_match('/[0-9]+/',$down)){
			$date2=date_create($fecha);
			$a = preg_replace('/([0-9]{2})\:([0-9]{2})\:([0-9]{2})/','\\1',$down);
			$b = preg_replace('/([0-9]{2})\:([0-9]{2})\:([0-9]{2})/','\\2',$down);
			$c = preg_replace('/([0-9]{2})\:([0-9]{2})\:([0-9]{2})/','\\3',$down);
			$date2->modify('-'.$c.' seconds');
			$date2->modify('-'.$b.' minutes');
			$date2->modify('-'.$a.' hours');
			$desde = $date2->format('Y-m-d H:i:s');
		}
		else{
			$date2=date_create($fecha);
			$date2->modify('-'.$min.' seconds');
			$desde = $date2->format('Y-m-d H:i:s');
		}
	}
	return $desde;
}

function restarSegundos($f1,$segundos){
	$date1=new DateTime($f1);
	$tiempo="-".$segundos." second";
	$date1->modify("$tiempo");
	return $date1->format("Y-m-d H:i:s");
}

function diferencia($f1,$f2){
	$date1=date_create($f1);
	$date2=date_create($f2);
	$inter=@date_diff($date1,$date2);
	$ds = @$inter->format('%a');
	$hs = @$inter->format('%H');
	$ms = @$inter->format('%i');
	$ss = @$inter->format('%s');
	if(!(preg_match('/[0-9]{2}/',$hs))){
		$hs="0".$hs;
	}
	if(!(preg_match('/[0-9]{2}/',$ms))){
		$ms="0".$ms;
	}
	if(!(preg_match('/[0-9]{2}/',$ss))){
		$ss="0".$ss;
	}
	return $ds." dias / ".$hs.":".$ms.":".$ss;
}

function diferenciaSegundos($f1,$f2){
	$date1=date_create($f1);
	$date2=date_create($f2);
	$inter=@date_diff($date1,$date2);
	$ds = @$inter->format('%a');
	$hs = @$inter->format('%H');
	$ms = @$inter->format('%i');
	$ss = @$inter->format('%s');
	if(!(preg_match('/[0-9]{2}/',$hs))){
		$hs="0".$hs;
	}
	if(!(preg_match('/[0-9]{2}/',$ms))){
		$ms="0".$ms;
	}
	if(!(preg_match('/[0-9]{2}/',$ss))){
		$ss="0".$ss;
	}
	$resul= ((((($ds*24)*60)*60)+(($hs*60)*60))+($ms*60))+$ss;
	return $resul;
}

function uptimeSegundos($a){
	$v1=0;
	$v2=0;
	$v3=0;
	if($a ==""){
		$ss="0";
		return $ss;
	}
	elseif(preg_match('/\:/',$a)){
		$dd=explode(":",$a);
		$hs=($dd[0]*60)*60;
		$ms=($dd[1]*60);
		$ss=($dd[2]+$ms)+$hs;
		return $ss;
	}
	else{
		$n1=preg_replace('/([0-9]+)([a-z]+)([0-9]+)([a-z]+)/',"\\1",$a);
		$d1=preg_replace('/([0-9]+)([a-z]+)([0-9]+)([a-z]+)/',"\\2",$a);
		$n2=preg_replace('/([0-9]+)([a-z]+)([0-9]+)([a-z]+)/',"\\3",$a);
		$d2=preg_replace('/([0-9]+)([a-z]+)([0-9]+)([a-z]+)/',"\\4",$a);
		if($d1=="y"){
			$v1=((($n1*365)*24)*60)*60;
		}
		else{
			if($d1=="w"){
				$v1=((($n1*7)*24)*60)*60;
			}
			else{
				if($d1=="d"){
					$v1=(($n1*24)*60)*60;
				}
			}
		}

		if($d2=="y"){
			$v2=(($n2*365*24)*60)*60;
			$v3=0;
		}
		else{
			if($d2=="w"){
				$v2=(($n2*7*24)*60)*60;
				$v3=0;
			}
			else{
				if($d2=="d"){
					$v2=(($n2*24)*60)*60;
					$v3=0;
				}
				else{
					$v2=0;
					$v3=($n2*60)*60;
				}
			}
		}
		$ss=($v1+$v2)+$v3;
		return $ss;
	}
}

function segundos($a){
	$segu=$a;
	$dias = intval((($segu/60)/60)/24);
	$menos = $dias*86400;
	$seg = $segu-$menos;
	$horas = intval(($seg/60)/60);
	$menos = $horas*3600;
	$seg = $seg-$menos;
	$minutos = intval($seg/60);
	$menos = $minutos*60;
	$seg = $seg-$menos;
	$dias=$dias." dias";
	if(!(preg_match('/[0-9]{2}/',$horas))){$horas="0".$horas;}
	if(!(preg_match('/[0-9]{2}/',$minutos))){$minutos="0".$minutos;}
	if(!(preg_match('/[0-9]{2}/',$seg))){$seg="0".$seg;}
	$dif = $dias." / ".$horas.":".$minutos.":".$seg;
	return $dif;
}

function fechaSimbolos($a){
	$a=preg_replace('/^([0-9]{4})([0-9]{2})([0-9]{2})([0-9]{2})([0-9]{2})([0-9]{2})/',"\\1-\\2-\\3 \\4:\\5:\\6",$a);
	return $a;
}

function mesNumero($m){
	switch($m){
		case "Enero":
			$mes="01";
			break;
		case "Febrero":
			$mes="02";
			break;
		case "Marzo":
			$mes="03";
			break;
		case "Abril":
			$mes="04";
			break;
		case "Mayo":
			$mes="05";
			break;
		case "Junio":
			$mes="06";
			break;
		case "Julio":
			$mes="07";
			break;
		case "Agosto":
			$mes="08";
			break;
		case "Septiembre":
			$mes="09";
			break;
		case "Octubre":
			$mes="10";
			break;
		case "Noviembre":
			$mes="11";
			break;
		case "Diciembre":
			$mes="12";
			break;
	}
	return $mes;
}

function diaZero($d){
	if($d<10){
		$d="0".$d;
	}
	return $d;
}

function tranfecha($a){
	$a = preg_replace('/([0-9]{4})([0-9]{2})([0-9]{2})([0-9]{2})([0-9]{2})([0-9]{2})/',"\\1-\\2-\\3 \\4:\\5:\\6",$a);
	return $a;
}
?>
