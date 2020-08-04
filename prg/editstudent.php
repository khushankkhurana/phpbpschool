<?php
session_start() ;


?>




<html>
<head>
<link rel="stylesheet" href="../css/styles1.css">
<link rel="stylesheet" type="text/css" href="/bpschool/app-assets/css/core/menu/menu-types/horizontal-menu.css">
   <link rel="stylesheet" type="text/css" href="/bpschool/app-assets/css/core/colors/palette-gradient.css">
   <link rel="stylesheet" type="text/css" href="/bpschool/app-assets/css/pages/app-user.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>

input[type=text]:focus {
  width: 100%;
}
   #leftbox {
                float:left;
                background: #e9f2f5;
                width:520px;
                height:1100px;
				padding :5px;
				margin : auto ;
				border: 1px red solid;

            }
            #middlebox{
                float:left;
                background: #e7f0dd;
                width:300px;
                height:1100px;
				border : auto;
				padding :5px;
				border: 1px red solid;
				margin-top : 0px;
            }
            #rightbox{
                float:right;
                background: #caccdb;
                width:250px;
                height:1100px;
				padding :5px;
				border: 1px red solid;

            }
			.field_set{
 border-color:red ;
 border : 0px red solid ;
 margin-top :0px;
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
  margin-left:-800px;
  margin-top: 250px;
  border-radius : 40% ;
}
.button1 {
  background-color: brown ; /* Green */
  position : absolute ;
  width :100;
  border: none;
  color: white;
  padding: 10px ;
  margin-top :100px;
  margin-left: 0px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  cursor: pointer;
  align : center ;
 border-radius :40% ;
}

input:READ-ONLY {
  background: orange;
}
input:focus {
  background-color: white;
}
input:-moz-read-write { /* For Firefox */
  background-color: red;
}
select option[selected] {
    color: yellow;
}
select {
      color: blue; // color of the selected option

      option {
        color: red; // color of all the other options
      }
 }
 input:read-only {
  background-color: #ede4e6;
}
</style>
<script type="text/javascript"  src="../js/jquery321.js">
<script  type="text/javascript" >
str=0 ;
$(document).ready(function(){
 $("select.country").change(function(){
	var selectedmonth = $(this).children("option:selected").val();
  	var xx.value = selectedmonth ;
  //alert(xx) ;


		});
});

</script>

<script src='upload.js'></script>
<script>
function showHint(str) {

    if (str.length == 0) {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
             if (this.readyState == 5 && this.status == 200) {
              document.getElementById("str").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "getuser1.php?q=" + str, true);
        xmlhttp.send();

		gval();
		total() ;
    }
}
$(document).ready(function(){
	load_data();
	function load_data(query)
	{

	$.ajax({
			url:"checkmon.php",
			method:"post",
			data:{query:query},
			success:function(data)
			{
				//  $("#name").html(data.name);
    // $("#fathername").html(data.fathername);
			// $('p').html(div_data);
			// alert(data) ;
			 var columns = JSON.parse(data);
			// $('#result').html(data);
			 //var mb = data.split(",") ;
			// alert(columns[4]);
			//var mb = $('#result').text();
			// alert(mb.value) ;
			    if(columns=='')
				{document.getElementById("acno").value = '';
				  document.getElementById("name").value='';
						document.getElementById("tclass").value='';
						document.getElementById("fathername").value='';
						document.getElementById("mobileno").value='';
						document.getElementById("image").src= "" ;
						document.getElementById("mothername").value = '';
						document.getElementById("gender1").value = '';
						document.getElementById("charges").value = '';
						document.getElementById("concession1").value ='' ;
						//document.getElementById("tsplconcession").value = '';
					   // document.getElementById("nbalance").value ='' ;
						//document.getElementById("dateofbirth").value = '';
						//document.getElementById("dateofjoining").value = '';
						//document.getElementById("station").value = '' ;
				}
				else
				{	document.getElementById("acno").value = columns[0];
						document.getElementById("name").value=columns[1];
						document.getElementById("tclass").value=columns[2];
						document.getElementById("fathername").value=columns[3];
						document.getElementById("mobileno").value=columns[4];
						document.getElementById("image").src= "../image/" +columns[5];
						document.getElementById("file").value = columns[5];
						document.getElementById("mothername").value = columns[6];
						document.getElementById("gender1").value = columns[7];
						document.getElementById("charges").value = columns[8];
						document.getElementById("concession1").value =parseInt(columns[9]) ;
						document.getElementById("splconcession").value = columns[10];
					    document.getElementById("balance").value = columns[11] ;
						document.getElementById("dateofbirth").value = columns[12];
						document.getElementById("dateofjoining").value = columns[13];
						document.getElementById("station").value = columns[14] ;
					 document.getElementById("newold").value = columns[15] ;
					 document.getElementById("address1").value = columns[16] ;
					 document.getElementById("address2").value = columns[17] ;
					 document.getElementById("city").value = columns[18] ;
					 //alert(document.getElementById("newold").value );
					 //alert(columns);
			   // alert(check_gender.value) ;
			// var t_class = document.getElementById("tclass").value ;
			// alert(t_class) ;
			// document.getElementById('image').src='../image/simley.gif' ;
			// alert(t_class) ;
			gval() ;
			tcal() ;
			total();
			//stat();
			//concess();
			}
			}


		});
	}

	$('#search1').keyup(function(){
		var search = $(this).val();
		if(search != '')
		{
			load_data(search);

		}
		else
		{
			load_data();
		}
	});
});
</script>

