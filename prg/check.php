<?php
?> 
<html>
<head>
<link rel="stylesheet" href="../css/styles.css">

<script type="text/javascript"  src="/fees/jquery321.js"> 
<script  type="text/javascript" > 
$(document).ready(function(){
    $.ajax({
        url: 'checksql.php',
        type: 'get',
        dataType: 'JSON',
        success: function(response){
            var len = response.length;
			alert(len);
            for(var i=0; i<len; i++){
                var id = response[i].id;
                var username = response[i].class_name;
                var name = response[i].adm_fee;
                var email = response[i].annual_charge;

                var tr_str = "<tr>" +
                    "<td align='center'>" + (i+1) + "</td>" +
                    "<td align='center'>" + class_name + "</td>" +
                    "<td align='center'>" + adm_fee + "</td>" +
                    "<td align='center'>" + annual_charge + "</td>" +
                    "</tr>";

                $("#userTable tbody").append(tr_str);
            }

        }
    });
});


</script>

<div class="container" >
   <table id="userTable" border="1" >
      <thead>
        <tr>
          <th width="5%">S.no</th>
          <th width="20%">class_name</th>
          <th width="20%">admission fee</th>
          <th width="30%">Annual charge</th>
        </tr>
      </thead>
      <tbody></tbody>
   </table>
   </div>
   



</head>
</body>
</html>
