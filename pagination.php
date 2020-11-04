<?php

include 'conn.php';
$limit = 5;
$page = '';

if (isset($_POST['pageNo'])) {
    $page = $_POST['pageNo'];
} else {
    $page = 1;
}

$offSet = (($page - 1) * $limit);
$qr = "SELECT * FROM MyGuests  LIMIT {$offSet},{$limit}";
$result = mysqli_query($conn, $qr) or die('not success');

?>

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
                    <button class="btn btn-success">
                        <a href="userReg.php" class="text-white" style="color:white">
                            <i class="material-icons">&#xE147;</i><span>Add New Employee</span></a></button>
                    <a href="logOut.php" class="btn btn-info"> <span>Log out</span></a>
                </div>
            </div>
        </div>

        <form method='post' action='download.php'>
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
                <tbody id="tableBody">
                    <?php
                    $userArray = ["id", "name", "email", "gender", "reg_date"];
                    while ($userData = mysqli_fetch_assoc($result)) {
                        $id = $userData['id'];
                        $name = $userData['name'];
                        $email = $userData['email'];
                        $gender = $userData['gender'];
                        $reg_date = $userData['reg_date'];

                        $userArray = [$id, $name, $email, $gender, $reg_date];
                    ?>
                        <tr>
                            <td>
                                <span class="custom-checkbox">
                                    <input type="checkbox" id="checkbox <?php echo $userData['id']; ?> " name="options[]" value="<?php echo $userData['id']; ?>">
                                    <label for="checkbox <?php echo $userData['id']; ?>"></label>
                                </span>
                            </td>

                            <td><?php echo $userData['id']; ?></td>
                            <td><?php echo $userData['name']; ?></td>
                            <td><?php echo $userData['email']; ?></td>
                            <td><?php echo $userData['gender']; ?></td>
                            <td><?php echo $userData['password']; ?></td>
                            <td><?php echo $userData['reg_date']; ?></td>

                            <td>
                                <a href="editUser.php?id=<?php echo $userData['id']; ?>" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>

                                <a href="deleteUser.php?id=<?php echo $userData['id'] ?> " class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                            </td>
                        </tr>
                    <?php }
                    ?>
                </tbody>
            </table>
        </form>
        
        <!-- to download csv file  -->
        <form class="form-horizontal" action="functions.php" method="post" name="upload_excel" enctype="multipart/form-data">
            <div class="form-group">
                <div class="col-md-4 col-md-offset-4">
                    <input type="submit" name="Export" class="btn btn-success" value="Export to Excel" />
                </div>
            </div>
        </form>

    </div>
</div>

<?php
$pQ = "SELECT * FROM MyGuests";
$result2 = mysqli_query($conn, $pQ);

if (mysqli_num_rows($result2) > 0) { ?>
    <?php
    $totalRow = mysqli_num_rows($result2);
    $totalPage = ceil($totalRow / $limit);
    ?>

    <div class="clearfix">
        <div class="hint-text"> Showing
            <b> <?php echo $limit; ?> </b> out of
            <b> <?php echo $totalRow; ?> </b> entries
        </div>
        <ul class="pagination" id="pagination">

            <?php
            for ($i = 1; $i <=  $totalPage; $i++) {
            ?>
                <?php
                if ($i == $page) {
                    $active = "active";
                } else {
                    $active = "";
                }
                ?>

                <li class="page-item <?php echo $active; ?>">
                    <a id=<?php echo  (int)$i; ?> class="active" href="" class="page-link"> <?php echo $i; ?> </a>
                </li>
            <?php
            }
            ?>
        </ul>
    </div>
<?php
} ?>