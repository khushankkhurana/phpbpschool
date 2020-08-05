<?php
session_start() ;

?>
<!Document html>
<head>
<link rel="stylesheet" href="../css/w3.css">
<link href="/bpschool/assets/plugins/dropify/css/dropify.min.css" rel="stylesheet">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=.5">

<script src="/bpschool/assets/plugins/dropify/js/dropify.min.js"></script>

       <!-- App js -->

       <script>
           $('.dropify').dropify();
       </script>
<script type="text/javascript"  src="../js/jquery321.js">
<script  type="text/javascript" >
str=0 ;
$(document).ready(function(){
 $("select.country").change(function(){
	var selectedClass = $(this).children("option:selected").val();
  	var xx.value = selectedClass ;



		});
});

</script>
<script>

$(document).ready(function(){
	load_data();
	function load_data(query)
	{
		$.ajax({
			url:"checkac.php",
			method:"post",
			data:{query:query},
			success:function(data)
			{

			// $('p').html(div_data);
				$('#result').html(data);
			}
		});
	}

	$('#acno').keyup(function(){
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

function my(){
$(document).ready(function(){

 $("select.country").change(function(){
	 var selectedClass = $(this).children("option:selected").val();
  	var str1 =   $( "#tclass option:selected" ).val();
  alert(str1);





								});
							});
				}
				 function getDate(){
	    //var today = new Date();
   // document.getElementById("dateofbirth").value = today.getFullYear() + '-' + ('0' + (today.getMonth() + 1)).slice(-2) + '-' + ('0' + today.getDate()).slice(-2);
//alert(dateofbirth);
}
</script>
<script>

function showHint(str) {
	    if (str.length == 0) {
        document.getElementById("temp_class").innerHTML = "";
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
		//alert(str);
		gval();
		total() ;
    }
}
function gval(){
	// alert("Welcome");
	// this function will give all the initial value according to class
	var inputVal = document.getElementById("tclass").value;
        //up.innerHTML = 'Click on the button to convert whole document to string';
         var res = inputVal.split(",");
			//alert(res);
		   // alert(res[1]*1+res[2]*1) ;
        	document.getElementById("admfee").value=parseFloat(res[1]).toFixed(2);
			document.getElementById("annual").value=res[2];
			document.getElementById("tuition").value=res[3];
			document.getElementById("bookcharge").value=res[4];
			document.getElementById("stationarycharge").value=res[5];
			document.getElementById("diarycharge").value= parseFloat(res[6]).toFixed(2);
			document.getElementById("examcharge").value=res[7];
			document.getElementById("misccharge").value=res[8];
			document.getElementById("temp_class").value= res[0];
			//document.getElementById("acno").value=res[9];
			//alert (res[9]);
			var tempclass = document.getElementById("temp_class").value ;
			//alert(res[4]) ;
			// alert(tempclass);
			gval1();
			}

</script>
<script>
function stat() {
	var opt = tstation.options[tstation.selectedIndex];
      var opt1 = opt.value;
	  var opt2 =opt1.split(",") ;

	  document.getElementById("charges").value = opt2[1] ;
//        opt3.value = opt2[1];
		document.getElementById("station").value= opt2[0];
		//alert(document.getElementById("charges").value);
	  total() ;
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
<script>
function concess() {
	var sopt = tconcession.options[tconcession.selectedIndex];
      var sopt1 = sopt.value;
	  var sopt2 =sopt1.split(",") ;

	  var sopt3
	  sopt3 = sopt2[1];
	   sopt3.value  = sopt3 ;
	   document.getElementById("concession1").value = sopt2[1] ;
	   document.getElementById("concession").value = parseFloat(sopt3).toFixed(2) ;

	   total() ;
	}

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
	var dtotal ;
	 dtotal = admfee*1 +annual*1 +tuition*1 ;
	 gtotal  = (admfee*1 +annual*1 +tuition*1 + bookcharge*1 + stationarycharge*1 +diarycharge*1 + misccharge*1  ) ;
	 var disc ;
	 disc= 0 ;
	 if (concession1 ==1)
		disc = 0 ;
	 else {
		disc = parseInt(( dtotal*concession1*1)/100) ;
		document.getElementById('concession').value = disc ;
	 }
	 gtotal = gtotal  +charges*1 ;
	 net  = (gtotal +balance*1) - (disc + splconcession*1) ;
	 document.getElementById("total").value = parseFloat(gtotal).toFixed(2);
	 document.getElementById("net").value = parseFloat(net).toFixed(2);
	 document.getElementById('concession').value = disc.toFixed(2) ;
	 document.getElementById('splconcession').value = splconcession ;

}
function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result)
                        .width(100)
                        .height(100);


                };

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>
<script>
    $(document).ready(function(){
        $('input[type="file"]').change(function(e){
            var fileName = e.target.files[0].name;

			document.getElementById("file").value= fileName ;
			//alert('The file "' + fileName +  '" has been selected.');
        });
    });
	function gval1() {
  var   t_class = document.getElementById("temp_class").value ;


	$.ajax({
			url:"getuser4.php",
			method:"post",
			data :{classname:t_class},
			success:function(data)
			{

			// $('p').html(div_data);
			// alert(data) ;

			 var res = JSON.parse(data);

			document.getElementById("acno").value=res;;


			}



		});
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

      // $tclass1="" ;
	   $temp="" ;
	   ?>
<?php
// $tclass1 = fopen("file.txt", "r") or die("Unable to open file!");
// $temp = fread($tclass1,filesize("file.txt"));
//  fclose($tclass1);
// echo $temp;
?>



    <body>

    <!-- BEGIN: Content-->
   <div class="app-content content">
       <div class="content-overlay"></div>
       <div class="header-navbar-shadow"></div>
       <div class="content-wrapper">
           <div class="content-header row">
               <div class="content-header-left col-md-9 col-12 mb-2">
                   <div class="row breadcrumbs-top">
                       <div class="col-12">
                           <h2 class="content-header-title float-left mb-0">Add New Student</h2>
                           <div class="breadcrumb-wrapper col-12">
                               <ol class="breadcrumb">
                                   <li class="breadcrumb-item"><a href="index.html">Home</a>
                                   </li>
                                   <li class="breadcrumb-item"><a href="#">Add New Student</a>

                               </ol>
                           </div>
                       </div>
                   </div>
               </div>
               <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                   <div class="form-group breadcrum-right">
                       <div class="dropdown">
                           <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-settings"></i></button>
                           <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#">Chat</a><a class="dropdown-item" href="#">Email</a><a class="dropdown-item" href="#">Calendar</a></div>
                       </div>
                   </div>
               </div>
           </div>
           <div class="row">
                        <div class="col-12">
                            <div class="card dr-pro-pic">
                                <div class="card-body">
                                    <form method="post" class="card-box" action="addstudent.php" method  id="form1" id='' autocomplete="on" enctype="multipart/form-data">
                                        <input type="file"  id="input-file-now-custom-1" name="photo" class="dropify" data-default-file="/bpschool/assets/images/users/patient-pro.png" onkeyup="upload2.php"/>
                                        <script src="/bpschool/assets/plugins/dropify/js/dropify.min.js"></script>
                                        <link href="/bpschool/assets/plugins/dropify/css/dropify.min.css" rel="stylesheet">
                                                                                       <!-- App js -->
<style><script src='upload.js'></script>
.dropify-wrapper {
  width: 20%;
}
</style>
                                                                                       <script>
                                                                                           $('.dropify').dropify();
                                                                                       </script>


                                    <div class="">

                                            <div class="form-group row">
                                                <div class="col-md-6">
                                                    <input type="text" placeholder="First Name" class="form-control" name="First_Name" id="First_Name">
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" placeholder="Last Name" class="form-control" name="Last_Name" id="Last_Name">
                                                </div>
                                            </div>
                                            <div class="form-group row">

                                                <div class="col-md-2">
                                                  <select  name="tclass" id="tclass" class="form-control" onclick="showHint(this.value)"  required >

                                                    <option value="" disabled selected>Choose Class Name</option>
                                                   <?php
                                                    $co1=0 ;
                                                    while ($co1 <count($tclass)){
                                                    ?>
                                                    <option value= "<?php echo $tclass[$co1] ?>" >   <?php echo $tclass1[$co1] ?> </option>;
                                                    <?php $co1=$co1+1;
                                                    }
                                                  ?>
                                                  </select>
                                                </div>
                                                <div class="col-md-2">
                                                  <select class="form-control">
                                                      <option>Section</option>
                                                      <option>A</option>
                                                        <option>B</option>
                                                          <option>C</option>
                                                            <option>D</option>
                                                  </select>
                                                </div>
                                                <div class="col-md-2">
                                                  <input type="number" name ="acno" id="acno" placeholder="Admission No." class="form-control" readonly autocomplete="off">
                                                </div>
                                             <div class="col-md-3">
                                               <select id="newold" name="newold" class="form-control" required onclick="oldnew()">
                                             	<option> New  </option>
                                             	<option selected > Old   </option>
                                             	</select>
                                             	<input type="hidden" name="txtnewold" id="txtnewold" value="Old" />
                                             </div>
                                              <div class="col-md-3">
                                                <select   name="tconcession" id="tconcession" class="form-control" onclick="concess()" required >
                                               <!-- onchange="showHint(this.value)" --->
                                               	<option value="" disabled selected>Scholarship/Concession</option>
                                                <?php
                                               	$co1=0 ;
                                               	while ($co1 <count($tconcession)){
                                               	?>
                                               	<option value= "<?php echo $tconcession2[$co1] ?>" >  <?php echo $tconcession[$co1] ?> </option>;
                                               	<?php $co1=$co1+1;
                                               	}
                                               ?>
                                               </select>
                                              </div>
                                              </div>
                                            <div class="form-group row">
                                                <div class="col-md-3">
                                                  <h3>Date Of Joining       :</h3>
                                                </div>
                                                <div class="col-md-3">
                                                  <input type="date"  class="form-control" name="dateofjoining" id="dateofjoining" placeholder="DATE OF JOINING ">
                                                </div>
                                                <div class="col-md-3">
                                                    <select class="form-control" name="gender">
                                                        <option>Male</option>
                                                        <option>Female</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="text" placeholder="Age" class="form-control" name="Age" id="Age">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-md-6">
                                                    <input type="email" placeholder="Email" class="form-control" name="Email" id="Email">
                                                </div>
                                                <div class="col-md-3">
                                                  <h3>Date Of Birth       :</h3>
                                                </div>
                                                <div class="col-md-3">
                                                  <input type="date"  class="form-control" name="dateofbirth" id="dateofbirth" placeholder="DATE OF BIRTH" onchange="getDate()">
                                                </div>

                                            </div>
                                            <div class="form-group row">
                                              <div class="col-md-3">
                                                  <input type="text" placeholder="Username" class="form-control" name="admision_num" id="admission_num">
                                              </div>
                                                <div class="col-md-3">
                                                    <input type="text" placeholder="Password" class="form-control" name="admision_num" id="admission_num">
                                                </div>

                                                <div class="col-md-3">
                                                  <select class="form-control">
                                                      <option>Religion</option>
                                                      <option>Female</option>
                                                  </select>
                                                </div>
                                                <div class="col-md-3">
                                                  <select class="form-control">
                                                      <option>Category</option>
                                                      <option>Female</option>
                                                  </select>
                                                </div>
</div>
                                            <div class="form-group row">

                                                <div class="col-md-3">
                                                  <select  name="tstation" id="tstation" class="form-control" onclick="stat()" required>
                                                 <!-- onchange="showHint(this.value)" --->
                                                 	<option value="" disabled selected>Transport Route</option>

                                                  <?php
                                                 	$co1=0 ;
                                                 	while ($co1 <count($tstation2)){
                                                 	?>
                                                 	<option value= "<?php echo $tstation2[$co1] ?>" >   <?php echo $tstation[$co1] ?> </option>;
                                                 	<?php $co1=$co1+1;
                                                 	}
                                                 ?>
                                                 </select>
                                                 <input  type="hidden"  name="station" id="station"  readonly />

                                              </div>
                                                <div class="col-md-3">
                                                  <input  type="text" name="charges" id="charges" value= "0.00" class="form-control" readonly >


                                                </div>
                                                </div>

                                    </div>
                               </div>
                            </div>
                        </div>

    <section id="basic-horizontal-layouts">
                    <div class="row match-height">
                        <div class="col-md-6 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Father's Information</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">

                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>Name</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" id="first-name" class="form-control" name="fathername" id="fathername" placeholder="First Name">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>Mobile</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="number" id="contact-info" class="form-control" name="contact" placeholder="Mobile">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>Occupation</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="password" id="password" class="form-control" name="password" placeholder="Password">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>Annual Income</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="password" id="password" class="form-control" name="password" placeholder="Annual Income">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>Aadhar card no.</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="password" id="password" class="form-control" name="password" placeholder="Aadhar card no.">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>Pan card no.</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="password" id="password" class="form-control" name="password" placeholder="Pan card no.">
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Mother's Information</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">

                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                              <span>Name</span>
                                                          </div>
                                                          <div class="col-md-8">
                                                              <input type="text" id="mothername" class="form-control" name="mothername" placeholder="Mother's Name">
                                                          </div>
                                                      </div>
                                                  </div>

                                                  <div class="col-12">
                                                      <div class="form-group row">
                                                          <div class="col-md-4">
                                                              <span>Mobile</span>
                                                          </div>
                                                          <div class="col-md-8">
                                                              <input type="number" id="contact-info" class="form-control" name="contact" placeholder="Mobile">
                                                          </div>
                                                      </div>
                                                  </div>
                                                  <div class="col-12">
                                                      <div class="form-group row">
                                                          <div class="col-md-4">
                                                              <span>Occupation</span>
                                                          </div>
                                                          <div class="col-md-8">
                                                              <input type="password" id="password" class="form-control" name="password" placeholder="Occupation">
                                                          </div>
                                                      </div>
                                                  </div>
                                                  <div class="col-12">
                                                      <div class="form-group row">
                                                          <div class="col-md-4">
                                                              <span>Annual Income</span>
                                                          </div>
                                                          <div class="col-md-8">
                                                              <input type="password" id="password" class="form-control" name="password" placeholder="Annual Income">
                                                          </div>
                                                      </div>
                                                    </div>
                                                      <div class="col-12">
                                                          <div class="form-group row">
                                                              <div class="col-md-4">
                                                                  <span>Aadhar card no.</span>
                                                              </div>
                                                              <div class="col-md-8">
                                                                  <input type="password" id="password" class="form-control" name="password" placeholder="Aadhar card no.">
                                                              </div>
                                                          </div>
                                                      </div>
                                                      <div class="col-12">
                                                          <div class="form-group row">
                                                              <div class="col-md-4">
                                                                  <span>Pan card no.</span>
                                                              </div>
                                                              <div class="col-md-8">
                                                                  <input type="password" id="password" class="form-control" name="password" placeholder="Pan card no.">
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                                </div>
                                            </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
              </div>


                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Address</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">

                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-label-group">
                                                            <input type="text" id="first-name-column" class="form-control" placeholder="Permanenet Addreess" name="fname-column">
                                                            <label for="first-name-column">Permanent Addreess</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-label-group">
                                                            <input type="text" id="last-name-column" class="form-control" placeholder="Phone no. (SMS no.)" name="lname-column">
                                                            <label for="last-name-column">Phone no. (SMS no.)</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-label-group">
                                                            <input type="text" id="city-column" class="form-control" placeholder="Correspondence Address" name="city-column">
                                                            <label for="city-column">Correspondence Address</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-label-group">
                                                            <input type="text" id="country-floating" class="form-control" name="country-floating" placeholder="Phone no.">
                                                            <label for="country-floating">Phone no.</label>
                                                        </div>
                                                    </div>

                                                        </fieldset>
                                                    </div>
                                                    <div class="col-12">
                                                        <button type="submit" class="btn btn-primary mr-1 mb-1"name="Submit" id="Submit" onclick="addstudent.php">Submit</button>
                                                        <button type="reset" class="btn btn-outline-warning mr-1 mb-1">Reset</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                       </div>
                 </div>
             </div>
        <div id = "boxes">
		<fieldset class="field_set">
            <legend style="font-size:28px; color:blue" >Student Informations:(Adding New Records)</legend>

            <div id = "leftbox">


	<form action="upload2.php" method="post" enctype="multipart/form-data"  id='uploadImage' >
				<input style="width:300; align:right;font-size:18px" type='file' name="photo" id="photo" onchange="readURL(this)" form='uploadImage'/>
				<img style=" border-radius: 50%; text-align:center;width:100;height:100" id="blah" src="#" alt="your image" form="uploadImage"/>
				<input type="submit" name="submit" value="Upload" onclick="upload2.php" id='uploadImage' style="font-size:12px" />
	</form>
 <div style="color:red; font-size:16" id='msg'>
 </div>

		<!-- including upload.js script -->
		<script src='upload.js'></script>

<form action="addstudent.php" method ="post"   id="form1" id='' autocomplete="on" >

	    <label for="Class Name"   >Class Name </label>
    <br>
			<select  name="tclass" id="tclass"  onclick="showHint(this.value)" style="font-size:18px;height:35;width:250" required >

				<option value="" disabled selected>Choose Class Name</option>
			 <?php
				$co1=0 ;
				while ($co1 <count($tclass)){
				?>
				<option value= "<?php echo $tclass[$co1] ?>" >   <?php echo $tclass1[$co1] ?> </option>;
				<?php $co1=$co1+1;
				}
			?>
			</select>

			<!---

					<label for="image " style="font-size :14px; align:right" >Select image to upload:</label>
					<input type="file" name="fileToUpload" id="fileToUpload" onchange ="upload.php">
					<input type="submit" value="Upload Image" name="input" onclick="upload.php">

				</div>
				</div id="txtHint">	 -->
		<input type="text" id="temp_class" name="temp_class">


<br>
<br>

		<label for="ACCOUNT NO"   >ACCOUNT NO </label>

  <br>
  <input type="number" name ="acno" id="acno" placeholder="ACCOUNT NO" style="height:35;width:250;font-size:18px" readonly autocomplete="off">

   <label for="Status for New Old"   > Status </label>

  <select id="newold" name="newold" style="height:35;width:70;font-size:18px" required onclick="oldnew()">
	<option> New  </option>
	<option selected > Old   </option>
	</select>
	<input type="hidden" name="txtnewold" id="txtnewold" value="Old" />
 	<div id="result" style="color :red; font-size :20" > </div>
	 <br>
	 	 			<label for="STUDENT NAME" style="font-size:14px">STUDENT NAME </label>
<br>
<input type="text" name="name" id="name"  placeholder="STUDENT NAME *" style="height:35;width:250;font-size:18px" autocomplete="off" required>
<br>
<label for="GENDER" style="font-size="18px"">GENDER </label>
<input type="radio" name="gender"  value="Male" required >Male
  <input type="radio" name="gender"  value="Female"  >Female
  <input type="radio" name="gender"  value="Other" >Other
  <!-- <span class="error">* <?php echo $genderErr;?></span>
-->
<br>
<br>
<label for="date of birth" style="font-size="18px">DATE OF BIRTH</label>
<br>
<input  type="date" name="dateofbirth" id="dateofbirth" placeholder="DATE OF BIRTH "style="height:35;width:250; font-size:18px" onchange="getDate()">
<br>
<br>


<label for="date of JOINING" style="font-size="14px"">DATE OF JOINING </label>


<br>
<input type="date" name="dateofjoining" id="dateofjoining" placeholder="DATE OF JOINING " style="height:35;width:250;font-size:18px ">

<br>
<br>
<label for="FATHER'S NAME" style="font-size="14px">FATHER'S NAME</label>

<br>
<input type="text" name="fathername" id="fathername" placeholder="FATHERS NAME" style="height:35;width:250;font-size:18px" autocomplete="off" required >

<br>
<br>

<label for="MOTHER'S NAME" style="font-size="14px"">MOTHER'S NAME</label>
<br>
<input type="text" name="mothername" placeholder="MOTHER'S NAME" style="height:35;width:250;font-size:18px"autocomplete=off >
<br>
<br>
<label for="MOBILE NO" style="font-size="14px"">MOBILE NUMBER</label>
<br>
<input type="text" name="mobileno" id="mobileno" placeholder="MOBILE NUMBER" style="height:35;width:250;font-size:18px" autocomplete=off>
	<br>
	<br>
	<label for="Address="font-size="14px">Address</label>
	<br>
	<input type="text" name="address1" id="address1" placeholder="Address Line 1" style="height:35;width:230;font-size:18px" autocomplete="off">
	<input type="text" name="address2" id="address2" placeholder="Address Line 2" style="height:35;width:230;font-size:18px" autocomplete="off">
	<input type="text" name="city" id="city" placeholder="City" style="height:35;width:230;font-size:18px" autocomplete="off">


            </div>
         <div id = "middlebox">

                TRANSPORT  <br>
 <select  name="tstation" id="tstation"  style="font-size:18px;height:35;width:200" onclick="stat()" required>
<!-- onchange="showHint(this.value)" --->
	<option value="" disabled selected>Transport Route</option>

 <?php
	$co1=0 ;
	while ($co1 <count($tstation2)){
	?>
	<option value= "<?php echo $tstation2[$co1] ?>" >   <?php echo $tstation[$co1] ?> </option>;
	<?php $co1=$co1+1;
	}
?>
</select>
<input  type="hidden"  name="station" id="station"  readonly />

<br>
<br>
<label for="TRANSPORT CHARGES" >TRANSPORT CHARGES</label>
<br>
<input  type="text" name="charges" id="charges" value= "0.00" style="height:35;width:200;font-size:22;" readonly >
<br>
<br>
<label for="TOTAL" >TOTAL</label>
<br>
<input  type="text" name="total" id="total" value= "0.00" style="height:35;width:200;color:red;font-size:28;" readonly >
<br>
<br>
  CONCESSION:
  <br>
 <select   name="tconcession" id="tconcession"  style="font-size:18px;height:35;width:200" onclick="concess()" required >
<!-- onchange="showHint(this.value)" --->
	<option value="" disabled selected>Scholarship/Concession</option>
 <?php
	$co1=0 ;
	while ($co1 <count($tconcession)){
	?>
	<option value= "<?php echo $tconcession2[$co1] ?>" >  <?php echo $tconcession[$co1] ?> </option>;
	<?php $co1=$co1+1;
	}
?>
</select> <br>
      <br>
<label for="CONCESSION" >B/S/STAFF CONCESSION:</label>
<br>
<input  type="text" name="concession" id="concession" value= "0.00" style="height:35;width:200;font-size:22;" readonly >
<input type="hidden" name="concession1" id="concession1" value="0.00" >
<br>
<br>
<label for="CONCESSION" >SPECIAL CONCESSION:</label>
<br>
<input  type="text" name="splconcession" id="splconcession" value="0.00" PLACEHOLDER ="" style="height:35;width:200;font-size:22;align:left" onkeyup="concess()" autocomplete=off  >
<br>
<br>
<label for="balance" >PREVIOUS BALANCE :</label>
<br>
<input type="text" name="balance" id="balance" value="0.00"  style="height:35;width:200;font-size:22;align:left;" onkeyup="concess()" autocomplete="off" >
<br>
<br>
<label for="net" >NET PAYABLE</label>
<br>
<input type="hidden" name="file" id="file" >
<input  type="text" name="net" id="net" value= "0.00" style="height:35;width:200;color:red;font-size:28;" readonly >
<br>
<br>
<br>
<button  class="button1" type="Submit" name="Submit" id="Submit" value="Submit" onclick="addstudent.php">Submit </button>

</div>
		 <div class="flip-card">
  <div class="flip-card-inner">
    <div class="flip-card-front">
            <div id = "rightbox">

				<label for="ADMISSION FEE" >ADMISSION FEE</label>
				<br>
				<input type="text" name="admfee" id="admfee" value="0.00" min="0.00" max="999999.99" step="0.01" style="height:35;width:200;color:red;font-size:22;" readonly required >
				<br>
				<br>
				<label for="ANNUAL CHARGE" >ANNUAL CHARGES</label>
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

				<input type="text" name="examcharge" id="examcharge" value= "0.00" style="height:35;width:200;color:red;font-size:22;" readonl >
				<br>
				<br>
				<label for="MISC CHARGES" >MISC CHARGES</label>
				<br>
				<input type="text" name="misccharge" id="misccharge" value= "0.00" style="height:35;width:200;color:red;font-size:22;" readonl ></div>
	</div>
 <div class="flip-card-back">
      <h4>Developed by</h4>
      <p>N.K.Khurana</p>
      <p>More Query Contact 9996131351</p>
    </div>
  </div>
</div>



            </div>



 <!--- <form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit1">
</form>
 --->






<fieldset>



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
include 'footer.php';
?>
</head>
</body>
</html>
