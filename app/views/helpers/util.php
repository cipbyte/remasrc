<?php
class UtilHelper extends AppHelper {
	
	/**
	 * armaFecha
	 * Formatea una fecha a DDMMAAAA
	 * @param $fecha
	 * @return unknown_type
	 */
	function armaFecha($fecha){
		$dia = date('d',strtotime($fecha));
		$mes = date('m',strtotime($fecha));
		$anio = date('Y',strtotime($fecha));		
		return date('d-m-Y',mktime(0,0,0,$mes,$dia,$anio));
	}
	
	function nf($numero,$decimales=2){
		return number_format($numero,$decimales);
	}
	
	/**
	 * hoy
	 * genera un string con el d�a de la fecha en distintos formatos 
	 *
	 * @param boolean $str especifica si la fecha se muestra como string
	 * @param boolean $diaSemana especifica si se muestra el d�a de la semana
	 * @param boolean $hora especifica si se muestra la hora
	 */
	function hoy($str=false,$diaSemana=false,$hora=false){
		$hoy = "";
		$Dias = array('Domingo','Lunes','Martes','Miercoles','Jueves','Viernes','Sabado');
		$Meses = array('01' => 'Enero', '02' => 'Febrero', '03' => 'Marzo', '04' => 'Abril', '05' => 'Mayo', '06' => 'Junio', '07' => 'Julio', '08' => 'Agosto', '09' => 'Septiembre', '10' => 'Octubre', '11' => 'Noviembre', '12' => 'Diciembre');
		if($str && $diaSemana){
			$hoy = 	$Dias[date('w')].", ". date('j')." de ".$Meses[date('m')]." de ".date('Y');
		}else if($str && !$diaSemana){
			$hoy = 	date('d')." de ".$Meses[date('m')]." de ".date('Y');
		}else if($hora){
			$hoy = date('d-m-Y H:m:s');
		}else{
			$hoy = date('d-m-Y');
		}
		print $hoy;
	}

	
	
	function periodo($periodo,$ampliado=false,$separador=" / "){
		$meses = array('01' => 'ENE', '02' => 'FEB', '03' => 'MAR', '04' => 'ABR', '05' => 'MAY', '06' => 'JUN', '07' => 'JUL', '08' => 'AGO', '09' => 'SEP', '10' => 'OCT', '11' => 'NOV', '12' => 'DIC');	
		$mesesA = array('01' => 'ENERO', '02' => 'FEBRERO', '03' => 'MARZO', '04' => 'ABRIL', '05' => 'MAYO', '06' => 'JUNIO', '07' => 'JULIO', '08' => 'AGOSTO', '09' => 'SEPTIEMBRE', '10' => 'OCTUBRE', '11' => 'NOVIEMBRE', '12' => 'DICIEMBRE');
		if(!$ampliado)return $meses[substr($periodo,4,2)] . '-'.substr($periodo,0,4);
		else return $mesesA[substr($periodo,4,2)] . $separador .substr($periodo,0,4);
	}
	
	function mesToStr($mes,$ampliado=false){
		$meses = array('01' => 'ENE', '02' => 'FEB', '03' => 'MAR', '04' => 'ABR', '05' => 'MAY', '06' => 'JUN', '07' => 'JUL', '08' => 'AGO', '09' => 'SEP', '10' => 'OCT', '11' => 'NOV', '12' => 'DIC');	
		$mesesA = array('01' => 'ENERO', '02' => 'FEBRERO', '03' => 'MARZO', '04' => 'ABRIL', '05' => 'MAYO', '06' => 'JUNIO', '07' => 'JULIO', '08' => 'AGOSTO', '09' => 'SEPTIEMBRE', '10' => 'OCTUBRE', '11' => 'NOVIEMBRE', '12' => 'DICIEMBRE');
		if(!$ampliado)return $meses[$mes];
		else return $mesesA[$mes];
	}
	
	
	function cmbPeriodoSocio($periodos){
		$cmbValues = array();
		foreach($periodos as $idx => $periodo){
			$cmbValues[$periodo] = $this->periodo($periodo,true);
		}
		return $cmbValues;
	}

	
	function globalDato($id,$field='concepto_1'){
		App::import('Model','Global.GlobalDato');
		$oGlb = new GlobalDato();
		$dato = $oGlb->read($field,$id);
		return  $dato['GlobalDato'][$field];
	}
	
	function Centenas($VCentena) {
		$Numeros[0] = "cero";
		$Numeros[1] = "uno";
		$Numeros[2] = "dos";
		$Numeros[3] = "tres";
		$Numeros[4] = "cuatro";
		$Numeros[5] = "cinco";
		$Numeros[6] = "seis";
		$Numeros[7] = "siete";
		$Numeros[8] = "ocho";
		$Numeros[9] = "nueve";
		$Numeros[10] = "diez";
		$Numeros[11] = "once";
		$Numeros[12] = "doce";
		$Numeros[13] = "trece";
		$Numeros[14] = "catorce";
		$Numeros[15] = "quince";
		$Numeros[20] = "veinte";
		$Numeros[30] = "treinta";
		$Numeros[40] = "cuarenta";
		$Numeros[50] = "cincuenta";
		$Numeros[60] = "sesenta";
		$Numeros[70] = "setenta";
		$Numeros[80] = "ochenta";
		$Numeros[90] = "noventa";
		$Numeros[100] = "ciento";
		$Numeros[101] = "quinientos";
		$Numeros[102] = "setecientos";
		$Numeros[103] = "novecientos";
		If ($VCentena == 1) { return $Numeros[100]; }
		Else If ($VCentena == 5) { return $Numeros[101];}
		Else If ($VCentena == 7 ) {return ( $Numeros[102]); }
		Else If ($VCentena == 9) {return ($Numeros[103]);}
		Else {return $Numeros[$VCentena];}
	}