<script>
   function tcal() {
          $(document).ready(function() {
		 var xx =document.getElementById("concession1").value ;
				//xx=parseInt(xx) ;
				//alert(xx);

			$("#tconcession option[value=" + xx + "]").attr('selected', 'selected');
			var xxx =document.getElementById("station").value ;
			setSelectedIndex(document.getElementById('tstation'),xxx);
			//city = "option[text=" + xxx + "]";
//$("#tstation").find(city).attr("selected", "selected");
			//$("#tstation option[value=" + xxx + "]").attr('selected', 'selected');
			//$( "#tstation option:selected" ).text();
			//$("#tconcession option[value=10.00]").attr('selected', 'selected');
		 //document.getElementById("tclass1").selected = false ;
          document.getElementById("tclass1").value = document.getElementById("tclass").value;
		 // document.getElementById("tsation").value = document.getElementById("station").value ;
		 //document.getElementById("tclass1").selected = true ;
		 //select option:selected").css("color","red");
		//document.getElementById('tclass1').removeAttribute("selected")
		// $(tclass1).find('option:selected').css('background-color', 'red');
		 //$(tclass1).find('option:selected').css('background-color', 'white');
		 $("tclass1 select").val("tclass").css('background-color', 'red');
	//alert(document.getElementById("tclass1").value);
	  var chek = document.getElementById("gender1").value ;
	  //alert(chek) ;
	  if (chek=="Male" )
	  {
	  document.getElementById("genderm").checked = true ;
	 // document.getElementById("gender1").value="Male" ;
	  }
	  else
	  {
		  document.getElementById("genderf").checked = true ;
		  //  document.getElementById("gender1").value="Female" ;
	  }
  });
   }
</script>
<script>
function my(){
$(document).ready(function(){

 $("select.country").change(function(){
	 var selectedClass = $(this).children("option:selected").val();
  	var str1 =   $( "#month option:selected" ).val();
  alert(str1);





								});
							});
				}


</script>
<script>

 function gval() {
  var   t_class = document.getElementById("tclass").value ;


	$.ajax({
			url:"getuser3.php",
			method:"post",
			data :{classname:t_class},
			success:function(data)
			{

			// $('p').html(div_data);
			// alert(data) ;

			 var res = JSON.parse(data);
			// $('#result').html(data);
			 //var mb = data.split(",") ;
			// alert(columns[4]);
			//var mb = $('#result').text();
			// alert(mb.value) ;
			// alert(data) ;
			document.getElementById("admfee").value=(res[0]);
			document.getElementById("annual").value=res[1];
			document.getElementById("tuition").value=res[2];
			document.getElementById("bookcharge").value=res[3];
			document.getElementById("stationarycharge").value=res[4];
			document.getElementById("diarycharge").value=res[5];
			document.getElementById("examcharge").value=res[6];
			document.getElementById("misccharge").value=res[7];

			oldnew()
			 cal() ;
			//fetch() ;

			}



		});
	}


</script>
<script>
function fetch() {
  var   tacno = document.getElementById("acno").value ;


	// alert(t_class) ;
	$.ajax({
			url:"fetchfield.php",
			method:"post",
			data :{acno:tacno},
			success:function(data)
			{


		// alert (data) ;
			 var res11 = JSON.parse(data);
			 // alert(res11.length) ;
			 var x = document.getElementById("month");
  // var c = document.createElement("option");
  // c.text = res11[2] ;
  // x.options.add(c, 0);
  var i;
    for (i = 0; i < res11.length; i++) {
      var car = new Option(res11[i], i);
      x.options.remove(car);
    }
			var i;
    for (i = 0; i < res11.length; i++) {
      var car = new Option(res11[i], i);
      x.options.add(car);
    }



	}


		});
	}
	</script>
