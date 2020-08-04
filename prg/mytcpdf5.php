<?php
 
/**
 * pmPdf
 *
 * @author Amos Batto <amos@processmaker.com>
 * @inherits TCPDF
 * @access public
 */ 
 
require_once ("tcpdf_autoconfig.php");
require_once ("tcpdf_include.php");

//custom implementation of TCPDF to override the Header() and Footer() functions
class PmPdf extends TCPDF {
   public $header_align = 'C';      //center align header by default
   public $header_line_width = 0.85;//percentage of the page width
   public $header_line = false;     //set to true to display a line below the header
   
   public $footer_align = 'C';      //center align footer by default
   public $footer_line = false;     //set to true to display a line above the footer
   public $footer_text = '';        //text to display in footer 
   
   /**
     * Print page header in PDF Output Document.
     *
     * @public
     */      
   public function Header() {
        $aFont   = $this->getHeaderFont();
        $aHeader = $this->getHeaderData();
        //Default values for $aHeader:
		$aHeader="Welcome" ;
        //["logo"=>"", "logo_width"=>0, "title"=>"", "string"=>"", "text_color"=>[0=>0, 1=>0, 2=>0], "line_color"=>[0=>0, 1=>0, 2=>0] ]
        
        $this->SetY($this->header_margin-1);
        
        // Set font
        $this->SetFont($aFont[0], $aFont[1], $aFont[2]);
        $this->SetTextColorArray($aHeader['text_color']);
        
        //Insert page number if "{PageNo}" in the text
        $aHdrTexts = preg_split('/{PageNo}/is', $aHeader['string']);
        $sHdrText = '';
        foreach ($aHdrTexts as $str) {
            $sHdrText .= empty($sHdrText) ? $str : $this->PageNo() . $str;
        }
        
        //print header text:
        $this->Cell(0, 0, $sHdrText, 0, false, $this->header_align, 0, '', 0, false, 'B', 'M'); 
        
        if ($this->header_line) {
          $this->SetLineStyle(array('cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => $aHeader['line_color']));
          //$this->SetY((2.835 / $this->k) + max($this->y, $this->y));
          if ($this->rtl) {
             $this->SetX($this->original_rMargin);
          } else {
             $this->SetX($this->original_lMargin);
          }
          $this->Cell(($this->w - $this->original_lMargin - $this->original_rMargin), 0, '', 'T', 2, 'M');
        }
        $this->SetY($this->header_margin);
   } 

   /**
     * Print page footer in PDF Output Document.
     *
     * @public
     */
   public function Footer() {
                
    //Insert page number if "{PageNo}" in the text
        $aTexts = preg_split('/{PageNo}/is', $this->footer_text);
        $sText = '';
        foreach ($aTexts as $str) {
        $sText .= empty($sText) ? $str : $this->PageNo() . $str;
    }
        
    // Set font
        $aFont   = $this->getFooterFont();
        $this->SetFont($aFont[0], $aFont[1], $aFont[2]);
        $this->SetTextColorArray($this->footer_text_color);
        
        //Print footer text with line:
    if ($this->footer_line) {
        $this->SetLineStyle(array('color' => $this->footer_line_color));
        $this->Cell(0, 0, $sText, 'T', 0, $this->footer_align);
    }
    else { //without line
        $this->Cell(0, 0, $sText, 0, false, $this->footer_align, 0, '', 0, false, 'T', 'M');
    }
   }  
   
   /**
     * Function checks whether <header>...</header> tags exist in the content of an output document 
     * and configures that header according to the parameters in the opening <header> tag.
     *
     * @public
     */
   public function SetupHeader($sContent, $topMargin) {
        //check for header text between the <header>...</header> tags
        $aContentParts = preg_split('/<header(.*?)>(.*?)<\/header>/is', $sContent, 2, PREG_SPLIT_DELIM_CAPTURE);
        if (is_array($aContentParts) and count($aContentParts) == 4) {
            $sContent = $aContentParts[0] . $aContentParts[3];
            
            //set default values for PDF generation:
            $margin     = $topMargin; //PDF_MARGIN_HEADER
            $line       = true;     //set to true to display a header line
            $fontFamily = PDF_FONT_NAME_MAIN; 
            $fontStyle  = '';       //can be '' (normal), 'B' (bold), 'I' (italic), 'U' (underlined)
            $fontSize   = '12';     //PDF_FONT_SIZE_MAIN, the size of the header font in points
            $fontColor  = array(0,0,0); //RGB colors
            $lineColor  = array(0,0,0); //RGB colors
            $align      = 'C';      //can be: 'L'/'' (left), 'C' (center), 'R' (right), 'J' (justified)
            $imagePath  = '';       //path to an image to display in the header 
            $imageX     = 0;
            $imageY     = 0;
            $imageWidth = 0;
            
            //check if parameters are set in the <header> tag:
            if (preg_match('/\bmargin\s*=\s*(".*?"|[^\s]+)/is', $aContentParts[1], $aMatches)) {
                $margin = intval(trim($aMatches[1], '"'));
            }    
            if (preg_match('/\bline\s*=\s*(".*?"|[^\s]+)/is', $aContentParts[1], $aMatches)) {
                $val = strtolower(trim($aMatches[1], '"'));
                if ($val == 'true' or $val == 'yes' or intval($val) >= 1) {
                    $line = true;
                } else {
                    $line = false;
                }
            }    
            if (preg_match('/\bfontFamily\s*=\s*(".*?"|[^\s]+)/is', $aContentParts[1], $aMatches)) {
                $fontFamily = trim($aMatches[1], '"');
            }
            if (preg_match('/\bfontStyle\s*=\s*"?(B|I|U)"?/is', $aContentParts[1], $aMatches)) {
                $fontStyle = $aMatches[1];
            }
            if (preg_match('/\bfontSize\s*=\s*(".*?"|[^\s]+)/is', $aContentParts[1], $aMatches)) {
                $fontSize = intval(trim($aMatches[1], '"'));
            }
            if (preg_match('/\balign\s*=\s*"?(L|C|R|J)"?/is', $aContentParts[1], $aMatches)) {
                $align = $aMatches[1];
            }
            if (preg_match('/\bfontColor\s*=\s*"?\s*rgb\((.*?)\)\s*"?/is', $aContentParts[1], $aMatches)) {
                $aRgb = explode(',', $aMatches[1]);
                if (count($aRgb) != 3) {
                    throw new Exception("The rgb($red,$green,$blue) function in <header> needs three parameters");
                }
                $red = intval($aRgb[0]);
                $green = intval($aRgb[1]);
                $blue = intval($aRgb[2]);
                if ($red < 0 or $red > 255 or $green < 0 or $green > 255 or $blue < 0 or $blue > 255) {
                    throw new Exception("The red, green and blue values in <header> are not between 0 and 255");
                }
                $fontColor = array($red, $green, $blue);
            }
            if (preg_match('/\blineColor\s*=\s*"?\s*rgb\((.*?)\)\s*"?/is', $aContentParts[1], $aMatches)) {
                $aRgb = explode(',', $aMatches[1]);
                if (count($aRgb) != 3) {
                    throw new Exception("The rgb($red,$green,$blue) function in <header> needs three parameters");
                }
                $red = intval($aRgb[0]);
                $green = intval($aRgb[1]);
                $blue = intval($aRgb[2]);
                if ($red < 0 or $red > 255 or $green < 0 or $green > 255 or $blue < 0 or $blue > 255) {
                    throw new Exception("The red, green and blue values in <header> are not between 0 and 255");
                }
                $lineColor = array($red, $green, $blue);
            }
            if (preg_match('/\bimage\s*=\s*(".*?"|[^\s]+)/is', $aContentParts[1], $aMatches)) {
                $imagePath = trim($aMatches[1], '"');
            }        
            if (preg_match('/\bimageX\s*=\s*(".*?"|[^\s]+)/is', $aContentParts[1], $aMatches)) {
                $imageX = intval(trim($aMatches[1], '"'));
            }    
            if (preg_match('/\bimageY\s*=\s*(".*?"|[^\s]+)/is', $aContentParts[1], $aMatches)) {
                $imageY = intval(trim($aMatches[1], '"'));
            }
            if (preg_match('/\bimageWidth\s*=\s*(".*?"|[^\s]+)/is', $aContentParts[1], $aMatches)) {
                $imageWidth = intval(trim($aMatches[1], '"'));
            }
            
            $this->header_line = $line;
            $this->header_align = $align;
            $this->setHeaderFont(array($fontFamily, $fontStyle, $fontSize));
            $this->SetHeaderMargin($margin);
            $this->SetHeaderData($imagePath, $imageWidth, '', $aContentParts[2], $fontColor, $lineColor);
            $this->setPrintHeader(true);
            
        }
        else {
            $this->setPrintHeader(false);
        }
    }

   /**
     * Function checks whether <footer>...</footer> tags exist in the content of an Output Document 
     * and configure that footer according to the parameters in the opening <footer> tag.
     *
     * @public
     */     
   public function SetupFooter($sContent, $bottomMargin) {
        //check for footer tags:
        $aContentParts = preg_split('/<footer(.*?)>(.*?)<\/footer>/is', $sContent, 2, PREG_SPLIT_DELIM_CAPTURE);
        if (is_array($aContentParts) and count($aContentParts) == 4) {
            $sContent = $aContentParts[0] . $aContentParts[3];
            
            //set default values for PDF generation:
            $margin     = $bottomMargin; //PDF_MARGIN_HEADER
            $line       = true;     //set to true to display a footer line
            $fontFamily = PDF_FONT_NAME_MAIN; 
            $fontStyle  = '';       //can be '' (normal), 'B' (bold), 'I' (italic), 'U' (underlined)
            $fontSize   = '12';     //PDF_FONT_SIZE_MAIN, the size of the header font in points
            $fontColor  = array(0,0,0); //RGB colors
            $lineColor  = array(0,0,0); //RGB colors
            $align      = 'C';      //can be: 'L'/'' (left), 'C' (center), 'R' (right), 'J' (justified)
            $imagePath  = '';       //path to an image to display in the footer 
            $imageX     = 0;
            $imageY     = 0;
            $imageWidth = 0;
            
            //check if parameters are set in the <header> tag:
            if (preg_match('/\bmargin\s*=\s*(".*?"|[^\s]+)/is', $aContentParts[1], $aMatches)) {
                $margin = intval(trim($aMatches[1], '"'));
            }    
            if (preg_match('/\bline\s*=\s*(".*?"|[^\s]+)/is', $aContentParts[1], $aMatches)) {
                $val = strtolower(trim($aMatches[1], '"'));
                if ($val == 'true' or $val == 'yes' or intval($val) >= 1) {
                    $line = true;
                } else {
                    $line = false;
                }
            }    
            if (preg_match('/\bfontFamily\s*=\s*(".*?"|[^\s]+)/is', $aContentParts[1], $aMatches)) {
                $fontFamily = trim($aMatches[1], '"');
            }
            if (preg_match('/\bfontStyle\s*=\s*"?(B|I|U)"?/is', $aContentParts[1], $aMatches)) {
                $fontStyle = $aMatches[1];
            }
            if (preg_match('/\bfontSize\s*=\s*(".*?"|[^\s]+)/is', $aContentParts[1], $aMatches)) {
                $fontSize = intval(trim($aMatches[1], '"'));
            }
            if (preg_match('/\balign\s*=\s*"?(L|C|R|J)"?/is', $aContentParts[1], $aMatches)) {
                $align = $aMatches[1];
            }
            if (preg_match('/\bfontColor\s*=\s*"?\s*rgb\((.*?)\)\s*"?/is', $aContentParts[1], $aMatches)) {
                $aRgb = explode(',', $aMatches[1]);
                if (count($aRgb) != 3) {
                    throw new Exception("The rgb($red,$green,$blue) function in <footer> needs three parameters");
                }
                $red = intval($aRgb[0]);
                $green = intval($aRgb[1]);
                $blue = intval($aRgb[2]);
                if ($red < 0 or $red > 255 or $green < 0 or $green > 255 or $blue < 0 or $blue > 255) {
                    throw new Exception("The red, green and blue values in <footer> are not between 0 and 255");
                }
                $fontColor = array($red, $green, $blue);
            }
            if (preg_match('/\blineColor\s*=\s*"?\s*rgb\((.*?)\)\s*"?/is', $aContentParts[1], $aMatches)) {
                $aRgb = explode(',', $aMatches[1]);
                if (count($aRgb) != 3) {
                    throw new Exception("The rgb($red,$green,$blue) function in <footer> needs three parameters");
                }
                $red = intval($aRgb[0]);
                $green = intval($aRgb[1]);
                $blue = intval($aRgb[2]);
                if ($red < 0 or $red > 255 or $green < 0 or $green > 255 or $blue < 0 or $blue > 255) {
                    throw new Exception("The red, green and blue values in <footer> are not between 0 and 255");
                }
                $lineColor = array($red, $green, $blue);
            }
            if (preg_match('/\bimage\s*=\s*(".*?"|[^\s]+)/is', $aContentParts[1], $aMatches)) {
                $imagePath = trim($aMatches[1], '"');
            }        
            if (preg_match('/\bimageX\s*=\s*(".*?"|[^\s]+)/is', $aContentParts[1], $aMatches)) {
                $imageX = intval(trim($aMatches[1], '"'));
            }    
            if (preg_match('/\bimageY\s*=\s*(".*?"|[^\s]+)/is', $aContentParts[1], $aMatches)) {
                $imageY = intval(trim($aMatches[1], '"'));
            }
            if (preg_match('/\bimageWidth\s*=\s*(".*?"|[^\s]+)/is', $aContentParts[1], $aMatches)) {
                $imageWidth = intval(trim($aMatches[1], '"'));
            }
            
            $this->footer_line = $line;
            $this->footer_align = $align;
            $this->SetFooterFont(array($fontFamily, $fontStyle, $fontSize));
            $this->SetFooterMargin($margin);
            $this->SetFooterData($fontColor, $lineColor);
            $this->footer_text = $aContentParts[2];
            $this->SetPrintFooter(true);
            
        }
        else {
            $this->setPrintFooter(false);
        }
    }                        
}
     public function generateHtml2pdf($sUID, $aFields, $sPath, $sFilename, $sContent, $sLandscape = false, $aProperties = array())
    {

        // define("MAX_FREE_FRACTION", 1);
        define('PATH_OUTPUT_FILE_DIRECTORY', PATH_HTML . 'files/' . $_SESSION['APPLICATION'] . '/outdocs/');
        G::verifyPath(PATH_OUTPUT_FILE_DIRECTORY, true);

        require_once(PATH_THIRDPARTY . 'html2pdf/html2pdf.class.php');

        // define Save file
        $sOutput = 2;
        $sOrientation = ($sLandscape == false) ? 'P' : 'L';
        $sLang = (defined('SYS_LANG')) ? SYS_LANG : 'en';
        $sMedia = $aProperties['media'];
        // margin define
        define("MINIMAL_MARGIN", 15);
        $marges = array(MINIMAL_MARGIN, MINIMAL_MARGIN, MINIMAL_MARGIN, MINIMAL_MARGIN);
        if (isset($aProperties['margins'])) {
            // Default marges (left, top, right, bottom)
            $margins = $aProperties['margins'];
            $margins['left'] = ($margins['left'] > 0) ? $margins['left'] : MINIMAL_MARGIN;
            $margins['top'] = ($margins['top'] > 0) ? $margins['top'] : MINIMAL_MARGIN;
            $margins['right'] = ($margins['right'] > 0) ? $margins['right'] : MINIMAL_MARGIN;
            $margins['bottom'] = ($margins['bottom'] > 0) ? $margins['bottom'] : MINIMAL_MARGIN;
            $marges = array($margins['left'], $margins['top'], $margins['right'], $margins['bottom']);
        }

        $html2pdf = new HTML2PDF($sOrientation, $sMedia, $sLang, true, 'UTF-8', $marges);

        $html2pdf->pdf->SetAuthor($aFields['USR_USERNAME']);
        $html2pdf->pdf->SetTitle('Processmaker');
        $html2pdf->pdf->SetSubject($sFilename);
        $html2pdf->pdf->SetCompression(true);

        //$html2pdf->pdf->SetKeywords('HTML2PDF, TCPDF, processmaker');

        if (isset($aProperties['pdfSecurity'])) {
            $pdfSecurity = $aProperties['pdfSecurity'];
            $userPass = G::decrypt($pdfSecurity['openPassword'], $sUID);
            $ownerPass = ($pdfSecurity['ownerPassword'] != '') ? G::decrypt($pdfSecurity['ownerPassword'], $sUID) : null;
            $permissions = explode("|", $pdfSecurity['permissions']);
            $html2pdf->pdf->SetProtection($permissions, $userPass, $ownerPass);
        }

        $html2pdf->setTestTdInOnePage(false);
        $html2pdf->setTestIsImage(false);
        $html2pdf->setTestIsDeprecated(false);

        $html2pdf->writeHTML($html2pdf->getHtmlFromPage($sContent));

        switch ($sOutput) {
            case 0:
                // Vrew browser
                $html2pdf->Output($sPath . $sFilename . '.pdf', 'I');
                break;
            case 1:
                // Donwnload
                $html2pdf->Output($sPath . $sFilename . '.pdf', 'D');
                break;
            case 2:
                // Save file
                $html2pdf->Output($sPath . $sFilename . '.pdf', 'F');
                break;
        }

        copy($sPath . $sFilename . '.html', PATH_OUTPUT_FILE_DIRECTORY . $sFilename . '.html');

        copy(PATH_OUTPUT_FILE_DIRECTORY . $sFilename . '.pdf', $sPath . $sFilename . '.pdf');
        unlink(PATH_OUTPUT_FILE_DIRECTORY . $sFilename . '.pdf');
        unlink(PATH_OUTPUT_FILE_DIRECTORY . $sFilename . '.html');
    }

    public function generateTcpdf($sUID, $aFields, $sPath, $sFilename, $sContent, $sLandscape = false, $aProperties = array())
    {
        require_once (PATH_THIRDPARTY . "tcpdf" . PATH_SEP . "config" . PATH_SEP . "lang" . PATH_SEP . "eng.php");
        require_once (PATH_THIRDPARTY . "tcpdf" . PATH_SEP . "tcpdf.php");
        G::LoadClass('pmPdf');

        $nrt = array("\n", "\r", "\t");
        $nrthtml = array("(n /)", "(r /)", "(t /)");

        $strContentAux = str_replace($nrt, $nrthtml, $sContent);
        $sContent = null;

        while (preg_match("/^(.*)<font([^>]*)>(.*)$/i", $strContentAux, $arrayMatch)) {
            $str = trim($arrayMatch[2]);
            $strAttribute = null;

            if (!empty($str)) {
                $strAux = $str;
                $str = null;

                while (preg_match("/^(.*)([\"'].*[\"'])(.*)$/", $strAux, $arrayMatch2)) {
                    $strAux = $arrayMatch2[1];
                    $str = str_replace(" ", "__SPACE__", $arrayMatch2[2]) . $arrayMatch2[3] . $str;
                }

                $str = $strAux . $str;

                //Get attributes
                $strStyle = null;
                $array = explode(" ", $str);

                foreach ($array as $value) {
                    $arrayAux = explode("=", $value);

                    if (isset($arrayAux[1])) {
                        $a = trim($arrayAux[0]);
                        $v = trim(str_replace(array("__SPACE__", "\"", "'"), array(" ", null, null), $arrayAux[1]));

                        switch (strtolower($a)) {
                            case "color":
                                $strStyle = $strStyle . "color: $v;";
                                break;
                            case "face":
                                $strStyle = $strStyle . "font-family: $v;";
                                break;
                            case "size":
                                $arrayPt = array(0, 8, 10, 12, 14, 18, 24, 36);
                                $strStyle = $strStyle . "font-size: " . $arrayPt[intval($v)] . "pt;";
                                break;
                            case "style":
                                $strStyle = $strStyle . "$v;";
                                break;
                            default:
                                $strAttribute = $strAttribute . " $a=\"$v\"";
                                break;
                        }
                    }
                }

                if ($strStyle != null) {
                    $strAttribute = $strAttribute . " style=\"$strStyle\"";
                }
            }

            $strContentAux = $arrayMatch[1];
            $sContent = "<span" . $strAttribute . ">" . $arrayMatch[3] . $sContent;
        }

        $sContent = $strContentAux . $sContent;

        $sContent = str_ireplace("</font>", "</span>", $sContent);

        $sContent = str_replace($nrthtml, $nrt, $sContent);

        $sContent = str_replace("margin-left", "text-indent", $sContent);

        // define Save file
        $sOutput = 2;
        $sOrientation = ($sLandscape == false) ? PDF_PAGE_ORIENTATION : 'L';
        $sMedia = (isset($aProperties['media'])) ? $aProperties['media'] : PDF_PAGE_FORMAT;
        $sLang = (defined('SYS_LANG')) ? SYS_LANG : 'en';
        
              
        // create new PDF document
        $pdf = new PmPdf($sOrientation, PDF_UNIT, $sMedia, true, 'UTF-8', false);

        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor($aFields['USR_USERNAME']);
        $pdf->SetTitle('Processmaker');
        $pdf->SetSubject($sFilename);
        $pdf->SetCompression(true);

        $margins = $aProperties['margins'];
        $margins["left"] = ($margins["left"] >= 0) ? $margins["left"] : PDF_MARGIN_LEFT;
        $margins["top"] = ($margins["top"] >= 0) ? $margins["top"] : PDF_MARGIN_TOP;
        $margins["right"] = ($margins["right"] >= 0) ? $margins["right"] : PDF_MARGIN_RIGHT;
        $margins["bottom"] = ($margins["bottom"] >= 0) ? $margins["bottom"] : PDF_MARGIN_BOTTOM;

        $pdf->SetLeftMargin($margins['left']);
        $pdf->SetTopMargin($margins['top']);
        $pdf->SetRightMargin($margins['right']);
        $pdf->SetAutoPageBreak(true, $margins['bottom']);

        $pdf->SetupHeader($sContent, $margins['top']);
        $pdf->SetupFooter($sContent, $margins['bottom']);
        
        $oServerConf = &serverConf::getSingleton();

        // set some language dependent data:
        $lg = array();
        $lg['a_meta_charset'] = 'UTF-8';
        $lg['a_meta_dir'] = ($oServerConf->isRtl($sLang)) ? 'rtl' : 'ltr';
        $lg['a_meta_language'] = $sLang;
        $lg['w_page'] = 'page';

        //set some language-dependent strings
        $pdf->setLanguageArray($lg);

        if (isset($aProperties['pdfSecurity'])) {
            $tcpdfPermissions = array('print', 'modify', 'copy', 'annot-forms', 'fill-forms', 'extract', 'assemble', 'print-high');
            $pdfSecurity = $aProperties['pdfSecurity'];
            $userPass = G::decrypt($pdfSecurity['openPassword'], $sUID);
            $ownerPass = ($pdfSecurity['ownerPassword'] != '') ? G::decrypt($pdfSecurity['ownerPassword'], $sUID) : null;
            $permissions = explode("|", $pdfSecurity['permissions']);
            $permissions = array_diff($tcpdfPermissions, $permissions);
            $pdf->SetProtection($permissions, $userPass, $ownerPass);
        }
        // ---------------------------------------------------------
        // set default font subsetting mode
        $pdf->setFontSubsetting(true);

        // Set font
        // dejavusans is a UTF-8 Unicode font, if you only need to
        // print standard ASCII chars, you can use core fonts like
        // helvetica or times to reduce file size.
        //$pdf->SetFont('dejavusans', '', 14, '', true);
        // Detect chinese, japanese, thai
        if (preg_match('/[\x{30FF}\x{3040}-\x{309F}\x{4E00}-\x{9FFF}\x{0E00}-\x{0E7F}]/u', $sContent, $matches)) {
            $fileArialunittf = PATH_THIRDPARTY . "tcpdf" . PATH_SEP . "fonts" . PATH_SEP . "arialuni.ttf";

            $pdf->SetFont((!file_exists($fileArialunittf))? "kozminproregular" : $pdf->addTTFfont($fileArialunittf, "TrueTypeUnicode", "", 32));
        }

        // Add a page
        // This method has several options, check the source code documentation for more information.
        $pdf->AddPage();

        // set text shadow effect
        //$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));
        // Print text using writeHTMLCell()
        // $pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);
        if (mb_detect_encoding($sContent) == 'UTF-8') {
            $sContent = mb_convert_encoding($sContent, 'HTML-ENTITIES', 'UTF-8');
        }
        $doc = new DOMDocument('1.0', 'UTF-8');
        if ($sContent != '') {
            $doc->loadHtml($sContent);
        }
        $pdf->writeHTML($doc->saveXML(), false, false, false, false, '');
        // ---------------------------------------------------------
        // Close and output PDF document
        // This method has several options, check the source code documentation for more information.
        //$pdf->Output('example_00.pdf', 'I');
        //$pdf->Output('/home/hector/processmaker/example_00.pdf', 'D');
        switch ($sOutput) {
            case 0:
                // Vrew browser
                $pdf->Output($sPath . $sFilename . '.pdf', 'I');
                break;
            case 1:
                // Donwnload
                $pdf->Output($sPath . $sFilename . '.pdf', 'D');
                break;
            case 2:
                // Save file
                $pdf->Output($sPath . $sFilename . '.pdf', 'F');
                break;
        }
    }
 