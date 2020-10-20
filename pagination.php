<?php
include 'conn.php';
$limit = 3;
$page = "";

if (isset($_GET['pageNo'])) {
    $page = $_GET['pageNo'];
} else {
    $page = 1;
}

$offSet = ($page - 1) * $limit;
$qr = "SELECT * FROM MyGuests LIMIT {$offSet},{$limit}";
$result  = mysqli_query($conn, $qr);

?>


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
        while ($userData = mysqli_fetch_assoc($result)) {
        ?>
            <tr>
                <td>
                    <span class="custom-checkbox">
                        <input type="checkbox" id="checkbox <?php echo $userData['id']; ?> " name="options[]" value="<?php echo $userData['id']; ?>">
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
                    echo $userData['name'] ?>
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
                    <a href="editUser.php?id=<?php echo $userData['id']; ?>" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                    <!-- <button><a href='editUser.php'>edit</a></button> -->

                    <a href="deleteUser.php?id=<?php echo $userData['id'] ?> " class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
                    </a>
                </td>
            </tr>
        <?php }
        ?>
    </tbody>
</table>


<?php
$pQ = "SELECT * FROM MyGuests";
$result2 = mysqli_query($conn, $pQ);

if (mysqli_num_rows($result2) > 0) {
    $totalRow = mysqli_num_rows($result2);
    $totalPage = ceil($totalRow / $limit);

    echo '<div class="clearfix" >';
    echo '<div class="hint-text">Showing <b>' . $limit . '</b> out of <b>' . $totalRow . ' </b> entries </div>';
    echo '<ul class="pagination" >';
    for ($i = 1; $i <=  $totalPage; $i++) {
        if ($i == $page) {
            $active = "active";
        } else {
            $active = "";
        }
        echo '<li id=' . $i . ' class="page-item ' . $active . ' ">
        <a id=' . $i . ' href= "" class="page-link">' . $i . '</a>
        </li>';
    }
    echo '</ul>';
    echo '</div>';
}

?>

<!-- 
    <div class='clearfix'>
                    <div class='hint-text'>Showing <b>5</b> out of <b> 
                    </b> entries</div> 
                 <ul class='pagination'>
                        <li id='prev' class='page-item disabled'><a href='#'>Previous</a></li>
                        <li id='1' class='page-item active'><a href='#' class='page-link'>1</a></li>
                        <li id='2'  class='page-item'><a href='#' class='page-link'>2</a></li>
                        <li id='3' class='page-item'><a href='#' class='page-link'>3</a></li>
                        <li id='4' class='page-item'><a href='#' class='page-link'>4</a></li>
                        <li id='5' class='page-item'><a href='#' class='page-link'>5</a></li>
                        <li id='next' class='page-item'><a href='#' class='page-link'>Next</a></li> 
                    </ul>
                </div> -->