<script>
function cal(){
//	$('.selclass option[value="document.getElementById("tclass"]');

var admfee=document.getElementById('admfee').value ;
var concession1=document.getElementById('concession1').value;
var annual=document.getElementById('annual').value;
var tuition =document.getElementById('tuition').value;
var bookcharge=document.getElementById('bookcharge').value;
var stationarycharge=document.getElementById('stationarycharge').value;
var diarycharge=document.getElementById('diarycharge').value ;
var misccharge=document.getElementById('misccharge').value;
var examcharge =document.getElementById('examcharge').value;

var charges =document.getElementById('charges').value ;
var splconcession = document.getElementById("splconcession").value ;
var net =document.getElementById('net').value ;
 //var amtdeposit =document.getElementById('amtdeposit').value ;
 var balance =document.getElementById('balance').value ;

	//splconcession =0 ;
	//splconcession = parseFloat(splconcession).toFixed(2);
	var gtotal  ;
	 gtotal  = (admfee*1 +annual*1 +tuition*1 + bookcharge*1 + stationarycharge*1 +diarycharge*1 + misccharge*1 ) ;
	 var dtotal =admfee*1 +annual*1 +tuition*1 ;
	 var disc ;
	 disc= 0 ;
	 if (concession1 ==1){
	 disc = 0 ;}
	 else {
		disc =parseInt((dtotal*concession1*1)/100) ;
		// var rdisc=Math.round(disc) ;
		document.getElementById('concession').value = parseFloat(disc).toFixed(2);
		 }
	 gtotal = gtotal  +charges*1 ;
	 net  = (gtotal +balance*1) - (disc + splconcession*1) ;

	 //net  = (gtotal+nbalance*1 - (disc + splconcession*1)) ;
	 document.getElementById("total").value = parseFloat(gtotal).toFixed(2);
	 document.getElementById("net").value = parseFloat(net).toFixed(2);
	 document.getElementById('concession').value = disc.toFixed(2) ;
	 //document.getElementById('splconcession').value = splconcession ;
	 //balance = net*1-amtdeposit*1 ;
	 document.getElementById('balance').value=balance ;
}

</script>


<script>
function setnet() {
	 var net = document.getElementById('net').value;
	 var amtdeposit =document.getElementById('amtdeposit').value ;
	 var balance =document.getElementById('balance').value ;
 	 balance = net*1-amtdeposit*1 ;
	 document.getElementById('balance').value=balance ;
			}
</script>
<script>
function total(){
	var admfee=document.getElementById('admfee').value ;
	var concession1=document.getElementById('concession1').value;
var annual=document.getElementById('annual').value;
var tuition =document.getElementById('tuition').value;
var bookcharge=document.getElementById('bookcharge').value;
var stationarycharge=document.getElementById('stationarycharge').value;
var diarycharge=document.getElementById('diarycharge').value ;
var misccharge=document.getElementById('misccharge').value;
var examcharge =document.getElementById('examcharge').value;
var charges =document.getElementById('charges') .value ;
var splconcession =document.getElementById('splconcession').value ;
var net =document.getElementById('net').value ;
var balance = document.getElementById('balance').value ;

	//splconcession =0 ;
	//splconcession = parseFloat(splconcession).toFixed(2);
	var gtotal  ;
	 gtotal  = (admfee*1 +annual*1 +tuition*1 + bookcharge*1 + stationarycharge*1 +diarycharge*1 + misccharge*1 ) ;

	 var dtotal =admfee*1 +annual*1 +tuition*1 ;
	 var disc ;
	 disc= 0 ;
	 if (concession1 ==1)
		disc = 0 ;
	 else {
		disc =parseInt((dtotal*concession1*1)/100) ;
		document.getElementById('concession').value = disc ;
	 }
	 gtotal = gtotal  +charges*1 ;
	 net  = (gtotal +balance*1) - (disc + splconcession*1) ;

	 document.getElementById("total").value = parseFloat(gtotal).toFixed(2);
	 document.getElementById("net").value = parseFloat(net).toFixed(2);
	 document.getElementById('concession').value = disc.toFixed(2) ;
	 document.getElementById('splconcession').value = splconcession ;

}
</script>
<script>
function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#image')
                        .attr('src', e.target.result)
                        .width(100)
                        .height(100);


                };

                reader.readAsDataURL(input.files[0]);
            }
        }
	</script>
	<script>
	function stat() {
	document.getElementById("station").value = $( "#tstation option:selected" ).text().trim();
	document.getElementById("charges").value= document.getElementById("tstation").value;
	total();
	}
	</script>


<script>
function concess() {
	document.getElementById("concession1").value = document.getElementById("tconcession").value ;
alert(document.getElementById("concession1").value)
total();
}

