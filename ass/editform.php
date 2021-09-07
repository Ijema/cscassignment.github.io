<?php
// Include script to make a database connection
include("connect.php");
// Empty string to be used later
$regnum='';
$fullname='';
$faculty='';
$department='';
$session='';
$coursetitle='';
$coursecode='';


// Button click to update using POST method
if(!empty($_POST['update']) && !empty($_POST['id']) )  {
  $id=$_POST['id'];
  // Fetch record with ID and populate it in the form
  $query2 = "SELECT * FROM personal_info WHERE regnum='".$_POST['id']."' ";
  $result = $conn->query($query2);
  if ($result->num_rows > 0) {
    // Output data for each row
    while($row = $result->fetch_assoc()) {
      $regnum=$row["regnum"];
	  $fullname=$row["fullname"];
      $faculty=$row["faculty"];
	  $department=$row["department"];
	  $session=$row["session"];
	  $coursetitle=$row["coursetitle"];
	  $coursecode=$row["coursecode"];
	  
    }
   echo "Current Details: " ."<b> - Reg Number:</b> " . $regnum. "<b> Full Name:</b> " . $fullname. " <b>Faculty:</b>" . $faculty. " <b> department:</b> " . $department. " <b> session:</b> " . $session. "<b> coursetitle:</b> " . $coursetitle. "<b> coursecode:</b> " . $coursecode. "<br>";
  } else {
    echo "Error updating";
  }
}

// Button click to update using GET method
if(!empty($_GET['update']) && !empty($_GET['regnum']) )  {
  $regnum=$_GET['regnum'];
  // Fetch record with id and populate it in the form
  $query2 = "SELECT * FROM personal_info WHERE regnum='".$_GET['regnum']."' ";
  $result = $conn->query($query2);
  if ($result->num_rows > 0) {
    // Output data for each row
    while($row = $result->fetch_assoc()) {
     $regnum=$row["regnum"];
	  $fullname=$row["fullname"];
      $faculty=$row["faculty"];
	  $department=$row["department"];
	  $session=$row["session"];
	  $coursetitle=$row["coursetitle"];
	  $coursecode=$row["coursecode"];
	  
    }
   echo "Current Details: " ."<b> - Reg Number:</b> " . $regnum. "<b> Full Name:</b> " . $fullname. " <b>Faculty:</b>" . $faculty. " <b> department:</b> " . $department. " <b> session:</b> " . $session. "<b> coursetitle:</b> " . $coursetitle. "<b> coursecode:</b> " . $coursecode. "<br>";
  } else {
    echo "Error updating";
  }
}
// Check that the input fields are not empty and process the data
if(!empty($_POST['regnum']) && !empty($_POST['fullname']) && !empty($_POST['faculty']) && !empty($_POST['department']) && !empty($_POST['session']) && !empty($_POST['coursetitle']) && !empty($_POST['coursecode'])){
    // Insert into the database
  $query = "UPDATE personal_info SET regnum='".$_POST['regnum']."', fullname='".$_POST['fullname']."', faculty='".$_POST['faculty']."', department='".$_POST['department']."', session='".$_POST['session']."' , coursetitle='".$_POST['coursetitle']."', coursecode='".$_POST['coursecode']."' WHERE regnum='".$_POST['regnum']."' ";
  if (mysqli_query($conn, $query)) {
      echo "Record updated successfully!<br/>";
      echo '<a href="getform.php">Get Form</a><br/>';
      die(0);
  } else {
      // Display an error message if unable to update the record
       echo "Error updating record: " . $conn->error;
       die(0);
  }
}

?>
<style>
	form {
	background-color: pitch;
	}
	
	body{
	color: #8A2BE2;  
  font-size: 20px;  
  font-family: Verdana, Arial, Helvetica, monospace;  
  background-color: #F0E8A0;
	}
	</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>FORM</title>
</head>
<body class = "body">
  
    <h1>Form</h1>
    <p>Edit the record</p>
    <form method="POST" action="getform.php">
        Reg Number: <input type="text" name="id" value="<?php echo($regnum); ?>" required><br><br/>
        Full Name: <input type="text" name="name" value="<?php echo($fullname); ?>" required><br><br/>
        Faculty: <input type="text" name="email" value="<?php echo($faculty); ?>" required><br/>
		Department: <input type="text" name="phone" value="<?php echo($department); ?>" required><br/>
		Session: <input type="text" name="comments" value="<?php echo($session); ?>" required><br/>
        Course Title: <input type="text" name="id" value="<?php echo($coursetitle); ?>" required><br><br/>
        Course Code: <input type="text" name="name" value="<?php echo($coursecode); ?>" required><br><br/>
		
		 <br/>
        <input type="submit" value="update">
    </form>
	
	<td>
        <form action='editform.php' method='post'>
            <input name='id' value='",$row["regnum"],"' hidden>
           
    </td>
    </form>
</body>
</html>