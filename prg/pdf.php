<?php
    // Include PDFreactor class
    // You can download the PDFreactor Web Service PHP wrapper from: 
    // http://www.pdfreactor.com/download/get/?product=pdfreactor&type=webservice_clients&jre=false
    require_once("PDFreactor.class.php");
    use com\realobjects\pdfreactor\webservice\client\PDFreactor as PDFreactor;
    // Create new PDFreactor instance
    $pdfReactor = new PDFreactor("undefined");
    
    $config = array(
        // Specify the input document
        "document"=> "http://www.pdfreactor.comundefined"
    );

    // Render document and save result to $result 
    $result = null;
    try {
        $result = $pdfReactor->convertAsBinary($config);
        header("Content-Type: application/pdf");
        echo $result;
    } catch (Exception $e) {
        echo "<h1>An Error Has Occurred</h1>";
        echo "<h2>".$e->getMessage()."</h2>";
    }
?>