function concess1() {
	var sopt = tconcession.options[tconcession.selectedIndex];
      var sopt1 = sopt.value;
	  var sopt2 =sopt1.split(",") ;
	  	alert(sopt);
	  var sopt3
	  sopt3 = sopt2[1];
	   sopt3.value  = sopt3 ;
	   document.getElementById("concession1").value = sopt2[1] ;
	   document.getElementById("concession").value = parseFloat(sopt3).toFixed(2) ;
	  alert(sopt3);
	  // document.getElementById("tconcession").value = sopt1;
	   //document.getElementById("concession1").value;

	   total() ;
	}
	// function to get the picture loaded filename
	$(document).ready(function(){
        $('input[type="file"]').change(function(e){
            var fileName = e.target.files[0].name;

			document.getElementById("file").value= fileName ;
			//alert('The file "' + fileName +  '" has been selected.');
        });
    });
	$(document).ready(function(){

   //$("#tclass1 option:selected").css("background-color","red");
	//$("select option:odd").css("background-color","grey");
 //$("select option:even").css("background-color","yellow");
 // below line will make all drop down first option red
//$("select option:selected").css("background-color","white");
	});
</script>
<script>

function setSelectedIndex(s, v) {

    for ( var i = 0; i < s.options.length; i++ ) {

        if ( s.options[i].text == v ) {

            s.options[i].selected = true;

            return;

        }

    }

}
</script>
<script>
function oldnew() {
	var optnewold = newold.options[newold.selectedIndex];
	//alert(optnewold.value);
	document.getElementById("txtnewold").value=optnewold.value ;

	if (txtnewold.value=="Old") {
		document.getElementById("admfee").value=parseFloat(0).toFixed(2) ;
	}
	else {
		gval() ;
	}
	//alert(document.getElementById("admfee").value);
	total();
}
</script>


	</head>



<?php
		include '../dbconn.php' ;
		//include   'top.php' ;
		include 'menu.php';
		//include 'grno.php';
		include 'class.php';
		// include 'getuser1.php';
		//include 'party.php';
		include 'transport.php';
		include 'concession.php';
		//include 'fetchfield.php' ;
      // $tclass1="" ;
	   $temp="" ;
	   $res="" ;
	   ?>
<?php
// $tclass1 = fopen("file.txt", "r") or die("Unable to open file!");
// $temp = fread($tclass1,filesize("file.txt"));
//  fclose($tclass1);
// echo $temp;
?>