	function Unidades($VUnidad) {
		$Numeros[0] = "cero";
		$Numeros[1] = "un";
		$Numeros[2] = "dos";
		$Numeros[3] = "tres";
		$Numeros[4] = "cuatro";
		$Numeros[5] = "cinco";
		$Numeros[6] = "seis";
		$Numeros[7] = "siete";
		$Numeros[8] = "ocho";
		$Numeros[9] = "nueve";
		$Numeros[10] = "diez";
		$Numeros[11] = "once";
		$Numeros[12] = "doce";
		$Numeros[13] = "trece";
		$Numeros[14] = "catorce";
		$Numeros[15] = "quince";
		$Numeros[20] = "veinte";
		$Numeros[30] = "treinta";
		$Numeros[40] = "cuarenta";
		$Numeros[50] = "cincuenta";
		$Numeros[60] = "sesenta";
		$Numeros[70] = "setenta";
		$Numeros[80] = "ochenta";
		$Numeros[90] = "noventa";
		$Numeros[100] = "ciento";
		$Numeros[101] = "quinientos";
		$Numeros[102] = "setecientos";
		$Numeros[103] = "novecientos";

		$tempo=$Numeros[$VUnidad];
		return $tempo;
	}

	function Decenas($VDecena) {
		$Numeros[0] = "cero";
		$Numeros[1] = "uno";
		$Numeros[2] = "dos";
		$Numeros[3] = "tres";
		$Numeros[4] = "cuatro";
		$Numeros[5] = "cinco";
		$Numeros[6] = "seis";
		$Numeros[7] = "siete";
		$Numeros[8] = "ocho";
		$Numeros[9] = "nueve";
		$Numeros[10] = "diez";
		$Numeros[11] = "once";
		$Numeros[12] = "doce";
		$Numeros[13] = "trece";
		$Numeros[14] = "catorce";
		$Numeros[15] = "quince";
		$Numeros[20] = "veinte";
		$Numeros[30] = "treinta";
		$Numeros[40] = "cuarenta";
		$Numeros[50] = "cincuenta";
		$Numeros[60] = "sesenta";
		$Numeros[70] = "setenta";
		$Numeros[80] = "ochenta";
		$Numeros[90] = "noventa";
		$Numeros[100] = "ciento";
		$Numeros[101] = "quinientos";
		$Numeros[102] = "setecientos";
		$Numeros[103] = "novecientos";
		$tempo = ($Numeros[$VDecena]);
		return $tempo;
	}

