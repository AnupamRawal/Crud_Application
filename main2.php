<?php
session_start();
?>
<?php
include 'conn.php';
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
<!-- importent step to remember -->

<body>
    <div class="container" id="container">

    </div>

    <!-- script for pagination using ajax -->
    <script type="text/javascript">
        // load data into table
        $(document).ready(function() {
            function loadTable(page) {
                console.log(page);
                $.ajax({
                    url: "pagination.php",
                    type: "POST",
                    data: {
                        pageNo: page
                    },
                    success: function(data) {
                        console.log(data);
                        $('#container').html(data);
                    }
                });
            }
            loadTable();
            $(document).on("click", "#pagination a ", function(e) {
                e.preventDefault();
                let pageId = $(this).attr("id");
                let pageInt = parseInt(pageId);
                console.log(pageInt);
                loadTable(pageInt);
            })
        });
    </script>
</body>

</html>