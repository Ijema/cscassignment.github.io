<style>
table, th, td {

border: 1px solid black;

border-collapse: collapse;
}

body{
color: #8A2BE2;  
  font-size: 20px;  
  font-family: Verdana, Arial, Helvetica, monospace;  
  background-color: #F0E8A0;

}

th, td {

padding: 10px;

}

th {

background-color: #FFB500;

}

td {

background-color: #FDDF95;

}
</style>

<?php

// Include script to make a database connection
include("connect.php");



// Check if input fileds are empty
if(empty($_POST['regnum'])&& empty($_POST['fullname']) && empty($_POST['faculty']) && empty($_POST['department']) && empty($_POST['session']) && empty($_POST['coursetitle'])&& empty($_POST['coursecode'])){
    // If the fields are empty, display a message to the user
    echo "Please fill in the fields";
	echo '<a href="register.html">Register Self</a><br/>';
// Process the form data if the input fields are not empty
}else{
	$regnum=$_POST['regnum'];
	$fullname=$_POST['fullname'];
    $faculty=$_POST['faculty'];
    $department=$_POST['department'];
	$session=$_POST['session'];
	$coursetitle=$_POST['coursetitle'];
	$coursecode=$_POST['coursecode'];
   
}
    # Insert into the database
    $query = "INSERT INTO personal_info(regnum, fullname, faculty, department, session, coursetitle, coursecode) VALUES ('$regnum','$fullname','$faculty','$department','$session','$coursetitle', '$coursecode')";
    if (mysqli_query($conn, $query)) {
        echo "New record created successfully !";
		$query2 = "SELECT * FROM personal_info";
$result = $conn->query($query2);
if ($result->num_rows > 0) {
    # Output data for each row
    echo "<table id='table' border='1' id='example' class='table'>
              <thead>
                <tr class='tr'>
                <th class='th'>Reg Number</th>
                <th class='th'>Full Name</th>
                <th class='th'>Faculty</th>
                <th class='th'>Department</th>
                <th class='th'>Session</th>
				<th class='th'>Course Title</th>
				<th class='th'>Course Code</th>
				
				
                </tr>
              </thead>
              ";
    while($row = $result->fetch_assoc()) {
       echo "<tr id='tr' ",">",
            "<td class='td'>", $row["regnum"],"</td>",
            "<td class='td'>", $row["fullname"],"</td>",
            "<td class='td'>", $row["faculty"],"</td>",
			"<td class='td'>", $row["department"],"</td>",
			"<td class='td'>", $row["session"],"</td>",
			"<td class='td'>", $row["coursetitle"],"</td>",
			"<td class='td'>", $row["coursecode"],"</td>",
			
            "<td class='td'>",
                "<form action='editform.php' method='post' class='th'>
                 <input class='th', name='id' value='",$row["regnum"],"' hidden>
                 <button type='submit' name='update' value='update'>Edit</button>
                </form>",
            "</td>",
            "<td>",
                "<form action='deleteform.php' method='post' class='th'>
                 <input name='id' value='",$row["regnum"],"' hidden>
                 <button type='submit' name='delete' value='delete'>Delete</button>
                </form>",
            "</td>",
            "</tr>";
    }
    echo  "</table>";
}else {
 echo "No Records!";
    } 
}



?>