<div class="app-content content">
     <div class="content-overlay"></div>
     <div class="header-navbar-shadow"></div>
     <div class="content-wrapper">
         <div class="content-header row">
         </div>
         <div class="content-body">
             <!-- page users view start -->
             <section class="page-users-view">
                 <div class="row">
                     <!-- account start -->
                     <div class="col-12">
                         <div class="card">
                             <div class="card-header">
                                 <div class="card-title">Account</div>
                             </div>
                             <div class="card-body">
                                 <div class="row">
                                     <div class="users-view-image">
                                         <img src="/bpschool/app-assets/images/portrait/small/avatar-s-12.jpg" class="users-avatar-shadow w-100 rounded mb-2 pr-2 ml-1" alt="avatar">
                                     </div>
                                     <div class="col-12 col-sm-9 col-md-6 col-lg-5">
                                         <table>
                                             <tr>
                                                 <td class="font-weight-bold">Username</td>
                                                 <td>adoptionism744</td>
                                             </tr>
                                             <tr>
                                                 <td class="font-weight-bold">Name</td>
                                                 <td>Angelo Sashington</td>
                                             </tr>
                                             <tr>
                                                 <td class="font-weight-bold">Email</td>
                                                 <td>angelo@sashington.com</td>
                                             </tr>
                                         </table>
                                     </div>
                                     <div class="col-12 col-md-12 col-lg-5">
                                         <table class="ml-0 ml-sm-0 ml-lg-0">
                                             <tr>
                                                 <td class="font-weight-bold">Status</td>
                                                 <td>active</td>
                                             </tr>
                                             <tr>
                                                 <td class="font-weight-bold">Role</td>
                                                 <td>admin</td>
                                             </tr>
                                             <tr>
                                                 <td class="font-weight-bold">Company</td>
                                                 <td>WinDon Technologies Pvt Ltd</td>
                                             </tr>
                                         </table>
                                     </div>
                                     <div class="col-12">
                                         <a href="app-user-edit.html" class="btn btn-primary mr-1"><i class="feather icon-edit-1"></i> Edit</a>
                                         <button class="btn btn-outline-danger"><i class="feather icon-trash-2"></i> Delete</button>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <!-- account end -->
                     <!-- information start -->
                     <div class="col-md-6 col-12 ">
                         <div class="card">
                             <div class="card-header">
                                 <div class="card-title mb-2">Information</div>
                             </div>
                             <div class="card-body">
                                 <table>
                                     <tr>
                                         <td class="font-weight-bold">Birth Date </td>
                                         <td>28 January 1998
                                         </td>
                                     </tr>
                                     <tr>
                                         <td class="font-weight-bold">Mobile</td>
                                         <td>+65958951757</td>
                                     </tr>
                                     <tr>
                                         <td class="font-weight-bold">Website</td>
                                         <td>https://rowboat.com/insititious/Angelo
                                         </td>
                                     </tr>
                                     <tr>
                                         <td class="font-weight-bold">Languages</td>
                                         <td>English, Arabic
                                         </td>
                                     </tr>
                                     <tr>
                                         <td class="font-weight-bold">Gender</td>
                                         <td>female</td>
                                     </tr>
                                     <tr>
                                         <td class="font-weight-bold">Contact</td>
                                         <td>email, message, phone
                                         </td>
                                     </tr>
                                 </table>
                             </div>
                         </div>
                     </div>
                     <!-- information start -->
                     <!-- social links end -->
                     <div class="col-md-6 col-12 ">
                         <div class="card">
                             <div class="card-header">
                                 <div class="card-title mb-2">Social Links</div>
                             </div>
                             <div class="card-body">
                                 <table>
                                     <tr>
                                         <td class="font-weight-bold">Twitter</td>
                                         <td>https://twitter.com/adoptionism744
                                         </td>
                                     </tr>
                                     <tr>
                                         <td class="font-weight-bold">Facebook</td>
                                         <td>https://www.facebook.com/adoptionism664
                                         </td>
                                     </tr>
                                     <tr>
                                         <td class="font-weight-bold">Instagram</td>
                                         <td>https://www.instagram.com/adopt-ionism744/
                                         </td>
                                     </tr>
                                     <tr>
                                         <td class="font-weight-bold">Github</td>
                                         <td>https://github.com/madop818
                                         </td>
                                     </tr>
                                     <tr>
                                         <td class="font-weight-bold">CodePen</td>
                                         <td>https://codepen.io/adoptism243
                                         </td>
                                     </tr>
                                     <tr>
                                         <td class="font-weight-bold">Slack</td>
                                         <td>@adoptionism744
                                         </td>
                                     </tr>
                                 </table>
                             </div>
                         </div>
                     </div>
                     <!-- social links end -->
                     <!-- permissions start -->
                     <div class="col-12">
                         <div class="card">
                             <div class="card-header border-bottom mx-2 px-0">
                                 <h6 class="border-bottom py-1 mb-0 font-medium-2"><i class="feather icon-lock mr-50 "></i>Permission
                                 </h6>
                             </div>
                             <div class="card-body px-75">
                                 <div class="table-responsive users-view-permission">
                                     <table class="table table-borderless">
                                         <thead>
                                             <tr>
                                                 <th>Module</th>
                                                 <th>Read</th>
                                                 <th>Write</th>
                                                 <th>Create</th>
                                                 <th>Delete</th>
                                             </tr>
                                         </thead>
                                         <tbody>
                                             <tr>
                                                 <td>Users</td>
                                                 <td>
                                                     <div class="custom-control custom-checkbox ml-50"><input type="checkbox" id="users-checkbox1" class="custom-control-input" disabled checked>
                                                         <label class="custom-control-label" for="users-checkbox1"></label>
                                                     </div>
                                                 </td>
                                                 <td>
                                                     <div class="custom-control custom-checkbox ml-50"><input type="checkbox" id="users-checkbox2" class="custom-control-input" disabled><label class="custom-control-label" for="users-checkbox2"></label>
                                                     </div>
                                                 </td>
                                                 <td>
                                                     <div class="custom-control custom-checkbox ml-50"><input type="checkbox" id="users-checkbox3" class="custom-control-input" disabled><label class="custom-control-label" for="users-checkbox3"></label>
                                                     </div>
                                                 </td>
                                                 <td>
                                                     <div class="custom-control custom-checkbox ml-50"><input type="checkbox" id="users-checkbox4" class="custom-control-input" disabled checked>
                                                         <label class="custom-control-label" for="users-checkbox4"></label>
                                                     </div>
                                                 </td>
                                             </tr>
                                             <tr>
                                                 <td>Articles</td>
                                                 <td>
                                                     <div class="custom-control custom-checkbox ml-50"><input type="checkbox" id="users-checkbox5" class="custom-control-input" disabled><label class="custom-control-label" for="users-checkbox5"></label>
                                                     </div>
                                                 </td>
                                                 <td>
                                                     <div class="custom-control custom-checkbox ml-50"><input type="checkbox" id="users-checkbox6" class="custom-control-input" disabled checked>
                                                         <label class="custom-control-label" for="users-checkbox6"></label>
                                                     </div>
                                                 </td>
                                                 <td>
                                                     <div class="custom-control custom-checkbox ml-50"><input type="checkbox" id="users-checkbox7" class="custom-control-input" disabled><label class="custom-control-label" for="users-checkbox7"></label>
                                                     </div>
                                                 </td>
                                                 <td>
                                                     <div class="custom-control custom-checkbox ml-50"><input type="checkbox" id="users-checkbox8" class="custom-control-input" disabled checked>
                                                         <label class="custom-control-label" for="users-checkbox8"></label>
                                                     </div>
                                                 </td>
                                             </tr>
                                             <tr>
                                                 <td>Staff</td>
                                                 <td>
                                                     <div class="custom-control custom-checkbox ml-50"><input type="checkbox" id="users-checkbox9" class="custom-control-input" disabled checked>
                                                         <label class="custom-control-label" for="users-checkbox9"></label>
                                                     </div>
                                                 </td>
                                                 <td>
                                                     <div class="custom-control custom-checkbox ml-50"><input type="checkbox" id="users-checkbox10" class="custom-control-input" disabled checked>
                                                         <label class="custom-control-label" for="users-checkbox10"></label>
                                                     </div>
                                                 </td>
                                                 <td>
                                                     <div class="custom-control custom-checkbox ml-50"><input type="checkbox" id="users-checkbox11" class="custom-control-input" disabled><label class="custom-control-label" for="users-checkbox11"></label>
                                                     </div>
                                                 </td>
                                                 <td>
                                                     <div class="custom-control custom-checkbox ml-50"><input type="checkbox" id="users-checkbox12" class="custom-control-input" disabled><label class="custom-control-label" for="users-checkbox12"></label>
                                                     </div>
                                                 </td>
                                             </tr>
                                         </tbody>
                                     </table>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <!-- permissions end -->
                 </div>
             </section>
             <!-- page users view end -->

         </div>
     </div>
 </div>

    <body>
        <div id = "boxes">
