    <?php
	
	include 'csvConfig.php';
	 $conn = getdb();
    //  if(isset($_POST["Import"])){
        
    //     $filename=$_FILES["file"]["tmp_name"];    
    //      if($_FILES["file"]["size"] > 0)
    //      {
    //         $file = fopen($filename, "r");
			
    //           while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
    //            {
    //              $sql = "INSERT INTO MyGuests ('id', 'name', 'email', 'gender','password','reg_date') 
    //                    values ('".$getData[0]."','".$getData[1]."','".$getData[2]."','".$getData[3]."','".$getData[4]."','".$getData[5]."')";
    //                    $result = mysqli_query($conn, $sql);
    //         if(!isset($result))
    //         {
    //           echo "<script type=\"text/javascript\">
    //               alert(\"Invalid File:Please Upload CSV File.\");
    //               window.location = \"index.php\"
    //               </script>";    
    //         }
    //         else {
    //             echo "<script type=\"text/javascript\">
    //             alert(\"CSV File has been successfully Imported.\");
    //             window.location = \"main2.php\"
    //           </script>";
    //         }
    //            }
          
    //            fclose($file);  
    //      }
    //   }   
	  //     function get_all_records(){
    //     $conn = getdb();
    //     $Sql = "SELECT * FROM tblusers";
    //     $result = mysqli_query($conn, $Sql);  
    //     if (mysqli_num_rows($result) > 0) {
    //      echo "<div class='table-responsive'><table id='myTable' class='table table-striped table-bordered'>
    //                          <thead>
    //                          <tr>
    //                           <th>ID</th>
    //                           <th>First Name</th>
    //                           <th>Last Name</th>
    //                           <th>Email</th>
    //                           <th>Contact</th>
    //                           <th>Address</th>
    //                           <th>Posting Date</th>
    //                         </tr>
    //                         </thead><tbody>";
    //      while($row = mysqli_fetch_assoc($result)) {
    //          echo "<tr><td>" . $row['id']."</td>
    //                    <td>" . $row['FirstName']."</td>
    //                    <td>" . $row['LastName']."</td>
    //                    <td>" . $row['Emailid']."</td>
    //                    <td>" . $row['ContactNumber']."</td>
    //                    <td>" . $row['Address']."</td>
    //                    <td>" . $row['PostingDate']."</td></tr>";        
    //      }
        
    //      echo "</tbody></table></div>";
         
    // } else {
    //      echo "No Records Found..";
    // }
    // }
	     if(isset($_POST["Export"])){
         
          header('Content-Type: text/csv; charset=utf-8');  
          header('Content-Disposition: attachment; filename=data.csv');  
          $output = fopen("php://output", "w");  
		 
          fputcsv($output, array('id', 'name', 'email', 'gender','reg_date'));  
          $query = "SELECT `id`,`name`,`email`,`gender`,`reg_date` from MyGuests";  
          $result = mysqli_query($conn, $query);  
          while($row = mysqli_fetch_assoc($result))  
          {  
               fputcsv($output, $row);  
          }  
          fclose($output);  
     }  
     ?>