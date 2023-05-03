<?php

//open database by SQLite3
$con = new SQLite3('mysqlitedb.db');

//a safe method to recieve post data
function mypost($str) { 
    $val = !empty($_POST[$str]) ? $_POST[$str] : '';
    return $val;
}       

//receive query parameters.
$last = mypost('last');
$first = mypost('first');
$email = mypost('email');

//add the received data to database
if (isset($_POST['add'])) {
    $sql = "INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`) VALUES (NULL, '".$first."', '".$last."', '".$email."')";
    $con->exec($sql);
} 

//query the data from database
if (isset($_POST['search'])) {
    $sql = "SELECT * FROM user WHERE first_name LIKE '%".$first."%' and last_name LIKE '%".$last."%' and email LIKE '%".$email."%'";
    $query = $con->query($sql);
} 
else {
    $sql = "SELECT * FROM user";
    $query = $con->query($sql);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CAN302 Lab2</title>
    <link rel="stylesheet" href="styles/bootstrap-337.min.css">
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
</head>
<body>
    <div class="container">
	    <h2> Database demo @ CAN302 </h2>
    	<p>  A table to show info in table user</p> 
	    <table class="table">
		    <thead>
			    <tr>
				    <th>id</th>
				    <th>Firstname</th>
				    <th>Lastname</th>
				    <th>email</th>
			    </tr>
		    </thead>
            <tbody>
                <?php
                while($row = $query->fetchArray()){
                    echo "<tr>";
                    echo "<td>".$row['id']."</td>";
                    echo "<td>".$row['first_name']."</td>";
                    echo "<td>".$row['last_name']."</td>";
                    echo "<td>".$row['email']."</td>";                    
                    echo "</tr>";
                }
                ?>
            </tbody>
	    </table>
    </div>
    <br>
    <div class="container">
    <form class="form-inline" role="form" action="" method="post" >
        <label class="form-control" for="first"> Firstname </label>
        <input type="text" class="form-control" id="first" placeholder="Input first name" name="first">
        <label class="form-control" for="last"> Lastname </label>
        <input type="text" class="form-control" id="last" placeholder="Input last name" name="last">
        <label class="form-control" for="email"> Email </label>
        <input type="text" class="form-control" id="email" placeholder="Input email address" name="email">
        <button type="submit" class="btn btn-primary" id="add" name="add" value="add"> Add </button>
        <button type="submit" class="btn btn-primary" id="search" name="search" value="search"> Search </button>
    </form>   
    </div>
</body>
</html>