<fieldset class="field_set">
		   <legend style="font-size:28px; color:red" >Editing Student Information :</legend>

            <div id = "leftbox">

			<img style="border-radius: 50%; width :100px;height :100px" id="image" src='/fees/image/#'   />

	<form action="upload2.php" method="post" enctype="multipart/form-data"  id='uploadImage'  >
			<input style="align:right;font-size:16px" type='file' name="photo" id="photo" onchange="readURL(this)" id='uploadImage' "/>


			<img style="border-radius: 50%; text-align:center; align:right" id="image" src="" form="uploadImage"/>
			<input type="submit" name="submit" value="Upload" onclick="upload2.php" id='uploadImage'  style="font-size:18px" />
		</form>

		<p id='msg' style="color:red; font-size:16" ></p>
<script src='upload.js'></script>
<!-- <p id='msg' style="color:red; font-size:20" >
//<?php echo ($res); ?>
</p>
	--->


<form action="editpost.php" method ="post"   id="form1"   >
  <label for="SEARCH " style="font-size:18px;color:blue" >Search : Account/Name/Fathername </label>

  <input type="text" name ="search1" id="search1" placeholder="Search" style="height:35;width:280;font-size:18px" onkeyup="gval()" autocomplete="off">
<br>
<label for="SELECT MONTH " style="font-size:18px;color:blue;text-align:right ;"> FEE MONTH  </label> <br>


   <select  name="tclass1" id="tclass1"  onclick="showHint(this.value)" style="font-size:18px;height:35;width:250" required onclick="tcal()"  >


 <?php
	$co1=0 ;
	while ($co1 <count($tclass)){
	?>
	<option value= "<?php echo $tclass1[$co1] ?>"  >   <?php echo $tclass1[$co1] ?> </option>;
	<?php
	$co1 = $co1+1 ;
	}
?>
</select>

<br>
<br>
  <label for="ACCOUNT NO" style="font-size:18px;color:blue;" >ACCOUNT NO </label> <br>

  <input type="text" name ="acno" id="acno"  style="height:35;width:280;font-size:18px"  readonly />

	<label for="Status for New Old"   > Status </label>

  <select id="newold" name="newold" style="height:35;width:70;font-size:18px;color:blue" required onclick="oldnew()">
	<option> New  </option>
	<option selected > Old   </option>
	</select>
	<input type="hidden" name="txtnewold" id="txtnewold" value="Old" />

	<br>
	 <label for="class name" style="font-size:18px;color:blue;" hidden >CLASS </label>


