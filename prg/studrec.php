<!doctype html>
<html>
    <head>
        <title>Change number of rows show in the Pagination using PHP</title>
        <link href="../css/style.css" type="text/css" rel="stylesheet">
        <script src="../js/jquery-3.3.1.min.js" type="text/javascript"></script>
        <script src="../js/script.js" type="text/javascript"></script>
        <?php
		 include "../prg/menu.php";
            include("../dbconn.php");

            $row = 0;

            // number of rows per page
            $rowperpage = 10;
            if(isset($_POST['num_rows'])){
                $rowperpage = $_POST['num_rows'];
            }

            // Previous Button
            if(isset($_POST['but_prev'])){
                $row = $_POST['row'];
                $row -= $rowperpage;
                if( $row < 0 ){
                    $row = 0;
                }
            }

            // Next Button
            if(isset($_POST['but_next'])){
                $row = $_POST['row'];
                $allcount = $_POST['allcount'];

                $val = $row + $rowperpage;
                if( $val < $allcount ){
                    $row = $val;
                }
            }
        ?>
    </head>
    <body>
    <div class="table">

        <table  align="right"  width="82%" id="emp_table" border="0">
             
			<tr class="tr_header">
                <th>S.no</th>
				<th>Adm No </th>
                <th>Name</th>
                <th>Father's Name</th>
				 <th>Mother's Name</th>
				  <th>Class</th>
				   <th>Mobile NO</th>
				    <th>Photo</th>
				               </tr>
            <?php
            // count total number of rows
            $sql = "SELECT COUNT(*) AS cntrows FROM student";
            $result = mysqli_query($conn,$sql);
            $fetchresult = mysqli_fetch_array($result);
            $allcount = $fetchresult['cntrows'];

            // selecting rows
            $sql = "SELECT * FROM STUDENT  ORDER BY acno ASC limit $row,".$rowperpage;
            $result = mysqli_query($conn,$sql);
            $sno = $row + 1;

            while($fetch = mysqli_fetch_array($result)){
				$acno = $fetch['acno'];
			   $name = $fetch['name'];
                $fathername = $fetch['father_name'];
                $mothername =$fetch['mother_name'];
				$class = $fetch['class_name'];
				$mobile = $fetch['mobile_no'];
				$filename=$fetch['filename'];
				$filename ="../image/" .$filename ;
				?>
                <tr>
                    <td align='left'><?php echo $sno; ?></td>
					<td align='left'><?php echo $acno; ?></td>
                    <td align='left'><?php echo $name; ?></td>
                    <td align='left'><?php echo $fathername; ?></td>
					<td align='left'><?php echo $mothername; ?></td>
					<td align='left'><?php echo $class; ?></td>
					<td align='left'><?php echo $mobile; ?></td>		
                <td> <?php echo  '<img src="'.$filename.'" alt="N.A" width="40";height="40" ; border-radius="60%"/>' ?> </td>;
				</tr>
            <?php
                $sno ++;
            }
            ?>
        </table>

        <!-- Pagination control -->
        <form method="post" action="" id="form">
            <div id="div_pagination">
                
               

                <!-- Number of rows -->
                <div class="divnum_rows">
                <span class="paginationtextfield">Number of rows:</span>&nbsp;
                <select id="num_rows" name="num_rows">
				 <input type="submit" class="button" name="but_prev" value="Previous">
                <input type="submit" class="button" name="but_next" value="Next">
                    <?php
                    $numrows_arr = array("5","10","25","50","100","250");
                    foreach($numrows_arr as $nrow){
                        if(isset($_POST['num_rows']) && $_POST['num_rows'] == $nrow){
                            echo '<option value="'.$nrow.'" selected="selected">'.$nrow.'</option>';
                        }else{
                            echo '<option value="'.$nrow.'">'.$nrow.'</option>';
                        }
                    }
                    ?>
                </select>
                </div>
				<input type="hidden" name="row" value="<?php echo $row; ?>">
                <input type="hidden" name="allcount" value="<?php echo $allcount; ?>">
            </div>
        </form>

    </div>
    </body>
</html>
