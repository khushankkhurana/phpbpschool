<html>
   
   <head>
      <title>Paging Using PHP</title>
   </head>
   
   <body>
      <?php
        include '../dbconn.php';
         $rec_limit = 10;
         $conn = mysqli_connect($servername, $username, $password,$db);
         
         if(! $conn ) {
            die('Could not connect: ' . mysqli_error());
         }
         mysqli_select_db($conn,'fees');
         
         /* Get total number of records */
         $sql = "SELECT count(acno) FROM student ";
         $retval = mysqli_query( $sql, $conn );
         
         if(! $retval ) {
            die('Could not get data: ' . mysql_error());
         }
         $row = mysqli_fetch_array($retval, MYSQLI_NUM );
         $rec_count = $row[0];
         
         if( isset($_GET{'page'} ) ) {
            $page = $_GET{'page'} + 1;
            $offset = $rec_limit * $page ;
         }else {
            $page = 0;
            $offset = 0;
         }
         
         $left_rec = $rec_count - ($page * $rec_limit);
         $sql = "SELECT acno,name, father_name ". 
            "FROM student ".
            "LIMIT $offset, $rec_limit";
            
         $retval = mysqli_query( $sql, $conn );
         
         if(! $retval ) {
            die('Could not get data: ' . mysql_error());
         }
         
         while($row = mysqli_fetch_array($retval, MYSQLi_ASSOC)) {
            echo "EMP ID :{$row['acno']}  <br> ".
               "EMP NAME : {$row['name']} <br> ".
               "EMP SALARY : {$row['father_name']} <br> ".
               "--------------------------------<br>";
         }
         
         if( $page > 0 ) {
            $last = $page - 2;
            echo "<a href = \"$_PHP_SELF?page = $last\">Last 10 Records</a> |";
            echo "<a href = \"$_PHP_SELF?page = $page\">Next 10 Records</a>";
         }else if( $page == 0 ) {
            echo "<a href = \"$_PHP_SELF?page = $page\">Next 10 Records</a>";
         }else if( $left_rec < $rec_limit ) {
            $last = $page - 2;
            echo "<a href = \"$_PHP_SELF?page = $last\">Last 10 Records</a>";
         }
         
         mysql_close($conn);
      ?>
      
   </body>
</html>