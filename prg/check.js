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