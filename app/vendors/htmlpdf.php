<?php
App::import('Vendor','tcpdf/tcpdf');

class HTMLPDF extends TCPDF{
	
	function HTMLPDF($orientation='P', $unit='mm', $format='A4', $unicode=true, $encoding='UTF-8', $diskcache=false){
		parent::__construct($orientation, $unit, $format, $unicode, $encoding, $diskcache);
		$this->AliasNbPages();
		$this->SetFontSizeConf(11);
		$this->SetCreator(Configure::read('APLICACION.nombre') . " " . Configure::read('APLICACION.version'));
		$this->SetAuthor("Cordoba Soft IT - www.cordobasoft.com - @2009 All Right Reserved");
//		$this->SetTitle('CONTRATO MUTUO');
		$this->topMargen = $this->tMargin;
		$this->SetAutoPageBreak(true, $this->bMargin);
	}	
	
	function Header() {}
	function Footer() {} 
	
	/**
	 * setea el tamaño por default de la letra
	 * @param $size
	 * @return unknown_type
	 */
	function SetFontSizeConf($size){
		$this->SetFontSize($size);
		$this->actualFontSize = $size;
  		$this->lineheight = 5 * $this->actualFontSize / 11;         // Related to FontSizePt == 11
	}

	
	function imprimir($htmlcontent){
		$this->AddPage();
//		$this->writeHTML($htmlcontent, true, 0, true, 0);
		$this->writeHTML($htmlcontent, true, false, false, false, ''); 
//		true, false, false, false, ''
	}
	
	/**
	 * Restauro valores por defecto
	 * @return unknown_type
	 */
	function Reset(){
		$this->SetFont('courier','',$this->actualFontSize); // Changeable?(not yet...)
  		$this->lineheight = 5 * $this->actualFontSize / 11;         // Related to FontSizePt == 11
	}	
	
}
?>