	function NumerosALetras($Numero){

		$Decimales = 0;
		//$Numero = intval($Numero);
		$letras = "";

		while ($Numero != 0){

			// '*---> Validaci�n si se pasa de 100 millones

			if ($Numero >= 1000000000) {
				$letras = "Error en Conversion a Letras";
				$Numero = 0;
				$Decimales = 0;
			}

			// '*---> Centenas de Mill�n
			if (($Numero < 1000000000) && ($Numero >= 100000000)){
				if ((Intval($Numero / 100000000) == 1) && (($Numero - (Intval($Numero / 100000000) * 100000000)) < 1000000)){
					$letras .= (string) "cien millones ";
				}else {
					$letras = $letras & $this->Centenas(Intval($Numero / 100000000));
					if ((Intval($Numero / 100000000) <> 1) && (Intval($Numero / 100000000) <> 5) And (Intval($Numero / 100000000) <> 7) And (Intval($Numero / 100000000) <> 9)) {
						$letras .= (string) "cientos ";
					}else {
						$letras .= (string) " ";
					}
				}
				$Numero = $Numero - (Intval($Numero / 100000000) * 100000000);
			}

			// '*---> Decenas de Millon
			if (($Numero < 100000000) && ($Numero >= 10000000)) {
				if (Intval($Numero / 1000000) < 16) {
					$tempo = $this->Decenas(Intval($Numero / 1000000));
					$letras .= (string) $tempo;
					$letras .= (string) " millones ";
					$Numero = $Numero - (Intval($Numero / 1000000) * 1000000);
				}else {
					$letras = $letras & $this->Decenas(Intval($Numero / 10000000) * 10);
					$Numero = $Numero - (Intval($Numero / 10000000) * 10000000);
					if ($Numero > 1000000) {
						$letras .= $letras & " y ";
					}
				}
			}

			// '*---> Unidades de Mill�n
			if (($Numero < 10000000) And ($Numero >= 1000000)) {
				$tempo=(Intval($Numero / 1000000));
				if ($tempo == 1) {
					$letras .= (string) " un millon ";
				}else {
					$tempo= $this->Unidades(Intval($Numero / 1000000));
					$letras .= (string) $tempo;
					$letras .= (string) " millones ";
				}
				$Numero = $Numero - (Intval($Numero / 1000000) * 1000000);
			}

			// '*---> Centenas de Millar
			if (($Numero < 1000000) && ($Numero >= 100000)) {
				$tempo=(Intval($Numero / 100000));
				$tempo2=($Numero - ($tempo * 100000));
				if (($tempo == 1) && ($tempo2 < 1000)) {
					$letras .= (string) "cien mil ";
				}else {
					$tempo=$this->Centenas(Intval($Numero / 100000));
					$letras .= (string) $tempo;
					$tempo=(Intval($Numero / 100000));
					if (($tempo <> 1) && ($tempo <> 5) && ($tempo <> 7) && ($tempo <> 9)) {
						$letras .= (string) "cientos ";
					}else {
						$letras .= (string) " ";
					}
				}
				$Numero = $Numero - (Intval($Numero / 100000) * 100000);
			}

			// '*---> Decenas de Millar
			if (($Numero < 100000) && ($Numero >= 10000)) {
				$tempo= (Intval($Numero / 1000));
				if ($tempo < 16) {
					$tempo = $this->Decenas(Intval($Numero / 1000));
					$letras .= (string) $tempo;
					$letras .= (string) " mil ";
					$Numero = $Numero - (Intval($Numero / 1000) * 1000);
				}else {
					$tempo = $this->Decenas(Intval($Numero / 10000) * 10);
					$letras .= (string) $tempo;
					$Numero = $Numero - (Intval(($Numero / 10000)) * 10000);
					if ($Numero > 1000) {
						$letras .= (string) " y ";
					}else {
						$letras .= (string) " mil ";
					}
				}
			}

			// '*---> Unidades de Millar
			if (($Numero < 10000) And ($Numero >= 1000)) {
				$tempo=(Intval($Numero / 1000));
				if ($tempo == 1) {
					$letras .= (string) "un";
				}else {
					$tempo = $this->Unidades(Intval($Numero / 1000));
					$letras .= (string) $tempo;
				}
				$letras .= (string) " mil ";
				$Numero = $Numero - (Intval($Numero / 1000) * 1000);
			}

			// '*---> Centenas
			if (($Numero < 1000) && ($Numero > 99)) {
				if ((Intval($Numero / 100) == 1) && (($Numero - (Intval($Numero / 100) * 100)) < 1)) {
					$letras = $letras & "cien ";
				}else {
					$temp=(Intval($Numero / 100));
					$l2=$this->Centenas($temp);
					$letras .= (string) $l2;
					if ((Intval($Numero / 100) <> 1) && (Intval($Numero / 100) <> 5) && (Intval($Numero / 100) <> 7) && (Intval($Numero / 100) <> 9)) {
						$letras .= "cientos ";
					}else {
						$letras .= (string) " ";
					}
				}
				$Numero = $Numero - (Intval($Numero / 100) * 100);
			}

			// '*---> Decenas
			if (($Numero < 100) And ($Numero > 9) ) {
				if ($Numero < 16 ) {
					$tempo = $this->Decenas(Intval($Numero));
					$letras .= $tempo;
					$Numero = $Numero - Intval($Numero);
				}else {
					$tempo= $this->Decenas(Intval(($Numero / 10)) * 10);
					$letras .= (string) $tempo;
					$Numero = $Numero - (Intval(($Numero / 10)) * 10);
					if ($Numero > 0.99) {
						$letras .=(string) " y ";
					}
				}
			}

			// '*---> Unidades
			if (($Numero < 10) And ($Numero > 0.99)) {
				$tempo=$this->Unidades(Intval($Numero));
				$letras .= (string) $tempo;
				$Numero = $Numero - Intval($Numero);
			}

			// '*---> Decimales
			if ($Decimales > 0) {
				// $letras .=(string) " con ";
				// $Decimales= $Decimales*100;
				// echo ("*");
				// $Decimales = number_format($Decimales, 2);
				// echo ($Decimales);
				// $tempo = Decenas(Intval($Decimales));
				// $letras .= (string) $tempo;
				// $letras .= (string) "centavos";
			}else {
				if (($letras <> "Error en Conversion a Letras") && (strlen(Trim($letras)) > 0)) {
					$letras .= (string) " ";
				}
			}
			return $letras;
		}
	}

	function num2letras($Numero){
		$str = "";
		$tt = $Numero;
		$tt = $tt+0.009;
		$Numero = intval($tt);
		$Decimales = $tt - Intval($tt);
		$Decimales= $Decimales*100;
		$Decimales= Intval($Decimales);
		$str = $this->NumerosALetras($Numero);
		if ($Decimales > 0){
			//$y=self::NumerosALetras($Decimales);
			$str .= " con $Decimales/100.-";
		}
		$str = strtoupper($str);
		return $str;
	}		
	

}
?>