<?php	
include("connect.php")
#Read From the database and display in the table
$query2 = "SELECT * FROM personal_info";
$result = $conn->query($query2);
if ($result->num_rows > 0) {
    # Output data for each row
    echo "<table id='tsa' border='1' id='example' class='table table-striped responsive-utilities table-hover'>
              <thead>
                <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Action 1</th>
                <th>Action 2</th>
                </tr>
              </thead>
              ";
    while($row = $result->fetch_assoc()) {
       echo "<tr id='green' ",">",
            "<td>", $row["id"],"</td>",
            "<td>", $row["name"],"</td>",
            "<td>", $row["email"],"</td>",
            "<td>",
                "<form action='update.php' method='post'>
                 <input name='id' value='",$row["id"],"' hidden>
                 <button type='submit' name='update' value='update'>Edit</button>
                </form>",
            "</td>",
            "<td>",
                "<form action='form-post.php' method='post'>
                 <input name='id' value='",$row["id"],"' hidden>
                 <button type='submit' name='delete' value='delete'>Delete</button>
                </form>",
            "</td>",
            "</tr>";
    }
    echo  "</table>";
}else {
 echo "No Records!";
}
?>