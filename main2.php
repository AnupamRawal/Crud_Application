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
        $(document).ready(function() {
            // Activate tooltip
            $('[data-toggle="tooltip"]').tooltip();

            // Select/Deselect checkboxes
            var checkbox = $('table tbody input[type="checkbox"]');
            $("#selectAll").click(function() {
                if (this.checked) {
                    checkbox.each(function() {
                        this.checked = true;
                    });
                } else {
                    checkbox.each(function() {
                        this.checked = false;
                    });
                }
            });
            checkbox.click(function() {
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
    $limit = 3;

    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 1;
    }

    $offSet = ($page - 1) * $limit;
    $qr = "SELECT * FROM MyGuests LIMIT {$offSet},{$limit}";
    $result  = mysqli_query($conn, $qr);

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
                            <button class="btn btn-success">
                                <a href="userReg.php" class="text-white" style="color:white">
                                    <i class="material-icons">&#xE147;</i><span>Add New Employee</span></a></button>
                            <a href="logOut.php" class="btn btn-info"> <span>Log out</span></a>
                        </div>
                    </div>
                </div>
                <div id="userTable">

                </div>
            </div>
        </div>
    </div>

    <!-- script for pagination using ajax -->
    <script type="text/javascript">
        // load data into table
        $(document).ready(function() {
            function loadTable(page) {
                $.ajax({
                    url: 'pagination.php',
                    type: 'POST',
                    data: {
                        pageNo: page
                    },

                    success: function(data) {
                        $('#userTable').html(data);
                    }
                })
            }
            loadTable();

            $(document).on("click", "#pagination a", function(e) {
                e.preventDefault();
                let pageId = $(this).attr("id");
                loadTable(pageId);
            })
        });
    </script>
</body>

</html>