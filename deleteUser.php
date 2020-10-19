<?php 
include 'conn.php';
$id=$_GET['id'];

// if(isset($_POST['delete'])){
    $res = mysqli_query($conn,"DELETE FROM `MyGuests` WHERE id=$id");
    header("Location:main2.php");
// }
?>

<!-- Modal HTML -->
<!-- <div id="myModal" class="modal fade">
	<div class="modal-dialog modal-confirm">
		<div class="modal-content">
			<div class="modal-header flex-column">
				<div class="icon-box">
					<i class="material-icons">&#xE5CD;</i>
				</div>						
				<h4 class="modal-title w-100">Are you sure?</h4>	
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<p>Do you really want to delete these records? This process cannot be undone.</p>
			</div>
			<div class="modal-footer justify-content-center">
				<button href="main2.php" type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				<button type="button" name="delete" class="btn btn-danger">Delete</button>
			</div>
		</div>
	</div>
</div>     
</body>
</html> -->