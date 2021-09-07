<?php
// Include script to make a database connection
include("connect.php");

      echo '<a href="logout.php">Logout</a><br/>';
	  
// Check that the input fields are not empty and process the data
if(!empty($_POST['delete']) && !empty($_POST['id'])){
	$id=$_POST['id'];
    $query3 = "DELETE FROM personal_info WHERE id='".$_POST['id']."' ";
    if (mysqli_query($conn, $query3)) {
        echo "Record deleted successfully !";
		echo '<a href="getform.php">Get Form</a><br/>';
      die(0);
	}
}
	else {
        // Display an error message if unable to delete the record
       echo "Error deleting record: " . $conn->error;
    }


?>