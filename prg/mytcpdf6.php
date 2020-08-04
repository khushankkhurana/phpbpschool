<?php
ini_set('display_errors','On');
date_default_timezone_set("Europe/London");
error_reporting(E_ALL & ~E_DEPRECATED & ~E_STRICT & ~E_NOTICE);

require_once "tcpdf_include.php";

class MYPDF extends TCPDF {
    public function Header() {
        $headerData = $this->getHeaderData();
        $this->SetFont('helvetica', 'B', 10);
        $this->writeHTML($headerData['string']);
    }
}
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->setHeaderData($ln='', $lw=0, $ht='', $hs='<table cellspacing="0" cellpadding="1" border="1"><tr><td rowspan="3">test</td><td>test</td><td>test </td></tr></table>', $tc=array(0,0,0), $lc=array(0,0,0));

$pdf->Output('test.pdf', 'I');