<input type="hidden" name="tclass" id="tclass"  style="font-size:18px;height:35;width:280" READONLY />


	<input type="hidden" id="temp_class" name="temp_class">


		<label for="STUDENT NAME" style="font-size="14px"; ";>STUDENT NAME </label>
<br>
<input type="text" name="name" id="name"  placeholder="STUDENT NAME *" style="height:35;width:250;font-size:18px" autocomplete="off" required>
<label for="GENDER" style="font-size="22px">GENDER </label>
<input type="radio" name="gender" id="genderm" value="Male" required />Male
  <input type="radio" name="gender" id="genderf"  value="Female"  />Female
  <input type="radio" name="gender"  id="gendero" value="Other" />Other
  <!-- <span class="error">* <?php echo $genderErr;?></span>
-->
<br>
<br>
<label for="date of birth" style="font-size="18px">DATE OF BIRTH</label>
<br>
<input  type="date" name="dateofbirth" id="dateofbirth" placeholder="DATE OF BIRTH "style="height:35;width:250; font-size:18px" />
<br>
<br>


<label for="date of JOINING" style="font-size="14px">DATE OF JOINING </label>


<br>
<input type="date" name="dateofjoining" id="dateofjoining" placeholder="DATE OF JOINING " style="height:35;width:250;font-size:18px "/>

<br>
<br>
<label for="FATHER'S NAME" style="font-size="14px">FATHER'S NAME</label>

<br>
<input type="text" name="fathername" id="fathername" placeholder="FATHER'S NAME" style="height:35;width:250;font-size:18px" autocomplete="off" required >

<br>
<br>

<label for="MOTHER'S NAME" style="font-size="14px">MOTHER'S NAME</label>
<br>
<input type="text" name="mothername" id="mothername" placeholder="MOTHER'S NAME" style="height:35;width:250;font-size:18px"autocomplete=off >
<br>
<br>
<label for="MOBILE NO" style="font-size="14px">MOBILE NUMBER</label>
<br>
<input type="text" name="mobileno" id="mobileno" placeholder="MOBILE NUMBER" style="height:35;width:250;font-size:18px" autocomplete=off>
	<br>
	<br>
	<label for="Address="font-size="14px">Address</label>
	<br>
	<input type="text" name="address1" id="address1" placeholder="Address Line 1" style="height:35;width:250;font-size:18px" autocomplete="off">
	<input type="text" name="address2" id="address2" placeholder="Address Line 2" style="height:35;width:250;font-size:18px" autocomplete="off">
	<input type="text" name="city" id="city" placeholder="City" style="height:35;width:250;font-size:18px" autocomplete="off">


            </div>

            <div id = "rightbox">

<label for="ADMISSION FEE" >ADMISSION FEE</label>
<br>
<input type="text" name="admfee" id="admfee" value="0.00" min="0.00" max="999999.99" step="0.01" style="height:35;width:200;color:red;font-size:22;" readonly >
<br>
<br>
<label for="ANNUAL CHARGE" >ANNUAL CHARGES </label>
<br>
<input type="text" name="annual" id="annual" value= "0.00" style="height:35;width:200;color:red;font-size:22;" readonly >
<br>
<br>
<label for="TUITION FEE" >TUITION FEE</label>
<br>
<input type="text" name="tuition" id="tuition" value= "0.00" style="height:35;width:200;color:red;font-size:22;" readonly >
<br>
<br>
<label for="BOOK CHARGES" >BOOK CHARGES</label>
<br>
<input type="text" name="bookcharge" id="bookcharge" value= "0.00"style="height:35;width:200;color:red;font-size:22;" readonly  >
<br>
<br>
<label for="STATIONARY CHARGES" >STATIONARY CHARGES</label>
<br>
<input type="text" name="stationarycharge" id="stationarycharge" value= "0.00" style="height:35;width:200;color:red;font-size:22;" readonly >
<br>
<br>
<label for="DIARY CHARGES" >DIARY CHARGES</label>
<br>
<input type="text" name="diarycharge" id="diarycharge" min="0.00" max="0.00" value= "0.00" style="height:35;width:200;color:red;font-size:22;" readonly >
<br>
<br>
<label for="EXAM FEES" >EXAM FEES</label>
<br>

<input type="text" name="examcharge" id="examcharge" value= "0.00" style="height:35;width:200;color:red;font-size:22;" readonlY >
<br>
<br>
<label for="MISC CHARGES" >MISC CHARGES</label>
<br>
<input type="text" name="misccharge" id="misccharge" value= "0.00" style="height:35;width:200;color:red;font-size:22;" readonlY >





            </div>

            <div id = "middlebox">

