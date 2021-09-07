<?php
// Include script to make a database connection
include("connect.php");
// Empty string to be used later
$id='';
$name='';
$email='';
$phone='';
$comments='';

// Button click to update using POST method
if(!empty($_POST['update']) && !empty($_POST['id']) )  {
  $id=$_POST['id'];
  // Fetch record with ID and populate it in the form
  $query2 = "SELECT * FROM personal_info WHERE id='".$_POST['id']."' ";
  $result = $conn->query($query2);
  if ($result->num_rows > 0) {
    // Output data for each row
    while($row = $result->fetch_assoc()) {
      $id=$row["id"];
      $name=$row["name"];
	  $email=$row["email"];
	  $phone=$row["phone"];
	  $comments=$row["comments"];
    }
    echo "Current Details: " ."<b> - Id:</b> " . $id. "<b> Name:</b> " . $name. " <b>Email:</b>" . $email. " <b> phone:</b> " . $phone. " <b> comments:</b> " . $comments. "<br>";
  } else {
    echo "Error updating";
  }
}

// Button click to update using GET method
if(!empty($_GET['update']) && !empty($_GET['id']) )  {
  $id=$_GET['id'];
  // Fetch record with id and populate it in the form
  $query2 = "SELECT * FROM personal_info WHERE id='".$_GET['id']."' ";
  $result = $conn->query($query2);
  if ($result->num_rows > 0) {
    // Output data for each row
    while($row = $result->fetch_assoc()) {
      $id=$row["id"];
	  $name=$row["name"];
      $email=$row["email"];
	  $phone=$row["phone"];
      $comments=$row["comments"];
    }

    echo "Current Details: " ."<b> - Id:</b> " . $id. " <b> Name:</b> " . $name. " <b>Email:</b>" . $email. " <b> Phone:</b> " . $phone. "<b> Comments:</b> " . $comments. "<br>";
  } else {
    echo "Error updating";
  }
}
// Check that the input fields are not empty and process the data
if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['id'])&& !empty($_POST['phone'])&& !empty($_POST['comments']) ){
    // Insert into the database
  $query = "UPDATE FROM personal_info SET name='".$_POST['id']."', '".$_POST['name']."','".$_POST['email']."','".$_POST['phone']."','".$_POST['comments']."' WHERE id='".$_POST['id']."' ";
  if (mysqli_query($conn, $query)) {
      echo "Record updated successfully!<br/>";
      echo '<a href="getform.php">Get Form</a><br/>
            <a href="index.php">Post Form</a>';
      die(0);
  } else {
      // Display an error message if unable to update the record
       echo "Error updating record: " . $conn->error;
       die(0);
  }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>FORM</title>
</head>
<body>
    <h1>Form</h1>
    <p>Edit the record</p>
    <form method="POST" action="index.php">
        ID: <input type="text" name="id" value="<?php echo($id); ?>" required><br><br/>
        Name: <input type="text" name="name" value="<?php echo($name); ?>" required><br><br/>
        Email: <input type="text" name="email" value="<?php echo($email); ?>" required><br/>
		Phone: <input type="text" name="email" value="<?php echo($email); ?>" required><br/>
		Comments: <input type="text" name="email" value="<?php echo($email); ?>" required><br/>
        <br/>
        <input type="submit" value="update">
    </form>
	
	<td>
        <form action='update.php' method='post'>
            <input name='id' value='",$row["id"],"' hidden>
           
        </form>
    </td>
</body>
</html>