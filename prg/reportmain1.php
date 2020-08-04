<?php 
session_start() ;


?>
 



<html>
<head>
<link rel="stylesheet" href="../css/styles1.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
   #leftbox { 
                float:left;  
                background: white;
                width:700px;
                height:700px; 
				padding :5px;
				margin : auto ;
				border: 1px red solid;
 				overflow: scroll;
            } 
            #middlebox{ 
                float:left;  
                background: orange; 
                width:0px;
                height:0px; 
				border : auto;
				padding :0px;
				border: 0px red solid;
				
            } 
            #rightbox{ 
                float:right; 
                background: white; 
                width:800px;
                height:750px; 
				padding :5px;
				border: 2px white solid;
 			 overflow: scroll;
            } 
			.field_set{
 border-color:red ;
 border : 0px red solid ;
 margin-left :250px;
}
            h3{ 
                color:red; 
                text-align:center; 
            } 
			#col{
				font-size: 18pt; 
				height: 50px; 
				width: 280px;
				align : left ;
			}
			#col1{
				font-size: 16pt; 
				height: 40px; 
				width:280px;
				margin : 10pt,10pt ;
				align :right ;
			}
			.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 114px 2px;
  background-color: #008CBA;
  margin-left:-950px;
  margin-top: 50px;
}
.starthidden {
    display: none;
  }
</style>
<script type="text/javascript"  src="/fees/js/jquery321.js"> 
<script  type="text/javascript" > 

</script>
<script>
function detail() {
  var   acno  = document.getElementById("acno").value ;
	
	$.ajax({
			url:"studentreport.php",
			method:"post",
			data :{acno:acno} ,
			success:function(data)
			{
			// $('p').html(div_data);
			// alert(data) ;
			 
			 //var res = JSON.parse(data);
			//alert(res) ;
			$('#result').html(data);
				}
			
			
			
		});
	}
	
</script>

		
</head>



	
	   
<?php
 include "menu.php" ;
?>
 
  

    <body>  
        <div id = "boxes"> 
<fieldset class="field_set">           
		   <legend style="font-size:28px; color:blue" >REPORT </legend>
              
            <div id = "leftbox"> 
	<label  for="Enter Account No " >Enter Account No</label>
	<input type="text" name="acno" id="acno" onkeyup="detail()" />
<br>
<br>
<a href = "javascript:;" onclick = "this.href='report5.php?classname=' + document.getElementById('tempclass2').value" target="_blank">Print</a>

	
<div id="result" style="color:red; font-size="22px"> 
	 </div>	
<input type="hidden" name="id" id="id"  style="height:35;width:280;font-size:18px" READONLY>

     
				
				
            </div> 
              
            <div id = "middlebox"> 
               





 
 
 
 
 
</div>
      
 

	 		 	 




 


<!--end responsive-form-->

</div>
  
</form>




<?php
//include 'viewfee.php'; 
?>
</body>
</head >
</html>







