<?php

//open database by PDO
$dbms='sqlite';     //DBMS type
$host=''; //Host name
$dbName='mysqlitedb.db';    //database name
$user='';      //database user
$pass='';          //database password
$dsn="$dbms:$dbName";

try {
    $con = new PDO($dsn, $user, $pass);
} catch (PDOException $e) {
    die ("Error!: " . $e->getMessage() . "<br/>");
}

//a safe method to recieve get data
function myget($str) { 
    $val = !empty($_GET[$str]) ? $_GET[$str] : '';
    return $val;
}       

//a safe method to recieve post data
function mypost($str) { 
    $val = !empty($_POST[$str]) ? $_POST[$str] : '';
    return $val;
}

function showproduct($db_con, $product){
    $sql = 'SELECT * FROM spu WHERE name LIKE "%'.$keyword.'%" OR description LIKE "%'.$keyword.'%" ORDER BY name';
    $query = $db_con->query($sql);
        outputproduct($query);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CAN302 Lab5</title>
    <link rel="stylesheet" href="styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="styles/sidebar.css">
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
</head>
<body>
    <div class="wrapper">
        <!-- Sidebar Holder -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>CAN302 DEMO</h3>
            </div>
            <ul class="list-unstyled components">
                <p>Dummy Store</p>
            </ul>

            <?php
            mycategory($con, 1);
            ?>
            
            <ul class="list-unstyled CTAs">
                    <li><a href="#" class="download">Back to HOME</a></li>
            </ul>
        </nav>

        <!-- Page Content Holder -->
        <div id="content">
    
            <!-- Nav Bar Holder-->
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                            <span>Toggle Sidebar</span>
                        </button>
                    </div>
                    <div class="navbar-right">
                        <form class="navbar-form" role="search" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Search" id="keyword" name="keyword">
                            </div>
                            <button type="submit" class="btn btn-default">Submit</button>
                        </form>
                    </div>
                </div>
            </nav>

            <div class="container-fluid"> <!-- Show products here-->
            <h2>Welcome to CAN302 DEMO store</h2>
            <div class="line"></div>

            <?php 
            if(isset($_POST['keyword'])){
                searchproduct($con, mypost('keyword'));
            }
            elseif(isset($_GET['category'])){
                myproduct($con, myget('category'));
            }
            ?>
            </div>
        </div>
    </div>

</body>
</html>