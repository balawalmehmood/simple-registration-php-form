<?php




if(isset($_POST['submit']))



$fname 		= $_POST['fname'];
$lname		= $_POST['lname'];
$email 		= $_POST['email'];
$password 	= $_POST['password'];
$age   		= $_POST['age'];
$location 	= $_POST['location'];
$date 		= $_POST['date'];
//$submit		= $_POST['submit'];


/*echo 	$fname ;
echo 	$lname ;
echo 	$email ;
echo 	$password ;
echo 	$age ;
echo 	$location ;
echo    $date ;*/




// Create connection
$conn = new mysqli("localhost", "root", "", "noob");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully" .'<br>';






$sql = "INSERT INTO users (fname, lname, email, password, age, location, date)
VALUES ('$fname', '$lname', '$email','$password', '$age', '$location', '$date')";





$sql = "SELECT fname, lname, email, password, age, location, date FROM users";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo " Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    }
} else {
    echo "0 results";
}





// sql to delete a record
$sql = "DELETE FROM users WHERE id=3";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}





if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);


?> 