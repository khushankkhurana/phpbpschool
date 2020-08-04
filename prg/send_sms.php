
<?php

  // Declare the security credentials to use
  $username = "NARESHK";
  $password = "KHURANA13";

  // Set the attributes of the message to send
  $message  = "D/P, &name is absent today. Hope &name is doing weill";
  //$type     = "1-way";
  $senderid = "DEVSCH";
  $to       = "9996131351";

  // Build the URL to send the message to. Make sure the 
  // message text and Sender ID are URL encoded. You can
  // use HTTP or HTTPS
  $url = "http://198.24.149.4/API/pushsms.aspx?" .
         "loginID=" . $username . "&" .
         "password=" . $password . "&" .
         
        // "type="     . $type . "&" .
    
         "mobile="       . $to . "&" .
		 "text="  . urlencode($message) . "&" .
		  "senderid=" . urlencode($senderid)  . "&" .
		 "route_id=2&Unicode=0" ; 
 echo $url ;
  // Send the request
$output = file($url);

  // The response from the gateway is going to look like 
  // this:
  // id: a4c5ad77ad6faf5aa55f66a
  // 
  // In the event of an error, it will look like this:
  // err: invalid login credentials
  $result = explode(":", $output[0]);

  if($result[0] == "id") 
  {
    echo("Message sent\n");
  }
  else
  {
    echo("Error - " . $result[1] . "\n");
  }

?>