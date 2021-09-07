<style>
table, th, td {

border: 1px solid black;

border-collapse: collapse;
color: #8A2BE2;  
  font-size: 20px;  
  font-family: Verdana, Arial, Helvetica, monospace;
}

body {
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
echo '<a href="logout.php">Logout</a><br/>';

$query2 = "SELECT * FROM personal_info";
$result = $conn->query($query2);
if ($result->num_rows > 0) {
	
    # Output data for each row
     echo "<table class='table'>
              <thead>
                <tr class='tr'>
                <th class='th'>Reg Number</th>
                <th class='th'>Full Name</th>
                <th class='th'>Faculty</th>
                <th class='th'>Department</th>
                <th class='th'>Session</th>
				<th class='th'>Course Title</th>
				<th class='th'>Course Code</th>
				
              </thead>
              ";
    while($row = $result->fetch_assoc()) {
       echo "<tr class='tr' ",">",
            "<td class='td'>", $row["regnum"],"</td>",
            "<td class='td'>", $row["fullname"],"</td>",
            "<td class='td'>", $row["faculty"],"</td>",
			"<td class='td'>", $row["department"],"</td>",
			"<td class='td'>", $row["session"],"</td>",
			"<td class='td'>", $row["coursetitle"],"</td>",
			"<td class='td'>", $row["coursecode"],"</td>",
			
            "<td class='td'>",
                "<form action='editform.php' method='post' class='td'>
                 <input name='id' value='",$row["password"],"' hidden>
                 <button type='submit' name='update' value='update'>Edit</button>
                </form>",
            "</td>",
            "<td>",
                "<form action='deleteform.php' method='post' class='td'>
                 <input name='id' value='",$row["password"],"' hidden>
                 <button type='submit' name='delete' value='delete'>Delete</button>
                </form>",
            "</td>",
            "</tr>";
    }
    echo  "</table>";
	
	echo '<a href="register.html">Register new Info</a><br/>';
}else {
 echo "No Records!";
    } 




?>