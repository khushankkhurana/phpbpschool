<?php
class MYPDF extends TCPDF {
     
	 public function Header() {
        // Logo
		$schoolname ="TAGORE SHIKSHA NIKETAN HIGH SCHOOL" ;
		$line1 = "Thai Mohalla, Palwal" ;
        $image_file = '../icon/logo.jpg';
        $this->Image($image_file, 10, 5, 15, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font (35 is x , 8 is y and 20 is size  of logo 
        $this->SetFont('helvetica', 'B', 16);
        // Title
        //$this->Cell(0, 15, 'schoolname', 0, false, 'C', 0, '', 0, false, 'M', 'M');
	  $style = array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0));

	  $this->Ln(1);        
        $this->Cell(0, 0, $schoolname, 0, false, 'C', 0, '', 0, false, 'M', 'M');
        $this->Ln(7);        
        $this->Cell(0, 0, $line1, 0, false, 'C', 0, '', 0, false, 'M', 'M');
	    $this->Ln(1);        
        $this->Cell(0, 0, '_______________________________________________________', 0, false, 'C', 0, '', 0, false, 'M', 'M');
		$this->Ln(7); 
		//$this->Line(10, 30, 200, 30, $style);
	     
      //  $this->Cell(0, 0, 'Palwal', 0, false, 'C', 0, '', 0, false, 'M', 'M');
	 
	 
	 }
		}
		?>