<label for="TRANSPORT CHARGES" >TRANSPORT CHARGES</label>
<br>
 <select  name="tstation" id="tstation"  style="font-size:18px;height:35;width:250" onclick="stat()" >
<!-- onchange="showHint(this.value)"
	<option value="" disabled selected>Transport Route</option>
	--->
 <?php
	$co1=0 ;
	while ($co1 <count($tstation)){
	?>
	<option value= "<?php echo $tstation1[$co1] ?>" >   <?php echo $tstation[$co1] ?> </option>;
	<?php $co1=$co1+1;
	}
?>
</select>
<input type="hidden" name="station" id="station" />
<br>
<br>
<label for="TRANSPORT CHARGES" >TRANSPORT CHARGES</label>
<br>
<input  type="text" name="charges" id="charges" value= "0.00" style="height:35;width:250;font-size:22;" readonly />
<br>
<br>
<label for="TOTAL" >TOTAL</label>
<br>
<input  type="text" name="total" id="total" value= "0.00" style="height:35;width:250;color:red;font-size:28;" readonly />
<br>
<br>
  CONCESSION:
  <br>
 <select   name="tconcession" id="tconcession"  style="font-size:18px;height:35;width:250" onclick="concess()" />
 <!-- onchange="showHint(this.value)" --->
	<option value="" >Scholarship/Concession</option>
 <?php
	$co1=0 ;
	while ($co1 <count($tconcession)){
	?>
	<option value= "<?php echo $tconcession1[$co1] ?>" >  <?php echo $tconcession[$co1] ?> </option>;
	<?php $co1=$co1+1;
	}
?>
</select> <br>
      <br>
<label for="CONCESSION" >B/S/STAFF CONCESSION:</label>
<br>
<input  type="text" name="concession" id="concession" value= "0.00" style="height:35;width:250;font-size:22;" readonly >
<input type="hidden" name="concession1" id="concession1" value="0.00" >
<br>
<br>
<label for="CONCESSION" >SPECIAL CONCESSION:</label>
<br>
<input  type="text" name="splconcession" id="splconcession"  PLACEHOLDER ="0.00" style="height:35;width:250;font-size:22;align:left" onkeyup="concess()" autocomplete=off  >
<br>
<br>
<label for="balance" >PREVIOUS BALANCE :</label>
<br>
<input type="text" name="balance" id="balance" value="0.00"  style="height:35;width:250;font-size:22;align:left;" onkeyup="concess()" autocomplete="off" >
<br>
<br>
<label for="net" >NET PAYABLE</label>
<br>
<input type="hidden" name="file" id="file" />
<input  type="text" name="net" id="net" value= "0.00" style="height:35;width:250;color:red;font-size:28;" readonly >
<br>
<button  class="button1" type="Submit" name="Submit" id="Submit" value="Submit" onclick="addstudent.php">Submit </button>

</div>
<!--  end -->



<input type="hidden" name="tadmfee" id="tadmfee" value="0.00" min="0.00" max="999999.99" step="0.01" readonly >
<input type="hidden" name="tannual" id="tannual" value= "0.00"  readonly >
<input type="hidden" name="ttuition" id="ttuition" value= "0.00"  readonly >
<input type="hidden" name="tbookcharge" id="tbookcharge" value= "0.00"  readonly  >
<input type="hidden" name="tstationarycharge" id="tstationarycharge" value= "0.00"  readonly >
<input type="hidden" name="tdiarycharge" id="tdiarycharge" min="0.00" max="0.00" value= "0.00"  readonly >
<input type="hidden" name="texamcharge" id="texamcharge" value= "0.00"  readonlY >
<input type="hidden" name="tmisccharge" id="tmisccharge" value= "0.00"  readonlY >
<input type="hidden" name="tsplconcession" id="tsplconcession" value= "0.00"  readonlY >
<input type="hidden" name="gender1" id="gender1" value= "Male"  readonlY >




</div>

 <!--- <form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit1">
</form>

<button class="button" type="Submit" name="Submit" id="Submit" value="Submit" onclick="editpost.php" >Submit  </button>
-->








<!--end responsive-form-->

</div>

</form>



<!---{function myFunction() {
//	  var x1 = document.getElementById("result");
// var x2 = document.getElementById("fname");
 // x1.value= x2.value/2 ;
//}
 //document.getElementById("result").innerHTML = x1;
 // document.getElementById("result").value =  = "dfsdfsdf";
  // x1.value = x1.value.toUpperCase();
  // alert(x1.value) ;


<?php
//include 'viewfee.php';
?>
</head>

</body>
</html>
