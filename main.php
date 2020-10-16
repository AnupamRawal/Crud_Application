<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel </title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="table.css" rel="stylesheet" />
    <link href="deleteCss.css" rel="stylesheet" />


    <script>
        $(document).ready(function () {
            // Activate tooltip
            $('[data-toggle="tooltip"]').tooltip();

            // Select/Deselect checkboxes
            var checkbox = $('table tbody input[type="checkbox"]');
            $("#selectAll").click(function () {
                if (this.checked) {
                    checkbox.each(function () {
                        this.checked = true;
                    });
                } else {
                    checkbox.each(function () {
                        this.checked = false;
                    });
                }
            });
            checkbox.click(function () {
                if (!this.checked) {
                    $("#selectAll").prop("checked", false);
                }
            });
        });
    </script>
</head>

<body>
<?php 
    include 'conn.php';
    $qr = "SELECT * FROM MyGuests";
    $result  = mysqli_query($conn,$qr);
    // $rowLength = mysqli_fetch_array($result);
    // print_r($rowLength);
    // $totalRow = count($rowLength['id']);
    $totalRow=mysqli_num_rows($result);

    ?>

    <div class="container">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-xs-6">
                            <h2>welcome<b>

                                <!-- session to display username  -->
                                <?php 
                                echo $_SESSION["username"];
                                ?>
                            </b></h2>
                        </div>
                        <div class="col-xs-6">
                            <!-- <button><a href="userReg.php">sdfdsafs</a></button> -->
                            <!-- <form name="frmSearch" method="post" action="index.php">
	<div class="search-box">
	<p>
	<input type="text" placeholder="Name" name="search[name]" class="demoInputBox" value="<?php echo $name; ?>"	/>
	<input type="text" placeholder="Code" name="search[code]" class="demoInputBox" value="<?php echo $code; ?>"	/>
	<input type="submit" name="go" class="btnSearch" value="Search">
	<input type="reset" class="btnSearch" value="Reset" onclick="window.location='index.php'">
	</p>
	</div>
</form> -->
                            <button class="btn btn-success">
                            <a href="userReg.php" class="text-white" style="color:white" >
                            <i class="material-icons">&#xE147;</i><span>
                                        Add New Employee
                                    </span></a></button>

                            <a href="logOut.php" class="btn btn-info"> <span>Log out</span></a>
                        </div>
                    </div>
                </div>
                <table name="dataTable" id="dataTable" class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>
                                <span class="custom-checkbox">
                                    <input type="checkbox" id="selectAll">
                                    <label for="selectAll"></label>
                                </span>
                            </th>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Gender</th>
                            <th>Password</th>
                            <th>Reg. date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody> 

                        <!-- importent step to remember -->
                        <?php 
                             while( $userData = mysqli_fetch_assoc($result))
                             {
                            ?>
                        <tr>  
                            <td>
                                <span class="custom-checkbox">
                                    <input type="checkbox" 
                                    id="checkbox <?php echo $userData['id']; ?> " name="options[]" value="<?php echo $userData['id']; ?>">
                                    <label for="checkbox<?php echo $userData['id']; ?>"></label>
                                </span>
                            </td>
                            <td>
                            <?php 
                            echo $userData['id'];
                            ?>
                            </td>
                            <td>
                                <?php 
                                echo $userData['name']?>
                            </td>
                            <td>
                                <?php
                                echo $userData['email']
                                ?>
                            </td>
                             <td>
                                <?php
                                echo $userData['gender']
                                ?>
                            </td>
                            <td>
                                <?php 
                                echo $userData['password']
                                ?>
                            </td>
                            <td>
                                <?php 
                                echo $userData['reg_date']
                                ?>
                            </td>
                            <td>
                                <a href="editUser.php?id=<?php echo $userData['id']; ?>"
                                 class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                                <!-- <button><a href='editUser.php'>edit</a></button> -->

                                    <a href="deleteUser.php?id=<?php echo $userData['id'] ?> " class="delete" data-toggle="modal"><i
                                        class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
                                    </a>  

                                    <?php 
                                    include 'deleteUser.php'
                                    ?>
                            </td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>

                <div class="clearfix">
                    <div class="hint-text">Showing <b>5</b> out of <b>
                    <?php 
                    echo $totalRow;
                    ?>
                    </b> entries</div>
                    <ul class="pagination">
                        <li id="prev" class="page-item disabled"><a href="#">Previous</a></li>
                        <li id="1" class="page-item active"><a href="#" class="page-link">1</a></li>
                        <li id="2"  class="page-item"><a href="#" class="page-link">2</a></li>
                        <li id="3" class="page-item"><a href="#" class="page-link">3</a></li>
                        <li id="4" class="page-item"><a href="#" class="page-link">4</a></li>
                        <li id="5" class="page-item"><a href="#" class="page-link">5</a></li>
                        <li id="next" class="page-item"><a href="#" class="page-link">Next</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</body>
<script type="text/javascript">
// Basic example
$(document).ready(function () {
  $('#dataTable').DataTable({
    "paging": simple_numbers // false to disable pagination (or any other option)
  });
  $('.dataTables_length').addClass('bs-select');
});

</script>


</html>